=== Stream ===
Contributors:      lukecarbis, fjarrett, stream, xwp
Tags:              wp stream, stream, activity, logs, track
Requires at least: 3.9
Tested up to:      4.9.5
Stable tag:        3.2.3
License:           GPLv2 or later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html

Planes have a black box, WordPress has Stream. When something goes wrong, you need to know how it happened.

== Description ==

With Stream, you're never left in the dark about WordPress Admin activity.

Every logged-in user action is displayed in an activity stream and organized for easy filtering by User, Role, Context, Action or IP address.

For advanced users, Stream also supports a Multisite view of all activity records on your network, the ability to set exclude rules to ignore certain kinds of user activity, and a WP‑CLI command for querying records.

Stream is perfect for keeping tabs on your clients. When something breaks, Stream is there to help. See what changed and who changed it.

**Built-In Tracking Integrations For Popular Plugins:**

 * Advanced Custom Fields
 * bbPress
 * BuddyPress
 * Easy Digital Downloads
 * Gravity Forms
 * Jetpack
 * User Switching
 * WooCommerce
 * WordPress SEO by Yoast

**Built-In Tracking For Core Actions:**

 * Posts
 * Pages
 * Custom Post Types
 * Users
 * Themes
 * Plugins
 * Tags
 * Categories
 * Custom Taxonomies
 * Settings
 * Custom Backgrounds
 * Custom Headers
 * Menus
 * Media Library
 * Widgets
 * Comments
 * Theme Editor
 * WordPress Core Updates

**Other Noteworthy Features:**

 * Multisite view of all activity records on a network
 * Limit who can view user activity records by user role
 * Set exclude rules to ignore certain kinds of user activity
 * Live updates of user activity records in the Stream
 * Export your Activity Stream as a CSV or JSON file
 * WP-CLI command for querying records

**See room for improvement?**

Great! There are several ways you can get involved to help make Stream better:

