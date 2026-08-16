# Remote Deployment Foundation

This document defines the safe remote deployment foundation for the Two-Bit Alchemy WordPress theme on IONOS Web Hosting Essential.

It does not authorize deployment. It does not authorize live WordPress content changes, theme activation, plugin changes, database changes, cleanup, or publication.

## Hosting Target

- Hosting environment: IONOS Web Hosting Essential.
- SSH/SFTP host: `access1019605209.webspace-data.io`
- SSH/SFTP port: `22`
- SSH/SFTP user: `u117706887`
- Local SSH alias: `tba-ionos`

## Secrets Policy

- Production credentials never enter Git.
- SSH private keys never enter Git.
- Passwords are never stored in scripts.
- Passwords are never stored in documentation.
- Deployment scripts use local SSH configuration or agent-managed keys where possible.
- Remote writes require explicit user authorization.
- Publication requires separate explicit editorial approval.
- Backups must exist before deployment.
- Rollback must remain available after deployment.
- No production credentials, database exports, private WordPress exports, backup archives, or local SSH files should be committed.

## Local SSH Capability Findings

The Windows environment includes:

| Capability | Found | Path / Status |
| --- | --- | --- |
| OpenSSH client | Yes | `C:\Windows\System32\OpenSSH\ssh.exe` |
| `ssh-keygen` | Yes | `C:\Windows\System32\OpenSSH\ssh-keygen.exe` |
| `scp` | Yes | `C:\Windows\System32\OpenSSH\scp.exe` |
| `sftp` | Yes | `C:\Windows\System32\OpenSSH\sftp.exe` |
| `ssh-agent` binary | Yes | `C:\Windows\System32\OpenSSH\ssh-agent.exe` |
| `ssh-agent` service | Present | Stopped at setup time |
| PowerShell | Yes | `C:\Windows\System32\WindowsPowerShell\v1.0\powershell.exe` |

## Local SSH Key

A project-specific SSH keypair was generated outside the repository:

- Private key path: `C:\Users\dougl\.ssh\two-bit-alchemy-ionos`
- Public key path: `C:\Users\dougl\.ssh\two-bit-alchemy-ionos.pub`
- Key type: Ed25519
- Local key comment: `two-bit-alchemy-ionos`

The private key must not be copied into `D:\TBA`, Git, documentation, screenshots, chat transcripts, or deployment scripts.

The public key is safe to paste into IONOS if IONOS supports SSH public-key authentication for this hosting account.

## SSH Authentication Status

Key-only SSH authentication has been verified through the `tba-ionos` alias.

Password authentication was needed once outside chat to install the public key in `~/.ssh/authorized_keys`. The password was not recorded, printed, stored, committed, or added to scripts.

## Local SSH Alias

The local SSH configuration includes:

```sshconfig
Host tba-ionos
    HostName access1019605209.webspace-data.io
    User u117706887
    Port 22
    IdentityFile ~/.ssh/two-bit-alchemy-ionos
    IdentitiesOnly yes
```

This configuration lives in the user's local SSH configuration area, not in the repository.

## Required One-Time IONOS Action

Dada must add the public key from `C:\Users\dougl\.ssh\two-bit-alchemy-ionos.pub` to the IONOS SSH access configuration, if IONOS supports SSH public keys for this plan.

Do not provide the hosting password to Codex. Do not store the hosting password in any repository file.

After the key is installed, test authentication manually or with a non-writing command:

```powershell
ssh -o BatchMode=yes tba-ionos "pwd"
```

If this fails because IONOS requires password-only SSH, stop and decide on a safe local credential approach before continuing. Do not embed the password in scripts.

## Remote Path Discovery

Remote WordPress paths have been discovered using key-only SSH and read-only commands.

After key setup, run the read-only discovery script:

```powershell
powershell.exe -NoProfile -ExecutionPolicy Bypass -File scripts\discover-wordpress-remote.ps1
```

The script attempts to report:

- Remote home directory.
- Remote working directory.
- Candidate WordPress roots.
- Candidate `wp-content` directories.
- Candidate `themes` directories.
- Whether `two-bit-alchemy` exists under a candidate themes directory.
- Whether required theme files exist in the active theme directory.

The discovery script does not upload, delete, edit, activate, or publish anything.

