var timezone = '';
$(document).ready(function () {

    if ($('#schedule_datepicker')[0]) {
        $('#schedule_datepicker').datetimepicker({
            showButtonPanel: false,
            timeOnly: false,
            showHour: true,
            showMinute: true,
            showSecond: false,
            showTime: true,
            stepHour: 0.05,
            stepMinute: 0.05,
            stepSecond: 0.05,
            hour: 0,
            minute: 0,
            second: 0,
            hourMin: 0,
            minuteMin: 0,
            secondMin: 0,
            hourMax: 23,
            minuteMax: 59,
            secondMax: 59,
            minDateTime: new Date(),
            maxDateTime: null,
            hourGrid: 0,
            minuteGrid: 0,
            secondGrid: 0,
            alwaysSetTime: true,
            separator: ' ',
            altFieldTimeOnly: true,
            showTimepicker: true
        });

        if (mail2easyLanguage !== "pt_BR") {
            $('#schedule_datepicker').datepicker( "option", "dateFormat", "yy-dd-mm" );
        }

        //impede datas passadas no timepicker
        $('#schedule_datepicker').attr('current_time','0');
        $('#schedule_datepicker').attr('original_time','');

        $('#schedule_datepicker').focusin(function(){
            var x = $(this).attr('value').replace(/\/|\:/g,' ')
            var item = x.split(" ");
            var timex = parseInt(item[2]+item[1]+item[0]+item[3]+item[4]);
            if($('#schedule_datepicker').attr('current_time')=='0'){
                $('#schedule_datepicker').attr('current_time',timex);
                $('#schedule_datepicker').attr('original_time',$(this).attr('value'));
            }
            var current_time = parseInt($('#schedule_datepicker').attr('current_time'));
            if(current_time>timex){
                $('#schedule_datepicker').attr('value',original_time);
            }
        });
    }

    // $.browser vai ficar deprecated, but who cares
    if ($.browser.msie && $.browser.version < 9) {
        $('html').addClass('ie');
    }
    if ($.browser.msie && $.browser.version < 8) {
        $('html').addClass('ie7');
    }
    if ($.browser.webkit) {
        $('html').addClass('chrome');
    }

    // z-indexes para as abas TOP
    var abas=$('.abasTop > li'),
    ln=abas.length;
    abas.each(function (i) {
        $(this).css('z-index',ln-i)
    });

    // z-indexes para as abas FORMULARIO
    var abasF=$('.abasFormulario > li'),
    ln=abasF.length;
    abasF.each(function (i) {
        $(this).css('z-index',ln-i)
    });

    // COLORBOX
    // http://colorpowered.com/colorbox/
    //
    $(".openModal").click(function(evt) {
        var href = $(this).attr("href");
        $.colorbox({
            initialWidth: 100,
            initialHeight: 100,
            transition: "none",
            speed: 0,
            close: "fechar",
            opacity: "0.75",
            inline: true,
            href: href,
            scrolling:false,
            onCleanup: function () {
                $("#colorbox").hide();
            }
        });
        evt.preventDefault();
    });
    $(".modal .btnFechar").click(function (evt) {
        $.colorbox.close({
            onCleanup: function () {
                $("#colorbox").hide();
            }
        });
        evt.preventDefault();
    });


    // textarea maxlength
    $('textarea[maxlength]').each(function(){
        var max = parseInt($(this).attr('maxlength'));
        $(this).after('<span class="chars">'+max+' caracteres restantes</span>');
    });
    $('textarea[maxlength]').keyup(function(){
        var max = parseInt($(this).attr('maxlength'));
        if($(this).val().length > max){
            $(this).val($(this).val().substr(0, $(this).attr('maxlength')));
        }
        $(this).closest('li').find('.chars').html((max - $(this).val().length) + ' caracteres restantes');
    });

    // adicionando classes no primeiro/ultimo elemento de listas/tabelas
    $("li:first-child, tr:first-child, th:first-child, td:first-child").addClass("first-child");
    $("li:last-child, tr:last-child, th:last-child, td:last-child").addClass("last-child");

    // Adiciona classe "odd" nas linhas de tabelas (zebra)
    $(".tabGeral tbody tr:odd").addClass("odd");

    // INPUTS
    $('input:text').wrap('<div class="input-replace"/>');
    $('input:password').wrap('<div class="input-replace"/>');
    $('input[placeholder],textarea[placeholder]').placeholder();

    // SELECT customizado
    $('select:not([multiple])').selectReplace();

    // CHECKBOX customizado
    $('input:checkbox').checkboxReplace();
    $('input:radio').radioReplace();

    // TEXTAREA customizado
    $('textarea').wrap('<div class="textarea-replace"/>');
    /*
    // ABRE BOX DROP (tabelas)
    $('.icoDrop').click(function(e){
        $('.boxDrop').toggle();
        e.preventDefault();
    });
        */
    // Checking all checkboxes!
    /*
    var checkboxes = $('.tabGeral .check input');
    $('.tabGeral .chkAll').click(function(){
        checkboxes.attr('checked', this.checked).trigger('change');
    });
    */

    // Busca avancada e Busca simples
    $('.boxBusca .btnCinza').click(function(e){
        $('.boxBusca .buscaSimples, .boxBusca .buscaAvancada').toggleClass("show");
        e.preventDefault();
    });

    // Gaveta
    $('.openDrawer').click(function(e){
        //$(this).closest('.boxDrawer').find('.body').toggle();
        $(this).closest('.boxDrawer').toggleClass('openD');
        $(this).toggleClass('open');
        e.preventDefault();
    });

    $('#helpme').click(function(){
        $('.sidebar').css({"position":"absolute","zindex":9999,"top":$(this).position().top+60,"left":680});
        $('.sidebar').show("slide",{"direction" : 'right'});
        $('#helpme').hide();
        $('#helpmeclose').show();
    });

    $('#helpmeclose').click(function(){
        $('.sidebar').hide("slide",{"direction" : 'right'});
        $('#helpme').show();
        $('#helpmeclose').hide();
    });

    // grab the initial top offset of the navigation
    var sticky_navigation_offset_top = $('#w-nav').length > 0 ? $('#w-nav').offset().top : 0;

    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var sticky_navigation = function(){
        var scroll_top = $(window).scrollTop(); // our current vertical position from the top

        // if we've scrolled more than the navigation, change its position to fixed to stick to top, otherwise change it back to relative
        if (scroll_top > sticky_navigation_offset_top) {
            $('#w-nav').css({'position': 'fixed', 'top':0, 'left':'50%', 'margin-left':'-470px', 'z-index':9998, 'width': '940px'});
            $('#w-nav-placement').show();
        } else {
            $('#w-nav').css({'position': 'relative'});
            $('#w-nav-placement').hide();
        }
    };

    // run our function on load
    sticky_navigation();

    // and run it again every time you scroll
    $(window).scroll(function() {
        sticky_navigation();
    });
});

