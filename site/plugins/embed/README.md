![Embed for Kirby CMS](https://distantnative.com/remote/github/embed/logo.png)  

[![Release](https://img.shields.io/github/release/distantnative/embed.svg)](https://github.com/distantnative/embed/releases) 
[![Issues](https://img.shields.io/github/issues/distantnative/embed.svg)](https://github.com/distantnative/embed/issues) ![Kirby Version](https://img.shields.io/badge/Kirby-2.3%2B-red.svg)

Embed extends [Kirby](http://getkirby.com) with some extensive media embed functionalities. It enables Kirby to display embeds from various media sites (e.g. YouTube, Vimeo, Soundcloud, Instagram etc.) by only providing the URL to the medium. It is powered by the [oscarotero/Embed](https://github.com/oscarotero/Embed) library.


## Table of Contents
1. [Requirements](#Requirements)
2. [Installation & Update](#Installation)
3. [Usage](#Usage)
4. [Options](#Options)
5. [Panel field](#Field)
6. [Advanced](#Advanced)
7. [Styles, Scripts & Translations](#StylesScripts)
8. [Examples](#Examples)
9. [Help & Improve](#Help)
10. [Version History](#VersionHistory)

## Requirements <a id="Requirements"></a>
Kirby CMS 2.3.0+ and PHP 5.5+.


## Installation & Update <a id="Installation"></a>
1. Download [Embed](https://github.com/distantnative/embed/zipball/master/) and add the files to `site/plugins/embed/` 
2. Add the necessary styles by including the following in the header:
```php
<?= css('assets/plugins/embed/css/embed.css') ?>
```

#### With video lazyload [option](#Options) (activated by default, include unless deactived)
3. Add the necessary script by including the following right before the `</body>` tag:
```php
<?= js('assets/plugins/embed/js/embed.js') ?>
```

#### With the [Kirby CLI](https://github.com/getkirby/cli)
```
kirby plugin:install distantnative/embed
```
And add CSS and JS as outlined above.



## Usage <a id="Usage"></a>
**As field method in templates:**  
Use the method on fields that contain a url that points to a supported medium (e.g. YouTube, Vimeo, Twitter, Instagram, Spotify etc.):
```php
<?= $page->tweet()->embed(); ?>
```

You can use any text field containing a valid URL, but you might want to use the designated [Embed panel field](#Field).

**As Kirbytext tag:**  
```
You'll be given love. You'll be taken care of. You'll be given love. You have to trust it. Maybe not from the sources. You have poured yours. Maybe not from the directions. You are staring at.

(embed: https://vimeo.com/43444347)

Twist your head around. It's all around you. All is full of love. All around you. All is full of love. You just ain't receiving. All is full of love. Your phone is off the hook. All is full of love. Your doors are all shut. All is full of love.
```

**As global PHP helper function:**
```php
<?= embed('https://www.youtube.com/watch?v=m2ua3O_fdCY') ?>
```


## Options <a id="Options"></a>

#### Per embed
You can set the following options on each embed to apply:

```php
// with the field method
<?= $page->featured_video()->embed([
  'lazyvideo' => true
]) ?>

// with the Kirbytext tag
(embed: https://www.youtube.com/watch?v=IlV7RhT6zHs lazyvideo: true)
```

| Option      | Values         | Description                               |
|-------------|----------------|-------------------------------------------|
| `class`     | (string)       | Class to be added to the embed wrapper    |
| `thumb`     | (string)       | Custom thumbnail (URL)                    |
| `autoplay`  | `true`/`false` | Starts the embedded video automatically   |
| `lazyvideo` | `true`/`false` | Lazyload the embedded video               |
| `jsapi`     | `true`/`false` | Activates the JS API of certain providers |


#### Global
You can set the following options in your `site/config/config.php` to generally apply to all embeds:

```php
c::set('plugin.embed.video.autoplay', false);

c::set('plugin.embed.video.lazyload', true);
c::set('plugin.embed.video.lazyload.btn', 'assets/plugins/embed/images/play.png');

c::set('plugin.embed.caching', true);
c::set('plugin.embed.caching.duration', 24); // in hours

c::set('plugin.embed.w3c.enforce', false);

c::set('plugin.embed.providers.jsapi', false);
c::set('plugin.embed.providers.google.key', null);
c::set('plugin.embed.providers.soundcloud.key', null):
```

#### URL parameters
Embed supports various URL parameters of provider that usually get lost during the embed call. To see which parameters are supported, please use the panel field and switch on the cheatsheet option.


## Panel field <a id="Field"></a>
Embed also includes its own panel field which provides a preview of the embedded medium right inside the panel:

```
// in your blueprint
…
fields:
  …
  featured_video:
    label: Featured video
    type:  embed
```

With its additional options you can also disable the preview section, the information section as well as the cheatsheet or set a max-height for the preview:
```
fields:
  …
  featured_video:
    label:      Featured video
    type:       embed
    preview:    false
    info:       false
    cheatsheet: false
    height:     250px
```

![Panel field preview](https://distantnative.com/remote/github/embed/field2.png)  
![Panel field preview](https://distantnative.com/remote/github/embed/field3.png)  


## Advanced <a id="Advanced"></a>
Embed does not only provide you an easy way to output the embed code, but also gives you access to a whole array of additional information provided by the [oscarotero/Embed](https://github.com/oscarotero/Embed) library. 

```php
// instead of echoing the field method, use it for further details:
$page->video()->embed()->title()

$info = $page->video()->embed();
echo $info->description();
echo $info->authorName();
```

You can find a full overview of what information can be accessed in the documentation of the [oscarotero/Embed](https://github.com/oscarotero/Embed) library or also just [test your media URL](http://oscarotero.com/embed2/demo) and see what information is available.


## Styles, Scripts & Translations <a id="StylesScripts"></a>
Embed comes with very minimal styles, mainly for embedded videos and only a small script necessary when lazyloading videos (activated by default):

```php
// Include styles
<?= css('assets/plugins/embed/css/embed.css') ?>

// Include script
<?= js('assets/plugins/embed/js/embed.js') ?>
```

If you want to further customize and work with the embedded medium. The following CSS classes are applied to the main wrapper:
```
.embed
.embed--{TYPE}      // e.g. video, rich
.embed--{PROVIDER}  // e.g. YouTube, Vimeo

.embed__thumb
.embed__thumb > img
```

You can also translate the strings used by Embed. Translations for English and German are already included. To find out what keys to use, check out the [English translation file](translations/en.php).


## Examples <a id="Examples"></a>
#### Blog: Featured Embed
```
// site/blueprints/article.yml
…
fields:
  …
  cover:
    Cover photo
    type: image
  featured:
    label: Featured embed (instead of cover photo)
    type:  embed
```

```php
// site/snippets/article.php
<article>
  <aside class="entry-meta">...</aside>
  <div class="entry-main">
    <?php if($page->featured()->isNotEmpty()): ?>
      <figure class="entry-cover">
        <?= $page->featured()->embed() ?>
      </figure>
    <?php elseif($page->cover()->isNotEmpty()) : ?>
      <figure class="entry-cover">
        <?= $page->cover() ?>
      </figure>
    <?php endif; ?>
    <div class="entry-content"><?= $page->text()->kt() ?></div>
  </div>
</article>
```

## Screenshots
**Video from Vimeo:**  
![Example](https://distantnative.com/remote/github/embed/example1.png)    
  
**Tweet from Twitter:**  
![Example](https://distantnative.com/remote/github/embed/example2.png) 
  
**Player from Spotify:**   
![Example](https://distantnative.com/remote/github/embed/example3.png)    


## Help & Improve <a id="Help"></a>
*If you have any suggestions for further configuration options, [please let me know](https://github.com/distantnative/embed/issues/new).*


## Version history <a id="VersionHistory"></a>
You can find a more or less complete version history in the [changelog](CHANGELOG.md).


## License
[MIT License](http://www.opensource.org/licenses/mit-license.php)


## Author
Nico Hoffmann - <https://nhoffmann.com>
