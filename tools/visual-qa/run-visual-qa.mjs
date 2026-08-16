import { chromium } from '@playwright/test';
import fs from 'node:fs/promises';
import path from 'node:path';
import process from 'node:process';

const projectRoot = process.cwd();
const baseUrl = (process.env.TBA_VISUAL_QA_BASE_URL || 'https://twobitalchemy.com').replace(/\/$/, '');
const timestamp = new Date().toISOString().replace(/[-:]/g, '').replace(/\..+$/, '').replace('T', '-');
const runsRoot = path.join(projectRoot, 'qa', 'visual', 'runs');
const latestRoot = path.join(projectRoot, 'qa', 'visual', 'latest');
const runRoot = path.join(runsRoot, timestamp);

const routes = [
  { path: '/', label: 'home', expectedStatus: 200 },
  { path: '/projects/', label: 'projects', expectedStatus: 200 },
  { path: '/field-notes/', label: 'field-notes', expectedStatus: 200 },
  { path: '/workshop-journal/', label: 'workshop-journal', expectedStatus: 200 },
  { path: '/cabinet/', label: 'cabinet', expectedStatus: 200 },
  { path: '/about/', label: 'about', expectedStatus: 200 },
  { path: '/contact/', label: 'contact', expectedStatus: 200 },
  {
    path: '/cabinet/a-sketch-that-was-never-meant-to-exist/',
    label: 'charlie-draft-public',
    expectedStatus: 404,
    note: 'Private prototype Cabinet exhibit should remain unavailable to logged-out visitors.'
  },
  {
    path: '/cabinet/1981-ford-escort-model/',
    label: 'escort-draft-public',
    expectedStatus: 404,
    note: 'Draft Cabinet exhibit candidate should remain unavailable to logged-out visitors.'
  }
];

const viewports = [
  { name: 'desktop', width: 1440, height: 1000 },
  { name: 'mobile', width: 390, height: 844 }
];

function cacheBustUrl(routePath) {
  const separator = routePath.includes('?') ? '&' : '?';
  return `${baseUrl}${routePath}${separator}tba_visual_qa=${encodeURIComponent(timestamp)}`;
}

async function resetDirectory(dir) {
  await fs.rm(dir, { recursive: true, force: true });
  await fs.mkdir(dir, { recursive: true });
}

function markdownEscape(value) {
  return String(value).replace(/\|/g, '\\|').replace(/\r?\n/g, ' ');
}

function htmlEscape(value) {
  return String(value)
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;');
}

async function captureRoute(browser, route) {
  const result = {
    route: route.path,
    url: `${baseUrl}${route.path}`,
    expectedStatus: route.expectedStatus,
    status: null,
    title: '',
    note: route.note || '',
    screenshots: {},
    consoleErrors: [],
    resourceErrors: [],
    result: 'unknown'
  };

  for (const viewport of viewports) {
    const context = await browser.newContext({
      viewport: { width: viewport.width, height: viewport.height },
      deviceScaleFactor: 1,
      userAgent: `Two-Bit-Alchemy-Visual-QA/${timestamp} (${viewport.name})`
    });

    const page = await context.newPage();
    const consoleErrors = [];
    const resourceErrors = [];

    page.on('console', (message) => {
      if (message.type() === 'error') {
        const text = message.text();
        const isExpectedDocument404 =
          route.expectedStatus === 404 &&
          /^Failed to load resource: the server responded with a status of 404/.test(text);

        if (!isExpectedDocument404) {
          consoleErrors.push(text);
        }
      }
    });

    page.on('pageerror', (error) => {
      consoleErrors.push(error.message);
    });

    page.on('requestfailed', (request) => {
      resourceErrors.push(`${request.failure()?.errorText || 'failed'}: ${request.url()}`);
    });

    page.on('response', (response) => {
      const status = response.status();
      const request = response.request();

      if (status >= 400 && request.resourceType() !== 'document') {
        resourceErrors.push(`${status}: ${response.url()}`);
      }
    });

    const targetUrl = cacheBustUrl(route.path);
    const response = await page.goto(targetUrl, {
      waitUntil: 'networkidle',
      timeout: 30000
    });

    if (viewport.name === 'desktop') {
      result.status = response ? response.status() : null;
      result.title = await page.title();
    }

    const screenshotName = `${route.label}-${viewport.name}.png`;
    const screenshotPath = path.join(runRoot, screenshotName);
    await page.screenshot({ path: screenshotPath, fullPage: true });
    result.screenshots[viewport.name] = screenshotPath;

    result.consoleErrors.push(...consoleErrors.map((error) => `${viewport.name}: ${error}`));
    result.resourceErrors.push(...resourceErrors.map((error) => `${viewport.name}: ${error}`));

    await context.close();
  }

  result.consoleErrors = [...new Set(result.consoleErrors)];
  result.resourceErrors = [...new Set(result.resourceErrors)];
  result.result = result.status === route.expectedStatus ? 'pass' : 'review';

  return result;
}