// Classe para chamar o Json.
function json(){
    var qtd;
    var retorno;

    // Resgatar valores.
    json.prototype.resgatarValores = function(json_dados){

        $('#box1View').html('Carregando dados...');

        switch(json_dados)
        {
            case 'grupos':
                $(".agrupar").hide(400);
                $(".filtrar").hide(400);
                break;
            case 'filtros':
                $(".agrupar").hide(400);
                $(".filtrar").hide(400);
                break;
            case 'contatos':
                $(".agrupar").show(400);
                $(".filtrar").show(400);
                break;

        }

        if(json_dados == 'contatos'){
            // Estrutura de resultado.
            $.getJSON("http://search.twitter.com/search.json?q=dinamize&callback=?&rpp=100", function(json) {
                $.each(json.results, function(i, result) {
                    // Cria um <option> e coloca dentro de #box1View
                    $("<option/>").text(result.from_user).appendTo("#box1View");
                });
            });
        }
        else{
            // Estrutura de resultado.
            $.getJSON("http://search.twitter.com/search.json?q=dinamize&callback=?&rpp=100", function(json) {
                $.each(json.results, function(i, result) {
                    // Cria um <option> e coloca dentro de #box1View
                    $("<option/>").text(result.from_user).appendTo("#box1View");
                });
            });
        }


    }

}

// Dual List Box
$(function() {
    //$.configureBoxes();
    });

