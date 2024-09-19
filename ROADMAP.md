## Roadmap

2024-09-17:
- (This text was moved from page/board.php to this ROADMAP.md)
- Listening to about Ember at JS Party #330 from https://changelog.com/jsparty
  - It's amazing how in podcast Ember made possible automatic upgrades for a long time
  - About abstractions, how realtime updates are hard
  - => Ember podcast: Push Push Pull 1h 6min 0sec. Reactive data system.
       When it's good to use what kind of system?
       Plugins for different reactivity systems? Need cache?
       Or presentation layer in front of cache? Schema?
       Properties that do not exists in cache<=> serialized state patch,
       or IndexDB for cross-tab for all web browser tabs?
       And dedupe, avoid thundering herd?
  - Ember designing for upgradeability, that keeps Ember winning.
    Does any other web framework design for upgradeability?
    A lot of design and discussion so that everyone understands.
  - Ember provided many years of stability of framework
    to build upon for big companies, and internally improving framework.
- Realtime updates at Meteor 2 Node.js/MongoDB:
  - Too much data is loaded to browserside
  - Does not work with big boards
- This PHP/SQLite code in this file:
  - This PHP file currently loads one kanban board from SQLite database.
  - Swimlanes are in correct order.
  - Cards are in wrong order.
- TODO for PHP/MongoDB and other DBs:
  - Why PHP, even for temporary step? There is no build step. Save file, reload webpage.
    At other frameworks there is often some long build step.
  - Keep database structure the same. Read any version of MongoDB or other DB.
  - MongoDB: Read directly one card from left top of kanban board.
  - Only read some cards, that are visible.
  - If user moves to right/left/up/down, load more cards etc.
  - Later, using timer, check is there updates to only visible data.
  - Each visible component to have code, that takes card, is it visible,
    and is there changes.
  - Reading structure of templates from existing WeKan/client/components/*.jade
    and transpiling it to use at webpage.
  - Multitenancy: Use same code to host many domains for many kanbans
  - Multi database: Use many databases with same syntax:
     a) PHP https://www.doctrine-project.org or https://adodb.org
        or some other for MongoDB and SQL databases
     b) Python Web2py DAL https://www.web2py.com
     c) Javascript NPM package TypeORM or https://kysely.dev with https://hono.dev
  - Supporting all modern and legacy web browsers. Fixes for Amiga AWeb, Dillo etc.
  - UI Designer to create or clone any app, similar like Multiverse plans
    https://github.com/wekan/wekan/wiki/WeKan-Multiverse-Roadmap

Accessibility:
  - Examples like https://github.com/wekan/wekan/issues/459#issuecomment-869068958
  - http://whatsock.com
    - https://github.com/whatsock/apex
  - But, can enough accessibility work with and without Javascript,
    so that user experience would be mostly the same for all browsers?
    With graceful degradation? Lowest common denominator?
    And high-end features where available? So that UI would not be browser-specific.
    When Javascript works, it would possible more convenience features,
    but also work well without Javascript at frontend?
  - For dragging many cards at once with multitouch, looking at https://interactjs.io
    (or alternatively multitouch demo of https://www.bbcbasic.co.uk/bbcsdl/ )
  - Thinking about PI Plannning/Red Strings https://github.com/wekan/wekan/issues/3392,
    what would work well with accessibility

Speaking menus:

- Windows: JAWS
- Amiga: Say
- Etc

Hierarchy levels:

1. Board
2. Swimlane
3. List
4. Card
  1. Title
  2. Description
  3. Members
  4. Etc.

For each hierarchy position:

1. Actions
  1. Move
  2. Copy
  3. Etc.

Search:

- Search by text at title of Board, Swimlane, etc
- Search name of board member
- Pagination of board names, like 10 per page. Go to page number like 4 of 20.