function buildMarkdown(results) {
  const lines = [
    '# Two-Bit Alchemy Visual QA',
    '',
    `Run: ${timestamp}`,
    `Base URL: ${baseUrl}`,
    '',
    '| URL | Expected | Status | Result | Page Title | Desktop Screenshot | Mobile Screenshot | Console Errors | Resource Errors |',
    '| --- | ---: | ---: | --- | --- | --- | --- | ---: | ---: |'
  ];

  for (const result of results) {
    lines.push([
      markdownEscape(result.url),
      result.expectedStatus,
      result.status ?? 'n/a',
      result.result,
      markdownEscape(result.title),
      markdownEscape(path.relative(projectRoot, result.screenshots.desktop)),
      markdownEscape(path.relative(projectRoot, result.screenshots.mobile)),
      result.consoleErrors.length,
      result.resourceErrors.length
    ].join(' | ').replace(/^/, '| ').replace(/$/, ' |'));
  }

  const findings = results.filter((result) => result.consoleErrors.length || result.resourceErrors.length || result.result !== 'pass');

  lines.push('', '## Findings', '');

  if (!findings.length) {
    lines.push('No route status mismatches, browser console errors, or missing resource errors were detected.');
  } else {
    for (const result of findings) {
      lines.push(`### ${result.url}`, '');
      lines.push(`- Expected/status: ${result.expectedStatus} / ${result.status ?? 'n/a'}`);
      lines.push(`- Result: ${result.result}`);

      if (result.note) {
        lines.push(`- Note: ${result.note}`);
      }

      if (result.consoleErrors.length) {
        lines.push('- Console errors:');
        result.consoleErrors.forEach((error) => lines.push(`  - ${error}`));
      }

      if (result.resourceErrors.length) {
        lines.push('- Resource errors:');
        result.resourceErrors.forEach((error) => lines.push(`  - ${error}`));
      }

      lines.push('');
    }
  }

  return `${lines.join('\n')}\n`;
}