/**
* Adiciona o layer de efeito modal na pagina
*/
function loadGenerate() {
    var modalLoader = document.createElement('div');
    var modalImg = document.createElement('div');

    $(modalLoader).attr('id', 'modalloader');
    $(modalImg).attr('id', 'modalimg');

    $(modalLoader).addClass('pagemodalloader');
    $(modalImg).addClass('pagemodallimg');

    $(modalImg).appendTo($(document.body));
    $(modalLoader).appendTo($(document.body));
}

/**
* Exibe o efeito modal na pagina
*/
function loadOn() {
    if (!$('#modalloader').length) {
        loadGenerate();
    }
    $('#modalloader').fadeTo(0, 0.5);
    $('#modalimg').css('top',
        $(window).height() / 2 - $('#modalimg').height() / 2);
    $('#modalimg').css('left',
        $(window).width() / 2 - $('#modalimg').width() / 2);
    $('#modalimg').show();
}

/**
* Retira o efeito modal na pagina
*/
function loadOff() {
    $('#modalloader').fadeTo(0, 0);
    $('#modalloader').hide();
    $('#modalimg').hide();
}

function number_format (number, decimals, dec_point, thousands_sep) {

    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function (n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
    };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

function date(format, timestamp) {
    var that = this,
    jsdate, f, formatChr = /\\?([a-z])/gi,
    formatChrCb,
    // Keep this here (works, but for code commented-out
    // below for file size reasons)
    //, tal= [],
    _pad = function (n, c) {
        if ((n = n + '').length < c) {
            return new Array((++c) - n.length).join('0') + n;
        }
        return n;
    },
    txt_words = ["Sun", "Mon", "Tues", "Wednes", "Thurs", "Fri", "Satur", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    formatChrCb = function (t, s) {
        return f[t] ? f[t]() : s;
    };
    f = {
        // Day
        d: function () { // Day of month w/leading 0; 01..31
            return _pad(f.j(), 2);
        },
        D: function () { // Shorthand day name; Mon...Sun
            return f.l().slice(0, 3);
        },
        j: function () { // Day of month; 1..31
            return jsdate.getDate();
        },
        l: function () { // Full day name; Monday...Sunday
            return txt_words[f.w()] + 'day';
        },
        N: function () { // ISO-8601 day of week; 1[Mon]..7[Sun]
            return f.w() || 7;
        },
        S: function () { // Ordinal suffix for day of month; st, nd, rd, th
            var j = f.j();
            return j > 4 || j < 21 ? 'th' : {
                1: 'st',
                2: 'nd',
                3: 'rd'
            }
            [j % 10] || 'th';
        },
        w: function () { // Day of week; 0[Sun]..6[Sat]
            return jsdate.getDay();
        },
        z: function () { // Day of year; 0..365
            var a = new Date(f.Y(), f.n() - 1, f.j()),
            b = new Date(f.Y(), 0, 1);
            return Math.round((a - b) / 864e5) + 1;
        },

        // Week
        W: function () { // ISO-8601 week number
            var a = new Date(f.Y(), f.n() - 1, f.j() - f.N() + 3),
            b = new Date(a.getFullYear(), 0, 4);
            return _pad(1 + Math.round((a - b) / 864e5 / 7), 2);
        },

        // Month
        F: function () { // Full month name; January...December
            return txt_words[6 + f.n()];
        },
        m: function () { // Month w/leading 0; 01...12
            return _pad(f.n(), 2);
        },
        M: function () { // Shorthand month name; Jan...Dec
            return f.F().slice(0, 3);
        },
        n: function () { // Month; 1...12
            return jsdate.getMonth() + 1;
        },
        t: function () { // Days in month; 28...31
            return (new Date(f.Y(), f.n(), 0)).getDate();
        },

        // Year
        L: function () { // Is leap year?; 0 or 1
            return new Date(f.Y(), 1, 29).getMonth() === 1 | 0;
        },
        o: function () { // ISO-8601 year
            var n = f.n(),
            W = f.W(),
            Y = f.Y();
            return Y + (n === 12 && W < 9 ? -1 : n === 1 && W > 9);
        },
        Y: function () { // Full year; e.g. 1980...2010
            return jsdate.getFullYear();
        },
        y: function () { // Last two digits of year; 00...99
            return (f.Y() + "").slice(-2);
        },

        // Time
        a: function () { // am or pm
            return jsdate.getHours() > 11 ? "pm" : "am";
        },
        A: function () { // AM or PM
            return f.a().toUpperCase();
        },
        B: function () { // Swatch Internet time; 000..999
            var H = jsdate.getUTCHours() * 36e2,
            // Hours
            i = jsdate.getUTCMinutes() * 60,
            // Minutes
            s = jsdate.getUTCSeconds(); // Seconds
            return _pad(Math.floor((H + i + s + 36e2) / 86.4) % 1e3, 3);
        },
        g: function () { // 12-Hours; 1..12
            return f.G() % 12 || 12;
        },
        G: function () { // 24-Hours; 0..23
            return jsdate.getHours();
        },
        h: function () { // 12-Hours w/leading 0; 01..12
            return _pad(f.g(), 2);
        },
        H: function () { // 24-Hours w/leading 0; 00..23
            return _pad(f.G(), 2);
        },
        i: function () { // Minutes w/leading 0; 00..59
            return _pad(jsdate.getMinutes(), 2);
        },
        s: function () { // Seconds w/leading 0; 00..59
            return _pad(jsdate.getSeconds(), 2);
        },
        u: function () { // Microseconds; 000000-999000
            return _pad(jsdate.getMilliseconds() * 1000, 6);
        },

        // Timezone
        e: function () { // Timezone identifier; e.g. Atlantic/Azores, ...
            // The following works, but requires inclusion of the very large
            // timezone_abbreviations_list() function.
            /*              return this.date_default_timezone_get();
*/
            throw 'Not supported (see source code of date() for timezone on how to add support)';
        },
        I: function () { // DST observed?; 0 or 1
            // Compares Jan 1 minus Jan 1 UTC to Jul 1 minus Jul 1 UTC.
            // If they are not equal, then DST is observed.
            var a = new Date(f.Y(), 0),
            // Jan 1
            c = Date.UTC(f.Y(), 0),
            // Jan 1 UTC
            b = new Date(f.Y(), 6),
            // Jul 1
            d = Date.UTC(f.Y(), 6); // Jul 1 UTC
            return 0 + ((a - c) !== (b - d));
        },
        O: function () { // Difference to GMT in hour format; e.g. +0200
            var a = jsdate.getTimezoneOffset();
            return (a > 0 ? "-" : "+") + _pad(Math.abs(a / 60 * 100), 4);
        },
        P: function () { // Difference to GMT w/colon; e.g. +02:00
            var O = f.O();
            return (O.substr(0, 3) + ":" + O.substr(3, 2));
        },
        T: function () { // Timezone abbreviation; e.g. EST, MDT, ...
            // The following works, but requires inclusion of the very
            // large timezone_abbreviations_list() function.
            /*              var abbr = '', i = 0, os = 0, default = 0;
            if (!tal.length) {
                tal = that.timezone_abbreviations_list();
            }
            if (that.php_js && that.php_js.default_timezone) {
                default = that.php_js.default_timezone;
                for (abbr in tal) {
                    for (i=0; i < tal[abbr].length; i++) {
                        if (tal[abbr][i].timezone_id === default) {
                            return abbr.toUpperCase();
                        }
                    }
                }
            }
            for (abbr in tal) {
                for (i = 0; i < tal[abbr].length; i++) {
                    os = -jsdate.getTimezoneOffset() * 60;
                    if (tal[abbr][i].offset === os) {
                        return abbr.toUpperCase();
                    }
                }
            }
*/
            return 'UTC';
        },
        Z: function () { // Timezone offset in seconds (-43200...50400)
            return -jsdate.getTimezoneOffset() * 60;
        },

        // Full Date/Time
        c: function () { // ISO-8601 date.
            return 'Y-m-d\\Th:i:sP'.replace(formatChr, formatChrCb);
        },
        r: function () { // RFC 2822
            return 'D, d M Y H:i:s O'.replace(formatChr, formatChrCb);
        },
        U: function () { // Seconds since UNIX epoch
            return jsdate.getTime() / 1000 | 0;
        }
    };
    this.date = function (format, timestamp) {
        that = this;
        jsdate = ((typeof timestamp === 'undefined') ? new Date() : // Not provided
            (timestamp instanceof Date) ? new Date(timestamp) : // JS Date()
            new Date(timestamp * 1000) // UNIX timestamp (auto-convert to int)
            );
        return format.replace(formatChr, formatChrCb);
    };
    return this.date(format, timestamp);
}
function get_html_translation_table (table, quote_style) {
  var entities = {},
    hash_map = {},
    decimal;
  var constMappingTable = {},
    constMappingQuoteStyle = {};
  var useTable = {},
    useQuoteStyle = {};

  // Translate arguments
  constMappingTable[0] = 'HTML_SPECIALCHARS';
  constMappingTable[1] = 'HTML_ENTITIES';
  constMappingQuoteStyle[0] = 'ENT_NOQUOTES';
  constMappingQuoteStyle[2] = 'ENT_COMPAT';
  constMappingQuoteStyle[3] = 'ENT_QUOTES';

  useTable = !isNaN(table) ? constMappingTable[table] : table ? table.toUpperCase() : 'HTML_SPECIALCHARS';
  useQuoteStyle = !isNaN(quote_style) ? constMappingQuoteStyle[quote_style] : quote_style ? quote_style.toUpperCase() : 'ENT_COMPAT';

  if (useTable !== 'HTML_SPECIALCHARS' && useTable !== 'HTML_ENTITIES') {
    throw new Error("Table: " + useTable + ' not supported');
    // return false;
  }

  entities['38'] = '&amp;';
  if (useTable === 'HTML_ENTITIES') {
    entities['160'] = '&nbsp;';
    entities['161'] = '&iexcl;';
    entities['162'] = '&cent;';
    entities['163'] = '&pound;';
    entities['164'] = '&curren;';
    entities['165'] = '&yen;';
    entities['166'] = '&brvbar;';
    entities['167'] = '&sect;';
    entities['168'] = '&uml;';
    entities['169'] = '&copy;';
    entities['170'] = '&ordf;';
    entities['171'] = '&laquo;';
    entities['172'] = '&not;';
    entities['173'] = '&shy;';
    entities['174'] = '&reg;';
    entities['175'] = '&macr;';
    entities['176'] = '&deg;';
    entities['177'] = '&plusmn;';
    entities['178'] = '&sup2;';
    entities['179'] = '&sup3;';
    entities['180'] = '&acute;';
    entities['181'] = '&micro;';
    entities['182'] = '&para;';
    entities['183'] = '&middot;';
    entities['184'] = '&cedil;';
    entities['185'] = '&sup1;';
    entities['186'] = '&ordm;';
    entities['187'] = '&raquo;';
    entities['188'] = '&frac14;';
    entities['189'] = '&frac12;';
    entities['190'] = '&frac34;';
    entities['191'] = '&iquest;';
    entities['192'] = '&Agrave;';
    entities['193'] = '&Aacute;';
    entities['194'] = '&Acirc;';
    entities['195'] = '&Atilde;';
    entities['196'] = '&Auml;';
    entities['197'] = '&Aring;';
    entities['198'] = '&AElig;';
    entities['199'] = '&Ccedil;';
    entities['200'] = '&Egrave;';
    entities['201'] = '&Eacute;';
    entities['202'] = '&Ecirc;';
    entities['203'] = '&Euml;';
    entities['204'] = '&Igrave;';
    entities['205'] = '&Iacute;';
    entities['206'] = '&Icirc;';
    entities['207'] = '&Iuml;';
    entities['208'] = '&ETH;';
    entities['209'] = '&Ntilde;';
    entities['210'] = '&Ograve;';
    entities['211'] = '&Oacute;';
    entities['212'] = '&Ocirc;';
    entities['213'] = '&Otilde;';
    entities['214'] = '&Ouml;';
    entities['215'] = '&times;';
    entities['216'] = '&Oslash;';
    entities['217'] = '&Ugrave;';
    entities['218'] = '&Uacute;';
    entities['219'] = '&Ucirc;';
    entities['220'] = '&Uuml;';
    entities['221'] = '&Yacute;';
    entities['222'] = '&THORN;';
    entities['223'] = '&szlig;';
    entities['224'] = '&agrave;';
    entities['225'] = '&aacute;';
    entities['226'] = '&acirc;';
    entities['227'] = '&atilde;';
    entities['228'] = '&auml;';
    entities['229'] = '&aring;';
    entities['230'] = '&aelig;';
    entities['231'] = '&ccedil;';
    entities['232'] = '&egrave;';
    entities['233'] = '&eacute;';
    entities['234'] = '&ecirc;';
    entities['235'] = '&euml;';
    entities['236'] = '&igrave;';
    entities['237'] = '&iacute;';
    entities['238'] = '&icirc;';
    entities['239'] = '&iuml;';
    entities['240'] = '&eth;';
    entities['241'] = '&ntilde;';
    entities['242'] = '&ograve;';
    entities['243'] = '&oacute;';
    entities['244'] = '&ocirc;';
    entities['245'] = '&otilde;';
    entities['246'] = '&ouml;';
    entities['247'] = '&divide;';
    entities['248'] = '&oslash;';
    entities['249'] = '&ugrave;';
    entities['250'] = '&uacute;';
    entities['251'] = '&ucirc;';
    entities['252'] = '&uuml;';
    entities['253'] = '&yacute;';
    entities['254'] = '&thorn;';
    entities['255'] = '&yuml;';
  }

  if (useQuoteStyle !== 'ENT_NOQUOTES') {
    entities['34'] = '&quot;';
  }
  if (useQuoteStyle === 'ENT_QUOTES') {
    entities['39'] = '&#39;';
  }
  entities['60'] = '&lt;';
  entities['62'] = '&gt;';


  // ascii decimals to real symbols
  for (decimal in entities) {
    if (entities.hasOwnProperty(decimal)) {
      hash_map[String.fromCharCode(decimal)] = entities[decimal];
    }
  }

  return hash_map;
}

function htmlentities (string, quote_style, charset, double_encode) {
  var hash_map = get_html_translation_table('HTML_ENTITIES', quote_style);
  var symbol = '';
  string = string == null ? '' : string + '';

  if (!hash_map) {
    return false;
  }

  if (quote_style && quote_style === 'ENT_QUOTES') {
    hash_map["'"] = '&#039;';
  }

  if (!!double_encode || double_encode == null) {
    for (symbol in hash_map) {
      if (hash_map.hasOwnProperty(symbol)) {
        string = string.split(symbol).join(hash_map[symbol]);
      }
    }
  } else {
    string = string.replace(/([\s\S]*?)(&(?:#\d+|#x[\da-f]+|[a-zA-Z][\da-z]*);|$)/g, function (ignore, text, entity) {
      for (symbol in hash_map) {
        if (hash_map.hasOwnProperty(symbol)) {
          text = text.split(symbol).join(hash_map[symbol]);
        }
      }

      return text + entity;
    });
  }

  return string;
}

function in_array(needle, haystack, argStrict) {
    var key = '';
    var strict = !! argStrict;

    if (strict) {
        for (key in haystack) {
            if (haystack[key] === needle) {
                return true;
            }
        }
    } else {
        for (key in haystack) {
            if (haystack[key] == needle) {
                return true;
            }
        }
    }
    return false;
}


function strtotime(str, now) {
    var i, match, s, strTmp = '',
    parse = '';

    strTmp = str;
    strTmp = strTmp.replace(/\s{2,}|^\s|\s$/g, ' '); // unecessary spaces
    strTmp = strTmp.replace(/[\t\r\n]/g, ''); // unecessary chars
    if (strTmp == 'now') {
        return (new Date()).getTime() / 1000; // Return seconds, not milli-seconds
    } else if (!isNaN(parse = Date.parse(strTmp))) {
        return (parse / 1000);
    } else if (now) {
        now = new Date(now * 1000); // Accept PHP-style seconds
    } else {
        now = new Date();
    }

    strTmp = strTmp.toLowerCase();

    var __is = {
        day: {
            'sun': 0,
            'mon': 1,
            'tue': 2,
            'wed': 3,
            'thu': 4,
            'fri': 5,
            'sat': 6
        },
        mon: {
            'jan': 0,
            'feb': 1,
            'mar': 2,
            'apr': 3,
            'may': 4,
            'jun': 5,
            'jul': 6,
            'aug': 7,
            'sep': 8,
            'oct': 9,
            'nov': 10,
            'dec': 11
        }
    };

    var process = function (m) {
        var ago = (m[2] && m[2] == 'ago');
        var num = (num = m[0] == 'last' ? -1 : 1) * (ago ? -1 : 1);

        switch (m[0]) {
            case 'last':
            case 'next':
                switch (m[1].substring(0, 3)) {
                    case 'yea':
                        now.setFullYear(now.getFullYear() + num);
                        break;
                    case 'mon':
                        now.setMonth(now.getMonth() + num);
                        break;
                    case 'wee':
                        now.setDate(now.getDate() + (num * 7));
                        break;
                    case 'day':
                        now.setDate(now.getDate() + num);
                        break;
                    case 'hou':
                        now.setHours(now.getHours() + num);
                        break;
                    case 'min':
                        now.setMinutes(now.getMinutes() + num);
                        break;
                    case 'sec':
                        now.setSeconds(now.getSeconds() + num);
                        break;
                    default:
                        var day;
                        if (typeof(day = __is.day[m[1].substring(0, 3)]) != 'undefined') {
                            var diff = day - now.getDay();
                            if (diff == 0) {
                                diff = 7 * num;
                            } else if (diff > 0) {
                                if (m[0] == 'last') {
                                    diff -= 7;
                                }
                            } else {
                                if (m[0] == 'next') {
                                    diff += 7;
                                }
                            }
                            now.setDate(now.getDate() + diff);
                        }
                }
                break;

            default:
                if (/\d+/.test(m[0])) {
                    num *= parseInt(m[0], 10);

                    switch (m[1].substring(0, 3)) {
                        case 'yea':
                            now.setFullYear(now.getFullYear() + num);
                            break;
                        case 'mon':
                            now.setMonth(now.getMonth() + num);
                            break;
                        case 'wee':
                            now.setDate(now.getDate() + (num * 7));
                            break;
                        case 'day':
                            now.setDate(now.getDate() + num);
                            break;
                        case 'hou':
                            now.setHours(now.getHours() + num);
                            break;
                        case 'min':
                            now.setMinutes(now.getMinutes() + num);
                            break;
                        case 'sec':
                            now.setSeconds(now.getSeconds() + num);
                            break;
                    }
                } else {
                    return false;
                }
                break;
        }
        return true;
    };

    match = strTmp.match(/^(\d{2,4}-\d{2}-\d{2})(?:\s(\d{1,2}:\d{2}(:\d{2})?)?(?:\.(\d+))?)?$/);
    if (match != null) {
        if (!match[2]) {
            match[2] = '00:00:00';
        } else if (!match[3]) {
            match[2] += ':00';
        }

        s = match[1].split(/-/g);

        for (i in __is.mon) {
            if (__is.mon[i] == s[1] - 1) {
                s[1] = i;
            }
        }
        s[0] = parseInt(s[0], 10);

        s[0] = (s[0] >= 0 && s[0] <= 69) ? '20' + (s[0] < 10 ? '0' + s[0] : s[0] + '') : (s[0] >= 70 && s[0] <= 99) ? '19' + s[0] : s[0] + '';
        return parseInt(this.strtotime(s[2] + ' ' + s[1] + ' ' + s[0] + ' ' + match[2]) + (match[4] ? match[4] / 1000 : ''), 10);
    }

    var regex = '([+-]?\\d+\\s' + '(years?|months?|weeks?|days?|hours?|min|minutes?|sec|seconds?' + '|sun\\.?|sunday|mon\\.?|monday|tue\\.?|tuesday|wed\\.?|wednesday' + '|thu\\.?|thursday|fri\\.?|friday|sat\\.?|saturday)' + '|(last|next)\\s' + '(years?|months?|weeks?|days?|hours?|min|minutes?|sec|seconds?' + '|sun\\.?|sunday|mon\\.?|monday|tue\\.?|tuesday|wed\\.?|wednesday' + '|thu\\.?|thursday|fri\\.?|friday|sat\\.?|saturday))' + '(\\sago)?';

    match = strTmp.match(new RegExp(regex, 'gi')); // Brett: seems should be case insensitive per docs, so added 'i'
    if (match == null) {
        return false;
    }

    for (i = 0; i < match.length; i++) {
        if (!process(match[i].split(' '))) {
            return false;
        }
    }

    return (now.getTime() / 1000);
}

function closeAlertBox() { $('.home-alert').slideUp();}

function urldecode(str){return decodeURIComponent((str+'').replace(/\+/g,'%20'));}
function urlencode(str){str=(str+'').toString();return encodeURIComponent(str).replace(/!/g,'%21').replace(/'/g,'%27').replace(/\(/g,'%28').replace(/\)/g,'%29').replace(/\*/g,'%2A').replace(/%20/g,'+');}