```text
Remote home directory: /kunden/homepages/40/d1019605209/htdocs
Click & Build root: /kunden/homepages/40/d1019605209/htdocs/clickandbuilds
Fisher Aquatics WordPress root: /kunden/homepages/40/d1019605209/htdocs/clickandbuilds/FisherAquatics
Two-Bit Alchemy WordPress root: /kunden/homepages/40/d1019605209/htdocs/clickandbuilds/TwoBitAlchemy
Two-Bit Alchemy wp-content directory: /kunden/homepages/40/d1019605209/htdocs/clickandbuilds/TwoBitAlchemy/wp-content
Two-Bit Alchemy themes directory: /kunden/homepages/40/d1019605209/htdocs/clickandbuilds/TwoBitAlchemy/wp-content/themes
Two-Bit Alchemy theme directory: /kunden/homepages/40/d1019605209/htdocs/clickandbuilds/TwoBitAlchemy/wp-content/themes/two-bit-alchemy
Active WordPress stylesheet: two-bit-alchemy
Active WordPress template: two-bit-alchemy
```

The repository-safe deployment path configuration is recorded in `config/ionos-deployment.json`.

## Remote Tooling Discovery

Read-only discovery found:

```text
WP-CLI: /usr/bin/wp
WP-CLI version: 2.12.0
WP-CLI PHP binary: /usr/bin/php8.0-cli
WP-CLI PHP version: 8.0.30
Default php command: /usr/bin/php
Default php reported version: PHP 4.4.9 (cgi-fcgi)
unzip: /usr/bin/unzip
tar: /usr/bin/tar
```

## Deployment Script

Deployment script:

```text
scripts\deploy-theme.ps1
```

The deployment script is intentionally guarded. It requires:

- A validated local theme package.
- SSH key authentication through `tba-ionos` or an explicitly supplied host alias.
- A caller-supplied remote theme path.
- The remote theme path to end with `/wp-content/themes/two-bit-alchemy`.
- The `-ConfirmDeploy` switch.

The script must not be run until Dada explicitly authorizes remote deployment.

Example future command after remote path discovery:

```powershell
powershell.exe -NoProfile -ExecutionPolicy Bypass -File scripts\deploy-theme.ps1 -ConfirmDeploy
```

To validate the discovered deploy target without writing to the remote server:

```powershell
powershell.exe -NoProfile -ExecutionPolicy Bypass -File scripts\deploy-theme.ps1 -ValidateOnly
```

The script:

1. Runs `scripts\package-theme.ps1`.
2. Refuses deployment if package validation fails.
3. Connects using SSH/SCP without storing passwords.
4. Verifies the expected remote theme path pattern.
5. Creates a timestamped remote backup of the current `two-bit-alchemy` theme.
6. Deploys only the `two-bit-alchemy` theme files.
7. Does not modify `wp-config.php`, uploads, plugins, WordPress core, unrelated themes, database content, or publication state.
8. Verifies required remote files after upload.
9. Fails if expected paths or files differ.
10. Leaves the previous theme backup available for rollback.
11. Attempts a non-fatal IONOS Performance full-page cache purge after the theme files are replaced.

The post-deployment cache purge uses PHP 8.2 explicitly:

```text
/usr/bin/php8.2-cli /usr/share/php/wp-cli/wp-cli-2.12.0.phar
```

The purge calls the active IONOS Performance plugin's locally verified cache method:

```text
Ionos\Performance\Caching\Caching::flush_total_cache()
```

If PHP 8.2, WP-CLI, the WordPress root, or the plugin cache class is unavailable, the deployment reports `CACHE_PURGE_STATUS=skipped` or `CACHE_PURGE_STATUS=warning` and leaves the completed theme deployment intact. Cache purge failure must not destructively alter the deployed theme or rollback backup.

## Rollback Script

Rollback script:

```text
scripts\rollback-theme.ps1
```

Rollback is never automatic. It must be explicitly run after a deployment if the theme needs to be restored.

Example future command:

```powershell
powershell.exe -NoProfile -ExecutionPolicy Bypass -File scripts\rollback-theme.ps1 -ConfirmRollback
```

To validate the discovered rollback target without restoring anything:

```powershell
powershell.exe -NoProfile -ExecutionPolicy Bypass -File scripts\rollback-theme.ps1 -ValidateOnly
```

The rollback script restores the latest recorded timestamped backup created by `scripts\deploy-theme.ps1`, or an explicitly supplied backup path.

## Preview And Publication Safety

Remote deployment of theme code must not publish content.

Cabinet exhibit visibility remains controlled by `src/themes/two-bit-alchemy/inc/cabinet-exhibits.php` through the `draft` / `published` status model.

The Charlie Adlard Cabinet exhibit remains `draft` and preview-only until a separate explicit editorial publication decision changes that status.

## PHP Version Note