function buildHtml(results) {
  const cards = results.map((result) => {
    const desktop = path.basename(result.screenshots.desktop);
    const mobile = path.basename(result.screenshots.mobile);
    const issues = [...result.consoleErrors, ...result.resourceErrors];

    return `
      <section class="qa-card">
        <h2>${htmlEscape(result.route)}</h2>
        <p><a href="${htmlEscape(result.url)}">${htmlEscape(result.url)}</a></p>
        <dl>
          <div><dt>Expected</dt><dd>${htmlEscape(result.expectedStatus)}</dd></div>
          <div><dt>Status</dt><dd>${htmlEscape(result.status ?? 'n/a')}</dd></div>
          <div><dt>Result</dt><dd>${htmlEscape(result.result)}</dd></div>
          <div><dt>Title</dt><dd>${htmlEscape(result.title)}</dd></div>
        </dl>
        ${result.note ? `<p class="note">${htmlEscape(result.note)}</p>` : ''}
        <div class="screens">
          <figure>
            <a href="${htmlEscape(desktop)}"><img src="${htmlEscape(desktop)}" alt="Desktop screenshot for ${htmlEscape(result.route)}"></a>
            <figcaption>Desktop</figcaption>
          </figure>
          <figure>
            <a href="${htmlEscape(mobile)}"><img src="${htmlEscape(mobile)}" alt="Mobile screenshot for ${htmlEscape(result.route)}"></a>
            <figcaption>Mobile</figcaption>
          </figure>
        </div>
        ${issues.length ? `<h3>Issues</h3><ul>${issues.map((issue) => `<li>${htmlEscape(issue)}</li>`).join('')}</ul>` : '<p>No console or resource errors detected.</p>'}
      </section>
    `;
  }).join('\n');

  return `<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Two-Bit Alchemy Visual QA ${htmlEscape(timestamp)}</title>
  <style>
    body { margin: 2rem; background: #f7f1e6; color: #1f1b16; font-family: system-ui, sans-serif; line-height: 1.5; }
    h1, h2, h3 { font-family: Georgia, "Times New Roman", serif; }
    .qa-card { max-width: 1120px; padding-block: 1.5rem; border-block-start: 3px double #c8bca9; }
    dl { display: grid; grid-template-columns: repeat(auto-fit, minmax(12rem, 1fr)); gap: .5rem 1rem; }
    dt { color: #665d50; font-size: .8125rem; font-weight: 700; text-transform: uppercase; }
    dd { margin: 0; }
    .screens { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, .45fr); gap: 1rem; align-items: start; }
    img { display: block; max-width: 100%; height: auto; border: 1px solid #c8bca9; background: #fffaf0; }
    figcaption, .note { color: #665d50; font-size: .875rem; }
    @media (max-width: 720px) { body { margin: 1rem; } .screens { grid-template-columns: 1fr; } }
  </style>
</head>
<body>
  <h1>Two-Bit Alchemy Visual QA</h1>
  <p>Run: ${htmlEscape(timestamp)}<br>Base URL: ${htmlEscape(baseUrl)}</p>
  ${cards}
</body>
</html>
`;
}

await fs.mkdir(runRoot, { recursive: true });
await resetDirectory(latestRoot);

const browser = await chromium.launch();
const results = [];

try {
  for (const route of routes) {
    results.push(await captureRoute(browser, route));
  }
} finally {
  await browser.close();
}

const reportJson = JSON.stringify({ timestamp, baseUrl, viewports, results }, null, 2);
const reportMarkdown = buildMarkdown(results);
const reportHtml = buildHtml(results);

await fs.writeFile(path.join(runRoot, 'visual-qa-report.json'), reportJson);
await fs.writeFile(path.join(runRoot, 'visual-qa-report.md'), reportMarkdown);
await fs.writeFile(path.join(runRoot, 'index.html'), reportHtml);

await fs.cp(runRoot, latestRoot, { recursive: true, force: true });

console.log(`VISUAL_QA_RUN=${runRoot}`);
console.log(`VISUAL_QA_LATEST=${latestRoot}`);
console.log(`VISUAL_QA_REPORT=${path.join(latestRoot, 'visual-qa-report.md')}`);

const failures = results.filter((result) => result.result !== 'pass');
const consoleErrorCount = results.reduce((total, result) => total + result.consoleErrors.length, 0);
const resourceErrorCount = results.reduce((total, result) => total + result.resourceErrors.length, 0);

console.log(`VISUAL_QA_STATUS=${failures.length ? 'review' : 'pass'}`);
console.log(`VISUAL_QA_ROUTE_MISMATCHES=${failures.length}`);
console.log(`VISUAL_QA_CONSOLE_ERRORS=${consoleErrorCount}`);
console.log(`VISUAL_QA_RESOURCE_ERRORS=${resourceErrorCount}`);

if (failures.length) {
  process.exitCode = 1;
}
