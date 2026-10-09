# ThemeKit

ThemeKit provides starter files and an installer for building themes for
[Concrete CMS](https://www.concretecms.org/). It scaffolds a theme's PHP
templates, Sass stylesheets, and TypeScript, with a Bootstrap-based asset
setup.

## What it provides

- A Concrete CMS theme skeleton with page templates, shared header and footer
  elements, navigation, and a starter `PageTheme` class.
- Organized Sass and TypeScript starter files for theme, block, element, and
  template code.
- Root-level `webpack.mix.js` and `tsconfig.json` starter configuration.
- An installer command that creates the theme directories, copies starter
  resources, and installs the npm dependencies used by the scaffold.

## Requirements

- A Composer-managed Concrete CMS project.
- PHP and Composer.
- Node.js and npm, for the installer and frontend dependencies.
- Access to the Composer registry hosting `limegreentangerine/lgt_toolkit`,
  which ThemeKit requires.

The package's development configuration uses Concrete CMS 9.2 and PHP 8.4.

## Install

Add ThemeKit to your Concrete CMS project:

```bash
composer require limegreentangerine/theme_kit
```

## Create a theme

From the project root directory where you want npm dependencies installed, run:

```bash
./vendor/bin/install-themekit-resources
```

When prompted, enter a theme handle using only letters, numbers, hyphens, or
underscores. For example, `my_theme` creates a `MyTheme` PHP theme class.

The command installs TypeScript, webpack tooling, Bootstrap, Popper, and
Bootstrap Icons with npm, then copies the theme skeleton and source resources.
It creates the theme's PHP files under `public/application/themes/<handle>` and
its Sass and TypeScript sources under `src/themes/<handle>`. It also copies
`webpack.mix.js` and `tsconfig.json` to the directory above the Composer
project root.

Existing files in the theme's Sass, TypeScript, and public theme directories
are left in place rather than replaced. The root configuration files are copied
to their destination and may overwrite files with the same names, so back up
custom configurations before running the installer.

After installation, update the generated `PageTheme` name and description,
edit the templates and theme styles, and configure the frontend build for your
project. The copied webpack configuration is a starting point; adjust its
entry points and output paths to match your application.

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
| `composer format:check`  | Check PHP and JavaScript formatting.     |
| `composer format`        | Format PHP and JavaScript files.         |

See [CHANGELOG.md](./CHANGELOG.md) for the project history and
[LICENSE.TXT](./LICENSE.TXT) for licensing information.
