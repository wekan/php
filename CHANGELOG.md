# Upcoming Wekan-php release

This release adds the following new features:

- While auth has not been implemented yet,
  [added autologin, and selecting login page, or still empty pages](https://github.com/wekan/php/commit/562a3269dd96ea6ae377d6bea0c1bdbfc9310dd6):
    - Sign Up
    - Forgot Password
    - All Boards, One Board, Board Settings
    - Swimlane, Swimlane Settings
    - One Card, Card Settings
    - Search All Boards
    - My Cards
    - Calendar
    - Gantt
    - Admin Panel
  Thanks to xet7.
- [Added back some original Wekan fonts.
  Changed autologin to index page with links to current visible pages.
  Moved settings from `index.php` to `settings.php`.
  Separate modern browser original Wekan style and Amiga webbrowser compatible pages.
  Saved Font Awesome home icon as `public/img/home.png` so it's visible at Amiga webbrowser,
  that does not support webfonts and SVG](https://github.com/wekan/wekan/commit/82867ebab44bee5ecdb4fd6f773976d76c92ba37).
- [Use php8. Added defaultlang. Updated code repo path. Updated logo paths](https://github.com/wekan/php/commit/34abd4a60cbc856c65ea9c38acbbe7b928097a5b).
  Thanks to xet7.

and adds the following updates:

- Updated `README.md` with links to ChangeLog and releases RSS feed
  [Part 1](https://github.com/wekan/php/commit/667d019ee68a56e926b55032e277956cdc8436fe),
  [Part 2](https://github.com/wekan/php/commit/ea6ac3e5fa38ed3a5d044a324dc5bfe2fa851517),
  [Part 3](https://github.com/wekan/php/commit/d9d799c3129161ac6705a4869b5488787ac9a6be),
  [Part 4](https://github.com/wekan/php/commit/9145f210a1a062ec706a573b8a9d44d43ee5d5b4).
  Thanks to xet7.
- [Moved not-in-use css from `public` to `public/css`](https://github.com/wekan/php/commit/a02c4d892f2f92904a85c56b6ffa63e8c0e96df9).
  Thanks to xet7.
- [Removed duplicate ChangeLog](https://github.com/wekan/php/commit/06f360c927c6170c7d5b53d01c2e37d70d312391).
  Thanks to xet7.
- [Updated `install-php-deps.sh` scripts for more detailed install info](https://github.com/wekan/php/commit/b0f953374cf16b8177fe4cef6c7bad00e11a79f9).
  Thanks to xet7.

and fixes the following bugs:

- [Added missing dependencies](https://github.com/wekan/wekan/commit/5c034fb8c4ad1878b30bf385fda301ad9386e0ee).
  Thanks to ViOffice.

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
- `public/` where added [prototype 2](https://github.com/wekan/php/commit/f15a00be76c429bfa798fa62fbcd3c23db7f30f8) of Wekan-php
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
