(function($) {
  $.fn.embedfield = function() {

    // ================================================
    //  Make icon clickable
    // ================================================

    var clickableIcon = function($this) {
      var icon = $this.next('.field-icon');

      icon.css({
        'cursor': 'pointer',
        'pointer-events': 'auto'
      });

      icon.on('click', function() {
        var url = $.trim($this.val());
        if(url !== '' && $this.is(':valid')) {
          window.open(url);
        } else {
          $this.focus();
        }
      });
    };


    // ================================================
    //  Update embed
    // ================================================

    var updateEmbed = function($this, preview, info, sheet) {
      var url = $.trim($this.val());

      if(!$this.data('embedurl') || url !== $this.data('embedurl')) {
        $this.data('embedurl', url);

        if(url === '') {
          hidePreview(preview);
          hideInfo(info);
          setCheatsheet(sheet, {parameters: ''});

        } else if($this.is(':valid')) {
          clearPreview(preview);

          $.ajax({
            url:     $this.data('ajax') + 'preview',
            type:    'POST',
            data:    {
              url:  url,
              code: preview.wrapper.length === 0 ? 'false' : 'true'
            },
            success: function(data) {
              showPreview(preview, data);
              setCheatsheet(sheet, data);

              if(data.success !== 'false') {
                showInfo(info, data);
              } else {
                hideInfo(info);
              }
            },
          });
        }

      }
    };


    // ================================================
    //  Set preview section
    // ================================================

    var showPreview = function(preview, data) {
      preview.load.css('opacity', '0');
      preview.bucket.html(data.code).css('opacity', '1');
      preview.bucket.find('.embed__thumb').click(pluginEmbedLoadLazyVideo);
    };

    var clearPreview = function(preview) {
      preview.bucket.css('opacity', '0');
      preview.load.css('opacity', '1');
    };

    var hidePreview = function(preview) {
      preview.bucket.css('opacity', '0').html('');
    };


    // ================================================
    //  Set info section
    // ================================================

    var showInfo = function(info, data) {
      if(data.title) {
        info.title.html(data.title).show();
      } else {
        info.title.hide();
      }

      if(data.authorName) {
        info.author.show().find('a').attr('href', data.authorUrl ).html(data.authorName);
      } else {
        info.author.hide();
      }

      if(data.providerName) {
        info.provider.show().find('a').attr('href', data.providerUrl ).html(data.providerName);
      } else {
        info.provider.hide();
      }

      if(data.type) {
        info.type.show().html(data.type);
      } else {
        info.type.hide();
      }

      if(info.wrapper.prop('style').display === '') {
        info.wrapper.show();
      } else {
        info.wrapper.slideDown();
      }
    };

    var hideInfo = function(info) {
      info.wrapper.hide();
    };


    // ================================================
    //  Set cheatsheet
    // ================================================

    var setCheatsheet = function(sheet, data) {
      sheet.bucket.html(data.parameters);
      if(data.parameters === '') {
        sheet.icon.hide();
      } else {
        sheet.icon.show();
      }
    };

    // ================================================
    //  Fix borders
    // ================================================

    var showBorder = function($this, preview, info) {
      if(!$this.parents('.field').hasClass('field-with-error')) {
        setBorder(preview, info, '#8dae28');
      } else {
        setBorder(preview, info, '#000');
      }
    };

    var hideBorder = function(preview, info) {
      setBorder(preview, info, '');
    };

    var setBorder = function(preview, info, color) {
      preview.wrapper.add(info.wrapper).css('border-color', color);
    };


    // ================================================
    //  Initialization
    // ================================================

    return this.each(function() {

      var $this = $(this);

      if($this.data('embedfield')) {
        return;
      } else {
        $this.data('embedfield', true);
      }

      // make icon clickable
      clickableIcon($this);

      // collect all elements
      var inputTimer;
      var preview = $this.parent().nextAll('.field-embed-preview');
      preview     = {
        wrapper: preview,
        bucket:  preview.find('.field-embed-preview__bucket'),
        load:    preview.find('.field-embed-preview__loading'),
      };
      var info    = $this.parent().nextAll('.field-embed-info');
      info        = {
        wrapper:  info,
        title:    info.find('.field-embed-info__title'),
        author:   info.find('.field-embed-info__author'),
        provider: info.find('.field-embed-info__provider'),
        type:     info.find('.field-embed-info__type')
      };
      var sheet   = $this.parent().prev().find('.field-embed-cheatsheet');
      sheet       = {
        wrapper: sheet,
        icon:    sheet.find('.field-embed-cheatsheet__icon'),
        bucket:  sheet.next(),
      };

      // update embed on input blur
      $this.on('blur', function() {
        window.clearTimeout(inputTimer);
        updateEmbed($this, preview, info, sheet);
      });

      // update embed on input change (delayed)
      $this.bind('input embed.change', function() {
        window.clearTimeout(inputTimer);
        inputTimer = window.setTimeout(function(){
          updateEmbed($this, preview, info, sheet);
        }, 1000);
      });

      // update embed on load
      updateEmbed($this, preview, info, sheet);

      // fix border colors on input focus and blur
      $this.focus(function(){
        showBorder($this, preview, info);
      }).blur(function(){
        hideBorder(preview, info);
      });
    });
  };
})(jQuery);
