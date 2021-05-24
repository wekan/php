# Upcoming Wekan-php release

This release adds the following changes:

- Updated README.md with links to ChangeLog and releases RSS feed
  [Part 1](https://github.com/wekan/wekan-php/commit/667d019ee68a56e926b55032e277956cdc8436fe),
  [Part 2](https://github.com/wekan/wekan-php/commit/ea6ac3e5fa38ed3a5d044a324dc5bfe2fa851517),
  [Part 2](https://github.com/wekan/wekan-php/commit/d9d799c3129161ac6705a4869b5488787ac9a6be).
  Thanks to xet7.

Thanks to above GitHub users for their contributions and translators for their translations.

# v0.02 2021-05-24 Wekan-php release

This release has these still missing:

- Webp screenshots
- Not implemented yet: Actual login with checking username and password
- Other pages

and adds the following changes:

- Renamed Wekan-php v0.01 `public` directory to `old-public`
- `LICENSE` Updated year
- `SECURITY.md` removed extra text, added newest changes about PGP key etc.
- `CONTRIBUTING.md` changed text to be about being nice.

and adds the following new features:

- `releases/` scripts for adding tags, updating changelog, updating translations
- `public/` where added [prototype 2](https://github.com/wekan/wekan-php/commit/f15a00be76c429bfa798fa62fbcd3c23db7f30f8) of Wekan-php
- `screenshots/` now has screenshots of:
  - `prototype 1 board netsurf` that I have not tried to find old code yet.
  - `prototype 2 wekan php` that is current prototype, showing Amiga AWeb and Netsuft browsers.
- `public/index.php` Login page
  - Implemented:
    - Browser support with HTML4 and with minimal formatting: Lynx, Netsurf, WinXP IE6, Amiga m68k AWeb and IBrowse
    - Translations: Detect browser language, load that language JSON translation, translate login page
    - Hide Logo
    - Custom:
      - Product Name
      - Meta tags
        - Manifest
        - Icons
        - Icon Colors
        - Theme Color
      - Font
      - Backgroud Color
      - Login Logo
        - Image URL
        - Image Width
        - Image Height
        - Link URL
      - Text Below Login Logo
      - Top Left Corner Logo
        - Image URL
        - Image Width
        - Image Height
        - Link URL
      - Custom URL Schemes
    - `debug = true`
      - PHP INI error reporting all
      - Showing all PHP server and browser variables
  - `install-php-deps.sh` install script for PHP 7 (or 8) dependencies on Ubuntu based distros
  - `public/mongo.php` making database query to Snap Meteor Wekan MongoDB database
  - `public/register.html` only HTML/CSS for register page that has not been yet added to `index.php`
  - Optional. Note: `index.php` does not have this by default, it has only minimal formatting.
    - `public/style.css`: All of Meteor Wekan CSS, without login.css
    - `public/login.css`: minimal Meteor Wekan style CSS.

# v0.01 2019-08-01 Wekan-php release

This release adds the following new features:

- Recursively list subdirectories and echo commands that would convert stylys .styl files to .css
  Thanks to xet7.

Thanks to above GitHub users for their contributions and translators for their translations.