- `twobitalchemy.com` currently uses PHP 8.2.
- `fisheraquatics.com` uses PHP 8.3.
- Legacy IONOS live-website hostnames use PHP 7.4.
- PHP migration is intentionally deferred until after deployment automation is proven.
- Do not change PHP during deployment foundation work.

Additional CLI observations:

- `/usr/bin/php` currently reports PHP 4.4.9 as a CGI/FastCGI binary.
- `/usr/bin/php8.0-cli`, `/usr/bin/php8.1-cli`, `/usr/bin/php8.2-cli`, and `/usr/bin/php8.3-cli` are available.
- WP-CLI currently reports PHP 8.0.30 through `/usr/bin/php8.0-cli`.
- If future automation needs WP-CLI with PHP 8.2 explicitly, use:

```powershell
ssh tba-ionos "/usr/bin/php8.2-cli /usr/share/php/wp-cli/wp-cli-2.12.0.phar --info"
```

Do not use the anomalous default `/usr/bin/php` runtime for WordPress automation.

## Deployment History

### 2026-08-16 Cache Consistency And Layout Normalization Deployment

- Deployment status: succeeded after correcting the post-deployment cache purge command.
- Deployed source commit: `13cefd10a3596c8cca7c1442b4f300471aa679f4`.
- Remote theme path: `/kunden/homepages/40/d1019605209/htdocs/clickandbuilds/TwoBitAlchemy/wp-content/themes/two-bit-alchemy`.
- Remote backup path created by the successful deployment: `/kunden/homepages/40/d1019605209/htdocs/tba-theme-backups/two-bit-alchemy-20260816-152731`.
- Earlier backup path created by the first attempt before the cache-purge command failed: `/kunden/homepages/40/d1019605209/htdocs/tba-theme-backups/two-bit-alchemy-20260816-152556`.
- Package validation: passed.
- Remote post-deployment verification: passed.
- IONOS Performance cache purge: automated and confirmed with `CACHE_PURGE_STATUS=ok`.
- Public homepage verification: HTTP 200 and `two-bit-alchemy-frontispiece-web.jpg` present.
- Public Cabinet verification: HTTP 200 and the Charlie Adlard draft exhibit title absent.
- Public Charlie Adlard direct URL verification: HTTP 404.
- Charlie Adlard Cabinet exhibit status after deployment: `draft`.
- WordPress database content, page structure, plugins, uploads, PHP hosting configuration, approved story text, images, and Cabinet publication status were not modified.

### 2026-08-16 First Automated Theme Deployment

- Deployment status: succeeded.
- Deployment time: 2026-08-16 18:35 UTC.
- Deployed source commit: `d31c03d222464668be962352b2b260977da9a17d`.
- Remote theme path: `/kunden/homepages/40/d1019605209/htdocs/clickandbuilds/TwoBitAlchemy/wp-content/themes/two-bit-alchemy`.
- Remote backup path created: `/kunden/homepages/40/d1019605209/htdocs/tba-theme-backups/two-bit-alchemy-20260816-143535`.
- Rollback marker: `/kunden/homepages/40/d1019605209/htdocs/tba-theme-backups/latest-two-bit-alchemy-backup.txt`.
- Package validation: passed.
- Remote post-deployment verification: passed.
- Required deployed files verified:
  - `style.css`
  - `functions.php`
  - `index.php`
  - `theme.json`
  - `inc/cabinet-exhibits.php`
  - `templates/cabinet-exhibit-a-sketch-that-was-never-meant-to-exist.php`
  - `assets/images/cabinet/charlie-adlard-amish-zombie-sketch-web.jpg`
- Charlie Adlard Cabinet exhibit status after deployment: `draft`.
- Active WordPress stylesheet after deployment: `two-bit-alchemy`.
- Active WordPress template after deployment: `two-bit-alchemy`.
- Rollback availability: confirmed.
- PHP hosting configuration: unchanged.
- WordPress database content: unchanged by deployment tooling.
- WordPress core, `wp-config.php`, plugins, uploads, unrelated themes, settings, comments, permalinks, search visibility, and Cabinet publication status were not modified.

Rollback command if needed:

```powershell
powershell.exe -NoProfile -ExecutionPolicy Bypass -File scripts\rollback-theme.ps1 -ConfirmRollback
```

## What Remains Manual

- Authorizing future deployments.
- Confirming the backup and rollback path before each deployment.
- Reviewing the site after deployment.
- Publishing content.

These remain manual because they involve production access, hosting account configuration, live infrastructure, or editorial publication authority.
