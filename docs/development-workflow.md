# Development Workflow

The Git repository is the single source of truth.

Implementation should occur as maintainable project files under version control rather than existing only inside AI conversations.

Whenever practical, generate complete files in the repository instead of HTML, CSS, or JavaScript snippets intended for manual copy/paste.

Preferred workflow:

```text
Repository
-> Git
-> GitHub
-> Deployment
-> WordPress configuration and content
```

Manual work inside the WordPress admin should be limited to:

- Theme activation
- Plugin installation and configuration
- Media uploads
- Page and post content
- Menus
- Widgets
- Unavoidable configuration
- Final testing

Avoid recommending repeated manual copy/paste of HTML, CSS, PHP, or JavaScript unless there is no technically reasonable alternative.

If manual intervention is required:

- Explain why.
- Minimize the number of manual steps.
- Automate everything else.

Every implementation task should leave the repository in a deployable state.

No code should exist only inside a chat conversation.

