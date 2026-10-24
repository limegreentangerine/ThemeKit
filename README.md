# ThemeKit

ThemeKit provides starter files and an installer for building themes for
[Concrete CMS](https://www.concretecms.org/). It scaffolds a theme's PHP
templates, Sass stylesheets, and TypeScript, with a Bootstrap-based asset
setup.

## What it provides

- A Concrete CMS theme skeleton with page templates, shared header and footer
  elements, navigation, and a starter `PageTheme` class.
- Organized SCSS and TypeScript starter files for theme, block, element, and
  template code.
- An installer command that creates the theme directories, copies starter
  resources, and installs the npm dependencies used by the scaffold.
- A system-pages installer that copies the provided system page views and
  configures them to use the selected theme.

## Requirements

- A Composer-managed Concrete CMS project.
- PHP and Composer.
- Node.js and npm, for the installer and frontend dependencies.
- Composer must be able to install the required
  `limegreentangerine/lgt_toolkit` package.

The package's development dependencies use Concrete CMS 9.2 and PHP 8.4.

## Install

Add ThemeKit to your Concrete CMS project:

```bash
composer require limegreentangerine/theme_kit
```

## Create a theme

From your Concrete CMS project root, run:

```bash
./vendor/bin/create-new-theme
```

When prompted, enter a theme handle using only letters, numbers, hyphens, or
underscores, followed by the theme name and description. For example,
`my_theme` creates a `MyTheme` PHP theme class.

The command installs TypeScript, `ts-loader`, `@types/node`, and
`@types/bootstrap` as npm development dependencies, and Bootstrap 5, Popper,
and Bootstrap Icons as npm dependencies. It is intended to copy the theme's
PHP files to `public/application/themes/<handle>` and its SCSS and TypeScript
sources to `src/themes/<handle>`, leaving existing files in place.

Once the installer is able to complete, edit the theme templates and styles,
and configure a frontend build that suits your project.

## Install system pages

From your Concrete CMS project root, run the system-pages installer:

```bash
./vendor/bin/install-system-pages
```

When prompted, enter the theme handle to use, using only letters, numbers,
hyphens, or underscores. The command copies the provided system page views to
`public/application/views`, leaving existing files in place. It then updates
`public/application/config/app.php` so `/page_not_found`,
`/page_forbidden`, and `/frontend/maintenance_mode` use that theme. Other
configuration values and other theme path entries are preserved.

## Development

Install the package's development dependencies with Composer:

```bash
composer install
```

Useful project commands:

| Command                  | Purpose                                  |
| ------------------------ | ---------------------------------------- |
| `composer test`          | Run PHPUnit tests.                       |
| `composer test-coverage` | Run PHPUnit and print a coverage report. |
| `composer typecheck`     | Run PHPStan analysis.                    |
| `composer format:check`  | Check PHP formatting with PHP-CS-Fixer and formatting with Prettier. |
| `composer format`        | Format PHP files with PHP-CS-Fixer and files supported by Prettier. |

See [CHANGELOG.md](./CHANGELOG.md) for the project history and
[LICENSE.TXT](./LICENSE.TXT) for licensing information.
