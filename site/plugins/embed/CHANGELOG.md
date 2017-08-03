# Changelog

## [3.0.2](https://github.com/distantnative/embed/releases/tag/3.0.2) (2017-06-18)
:bug: Javascript on IE: workaround for this.remove()  

## [3.0.1](https://github.com/distantnative/embed/releases/tag/3.0.1) (2017-03-31)
:balloon: Safer handling of thumb if directory is not writable  
:balloon: Handle YouTube playlist index URL parameter  

## [3.0.0](https://github.com/distantnative/embed/releases/tag/3.0.0) (2017-03-22)
- Renamed: Plugin is now called `embed`
- Improved: simplified CSS classes to `embed` root
- Fixed: Vimeo play button support
- Updated: Embed library to v3.0.5

## [2.4.0](https://github.com/distantnative/embed/releases/tag/2.4.0) (2016-09-04)
- Improved: LazyVideo support and display for certain providers
- Improved: Smarter sizing of LazyVideo play overlay
- Improved: Preview label hidden in panel field
- Improved: Panel field cheatsheet hidden by default, better cursor on hover
- Improved: Removed duplicate assets for panel field
- Improved: Updated vendor lib Embed to version 2.7
- Improved: Internal file structure
- Improved: Clearer namespacing, separation between plugin and lib
- Fixed: Thumb caching for thumbs with url parameter
- Fixed: Correct permissions for thumbs directories

## [2.3.2](https://github.com/distantnative/embed/releases/tag/2.3.2) (2016-09-03)
- Fixed: YouTube timecode URL parameter 't' did not work

## [2.3.1](https://github.com/distantnative/embed/releases/tag/2.3.1) (2016-09-03)
- Fixed: Adding a custom CSS class via the Kirbytag was not working

## [2.3.0](https://github.com/distantnative/embed/releases/tag/2.3.0) (2016-09-03)
- Feature: Support various Vimeo url parameters
- Improved: Getting and setting custom url parameters
- Improved: Cheatsheet for the panel field is active by default
- Fixed: Global helper function was not working

## [2.2.0](https://github.com/distantnative/embed/releases/tag/2.2.0) (2016-06-10)
- Feature: Support for Spotify theme and view parameters
- Feature: Set Spotify width and height through url parameters
- Feature: Parameter cheatsheet for the panel field
- Improved: Updated Embed vendor library
- Improved: More specific API calls for the panel field
- Fixed: Embeds now respect a max-width of 100%
- Fixed: More precise code regular expressions
- Docs: Removed example images from repository

## [2.1.0](https://github.com/distantnative/embed/releases/tag/2.1.0) (2016-05-10)
- Lots of panel field improvements:
  - Feature: Section with information (e.g. title, author, source)
  - Feature: Options to disable preview and information section
  - Feature: Option to set a maximum height for the preview section
  - Improved: Loading indicator for the preview section
  - Improved: Lots of smaller styling and script improvements
  - Fixed: ensured lazy loading of videos in the panel
  - Fixed: border colors on input focus
  - Moved field css assets to scss (using gulp)
- Feature: Config options for provider API keys (`plugin.oembed.providers.facebook.key`, `plugin.oembed.providers.google.key` and `plugin.oembed.providers.soundcloud.key`)
- Feature: Config option to enforce W3C validity (`plugin.oembed.w3c.enforce`)
- Improved: Title for lazy loading video thumbs
- Improved: Fallback for link type with no embed code
- Feature: Plugin strings are now translatable (English & German already included)
- Improved: Safer autoloading of plugin components
- Fixed: styles for specific providers (e.g. Flickr, phorkie, Meetup)
- Fixed: error message if information is loaded, but no embed code available
- Fixed: error display for videos with no embed code


## [2.0.2](https://github.com/distantnative/embed/releases/tag/2.0.2) (2016-05-08)
- Fixed: YouTube timecode handling
- Fixed: more secure use of `$kirby`


## [2.0.1](https://github.com/distantnative/embed/releases/tag/2.0.1) (2016-05-07)
- Panel field: changed icon click behavior (opens now url in new tab)
- Fixed: access to thumb location
- Fixed: Included vendor files instead using git submodules


## [2.0.0](https://github.com/distantnative/embed/releases/tag/2.0.0) (2016-05-06)
- Requires Kirby 2.3.0
- Complete rewrite of PHP, CSS, JS
- All new panel field with great instant preview
- Works now with a lot more media (Spotify, pastebin, issu among others)
- Supports YouTube playlists and timecodes
- More reliable caching
- More consistent options
- Advanced acces to addtional information of the embedded media
- Using new library for collecting embed information ([oscarotero/Embed](https://github.com/oscarotero/Embed))


## [1.0.0](https://github.com/distantnative/embed/releases/tag/v1.0) (2015-06-19)
- Restructured plugin files and renamed repository to oembed
- Updated Essence library to v3
- Added custom class option and default container classes
- Added jsapi option
- Improved frameborder handling and validation
- Better thumb caching and low res fallback
- Better cache and thumb dir handling
- Autoplay only on lazyload or with autoplay option
- Enhanced CSS browser support


## [0.7.0](https://github.com/distantnative/embed/releases/tag/v0.7) (2015-05-27)
- File structure of plugin repository changed
- Improved HTML validation of plugin output
