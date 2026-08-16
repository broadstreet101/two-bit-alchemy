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

Remote WordPress paths have not been discovered yet because SSH public-key authentication has not been confirmed.

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

Record the verified remote WordPress root and theme path here after discovery:

```text
Remote home directory: Pending discovery
twobitalchemy.com installation path: Pending discovery
WordPress root: Pending discovery
wp-content directory: Pending discovery
themes directory: Pending discovery
Two-Bit Alchemy theme directory: Pending discovery
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
powershell.exe -NoProfile -ExecutionPolicy Bypass -File scripts\deploy-theme.ps1 `
  -RemoteThemePath "/absolute/path/to/wordpress/wp-content/themes/two-bit-alchemy" `
  -ConfirmDeploy
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

## Rollback Script

Rollback script:

```text
scripts\rollback-theme.ps1
```

Rollback is never automatic. It must be explicitly run after a deployment if the theme needs to be restored.

Example future command:

```powershell
powershell.exe -NoProfile -ExecutionPolicy Bypass -File scripts\rollback-theme.ps1 `
  -RemoteThemePath "/absolute/path/to/wordpress/wp-content/themes/two-bit-alchemy" `
  -ConfirmRollback
```

The rollback script restores the latest recorded timestamped backup created by `scripts\deploy-theme.ps1`, or an explicitly supplied backup path.

## Preview And Publication Safety

Remote deployment of theme code must not publish content.

Cabinet exhibit visibility remains controlled by `src/themes/two-bit-alchemy/inc/cabinet-exhibits.php` through the `draft` / `published` status model.

The Charlie Adlard Cabinet exhibit remains `draft` and preview-only until a separate explicit editorial publication decision changes that status.

## PHP Version Note

- `twobitalchemy.com` currently uses PHP 8.2.
- `fisheraquatics.com` uses PHP 8.3.
- PHP migration is intentionally deferred until after deployment automation is proven.
- Do not change PHP during deployment foundation work.

## What Remains Manual

- Installing the public key in IONOS.
- Confirming SSH authentication.
- Running read-only remote discovery.
- Reviewing and recording discovered remote paths.
- Authorizing the first deployment.
- Confirming a full backup and rollback path.
- Reviewing the site after deployment.
- Publishing content.

These remain manual because they involve production access, hosting account configuration, live infrastructure, or editorial publication authority.