1. **Report Bugs:** If you find a bug, error or other problem, please report it! You can do this by [creating a new topic](https://wordpress.org/support/plugin/stream) in the plugin forum. Once a developer can verify the bug by reproducing it, they will create an official bug report in GitHub where the bug will be worked on.
2. **Suggest New Features:** Have an awesome idea? Please share it! Simply [create a new topic](https://wordpress.org/support/plugin/stream) in the plugin forum to express your thoughts on why the feature should be included and get a discussion going around your idea.
3. **Issue Pull Requests:** If you're a developer, the easiest way to get involved is to help out on [issues already reported](https://github.com/x-team/wp-stream/issues) in GitHub. Be sure to check out the [contributing guide](https://github.com/x-team/wp-stream/blob/master/contributing.md) for developers.

Thank you for wanting to make Stream better for everyone!

== Screenshots ==

1. Every logged-in user action is displayed in an activity stream and organized for easy filtering and searching.
2. Enable live updates in Screen Options to watch your site activity appear in near real-time.
3. Create rules for excluding certain kinds of records from appearing in Stream.

== Changelog ==

= 3.2.3 - April 23, 2018 =

* New: Use minimized assets ([#973](https://github.com/xwp/stream/pull/973))
* New: Alert type – Slack alerts! ([#970](https://github.com/xwp/stream/pull/970) [#962](https://github.com/xwp/stream/pull/962))
* Fix: PHP 7.1 compatibility fix ([#974](https://github.com/xwp/stream/pull/974))
* Fix: Make reset nonce unique ([#972](https://github.com/xwp/stream/pull/972))
* Fix: Stripped settings and alerts inputs ([#968](https://github.com/xwp/stream/pull/968))
* Fix: Update Datetime extension ([#966](https://github.com/xwp/stream/pull/966))
* Fix: WP CLI Namespace collision ([#944](https://github.com/xwp/stream/pull/944))
* Tweak: Coding standards updates ([#975](https://github.com/xwp/stream/pull/975))
* Tweak: Show real client IP (if available) when in reverse-proxy mode ([#969](https://github.com/xwp/stream/pull/969) [#963](https://github.com/xwp/stream/pull/963))
* Tweak: Performance improvement when listing roles ([#964](https://github.com/xwp/stream/pull/964))

Props [@DavidCramer](https://github.com/DavidCramer), [@lukecarbis](https://github.com/lukecarbis), [@frozzare](https://github.com/frozzare), [@fjarrett](https://github.com/fjarrett), [@shadyvb](https://github.com/shadyvb), [@valendesigns](https://github.com/valendesigns), [@robbiet480](https://github.com/robbiet480), [@cfoellmann](https://github.com/cfoellmann)

= 3.2.2 - September 13, 2017 =

* Fix: Prevent fatal error when attempting to store an Object in the database.

= 3.2.1 - September 8, 2017 =

* New: Support for the ACF Options page. ([#931](https://github.com/xwp/stream/pull/931))
* New: Added minimal composer file. ([#932](https://github.com/xwp/stream/pull/932)
* Tweak: Remove dependence on serializing functions. ([#939](https://github.com/xwp/stream/pull/939))
* Tweak: Add wp_stream_is_record_excluded filter. ([#921](https://github.com/xwp/stream/pull/921))
* Fix: Readme spelling fixes (localised [sic] for en_US). ([#928](https://github.com/xwp/stream/pull/928))
* Fix: Undefined index ID issue when trashing post with customize-posts. ([#936](https://github.com/xwp/stream/pull/936))
* Fix: Stream fails to install properly (sometimes) due to database error. ([#934](https://github.com/xwp/stream/pull/934))
* Fix: Stream is network activated if it's a must-use plugin on a multisite ([#956](https://github.com/xwp/stream/pull/956))

= 3.2.0 - March 15, 2017 =

* New: Stream now support alternate Database Drivers. ([#889](https://github.com/xwp/stream/pull/889))
* Fix: Exclude dropdown menus ([e5c8677](https://github.com/xwp/stream/commit/e5c8677), [3626ba8](https://github.com/xwp/stream/commit/3626ba8), [e923a92](https://github.com/xwp/stream/commit/e923a92))
* Fix: Prevent loading of connectors on frontend ([ed3a635](https://github.com/xwp/stream/commit/ed3a635))
* Fix: Customizer performance issue ([#898](https://github.com/xwp/stream/pull/898))
* Fix: Various Network Admin bugs ([#899](https://github.com/xwp/stream/pull/899))
* Tweak: Codeclimate & Editorconfig support ([#896](https://github.com/xwp/stream/pull/896))
* Tweak: Better DB migration support ([#905](https://github.com/xwp/stream/pull/905))

= 3.1.1 - October 31, 2016 =

* Fix: Hotfix for Error Updating Stream DB.

= 3.1 - October 31, 2016 =

* New: Stream Alerts is here! Get notified when something happens in your WP-Admin, so that you don't miss a thing. ([#844](https://github.com/xwp/stream/pull/844))
* Tweak: Better support for the latest version of Yoast SEO ([#838](https://github.com/xwp/stream/pull/838))
* Tweak: Better support for the latest version of WooCommerce ([#851](https://github.com/xwp/stream/pull/851)[#864](https://github.com/xwp/stream/pull/864))
* Tweak: Better taxonomy labeling ([#859](https://github.com/xwp/stream/pull/859))
* Fix: Fatal error caused by conflict with Yoast SEO ([#879](https://github.com/xwp/stream/pull/879))
* Fix: Activating Stream through WP CLI now works ([#880](https://github.com/xwp/stream/pull/880))
* Fix: Custom roles track properly ([#836](https://github.com/xwp/stream/pull/836))

Props [@chacha](https://github.com/chacha), [@lukecarbis](https://github.com/lukecarbis), [@johnbillion](https://github.com/johnbillion), [@rheinardkorf](https://github.com/rheinardkorf), [@frozzare](https://github.com/frozzare), [@johnregan3](https://github.com/johnregan3), [@jacobschweitzer](https://github.com/jacobschweitzer), [@wrongware](https://github.com/wrongware)

= 3.0.7 - June 14, 2016 =

* Tweak: Use get_sites instead of wp_get_sites when available ([#856](https://github.com/xwp/stream/pull/856))
* Tweak: More stable record actions (like exporting) ([71e6ac1](https://github.com/xwp/stream/commit/71e6ac1ff66e4415909c7ae29b243733a1fd209d))
* Tweak: Better multisite support ([cfab041](https://github.com/xwp/stream/commit/cfab0413e67b83d969bd6612c895ecdb05dbfce4))
* Fix: Exclude rule settings have been restored and enhanced ([#855](https://github.com/xwp/stream/pull/855))
* Fix: Loading users via ajax ([#854](https://github.com/xwp/stream/pull/854))
* Fix: Use the correct label for events relating to taxonomies which are registered late ([#859](https://github.com/xwp/stream/pull/859))

Props [@chacha](https://github.com/chacha), [@lukecarbis](https://github.com/lukecarbis), Eugene Kireev, [@johnbillion](https://github.com/johnbillion)

= 3.0.6 - May 31, 2016 =

* New: Better support for default themes ([#831](https://github.com/xwp/stream/pull/831))
* New: Upgrade filter menus to Select2 4 ([c3f6c65](https://github.com/xwp/stream/commit/c3f6c65c1bd95cebb26da7f00a720050a9144586))
* Fix: Security Fixes
* Fix: Cron for purging old records has been fixed ([#843](https://github.com/xwp/stream/pull/843))
* Fix: Better at storing records for Super Admins ([#835](https://github.com/xwp/stream/pull/835))
* Fix: Allow Super Admins to be ignored and filtered ([#835](https://github.com/xwp/stream/pull/835))

Props [@chacha](https://github.com/chacha), [@lukecarbis](https://github.com/lukecarbis), [@marcin-lawrowski](https://github.com/marcin-lawrowski)

= 3.0.5 - March 15, 2016 =

* New: Export your Stream records as CSV or JSON. ([#823](https://github.com/xwp/stream/pull/823))
* Tweak: More mobile responsive list table ([#810](https://github.com/xwp/stream/pull/810))
* Tweak: Better Javascript conflict prevention ([#812](https://github.com/xwp/stream/pull/812))
* Tweak: Minor styling updates. It's about attention to detail. ([#826](https://github.com/xwp/stream/pull/826))
* Fix: Gravity Forms error when adding a note ([#811](https://github.com/xwp/stream/pull/811))
* Fix: In some instances, custom roles weren't being logged by Stream ([#824](https://github.com/xwp/stream/pull/824))
* Fix: The Customizer fix you've been waiting for! Stream now properly records changes made from the Customizer. ([#827](https://github.com/xwp/stream/pull/827))

Props [@chacha](https://github.com/chacha), [@lukecarbis](https://github.com/lukecarbis), [@Stayallive](https://github.com/Stayallive), [@barryceelen](https://github.com/barryceelen), Jonathan Desrosiers, [@marcin-lawrowski](https://github.com/marcin-lawrowski)

= 3.0.4 - November 27, 2015 =

* Tweak: Better descriptions when a post changes status ([0eada10](https://github.com/xwp/stream/commit/0eada108b443ed3b6f9bdae3f1e4c87c77128a0a))
* Fix: Stream no longer crashes every time it tries to use a Jetpack ([#798](https://github.com/xwp/stream/pull/798))
* Fix: You may now actually choose an item from the filter dropdown menus, instead of having everything greyed out ([#800](https://github.com/xwp/stream/pull/800))
* Fix: Logging in / out of a Multisite install is now possible ([#801](https://github.com/xwp/stream/pull/801))
* Fix: The Settings connector now works with WP CLI ([78a56b2](https://github.com/xwp/stream/commit/78a56b2c6b33b4f41c7b4f1f256a4d03ad42b2cb))

Props [@lukecarbis](https://github.com/lukecarbis)

= 3.0.3 - November 6, 2015 =

* Tweak: Better compatibility with upcoming WordPress 4.4 ([2b2493c](https://github.com/xwp/stream/commit/2b2493ccb3ef6cba5aeb773433fdb5f0d414e8f3))
* Tweak: Minor security improvements
* Fix: New and improved Gravity Forms connector, works much better ([#780](https://github.com/xwp/stream/pull/780)) (thanks [Rob](https://github.com/rob)!)
* Fix: Stream no longer explodes on < PHP 5.3, when trying to tell you that it explodes on < PHP 5.3 ([#781](https://github.com/xwp/stream/pull/781))
* Fix: Fixed a smal typo ([62455c5](https://github.com/xwp/stream/commit/62455c518b95ddaf5e6c6c0733e7d03e5aa1311c))
* Fix: Multiple Multisite Mistakes Mended ([#788](https://github.com/xwp/stream/pull/788))
* Fix: Internet Explorer 8 fix!! IE8!? Come on, people, it's 2015. ([#789](https://github.com/xwp/stream/pull/789))
* Fix: EDD connector bug ([#790](https://github.com/xwp/stream/pull/790))

Props [@lukecarbis](https://github.com/lukecarbis), [@rob](https://github.com/rob), [greguly](https://github.com/greguly)

= 3.0.2 - October 2, 2015 =

* Tweak: Helper function for running Stream queries added ([#774](https://github.com/xwp/stream/pull/774))
* Tweak: Migration dialog removed ([76e809f](https://github.com/xwp/stream/commit/76e809f9abb3dd691b755cf943b50a76a3ffb488))
* Tweak: Better handling of draft saving and auto-saving ([#775](https://github.com/xwp/stream/pull/775))
* Tweak: Records page title size now matches other admin pages ([afcced8](https://github.com/xwp/stream/commit/afcced8b590e047e8adfe6ae79483a7436c849f4))
* Fix: Database update dialog is now displayed correctly ([#773](https://github.com/xwp/stream/pull/773))
* Fix: The record's connector was being incorrectly stored as the connector name ([#773](https://github.com/xwp/stream/pull/773))
* Fix: Record action links are back ([#773](https://github.com/xwp/stream/pull/773))
* Fix: Jetpack is now able to connect without error while Stream is active ([#768](https://github.com/xwp/stream/pull/768))
* Fix: Reset Filters text no longer wraps to a second line ([#765](https://github.com/xwp/stream/pull/765))

Props [@lukecarbis](https://github.com/lukecarbis), Props [@sirjonathan](https://github.com/sirjonathan)

= 3.0.1 - September 2, 2015 =

* New: Stream and [User Switching](https://wordpress.org/plugins/user-switching/) are now besties ([#744](https://github.com/xwp/stream/pull/744))
* New: You can now choose to keep your records indefinitely (probably not a good idea) ([#748](https://github.com/xwp/stream/pull/748))
* Tweak: We're now using local styles for our datepicker, instead of loading them externally ([#751](https://github.com/xwp/stream/pull/751))
* Fix: Updating from version 1.4.9 no longer breaks your records ([#749](https://github.com/xwp/stream/pull/749))
* Fix: Stream now works with custom wp-content folder locations ([#745](https://github.com/xwp/stream/pull/745))
* Fix: Live updates work again ([#739](https://github.com/xwp/stream/pull/739))

Props [@lukecarbis](https://github.com/lukecarbis), [@johnbillion](https://github.com/johnbillion), [@rob](https://github.com/rob)

= 3.0.0 - August 25, 2015 =

* New: Activity logs are now stored locally in WordPress. No data is sent externally and no registration required.
* New: Migration process for Stream 2 users to move records out of the cloud, and into your local database.
* New: Various measures and database schema changes to improve Stream's performance.
* Removed: Notifications and Reports have been removed to be reworked for an upcoming release.

Props [@fjarrett](https://github.com/fjarrett), [@lukecarbis](https://github.com/lukecarbis)

= 2.0.5 - April 23, 2015 =

* Tweak: Compatibility with split terms introduced in WordPress 4.2 ([#702](https://github.com/wp-stream/stream/issues/702))
* Tweak: Add support for future and pending post transitions ([#716](https://github.com/wp-stream/stream/pull/716))
* Tweak: Match new default admin colors introduced in WordPress 4.2 ([#718](https://github.com/wp-stream/stream/pull/718))
* Fix: Compatibility issues with WP-Cron Control plugin and system crons ([#715](https://github.com/wp-stream/stream/issues/715))
* Fix: Broken date range filter on Reports screen ([#717](https://github.com/wp-stream/stream/pull/717))

Props [@fjarrett](https://github.com/fjarrett)

= 2.0.4 - April 16, 2015 =

* New: Add reset button to reset search filters ([#144](https://github.com/wp-stream/stream/issues/144))
* Tweak: WP-CLI command output improvements via `--format` option for table view, JSON and CSV ([#705](https://github.com/wp-stream/stream/pull/705))
* Tweak: Add link to https://wp-stream.com in README ([#709](https://github.com/wp-stream/stream/issues/709))
* Tweak: Better highlighting on multiple live update rows
* Tweak: Limit custom range datepickers based on the Stream plan type
* Tweak: Limit legacy record migrations based on the Stream plan type
* Fix: Allow properties with values of zero to be included in queries ([#698](https://github.com/wp-stream/stream/issues/698))
* Fix: Properly return record success/failure in log and store methods ([#711](https://github.com/wp-stream/stream/issues/711))

Props [@fjarrett](https://github.com/fjarrett), [@szepeviktor](https://github.com/szepeviktor)

= 2.0.3 - January 23, 2015 =

* New: WP-CLI command now available for querying records via the command line ([#499](https://github.com/wp-stream/stream/issues/499))
* Tweak: Silently disable Stream during content import ([#672](https://github.com/wp-stream/stream/issues/672))
* Tweak: Search results now ordered by date instead of relevance ([#689](https://github.com/wp-stream/stream/issues/689))
* Fix: Handle boolean values appropriately during wp_stream_log_data filter ([#680](https://github.com/wp-stream/stream/issues/680))
* Fix: Hook into external class load methods on init rather than plugins_loaded ([#686](https://github.com/wp-stream/stream/issues/686))
* Fix: N/A user not working in exclude rules ([#688](https://github.com/wp-stream/stream/issues/688))
* Fix: Prevent Notification Rule meta from being saved to all post types ([#693](https://github.com/wp-stream/stream/issues/693))
* Fix: PHP warning shown for some users when deleting plugins ([#695](https://github.com/wp-stream/stream/issues/695))

Props [@fjarrett](https://github.com/fjarrett)

= 2.0.2 - January 15, 2015 =

* New: Full record backtrace now available to developers for debugging ([#467](https://github.com/wp-stream/stream/issues/467))
* New: Unread count badge added to Stream menu, opt-out available in User Profile ([#588](https://github.com/wp-stream/stream/issues/588))
* New: Stream connector to track Stream-specific contexts and actions ([#622](https://github.com/wp-stream/stream/issues/622))
* Tweak: Inherit role access from Stream Settings for Notifications and Reports ([#641](https://github.com/wp-stream/stream/issues/641))
* Tweak: Opt-in required for Akismet tracking ([#649](https://github.com/wp-stream/stream/issues/649))
* Tweak: Ignore comments deleted when deleting parent post ([#652](https://github.com/wp-stream/stream/issues/652))
* Tweak: Opt-in required for comment flood tracking ([#656](https://github.com/wp-stream/stream/issues/656))
* Tweak: Opt-in required for WP Cron tracking ([#673](https://github.com/wp-stream/stream/issues/673))
* Fix: Post revision action link pointing to wrong revision ID ([#585](https://github.com/wp-stream/stream/issues/585))
* Fix: PHP warnings caused by Menu connector ([#663](https://github.com/wp-stream/stream/issues/663))
* Fix: Non-static method called statically in WPSEO connector ([#668](https://github.com/wp-stream/stream/issues/668))
* Fix: Prevent live updates from tampering with filtered results ([#675](https://github.com/wp-stream/stream/issues/675))

Props [@fjarrett](https://github.com/fjarrett), [@lukecarbis](https://github.com/lukecarbis), [@shadyvb](https://github.com/shadyvb), [@jonathanbardo](https://github.com/jonathanbardo), [@westonruter](https://github.com/westonruter)

= 2.0.1 - September 30, 2014 =

* Tweak: Improved localization strings throughout the plugin ([#644](https://github.com/wp-stream/stream/pull/644))
* Tweak: Improved tooltip text explaining WP.com sign in
* Fix: ACF Pro doesn't save custom field values when Stream enabled ([#642](https://github.com/wp-stream/stream/issues/642))

Props [@lukecarbis](https://github.com/lukecarbis), [@fjarrett](https://github.com/fjarrett)

= 2.0.0 - September 27, 2014 =

* All activity is now stored only in the cloud over SSL, local MySQL storage dependence is over!
* Connector and Context have merged in the UI, now just called Contexts
* The Exclude Rules UI has been completely revamped
* Notifications and Reports are now conveniently built into Stream for Pro subscribers
* Connectors for tracking other popular plugins are now built into Stream, like BuddyPress, Jetpack, Gravity Forms, and more...
* You create an account for Stream simply by signing in with your WordPress.com ID

**NOTE:** Multisite view of all activity records in the Network Admin has been removed in this release. If you require this feature, please do not update Stream until version 2.1.0 is released.

Props [@fjarrett](https://github.com/fjarrett), [@lukecarbis](https://github.com/lukecarbis), [@shadyvb](https://github.com/shadyvb), [@chacha](https://github.com/chacha), [@jonathanbardo](https://github.com/jonathanbardo), [@bordoni](https://github.com/bordoni), [@dero](https://github.com/dero), [@jeffmatson](https://github.com/jeffmatson), [@stipsan](https://github.com/stipsan), [@c3mdigital](https://github.com/c3mdigital), [@adamsilverstein](https://github.com/adamsilverstein), [@westonruter](https://github.com/westonruter), [@japh](https://github.com/japh), [@solace](https://github.com/solace), [@johnbillion](https://github.com/johnbillion)

= 1.4.9 - July 23, 2014 =

* Fix: Revert delayed log mechanism for post transition ([#585](https://github.com/x-team/wp-stream/issues/585))
* Fix: Revert usage of get_taxonomy() ([#586](https://github.com/x-team/wp-stream/pull/586))
* Fix: Notices not firing on correct action ([#589](https://github.com/x-team/wp-stream/issues/589))

Props [@shadyvb](https://github.com/shadyvb), [@fjarrett](https://github.com/fjarrett)

= 1.4.8 - July 18, 2014 =

* New: Greatly improved widget tracking, including changes performed in Customizer ([#391](https://github.com/x-team/wp-stream/pull/391))
* New: Now tracking when Akismet automatically marks comments as spam ([#587](https://github.com/x-team/wp-stream/pull/587))
* Tweak: Log WP-CLI details to Stream author meta ([#470](https://github.com/x-team/wp-stream/issues/470))
* Tweak: Track changes to options more deeply ([#573](https://github.com/x-team/wp-stream/pull/573))
* Fix: Labels not seen for CPT registered on init with default priority ([#565](https://github.com/x-team/wp-stream/issues/565))
* Fix: Stream menu appearing in Network menu when not network activated ([#582](https://github.com/x-team/wp-stream/issues/582))
* Fix: Post Revision ID associated to record is not the most recent one ([#585](https://github.com/x-team/wp-stream/issues/585))
* Fix: Incorrect action label for comment throttling ([#591](https://github.com/x-team/wp-stream/issues/591))

Props [@westonruter](https://github.com/westonruter), [@fjarrett](https://github.com/fjarrett), [@shadyvb](https://github.com/shadyvb), [@lukecarbis](https://github.com/lukecarbis), [@chacha](https://github.com/chacha)

= 1.4.7 - June 27, 2014 =

* New: Comment Type support added to the Comments connector ([#558](https://github.com/x-team/wp-stream/issues/558))
* Fix: Datepicker opens again with each paged view ([#568](https://github.com/x-team/wp-stream/issues/568))
* Fix: PHP warning when deleting network users ([#579](https://github.com/x-team/wp-stream/issues/579))
* Fix: Track user count setting changes ([#583](https://github.com/x-team/wp-stream/issues/583))
* Fix: .po and .pot files out-of-date for translators ([#584](https://github.com/x-team/wp-stream/issues/584))

Props [@lukecarbis](https://github.com/lukecarbis), [@fjarrett](https://github.com/fjarrett), [@bordoni](https://github.com/bordoni), [@shadyvb](https://github.com/shadyvb)

= 1.4.6 - May 30, 2014 =

* Tweak: Actions provided for trashed posts are irrelevant ([#523](https://github.com/x-team/wp-stream/issues/523))
* Tweak: Use core language pack translations where possible ([#534](https://github.com/x-team/wp-stream/issues/534))
* Tweak: Consolidate show filter and show column screen options ([#542](https://github.com/x-team/wp-stream/issues/542))
* Tweak: Stop tracking failed login attempts ([#547](https://github.com/x-team/wp-stream/issues/547))
* Tweak: Remove all uses of extract() from Stream ([#556](https://github.com/x-team/wp-stream/issues/556))
* Fix: Excluding roles is not handled properly ([#527](https://github.com/x-team/wp-stream/issues/527))
* Fix: Stream runs install routine twice ([#528](https://github.com/x-team/wp-stream/issues/528))
* Fix: Widget records show sidebar slug instead of label ([#531](https://github.com/x-team/wp-stream/issues/531))
* Fix: Fatal error when PHP version is less than 5.3 ([#538](https://github.com/x-team/wp-stream/issues/538))
* Fix: Cannot exclude Custom Background context ([#543](https://github.com/x-team/wp-stream/issues/543))
* Fix: Conflict with Jetpack body class in WP Admin ([#545](https://github.com/x-team/wp-stream/issues/545))
* Fix: Stream settings exclude error for big wp_users table ([#551](https://github.com/x-team/wp-stream/issues/551))

Props [@fjarrett](https://github.com/fjarrett), [@lukecarbis](https://github.com/lukecarbis), [@shadyvb](https://github.com/shadyvb), [@barryceelen](https://github.com/barryceelen), [@japh](https://github.com/japh)

= 1.4.5 - May 15, 2014 =

* New: Lightweight frontend indicator for sites using Stream ([#507](https://github.com/x-team/wp-stream/issues/507))
* Tweak: Add filterable method for excluded comment types ([#487](https://github.com/x-team/wp-stream/issues/487))
* Tweak: Rename "ID" column label to "Record ID" ([#490](https://github.com/x-team/wp-stream/issues/490))
* Tweak: One admin notice for any missing DB tables ([#506](https://github.com/x-team/wp-stream/pull/506))
* Fix: Custom authentication schemes not tracking user logins correctly ([#434](https://github.com/x-team/wp-stream/issues/434))
* Fix: Taxonomy connector conflicts with Edit Flow plugin ([#498](https://github.com/x-team/wp-stream/issues/498))
* Fix: Switching user is incorrectly tracked ([#501](https://github.com/x-team/wp-stream/issues/501))
* Fix: Extension activation links broken when plugin folders are renamed ([#502](https://github.com/x-team/wp-stream/issues/502))
* Fix: Author info showing up incorrectly ([#505](https://github.com/x-team/wp-stream/issues/505))
* Fix: Incompatibility with multi-server environments ([#517](https://github.com/x-team/wp-stream/issues/517))
* Fix: Warnings seen when Show Avatars is disabled ([#518](https://github.com/x-team/wp-stream/issues/518))
* Fix: Notices for non-existent extension data after timeout ([#529](https://github.com/x-team/wp-stream/pull/529))

Props [@fjarrett](https://github.com/fjarrett), [@shadyvb](https://github.com/shadyvb), [@lukecarbis](https://github.com/lukecarbis), [@japh](https://github.com/japh)

= 1.4.4 - May 6, 2014 =

* New: Admin pointers to highlight when new admin screens are introduced ([#466](https://github.com/x-team/wp-stream/issues/466))
* Tweak: Filter introduced to allow the Stream admin menu position to be changed ([#99](https://github.com/x-team/wp-stream/issues/99))
* Tweak: Provide option label for records that show when the Stream database has updated ([#444](https://github.com/x-team/wp-stream/pull/444))
* Tweak: Better handling of authors in the list table ([#448](https://github.com/x-team/wp-stream/pull/448))
* Tweak: Way for developers to set their Stream Extensions affiliate ID on links from the Extensions screen ([#482](https://github.com/x-team/wp-stream/issues/482))
* Fix: Extensions screen CSS bug in Firefox ([#464](https://github.com/x-team/wp-stream/issues/464))
* Fix: Error when installing extensions from the Network Admin ([#491](https://github.com/x-team/wp-stream/issues/491))
* Fix: Undefined notice in admin.php ([#468](https://github.com/x-team/wp-stream/issues/468))

Props [@westonruter](https://github.com/westonruter), [@fjarrett](https://github.com/fjarrett), [@japh](https://github.com/japh), [@lukecarbis](https://github.com/lukecarbis), [@jonathanbardo](https://github.com/jonathanbardo), [@bordoni](https://github.com/bordoni)

= 1.4.3 - April 26, 2014 =

* New: Introducing the Stream Extensions screen! ([#396](https://github.com/x-team/wp-stream/issues/396))

Props [@jonathanbardo](https://github.com/jonathanbardo), [@lukecarbis](https://github.com/lukecarbis), [@shadyvb](https://github.com/shadyvb), [@c3mdigital](https://github.com/c3mdigital), [@fjarrett](https://github.com/fjarrett)

= 1.4.2 - April 24, 2014 =

* Fix: Update Database button redirecting to previous screen ([#443](https://github.com/x-team/wp-stream/issues/443))
* Fix: Update routine hotfix that was causing records to disappear ([#447](https://github.com/x-team/wp-stream/issues/447))

Props [@jonathanbardo](https://github.com/jonathanbardo), [@lukecarbis](https://github.com/lukecarbis), [@westonruter](https://github.com/westonruter), [@fjarrett](https://github.com/fjarrett)

= 1.4.1 - April 24, 2014 =

* Fix: Scripts and styles not using Stream version number ([#440](https://github.com/x-team/wp-stream/issues/440))
* Fix: WP-CLI incorrectly referenced in records ([#441](https://github.com/x-team/wp-stream/issues/441))

Props [@westonruter](https://github.com/westonruter), [@fjarrett](https://github.com/fjarrett)

= 1.4.0 - April 24, 2014 =

* New: Multisite is now fully supported, activate Stream network-wide ([#65](https://github.com/x-team/wp-stream/issues/65))
* New: Separate API for handling DB update routines ([#379](https://github.com/x-team/wp-stream/issues/379))
* New: WP-CLI compatibility, Stream now tracks changes made via WP-CLI ([#423](https://github.com/x-team/wp-stream/issues/423))
* Tweak: Deprecate functions and hooks in favor of consistent naming conventions ([#267](https://github.com/x-team/wp-stream/issues/267))
* Tweak: Use icon link instead of clicking the summary to filter by object ID ([#380](https://github.com/x-team/wp-stream/issues/380))
* Tweak: Save additional author meta for better records ([#389](https://github.com/x-team/wp-stream/issues/389))
* Tweak: More compact search filters for smaller screens ([#403](https://github.com/x-team/wp-stream/issues/403))
* Fix: Fix AJAX loading of authors in dropdown filters ([#49](https://github.com/x-team/wp-stream/issues/49))
* Fix: Custom capability conflict with W3 Total Cache plugin ([#296](https://github.com/x-team/wp-stream/issues/296))
* Fix: Live updates remove last item in activity table ([#386](https://github.com/x-team/wp-stream/issues/386))
* Fix: Live updates screen option checkbox not persisting ([#392](https://github.com/x-team/wp-stream/issues/392))
* Fix: IP validator not respecting zero ([#394](https://github.com/x-team/wp-stream/issues/394))
* Fix: Non-Administrator users seeing errors in Settings records ([#406](https://github.com/x-team/wp-stream/issues/406))
* Fix: Uninstall confirmation message doesn't display ([#411](https://github.com/x-team/wp-stream/issues/411))
* Fix: TTL purge schedule is never setup ([#412](https://github.com/x-team/wp-stream/issues/412))
* Fix: NextGen compability issue ([#416](https://github.com/x-team/wp-stream/issues/416))
* Fix: Stream Feeds Key not being automatically generated ([#420](https://github.com/x-team/wp-stream/issues/420))

Props [@fjarrett](https://github.com/fjarrett), [@lukecarbis](https://github.com/lukecarbis), [@c3mdigital](https://github.com/c3mdigital), [@westonruter](https://github.com/westonruter), [@shadyvb](https://github.com/shadyvb), [@powelski](https://github.com/powelski), [@johnregan3](https://github.com/johnregan3), [@jonathanbardo](https://github.com/jonathanbardo), [@desaiuditd](https://github.com/desaiuditd)

= 1.3.1 - April 3, 2014 =

* New: Theme Editor connector for tracking changes made to theme files ([#313](https://github.com/x-team/wp-stream/issues/313))
* New: Additional screen options to show/hide only the filters you care about ([#329](https://github.com/x-team/wp-stream/issues/329))
* New: Visibility option in Exclude settings to hide past records from view ([#355](https://github.com/x-team/wp-stream/issues/355))
* New: Stream Activity dashboard widget now supports live updates ([#356](https://github.com/x-team/wp-stream/issues/356))
* New: Hover authors to reveal a tooltip with helpful user meta ([#338](https://github.com/x-team/wp-stream/issues/338))
* New: Hover roles to reveal a tooltip with the number of authors assigned to that role ([#377](https://github.com/x-team/wp-stream/issues/377))
* Tweak: Future dates now disabled in Start date field datepicker ([#334](https://github.com/x-team/wp-stream/issues/334))
* Tweak: Now showing user Gravatars in Exclude Authors & Roles settings field ([#333](https://github.com/x-team/wp-stream/issues/333))
* Tweak: ID column is now hidden by default in Screen Options ([#348](https://github.com/x-team/wp-stream/issues/348))
* Tweak: Widget updated summary message improvement ([8818976](https://github.com/x-team/wp-stream/commit/88189761d4a8836038e8d9ec348096a0aab3072d))
* Fix: Autocomplete not working correctly in Exclude IP Addresses settings field ([#335](https://github.com/x-team/wp-stream/issues/335))
* Fix: Reset Stream Database link not clearing everything in all cases ([#347](https://github.com/x-team/wp-stream/issues/347))
* Fix: PHP 5.3.3 compatibility issue with filter constant ([#351](https://github.com/x-team/wp-stream/issues/351))
* Fix: Predefined date range intervals not honoring the site timezone setting ([#353](https://github.com/x-team/wp-stream/issues/353))
* Fix: wpdb::prepare() notice appearing in WordPress 3.9 ([#354](https://github.com/x-team/wp-stream/issues/354))
* Fix: Invalid argument warning thrown on fresh installations of WordPress ([#358](https://github.com/x-team/wp-stream/issues/358))
* Fix: Record TTL purge not functioning correctly ([#371](https://github.com/x-team/wp-stream/issues/371))
* Fix: Small CSS bug in jQuery UI datepicker skins ([04c80af](https://github.com/x-team/wp-stream/commit/04c80afa99486086612be9f6ad83148dfbbe533a))

Props [@powelski](https://github.com/powelski), [@fjarrett](https://github.com/fjarrett), [@jonathanbardo](https://github.com/jonathanbardo), [@faishal](https://github.com/faishal), [@desaiuditd](https://github.com/desaiuditd), [@lukecarbis](https://github.com/lukecarbis), [@johnregan3](https://github.com/johnregan3), [@Powdered-Toast-Man](https://github.com/Powdered-Toast-Man)

= 1.3.0 - March 12, 2014 =

* New: Exclude tab in Settings to prevent specific types of activity from being tracked ([#251](https://github.com/x-team/wp-stream/issues/251))
* New: Now logging Custom Background and Custom Header changes ([#309](https://github.com/x-team/wp-stream/issues/309))
* New: Predefined date intervals now available when filtering records ([#320](https://github.com/x-team/wp-stream/issues/320))
* Tweak: Action links are now available for Stream Settings records ([#305](https://github.com/x-team/wp-stream/issues/305))
* Tweak: User avatars now displayed in Authors dropdown filter ([#311](https://github.com/x-team/wp-stream/issues/311))
* Tweak: Live updates are enabled by default for new installs ([#312](https://github.com/x-team/wp-stream/issues/312))
* Fix: Fallback to the term slug if a label does not exist in list-table ([#214](https://github.com/x-team/wp-stream/issues/214))
* Fix: Widget sorting is now being tracked properly as well as Inactive widgets ([#283](https://github.com/x-team/wp-stream/issues/283))
* Fix: Superfluous auto-draft posts are now prevented from being logged ([#293](https://github.com/x-team/wp-stream/issues/293))

Props [@powelski](https://github.com/powelski), [@faishal](https://github.com/faishal), [@fjarrett](https://github.com/fjarrett), [@desaiuditd](https://github.com/desaiuditd), [@lukecarbis](https://github.com/lukecarbis), [@shadyvb](https://github.com/shadyvb)

= 1.2.9 - March 8, 2014 =
Fixes bug that caused media uploads to fail on new posts. Props [@fjarrett](https://github.com/fjarrett)

= 1.2.8 - March 7, 2014 =
Use attachment type as context in Media connector. Bug fixes. Props [@lukecarbis](https://github.com/lukecarbis), [@powelski](https://github.com/powelski), [@fjarrett](https://github.com/fjarrett)

= 1.2.7 - March 4, 2014 =
Pagination added to Stream Activity dashboard widget. Bug fixes. Props [@chacha](https://github.com/chacha), [@fjarrett](https://github.com/fjarrett)

= 1.2.6 - February 28, 2014 =
Improved context names in Users connector. Props [@powelski](https://github.com/powelski)

= 1.2.5 - February 27, 2014 =
Use sidebar area names as context in Widgets connector. Bug fixes. Props [@desaiuditd](https://github.com/desaiuditd), [@shadyvb](https://github.com/shadyvb), [@fjarrett](https://github.com/fjarrett), [@bordoni](https://github.com/bordoni)

= 1.2.4 - February 25, 2014 =
Use post type names as context in Comments connector. German translation update. Bug fixes. Props [@powelski](https://github.com/powelski), [@kucrut](https://github.com/kucrut), [@pascalklaeres](https://github.com/pascal-klaeres), [@shadyvb](https://github.com/shadyvb), [@fjarrett](https://github.com/fjarrett)

= 1.2.3 - February 21, 2014 =
Replacement function for filter_input family to avoid PHP bug. Filter added to main Stream query. Bug fixes. Props [@shadyvb](https://github.com/shadyvb), [@powelski](https://github.com/powelski), [@fjarrett](https://github.com/fjarrett)

= 1.2.2 - February 19, 2014 =
Prevent records of disabled connectors from appearing in the Stream. Bug fixes. Props [@kucrut](https://github.com/kucrut), [@johnregan3](https://github.com/johnregan3)

= 1.2.1 - February 17, 2014 =
Translation updates. Language packs for pt_BR and id_ID. Bug fixes. Props [@kucrut](https://github.com/kucrut), [@shadyvb](https://github.com/shadyvb), [@bordoni](https://github.com/bordoni), [@powelski](https://github.com/powelski), [omniwired](https://github.com/omniwired), [@fjarrett](https://github.com/fjarrett)

= 1.2.0 - February 12, 2014 =
Awesome datepicker styles. Performance optimizations. Bug fixes. Props [@johnregan3](https://github.com/johnregan3), [@shadyvb](https://github.com/shadyvb), [@fjarrett](https://github.com/fjarrett), [@jonathanbardo](https://github.com/jonathanbardo)

= 1.1.9 - February 10, 2014 =
Load authors filter using AJAX if there are more than 50. Props [@powelski](https://github.com/powelski)

= 1.1.8 - February 9, 2014 =
Bug fixes. Props [@shadyvb](https://github.com/shadyvb)

= 1.1.7 - February 6, 2014 =
Upgrade routine for IPv6 support. Persist tab selection after saving Stream Settings. Props [@shadyvb](https://github.com/shadyvb), [dero](https://github.com/dero)

= 1.1.6 - February 6, 2014 =
Sortable columns bug fix on the records screen. Props [@powelski](https://github.com/powelski), [@fjarrett](https://github.com/fjarrett)

= 1.1.5 - February 5, 2014 =
Fixed a class scope bug [reported in the support forum](https://wordpress.org/support/topic/temporary-fatal-error-after-upgrade-113) that was causing a fatal error on some installs. Props [@shadyvb](https://github.com/shadyvb)

= 1.1.4 - February 5, 2014 =
Highlight changed settings field feature. DB upgrade routine for proper utf-8 charset. Various bug fixes. Props [@powelski](https://github.com/powelski), [@johnregan3](https://github.com/johnregan3), [@shadyvb](https://github.com/shadyvb), [@fjarrett](https://github.com/fjarrett)

= 1.1.3 - February 4, 2014 =
Upgrade routine for IP column in DB. Serialized option parsing for Stream Settings records. Purge records immediately when TTL is set backwards in Stream Settings. Various bug fixes. Props [@shadyvb](https://github.com/shadyvb), [@powelski](https://github.com/powelski), [@fjarrett](https://github.com/fjarrett)

= 1.1.2 - February 2, 2014 =
Bug fix for list table notice on new installations. Props [@shadyvb](https://github.com/shadyvb)

= 1.1.0 - January 31, 2014 =
Disable terms in dropdown filters for which records do not exist. Props [@johnregan3](https://github.com/johnregan3)

= 1.0.9 - January 31, 2014 =
Several important bug fixes. Props [@shadyvb](https://github.com/shadyvb)

= 1.0.8 - January 30, 2014 =
Bug fix for sites using BuddyPress. Props [@johnregan3](https://github.com/johnregan3)

= 1.0.7 - January 29, 2014 =
Code efficiency improvements when fetching admin area URLs. Props [@fjarrett](https://github.com/fjarrett)

= 1.0.6 - January 28, 2014 =
Query improvements, default connector interface, hook added for general settings fields. Bug fixes. Props [dero](https://github.com/dero), [@jonathanbardo](https://github.com/jonathanbardo), [@shadyvb](https://github.com/shadyvb), [@fjarrett](https://github.com/fjarrett)

= 1.0.5 - January 27, 2014 =
Bug fix for live updates breaking columns when some are hidden via Screen Options. Props [@johnregan3](https://github.com/johnregan3)

= 1.0.4 - January 23, 2014 =
Language pack for Polish. Bug fixes. Props [@powelski](https://github.com/powelski), [@fjarrett](https://github.com/fjarrett), [@johnregan3](https://github.com/johnregan3), [@kucrut](https://github.com/kucrut)

= 1.0.3 - January 19, 2014 =
Language pack for Spanish. Bug fixes. Props [omniwired](https://github.com/omniwired), [@shadyvb](https://github.com/shadyvb)

= 1.0.2 - January 15, 2014 =
Ensure the dashboard widget respects the Role Access setting. Props [@fjarrett](https://github.com/fjarrett)

= 1.0.1 - January 15, 2014 =
Require nonce for generating a new user feed key. Props [@johnregan3](https://github.com/johnregan3)

= 1.0.0 - January 13, 2014 =
Allow list table to be extensible. Hook added to prevent tables from being created, if desired. Props [@johnregan3](https://github.com/johnregan3), [@fjarrett](https://github.com/fjarrett), [@jonathanbardo](https://github.com/jonathanbardo)

= 0.9.9 - January 8, 2014 =
Updated screenshot assets and descriptions. Props [@fjarrett](https://github.com/fjarrett)

= 0.9.8 - January 1, 2014 =
Support for live updates in the Stream. Bug fixes. Props [@jonathanbardo](https://github.com/jonathanbardo), [@johnregan3](https://github.com/johnregan3), [@fjarrett](https://github.com/fjarrett)

= 0.9.7 - December 29, 2013 =
Plugin version available as a constant. Bug fixes. Props [@jonathanbardo](https://github.com/jonathanbardo), [@fjarrett](https://github.com/fjarrett)

= 0.9.6 - December 29, 2013 =
Use menu name as context in Menus connector. Warning if required DB tables are missing. Bug fixes. Props [@jonathanbardo](https://github.com/jonathanbardo), [@fjarrett](https://github.com/fjarrett), [@topher1kenobe](https://github.com/topher1kenobe)

= 0.9.5 - December 22, 2013 =
WordPress context added to Installer connector for core updates. Props [@shadyvb](https://github.com/shadyvb)

= 0.9.3 - December 22, 2013 =
Replacing Chosen library with Select2. Bug fixes. Props [@kucrut](https://github.com/kucrut), [@shadyvb](https://github.com/shadyvb), [@fjarrett](https://github.com/fjarrett)

= 0.9.2 - December 22, 2013 =
Added support for private feeds in JSON format. Flush rewrite rules automatically for feeds when enabled/disabled. Bug fixes. Props [@jonathanbardo](https://github.com/jonathanbardo), [@fjarrett](https://github.com/fjarrett)

= 0.9.1 - December 21, 2013 =
Specify which roles should have their activity logged. Delete all options on uninstall. Bug fixes. Props [@jonathanbardo](https://github.com/jonathanbardo), [@fjarrett](https://github.com/fjarrett)

= 0.9.0 - December 20, 2013 =
Added connector for Comments. Stream activity dashboard widget. UI enhancements. Bug fixes. Props [@jonathanbardo](https://github.com/jonathanbardo), [@fjarrett](https://github.com/fjarrett), [@shadyvb](https://github.com/shadyvb), [@topher1kenobe](https://github.com/topher1kenobe)

= 0.8.2 - December 19, 2013 =
Language packs for French and German. Option to uninstall database tables. Bug fixes. Props [@jonathanbardo](https://github.com/jonathanbardo), [@fjarrett](https://github.com/fjarrett), [@topher1kenobe](https://github.com/topher1kenobe), [@pascalklaeres](https://github.com/pascal-klaeres)

= 0.8.1 - December 18, 2013 =
Setting to enable/disable private feeds functionality. Additional record logged when a user's role is changed. Bug fixes. Props [@fjarrett](https://github.com/fjarrett), [@kucrut](https://github.com/kucrut), [@topher1kenobe](https://github.com/topher1kenobe), [@justinsainton](https://github.com/justinsainton)

= 0.8.0 - December 16, 2013 =
Ability to query Stream records in a private RSS feed. Bug fixes. Props [@fjarrett](https://github.com/fjarrett), [@shadyvb](https://github.com/shadyvb)

= 0.7.3 - December 13, 2013 =
Bug fix for Role Access option. Props [@fjarrett](https://github.com/fjarrett)

= 0.7.2 - December 12, 2013 =
Bug fixes for the Installer connector. Props [@shadyvb](https://github.com/shadyvb)

= 0.7.1 - December 12, 2013 =
Hotfix to remove PHP 5.4-only syntax. Role Access option added to Settings. Props [@kucrut](https://github.com/kucrut)

= 0.7.0 - December 11, 2013 =
Added connectors for Taxonomies and Settings. Bug fixes. Props [@shadyvb](https://github.com/shadyvb), [@fjarrett](https://github.com/fjarrett)

= 0.6.0 - December 9, 2013 =
UX improvements to manual DB purge. Cron event for user-defined TTL of records. Bug fixes. Props [@shadyvb](https://github.com/shadyvb), [@fjarrett](https://github.com/fjarrett)

= 0.5.0 - December 8, 2013 =
Require PHP 5.3 to activate plugin. Provide action links for records when applicable. Bug fixes. Props [@shadyvb](https://github.com/shadyvb), [@fjarrett](https://github.com/fjarrett)

= 0.4.0 - December 8, 2013 =
Improved support for pages and custom post types. Chosen for filter dropdowns. Pagination support in screen options. Bug fixes. Props [@shadyvb](https://github.com/shadyvb), [@fjarrett](https://github.com/fjarrett)

= 0.3.0 - December 7, 2013 =
Improved actions for Users context. Action for edited images in Media context. Bug fixes in Menus context. Props [@shadyvb](https://github.com/shadyvb), [@fjarrett](https://github.com/fjarrett), [@akeda](https://github.com/gedex)

= 0.2.0 - December 6, 2013 =
Second iteration build using custom tables data model. First public release. Props [@shadyvb](https://github.com/shadyvb), [@fjarrett](https://github.com/fjarrett)

= 0.1.0 =
Initial concept built using custom post type/taxonomies as the data model. Props [@shadyvb](https://github.com/shadyvb)
