## :rocket: Next

### :boom: Breaking changes & Deprecations

### :fire: Additions

### :sparkles: Changes

### :bug: Bugs fixed

### :arrow_up: Deps updates

### :heart: Community contributions by (Thank you!)

# 1.1.1
### :fire: Additions
Add Easyshortener version to admin panel \
Allow collapsing the navigation for the admin panel on desktop \
The ability to completely disable analytics for all links on an installation \
Search links \
Sort by enabled / disabled links
### Changes :sparkles:
Add `FORCE_HTTPS` to force HTTPS for your Easyshortener installation
Add `EASYSHORTENER_ALLOW_ANALYTICS` to disable redirect tracking for all links
### :bug: Bugs fixed
Fixed registration catcher to look nicer
### :arrow_up: Deps updates
Add [FilamentVersions](https://github.com/awcodes/filament-versions) `1.0.2`

# 1.1.0

### :boom: Breaking changes & Deprecations
Replace **vinkla/hashids** with **str**
### Additions :fire:
Add two factor authentication \
Add administrative backend \
Add user role management \
Add deletion functionality to links \
Add notifications \
Add basic CLI
### Changes :sparkles:
Change authentication design \
Change **DatabaseSeeder.php** \
Change **Boot.php**
### Bug Fixes :bug:
Editing sometimes deletes links \
Links had a 25% chance of not being created

# 1.0.0
Initial Release
