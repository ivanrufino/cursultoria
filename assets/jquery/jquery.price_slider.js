/**
 * DotBlock Order Form
 *
 * @author      Joshua Priddle <jpriddle@nevercraft.net>
 * @copyright   Copyright (c) 2010, DotBlock
 *
 * Usage: $.priceSlider(settings);
 *
 * Settings:
 *
 * blocks_id:       HTML ID used for block image
 * bandwidth_id:    HTML ID used for Bandwidth counter on slider
 * storage_id:      HTML ID used for Storage counter on slider
 * price_id:        HTML ID used for Monthly Price counter on slider
 * slider_id:       HTML ID used to initialize $.slider
 * processor_id:    HTML ID used for Processor speed counter on slider
 * ram_id:          HTML ID used for Ram counter on slider
 * add_block_id:    HTML ID used for add block arrow (=>) on slider
 * remove_block_id: HTML ID used for remove block arrow (<=) on slider
 *
 * Example (default):
 * $(document).ready(function() {
 *   $.priceSlider();
 * })
 * Example (with customizations):
 * $(document).ready(function (){
 *   $.priceSlider({slider_id: '#pricing', bandwidth_id: '#bandwidth_amount'});
 * });
 */

(function($) {
  $.priceSlider = function(settings) {
    $.priceSlider.init(settings);
  };

  $.extend($.priceSlider, {
    settings: {
      default_blocks:  3,
      details_id:      '#order-details',
      blocks_id:       '#blocks',
      bandwidth_id:    '#bandwidth',
      storage_id:      '#storage',
      price_id:        '#amount',
      slider_id:       '#slider',
      processor_id:    '#processor',
      ram_id:          '#ram',
      add_block_id:    '#slider-add-block',
      remove_block_id: '#slider-remove-block',
      hourly_price_id: '#hourly'
    },
    defaults: {
      processor: 3,
      ram:       3,
      bandwidth: 1000,
      storage:   40,
      price:     39.95,
      hourly:    0.053
    },
    increments: {
      processor: 3,
      ram:       3,
      bandwidth: 500,
      storage:   20,
      price:     39.95,
      hourly:    0.053
    },
    updateHTML: function(html) {
      updateHTML(html);
    },
    init: function(opts) {
      $.extend(this.settings, opts || {});
      var self   = this,
          conf   = self.settings,
          hourly = $('#hourly-tip'),
          slide  = function(event, ui) {
            updateHTML(ui.value);
            $.cookie('db-slider', ui.value, {domain: '.dotblock.com'});
          };

      $(conf.slider_id).slider({
        value:  conf.default_blocks,
        step:   1,
        min:    1,
        max:    18,
        slide:  slide,
        change: slide,
        start:  function() {
          if (window.hourly_timer) {
            clearTimeout(window.hourly_timer);
            window.hourly_timer = null;
          }
          hourly.show();
        },
        stop: function() {
          window.hourly_timer = setTimeout(function() {
            hourly.fadeOut();
            window.hourly_timer = null;
          }, 750);
        }
      });

      $(conf.add_block_id + ', ' + conf.remove_block_id).click(function() {
        var el        = $(conf.slider_id),
            min       = parseInt(el.slider('option', 'min'), 0),
            max       = parseInt(el.slider('option', 'max'), 0),
            blocks    = parseInt(el.slider('option', 'value'), 0),
            link_id   = '#' + $(this).attr('id');
            new_value = blocks;

        if (link_id == conf.add_block_id) {
          new_value += 1;
        } else if (link_id == conf.remove_block_id) {
          new_value -= 1;
        }

        if (new_value <= max && new_value >= min) {
          if (window.hourly_timer) {
            clearTimeout(window.hourly_timer);
            window.hourly_timer = null;
          }
          hourly.show();
          window.hourly_timer = setTimeout(function() {
            hourly.fadeOut();
          }, 750);
          el.slider('option', 'value', new_value);
        }
        return false;
      });
      updateHTML(self.settings.default_blocks);
    }

  });

  function calculate(klass, block_count) {
    var blocks = parseInt(block_count, 0),
          that = $.priceSlider;
    if (klass == 'price' || klass == 'ram' || klass == 'processor' || klass == 'hourly') {
      return blocks * that.defaults[klass];
    } else if (klass == 'storage' || klass == 'bandwidth') {
      return that.defaults[klass] + (that.increments[klass] * (blocks - 1));
    } else {
      return 0;
    }
  }

  function getData(blocks) {
    blocks = parseInt(blocks, 0);
    return {
      blocks:    blocks,
      processor: calculate('processor', blocks),
      ram:       calculate('ram',       blocks),
      price:     calculate('price',     blocks),
      storage:   calculate('storage',   blocks),
      bandwidth: calculate('bandwidth', blocks),
      hourly:    calculate('hourly',    blocks)
    };
  }

  function formatPrice(price) {
    var out = String(Math.round(price * 100) / 100),
        seg = out.split('.');
    if (seg[1].length == 1) {
      return seg[0] + '.' + seg[1] + '0';
    } else {
      return out;
    }
  }

  function formatCents(price) {
    var out = String(price),
        seg = out.split('.');
    if (seg[1].length > 3) {
      seg[1] = seg[1].substring(0, 3);
    } else if (seg[1].length < 3) {
      var zeros = '',
          size  = 3 - seg[1].length;
      for (i = 0; i < size; i++) {
        zeros += '0';
      }
      seg[1] = seg[1] + zeros;
    }
    return seg[0] + '.' + seg[1];
  }

  function updateHTML(blocks) {
    var data   = getData(blocks),
        price  = formatPrice(data.price),
        hourly = formatCents(data.hourly),
        p      = $.priceSlider.settings;

    $(p.processor_id).text(data.processor + ' GHZ');
    $(p.ram_id).text(data.ram + ' GB');
    $(p.price_id).text('$' + price);
    $(p.storage_id).text(data.storage + ' GB');
    //$(p.bandwidth_id).text(data.bandwidth + ' GB');
    $(p.bandwidth_id).text('Unmetered');
    $(p.blocks_id).attr('class', 'block_' + data.blocks);
    $(p.hourly_price_id).text('$' + hourly + '/hr');

    if ($(p.details_id)) {
      $('#promovalidation').trigger('clear-code');
      $('#order_block_count').val(data.blocks);
      $(p.details_id + ' .blocks b').text(data.blocks);
      $(p.details_id + ' .processor b').text(data.processor + ' GHZ');
      $(p.details_id + ' .ram b').text(data.ram + ' GB');
      $(p.details_id + ' .storage b').text(data.storage + ' GB');
      $(p.details_id + ' .bandwidth b').text(data.bandwidth + ' GB');
      $(p.details_id + ' .price b').text('$' + price);

      if (p.add_cpanel || p.add_windows) {
        var price = data.price;

        if (p.add_cpanel) {
          $(p.details_id + ' .cpanel').show();
          $(p.details_id + ' .windows').hide();
          price += 14.95;
        } else {
          $(p.details_id + ' .windows').show();
          $(p.details_id + ' .cpanel').hide();
          price += 14.95;

          if (p.add_mssql) {
            price += 200;
            $(p.details_id + ' .windows-sql-server').show();
          } else {
            $(p.details_id + ' .windows-sql-server').hide();
          }

          if (p.add_msweb) {
            price += 10;
            $(p.details_id + ' .windows-web-server').show();
          } else {
            $(p.details_id + ' .windows-web-server').hide();
          }
        }
        $(p.details_id + ' .price b').text('$' + formatPrice(price));
      } else {
        $(p.details_id + ' .cpanel').hide();
        $(p.details_id + ' .windows').hide();
        $(p.details_id + ' .windows-web-server').hide();
        $(p.details_id + ' .windows-sql-server').hide();
        $(p.details_id + ' .price b').text('$' + formatPrice(data.price));
      }
    }
  }

})(jQuery);
