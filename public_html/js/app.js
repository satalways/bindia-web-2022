/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

//require('./bootstrap');
__webpack_require__(/*! ./datetime.min */ "./resources/js/datetime.min.js");

__webpack_require__(/*! ./string.min */ "./resources/js/string.min.js");

__webpack_require__(/*! ./variable.min */ "./resources/js/variable.min.js");

/***/ }),

/***/ "./resources/js/datetime.min.js":
/*!**************************************!*\
  !*** ./resources/js/datetime.min.js ***!
  \**************************************/
/***/ (() => {

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/* 
 * More info at: http://phpjs.org
 * 
 * This is version: 3.24
 * php.js is copyright 2011 Kevin van Zonneveld.
 * 
 * Portions copyright Brett Zamir (http://brett-zamir.me), Kevin van Zonneveld
 * (http://kevin.vanzonneveld.net), Onno Marsman, Theriault, Michael White
 * (http://getsprink.com), Waldo Malqui Silva, Paulo Freitas, Jonas Raoni
 * Soares Silva (http://www.jsfromhell.com), Jack, Philip Peterson, Ates Goral
 * (http://magnetiq.com), Legaev Andrey, Ratheous, Alex, Martijn Wieringa,
 * Nate, lmeyrick (https://sourceforge.net/projects/bcmath-js/), Enrique
 * Gonzalez, Philippe Baumann, Rafał Kukawski (http://blog.kukawski.pl),
 * Webtoolkit.info (http://www.webtoolkit.info/), Ole Vrijenhoek, Ash Searle
 * (http://hexmen.com/blog/), travc, Carlos R. L. Rodrigues
 * (http://www.jsfromhell.com), Jani Hartikainen, stag019, GeekFG
 * (http://geekfg.blogspot.com), WebDevHobo (http://webdevhobo.blogspot.com/),
 * Erkekjetter, pilus, Rafał Kukawski (http://blog.kukawski.pl/), Johnny Mast
 * (http://www.phpvrouwen.nl), T.Wild,
 * http://stackoverflow.com/questions/57803/how-to-convert-decimal-to-hex-in-javascript,
 * d3x, Michael Grier, Andrea Giammarchi (http://webreflection.blogspot.com),
 * marrtins, Mailfaker (http://www.weedem.fr/), Steve Hilder, gettimeofday,
 * mdsjack (http://www.mdsjack.bo.it), felix, majak, Steven Levithan
 * (http://blog.stevenlevithan.com), Mirek Slugen, Oleg Eremeev, Felix
 * Geisendoerfer (http://www.debuggable.com/felix), Martin
 * (http://www.erlenwiese.de/), gorthaur, Lars Fischer, Joris, AJ, Paul Smith,
 * Tim de Koning (http://www.kingsquare.nl), KELAN, Josh Fraser
 * (http://onlineaspect.com/2007/06/08/auto-detect-a-time-zone-with-javascript/),
 * Chris, Marc Palau, Kevin van Zonneveld (http://kevin.vanzonneveld.net/),
 * Arpad Ray (mailto:arpad@php.net), Breaking Par Consulting Inc
 * (http://www.breakingpar.com/bkp/home.nsf/0/87256B280015193F87256CFB006C45F7),
 * Nathan, Karol Kowalski, David, Dreamer, Diplom@t (http://difane.com/), Caio
 * Ariede (http://caioariede.com), Robin, Imgen Tata (http://www.myipdf.com/),
 * Pellentesque Malesuada, saulius, Aman Gupta, Sakimori, Tyler Akins
 * (http://rumkin.com), Thunder.m, Public Domain
 * (http://www.json.org/json2.js), Michael White, Kankrelune
 * (http://www.webfaktory.info/), Alfonso Jimenez
 * (http://www.alfonsojimenez.com), Frank Forte, vlado houba, Marco, Billy,
 * David James, madipta, noname, sankai, class_exists, Jalal Berrami, ger,
 * Itsacon (http://www.itsacon.net/), Scott Cariss, nobbler, Arno, Denny
 * Wardhana, ReverseSyntax, Mateusz "loonquawl" Zalega, Slawomir Kaniecki,
 * Francois, Fox, mktime, Douglas Crockford (http://javascript.crockford.com),
 * john (http://www.jd-tech.net), Oskar Larsson Högfeldt
 * (http://oskar-lh.name/), marc andreu, Nick Kolosov (http://sammy.ru), date,
 * Marc Jansen, Steve Clay, Olivier Louvignes (http://mg-crea.com/), Soren
 * Hansen, merabi, Subhasis Deb, josh, T0bsn, Tim Wiel, Brad Touesnard, MeEtc
 * (http://yass.meetcweb.com), Peter-Paul Koch
 * (http://www.quirksmode.org/js/beat.html), Pyerre, Jon Hohle, duncan, Bayron
 * Guevara, Adam Wallner (http://web2.bitbaro.hu/), paulo kuong, Gilbert,
 * Lincoln Ramsay, Thiago Mata (http://thiagomata.blog.com), Linuxworld,
 * lmeyrick (https://sourceforge.net/projects/bcmath-js/this.), djmix, Bryan
 * Elliott, David Randall, Sanjoy Roy, jmweb, Francesco, Stoyan Kyosev
 * (http://www.svest.org/), J A R, kenneth, T. Wild, Ole Vrijenhoek
 * (http://www.nervous.nl/), Raphael (Ao RUDLER), Shingo, LH, JB, nord_ua, jd,
 * JT, Thomas Beaucourt (http://www.webapp.fr), Ozh, XoraX
 * (http://www.xorax.info), EdorFaus, Eugene Bulkin (http://doubleaw.com/),
 * Der Simon (http://innerdom.sourceforge.net/), 0m3r, echo is bad,
 * FremyCompany, stensi, Kristof Coomans (SCK-CEN Belgian Nucleair Research
 * Centre), Devan Penner-Woelk, Pierre-Luc Paour, Martin Pool, Brant Messenger
 * (http://www.brantmessenger.com/), Kirk Strobeck, Saulo Vallory, Christoph,
 * Wagner B. Soares, Artur Tchernychev, Valentina De Rosa, Jason Wong
 * (http://carrot.org/), Daniel Esteban, strftime, Rick Waldron, Mick@el,
 * Anton Ongson, Bjorn Roesbeke (http://www.bjornroesbeke.be/), Simon Willison
 * (http://simonwillison.net), Gabriel Paderni, Philipp Lenssen, Marco van
 * Oort, Bug?, Blues (http://tech.bluesmoon.info/), Tomasz Wesolowski, rezna,
 * Eric Nagel, Evertjan Garretsen, Luke Godfrey, Pul, Bobby Drake, uestla,
 * Alan C, Ulrich, Zahlii, Yves Sucaet, sowberry, Norman "zEh" Fuchs, hitwork,
 * johnrembo, Brian Tafoya (http://www.premasolutions.com/), Nick Callen,
 * Steven Levithan (stevenlevithan.com), ejsanders, Scott Baker, Philippe
 * Jausions (http://pear.php.net/user/jausions), Aidan Lister
 * (http://aidanlister.com/), Rob, e-mike, HKM, ChaosNo1, metjay, strcasecmp,
 * strcmp, Taras Bogach, jpfle, Alexander Ermolaev
 * (http://snippets.dzone.com/user/AlexanderErmolaev), DxGx, kilops, Orlando,
 * dptr1988, Le Torbi, James (http://www.james-bell.co.uk/), Pedro Tainha
 * (http://www.pedrotainha.com), James, penutbutterjelly, Arnout Kazemier
 * (http://www.3rd-Eden.com), 3D-GRAF, daniel airton wermann
 * (http://wermann.com.br), jakes, Yannoo, FGFEmperor, gabriel paderni, Atli
 * Þór, Maximusya, Diogo Resende, Rival, Howard Yeend, Allan Jensen
 * (http://www.winternet.no), davook, Benjamin Lupton, baris ozdil, Greg
 * Frazier, Manish, Matt Bradley, Cord, fearphage
 * (http://http/my.opera.com/fearphage/), Matteo, Victor, taith, Tim de
 * Koning, Ryan W Tenney (http://ryan.10e.us), Tod Gentille, Alexander M
 * Beedie, Riddler (http://www.frontierwebdev.com/), Luis Salazar
 * (http://www.freaky-media.com/), Rafał Kukawski, T.J. Leahy, Luke Smith
 * (http://lucassmith.name), Kheang Hok Chin (http://www.distantia.ca/),
 * Russell Walker (http://www.nbill.co.uk/), Jamie Beck
 * (http://www.terabit.ca/), Garagoth, Andrej Pavlovic, Dino, Le Torbi
 * (http://www.letorbi.de/), Ben (http://benblume.co.uk/), DtTvB
 * (http://dt.in.th/2008-09-16.string-length-in-bytes.html), Michael, Chris
 * McMacken, setcookie, YUI Library:
 * http://developer.yahoo.com/yui/docs/YAHOO.util.DateLocale.html, Andreas,
 * Blues at http://hacks.bluesmoon.info/strftime/strftime.js, rem, Josep Sanz
 * (http://www.ws3.es/), Cagri Ekin, Lorenzo Pisani, incidence, Amirouche, Jay
 * Klehr, Amir Habibi (http://www.residence-mixte.com/), Tony, booeyOH, meo,
 * William, Greenseed, Yen-Wei Liu, Ben Bryan, Leslie Hoare, mk.keck
 * 
 * Dual licensed under the MIT (MIT-LICENSE.txt)
 * and GPL (GPL-LICENSE.txt) licenses.
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a
 * copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL KEVIN VAN ZONNEVELD BE LIABLE FOR ANY CLAIM, DAMAGES
 * OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
 * ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 */
// Compression: minified
function array_map(callback) {
  var argc = arguments.length,
      argv = arguments;
  var j = argv[1].length,
      i = 0,
      k = 1,
      m = 0;
  var tmp = [],
      tmp_ar = [];

  while (i < j) {
    while (k < argc) {
      tmp[m++] = argv[k++][i];
    }

    m = 0;
    k = 1;

    if (callback) {
      if (typeof callback === 'string') {
        callback = this.window[callback];
      }

      tmp_ar[i++] = callback.apply(null, tmp);
    } else {
      tmp_ar[i++] = tmp;
    }

    tmp = [];
  }

  return tmp_ar;
}

function checkdate(m, d, y) {
  return m > 0 && m < 13 && y > 0 && y < 32768 && d > 0 && d <= new Date(y, m, 0).getDate();
}

function date(format, timestamp) {
  var that = this,
      jsdate,
      f,
      formatChr = /\\?([a-z])/gi,
      formatChrCb,
      _pad = function _pad(n, c) {
    if ((n = n + "").length < c) {
      return new Array(++c - n.length).join("0") + n;
    } else {
      return n;
    }
  },
      txt_words = ["Sun", "Mon", "Tues", "Wednes", "Thurs", "Fri", "Satur", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
      txt_ordin = {
    1: "st",
    2: "nd",
    3: "rd",
    21: "st",
    22: "nd",
    23: "rd",
    31: "st"
  };

  formatChrCb = function formatChrCb(t, s) {
    return f[t] ? f[t]() : s;
  };

  f = {
    d: function d() {
      return _pad(f.j(), 2);
    },
    D: function D() {
      return f.l().slice(0, 3);
    },
    j: function j() {
      return jsdate.getDate();
    },
    l: function l() {
      return txt_words[f.w()] + 'day';
    },
    N: function N() {
      return f.w() || 7;
    },
    S: function S() {
      return txt_ordin[f.j()] || 'th';
    },
    w: function w() {
      return jsdate.getDay();
    },
    z: function z() {
      var a = new Date(f.Y(), f.n() - 1, f.j()),
          b = new Date(f.Y(), 0, 1);
      return Math.round((a - b) / 864e5) + 1;
    },
    W: function W() {
      var a = new Date(f.Y(), f.n() - 1, f.j() - f.N() + 3),
          b = new Date(a.getFullYear(), 0, 4);
      return 1 + Math.round((a - b) / 864e5 / 7);
    },
    F: function F() {
      return txt_words[6 + f.n()];
    },
    m: function m() {
      return _pad(f.n(), 2);
    },
    M: function M() {
      return f.F().slice(0, 3);
    },
    n: function n() {
      return jsdate.getMonth() + 1;
    },
    t: function t() {
      return new Date(f.Y(), f.n(), 0).getDate();
    },
    L: function L() {
      return new Date(f.Y(), 1, 29).getMonth() === 1 | 0;
    },
    o: function o() {
      var n = f.n(),
          W = f.W(),
          Y = f.Y();
      return Y + (n === 12 && W < 9 ? -1 : n === 1 && W > 9);
    },
    Y: function Y() {
      return jsdate.getFullYear();
    },
    y: function y() {
      return (f.Y() + "").slice(-2);
    },
    a: function a() {
      return jsdate.getHours() > 11 ? "pm" : "am";
    },
    A: function A() {
      return f.a().toUpperCase();
    },
    B: function B() {
      var H = jsdate.getUTCHours() * 36e2,
          i = jsdate.getUTCMinutes() * 60,
          s = jsdate.getUTCSeconds();
      return _pad(Math.floor((H + i + s + 36e2) / 86.4) % 1e3, 3);
    },
    g: function g() {
      return f.G() % 12 || 12;
    },
    G: function G() {
      return jsdate.getHours();
    },
    h: function h() {
      return _pad(f.g(), 2);
    },
    H: function H() {
      return _pad(f.G(), 2);
    },
    i: function i() {
      return _pad(jsdate.getMinutes(), 2);
    },
    s: function s() {
      return _pad(jsdate.getSeconds(), 2);
    },
    u: function u() {
      return _pad(jsdate.getMilliseconds() * 1000, 6);
    },
    e: function e() {
      throw 'Not supported (see source code of date() for timezone on how to add support)';
    },
    I: function I() {
      var a = new Date(f.Y(), 0),
          c = Date.UTC(f.Y(), 0),
          b = new Date(f.Y(), 6),
          d = Date.UTC(f.Y(), 6);
      return 0 + (a - c !== b - d);
    },
    O: function O() {
      var a = jsdate.getTimezoneOffset();
      return (a > 0 ? "-" : "+") + _pad(Math.abs(a / 60 * 100), 4);
    },
    P: function P() {
      var O = f.O();
      return O.substr(0, 3) + ":" + O.substr(3, 2);
    },
    T: function T() {
      return 'UTC';
    },
    Z: function Z() {
      return -jsdate.getTimezoneOffset() * 60;
    },
    c: function c() {
      return 'Y-m-d\\Th:i:sP'.replace(formatChr, formatChrCb);
    },
    r: function r() {
      return 'D, d M Y H:i:s O'.replace(formatChr, formatChrCb);
    },
    U: function U() {
      return jsdate.getTime() / 1000 | 0;
    }
  };

  this.date = function (format, timestamp) {
    that = this;
    jsdate = typeof timestamp === 'undefined' ? new Date() : timestamp instanceof Date ? new Date(timestamp) : new Date(timestamp * 1000);
    return format.replace(formatChr, formatChrCb);
  };

  return this.date(format, timestamp);
}

function date_default_timezone_get() {
  var tal = {},
      abbr = '',
      i = 0,
      curr_offset = -new Date().getTimezoneOffset() * 60;

  if (this.php_js) {
    if (this.php_js.default_timezone) {
      return this.php_js.default_timezone;
    }

    if (this.php_js.ENV && this.php_js.ENV.TZ) {
      return this.php_js.ENV.TZ;
    }

    if (this.php_js.ini && this.php_js.ini['date.timezone']) {
      return this.php_js.ini['date.timezone'].local_value ? this.php_js.ini['date.timezone'].local_value : this.php_js.ini['date.timezone'].global_value;
    }
  }

  tal = this.timezone_abbreviations_list();

  for (abbr in tal) {
    for (i = 0; i < tal[abbr].length; i++) {
      if (tal[abbr][i].offset === curr_offset) {
        return tal[abbr][i].timezone_id;
      }
    }
  }

  return 'UTC';
}

function date_default_timezone_set(tz) {
  var tal = {},
      abbr = '',
      i = 0;
  this.php_js = this.php_js || {};
  tal = this.timezone_abbreviations_list();

  for (abbr in tal) {
    for (i = 0; i < tal[abbr].length; i++) {
      if (tal[abbr][i].timezone_id === tz) {
        this.php_js.default_timezone = tz;
        return true;
      }
    }
  }

  return false;
}

function date_parse(date) {
  this.php_js = this.php_js || {};
  var warningsOffset = this.php_js.warnings ? this.php_js.warnings.length : null;
  var errorsOffset = this.php_js.errors ? this.php_js.errors.length : null;

  try {
    var ts = this.strtotime(date);
  } finally {
    if (!ts) {
      return false;
    }
  }

  var dt = new Date(ts * 1000);
  var retObj = {
    warning_count: warningsOffset !== null ? this.php_js.warnings.slice(warningsOffset).length : 0,
    warnings: warningsOffset !== null ? this.php_js.warnings.slice(warningsOffset) : [],
    error_count: errorsOffset !== null ? this.php_js.errors.slice(errorsOffset).length : 0,
    errors: errorsOffset !== null ? this.php_js.errors.slice(errorsOffset) : []
  };
  retObj.year = dt.getFullYear();
  retObj.month = dt.getMonth() + 1;
  retObj.day = dt.getDate();
  retObj.hour = dt.getHours();
  retObj.minute = dt.getMinutes();
  retObj.second = dt.getSeconds();
  retObj.fraction = parseFloat('0.' + dt.getMilliseconds());
  retObj.is_localtime = dt.getTimezoneOffset !== 0;
  return retObj;
}

function getdate(timestamp) {
  var _w = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
  var _m = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  var d = typeof timestamp == 'undefined' ? new Date() : _typeof(timestamp) == 'object' ? new Date(timestamp) : new Date(timestamp * 1000);
  var w = d.getDay();
  var m = d.getMonth();
  var y = d.getFullYear();
  var r = {};
  r.seconds = d.getSeconds();
  r.minutes = d.getMinutes();
  r.hours = d.getHours();
  r.mday = d.getDate();
  r.wday = w;
  r.mon = m + 1;
  r.year = y;
  r.yday = Math.floor((d - new Date(y, 0, 1)) / 86400000);
  r.weekday = _w[w];
  r.month = _m[m];
  r['0'] = parseInt(d.getTime() / 1000, 10);
  return r;
}

function getenv(varname) {
  if (!this.php_js || !this.php_js.ENV || !this.php_js.ENV[varname]) {
    return false;
  }

  return this.php_js.ENV[varname];
}

function gettimeofday(return_float) {
  var t = new Date(),
      y = 0;

  if (return_float) {
    return t.getTime() / 1000;
  }

  y = t.getFullYear();
  return {
    sec: t.getUTCSeconds(),
    usec: t.getUTCMilliseconds() * 1000,
    minuteswest: t.getTimezoneOffset(),
    dsttime: 0 + (new Date(y, 0) - Date.UTC(y, 0) !== new Date(y, 6) - Date.UTC(y, 6))
  };
}

function gmdate(format, timestamp) {
  var dt = typeof timestamp == 'undefined' ? new Date() : _typeof(timestamp) == 'object' ? new Date(timestamp) : new Date(timestamp * 1000);
  timestamp = Date.parse(dt.toUTCString().slice(0, -4)) / 1000;
  return this.date(format, timestamp);
}

function gmmktime() {
  var d = new Date(),
      r = arguments,
      i = 0,
      e = ['Hours', 'Minutes', 'Seconds', 'Month', 'Date', 'FullYear'];

  for (i = 0; i < e.length; i++) {
    if (typeof r[i] === 'undefined') {
      r[i] = d['getUTC' + e[i]]();
      r[i] += i === 3;
    } else {
      r[i] = parseInt(r[i], 10);

      if (isNaN(r[i])) {
        return false;
      }
    }
  }

  r[5] += r[5] >= 0 ? r[5] <= 69 ? 2e3 : r[5] <= 100 ? 1900 : 0 : 0;
  d.setUTCFullYear(r[5], r[3] - 1, r[4]);
  d.setUTCHours(r[0], r[1], r[2]);
  return (d.getTime() / 1e3 >> 0) - (d.getTime() < 0);
}

function gmstrftime(format, timestamp) {
  var dt = typeof timestamp == 'undefined' ? new Date() : _typeof(timestamp) == 'object' ? new Date(timestamp) : new Date(timestamp * 1000);
  timestamp = Date.parse(dt.toUTCString().slice(0, -4)) / 1000;
  return this.strftime(format, timestamp);
}

function idate(format, timestamp) {
  if (format === undefined) {
    throw 'idate() expects at least 1 parameter, 0 given';
  }

  if (!format.length || format.length > 1) {
    throw 'idate format is one char';
  }

  var date = typeof timestamp === 'undefined' ? new Date() : timestamp instanceof Date ? new Date(timestamp) : new Date(timestamp * 1000),
      a;

  switch (format) {
    case 'B':
      return Math.floor((date.getUTCHours() * 36e2 + date.getUTCMinutes() * 60 + date.getUTCSeconds() + 36e2) / 86.4) % 1e3;

    case 'd':
      return date.getDate();

    case 'h':
      return date.getHours() % 12 || 12;

    case 'H':
      return date.getHours();

    case 'i':
      return date.getMinutes();

    case 'I':
      a = date.getFullYear();
      return 0 + (new Date(a, 0) - Date.UTC(a, 0) !== new Date(a, 6) - Date.UTC(a, 6));

    case 'L':
      a = date.getFullYear();
      return !(a & 3) && (a % 1e2 || !(a % 4e2)) ? 1 : 0;

    case 'm':
      return date.getMonth() + 1;

    case 's':
      return date.getSeconds();

    case 't':
      return new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();

    case 'U':
      return Math.round(date.getTime() / 1000);

    case 'w':
      return date.getDay();

    case 'W':
      a = new Date(date.getFullYear(), date.getMonth(), date.getDate() - (date.getDay() || 7) + 3);
      return 1 + Math.round((a - new Date(a.getFullYear(), 0, 4)) / 864e5 / 7);

    case 'y':
      return parseInt((date.getFullYear() + '').slice(2), 10);

    case 'Y':
      return date.getFullYear();

    case 'z':
      return Math.floor((date - new Date(date.getFullYear(), 0, 1)) / 864e5);

    case 'Z':
      return -date.getTimezoneOffset() * 60;

    default:
      throw 'Unrecognized date format token';
  }
}

function localtime(timestamp, is_assoc) {
  var t,
      yday,
      x,
      o = {};

  if (timestamp === undefined) {
    t = new Date();
  } else if (timestamp instanceof Date) {
    t = timestamp;
  } else {
    t = new Date(timestamp * 1000);
  }

  x = function x(t, m) {
    var a = new Date(t.getFullYear(), 0, m, 0, 0, 0, 0).toUTCString();
    return t - new Date(a.slice(0, a.lastIndexOf(' ') - 1));
  };

  yday = Math.floor((t - new Date(t.getFullYear(), 0, 1)) / 86400000);
  o = {
    'tm_sec': t.getSeconds(),
    'tm_min': t.getMinutes(),
    'tm_hour': t.getHours(),
    'tm_mday': t.getDate(),
    'tm_mon': t.getMonth(),
    'tm_year': t.getFullYear() - 1900,
    'tm_wday': t.getDay(),
    'tm_yday': yday,
    'tm_isdst': +(x(t, 1) != x(t, 6))
  };
  return is_assoc ? o : [o.tm_sec, o.tm_min, o.tm_hour, o.tm_mday, o.tm_mon, o.tm_year, o.tm_wday, o.tm_yday, o.tm_isdst];
}

function microtime(get_as_float) {
  var now = new Date().getTime() / 1000;
  var s = parseInt(now, 10);
  return get_as_float ? now : Math.round((now - s) * 1000) / 1000 + ' ' + s;
}

function mktime() {
  var d = new Date(),
      r = arguments,
      i = 0,
      e = ['Hours', 'Minutes', 'Seconds', 'Month', 'Date', 'FullYear'];

  for (i = 0; i < e.length; i++) {
    if (typeof r[i] === 'undefined') {
      r[i] = d['get' + e[i]]();
      r[i] += i === 3;
    } else {
      r[i] = parseInt(r[i], 10);

      if (isNaN(r[i])) {
        return false;
      }
    }
  }

  r[5] += r[5] >= 0 ? r[5] <= 69 ? 2e3 : r[5] <= 100 ? 1900 : 0 : 0;
  d.setFullYear(r[5], r[3] - 1, r[4]);
  d.setHours(r[0], r[1], r[2]);
  return (d.getTime() / 1e3 >> 0) - (d.getTime() < 0);
}

function setlocale(category, locale) {
  var categ = '',
      cats = [],
      i = 0,
      d = this.window.document;

  var _copy = function _copy(orig) {
    if (orig instanceof RegExp) {
      return new RegExp(orig);
    } else if (orig instanceof Date) {
      return new Date(orig);
    }

    var newObj = {};

    for (var i in orig) {
      if (_typeof(orig[i]) === 'object') {
        newObj[i] = _copy(orig[i]);
      } else {
        newObj[i] = orig[i];
      }
    }

    return newObj;
  };

  var _nplurals1 = function _nplurals1(n) {
    return 0;
  };

  var _nplurals2a = function _nplurals2a(n) {
    return n !== 1 ? 1 : 0;
  };

  var _nplurals2b = function _nplurals2b(n) {
    return n > 1 ? 1 : 0;
  };

  var _nplurals2c = function _nplurals2c(n) {
    return n % 10 === 1 && n % 100 !== 11 ? 0 : 1;
  };

  var _nplurals3a = function _nplurals3a(n) {
    return n % 10 === 1 && n % 100 !== 11 ? 0 : n !== 0 ? 1 : 2;
  };

  var _nplurals3b = function _nplurals3b(n) {
    return n === 1 ? 0 : n === 2 ? 1 : 2;
  };

  var _nplurals3c = function _nplurals3c(n) {
    return n === 1 ? 0 : n === 0 || n % 100 > 0 && n % 100 < 20 ? 1 : 2;
  };

  var _nplurals3d = function _nplurals3d(n) {
    return n % 10 === 1 && n % 100 !== 11 ? 0 : n % 10 >= 2 && (n % 100 < 10 || n % 100 >= 20) ? 1 : 2;
  };

  var _nplurals3e = function _nplurals3e(n) {
    return n % 10 === 1 && n % 100 !== 11 ? 0 : n % 10 >= 2 && n % 10 <= 4 && (n % 100 < 10 || n % 100 >= 20) ? 1 : 2;
  };

  var _nplurals3f = function _nplurals3f(n) {
    return n === 1 ? 0 : n >= 2 && n <= 4 ? 1 : 2;
  };

  var _nplurals3g = function _nplurals3g(n) {
    return n === 1 ? 0 : n % 10 >= 2 && n % 10 <= 4 && (n % 100 < 10 || n % 100 >= 20) ? 1 : 2;
  };

  var _nplurals3h = function _nplurals3h(n) {
    return n % 10 === 1 ? 0 : n % 10 === 2 ? 1 : 2;
  };

  var _nplurals4a = function _nplurals4a(n) {
    return n % 100 === 1 ? 0 : n % 100 === 2 ? 1 : n % 100 === 3 || n % 100 === 4 ? 2 : 3;
  };

  var _nplurals4b = function _nplurals4b(n) {
    return n === 1 ? 0 : n === 0 || n % 100 && n % 100 <= 10 ? 1 : n % 100 >= 11 && n % 100 <= 19 ? 2 : 3;
  };

  var _nplurals5 = function _nplurals5(n) {
    return n === 1 ? 0 : n === 2 ? 1 : n >= 3 && n <= 6 ? 2 : n >= 7 && n <= 10 ? 3 : 4;
  };

  var _nplurals6 = function _nplurals6(n) {
    return n === 0 ? 5 : n === 1 ? 0 : n === 2 ? 1 : n % 100 >= 3 && n % 100 <= 10 ? 2 : n % 100 >= 11 && n % 100 <= 99 ? 3 : 4;
  };

  this.php_js = this.php_js || {};
  var phpjs = this.php_js;

  if (!phpjs.locales) {
    phpjs.locales = {};
    phpjs.locales.en = {
      'LC_COLLATE': function LC_COLLATE(str1, str2) {
        return str1 == str2 ? 0 : str1 > str2 ? 1 : -1;
      },
      'LC_CTYPE': {
        an: /^[A-Za-z\d]+$/g,
        al: /^[A-Za-z]+$/g,
        ct: /^[\u0000-\u001F\u007F]+$/g,
        dg: /^[\d]+$/g,
        gr: /^[\u0021-\u007E]+$/g,
        lw: /^[a-z]+$/g,
        pr: /^[\u0020-\u007E]+$/g,
        pu: /^[\u0021-\u002F\u003A-\u0040\u005B-\u0060\u007B-\u007E]+$/g,
        sp: /^[\f\n\r\t\v ]+$/g,
        up: /^[A-Z]+$/g,
        xd: /^[A-Fa-f\d]+$/g,
        CODESET: 'UTF-8',
        lower: 'abcdefghijklmnopqrstuvwxyz',
        upper: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
      },
      'LC_TIME': {
        a: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        A: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
        b: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        B: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        c: '%a %d %b %Y %r %Z',
        p: ['AM', 'PM'],
        P: ['am', 'pm'],
        r: '%I:%M:%S %p',
        x: '%m/%d/%Y',
        X: '%r',
        alt_digits: '',
        ERA: '',
        ERA_YEAR: '',
        ERA_D_T_FMT: '',
        ERA_D_FMT: '',
        ERA_T_FMT: ''
      },
      'LC_MONETARY': {
        int_curr_symbol: 'USD',
        currency_symbol: '$',
        mon_decimal_point: '.',
        mon_thousands_sep: ',',
        mon_grouping: [3],
        positive_sign: '',
        negative_sign: '-',
        int_frac_digits: 2,
        frac_digits: 2,
        p_cs_precedes: 1,
        p_sep_by_space: 0,
        n_cs_precedes: 1,
        n_sep_by_space: 0,
        p_sign_posn: 3,
        n_sign_posn: 0
      },
      'LC_NUMERIC': {
        decimal_point: '.',
        thousands_sep: ',',
        grouping: [3]
      },
      'LC_MESSAGES': {
        YESEXPR: '^[yY].*',
        NOEXPR: '^[nN].*',
        YESSTR: '',
        NOSTR: ''
      },
      nplurals: _nplurals2a
    };
    phpjs.locales.en_US = _copy(phpjs.locales.en);
    phpjs.locales.en_US.LC_TIME.c = '%a %d %b %Y %r %Z';
    phpjs.locales.en_US.LC_TIME.x = '%D';
    phpjs.locales.en_US.LC_TIME.X = '%r';
    phpjs.locales.en_US.LC_MONETARY.int_curr_symbol = 'USD ';
    phpjs.locales.en_US.LC_MONETARY.p_sign_posn = 1;
    phpjs.locales.en_US.LC_MONETARY.n_sign_posn = 1;
    phpjs.locales.en_US.LC_MONETARY.mon_grouping = [3, 3];
    phpjs.locales.en_US.LC_NUMERIC.thousands_sep = '';
    phpjs.locales.en_US.LC_NUMERIC.grouping = [];
    phpjs.locales.en_GB = _copy(phpjs.locales.en);
    phpjs.locales.en_GB.LC_TIME.r = '%l:%M:%S %P %Z';
    phpjs.locales.en_AU = _copy(phpjs.locales.en_GB);
    phpjs.locales.C = _copy(phpjs.locales.en);
    phpjs.locales.C.LC_CTYPE.CODESET = 'ANSI_X3.4-1968';
    phpjs.locales.C.LC_MONETARY = {
      int_curr_symbol: '',
      currency_symbol: '',
      mon_decimal_point: '',
      mon_thousands_sep: '',
      mon_grouping: [],
      p_cs_precedes: 127,
      p_sep_by_space: 127,
      n_cs_precedes: 127,
      n_sep_by_space: 127,
      p_sign_posn: 127,
      n_sign_posn: 127,
      positive_sign: '',
      negative_sign: '',
      int_frac_digits: 127,
      frac_digits: 127
    };
    phpjs.locales.C.LC_NUMERIC = {
      decimal_point: '.',
      thousands_sep: '',
      grouping: []
    };
    phpjs.locales.C.LC_TIME.c = '%a %b %e %H:%M:%S %Y';
    phpjs.locales.C.LC_TIME.x = '%m/%d/%y';
    phpjs.locales.C.LC_TIME.X = '%H:%M:%S';
    phpjs.locales.C.LC_MESSAGES.YESEXPR = '^[yY]';
    phpjs.locales.C.LC_MESSAGES.NOEXPR = '^[nN]';
    phpjs.locales.fr = _copy(phpjs.locales.en);
    phpjs.locales.fr.nplurals = _nplurals2b;
    phpjs.locales.fr.LC_TIME.a = ['dim', 'lun', 'mar', 'mer', 'jeu', 'ven', 'sam'];
    phpjs.locales.fr.LC_TIME.A = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
    phpjs.locales.fr.LC_TIME.b = ['jan', "f\xE9v", 'mar', 'avr', 'mai', 'jun', 'jui', "ao\xFB", 'sep', 'oct', 'nov', "d\xE9c"];
    phpjs.locales.fr.LC_TIME.B = ['janvier', "f\xE9vrier", 'mars', 'avril', 'mai', 'juin', 'juillet', "ao\xFBt", 'septembre', 'octobre', 'novembre', "d\xE9cembre"];
    phpjs.locales.fr.LC_TIME.c = '%a %d %b %Y %T %Z';
    phpjs.locales.fr.LC_TIME.p = ['', ''];
    phpjs.locales.fr.LC_TIME.P = ['', ''];
    phpjs.locales.fr.LC_TIME.x = '%d.%m.%Y';
    phpjs.locales.fr.LC_TIME.X = '%T';
    phpjs.locales.fr_CA = _copy(phpjs.locales.fr);
    phpjs.locales.fr_CA.LC_TIME.x = '%Y-%m-%d';
  }

  if (!phpjs.locale) {
    phpjs.locale = 'en_US';
    var NS_XHTML = 'http://www.w3.org/1999/xhtml';
    var NS_XML = 'http://www.w3.org/XML/1998/namespace';

    if (d.getElementsByTagNameNS && d.getElementsByTagNameNS(NS_XHTML, 'html')[0]) {
      if (d.getElementsByTagNameNS(NS_XHTML, 'html')[0].getAttributeNS && d.getElementsByTagNameNS(NS_XHTML, 'html')[0].getAttributeNS(NS_XML, 'lang')) {
        phpjs.locale = d.getElementsByTagName(NS_XHTML, 'html')[0].getAttributeNS(NS_XML, 'lang');
      } else if (d.getElementsByTagNameNS(NS_XHTML, 'html')[0].lang) {
        phpjs.locale = d.getElementsByTagNameNS(NS_XHTML, 'html')[0].lang;
      }
    } else if (d.getElementsByTagName('html')[0] && d.getElementsByTagName('html')[0].lang) {
      phpjs.locale = d.getElementsByTagName('html')[0].lang;
    }
  }

  phpjs.locale = phpjs.locale.replace('-', '_');

  if (!(phpjs.locale in phpjs.locales)) {
    if (phpjs.locale.replace(/_[a-zA-Z]+$/, '') in phpjs.locales) {
      phpjs.locale = phpjs.locale.replace(/_[a-zA-Z]+$/, '');
    }
  }

  if (!phpjs.localeCategories) {
    phpjs.localeCategories = {
      'LC_COLLATE': phpjs.locale,
      'LC_CTYPE': phpjs.locale,
      'LC_MONETARY': phpjs.locale,
      'LC_NUMERIC': phpjs.locale,
      'LC_TIME': phpjs.locale,
      'LC_MESSAGES': phpjs.locale
    };
  }

  if (locale === null || locale === '') {
    locale = this.getenv(category) || this.getenv('LANG');
  } else if (locale instanceof Array) {
    for (i = 0; i < locale.length; i++) {
      if (!(locale[i] in this.php_js.locales)) {
        if (i === locale.length - 1) {
          return false;
        }

        continue;
      }

      locale = locale[i];
      break;
    }
  }

  if (locale === '0' || locale === 0) {
    if (category === 'LC_ALL') {
      for (categ in this.php_js.localeCategories) {
        cats.push(categ + '=' + this.php_js.localeCategories[categ]);
      }

      return cats.join(';');
    }

    return this.php_js.localeCategories[category];
  }

  if (!(locale in this.php_js.locales)) {
    return false;
  }

  if (category === 'LC_ALL') {
    for (categ in this.php_js.localeCategories) {
      this.php_js.localeCategories[categ] = locale;
    }
  } else {
    this.php_js.localeCategories[category] = locale;
  }

  return locale;
}

function strftime(fmt, timestamp) {
  this.php_js = this.php_js || {};
  this.setlocale('LC_ALL', 0);
  var phpjs = this.php_js;

  var _xPad = function _xPad(x, pad, r) {
    if (typeof r === 'undefined') {
      r = 10;
    }

    for (; parseInt(x, 10) < r && r > 1; r /= 10) {
      x = pad.toString() + x;
    }

    return x.toString();
  };

  var locale = phpjs.localeCategories.LC_TIME;
  var locales = phpjs.locales;
  var lc_time = locales[locale].LC_TIME;
  var _formats = {
    a: function a(d) {
      return lc_time.a[d.getDay()];
    },
    A: function A(d) {
      return lc_time.A[d.getDay()];
    },
    b: function b(d) {
      return lc_time.b[d.getMonth()];
    },
    B: function B(d) {
      return lc_time.B[d.getMonth()];
    },
    C: function C(d) {
      return _xPad(parseInt(d.getFullYear() / 100, 10), 0);
    },
    d: ['getDate', '0'],
    e: ['getDate', ' '],
    g: function g(d) {
      return _xPad(parseInt(this.G(d) / 100, 10), 0);
    },
    G: function G(d) {
      var y = d.getFullYear();
      var V = parseInt(_formats.V(d), 10);
      var W = parseInt(_formats.W(d), 10);

      if (W > V) {
        y++;
      } else if (W === 0 && V >= 52) {
        y--;
      }

      return y;
    },
    H: ['getHours', '0'],
    I: function I(d) {
      var I = d.getHours() % 12;
      return _xPad(I === 0 ? 12 : I, 0);
    },
    j: function j(d) {
      var ms = d - new Date('' + d.getFullYear() + '/1/1 GMT');
      ms += d.getTimezoneOffset() * 60000;
      var doy = parseInt(ms / 60000 / 60 / 24, 10) + 1;
      return _xPad(doy, 0, 100);
    },
    k: ['getHours', '0'],
    l: function l(d) {
      var l = d.getHours() % 12;
      return _xPad(l === 0 ? 12 : l, ' ');
    },
    m: function m(d) {
      return _xPad(d.getMonth() + 1, 0);
    },
    M: ['getMinutes', '0'],
    p: function p(d) {
      return lc_time.p[d.getHours() >= 12 ? 1 : 0];
    },
    P: function P(d) {
      return lc_time.P[d.getHours() >= 12 ? 1 : 0];
    },
    s: function s(d) {
      return Date.parse(d) / 1000;
    },
    S: ['getSeconds', '0'],
    u: function u(d) {
      var dow = d.getDay();
      return dow === 0 ? 7 : dow;
    },
    U: function U(d) {
      var doy = parseInt(_formats.j(d), 10);
      var rdow = 6 - d.getDay();
      var woy = parseInt((doy + rdow) / 7, 10);
      return _xPad(woy, 0);
    },
    V: function V(d) {
      var woy = parseInt(_formats.W(d), 10);
      var dow1_1 = new Date('' + d.getFullYear() + '/1/1').getDay();
      var idow = woy + (dow1_1 > 4 || dow1_1 <= 1 ? 0 : 1);

      if (idow === 53 && new Date('' + d.getFullYear() + '/12/31').getDay() < 4) {
        idow = 1;
      } else if (idow === 0) {
        idow = _formats.V(new Date('' + (d.getFullYear() - 1) + '/12/31'));
      }

      return _xPad(idow, 0);
    },
    w: 'getDay',
    W: function W(d) {
      var doy = parseInt(_formats.j(d), 10);

      var rdow = 7 - _formats.u(d);

      var woy = parseInt((doy + rdow) / 7, 10);
      return _xPad(woy, 0, 10);
    },
    y: function y(d) {
      return _xPad(d.getFullYear() % 100, 0);
    },
    Y: 'getFullYear',
    z: function z(d) {
      var o = d.getTimezoneOffset();

      var H = _xPad(parseInt(Math.abs(o / 60), 10), 0);

      var M = _xPad(o % 60, 0);

      return (o > 0 ? '-' : '+') + H + M;
    },
    Z: function Z(d) {
      return d.toString().replace(/^.*\(([^)]+)\)$/, '$1');
    },
    '%': function _(d) {
      return '%';
    }
  };

  var _date = typeof timestamp == 'undefined' ? new Date() : _typeof(timestamp) == 'object' ? new Date(timestamp) : new Date(timestamp * 1000);

  var _aggregates = {
    c: 'locale',
    D: '%m/%d/%y',
    F: '%y-%m-%d',
    h: '%b',
    n: '\n',
    r: 'locale',
    R: '%H:%M',
    t: '\t',
    T: '%H:%M:%S',
    x: 'locale',
    X: 'locale'
  };

  while (fmt.match(/%[cDFhnrRtTxX]/)) {
    fmt = fmt.replace(/%([cDFhnrRtTxX])/g, function (m0, m1) {
      var f = _aggregates[m1];
      return f === 'locale' ? lc_time[m1] : f;
    });
  }

  var str = fmt.replace(/%([aAbBCdegGHIjklmMpPsSuUVwWyYzZ%])/g, function (m0, m1) {
    var f = _formats[m1];

    if (typeof f === 'string') {
      return _date[f]();
    } else if (typeof f === 'function') {
      return f(_date);
    } else if (_typeof(f) === 'object' && typeof f[0] === 'string') {
      return _xPad(_date[f[0]](), f[1]);
    } else {
      return m1;
    }
  });
  return str;
}

function strptime(dateStr, format) {
  var retObj = {
    tm_sec: 0,
    tm_min: 0,
    tm_hour: 0,
    tm_mday: 0,
    tm_mon: 0,
    tm_year: 0,
    tm_wday: 0,
    tm_yday: 0,
    unparsed: ''
  },
      that = this,
      amPmOffset = 0,
      prevHour = false,
      _date = function _date() {
    var o = retObj;
    return _reset(new Date(Date.UTC(o.tm_year + 1900, o.tm_mon, o.tm_mday || 1, o.tm_hour, o.tm_min, o.tm_sec)), o.tm_mday);
  },
      _reset = function _reset(dateObj, realMday) {
    var o = retObj;
    var d = dateObj;
    o.tm_sec = d.getUTCSeconds();
    o.tm_min = d.getUTCMinutes();
    o.tm_hour = d.getUTCHours();
    o.tm_mday = realMday === 0 ? realMday : d.getUTCDate();
    o.tm_mon = d.getUTCMonth();
    o.tm_year = d.getUTCFullYear() - 1900;
    o.tm_wday = realMday === 0 ? d.getUTCDay() > 0 ? d.getUTCDay() - 1 : 6 : d.getUTCDay();
    var jan1 = new Date(Date.UTC(d.getUTCFullYear(), 0, 1));
    o.tm_yday = Math.ceil((d - jan1) / (1000 * 60 * 60 * 24));
  };

  var _NWS = /\S/,
      _WS = /\s/;
  var _aggregates = {
    c: 'locale',
    D: '%m/%d/%y',
    F: '%y-%m-%d',
    r: 'locale',
    R: '%H:%M',
    T: '%H:%M:%S',
    x: 'locale',
    X: 'locale'
  };

  var _preg_quote = function _preg_quote(str) {
    return (str + '').replace(/([\\\.\+\*\?\[\^\]\$\(\)\{\}\=\!<>\|\:])/g, '\\$1');
  };

  this.php_js = this.php_js || {};
  this.setlocale('LC_ALL', 0);
  var phpjs = this.php_js;
  var locale = phpjs.localeCategories.LC_TIME;
  var locales = phpjs.locales;
  var lc_time = locales[locale].LC_TIME;

  while (format.match(/%[cDFhnrRtTxX]/)) {
    format = format.replace(/%([cDFhnrRtTxX])/g, function (m0, m1) {
      var f = _aggregates[m1];
      return f === 'locale' ? lc_time[m1] : f;
    });
  }

  var _addNext = function _addNext(j, regex, cb) {
    if (typeof regex === 'string') {
      regex = new RegExp('^' + regex, 'i');
    }

    var check = dateStr.slice(j);
    var match = regex.exec(check);
    var testNull = match ? cb.apply(null, match) : null;

    if (testNull === null) {
      throw 'No match in string';
    }

    return j + match[0].length;
  };

  var _addLocalized = function _addLocalized(j, formatChar, category) {
    return _addNext(j, that.array_map(_preg_quote, lc_time[formatChar]).join('|'), function (m) {
      var match = lc_time[formatChar].search(new RegExp('^' + _preg_quote(m) + '$', 'i'));

      if (match) {
        retObj[category] = match[0];
      }
    });
  };

  for (var i = 0, j = 0; i < format.length; i++) {
    if (format.charAt(i) === '%') {
      var literalPos = ['%', 'n', 't'].indexOf(format.charAt(i + 1));

      if (literalPos !== -1) {
        if (['%', '\n', '\t'].indexOf(dateStr.charAt(j)) === literalPos) {
          ++i, ++j;
          continue;
        }

        return false;
      }

      var formatChar = format.charAt(i + 1);

      try {
        switch (formatChar) {
          case 'a':
          case 'A':
            j = _addLocalized(j, formatChar, 'tm_wday');
            break;

          case 'h':
          case 'b':
            j = _addLocalized(j, 'b', 'tm_mon');

            _date();

            break;

          case 'B':
            j = _addLocalized(j, formatChar, 'tm_mon');

            _date();

            break;

          case 'C':
            j = _addNext(j, /^\d?\d/, function (d) {
              var year = (parseInt(d, 10) - 19) * 100;
              retObj.tm_year = year;

              _date();

              if (!retObj.tm_yday) {
                retObj.tm_yday = -1;
              }
            });
            break;

          case 'd':
          case 'e':
            j = _addNext(j, formatChar === 'd' ? /^(0[1-9]|[1-2]\d|3[0-1])/ : /^([1-2]\d|3[0-1]|[1-9])/, function (d) {
              var dayMonth = parseInt(d, 10);
              retObj.tm_mday = dayMonth;

              _date();
            });
            break;

          case 'g':
            break;

          case 'G':
            break;

          case 'H':
            j = _addNext(j, /^([0-1]\d|2[0-3])/, function (d) {
              var hour = parseInt(d, 10);
              retObj.tm_hour = hour;
            });
            break;

          case 'l':
          case 'I':
            j = _addNext(j, formatChar === 'l' ? /^([1-9]|1[0-2])/ : /^(0[1-9]|1[0-2])/, function (d) {
              var hour = parseInt(d, 10) - 1 + amPmOffset;
              retObj.tm_hour = hour;
              prevHour = true;
            });
            break;

          case 'j':
            j = _addNext(j, /^(00[1-9]|0[1-9]\d|[1-2]\d\d|3[0-6][0-6])/, function (d) {
              var dayYear = parseInt(d, 10) - 1;
              retObj.tm_yday = dayYear;
            });
            break;

          case 'm':
            j = _addNext(j, /^(0[1-9]|1[0-2])/, function (d) {
              var month = parseInt(d, 10) - 1;
              retObj.tm_mon = month;

              _date();
            });
            break;

          case 'M':
            j = _addNext(j, /^[0-5]\d/, function (d) {
              var minute = parseInt(d, 10);
              retObj.tm_min = minute;
            });
            break;

          case 'P':
            return false;

          case 'p':
            j = _addNext(j, /^(am|pm)/i, function (d) {
              amPmOffset = /a/.test(d) ? 0 : 12;

              if (prevHour) {
                retObj.tm_hour += amPmOffset;
              }
            });
            break;

          case 's':
            j = _addNext(j, /^\d+/, function (d) {
              var timestamp = parseInt(d, 10);
              var date = new Date(Date.UTC(timestamp * 1000));

              _reset(date);
            });
            break;

          case 'S':
            j = _addNext(j, /^[0-5]\d/, function (d) {
              var second = parseInt(d, 10);
              retObj.tm_sec = second;
            });
            break;

          case 'u':
          case 'w':
            j = _addNext(j, /^\d/, function (d) {
              retObj.tm_wday = d - (formatChar === 'u');
            });
            break;

          case 'U':
          case 'V':
          case 'W':
            break;

          case 'y':
            j = _addNext(j, /^\d?\d/, function (d) {
              d = parseInt(d, 10);
              var year = d >= 69 ? d : d + 100;
              retObj.tm_year = year;

              _date();

              if (!retObj.tm_yday) {
                retObj.tm_yday = -1;
              }
            });
            break;

          case 'Y':
            j = _addNext(j, /^\d{1,4}/, function (d) {
              var year = parseInt(d, 10) - 1900;
              retObj.tm_year = year;

              _date();

              if (!retObj.tm_yday) {
                retObj.tm_yday = -1;
              }
            });
            break;

          case 'z':
            break;

          case 'Z':
            break;

          default:
            throw 'Unrecognized formatting character in strptime()';
            break;
        }
      } catch (e) {
        if (e === 'No match in string') {
          return false;
        }
      }

      ++i;
    } else if (format.charAt(i) !== dateStr.charAt(j)) {
      if (dateStr.charAt(j).search(_WS) !== -1) {
        j++;
        i--;
      } else if (format.charAt(i).search(_NWS) !== -1) {
        return false;
      } else {}
    } else {
      j++;
    }
  }

  retObj.unparsed = dateStr.slice(j);
  return retObj;
}

function strtotime(str, now) {
  var i,
      match,
      s,
      strTmp = '',
      parse = '';
  strTmp = str;
  strTmp = strTmp.replace(/\s{2,}|^\s|\s$/g, ' ');
  strTmp = strTmp.replace(/[\t\r\n]/g, '');

  if (strTmp == 'now') {
    return new Date().getTime() / 1000;
  } else if (!isNaN(parse = Date.parse(strTmp))) {
    return parse / 1000;
  } else if (now) {
    now = new Date(now * 1000);
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

  var process = function process(m) {
    var ago = m[2] && m[2] == 'ago';
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
            now.setDate(now.getDate() + num * 7);
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

            if (typeof (day = __is.day[m[1].substring(0, 3)]) != 'undefined') {
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
              now.setDate(now.getDate() + num * 7);
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
    s[0] = s[0] >= 0 && s[0] <= 69 ? '20' + (s[0] < 10 ? '0' + s[0] : s[0] + '') : s[0] >= 70 && s[0] <= 99 ? '19' + s[0] : s[0] + '';
    return parseInt(this.strtotime(s[2] + ' ' + s[1] + ' ' + s[0] + ' ' + match[2]) + (match[4] ? match[4] / 1000 : ''), 10);
  }

  var regex = '([+-]?\\d+\\s' + '(years?|months?|weeks?|days?|hours?|min|minutes?|sec|seconds?' + '|sun\\.?|sunday|mon\\.?|monday|tue\\.?|tuesday|wed\\.?|wednesday' + '|thu\\.?|thursday|fri\\.?|friday|sat\\.?|saturday)' + '|(last|next)\\s' + '(years?|months?|weeks?|days?|hours?|min|minutes?|sec|seconds?' + '|sun\\.?|sunday|mon\\.?|monday|tue\\.?|tuesday|wed\\.?|wednesday' + '|thu\\.?|thursday|fri\\.?|friday|sat\\.?|saturday))' + '(\\sago)?';
  match = strTmp.match(new RegExp(regex, 'gi'));

  if (match == null) {
    return false;
  }

  for (i = 0; i < match.length; i++) {
    if (!process(match[i].split(' '))) {
      return false;
    }
  }

  return now.getTime() / 1000;
}

function time() {
  return Math.floor(new Date().getTime() / 1000);
}

function timezone_abbreviations_list() {
  var list = {},
      i = 0,
      j = 0,
      len = 0,
      jlen = 0,
      indice = '',
      curr = '',
      currSub = '',
      currSubPrefix = '',
      timezone_id = '',
      tzo = 0,
      dst = false;

  try {
    php_js_shared;
  } catch (e) {
    php_js_shared = {};
  }

  if (!php_js_shared.tz_abbrs) {
    php_js_shared.tz_abbrs = [[[1, 14, "Porto_Acre", 9], [1, 14, "Eirunepe", 9], [1, 14, "Rio_Branco", 9], [1, 14, "Acre", 15]], [[0, 11, "Porto_Acre", 9], [0, 11, "Eirunepe", 9], [0, 11, "Rio_Branco", 9], [0, 11, "Acre", 15]], [[1, 25, "Goose_Bay", 9], [1, 25, "Pangnirtung", 9]], [[1, 22, "Halifax", 9], [1, 22, "Barbados", 9], [1, 22, "Blanc-Sablon", 9], [1, 22, "Glace_Bay", 9], [1, 22, "Goose_Bay", 9], [1, 22, "Martinique", 9], [1, 22, "Moncton", 9], [1, 22, "Pangnirtung", 9], [1, 22, "Thule", 9], [1, 22, "Bermuda", 13], [1, 22, "Atlantic", 16], [1, 51, "Baghdad", 12]], [[0, 52, "Kabul", 12]], [[1, 6, "Anchorage", 9], [1, 6, "Alaska"]], [[0, 4, "Anchorage", 9], [0, 4, "Adak", 9], [0, 4, "Atka", 9], [0, 4, "Alaska"], [0, 4, "Aleutian"]], [[1, 7, "Anchorage", 9], [1, 7, "Juneau", 9], [1, 7, "Nome", 9], [1, 7, "Yakutat", 9], [1, 7, "Alaska"]], [[0, 6, "Anchorage", 9], [0, 6, "Juneau", 9], [0, 6, "Nome", 9], [0, 6, "Yakutat", 9], [0, 6, "Alaska"]], [[1, 57, "Aqtobe", 12]], [[0, 51, "Aqtobe", 12], [0, 54, "Aqtobe", 12], [0, 57, "Aqtobe", 12]], [[1, 59, "Almaty", 12]], [[0, 54, "Almaty", 12], [0, 57, "Almaty", 12]], [[1, 51, "Yerevan", 12], [1, 54, "Yerevan", 12], [1, 22, "Boa_Vista", 9], [1, 22, "Campo_Grande", 9], [1, 22, "Cuiaba", 9], [1, 22, "Manaus", 9], [1, 22, "Porto_Velho", 9], [1, 22, "West", 15]], [[0, 47, "Yerevan", 12], [0, 51, "Yerevan", 12], [0, 14, "Boa_Vista", 9], [0, 14, "Campo_Grande", 9], [0, 14, "Cuiaba", 9], [0, 14, "Manaus", 9], [0, 14, "Porto_Velho", 9], [0, 14, "West", 15], [0, 32, "Amsterdam", 18]], [[1, 76, "Anadyr", 12], [1, 79, "Anadyr", 12], [1, 81, "Anadyr", 12]], [[0, 74, "Anadyr", 12], [0, 76, "Anadyr", 12], [0, 79, "Anadyr", 12]], [[0, 13, "Curacao", 9], [0, 13, "Aruba", 9]], [[1, 22, "Halifax", 9], [1, 22, "Blanc-Sablon", 9], [1, 22, "Glace_Bay", 9], [1, 22, "Moncton", 9], [1, 22, "Pangnirtung", 9], [1, 22, "Puerto_Rico", 9], [1, 22, "Atlantic", 16]], [[1, 54, "Aqtau", 12], [1, 57, "Aqtau", 12], [1, 57, "Aqtobe", 12]], [[0, 51, "Aqtau", 12], [0, 54, "Aqtau", 12], [0, 54, "Aqtobe", 12]], [[1, 22, "Buenos_Aires", 9], [1, 25, "Buenos_Aires", 9], [1, 22, "Buenos_Aires", 2], [1, 22, "Catamarca", 2], [1, 22, "ComodRivadavia", 2], [1, 22, "Cordoba", 2], [1, 22, "Jujuy", 2], [1, 22, "La_Rioja", 2], [1, 22, "Mendoza", 2], [1, 22, "Rio_Gallegos", 2], [1, 22, "San_Juan", 2], [1, 22, "Tucuman", 2], [1, 22, "Ushuaia", 2], [1, 22, "Catamarca", 9], [1, 22, "Cordoba", 9], [1, 22, "Jujuy", 9], [1, 22, "Mendoza", 9], [1, 22, "Rosario", 9], [1, 22, "Palmer", 10], [1, 25, "Buenos_Aires", 2], [1, 25, "Catamarca", 2], [1, 25, "ComodRivadavia", 2], [1, 25, "Cordoba", 2], [1, 25, "Jujuy", 2], [1, 25, "La_Rioja", 2], [1, 25, "Mendoza", 2], [1, 25, "Rio_Gallegos", 2], [1, 25, "San_Juan", 2], [1, 25, "Tucuman", 2], [1, 25, "Ushuaia", 2], [1, 25, "Catamarca", 9], [1, 25, "Cordoba", 9], [1, 25, "Jujuy", 9], [1, 25, "Mendoza", 9], [1, 25, "Rosario", 9], [1, 25, "Palmer", 10]], [[0, 22, "Buenos_Aires", 9], [0, 14, "Buenos_Aires", 9], [0, 22, "Buenos_Aires", 2], [0, 22, "Catamarca", 2], [0, 22, "ComodRivadavia", 2], [0, 22, "Cordoba", 2], [0, 22, "Jujuy", 2], [0, 22, "La_Rioja", 2], [0, 22, "Mendoza", 2], [0, 22, "Rio_Gallegos", 2], [0, 22, "San_Juan", 2], [0, 22, "Tucuman", 2], [0, 22, "Ushuaia", 2], [0, 22, "Catamarca", 9], [0, 22, "Cordoba", 9], [0, 22, "Jujuy", 9], [0, 22, "Mendoza", 9], [0, 22, "Rosario", 9], [0, 22, "Palmer", 10], [0, 14, "Buenos_Aires", 2], [0, 14, "Catamarca", 2], [0, 14, "ComodRivadavia", 2], [0, 14, "Cordoba", 2], [0, 14, "Jujuy", 2], [0, 14, "La_Rioja", 2], [0, 14, "Mendoza", 2], [0, 14, "Rio_Gallegos", 2], [0, 14, "San_Juan", 2], [0, 14, "Tucuman", 2], [0, 14, "Ushuaia", 2], [0, 14, "Catamarca", 9], [0, 14, "Cordoba", 9], [0, 14, "Jujuy", 9], [0, 14, "Mendoza", 9], [0, 14, "Rosario", 9], [0, 14, "Palmer", 10]], [[1, 54, "Ashkhabad", 12], [1, 57, "Ashkhabad", 12], [1, 54, "Ashgabat", 12], [1, 57, "Ashgabat", 12]], [[0, 51, "Ashkhabad", 12], [0, 54, "Ashkhabad", 12], [0, 51, "Ashgabat", 12], [0, 54, "Ashgabat", 12]], [[0, 47, "Riyadh", 12], [0, 14, "Anguilla", 9], [0, 14, "Antigua", 9], [0, 14, "Aruba", 9], [0, 14, "Barbados", 9], [0, 14, "Blanc-Sablon", 9], [0, 14, "Curacao", 9], [0, 14, "Dominica", 9], [0, 14, "Glace_Bay", 9], [0, 14, "Goose_Bay", 9], [0, 14, "Grenada", 9], [0, 14, "Guadeloupe", 9], [0, 14, "Halifax", 9], [0, 14, "Martinique", 9], [0, 14, "Miquelon", 9], [0, 14, "Moncton", 9], [0, 14, "Montserrat", 9], [0, 14, "Pangnirtung", 9], [0, 14, "Port_of_Spain", 9], [0, 14, "Puerto_Rico", 9], [0, 14, "Santo_Domingo", 9], [0, 14, "St_Kitts", 9], [0, 14, "St_Lucia", 9], [0, 14, "St_Thomas", 9], [0, 14, "St_Vincent", 9], [0, 14, "Thule", 9], [0, 14, "Tortola", 9], [0, 14, "Virgin", 9], [0, 14, "Bermuda", 13], [0, 14, "Atlantic", 16], [0, 47, "Aden", 12], [0, 47, "Baghdad", 12], [0, 47, "Bahrain", 12], [0, 47, "Kuwait", 12], [0, 47, "Qatar", 12]], [[1, 22, "Halifax", 9], [1, 22, "Blanc-Sablon", 9], [1, 22, "Glace_Bay", 9], [1, 22, "Moncton", 9], [1, 22, "Pangnirtung", 9], [1, 22, "Puerto_Rico", 9], [1, 22, "Atlantic", 16]], [[1, 31, "Azores", 13]], [[1, 28, "Azores", 13], [1, 31, "Azores", 13]], [[0, 28, "Azores", 13], [0, 25, "Azores", 13]], [[1, 51, "Baku", 12], [1, 54, "Baku", 12]], [[0, 47, "Baku", 12], [0, 51, "Baku", 12]], [[1, 51, "Baku", 12], [1, 54, "Baku", 12]], [[0, 47, "Baku", 12], [0, 51, "Baku", 12]], [[1, 42, "London", 18], [1, 42, "Belfast", 18], [1, 42, "Gibraltar", 18], [1, 42, "Guernsey", 18], [1, 42, "Isle_of_Man", 18], [1, 42, "Jersey", 18], [1, 42, "GB"], [1, 42, "GB-Eire"]], [[1, 4, "Adak", 9], [1, 4, "Atka", 9], [1, 4, "Nome", 9], [1, 4, "Aleutian"], [0, 57, "Dacca", 12], [0, 57, "Dhaka", 12]], [[0, 43, "Mogadishu"], [0, 43, "Kampala"], [0, 43, "Nairobi"]], [[0, 46, "Nairobi"], [0, 46, "Dar_es_Salaam"], [0, 46, "Kampala"]], [[0, 15, "Barbados", 9], [0, 27, "Banjul"], [0, 41, "Tiraspol", 18], [0, 41, "Chisinau", 18]], [[0, 63, "Brunei", 12], [0, 65, "Brunei", 12]], [[1, 66, "Kuching", 12]], [[0, 63, "Kuching", 12], [0, 65, "Kuching", 12]], [[1, 19, "La_Paz", 9]], [[0, 14, "La_Paz", 9]], [[1, 25, "Sao_Paulo", 9], [1, 25, "Araguaina", 9], [1, 25, "Bahia", 9], [1, 25, "Belem", 9], [1, 25, "Fortaleza", 9], [1, 25, "Maceio", 9], [1, 25, "Recife", 9], [1, 25, "East", 15]], [[0, 22, "Sao_Paulo", 9], [0, 22, "Araguaina", 9], [0, 22, "Bahia", 9], [0, 22, "Belem", 9], [0, 22, "Fortaleza", 9], [0, 22, "Maceio", 9], [0, 22, "Recife", 9], [0, 22, "East", 15]], [[0, 35, "London", 18], [1, 35, "London", 18], [0, 2, "Adak", 9], [0, 2, "Atka", 9], [0, 2, "Nome", 9], [0, 2, "Midway", 21], [0, 2, "Pago_Pago", 21], [0, 2, "Samoa", 21], [0, 2, "Aleutian"], [0, 2, "Samoa"], [0, 35, "Belfast", 18], [0, 35, "Guernsey", 18], [0, 35, "Isle_of_Man", 18], [0, 35, "Jersey", 18], [0, 35, "GB"], [0, 35, "GB-Eire"], [1, 35, "Eire"], [1, 35, "Belfast", 18], [1, 35, "Dublin", 18], [1, 35, "Gibraltar", 18], [1, 35, "Guernsey", 18], [1, 35, "Isle_of_Man", 18], [1, 35, "Jersey", 18], [1, 35, "GB"], [1, 35, "GB-Eire"]], [[0, 57, "Thimbu", 12], [0, 57, "Thimphu", 12]], [[0, 58, "Calcutta", 12], [0, 58, "Dacca", 12], [0, 58, "Dhaka", 12], [0, 58, "Rangoon", 12]], [[0, 28, "Canary", 13]], [[1, 6, "Anchorage", 9], [1, 6, "Alaska"]], [[0, 70, "Adelaide", 14], [1, 47, "Gaborone"], [1, 47, "Khartoum"]], [[0, 4, "Anchorage", 9], [0, 4, "Alaska"], [0, 42, "Khartoum"], [0, 42, "Blantyre"], [0, 42, "Gaborone"], [0, 42, "Harare"], [0, 42, "Kigali"], [0, 42, "Lusaka"], [0, 42, "Maputo"], [0, 42, "Windhoek"]], [[1, 6, "Anchorage", 9], [1, 6, "Alaska"]], [[1, 14, "Rankin_Inlet", 9]], [[1, 11, "Chicago", 9], [1, 14, "Havana", 9], [1, 14, "Cuba"], [1, 11, "Atikokan", 9], [1, 11, "Belize", 9], [1, 11, "Cambridge_Bay", 9], [1, 11, "Cancun", 9], [1, 11, "Chihuahua", 9], [1, 11, "Coral_Harbour", 9], [1, 11, "Costa_Rica", 9], [1, 11, "El_Salvador", 9], [1, 11, "Fort_Wayne", 9], [1, 11, "Guatemala", 9], [1, 11, "Indianapolis", 4], [1, 11, "Knox", 4], [1, 11, "Marengo", 4], [1, 11, "Petersburg", 4], [1, 11, "Vevay", 4], [1, 11, "Vincennes", 4], [1, 11, "Winamac", 4], [1, 11, "Indianapolis", 9], [1, 11, "Iqaluit", 9], [1, 11, "Louisville", 6], [1, 11, "Monticello", 6], [1, 11, "Knox_IN", 9], [1, 11, "Louisville", 9], [1, 11, "Managua", 9], [1, 11, "Menominee", 9], [1, 11, "Merida", 9], [1, 11, "Mexico_City", 9], [1, 11, "Monterrey", 9], [1, 11, "Center", 8], [1, 11, "New_Salem", 8], [1, 11, "Pangnirtung", 9], [1, 11, "Rainy_River", 9], [1, 11, "Rankin_Inlet", 9], [1, 11, "Tegucigalpa", 9], [1, 11, "Winnipeg", 9], [1, 11, "Central", 16], [1, 11, "CST6CDT"], [1, 11, "General", 20], [1, 11, "Central"], [1, 11, "East-Indiana"], [1, 11, "Indiana-Starke"], [1, 69, "Shanghai", 12], [1, 69, "Chongqing", 12], [1, 69, "Chungking", 12], [1, 69, "Harbin", 12], [1, 69, "Kashgar", 12], [1, 69, "Taipei", 12], [1, 69, "Urumqi", 12], [1, 69, "PRC"], [1, 69, "ROC"]], [[1, 47, "Berlin", 18], [1, 47, "CET"]], [[1, 42, "Berlin", 18], [1, 47, "Kaliningrad", 18], [1, 42, "Algiers"], [1, 42, "Ceuta"], [1, 42, "Tripoli"], [1, 42, "Tunis"], [1, 42, "Longyearbyen", 11], [1, 42, "Jan_Mayen", 13], [1, 42, "CET"], [1, 42, "Amsterdam", 18], [1, 42, "Andorra", 18], [1, 42, "Athens", 18], [1, 42, "Belgrade", 18], [1, 42, "Bratislava", 18], [1, 42, "Brussels", 18], [1, 42, "Budapest", 18], [1, 42, "Chisinau", 18], [1, 42, "Copenhagen", 18], [1, 42, "Gibraltar", 18], [1, 42, "Kaliningrad", 18], [1, 42, "Kiev", 18], [1, 42, "Lisbon", 18], [1, 42, "Ljubljana", 18], [1, 42, "Luxembourg", 18], [1, 42, "Madrid", 18], [1, 42, "Malta", 18], [1, 42, "Minsk", 18], [1, 42, "Monaco", 18], [1, 42, "Oslo", 18], [1, 42, "Paris", 18], [1, 42, "Podgorica", 18], [1, 42, "Prague", 18], [1, 42, "Riga", 18], [1, 42, "Rome", 18], [1, 42, "San_Marino", 18], [1, 42, "Sarajevo", 18], [1, 42, "Simferopol", 18], [1, 42, "Skopje", 18], [1, 42, "Sofia", 18], [1, 42, "Stockholm", 18], [1, 42, "Tallinn", 18], [1, 42, "Tirane", 18], [1, 42, "Tiraspol", 18], [1, 42, "Uzhgorod", 18], [1, 42, "Vaduz", 18], [1, 42, "Vatican", 18], [1, 42, "Vienna", 18], [1, 42, "Vilnius", 18], [1, 42, "Warsaw", 18], [1, 42, "Zagreb", 18], [1, 42, "Zaporozhye", 18], [1, 42, "Zurich", 18], [1, 42, "Libya"], [1, 42, "Poland"], [1, 42, "Portugal"], [1, 42, "WET"]], [[0, 35, "Berlin", 18], [0, 35, "Algiers"], [0, 35, "Casablanca"], [0, 35, "Ceuta"], [0, 35, "Tripoli"], [0, 35, "Tunis"], [0, 35, "Longyearbyen", 11], [0, 35, "Jan_Mayen", 13], [0, 35, "CET"], [0, 35, "Amsterdam", 18], [0, 35, "Andorra", 18], [0, 35, "Athens", 18], [0, 35, "Belgrade", 18], [0, 35, "Bratislava", 18], [0, 35, "Brussels", 18], [0, 35, "Budapest", 18], [0, 35, "Chisinau", 18], [0, 35, "Copenhagen", 18], [0, 35, "Gibraltar", 18], [0, 35, "Kaliningrad", 18], [0, 35, "Kiev", 18], [0, 35, "Lisbon", 18], [0, 35, "Ljubljana", 18], [0, 35, "Luxembourg", 18], [0, 35, "Madrid", 18], [0, 35, "Malta", 18], [0, 35, "Minsk", 18], [0, 35, "Monaco", 18], [0, 35, "Oslo", 18], [0, 35, "Paris", 18], [0, 35, "Podgorica", 18], [0, 35, "Prague", 18], [0, 35, "Riga", 18], [0, 35, "Rome", 18], [0, 35, "San_Marino", 18], [0, 35, "Sarajevo", 18], [0, 35, "Simferopol", 18], [0, 35, "Skopje", 18], [0, 35, "Sofia", 18], [0, 35, "Stockholm", 18], [0, 35, "Tallinn", 18], [0, 35, "Tirane", 18], [0, 35, "Tiraspol", 18], [0, 35, "Uzhgorod", 18], [0, 35, "Vaduz", 18], [0, 35, "Vatican", 18], [0, 35, "Vienna", 18], [0, 35, "Vilnius", 18], [0, 35, "Warsaw", 18], [0, 35, "Zagreb", 18], [0, 35, "Zaporozhye", 18], [0, 35, "Zurich", 18], [0, 35, "Libya"], [0, 35, "Poland"], [0, 35, "Portugal"], [0, 35, "WET"], [0, 42, "Kaliningrad", 18]], [[1, 28, "Scoresbysund", 9]], [[0, 25, "Scoresbysund", 9]], [[1, 80, "Chatham", 21], [1, 80, "NZ-CHAT"]], [[0, 78, "Chatham", 21], [0, 78, "NZ-CHAT"]], [[0, 67, "Harbin", 12], [0, 69, "Harbin", 12]], [[1, 10, "Belize", 9]], [[1, 72, "Choibalsan", 12]], [[0, 69, "Choibalsan", 12]], [[0, 65, "Dili", 12], [0, 65, "Makassar", 12], [0, 65, "Pontianak", 12], [0, 65, "Ujung_Pandang", 12]], [[0, 69, "Sakhalin", 12]], [[1, 5, "Rarotonga", 21]], [[0, 4, "Rarotonga", 21]], [[1, 22, "Santiago", 9], [1, 14, "Santiago", 9], [1, 22, "Palmer", 10], [1, 22, "Continental", 17], [1, 14, "Continental", 17]], [[0, 14, "Santiago", 9], [0, 11, "Santiago", 9], [0, 14, "Palmer", 10], [0, 14, "Continental", 17], [0, 11, "Continental", 17]], [[1, 14, "Bogota", 9]], [[0, 11, "Bogota", 9]], [[1, 11, "Chicago", 9], [1, 11, "Atikokan", 9], [1, 11, "Coral_Harbour", 9], [1, 11, "Fort_Wayne", 9], [1, 11, "Indianapolis", 4], [1, 11, "Knox", 4], [1, 11, "Marengo", 4], [1, 11, "Petersburg", 4], [1, 11, "Vevay", 4], [1, 11, "Vincennes", 4], [1, 11, "Winamac", 4], [1, 11, "Indianapolis", 9], [1, 11, "Louisville", 6], [1, 11, "Monticello", 6], [1, 11, "Knox_IN", 9], [1, 11, "Louisville", 9], [1, 11, "Menominee", 9], [1, 11, "Rainy_River", 9], [1, 11, "Rankin_Inlet", 9], [1, 11, "Winnipeg", 9], [1, 11, "Central", 16], [1, 11, "CST6CDT"], [1, 11, "Central"], [1, 11, "East-Indiana"], [1, 11, "Indiana-Starke"]], [[0, 9, "Chicago", 9], [0, 11, "Havana", 9], [0, 11, "Cuba"], [0, 9, "Atikokan", 9], [0, 9, "Belize", 9], [0, 9, "Cambridge_Bay", 9], [0, 9, "Cancun", 9], [0, 9, "Chihuahua", 9], [0, 9, "Coral_Harbour", 9], [0, 9, "Costa_Rica", 9], [0, 9, "Detroit", 9], [0, 9, "El_Salvador", 9], [0, 9, "Fort_Wayne", 9], [0, 9, "Guatemala", 9], [0, 9, "Hermosillo", 9], [0, 9, "Indianapolis", 4], [0, 9, "Knox", 4], [0, 9, "Marengo", 4], [0, 9, "Petersburg", 4], [0, 9, "Vevay", 4], [0, 9, "Vincennes", 4], [0, 9, "Winamac", 4], [0, 9, "Indianapolis", 9], [0, 9, "Iqaluit", 9], [0, 9, "Louisville", 6], [0, 9, "Monticello", 6], [0, 9, "Knox_IN", 9], [0, 9, "Louisville", 9], [0, 9, "Managua", 9], [0, 9, "Mazatlan", 9], [0, 9, "Menominee", 9], [0, 9, "Merida", 9], [0, 9, "Mexico_City", 9], [0, 9, "Monterrey", 9], [0, 9, "Center", 8], [0, 9, "New_Salem", 8], [0, 9, "Pangnirtung", 9], [0, 9, "Rainy_River", 9], [0, 9, "Rankin_Inlet", 9], [0, 9, "Regina", 9], [0, 9, "Swift_Current", 9], [0, 9, "Tegucigalpa", 9], [0, 9, "Winnipeg", 9], [0, 9, "Central", 16], [0, 9, "East-Saskatchewan", 16], [0, 9, "Saskatchewan", 16], [0, 9, "CST6CDT"], [0, 9, "BajaSur", 20], [0, 9, "General", 20], [0, 9, "Central"], [0, 9, "East-Indiana"], [0, 9, "Indiana-Starke"], [0, 9, "Michigan"], [0, 65, "Chongqing", 12], [0, 65, "Chungking", 12], [0, 65, "Harbin", 12], [0, 65, "Kashgar", 12], [0, 65, "Macao", 12], [0, 65, "Macau", 12], [0, 65, "Shanghai", 12], [0, 65, "Taipei", 12], [0, 65, "Urumqi", 12], [0, 65, "PRC"], [0, 65, "ROC"], [0, 70, "Jayapura", 12], [0, 70, "Adelaide", 14], [0, 70, "Broken_Hill", 14], [0, 70, "Darwin", 14], [0, 70, "North", 14], [0, 70, "South", 14], [0, 70, "Yancowinna", 14], [1, 73, "Adelaide", 14], [1, 73, "Broken_Hill", 14], [1, 73, "Darwin", 14], [1, 73, "North", 14], [1, 73, "South", 14], [1, 73, "Yancowinna", 14]], [[1, 28, "Cape_Verde", 13]], [[0, 28, "Cape_Verde", 13], [0, 25, "Cape_Verde", 13]], [[0, 68, "Eucla", 14], [1, 71, "Eucla", 14]], [[1, 11, "Chicago", 9], [1, 11, "Atikokan", 9], [1, 11, "Coral_Harbour", 9], [1, 11, "Fort_Wayne", 9], [1, 11, "Indianapolis", 4], [1, 11, "Knox", 4], [1, 11, "Marengo", 4], [1, 11, "Petersburg", 4], [1, 11, "Vevay", 4], [1, 11, "Vincennes", 4], [1, 11, "Winamac", 4], [1, 11, "Indianapolis", 9], [1, 11, "Louisville", 6], [1, 11, "Monticello", 6], [1, 11, "Knox_IN", 9], [1, 11, "Louisville", 9], [1, 11, "Menominee", 9], [1, 11, "Mexico_City", 9], [1, 11, "Rainy_River", 9], [1, 11, "Rankin_Inlet", 9], [1, 11, "Winnipeg", 9], [1, 11, "Central", 16], [1, 11, "CST6CDT"], [1, 11, "General", 20], [1, 11, "Central"], [1, 11, "East-Indiana"], [1, 11, "Indiana-Starke"]], [[0, 72, "Guam", 21], [0, 72, "Saipan", 21]], [[0, 57, "Dacca", 12], [0, 57, "Dhaka", 12]], [[0, 59, "Davis", 10]], [[0, 72, "DumontDUrville", 10]], [[1, 57, "Dushanbe", 12], [1, 59, "Dushanbe", 12]], [[0, 54, "Dushanbe", 12], [0, 57, "Dushanbe", 12]], [[1, 11, "EasterIsland", 17], [1, 9, "EasterIsland", 17], [1, 11, "Easter", 21], [1, 9, "Easter", 21]], [[0, 9, "EasterIsland", 17], [0, 8, "EasterIsland", 17], [0, 9, "Easter", 21], [0, 8, "Easter", 21], [1, 51, "Antananarivo", 19]], [[0, 47, "Khartoum"], [0, 47, "Addis_Ababa"], [0, 47, "Asmara"], [0, 47, "Asmera"], [0, 47, "Dar_es_Salaam"], [0, 47, "Djibouti"], [0, 47, "Kampala"], [0, 47, "Mogadishu"], [0, 47, "Nairobi"], [0, 47, "Antananarivo", 19], [0, 47, "Comoro", 19], [0, 47, "Mayotte", 19]], [[0, 11, "Guayaquil", 9], [0, 11, "Galapagos", 21]], [[1, 22, "Iqaluit", 9]], [[1, 14, "New_York", 9], [1, 14, "Cancun", 9], [1, 14, "Detroit", 9], [1, 14, "Fort_Wayne", 9], [1, 14, "Grand_Turk", 9], [1, 14, "Indianapolis", 4], [1, 14, "Marengo", 4], [1, 14, "Vevay", 4], [1, 14, "Vincennes", 4], [1, 14, "Winamac", 4], [1, 14, "Indianapolis", 9], [1, 14, "Iqaluit", 9], [1, 14, "Jamaica", 9], [1, 14, "Louisville", 6], [1, 14, "Monticello", 6], [1, 14, "Louisville", 9], [1, 14, "Montreal", 9], [1, 14, "Nassau", 9], [1, 14, "Nipigon", 9], [1, 14, "Pangnirtung", 9], [1, 14, "Port-au-Prince", 9], [1, 14, "Santo_Domingo", 9], [1, 14, "Thunder_Bay", 9], [1, 14, "Toronto", 9], [1, 14, "Eastern", 16], [1, 14, "EST"], [1, 14, "EST5EDT"], [1, 14, "Jamaica"], [1, 14, "East-Indiana"], [1, 14, "Eastern"], [1, 14, "Michigan"]], [[1, 47, "Helsinki", 18], [1, 47, "Cairo"], [1, 47, "Amman", 12], [1, 47, "Beirut", 12], [1, 47, "Damascus", 12], [1, 47, "Gaza", 12], [1, 47, "Istanbul", 12], [1, 47, "Nicosia", 12], [1, 47, "EET"], [1, 47, "Egypt"], [1, 47, "Athens", 18], [1, 47, "Bucharest", 18], [1, 47, "Chisinau", 18], [1, 47, "Istanbul", 18], [1, 47, "Kaliningrad", 18], [1, 47, "Kiev", 18], [1, 47, "Mariehamn", 18], [1, 47, "Minsk", 18], [1, 47, "Moscow", 18], [1, 47, "Nicosia", 18], [1, 47, "Riga", 18], [1, 47, "Simferopol", 18], [1, 47, "Sofia", 18], [1, 47, "Tallinn", 18], [1, 47, "Tiraspol", 18], [1, 47, "Uzhgorod", 18], [1, 47, "Vilnius", 18], [1, 47, "Warsaw", 18], [1, 47, "Zaporozhye", 18], [1, 47, "Poland"], [1, 47, "Turkey"], [1, 47, "W-SU"]], [[0, 42, "Helsinki", 18], [1, 47, "Gaza", 12], [0, 42, "Cairo"], [0, 42, "Tripoli"], [0, 42, "Amman", 12], [0, 42, "Beirut", 12], [0, 42, "Damascus", 12], [0, 42, "Gaza", 12], [0, 42, "Istanbul", 12], [0, 42, "Nicosia", 12], [0, 42, "EET"], [0, 42, "Egypt"], [0, 42, "Athens", 18], [0, 42, "Bucharest", 18], [0, 42, "Chisinau", 18], [0, 42, "Istanbul", 18], [0, 42, "Kaliningrad", 18], [0, 42, "Kiev", 18], [0, 42, "Mariehamn", 18], [0, 42, "Minsk", 18], [0, 42, "Moscow", 18], [0, 42, "Nicosia", 18], [0, 42, "Riga", 18], [0, 42, "Simferopol", 18], [0, 42, "Sofia", 18], [0, 42, "Tallinn", 18], [0, 42, "Tiraspol", 18], [0, 42, "Uzhgorod", 18], [0, 42, "Vilnius", 18], [0, 42, "Warsaw", 18], [0, 42, "Zaporozhye", 18], [0, 42, "Libya"], [0, 42, "Poland"], [0, 42, "Turkey"], [0, 42, "W-SU"]], [[1, 31, "Scoresbysund", 9]], [[0, 28, "Scoresbysund", 9]], [[1, 13, "Santo_Domingo", 9]], [[0, 69, "Jayapura", 12]], [[1, 14, "New_York", 9], [1, 14, "Detroit", 9], [1, 14, "Iqaluit", 9], [1, 14, "Montreal", 9], [1, 14, "Nipigon", 9], [1, 14, "Thunder_Bay", 9], [1, 14, "Toronto", 9], [1, 14, "Eastern", 16], [1, 14, "EST"], [1, 14, "EST5EDT"], [1, 14, "Eastern"], [1, 14, "Michigan"]], [[0, 11, "New_York", 9], [0, 11, "Antigua", 9], [0, 11, "Atikokan", 9], [0, 11, "Cambridge_Bay", 9], [0, 11, "Cancun", 9], [0, 11, "Cayman", 9], [0, 11, "Chicago", 9], [0, 11, "Coral_Harbour", 9], [0, 11, "Detroit", 9], [0, 11, "Fort_Wayne", 9], [0, 11, "Grand_Turk", 9], [0, 11, "Indianapolis", 4], [0, 11, "Knox", 4], [0, 11, "Marengo", 4], [0, 11, "Petersburg", 4], [0, 11, "Vevay", 4], [0, 11, "Vincennes", 4], [0, 11, "Winamac", 4], [0, 11, "Indianapolis", 9], [0, 11, "Iqaluit", 9], [0, 11, "Jamaica", 9], [0, 11, "Louisville", 6], [0, 11, "Monticello", 6], [0, 11, "Knox_IN", 9], [0, 11, "Louisville", 9], [0, 11, "Managua", 9], [0, 11, "Menominee", 9], [0, 11, "Merida", 9], [0, 11, "Montreal", 9], [0, 11, "Nassau", 9], [0, 11, "Nipigon", 9], [0, 11, "Panama", 9], [0, 11, "Pangnirtung", 9], [0, 11, "Port-au-Prince", 9], [0, 11, "Rankin_Inlet", 9], [0, 11, "Santo_Domingo", 9], [0, 11, "Thunder_Bay", 9], [0, 11, "Toronto", 9], [0, 11, "Eastern", 16], [0, 11, "EST"], [0, 11, "EST5EDT"], [0, 11, "Jamaica"], [0, 11, "Central"], [0, 11, "East-Indiana"], [0, 11, "Eastern"], [0, 11, "Indiana-Starke"], [0, 11, "Michigan"], [0, 72, "ACT", 14], [0, 72, "Brisbane", 14], [0, 72, "Canberra", 14], [0, 72, "Currie", 14], [0, 72, "Hobart", 14], [0, 72, "Lindeman", 14], [0, 72, "Melbourne", 14], [0, 72, "NSW", 14], [0, 72, "Queensland", 14], [0, 72, "Sydney", 14], [0, 72, "Tasmania", 14], [0, 72, "Victoria", 14], [1, 74, "Melbourne", 14], [1, 74, "ACT", 14], [1, 74, "Brisbane", 14], [1, 74, "Canberra", 14], [1, 74, "Currie", 14], [1, 74, "Hobart", 14], [1, 74, "Lindeman", 14], [1, 74, "NSW", 14], [1, 74, "Queensland", 14], [1, 74, "Sydney", 14], [1, 74, "Tasmania", 14], [1, 74, "Victoria", 14]], [[1, 14, "New_York", 9], [1, 14, "Detroit", 9], [1, 14, "Iqaluit", 9], [1, 14, "Montreal", 9], [1, 14, "Nipigon", 9], [1, 14, "Thunder_Bay", 9], [1, 14, "Toronto", 9], [1, 14, "Eastern", 16], [1, 14, "EST"], [1, 14, "EST5EDT"], [1, 14, "Eastern"], [1, 14, "Michigan"]], [[1, 79, "Fiji", 21]], [[0, 76, "Fiji", 21]], [[1, 22, "Stanley", 13], [1, 25, "Stanley", 13]], [[0, 22, "Stanley", 13], [0, 14, "Stanley", 13]], [[1, 28, "Noronha", 9], [1, 28, "DeNoronha", 15]], [[0, 25, "Noronha", 9], [0, 25, "DeNoronha", 15]], [[0, 51, "Aqtau", 12], [0, 54, "Aqtau", 12]], [[1, 57, "Bishkek", 12], [1, 59, "Bishkek", 12]], [[0, 54, "Bishkek", 12], [0, 57, "Bishkek", 12]], [[0, 9, "Galapagos", 21]], [[0, 6, "Gambier", 21]], [[0, 16, "Guyana", 9]], [[1, 51, "Tbilisi", 12], [1, 54, "Tbilisi", 12]], [[0, 47, "Tbilisi", 12], [0, 51, "Tbilisi", 12]], [[0, 22, "Cayenne", 9], [0, 14, "Cayenne", 9]], [[1, 33, "Accra"]], [[0, 31, "Abidjan"], [0, 31, "Accra"], [0, 31, "Bamako"], [0, 31, "Banjul"], [0, 31, "Bissau"], [0, 31, "Conakry"], [0, 31, "Dakar"], [0, 31, "Freetown"], [0, 31, "Malabo"], [0, 31, "Monrovia"], [0, 31, "Niamey"], [0, 31, "Nouakchott"], [0, 31, "Ouagadougou"], [0, 31, "Porto-Novo"], [0, 31, "Sao_Tome"], [0, 31, "Timbuktu"], [0, 31, "Danmarkshavn", 9], [0, 31, "Reykjavik", 13], [0, 31, "St_Helena", 13], [0, 31, "Eire"], [0, 31, "Belfast", 18], [0, 31, "Dublin", 18], [0, 31, "Gibraltar", 18], [0, 31, "Guernsey", 18], [0, 31, "Isle_of_Man", 18], [0, 31, "Jersey", 18], [0, 31, "London", 18], [0, 31, "GB"], [0, 31, "GB-Eire"], [0, 31, "Iceland"]], [[0, 51, "Dubai", 12], [0, 51, "Bahrain", 12], [0, 51, "Muscat", 12], [0, 51, "Qatar", 12]], [[0, 22, "Guyana", 9], [0, 16, "Guyana", 9], [0, 14, "Guyana", 9]], [[1, 6, "Adak", 9], [1, 6, "Atka", 9], [1, 6, "Aleutian"]], [[0, 4, "Adak", 9], [0, 4, "Atka", 9], [0, 4, "Aleutian"]], [[1, 5, "Honolulu", 21], [1, 5, "HST"], [1, 5, "Hawaii"]], [[1, 69, "Hong_Kong", 12], [1, 69, "Hongkong"]], [[0, 65, "Hong_Kong", 12], [0, 65, "Hongkong"]], [[1, 65, "Hovd", 12]], [[0, 57, "Hovd", 12], [0, 59, "Hovd", 12]], [[1, 5, "Honolulu", 21], [1, 5, "HST"], [1, 5, "Hawaii"]], [[0, 4, "Honolulu", 21], [0, 3, "Honolulu", 21], [0, 4, "HST"], [0, 4, "Hawaii"], [0, 3, "HST"], [0, 3, "Hawaii"]], [[1, 5, "Honolulu", 21], [1, 5, "HST"], [1, 5, "Hawaii"]], [[0, 59, "Bangkok", 12], [0, 59, "Phnom_Penh", 12], [0, 59, "Saigon", 12], [0, 59, "Vientiane", 12], [0, 65, "Phnom_Penh", 12], [0, 65, "Saigon", 12], [0, 65, "Vientiane", 12]], [[1, 51, "Jerusalem", 12], [1, 51, "Tel_Aviv", 12], [1, 51, "Israel"]], [[1, 47, "Jerusalem", 12], [1, 47, "Gaza", 12], [1, 47, "Tel_Aviv", 12], [1, 47, "Israel"]], [[1, 57, "Colombo", 12]], [[0, 54, "Chagos", 19], [0, 57, "Chagos", 19]], [[1, 52, "Tehran", 12], [1, 54, "Tehran", 12], [1, 52, "Iran"], [1, 54, "Iran"]], [[1, 65, "Irkutsk", 12], [1, 69, "Irkutsk", 12]], [[0, 59, "Irkutsk", 12], [0, 65, "Irkutsk", 12]], [[0, 49, "Tehran", 12], [0, 51, "Tehran", 12], [0, 49, "Iran"], [0, 51, "Iran"]], [[1, 31, "Reykjavik", 13], [1, 31, "Iceland"]], [[0, 42, "Jerusalem", 12], [0, 28, "Reykjavik", 13], [0, 28, "Iceland"], [0, 55, "Calcutta", 12], [0, 55, "Colombo", 12], [0, 55, "Dacca", 12], [0, 55, "Dhaka", 12], [0, 55, "Karachi", 12], [0, 55, "Katmandu", 12], [0, 55, "Thimbu", 12], [0, 55, "Thimphu", 12], [1, 34, "Eire"], [1, 34, "Dublin", 18], [1, 58, "Calcutta", 12], [1, 58, "Colombo", 12], [1, 58, "Karachi", 12], [0, 35, "Eire"], [0, 35, "Dublin", 18], [1, 35, "Eire"], [1, 35, "Dublin", 18], [0, 42, "Gaza", 12], [0, 42, "Tel_Aviv", 12], [0, 42, "Israel"]], [[0, 62, "Jakarta", 12]], [[1, 72, "Tokyo", 12], [1, 72, "Japan"]], [[0, 69, "Tokyo", 12], [0, 69, "Dili", 12], [0, 69, "Jakarta", 12], [0, 69, "Kuala_Lumpur", 12], [0, 69, "Kuching", 12], [0, 69, "Makassar", 12], [0, 69, "Manila", 12], [0, 69, "Pontianak", 12], [0, 69, "Rangoon", 12], [0, 69, "Sakhalin", 12], [0, 69, "Singapore", 12], [0, 69, "Ujung_Pandang", 12], [0, 69, "Japan"], [0, 69, "Nauru", 21], [0, 69, "Singapore"]], [[0, 54, "Karachi", 12]], [[0, 54, "Kashgar", 12], [0, 55, "Kashgar", 12]], [[1, 69, "Seoul", 12], [1, 72, "Seoul", 12], [1, 69, "ROK"], [1, 72, "ROK"]], [[1, 57, "Bishkek", 12]], [[0, 54, "Bishkek", 12], [0, 57, "Bishkek", 12]], [[1, 57, "Qyzylorda", 12]], [[0, 51, "Qyzylorda", 12], [0, 54, "Qyzylorda", 12], [0, 57, "Qyzylorda", 12]], [[0, 38, "Vilnius", 18]], [[0, 74, "Kosrae", 21], [0, 76, "Kosrae", 21]], [[1, 59, "Krasnoyarsk", 12], [1, 65, "Krasnoyarsk", 12]], [[0, 57, "Krasnoyarsk", 12], [0, 59, "Krasnoyarsk", 12]], [[0, 65, "Seoul", 12], [0, 67, "Seoul", 12], [0, 69, "Seoul", 12], [0, 65, "Pyongyang", 12], [0, 65, "ROK"], [0, 67, "Pyongyang", 12], [0, 67, "ROK"], [0, 69, "Pyongyang", 12], [0, 69, "ROK"]], [[1, 47, "Samara", 18], [1, 51, "Samara", 18], [1, 54, "Samara", 18]], [[0, 47, "Samara", 18], [0, 51, "Samara", 18]], [[0, 0, "Kwajalein", 21], [0, 0, "Kwajalein"]], [[0, 73, "Lord_Howe", 14], [1, 74, "Lord_Howe", 14], [1, 75, "Lord_Howe", 14], [0, 73, "LHI", 14], [1, 74, "LHI", 14], [1, 75, "LHI", 14]], [[0, 4, "Kiritimati", 21], [0, 81, "Kiritimati", 21]], [[0, 57, "Colombo", 12], [0, 58, "Colombo", 12]], [[0, 59, "Chongqing", 12], [0, 59, "Chungking", 12]], [[0, 29, "Monrovia"]], [[1, 45, "Riga", 18]], [[1, 35, "Madeira", 13]], [[1, 31, "Madeira", 13]], [[0, 28, "Madeira", 13]], [[1, 74, "Magadan", 12], [1, 76, "Magadan", 12]], [[0, 72, "Magadan", 12], [0, 74, "Magadan", 12]], [[1, 62, "Singapore", 12], [1, 62, "Kuala_Lumpur", 12], [1, 62, "Singapore"]], [[0, 59, "Singapore", 12], [0, 62, "Singapore", 12], [0, 63, "Singapore", 12], [0, 59, "Kuala_Lumpur", 12], [0, 59, "Singapore"], [0, 62, "Kuala_Lumpur", 12], [0, 62, "Singapore"], [0, 63, "Kuala_Lumpur", 12], [0, 63, "Singapore"]], [[0, 5, "Marquesas", 21]], [[0, 57, "Mawson", 10]], [[1, 11, "Cambridge_Bay", 9], [1, 11, "Yellowknife", 9]], [[1, 53, "Moscow", 18], [1, 53, "W-SU"]], [[1, 9, "Denver", 9], [1, 9, "Boise", 9], [1, 9, "Cambridge_Bay", 9], [1, 9, "Chihuahua", 9], [1, 9, "Edmonton", 9], [1, 9, "Hermosillo", 9], [1, 9, "Inuvik", 9], [1, 9, "Mazatlan", 9], [1, 9, "Center", 8], [1, 9, "New_Salem", 8], [1, 9, "Phoenix", 9], [1, 9, "Regina", 9], [1, 9, "Shiprock", 9], [1, 9, "Swift_Current", 9], [1, 9, "Yellowknife", 9], [1, 9, "East-Saskatchewan", 16], [1, 9, "Mountain", 16], [1, 9, "Saskatchewan", 16], [1, 9, "BajaSur", 20], [1, 9, "MST"], [1, 9, "MST7MDT"], [1, 9, "Navajo"], [1, 9, "Arizona"], [1, 9, "Mountain"]], [[1, 42, "MET"]], [[0, 35, "MET"]], [[0, 76, "Kwajalein", 21], [0, 76, "Kwajalein"], [0, 76, "Majuro", 21]], [[0, 44, "Moscow", 18], [0, 58, "Rangoon", 12], [0, 64, "Makassar", 12], [0, 64, "Ujung_Pandang", 12], [0, 44, "W-SU"]], [[1, 69, "Macao", 12], [1, 69, "Macau", 12]], [[0, 65, "Macao", 12], [0, 65, "Macau", 12]], [[1, 9, "Denver", 9], [1, 9, "Boise", 9], [1, 9, "Cambridge_Bay", 9], [1, 9, "Edmonton", 9], [1, 9, "Center", 8], [1, 9, "New_Salem", 8], [1, 9, "Regina", 9], [1, 9, "Shiprock", 9], [1, 9, "Swift_Current", 9], [1, 9, "Yellowknife", 9], [1, 9, "East-Saskatchewan", 16], [1, 9, "Mountain", 16], [1, 9, "Saskatchewan", 16], [1, 9, "MST"], [1, 9, "MST7MDT"], [1, 9, "Navajo"], [1, 9, "Mountain"], [0, 72, "Saipan", 21]], [[1, 51, "Moscow", 18], [1, 54, "Moscow", 18], [1, 51, "Chisinau", 18], [1, 51, "Kaliningrad", 18], [1, 51, "Kiev", 18], [1, 51, "Minsk", 18], [1, 51, "Riga", 18], [1, 51, "Simferopol", 18], [1, 51, "Tallinn", 18], [1, 51, "Tiraspol", 18], [1, 51, "Uzhgorod", 18], [1, 51, "Vilnius", 18], [1, 51, "Zaporozhye", 18], [1, 51, "W-SU"], [1, 54, "W-SU"]], [[0, 47, "Moscow", 18], [0, 47, "Chisinau", 18], [0, 47, "Kaliningrad", 18], [0, 47, "Kiev", 18], [0, 47, "Minsk", 18], [0, 47, "Riga", 18], [0, 47, "Simferopol", 18], [0, 47, "Tallinn", 18], [0, 47, "Tiraspol", 18], [0, 47, "Uzhgorod", 18], [0, 47, "Vilnius", 18], [0, 47, "Zaporozhye", 18], [0, 47, "W-SU"]], [[0, 8, "Denver", 9], [0, 8, "Boise", 9], [0, 8, "Cambridge_Bay", 9], [0, 8, "Chihuahua", 9], [0, 8, "Dawson_Creek", 9], [0, 8, "Edmonton", 9], [0, 8, "Ensenada", 9], [0, 8, "Hermosillo", 9], [0, 8, "Inuvik", 9], [0, 8, "Mazatlan", 9], [0, 8, "Mexico_City", 9], [0, 8, "Center", 8], [0, 8, "New_Salem", 8], [0, 8, "Phoenix", 9], [0, 8, "Regina", 9], [0, 8, "Shiprock", 9], [0, 8, "Swift_Current", 9], [0, 8, "Tijuana", 9], [0, 8, "Yellowknife", 9], [0, 8, "East-Saskatchewan", 16], [0, 8, "Mountain", 16], [0, 8, "Saskatchewan", 16], [0, 8, "BajaNorte", 20], [0, 8, "BajaSur", 20], [0, 8, "General", 20], [0, 8, "MST"], [0, 8, "MST7MDT"], [0, 8, "Navajo"], [0, 8, "Arizona"], [0, 8, "Mountain"], [1, 50, "Moscow", 18], [1, 50, "W-SU"]], [[0, 51, "Mauritius", 19]], [[0, 54, "Maldives", 19]], [[1, 9, "Denver", 9], [1, 9, "Boise", 9], [1, 9, "Cambridge_Bay", 9], [1, 9, "Edmonton", 9], [1, 9, "Center", 8], [1, 9, "New_Salem", 8], [1, 9, "Phoenix", 9], [1, 9, "Regina", 9], [1, 9, "Shiprock", 9], [1, 9, "Swift_Current", 9], [1, 9, "Yellowknife", 9], [1, 9, "East-Saskatchewan", 16], [1, 9, "Mountain", 16], [1, 9, "Saskatchewan", 16], [1, 9, "MST"], [1, 9, "MST7MDT"], [1, 9, "Navajo"], [1, 9, "Arizona"], [1, 9, "Mountain"]], [[0, 65, "Kuala_Lumpur", 12], [0, 65, "Kuching", 12]], [[1, 76, "Noumea", 21]], [[0, 74, "Noumea", 21]], [[1, 26, "St_Johns", 9], [1, 26, "Newfoundland", 16]], [[1, 24, "St_Johns", 9], [1, 23, "St_Johns", 9], [1, 4, "Midway", 21], [1, 24, "Goose_Bay", 9], [1, 24, "Newfoundland", 16], [1, 23, "Goose_Bay", 9], [1, 23, "Newfoundland", 16]], [[0, 21, "Paramaribo", 9]], [[1, 37, "Amsterdam", 18]], [[0, 33, "Amsterdam", 18]], [[0, 75, "Norfolk", 21]], [[1, 59, "Novosibirsk", 12], [1, 65, "Novosibirsk", 12]], [[0, 57, "Novosibirsk", 12], [0, 59, "Novosibirsk", 12]], [[1, 24, "St_Johns", 9], [1, 4, "Adak", 9], [1, 4, "Atka", 9], [1, 4, "Nome", 9], [1, 4, "Aleutian"], [1, 24, "Goose_Bay", 9], [1, 24, "Newfoundland", 16], [0, 56, "Katmandu", 12]], [[0, 75, "Nauru", 21], [0, 76, "Nauru", 21]], [[0, 21, "St_Johns", 9], [0, 20, "St_Johns", 9], [0, 21, "Goose_Bay", 9], [0, 21, "Newfoundland", 16], [0, 20, "Goose_Bay", 9], [0, 20, "Newfoundland", 16], [0, 2, "Adak", 9], [0, 2, "Atka", 9], [0, 2, "Nome", 9], [0, 2, "Midway", 21], [0, 2, "Pago_Pago", 21], [0, 2, "Samoa", 21], [0, 2, "Aleutian"], [0, 2, "Samoa"], [1, 36, "Amsterdam", 18]], [[0, 2, "Niue", 21], [0, 1, "Niue", 21]], [[1, 24, "St_Johns", 9], [1, 4, "Adak", 9], [1, 4, "Atka", 9], [1, 4, "Nome", 9], [1, 4, "Aleutian"], [1, 24, "Goose_Bay", 9], [1, 24, "Newfoundland", 16]], [[1, 79, "Auckland", 21], [1, 79, "McMurdo", 10], [1, 79, "South_Pole", 10], [1, 79, "NZ"]], [[0, 75, "Auckland", 21], [0, 75, "NZ"]], [[0, 76, "Auckland", 21], [1, 76, "Auckland", 21], [1, 77, "Auckland", 21], [0, 76, "McMurdo", 10], [0, 76, "South_Pole", 10], [0, 76, "NZ"], [1, 76, "NZ"], [1, 77, "NZ"]], [[1, 57, "Omsk", 12], [1, 59, "Omsk", 12]], [[0, 54, "Omsk", 12], [0, 57, "Omsk", 12]], [[1, 54, "Oral", 12]], [[0, 51, "Oral", 12], [0, 54, "Oral", 12]], [[1, 9, "Inuvik", 9]], [[1, 8, "Los_Angeles", 9], [1, 8, "Boise", 9], [1, 8, "Dawson", 9], [1, 8, "Dawson_Creek", 9], [1, 8, "Ensenada", 9], [1, 8, "Inuvik", 9], [1, 8, "Juneau", 9], [1, 8, "Tijuana", 9], [1, 8, "Vancouver", 9], [1, 8, "Whitehorse", 9], [1, 8, "Pacific", 16], [1, 8, "Yukon", 16], [1, 8, "BajaNorte", 20], [1, 8, "PST8PDT"], [1, 8, "Pacific"], [1, 8, "Pacific-New"]], [[1, 14, "Lima", 9]], [[1, 76, "Kamchatka", 12], [1, 79, "Kamchatka", 12]], [[0, 74, "Kamchatka", 12], [0, 76, "Kamchatka", 12]], [[0, 11, "Lima", 9]], [[0, 2, "Enderbury", 21], [0, 79, "Enderbury", 21]], [[1, 69, "Manila", 12]], [[0, 65, "Manila", 12]], [[1, 57, "Karachi", 12]], [[0, 54, "Karachi", 12]], [[1, 25, "Miquelon", 9]], [[0, 22, "Miquelon", 9]], [[0, 18, "Paramaribo", 9], [0, 17, "Paramaribo", 9], [0, 61, "Pontianak", 12], [0, 72, "DumontDUrville", 10]], [[1, 8, "Los_Angeles", 9], [1, 8, "Dawson_Creek", 9], [1, 8, "Ensenada", 9], [1, 8, "Inuvik", 9], [1, 8, "Juneau", 9], [1, 8, "Tijuana", 9], [1, 8, "Vancouver", 9], [1, 8, "Pacific", 16], [1, 8, "BajaNorte", 20], [1, 8, "PST8PDT"], [1, 8, "Pacific"], [1, 8, "Pacific-New"]], [[0, 7, "Los_Angeles", 9], [0, 7, "Boise", 9], [0, 7, "Dawson", 9], [0, 7, "Dawson_Creek", 9], [0, 7, "Ensenada", 9], [0, 7, "Hermosillo", 9], [0, 7, "Inuvik", 9], [0, 7, "Juneau", 9], [0, 7, "Mazatlan", 9], [0, 7, "Tijuana", 9], [0, 7, "Vancouver", 9], [0, 7, "Whitehorse", 9], [0, 7, "Pacific", 16], [0, 7, "Yukon", 16], [0, 7, "BajaNorte", 20], [0, 7, "BajaSur", 20], [0, 7, "Pitcairn", 21], [0, 7, "PST8PDT"], [0, 7, "Pacific"], [0, 7, "Pacific-New"]], [[1, 8, "Los_Angeles", 9], [1, 8, "Dawson_Creek", 9], [1, 8, "Ensenada", 9], [1, 8, "Inuvik", 9], [1, 8, "Juneau", 9], [1, 8, "Tijuana", 9], [1, 8, "Vancouver", 9], [1, 8, "Pacific", 16], [1, 8, "BajaNorte", 20], [1, 8, "PST8PDT"], [1, 8, "Pacific"], [1, 8, "Pacific-New"]], [[1, 22, "Asuncion", 9]], [[0, 22, "Asuncion", 9], [0, 14, "Asuncion", 9]], [[1, 59, "Qyzylorda", 12]], [[0, 54, "Qyzylorda", 12], [0, 57, "Qyzylorda", 12]], [[0, 51, "Reunion", 19]], [[0, 39, "Riga", 18]], [[0, 22, "Rothera", 10]], [[1, 74, "Sakhalin", 12], [1, 76, "Sakhalin", 12]], [[0, 72, "Sakhalin", 12], [0, 74, "Sakhalin", 12]], [[1, 57, "Samarkand", 12], [1, 54, "Samara", 18]], [[0, 51, "Samarkand", 12], [0, 54, "Samarkand", 12], [0, 1, "Apia", 21], [0, 1, "Pago_Pago", 21], [0, 1, "Samoa", 21], [0, 1, "Samoa"], [0, 47, "Samara", 18], [0, 51, "Samara", 18]], [[1, 47, "Johannesburg"], [0, 42, "Johannesburg"], [1, 47, "Maseru"], [1, 47, "Windhoek"], [0, 42, "Maseru"], [0, 42, "Mbabane"], [0, 42, "Windhoek"]], [[0, 74, "Guadalcanal", 21]], [[0, 51, "Mahe", 19]], [[0, 63, "Singapore", 12], [0, 65, "Singapore", 12], [0, 63, "Singapore"], [0, 65, "Singapore"]], [[1, 57, "Aqtau", 12]], [[0, 54, "Aqtau", 12], [0, 57, "Aqtau", 12]], [[1, 30, "Freetown"], [1, 35, "Freetown"]], [[0, 60, "Saigon", 12], [0, 12, "Santiago", 9], [0, 12, "Continental", 17], [0, 60, "Phnom_Penh", 12], [0, 60, "Vientiane", 12]], [[0, 22, "Paramaribo", 9], [0, 21, "Paramaribo", 9]], [[0, 2, "Samoa", 21], [0, 2, "Midway", 21], [0, 2, "Pago_Pago", 21], [0, 2, "Samoa"]], [[0, 47, "Volgograd", 18], [0, 51, "Volgograd", 18]], [[1, 54, "Yekaterinburg", 12], [1, 57, "Yekaterinburg", 12]], [[0, 51, "Yekaterinburg", 12], [0, 54, "Yekaterinburg", 12]], [[0, 47, "Syowa", 10]], [[0, 4, "Tahiti", 21]], [[1, 59, "Samarkand", 12], [1, 57, "Tashkent", 12], [1, 59, "Tashkent", 12]], [[0, 57, "Samarkand", 12], [0, 54, "Tashkent", 12], [0, 57, "Tashkent", 12]], [[1, 51, "Tbilisi", 12], [1, 54, "Tbilisi", 12]], [[0, 47, "Tbilisi", 12], [0, 51, "Tbilisi", 12]], [[0, 54, "Kerguelen", 19]], [[0, 54, "Dushanbe", 12]], [[0, 65, "Dili", 12], [0, 69, "Dili", 12]], [[0, 48, "Tehran", 12], [0, 48, "Iran"], [0, 51, "Ashgabat", 12], [0, 51, "Ashkhabad", 12], [0, 54, "Ashgabat", 12], [0, 54, "Ashkhabad", 12], [0, 40, "Tallinn", 18]], [[1, 81, "Tongatapu", 21]], [[0, 79, "Tongatapu", 21]], [[1, 51, "Istanbul", 18], [1, 51, "Istanbul", 12], [1, 51, "Turkey"]], [[0, 47, "Istanbul", 18], [0, 47, "Istanbul", 12], [0, 47, "Turkey"]], [[0, 47, "Volgograd", 18]], [[1, 69, "Ulaanbaatar", 12], [1, 69, "Ulan_Bator", 12]], [[0, 59, "Ulaanbaatar", 12], [0, 65, "Ulaanbaatar", 12], [0, 59, "Choibalsan", 12], [0, 59, "Ulan_Bator", 12], [0, 65, "Choibalsan", 12], [0, 65, "Ulan_Bator", 12]], [[1, 54, "Oral", 12], [1, 57, "Oral", 12]], [[0, 51, "Oral", 12], [0, 54, "Oral", 12], [0, 57, "Oral", 12]], [[0, 57, "Urumqi", 12]], [[1, 22, "Montevideo", 9], [1, 24, "Montevideo", 9]], [[1, 25, "Montevideo", 9]], [[0, 22, "Montevideo", 9], [0, 21, "Montevideo", 9]], [[1, 57, "Samarkand", 12], [1, 57, "Tashkent", 12]], [[0, 54, "Samarkand", 12], [0, 54, "Tashkent", 12]], [[0, 14, "Caracas", 9], [0, 13, "Caracas", 9]], [[1, 72, "Vladivostok", 12]], [[0, 69, "Vladivostok", 12], [1, 74, "Vladivostok", 12]], [[0, 69, "Vladivostok", 12], [0, 72, "Vladivostok", 12]], [[1, 51, "Volgograd", 18], [1, 54, "Volgograd", 18]], [[0, 47, "Volgograd", 18], [0, 51, "Volgograd", 18]], [[0, 57, "Vostok", 10]], [[1, 76, "Efate", 21]], [[0, 74, "Efate", 21]], [[1, 22, "Mendoza", 9], [1, 22, "Jujuy", 2], [1, 22, "Mendoza", 2], [1, 22, "Jujuy", 9]], [[0, 14, "Mendoza", 9], [0, 14, "Catamarca", 2], [0, 14, "ComodRivadavia", 2], [0, 14, "Cordoba", 2], [0, 14, "Jujuy", 2], [0, 14, "La_Rioja", 2], [0, 14, "Mendoza", 2], [0, 14, "Rio_Gallegos", 2], [0, 14, "San_Juan", 2], [0, 14, "Tucuman", 2], [0, 14, "Ushuaia", 2], [0, 14, "Catamarca", 9], [0, 14, "Cordoba", 9], [0, 14, "Jujuy", 9], [0, 14, "Rosario", 9]], [[1, 42, "Windhoek"], [1, 42, "Ndjamena"]], [[0, 28, "Dakar"], [0, 28, "Bamako"], [0, 28, "Banjul"], [0, 28, "Bissau"], [0, 28, "Conakry"], [0, 28, "El_Aaiun"], [0, 28, "Freetown"], [0, 28, "Niamey"], [0, 28, "Nouakchott"], [0, 28, "Timbuktu"], [0, 31, "Freetown"], [0, 35, "Brazzaville"], [0, 35, "Bangui"], [0, 35, "Douala"], [0, 35, "Lagos"], [0, 35, "Libreville"], [0, 35, "Luanda"], [0, 35, "Malabo"], [0, 35, "Ndjamena"], [0, 35, "Niamey"], [0, 35, "Porto-Novo"], [0, 35, "Windhoek"]], [[1, 42, "Lisbon", 18], [1, 42, "Madrid", 18], [1, 42, "Monaco", 18], [1, 42, "Paris", 18], [1, 42, "Portugal"], [1, 42, "WET"]], [[1, 35, "Paris", 18], [1, 35, "Algiers"], [1, 35, "Casablanca"], [1, 35, "Ceuta"], [1, 35, "Canary", 13], [1, 35, "Faeroe", 13], [1, 35, "Faroe", 13], [1, 35, "Madeira", 13], [1, 35, "Brussels", 18], [1, 35, "Lisbon", 18], [1, 35, "Luxembourg", 18], [1, 35, "Madrid", 18], [1, 35, "Monaco", 18], [1, 35, "Portugal"], [1, 35, "WET"], [1, 42, "Luxembourg", 18]], [[0, 31, "Paris", 18], [0, 31, "Algiers"], [0, 31, "Casablanca"], [0, 31, "Ceuta"], [0, 31, "El_Aaiun"], [0, 31, "Azores", 13], [0, 31, "Canary", 13], [0, 31, "Faeroe", 13], [0, 31, "Faroe", 13], [0, 31, "Madeira", 13], [0, 31, "Brussels", 18], [0, 31, "Lisbon", 18], [0, 31, "Luxembourg", 18], [0, 31, "Madrid", 18], [0, 31, "Monaco", 18], [0, 31, "Portugal"], [0, 31, "WET"], [0, 35, "Luxembourg", 18]], [[1, 25, "Godthab", 9], [1, 25, "Danmarkshavn", 9]], [[0, 22, "Godthab", 9], [0, 22, "Danmarkshavn", 9]], [[0, 59, "Jakarta", 12], [0, 63, "Jakarta", 12], [0, 65, "Jakarta", 12], [0, 59, "Pontianak", 12], [0, 63, "Pontianak", 12], [0, 65, "Pontianak", 12]], [[0, 65, "Perth", 14], [1, 69, "Perth", 14], [0, 2, "Apia", 21], [0, 65, "Casey", 10], [0, 65, "West", 14], [1, 69, "West", 14]], [[1, 69, "Yakutsk", 12], [1, 72, "Yakutsk", 12]], [[0, 65, "Yakutsk", 12], [0, 69, "Yakutsk", 12]], [[1, 8, "Dawson", 9], [1, 8, "Whitehorse", 9], [1, 8, "Yukon", 16]], [[1, 7, "Dawson", 9], [1, 7, "Whitehorse", 9], [1, 7, "Yakutat", 9], [1, 7, "Yukon", 16]], [[1, 57, "Yekaterinburg", 12]], [[0, 54, "Yekaterinburg", 12]], [[1, 51, "Yerevan", 12], [1, 54, "Yerevan", 12]], [[0, 47, "Yerevan", 12], [0, 51, "Yerevan", 12]], [[1, 7, "Dawson", 9], [1, 7, "Whitehorse", 9], [1, 7, "Yakutat", 9], [1, 7, "Yukon", 16]], [[0, 6, "Anchorage", 9], [0, 6, "Dawson", 9], [0, 6, "Juneau", 9], [0, 6, "Nome", 9], [0, 6, "Whitehorse", 9], [0, 6, "Yakutat", 9], [0, 6, "Yukon", 16], [0, 6, "Alaska"]], [[1, 7, "Dawson", 9], [1, 7, "Whitehorse", 9], [1, 7, "Yakutat", 9], [1, 7, "Yukon", 16]], [[0, 35]], [[0, 42]], [[0, 47]], [[0, 51]], [[0, 54]], [[0, 57]], [[0, 59]], [[0, 65]], [[0, 69]], [[0, 72]], [[0, 74]], [[0, 76]], [[0, 28]], [[0, 25]], [[0, 22]], [[0, 14]], [[0, 11]], [[0, 9]], [[0, 8]], [[0, 31, "UTC"]], [[0, 7]], [[0, 6]], [[0, 4]], [[0, 2]], [[0, 0]], [[0, 31, "Davis", 10], [0, 31, "DumontDUrville", 10]], [[0, 31]]];
  }

  if (!php_js_shared.tz_abbreviations) {
    php_js_shared.tz_abbreviations = ["acst", "act", "addt", "adt", "aft", "ahdt", "ahst", "akdt", "akst", "aktst", "aktt", "almst", "almt", "amst", "amt", "anast", "anat", "ant", "apt", "aqtst", "aqtt", "arst", "art", "ashst", "asht", "ast", "awt", "azomt", "azost", "azot", "azst", "azt", "bakst", "bakt", "bdst", "bdt", "beat", "beaut", "bmt", "bnt", "bortst", "bort", "bost", "bot", "brst", "brt", "bst", "btt", "burt", "cant", "capt", "cast", "cat", "cawt", "cddt", "cdt", "cemt", "cest", "cet", "cgst", "cgt", "chadt", "chast", "chat", "chdt", "chost", "chot", "cit", "cjt", "ckhst", "ckt", "clst", "clt", "cost", "cot", "cpt", "cst", "cvst", "cvt", "cwst", "cwt", "chst", "dact", "davt", "ddut", "dusst", "dust", "easst", "east", "eat", "ect", "eddt", "edt", "eest", "eet", "egst", "egt", "ehdt", "eit", "ept", "est", "ewt", "fjst", "fjt", "fkst", "fkt", "fnst", "fnt", "fort", "frust", "frut", "galt", "gamt", "gbgt", "gest", "get", "gft", "ghst", "gmt", "gst", "gyt", "hadt", "hast", "hdt", "hkst", "hkt", "hovst", "hovt", "hpt", "hst", "hwt", "ict", "iddt", "idt", "ihst", "iot", "irdt", "irkst", "irkt", "irst", "isst", "ist", "javt", "jdt", "jst", "kart", "kast", "kdt", "kgst", "kgt", "kizst", "kizt", "kmt", "kost", "krast", "krat", "kst", "kuyst", "kuyt", "kwat", "lhst", "lint", "lkt", "lont", "lrt", "lst", "madmt", "madst", "madt", "magst", "magt", "malst", "malt", "mart", "mawt", "mddt", "mdst", "mdt", "mest", "met", "mht", "mmt", "most", "mot", "mpt", "msd", "msk", "mst", "mut", "mvt", "mwt", "myt", "ncst", "nct", "nddt", "ndt", "negt", "nest", "net", "nft", "novst", "novt", "npt", "nrt", "nst", "nut", "nwt", "nzdt", "nzmt", "nzst", "omsst", "omst", "orast", "orat", "pddt", "pdt", "pest", "petst", "pett", "pet", "phot", "phst", "pht", "pkst", "pkt", "pmdt", "pmst", "pmt", "ppt", "pst", "pwt", "pyst", "pyt", "qyzst", "qyzt", "ret", "rmt", "rott", "sakst", "sakt", "samst", "samt", "sast", "sbt", "sct", "sgt", "shest", "shet", "slst", "smt", "srt", "sst", "stat", "svest", "svet", "syot", "taht", "tasst", "tast", "tbist", "tbit", "tft", "tjt", "tlt", "tmt", "tost", "tot", "trst", "trt", "tsat", "ulast", "ulat", "urast", "urat", "urut", "uyhst", "uyst", "uyt", "uzst", "uzt", "vet", "vlasst", "vlast", "vlat", "volst", "volt", "vost", "vust", "vut", "warst", "wart", "wast", "wat", "wemt", "west", "wet", "wgst", "wgt", "wit", "wst", "yakst", "yakt", "yddt", "ydt", "yekst", "yekt", "yerst", "yert", "ypt", "yst", "ywt", "a", "b", "c", "d", "e", "f", "g", "h", "i", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "utc", "u", "v", "w", "x", "y", "zzz", "z"];
  }

  if (!php_js_shared.tz_offsets) {
    php_js_shared.tz_offsets = [-43200, -41400, -39600, -37800, -36000, -34200, -32400, -28800, -25200, -21600, -19800, -18000, -16966, -16200, -14400, -14308, -13500, -13252, -13236, -12756, -12652, -12600, -10800, -9052, -9000, -7200, -5400, -3996, -3600, -2670, -1200, 0, 1172, 1200, 2079, 3600, 4772, 4800, 5736, 5784, 5940, 6264, 7200, 9000, 9048, 9384, 9885, 10800, 12344, 12600, 12648, 14400, 16200, 16248, 18000, 19800, 20700, 21600, 23400, 25200, 25580, 26240, 26400, 27000, 28656, 28800, 30000, 30600, 31500, 32400, 34200, 35100, 36000, 37800, 39600, 41400, 43200, 45000, 45900, 46800, 49500, 50400];
  }

  if (!php_js_shared.tz_prefixes) {
    php_js_shared.tz_prefixes = ['Africa', 'America', 'America/Argentina', 'America', 'America/Indiana', 'America', 'America/Kentucky', 'America', 'America/North_Dakota', 'America', 'Antarctica', 'Arctic', 'Asia', 'Atlantic', 'Australia', 'Brazil', 'Canada', 'Chile', 'Europe', 'Indian', 'Mexico', 'Pacific'];
  }

  var dtz = this.date_default_timezone_get();

  for (i = 0, len = php_js_shared.tz_abbrs.length; i < len; i++) {
    indice = php_js_shared.tz_abbreviations[i];
    curr = php_js_shared.tz_abbrs[i];
    list[indice] = [];

    for (j = 0, jlen = curr.length; j < jlen; j++) {
      currSub = curr[j];
      currSubPrefix = currSub[3] ? php_js_shared.tz_prefixes[currSub[3]] + '/' : '';
      timezone_id = currSub[2] ? currSubPrefix + currSub[2] : null;
      tzo = php_js_shared.tz_offsets[currSub[1]];
      dst = !!currSub[0];
      list[indice].push({
        'dst': dst,
        'offset': tzo,
        'timezone_id': timezone_id
      });

      if (dtz === timezone_id) {
        this.php_js.currentTimezoneOffset = tzo;
        this.php_js.currentTimezoneDST = dst;
      }
    }
  }

  return list;
}

function timezone_identifiers_list(what, country) {
  var i = 0,
      new_what = '',
      returnArr = [],
      continents = [],
      codes = [],
      indexOf = function indexOf(value) {
    for (var i = 0, length = this.length; i < length; i++) {
      if (this[i] === value) {
        return i;
      }
    }

    return -1;
  },
      identifiers = ['Africa/Abidjan', 'Africa/Accra', 'Africa/Addis_Ababa', 'Africa/Algiers', 'Africa/Asmara', 'Africa/Asmera', 'Africa/Bamako', 'Africa/Bangui', 'Africa/Banjul', 'Africa/Bissau', 'Africa/Blantyre', 'Africa/Brazzaville', 'Africa/Bujumbura', 'Africa/Cairo', 'Africa/Casablanca', 'Africa/Ceuta', 'Africa/Conakry', 'Africa/Dakar', 'Africa/Dar_es_Salaam', 'Africa/Djibouti', 'Africa/Douala', 'Africa/El_Aaiun', 'Africa/Freetown', 'Africa/Gaborone', 'Africa/Harare', 'Africa/Johannesburg', 'Africa/Kampala', 'Africa/Khartoum', 'Africa/Kigali', 'Africa/Kinshasa', 'Africa/Lagos', 'Africa/Libreville', 'Africa/Lome', 'Africa/Luanda', 'Africa/Lubumbashi', 'Africa/Lusaka', 'Africa/Malabo', 'Africa/Maputo', 'Africa/Maseru', 'Africa/Mbabane', 'Africa/Mogadishu', 'Africa/Monrovia', 'Africa/Nairobi', 'Africa/Ndjamena', 'Africa/Niamey', 'Africa/Nouakchott', 'Africa/Ouagadougou', 'Africa/Porto-Novo', 'Africa/Sao_Tome', 'Africa/Timbuktu', 'Africa/Tripoli', 'Africa/Tunis', 'Africa/Windhoek', 'America/Adak', 'America/Anchorage', 'America/Anguilla', 'America/Antigua', 'America/Araguaina', 'America/Argentina/Buenos_Aires', 'America/Argentina/Catamarca', 'America/Argentina/ComodRivadavia', 'America/Argentina/Cordoba', 'America/Argentina/Jujuy', 'America/Argentina/La_Rioja', 'America/Argentina/Mendoza', 'America/Argentina/Rio_Gallegos', 'America/Argentina/San_Juan', 'America/Argentina/San_Luis', 'America/Argentina/Tucuman', 'America/Argentina/Ushuaia', 'America/Aruba', 'America/Asuncion', 'America/Atikokan', 'America/Atka', 'America/Bahia', 'America/Barbados', 'America/Belem', 'America/Belize', 'America/Blanc-Sablon', 'America/Boa_Vista', 'America/Bogota', 'America/Boise', 'America/Buenos_Aires', 'America/Cambridge_Bay', 'America/Campo_Grande', 'America/Cancun', 'America/Caracas', 'America/Catamarca', 'America/Cayenne', 'America/Cayman', 'America/Chicago', 'America/Chihuahua', 'America/Coral_Harbour', 'America/Cordoba', 'America/Costa_Rica', 'America/Cuiaba', 'America/Curacao', 'America/Danmarkshavn', 'America/Dawson', 'America/Dawson_Creek', 'America/Denver', 'America/Detroit', 'America/Dominica', 'America/Edmonton', 'America/Eirunepe', 'America/El_Salvador', 'America/Ensenada', 'America/Fort_Wayne', 'America/Fortaleza', 'America/Glace_Bay', 'America/Godthab', 'America/Goose_Bay', 'America/Grand_Turk', 'America/Grenada', 'America/Guadeloupe', 'America/Guatemala', 'America/Guayaquil', 'America/Guyana', 'America/Halifax', 'America/Havana', 'America/Hermosillo', 'America/Indiana/Indianapolis', 'America/Indiana/Knox', 'America/Indiana/Marengo', 'America/Indiana/Petersburg', 'America/Indiana/Tell_City', 'America/Indiana/Vevay', 'America/Indiana/Vincennes', 'America/Indiana/Winamac', 'America/Indianapolis', 'America/Inuvik', 'America/Iqaluit', 'America/Jamaica', 'America/Jujuy', 'America/Juneau', 'America/Kentucky/Louisville', 'America/Kentucky/Monticello', 'America/Knox_IN', 'America/La_Paz', 'America/Lima', 'America/Los_Angeles', 'America/Louisville', 'America/Maceio', 'America/Managua', 'America/Manaus', 'America/Marigot', 'America/Martinique', 'America/Mazatlan', 'America/Mendoza', 'America/Menominee', 'America/Merida', 'America/Mexico_City', 'America/Miquelon', 'America/Moncton', 'America/Monterrey', 'America/Montevideo', 'America/Montreal', 'America/Montserrat', 'America/Nassau', 'America/New_York', 'America/Nipigon', 'America/Nome', 'America/Noronha', 'America/North_Dakota/Center', 'America/North_Dakota/New_Salem', 'America/Panama', 'America/Pangnirtung', 'America/Paramaribo', 'America/Phoenix', 'America/Port-au-Prince', 'America/Port_of_Spain', 'America/Porto_Acre', 'America/Porto_Velho', 'America/Puerto_Rico', 'America/Rainy_River', 'America/Rankin_Inlet', 'America/Recife', 'America/Regina', 'America/Resolute', 'America/Rio_Branco', 'America/Rosario', 'America/Santiago', 'America/Santo_Domingo', 'America/Sao_Paulo', 'America/Scoresbysund', 'America/Shiprock', 'America/St_Barthelemy', 'America/St_Johns', 'America/St_Kitts', 'America/St_Lucia', 'America/St_Thomas', 'America/St_Vincent', 'America/Swift_Current', 'America/Tegucigalpa', 'America/Thule', 'America/Thunder_Bay', 'America/Tijuana', 'America/Toronto', 'America/Tortola', 'America/Vancouver', 'America/Virgin', 'America/Whitehorse', 'America/Winnipeg', 'America/Yakutat', 'America/Yellowknife', 'Antarctica/Casey', 'Antarctica/Davis', 'Antarctica/DumontDUrville', 'Antarctica/Mawson', 'Antarctica/McMurdo', 'Antarctica/Palmer', 'Antarctica/Rothera', 'Antarctica/South_Pole', 'Antarctica/Syowa', 'Antarctica/Vostok', 'Arctic/Longyearbyen', 'Asia/Aden', 'Asia/Almaty', 'Asia/Amman', 'Asia/Anadyr', 'Asia/Aqtau', 'Asia/Aqtobe', 'Asia/Ashgabat', 'Asia/Ashkhabad', 'Asia/Baghdad', 'Asia/Bahrain', 'Asia/Baku', 'Asia/Bangkok', 'Asia/Beirut', 'Asia/Bishkek', 'Asia/Brunei', 'Asia/Calcutta', 'Asia/Choibalsan', 'Asia/Chongqing', 'Asia/Chungking', 'Asia/Colombo', 'Asia/Dacca', 'Asia/Damascus', 'Asia/Dhaka', 'Asia/Dili', 'Asia/Dubai', 'Asia/Dushanbe', 'Asia/Gaza', 'Asia/Harbin', 'Asia/Ho_Chi_Minh', 'Asia/Hong_Kong', 'Asia/Hovd', 'Asia/Irkutsk', 'Asia/Istanbul', 'Asia/Jakarta', 'Asia/Jayapura', 'Asia/Jerusalem', 'Asia/Kabul', 'Asia/Kamchatka', 'Asia/Karachi', 'Asia/Kashgar', 'Asia/Katmandu', 'Asia/Kolkata', 'Asia/Krasnoyarsk', 'Asia/Kuala_Lumpur', 'Asia/Kuching', 'Asia/Kuwait', 'Asia/Macao', 'Asia/Macau', 'Asia/Magadan', 'Asia/Makassar', 'Asia/Manila', 'Asia/Muscat', 'Asia/Nicosia', 'Asia/Novosibirsk', 'Asia/Omsk', 'Asia/Oral', 'Asia/Phnom_Penh', 'Asia/Pontianak', 'Asia/Pyongyang', 'Asia/Qatar', 'Asia/Qyzylorda', 'Asia/Rangoon', 'Asia/Riyadh', 'Asia/Saigon', 'Asia/Sakhalin', 'Asia/Samarkand', 'Asia/Seoul', 'Asia/Shanghai', 'Asia/Singapore', 'Asia/Taipei', 'Asia/Tashkent', 'Asia/Tbilisi', 'Asia/Tehran', 'Asia/Tel_Aviv', 'Asia/Thimbu', 'Asia/Thimphu', 'Asia/Tokyo', 'Asia/Ujung_Pandang', 'Asia/Ulaanbaatar', 'Asia/Ulan_Bator', 'Asia/Urumqi', 'Asia/Vientiane', 'Asia/Vladivostok', 'Asia/Yakutsk', 'Asia/Yekaterinburg', 'Asia/Yerevan', 'Atlantic/Azores', 'Atlantic/Bermuda', 'Atlantic/Canary', 'Atlantic/Cape_Verde', 'Atlantic/Faeroe', 'Atlantic/Faroe', 'Atlantic/Jan_Mayen', 'Atlantic/Madeira', 'Atlantic/Reykjavik', 'Atlantic/South_Georgia', 'Atlantic/St_Helena', 'Atlantic/Stanley', 'Australia/ACT', 'Australia/Adelaide', 'Australia/Brisbane', 'Australia/Broken_Hill', 'Australia/Canberra', 'Australia/Currie', 'Australia/Darwin', 'Australia/Eucla', 'Australia/Hobart', 'Australia/LHI', 'Australia/Lindeman', 'Australia/Lord_Howe', 'Australia/Melbourne', 'Australia/North', 'Australia/NSW', 'Australia/Perth', 'Australia/Queensland', 'Australia/South', 'Australia/Sydney', 'Australia/Tasmania', 'Australia/Victoria', 'Australia/West', 'Australia/Yancowinna', 'Brazil/Acre', 'Brazil/DeNoronha', 'Brazil/East', 'Brazil/West', 'Canada/Atlantic', 'Canada/Central', 'Canada/East-Saskatchewan', 'Canada/Eastern', 'Canada/Mountain', 'Canada/Newfoundland', 'Canada/Pacific', 'Canada/Saskatchewan', 'Canada/Yukon', 'CET', 'Chile/Continental', 'Chile/EasterIsland', 'CST6CDT', 'Cuba', 'EET', 'Egypt', 'Eire', 'EST', 'EST5EDT', 'Etc/GMT', 'Etc/GMT+0', 'Etc/GMT+1', 'Etc/GMT+10', 'Etc/GMT+11', 'Etc/GMT+12', 'Etc/GMT+2', 'Etc/GMT+3', 'Etc/GMT+4', 'Etc/GMT+5', 'Etc/GMT+6', 'Etc/GMT+7', 'Etc/GMT+8', 'Etc/GMT+9', 'Etc/GMT-0', 'Etc/GMT-1', 'Etc/GMT-10', 'Etc/GMT-11', 'Etc/GMT-12', 'Etc/GMT-13', 'Etc/GMT-14', 'Etc/GMT-2', 'Etc/GMT-3', 'Etc/GMT-4', 'Etc/GMT-5', 'Etc/GMT-6', 'Etc/GMT-7', 'Etc/GMT-8', 'Etc/GMT-9', 'Etc/GMT0', 'Etc/Greenwich', 'Etc/UCT', 'Etc/Universal', 'Etc/UTC', 'Etc/Zulu', 'Europe/Amsterdam', 'Europe/Andorra', 'Europe/Athens', 'Europe/Belfast', 'Europe/Belgrade', 'Europe/Berlin', 'Europe/Bratislava', 'Europe/Brussels', 'Europe/Bucharest', 'Europe/Budapest', 'Europe/Chisinau', 'Europe/Copenhagen', 'Europe/Dublin', 'Europe/Gibraltar', 'Europe/Guernsey', 'Europe/Helsinki', 'Europe/Isle_of_Man', 'Europe/Istanbul', 'Europe/Jersey', 'Europe/Kaliningrad', 'Europe/Kiev', 'Europe/Lisbon', 'Europe/Ljubljana', 'Europe/London', 'Europe/Luxembourg', 'Europe/Madrid', 'Europe/Malta', 'Europe/Mariehamn', 'Europe/Minsk', 'Europe/Monaco', 'Europe/Moscow', 'Europe/Nicosia', 'Europe/Oslo', 'Europe/Paris', 'Europe/Podgorica', 'Europe/Prague', 'Europe/Riga', 'Europe/Rome', 'Europe/Samara', 'Europe/San_Marino', 'Europe/Sarajevo', 'Europe/Simferopol', 'Europe/Skopje', 'Europe/Sofia', 'Europe/Stockholm', 'Europe/Tallinn', 'Europe/Tirane', 'Europe/Tiraspol', 'Europe/Uzhgorod', 'Europe/Vaduz', 'Europe/Vatican', 'Europe/Vienna', 'Europe/Vilnius', 'Europe/Volgograd', 'Europe/Warsaw', 'Europe/Zagreb', 'Europe/Zaporozhye', 'Europe/Zurich', 'Factory', 'GB', 'GB-Eire', 'GMT', 'GMT+0', 'GMT-0', 'GMT0', 'Greenwich', 'Hongkong', 'HST', 'Iceland', 'Indian/Antananarivo', 'Indian/Chagos', 'Indian/Christmas', 'Indian/Cocos', 'Indian/Comoro', 'Indian/Kerguelen', 'Indian/Mahe', 'Indian/Maldives', 'Indian/Mauritius', 'Indian/Mayotte', 'Indian/Reunion', 'Iran', 'Israel', 'Jamaica', 'Japan', 'Kwajalein', 'Libya', 'MET', 'Mexico/BajaNorte', 'Mexico/BajaSur', 'Mexico/General', 'MST', 'MST7MDT', 'Navajo', 'NZ', 'NZ-CHAT', 'Pacific/Apia', 'Pacific/Auckland', 'Pacific/Chatham', 'Pacific/Easter', 'Pacific/Efate', 'Pacific/Enderbury', 'Pacific/Fakaofo', 'Pacific/Fiji', 'Pacific/Funafuti', 'Pacific/Galapagos', 'Pacific/Gambier', 'Pacific/Guadalcanal', 'Pacific/Guam', 'Pacific/Honolulu', 'Pacific/Johnston', 'Pacific/Kiritimati', 'Pacific/Kosrae', 'Pacific/Kwajalein', 'Pacific/Majuro', 'Pacific/Marquesas', 'Pacific/Midway', 'Pacific/Nauru', 'Pacific/Niue', 'Pacific/Norfolk', 'Pacific/Noumea', 'Pacific/Pago_Pago', 'Pacific/Palau', 'Pacific/Pitcairn', 'Pacific/Ponape', 'Pacific/Port_Moresby', 'Pacific/Rarotonga', 'Pacific/Saipan', 'Pacific/Samoa', 'Pacific/Tahiti', 'Pacific/Tarawa', 'Pacific/Tongatapu', 'Pacific/Truk', 'Pacific/Wake', 'Pacific/Wallis', 'Pacific/Yap', 'Poland', 'Portugal', 'PRC', 'PST8PDT', 'ROC', 'ROK', 'Singapore', 'Turkey', 'UCT', 'Universal', 'US/Alaska', 'US/Aleutian', 'US/Arizona', 'US/Central', 'US/East-Indiana', 'US/Eastern', 'US/Hawaii', 'US/Indiana-Starke', 'US/Michigan', 'US/Mountain', 'US/Pacific', 'US/Pacific-New', 'US/Samoa', 'UTC', 'W-SU', 'WET', 'Zulu'];

  continents = ['AFRICA', 'AMERICA', 'ANTARCTICA', 'ARCTIC', 'ASIA', 'ATLANTIC', 'AUSTRALIA', 'EUROPE', 'INDIAN', 'PACIFIC'];
  codes = [1, 2, 4, 8, 16, 32, 64, 128, 256, 512];

  if (!codes.indexOf) {
    codes.indexOf = indexOf;
  }

  if (!continents.indexOf) {
    continents.indexOf = indexOf;
  }

  if (what) {
    if (codes.indexOf(what) !== -1 || continents.indexOf(what) !== -1) {
      if (what && what === parseInt(what, 10) + '') {
        new_what = continents[codes.indexOf(what)];
      }

      if (what) {
        new_what = what[0] + what.slice(1).toLowerCase();
      }

      for (i = 0; i < identifiers.length; i++) {
        if (identifiers[i].indexOf(new_what + '/') !== -1) {
          returnArr.push(identifiers[i]);
        }
      }

      return returnArr;
    } else if (what === 'UTC' || what === 1024) {
      throw 'Unknown implementation';
    } else if (what === 'ALL_WITH_BC' || what === 4095) {
      throw 'Unknown implementation';
    } else if (what === 'PER_COUNTRY' || what === 4096) {
      throw 'Unknown implementation';
    } else if (what === 'ALL' || what === 2047) {
      return identifiers;
    }
  }

  return identifiers;
}

/***/ }),

/***/ "./resources/js/string.min.js":
/*!************************************!*\
  !*** ./resources/js/string.min.js ***!
  \************************************/
/***/ (() => {

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/* 
 * More info at: http://phpjs.org
 * 
 * This is version: 3.24
 * php.js is copyright 2011 Kevin van Zonneveld.
 * 
 * Portions copyright Brett Zamir (http://brett-zamir.me), Kevin van Zonneveld
 * (http://kevin.vanzonneveld.net), Onno Marsman, Theriault, Michael White
 * (http://getsprink.com), Waldo Malqui Silva, Paulo Freitas, Jonas Raoni
 * Soares Silva (http://www.jsfromhell.com), Jack, Philip Peterson, Ates Goral
 * (http://magnetiq.com), Legaev Andrey, Ratheous, Alex, Martijn Wieringa,
 * Nate, lmeyrick (https://sourceforge.net/projects/bcmath-js/), Enrique
 * Gonzalez, Philippe Baumann, Rafał Kukawski (http://blog.kukawski.pl),
 * Webtoolkit.info (http://www.webtoolkit.info/), Ole Vrijenhoek, Ash Searle
 * (http://hexmen.com/blog/), travc, Carlos R. L. Rodrigues
 * (http://www.jsfromhell.com), Jani Hartikainen, stag019, GeekFG
 * (http://geekfg.blogspot.com), WebDevHobo (http://webdevhobo.blogspot.com/),
 * Erkekjetter, pilus, Rafał Kukawski (http://blog.kukawski.pl/), Johnny Mast
 * (http://www.phpvrouwen.nl), T.Wild,
 * http://stackoverflow.com/questions/57803/how-to-convert-decimal-to-hex-in-javascript,
 * d3x, Michael Grier, Andrea Giammarchi (http://webreflection.blogspot.com),
 * marrtins, Mailfaker (http://www.weedem.fr/), Steve Hilder, gettimeofday,
 * mdsjack (http://www.mdsjack.bo.it), felix, majak, Steven Levithan
 * (http://blog.stevenlevithan.com), Mirek Slugen, Oleg Eremeev, Felix
 * Geisendoerfer (http://www.debuggable.com/felix), Martin
 * (http://www.erlenwiese.de/), gorthaur, Lars Fischer, Joris, AJ, Paul Smith,
 * Tim de Koning (http://www.kingsquare.nl), KELAN, Josh Fraser
 * (http://onlineaspect.com/2007/06/08/auto-detect-a-time-zone-with-javascript/),
 * Chris, Marc Palau, Kevin van Zonneveld (http://kevin.vanzonneveld.net/),
 * Arpad Ray (mailto:arpad@php.net), Breaking Par Consulting Inc
 * (http://www.breakingpar.com/bkp/home.nsf/0/87256B280015193F87256CFB006C45F7),
 * Nathan, Karol Kowalski, David, Dreamer, Diplom@t (http://difane.com/), Caio
 * Ariede (http://caioariede.com), Robin, Imgen Tata (http://www.myipdf.com/),
 * Pellentesque Malesuada, saulius, Aman Gupta, Sakimori, Tyler Akins
 * (http://rumkin.com), Thunder.m, Public Domain
 * (http://www.json.org/json2.js), Michael White, Kankrelune
 * (http://www.webfaktory.info/), Alfonso Jimenez
 * (http://www.alfonsojimenez.com), Frank Forte, vlado houba, Marco, Billy,
 * David James, madipta, noname, sankai, class_exists, Jalal Berrami, ger,
 * Itsacon (http://www.itsacon.net/), Scott Cariss, nobbler, Arno, Denny
 * Wardhana, ReverseSyntax, Mateusz "loonquawl" Zalega, Slawomir Kaniecki,
 * Francois, Fox, mktime, Douglas Crockford (http://javascript.crockford.com),
 * john (http://www.jd-tech.net), Oskar Larsson Högfeldt
 * (http://oskar-lh.name/), marc andreu, Nick Kolosov (http://sammy.ru), date,
 * Marc Jansen, Steve Clay, Olivier Louvignes (http://mg-crea.com/), Soren
 * Hansen, merabi, Subhasis Deb, josh, T0bsn, Tim Wiel, Brad Touesnard, MeEtc
 * (http://yass.meetcweb.com), Peter-Paul Koch
 * (http://www.quirksmode.org/js/beat.html), Pyerre, Jon Hohle, duncan, Bayron
 * Guevara, Adam Wallner (http://web2.bitbaro.hu/), paulo kuong, Gilbert,
 * Lincoln Ramsay, Thiago Mata (http://thiagomata.blog.com), Linuxworld,
 * lmeyrick (https://sourceforge.net/projects/bcmath-js/this.), djmix, Bryan
 * Elliott, David Randall, Sanjoy Roy, jmweb, Francesco, Stoyan Kyosev
 * (http://www.svest.org/), J A R, kenneth, T. Wild, Ole Vrijenhoek
 * (http://www.nervous.nl/), Raphael (Ao RUDLER), Shingo, LH, JB, nord_ua, jd,
 * JT, Thomas Beaucourt (http://www.webapp.fr), Ozh, XoraX
 * (http://www.xorax.info), EdorFaus, Eugene Bulkin (http://doubleaw.com/),
 * Der Simon (http://innerdom.sourceforge.net/), 0m3r, echo is bad,
 * FremyCompany, stensi, Kristof Coomans (SCK-CEN Belgian Nucleair Research
 * Centre), Devan Penner-Woelk, Pierre-Luc Paour, Martin Pool, Brant Messenger
 * (http://www.brantmessenger.com/), Kirk Strobeck, Saulo Vallory, Christoph,
 * Wagner B. Soares, Artur Tchernychev, Valentina De Rosa, Jason Wong
 * (http://carrot.org/), Daniel Esteban, strftime, Rick Waldron, Mick@el,
 * Anton Ongson, Bjorn Roesbeke (http://www.bjornroesbeke.be/), Simon Willison
 * (http://simonwillison.net), Gabriel Paderni, Philipp Lenssen, Marco van
 * Oort, Bug?, Blues (http://tech.bluesmoon.info/), Tomasz Wesolowski, rezna,
 * Eric Nagel, Evertjan Garretsen, Luke Godfrey, Pul, Bobby Drake, uestla,
 * Alan C, Ulrich, Zahlii, Yves Sucaet, sowberry, Norman "zEh" Fuchs, hitwork,
 * johnrembo, Brian Tafoya (http://www.premasolutions.com/), Nick Callen,
 * Steven Levithan (stevenlevithan.com), ejsanders, Scott Baker, Philippe
 * Jausions (http://pear.php.net/user/jausions), Aidan Lister
 * (http://aidanlister.com/), Rob, e-mike, HKM, ChaosNo1, metjay, strcasecmp,
 * strcmp, Taras Bogach, jpfle, Alexander Ermolaev
 * (http://snippets.dzone.com/user/AlexanderErmolaev), DxGx, kilops, Orlando,
 * dptr1988, Le Torbi, James (http://www.james-bell.co.uk/), Pedro Tainha
 * (http://www.pedrotainha.com), James, penutbutterjelly, Arnout Kazemier
 * (http://www.3rd-Eden.com), 3D-GRAF, daniel airton wermann
 * (http://wermann.com.br), jakes, Yannoo, FGFEmperor, gabriel paderni, Atli
 * Þór, Maximusya, Diogo Resende, Rival, Howard Yeend, Allan Jensen
 * (http://www.winternet.no), davook, Benjamin Lupton, baris ozdil, Greg
 * Frazier, Manish, Matt Bradley, Cord, fearphage
 * (http://http/my.opera.com/fearphage/), Matteo, Victor, taith, Tim de
 * Koning, Ryan W Tenney (http://ryan.10e.us), Tod Gentille, Alexander M
 * Beedie, Riddler (http://www.frontierwebdev.com/), Luis Salazar
 * (http://www.freaky-media.com/), Rafał Kukawski, T.J. Leahy, Luke Smith
 * (http://lucassmith.name), Kheang Hok Chin (http://www.distantia.ca/),
 * Russell Walker (http://www.nbill.co.uk/), Jamie Beck
 * (http://www.terabit.ca/), Garagoth, Andrej Pavlovic, Dino, Le Torbi
 * (http://www.letorbi.de/), Ben (http://benblume.co.uk/), DtTvB
 * (http://dt.in.th/2008-09-16.string-length-in-bytes.html), Michael, Chris
 * McMacken, setcookie, YUI Library:
 * http://developer.yahoo.com/yui/docs/YAHOO.util.DateLocale.html, Andreas,
 * Blues at http://hacks.bluesmoon.info/strftime/strftime.js, rem, Josep Sanz
 * (http://www.ws3.es/), Cagri Ekin, Lorenzo Pisani, incidence, Amirouche, Jay
 * Klehr, Amir Habibi (http://www.residence-mixte.com/), Tony, booeyOH, meo,
 * William, Greenseed, Yen-Wei Liu, Ben Bryan, Leslie Hoare, mk.keck
 * 
 * Dual licensed under the MIT (MIT-LICENSE.txt)
 * and GPL (GPL-LICENSE.txt) licenses.
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a
 * copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL KEVIN VAN ZONNEVELD BE LIABLE FOR ANY CLAIM, DAMAGES
 * OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
 * ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 */
// Compression: minified
function addcslashes(str, charlist) {
  var target = '',
      chrs = [],
      i = 0,
      j = 0,
      c = '',
      next = '',
      rangeBegin = '',
      rangeEnd = '',
      chr = '',
      begin = 0,
      end = 0,
      octalLength = 0,
      postOctalPos = 0,
      cca = 0,
      escHexGrp = [],
      encoded = '',
      percentHex = /%([\dA-Fa-f]+)/g;

  var _pad = function _pad(n, c) {
    if ((n = n + "").length < c) {
      return new Array(++c - n.length).join("0") + n;
    } else {
      return n;
    }
  };

  for (i = 0; i < charlist.length; i++) {
    c = charlist.charAt(i);
    next = charlist.charAt(i + 1);

    if (c === '\\' && next && /\d/.test(next)) {
      rangeBegin = charlist.slice(i + 1).match(/^\d+/)[0];
      octalLength = rangeBegin.length;
      postOctalPos = i + octalLength + 1;

      if (charlist.charAt(postOctalPos) + charlist.charAt(postOctalPos + 1) === '..') {
        begin = rangeBegin.charCodeAt(0);

        if (/\\\d/.test(charlist.charAt(postOctalPos + 2) + charlist.charAt(postOctalPos + 3))) {
          rangeEnd = charlist.slice(postOctalPos + 3).match(/^\d+/)[0];
          i += 1;
        } else if (charlist.charAt(postOctalPos + 2)) {
          rangeEnd = charlist.charAt(postOctalPos + 2);
        } else {
          throw 'Range with no end point';
        }

        end = rangeEnd.charCodeAt(0);

        if (end > begin) {
          for (j = begin; j <= end; j++) {
            chrs.push(String.fromCharCode(j));
          }
        } else {
          chrs.push('.', rangeBegin, rangeEnd);
        }

        i += rangeEnd.length + 2;
      } else {
        chr = String.fromCharCode(parseInt(rangeBegin, 8));
        chrs.push(chr);
      }

      i += octalLength;
    } else if (next + charlist.charAt(i + 2) === '..') {
      rangeBegin = c;
      begin = rangeBegin.charCodeAt(0);

      if (/\\\d/.test(charlist.charAt(i + 3) + charlist.charAt(i + 4))) {
        rangeEnd = charlist.slice(i + 4).match(/^\d+/)[0];
        i += 1;
      } else if (charlist.charAt(i + 3)) {
        rangeEnd = charlist.charAt(i + 3);
      } else {
        throw 'Range with no end point';
      }

      end = rangeEnd.charCodeAt(0);

      if (end > begin) {
        for (j = begin; j <= end; j++) {
          chrs.push(String.fromCharCode(j));
        }
      } else {
        chrs.push('.', rangeBegin, rangeEnd);
      }

      i += rangeEnd.length + 2;
    } else {
      chrs.push(c);
    }
  }

  for (i = 0; i < str.length; i++) {
    c = str.charAt(i);

    if (chrs.indexOf(c) !== -1) {
      target += '\\';
      cca = c.charCodeAt(0);

      if (cca < 32 || cca > 126) {
        switch (c) {
          case '\n':
            target += 'n';
            break;

          case '\t':
            target += 't';
            break;

          case "\r":
            target += 'r';
            break;

          case "\x07":
            target += 'a';
            break;

          case '\v':
            target += 'v';
            break;

          case '\b':
            target += 'b';
            break;

          case '\f':
            target += 'f';
            break;

          default:
            encoded = encodeURIComponent(c);

            if ((escHexGrp = percentHex.exec(encoded)) !== null) {
              target += _pad(parseInt(escHexGrp[1], 16).toString(8), 3);
            }

            while ((escHexGrp = percentHex.exec(encoded)) !== null) {
              target += '\\' + _pad(parseInt(escHexGrp[1], 16).toString(8), 3);
            }

            break;
        }
      } else {
        target += c;
      }
    } else {
      target += c;
    }
  }

  return target;
}

function addslashes(str) {
  return (str + '').replace(/[\\"']/g, '\\$&').replace(/\u0000/g, '\\0');
}

function bin2hex(s) {
  var i,
      f = 0,
      a = [];
  s += '';
  f = s.length;

  for (i = 0; i < f; i++) {
    a[i] = s.charCodeAt(i).toString(16).replace(/^([\da-f])$/, "0$1");
  }

  return a.join('');
}

function chop(str, charlist) {
  return this.rtrim(str, charlist);
}

function chr(codePt) {
  if (codePt > 0xFFFF) {
    codePt -= 0x10000;
    return String.fromCharCode(0xD800 + (codePt >> 10), 0xDC00 + (codePt & 0x3FF));
  }

  return String.fromCharCode(codePt);
}

function chunk_split(body, chunklen, end) {
  chunklen = parseInt(chunklen, 10) || 76;
  end = end || '\r\n';

  if (chunklen < 1) {
    return false;
  }

  return body.match(new RegExp(".{0," + chunklen + "}", "g")).join(end);
}

function convert_cyr_string(str, from, to) {
  var _cyr_win1251 = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 46, 154, 174, 190, 46, 159, 189, 46, 46, 179, 191, 180, 157, 46, 46, 156, 183, 46, 46, 182, 166, 173, 46, 46, 158, 163, 152, 164, 155, 46, 46, 46, 167, 225, 226, 247, 231, 228, 229, 246, 250, 233, 234, 235, 236, 237, 238, 239, 240, 242, 243, 244, 245, 230, 232, 227, 254, 251, 253, 255, 249, 248, 252, 224, 241, 193, 194, 215, 199, 196, 197, 214, 218, 201, 202, 203, 204, 205, 206, 207, 208, 210, 211, 212, 213, 198, 200, 195, 222, 219, 221, 223, 217, 216, 220, 192, 209, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 184, 186, 32, 179, 191, 32, 32, 32, 32, 32, 180, 162, 32, 32, 32, 32, 168, 170, 32, 178, 175, 32, 32, 32, 32, 32, 165, 161, 169, 254, 224, 225, 246, 228, 229, 244, 227, 245, 232, 233, 234, 235, 236, 237, 238, 239, 255, 240, 241, 242, 243, 230, 226, 252, 251, 231, 248, 253, 249, 247, 250, 222, 192, 193, 214, 196, 197, 212, 195, 213, 200, 201, 202, 203, 204, 205, 206, 207, 223, 208, 209, 210, 211, 198, 194, 220, 219, 199, 216, 221, 217, 215, 218],
      _cyr_cp866 = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 225, 226, 247, 231, 228, 229, 246, 250, 233, 234, 235, 236, 237, 238, 239, 240, 242, 243, 244, 245, 230, 232, 227, 254, 251, 253, 255, 249, 248, 252, 224, 241, 193, 194, 215, 199, 196, 197, 214, 218, 201, 202, 203, 204, 205, 206, 207, 208, 35, 35, 35, 124, 124, 124, 124, 43, 43, 124, 124, 43, 43, 43, 43, 43, 43, 45, 45, 124, 45, 43, 124, 124, 43, 43, 45, 45, 124, 45, 43, 45, 45, 45, 45, 43, 43, 43, 43, 43, 43, 43, 43, 35, 35, 124, 124, 35, 210, 211, 212, 213, 198, 200, 195, 222, 219, 221, 223, 217, 216, 220, 192, 209, 179, 163, 180, 164, 183, 167, 190, 174, 32, 149, 158, 32, 152, 159, 148, 154, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 205, 186, 213, 241, 243, 201, 32, 245, 187, 212, 211, 200, 190, 32, 247, 198, 199, 204, 181, 240, 242, 185, 32, 244, 203, 207, 208, 202, 216, 32, 246, 32, 238, 160, 161, 230, 164, 165, 228, 163, 229, 168, 169, 170, 171, 172, 173, 174, 175, 239, 224, 225, 226, 227, 166, 162, 236, 235, 167, 232, 237, 233, 231, 234, 158, 128, 129, 150, 132, 133, 148, 131, 149, 136, 137, 138, 139, 140, 141, 142, 143, 159, 144, 145, 146, 147, 134, 130, 156, 155, 135, 152, 157, 153, 151, 154],
      _cyr_iso88595 = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 179, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 225, 226, 247, 231, 228, 229, 246, 250, 233, 234, 235, 236, 237, 238, 239, 240, 242, 243, 244, 245, 230, 232, 227, 254, 251, 253, 255, 249, 248, 252, 224, 241, 193, 194, 215, 199, 196, 197, 214, 218, 201, 202, 203, 204, 205, 206, 207, 208, 210, 211, 212, 213, 198, 200, 195, 222, 219, 221, 223, 217, 216, 220, 192, 209, 32, 163, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 241, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 161, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 238, 208, 209, 230, 212, 213, 228, 211, 229, 216, 217, 218, 219, 220, 221, 222, 223, 239, 224, 225, 226, 227, 214, 210, 236, 235, 215, 232, 237, 233, 231, 234, 206, 176, 177, 198, 180, 181, 196, 179, 197, 184, 185, 186, 187, 188, 189, 190, 191, 207, 192, 193, 194, 195, 182, 178, 204, 203, 183, 200, 205, 201, 199, 202],
      _cyr_mac = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 225, 226, 247, 231, 228, 229, 246, 250, 233, 234, 235, 236, 237, 238, 239, 240, 242, 243, 244, 245, 230, 232, 227, 254, 251, 253, 255, 249, 248, 252, 224, 241, 160, 161, 162, 163, 164, 165, 166, 167, 168, 169, 170, 171, 172, 173, 174, 175, 176, 177, 178, 179, 180, 181, 182, 183, 184, 185, 186, 187, 188, 189, 190, 191, 128, 129, 130, 131, 132, 133, 134, 135, 136, 137, 138, 139, 140, 141, 142, 143, 144, 145, 146, 147, 148, 149, 150, 151, 152, 153, 154, 155, 156, 179, 163, 209, 193, 194, 215, 199, 196, 197, 214, 218, 201, 202, 203, 204, 205, 206, 207, 208, 210, 211, 212, 213, 198, 200, 195, 222, 219, 221, 223, 217, 216, 220, 192, 255, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 192, 193, 194, 195, 196, 197, 198, 199, 200, 201, 202, 203, 204, 205, 206, 207, 208, 209, 210, 211, 212, 213, 214, 215, 216, 217, 218, 219, 220, 221, 222, 223, 160, 161, 162, 222, 164, 165, 166, 167, 168, 169, 170, 171, 172, 173, 174, 175, 176, 177, 178, 221, 180, 181, 182, 183, 184, 185, 186, 187, 188, 189, 190, 191, 254, 224, 225, 246, 228, 229, 244, 227, 245, 232, 233, 234, 235, 236, 237, 238, 239, 223, 240, 241, 242, 243, 230, 226, 252, 251, 231, 248, 253, 249, 247, 250, 158, 128, 129, 150, 132, 133, 148, 131, 149, 136, 137, 138, 139, 140, 141, 142, 143, 159, 144, 145, 146, 147, 134, 130, 156, 155, 135, 152, 157, 153, 151, 154];
  var from_table = null,
      to_table = null,
      tmp,
      i = 0,
      retStr = '';

  switch (from.toUpperCase()) {
    case 'W':
      from_table = _cyr_win1251;
      break;

    case 'A':
    case 'D':
      from_table = _cyr_cp866;
      break;

    case 'I':
      from_table = _cyr_iso88595;
      break;

    case 'M':
      from_table = _cyr_mac;
      break;

    case 'K':
      break;

    default:
      throw 'Unknown source charset: ' + from;
  }

  switch (to.toUpperCase()) {
    case 'W':
      to_table = _cyr_win1251;
      break;

    case 'A':
    case 'D':
      to_table = _cyr_cp866;
      break;

    case 'I':
      to_table = _cyr_iso88595;
      break;

    case 'M':
      to_table = _cyr_mac;
      break;

    case 'K':
      break;

    default:
      throw 'Unknown destination charset: ' + to;
  }

  if (!str) {
    return str;
  }

  for (i = 0; i < str.length; i++) {
    tmp = from_table === null ? str.charAt(i) : String.fromCharCode(from_table[str.charAt(i).charCodeAt(0)]);
    retStr += to_table === null ? tmp : String.fromCharCode(to_table[tmp.charCodeAt(0) + 256]);
  }

  return retStr;
}

function convert_uuencode(str) {
  var chr = function chr(c) {
    return String.fromCharCode(c);
  };

  if (!str || str == "") {
    return chr(0);
  } else if (!this.is_scalar(str)) {
    return false;
  }

  var c = 0,
      u = 0,
      i = 0,
      a = 0;
  var encoded = "",
      tmp1 = "",
      tmp2 = "",
      bytes = {};

  var chunk = function chunk() {
    bytes = str.substr(u, 45);

    for (i in bytes) {
      bytes[i] = bytes[i].charCodeAt(0);
    }

    if (bytes.length != 0) {
      return bytes.length;
    } else {
      return 0;
    }
  };

  while (chunk() !== 0) {
    c = chunk();
    u += 45;
    encoded += chr(c + 32);

    for (i in bytes) {
      tmp1 = bytes[i].charCodeAt(0).toString(2);

      while (tmp1.length < 8) {
        tmp1 = "0" + tmp1;
      }

      tmp2 += tmp1;
    }

    while (tmp2.length % 6) {
      tmp2 = tmp2 + "0";
    }

    for (i = 0; i <= tmp2.length / 6 - 1; i++) {
      tmp1 = tmp2.substr(a, 6);

      if (tmp1 == "000000") {
        encoded += chr(96);
      } else {
        encoded += chr(parseInt(tmp1, 2) + 32);
      }

      a += 6;
    }

    a = 0;
    tmp2 = "";
    encoded += "\n";
  }

  encoded += chr(96) + "\n";
  return encoded;
}

function count_chars(str, mode) {
  var result = {},
      resultArr = [],
      i;
  str = ('' + str).split('').sort().join('').match(/(.)\1*/g);

  if ((mode & 1) == 0) {
    for (i = 0; i != 256; i++) {
      result[i] = 0;
    }
  }

  if (mode === 2 || mode === 4) {
    for (i = 0; i != str.length; i += 1) {
      delete result[str[i].charCodeAt(0)];
    }

    for (i in result) {
      result[i] = mode === 4 ? String.fromCharCode(i) : 0;
    }
  } else if (mode === 3) {
    for (i = 0; i != str.length; i += 1) {
      result[i] = str[i].slice(0, 1);
    }
  } else {
    for (i = 0; i != str.length; i += 1) {
      result[str[i].charCodeAt(0)] = str[i].length;
    }
  }

  if (mode < 3) {
    return result;
  }

  for (i in result) {
    resultArr.push(result[i]);
  }

  return resultArr.join('');
}

function crc32(str) {
  str = this.utf8_encode(str);
  var table = "00000000 77073096 EE0E612C 990951BA 076DC419 706AF48F E963A535 9E6495A3 0EDB8832 79DCB8A4 E0D5E91E 97D2D988 09B64C2B 7EB17CBD E7B82D07 90BF1D91 1DB71064 6AB020F2 F3B97148 84BE41DE 1ADAD47D 6DDDE4EB F4D4B551 83D385C7 136C9856 646BA8C0 FD62F97A 8A65C9EC 14015C4F 63066CD9 FA0F3D63 8D080DF5 3B6E20C8 4C69105E D56041E4 A2677172 3C03E4D1 4B04D447 D20D85FD A50AB56B 35B5A8FA 42B2986C DBBBC9D6 ACBCF940 32D86CE3 45DF5C75 DCD60DCF ABD13D59 26D930AC 51DE003A C8D75180 BFD06116 21B4F4B5 56B3C423 CFBA9599 B8BDA50F 2802B89E 5F058808 C60CD9B2 B10BE924 2F6F7C87 58684C11 C1611DAB B6662D3D 76DC4190 01DB7106 98D220BC EFD5102A 71B18589 06B6B51F 9FBFE4A5 E8B8D433 7807C9A2 0F00F934 9609A88E E10E9818 7F6A0DBB 086D3D2D 91646C97 E6635C01 6B6B51F4 1C6C6162 856530D8 F262004E 6C0695ED 1B01A57B 8208F4C1 F50FC457 65B0D9C6 12B7E950 8BBEB8EA FCB9887C 62DD1DDF 15DA2D49 8CD37CF3 FBD44C65 4DB26158 3AB551CE A3BC0074 D4BB30E2 4ADFA541 3DD895D7 A4D1C46D D3D6F4FB 4369E96A 346ED9FC AD678846 DA60B8D0 44042D73 33031DE5 AA0A4C5F DD0D7CC9 5005713C 270241AA BE0B1010 C90C2086 5768B525 206F85B3 B966D409 CE61E49F 5EDEF90E 29D9C998 B0D09822 C7D7A8B4 59B33D17 2EB40D81 B7BD5C3B C0BA6CAD EDB88320 9ABFB3B6 03B6E20C 74B1D29A EAD54739 9DD277AF 04DB2615 73DC1683 E3630B12 94643B84 0D6D6A3E 7A6A5AA8 E40ECF0B 9309FF9D 0A00AE27 7D079EB1 F00F9344 8708A3D2 1E01F268 6906C2FE F762575D 806567CB 196C3671 6E6B06E7 FED41B76 89D32BE0 10DA7A5A 67DD4ACC F9B9DF6F 8EBEEFF9 17B7BE43 60B08ED5 D6D6A3E8 A1D1937E 38D8C2C4 4FDFF252 D1BB67F1 A6BC5767 3FB506DD 48B2364B D80D2BDA AF0A1B4C 36034AF6 41047A60 DF60EFC3 A867DF55 316E8EEF 4669BE79 CB61B38C BC66831A 256FD2A0 5268E236 CC0C7795 BB0B4703 220216B9 5505262F C5BA3BBE B2BD0B28 2BB45A92 5CB36A04 C2D7FFA7 B5D0CF31 2CD99E8B 5BDEAE1D 9B64C2B0 EC63F226 756AA39C 026D930A 9C0906A9 EB0E363F 72076785 05005713 95BF4A82 E2B87A14 7BB12BAE 0CB61B38 92D28E9B E5D5BE0D 7CDCEFB7 0BDBDF21 86D3D2D4 F1D4E242 68DDB3F8 1FDA836E 81BE16CD F6B9265B 6FB077E1 18B74777 88085AE6 FF0F6A70 66063BCA 11010B5C 8F659EFF F862AE69 616BFFD3 166CCF45 A00AE278 D70DD2EE 4E048354 3903B3C2 A7672661 D06016F7 4969474D 3E6E77DB AED16A4A D9D65ADC 40DF0B66 37D83BF0 A9BCAE53 DEBB9EC5 47B2CF7F 30B5FFE9 BDBDF21C CABAC28A 53B39330 24B4A3A6 BAD03605 CDD70693 54DE5729 23D967BF B3667A2E C4614AB8 5D681B02 2A6F2B94 B40BBE37 C30C8EA1 5A05DF1B 2D02EF8D";
  var crc = 0;
  var x = 0;
  var y = 0;
  crc = crc ^ -1;

  for (var i = 0, iTop = str.length; i < iTop; i++) {
    y = (crc ^ str.charCodeAt(i)) & 0xFF;
    x = "0x" + table.substr(y * 9, 8);
    crc = crc >>> 8 ^ x;
  }

  return crc ^ -1;
}

function ctype_alpha(text) {
  if (typeof text !== 'string') {
    return false;
  }

  this.setlocale('LC_ALL', 0);
  return text.search(this.php_js.locales[this.php_js.localeCategories.LC_CTYPE].LC_CTYPE.al) !== -1;
}

function echo() {
  var arg = '',
      argc = arguments.length,
      argv = arguments,
      i = 0,
      holder,
      win = this.window,
      d = win.document,
      ns_xhtml = 'http://www.w3.org/1999/xhtml',
      ns_xul = 'http://www.mozilla.org/keymaster/gatekeeper/there.is.only.xul';

  var stringToDOM = function stringToDOM(str, parent, ns, container) {
    var extraNSs = '';

    if (ns === ns_xul) {
      extraNSs = ' xmlns:html="' + ns_xhtml + '"';
    }

    var stringContainer = '<' + container + ' xmlns="' + ns + '"' + extraNSs + '>' + str + '</' + container + '>';
    var dils = win.DOMImplementationLS,
        dp = win.DOMParser,
        ax = win.ActiveXObject;

    if (dils && dils.createLSInput && dils.createLSParser) {
      var lsInput = dils.createLSInput();
      lsInput.stringData = stringContainer;
      var lsParser = dils.createLSParser(1, null);
      return lsParser.parse(lsInput).firstChild;
    } else if (dp) {
      try {
        var fc = new dp().parseFromString(stringContainer, 'text/xml');

        if (fc && fc.documentElement && fc.documentElement.localName !== 'parsererror' && fc.documentElement.namespaceURI !== 'http://www.mozilla.org/newlayout/xml/parsererror.xml') {
          return fc.documentElement.firstChild;
        }
      } catch (e) {}
    } else if (ax) {
      var axo = new ax('MSXML2.DOMDocument');
      axo.loadXML(str);
      return axo.documentElement;
    }

    if (d.createElementNS && (d.documentElement.namespaceURI || d.documentElement.nodeName.toLowerCase() !== 'html' || d.contentType && d.contentType !== 'text/html')) {
      holder = d.createElementNS(ns, container);
    } else {
      holder = d.createElement(container);
    }

    holder.innerHTML = str;

    while (holder.firstChild) {
      parent.appendChild(holder.firstChild);
    }

    return false;
  };

  var ieFix = function ieFix(node) {
    if (node.nodeType === 1) {
      var newNode = d.createElement(node.nodeName);
      var i, len;

      if (node.attributes && node.attributes.length > 0) {
        for (i = 0, len = node.attributes.length; i < len; i++) {
          newNode.setAttribute(node.attributes[i].nodeName, node.getAttribute(node.attributes[i].nodeName));
        }
      }

      if (node.childNodes && node.childNodes.length > 0) {
        for (i = 0, len = node.childNodes.length; i < len; i++) {
          newNode.appendChild(ieFix(node.childNodes[i]));
        }
      }

      return newNode;
    } else {
      return d.createTextNode(node.nodeValue);
    }
  };

  var replacer = function replacer(s, m1, m2) {
    if (m1 !== '\\') {
      return m1 + eval(m2);
    } else {
      return s;
    }
  };

  this.php_js = this.php_js || {};
  var phpjs = this.php_js,
      ini = phpjs.ini,
      obs = phpjs.obs;

  for (i = 0; i < argc; i++) {
    arg = argv[i];

    if (ini && ini['phpjs.echo_embedded_vars']) {
      arg = arg.replace(/(.?)\{?\$(\w*?\}|\w*)/g, replacer);
    }

    if (!phpjs.flushing && obs && obs.length) {
      obs[obs.length - 1].buffer += arg;
      continue;
    }

    if (d.appendChild) {
      if (d.body) {
        if (win.navigator.appName === 'Microsoft Internet Explorer') {
          d.body.appendChild(stringToDOM(ieFix(arg)));
        } else {
          var unappendedLeft = stringToDOM(arg, d.body, ns_xhtml, 'div').cloneNode(true);

          if (unappendedLeft) {
            d.body.appendChild(unappendedLeft);
          }
        }
      } else {
        d.documentElement.appendChild(stringToDOM(arg, d.documentElement, ns_xul, 'description'));
      }
    } else if (d.write) {
      d.write(arg);
    }
  }
}

function explode(delimiter, string, limit) {
  var emptyArray = {
    0: ''
  };

  if (arguments.length < 2 || typeof arguments[0] == 'undefined' || typeof arguments[1] == 'undefined') {
    return null;
  }

  if (delimiter === '' || delimiter === false || delimiter === null) {
    return false;
  }

  if (typeof delimiter == 'function' || _typeof(delimiter) == 'object' || typeof string == 'function' || _typeof(string) == 'object') {
    return emptyArray;
  }

  if (delimiter === true) {
    delimiter = '1';
  }

  if (!limit) {
    return string.toString().split(delimiter.toString());
  } else {
    var splitted = string.toString().split(delimiter.toString());
    var partA = splitted.splice(0, limit - 1);
    var partB = splitted.join(delimiter.toString());
    partA.push(partB);
    return partA;
  }
}

function file_get_contents(url, flags, context, offset, maxLen) {
  var tmp,
      headers = [],
      newTmp = [],
      k = 0,
      i = 0,
      href = '',
      pathPos = -1,
      flagNames = 0,
      content = null,
      http_stream = false;

  var func = function func(value) {
    return value.substring(1) !== '';
  };

  this.php_js = this.php_js || {};
  this.php_js.ini = this.php_js.ini || {};
  var ini = this.php_js.ini;
  context = context || this.php_js.default_streams_context || null;

  if (!flags) {
    flags = 0;
  }

  var OPTS = {
    FILE_USE_INCLUDE_PATH: 1,
    FILE_TEXT: 32,
    FILE_BINARY: 64
  };

  if (typeof flags === 'number') {
    flagNames = flags;
  } else {
    flags = [].concat(flags);

    for (i = 0; i < flags.length; i++) {
      if (OPTS[flags[i]]) {
        flagNames = flagNames | OPTS[flags[i]];
      }
    }
  }

  if (flagNames & OPTS.FILE_BINARY && flagNames & OPTS.FILE_TEXT) {
    throw 'You cannot pass both FILE_BINARY and FILE_TEXT to file_get_contents()';
  }

  if (flagNames & OPTS.FILE_USE_INCLUDE_PATH && ini.include_path && ini.include_path.local_value) {
    var slash = ini.include_path.local_value.indexOf('/') !== -1 ? '/' : '\\';
    url = ini.include_path.local_value + slash + url;
  } else if (!/^(https?|file):/.test(url)) {
    href = this.window.location.href;
    pathPos = url.indexOf('/') === 0 ? href.indexOf('/', 8) - 1 : href.lastIndexOf('/');
    url = href.slice(0, pathPos + 1) + url;
  }

  if (context) {
    var http_options = context.stream_options && context.stream_options.http;
    http_stream = !!http_options;
  }

  if (!context || http_stream) {
    var req = this.window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest();

    if (!req) {
      throw new Error('XMLHttpRequest not supported');
    }

    var method = http_stream ? http_options.method : 'GET';
    var async = !!(context && context.stream_params && context.stream_params['phpjs.async']);

    if (ini['phpjs.ajaxBypassCache'] && ini['phpjs.ajaxBypassCache'].local_value) {
      url += (url.match(/\?/) == null ? "?" : "&") + new Date().getTime();
    }

    req.open(method, url, async);

    if (async) {
      var notification = context.stream_params.notification;

      if (typeof notification === 'function') {
        if (false) {} else {
          req.onreadystatechange = function (aEvt) {
            var objContext = {
              responseText: req.responseText,
              responseXML: req.responseXML,
              status: req.status,
              statusText: req.statusText,
              readyState: req.readyState,
              evt: aEvt
            };
            var bytes_transferred;

            switch (req.readyState) {
              case 0:
                notification.call(objContext, 0, 0, '', 0, 0, 0);
                break;

              case 1:
                notification.call(objContext, 0, 0, '', 0, 0, 0);
                break;

              case 2:
                notification.call(objContext, 0, 0, '', 0, 0, 0);
                break;

              case 3:
                bytes_transferred = req.responseText.length * 2;
                notification.call(objContext, 7, 0, '', 0, bytes_transferred, 0);
                break;

              case 4:
                if (req.status >= 200 && req.status < 400) {
                  bytes_transferred = req.responseText.length * 2;
                  notification.call(objContext, 8, 0, '', req.status, bytes_transferred, 0);
                } else if (req.status === 403) {
                  notification.call(objContext, 10, 2, '', req.status, 0, 0);
                } else {
                  notification.call(objContext, 9, 2, '', req.status, 0, 0);
                }

                break;

              default:
                throw 'Unrecognized ready state for file_get_contents()';
            }
          };
        }
      }
    }

    if (http_stream) {
      var sendHeaders = http_options.header && http_options.header.split(/\r?\n/);
      var userAgentSent = false;

      for (i = 0; i < sendHeaders.length; i++) {
        var sendHeader = sendHeaders[i];
        var breakPos = sendHeader.search(/:\s*/);
        var sendHeaderName = sendHeader.substring(0, breakPos);
        req.setRequestHeader(sendHeaderName, sendHeader.substring(breakPos + 1));

        if (sendHeaderName === 'User-Agent') {
          userAgentSent = true;
        }
      }

      if (!userAgentSent) {
        var user_agent = http_options.user_agent || ini.user_agent && ini.user_agent.local_value;

        if (user_agent) {
          req.setRequestHeader('User-Agent', user_agent);
        }
      }

      content = http_options.content || null;
    }

    if (flagNames & OPTS.FILE_TEXT) {
      var content_type = 'text/html';

      if (http_options && http_options['phpjs.override']) {
        content_type = http_options['phpjs.override'];
      } else {
        var encoding = ini['unicode.stream_encoding'] && ini['unicode.stream_encoding'].local_value || 'UTF-8';

        if (http_options && http_options.header && /^content-type:/im.test(http_options.header)) {
          content_type = http_options.header.match(/^content-type:\s*(.*)$/im)[1];
        }

        if (!/;\s*charset=/.test(content_type)) {
          content_type += '; charset=' + encoding;
        }
      }

      req.overrideMimeType(content_type);
    } else if (flagNames & OPTS.FILE_BINARY) {
      req.overrideMimeType('text/plain; charset=x-user-defined');
    }

    if (http_options && http_options['phpjs.sendAsBinary']) {
      req.sendAsBinary(content);
    } else {
      req.send(content);
    }

    tmp = req.getAllResponseHeaders();

    if (tmp) {
      tmp = tmp.split('\n');

      for (k = 0; k < tmp.length; k++) {
        if (func(tmp[k])) {
          newTmp.push(tmp[k]);
        }
      }

      tmp = newTmp;

      for (i = 0; i < tmp.length; i++) {
        headers[i] = tmp[i];
      }

      this.$http_response_header = headers;
    }

    if (offset || maxLen) {
      if (maxLen) {
        return req.responseText.substr(offset || 0, maxLen);
      }

      return req.responseText.substr(offset);
    }

    return req.responseText;
  }

  return false;
}

function get_html_translation_table(table, quote_style) {
  var entities = {},
      hash_map = {},
      decimal = 0,
      symbol = '';
  var constMappingTable = {},
      constMappingQuoteStyle = {};
  var useTable = {},
      useQuoteStyle = {};
  constMappingTable[0] = 'HTML_SPECIALCHARS';
  constMappingTable[1] = 'HTML_ENTITIES';
  constMappingQuoteStyle[0] = 'ENT_NOQUOTES';
  constMappingQuoteStyle[2] = 'ENT_COMPAT';
  constMappingQuoteStyle[3] = 'ENT_QUOTES';
  useTable = !isNaN(table) ? constMappingTable[table] : table ? table.toUpperCase() : 'HTML_SPECIALCHARS';
  useQuoteStyle = !isNaN(quote_style) ? constMappingQuoteStyle[quote_style] : quote_style ? quote_style.toUpperCase() : 'ENT_COMPAT';

  if (useTable !== 'HTML_SPECIALCHARS' && useTable !== 'HTML_ENTITIES') {
    throw new Error("Table: " + useTable + ' not supported');
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

  for (decimal in entities) {
    symbol = String.fromCharCode(decimal);
    hash_map[symbol] = entities[decimal];
  }

  return hash_map;
}

function getenv(varname) {
  if (!this.php_js || !this.php_js.ENV || !this.php_js.ENV[varname]) {
    return false;
  }

  return this.php_js.ENV[varname];
}

function html_entity_decode(string, quote_style) {
  var hash_map = {},
      symbol = '',
      tmp_str = '',
      entity = '';
  tmp_str = string.toString();

  if (false === (hash_map = this.get_html_translation_table('HTML_ENTITIES', quote_style))) {
    return false;
  }

  delete hash_map['&'];
  hash_map['&'] = '&amp;';

  for (symbol in hash_map) {
    entity = hash_map[symbol];
    tmp_str = tmp_str.split(entity).join(symbol);
  }

  tmp_str = tmp_str.split('&#039;').join("'");
  return tmp_str;
}

function htmlentities(string, quote_style) {
  var hash_map = {},
      symbol = '',
      tmp_str = '',
      entity = '';
  tmp_str = string.toString();

  if (false === (hash_map = this.get_html_translation_table('HTML_ENTITIES', quote_style))) {
    return false;
  }

  hash_map["'"] = '&#039;';

  for (symbol in hash_map) {
    entity = hash_map[symbol];
    tmp_str = tmp_str.split(symbol).join(entity);
  }

  return tmp_str;
}

function htmlspecialchars(string, quote_style, charset, double_encode) {
  var optTemp = 0,
      i = 0,
      noquotes = false;

  if (typeof quote_style === 'undefined' || quote_style === null) {
    quote_style = 2;
  }

  string = string.toString();

  if (double_encode !== false) {
    string = string.replace(/&/g, '&amp;');
  }

  string = string.replace(/</g, '&lt;').replace(/>/g, '&gt;');
  var OPTS = {
    'ENT_NOQUOTES': 0,
    'ENT_HTML_QUOTE_SINGLE': 1,
    'ENT_HTML_QUOTE_DOUBLE': 2,
    'ENT_COMPAT': 2,
    'ENT_QUOTES': 3,
    'ENT_IGNORE': 4
  };

  if (quote_style === 0) {
    noquotes = true;
  }

  if (typeof quote_style !== 'number') {
    quote_style = [].concat(quote_style);

    for (i = 0; i < quote_style.length; i++) {
      if (OPTS[quote_style[i]] === 0) {
        noquotes = true;
      } else if (OPTS[quote_style[i]]) {
        optTemp = optTemp | OPTS[quote_style[i]];
      }
    }

    quote_style = optTemp;
  }

  if (quote_style & OPTS.ENT_HTML_QUOTE_SINGLE) {
    string = string.replace(/'/g, '&#039;');
  }

  if (!noquotes) {
    string = string.replace(/"/g, '&quot;');
  }

  return string;
}

function htmlspecialchars_decode(string, quote_style) {
  var optTemp = 0,
      i = 0,
      noquotes = false;

  if (typeof quote_style === 'undefined') {
    quote_style = 2;
  }

  string = string.toString().replace(/&lt;/g, '<').replace(/&gt;/g, '>');
  var OPTS = {
    'ENT_NOQUOTES': 0,
    'ENT_HTML_QUOTE_SINGLE': 1,
    'ENT_HTML_QUOTE_DOUBLE': 2,
    'ENT_COMPAT': 2,
    'ENT_QUOTES': 3,
    'ENT_IGNORE': 4
  };

  if (quote_style === 0) {
    noquotes = true;
  }

  if (typeof quote_style !== 'number') {
    quote_style = [].concat(quote_style);

    for (i = 0; i < quote_style.length; i++) {
      if (OPTS[quote_style[i]] === 0) {
        noquotes = true;
      } else if (OPTS[quote_style[i]]) {
        optTemp = optTemp | OPTS[quote_style[i]];
      }
    }

    quote_style = optTemp;
  }

  if (quote_style & OPTS.ENT_HTML_QUOTE_SINGLE) {
    string = string.replace(/&#0*39;/g, "'");
  }

  if (!noquotes) {
    string = string.replace(/&quot;/g, '"');
  }

  string = string.replace(/&amp;/g, '&');
  return string;
}

function i18n_loc_get_default() {
  this.php_js = this.php_js || {};
  return this.php_js.i18nLocale || (i18n_loc_set_default('en_US_POSIX'), 'en_US_POSIX');
}

function i18n_loc_set_default(name) {
  this.php_js = this.php_js || {};
  this.php_js.i18nLocales = {
    en_US_POSIX: {
      sorting: function sorting(str1, str2) {
        return str1 == str2 ? 0 : str1 > str2 ? 1 : -1;
      }
    }
  };
  this.php_js.i18nLocale = name;
  return true;
}

function implode(glue, pieces) {
  var i = '',
      retVal = '',
      tGlue = '';

  if (arguments.length === 1) {
    pieces = glue;
    glue = '';
  }

  if (_typeof(pieces) === 'object') {
    if (pieces instanceof Array) {
      return pieces.join(glue);
    } else {
      for (i in pieces) {
        retVal += tGlue + pieces[i];
        tGlue = glue;
      }

      return retVal;
    }
  } else {
    return pieces;
  }
}

function ini_set(varname, newvalue) {
  var oldval = '',
      that = this;
  this.php_js = this.php_js || {};
  this.php_js.ini = this.php_js.ini || {};
  this.php_js.ini[varname] = this.php_js.ini[varname] || {};
  oldval = this.php_js.ini[varname].local_value;

  var _setArr = function _setArr(oldval) {
    if (typeof oldval === 'undefined') {
      that.php_js.ini[varname].local_value = [];
    }

    that.php_js.ini[varname].local_value.push(newvalue);
  };

  switch (varname) {
    case 'extension':
      if (typeof this.dl === 'function') {
        this.dl(newvalue);
      }

      _setArr(oldval, newvalue);

      break;

    default:
      this.php_js.ini[varname].local_value = newvalue;
      break;
  }

  return oldval;
}

function is_scalar(mixed_var) {
  return /boolean|number|string/.test(_typeof(mixed_var));
}

function join(glue, pieces) {
  return this.implode(glue, pieces);
}

function krsort(inputArr, sort_flags) {
  var tmp_arr = {},
      keys = [],
      sorter,
      i,
      k,
      that = this,
      strictForIn = false,
      populateArr = {};

  switch (sort_flags) {
    case 'SORT_STRING':
      sorter = function sorter(a, b) {
        return that.strnatcmp(b, a);
      };

      break;

    case 'SORT_LOCALE_STRING':
      var loc = this.i18n_loc_get_default();
      sorter = this.php_js.i18nLocales[loc].sorting;
      break;

    case 'SORT_NUMERIC':
      sorter = function sorter(a, b) {
        return b - a;
      };

      break;

    case 'SORT_REGULAR':
    default:
      sorter = function sorter(b, a) {
        var aFloat = parseFloat(a),
            bFloat = parseFloat(b),
            aNumeric = aFloat + '' === a,
            bNumeric = bFloat + '' === b;

        if (aNumeric && bNumeric) {
          return aFloat > bFloat ? 1 : aFloat < bFloat ? -1 : 0;
        } else if (aNumeric && !bNumeric) {
          return 1;
        } else if (!aNumeric && bNumeric) {
          return -1;
        }

        return a > b ? 1 : a < b ? -1 : 0;
      };

      break;
  }

  for (k in inputArr) {
    if (inputArr.hasOwnProperty(k)) {
      keys.push(k);
    }
  }

  keys.sort(sorter);
  this.php_js = this.php_js || {};
  this.php_js.ini = this.php_js.ini || {};
  strictForIn = this.php_js.ini['phpjs.strictForIn'] && this.php_js.ini['phpjs.strictForIn'].local_value && this.php_js.ini['phpjs.strictForIn'].local_value !== 'off';
  populateArr = strictForIn ? inputArr : populateArr;

  for (i = 0; i < keys.length; i++) {
    k = keys[i];
    tmp_arr[k] = inputArr[k];

    if (strictForIn) {
      delete inputArr[k];
    }
  }

  for (i in tmp_arr) {
    if (tmp_arr.hasOwnProperty(i)) {
      populateArr[i] = tmp_arr[i];
    }
  }

  return strictForIn || populateArr;
}

function lcfirst(str) {
  str += '';
  var f = str.charAt(0).toLowerCase();
  return f + str.substr(1);
}

function levenshtein(s1, s2) {
  if (s1 == s2) {
    return 0;
  }

  var s1_len = s1.length;
  var s2_len = s2.length;

  if (s1_len === 0) {
    return s2_len;
  }

  if (s2_len === 0) {
    return s1_len;
  }

  var split = false;

  try {
    split = !'0'[0];
  } catch (e) {
    split = true;
  }

  if (split) {
    s1 = s1.split('');
    s2 = s2.split('');
  }

  var v0 = new Array(s1_len + 1);
  var v1 = new Array(s1_len + 1);
  var s1_idx = 0,
      s2_idx = 0,
      cost = 0;

  for (s1_idx = 0; s1_idx < s1_len + 1; s1_idx++) {
    v0[s1_idx] = s1_idx;
  }

  var char_s1 = '',
      char_s2 = '';

  for (s2_idx = 1; s2_idx <= s2_len; s2_idx++) {
    v1[0] = s2_idx;
    char_s2 = s2[s2_idx - 1];

    for (s1_idx = 0; s1_idx < s1_len; s1_idx++) {
      char_s1 = s1[s1_idx];
      cost = char_s1 == char_s2 ? 0 : 1;
      var m_min = v0[s1_idx + 1] + 1;
      var b = v1[s1_idx] + 1;
      var c = v0[s1_idx] + cost;

      if (b < m_min) {
        m_min = b;
      }

      if (c < m_min) {
        m_min = c;
      }

      v1[s1_idx + 1] = m_min;
    }

    var v_tmp = v0;
    v0 = v1;
    v1 = v_tmp;
  }

  return v0[s1_len];
}

function localeconv() {
  var arr = {},
      prop = '';
  this.setlocale('LC_ALL', 0);

  for (prop in this.php_js.locales[this.php_js.localeCategories.LC_NUMERIC].LC_NUMERIC) {
    arr[prop] = this.php_js.locales[this.php_js.localeCategories.LC_NUMERIC].LC_NUMERIC[prop];
  }

  for (prop in this.php_js.locales[this.php_js.localeCategories.LC_MONETARY].LC_MONETARY) {
    arr[prop] = this.php_js.locales[this.php_js.localeCategories.LC_MONETARY].LC_MONETARY[prop];
  }

  return arr;
}

function ltrim(str, charlist) {
  charlist = !charlist ? " \\s\xA0" : (charlist + '').replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, '$1');
  var re = new RegExp('^[' + charlist + ']+', 'g');
  return (str + '').replace(re, '');
}

function md5(str) {
  var xl;

  var rotateLeft = function rotateLeft(lValue, iShiftBits) {
    return lValue << iShiftBits | lValue >>> 32 - iShiftBits;
  };

  var addUnsigned = function addUnsigned(lX, lY) {
    var lX4, lY4, lX8, lY8, lResult;
    lX8 = lX & 0x80000000;
    lY8 = lY & 0x80000000;
    lX4 = lX & 0x40000000;
    lY4 = lY & 0x40000000;
    lResult = (lX & 0x3FFFFFFF) + (lY & 0x3FFFFFFF);

    if (lX4 & lY4) {
      return lResult ^ 0x80000000 ^ lX8 ^ lY8;
    }

    if (lX4 | lY4) {
      if (lResult & 0x40000000) {
        return lResult ^ 0xC0000000 ^ lX8 ^ lY8;
      } else {
        return lResult ^ 0x40000000 ^ lX8 ^ lY8;
      }
    } else {
      return lResult ^ lX8 ^ lY8;
    }
  };

  var _F = function _F(x, y, z) {
    return x & y | ~x & z;
  };

  var _G = function _G(x, y, z) {
    return x & z | y & ~z;
  };

  var _H = function _H(x, y, z) {
    return x ^ y ^ z;
  };

  var _I = function _I(x, y, z) {
    return y ^ (x | ~z);
  };

  var _FF = function _FF(a, b, c, d, x, s, ac) {
    a = addUnsigned(a, addUnsigned(addUnsigned(_F(b, c, d), x), ac));
    return addUnsigned(rotateLeft(a, s), b);
  };

  var _GG = function _GG(a, b, c, d, x, s, ac) {
    a = addUnsigned(a, addUnsigned(addUnsigned(_G(b, c, d), x), ac));
    return addUnsigned(rotateLeft(a, s), b);
  };

  var _HH = function _HH(a, b, c, d, x, s, ac) {
    a = addUnsigned(a, addUnsigned(addUnsigned(_H(b, c, d), x), ac));
    return addUnsigned(rotateLeft(a, s), b);
  };

  var _II = function _II(a, b, c, d, x, s, ac) {
    a = addUnsigned(a, addUnsigned(addUnsigned(_I(b, c, d), x), ac));
    return addUnsigned(rotateLeft(a, s), b);
  };

  var convertToWordArray = function convertToWordArray(str) {
    var lWordCount;
    var lMessageLength = str.length;
    var lNumberOfWords_temp1 = lMessageLength + 8;
    var lNumberOfWords_temp2 = (lNumberOfWords_temp1 - lNumberOfWords_temp1 % 64) / 64;
    var lNumberOfWords = (lNumberOfWords_temp2 + 1) * 16;
    var lWordArray = new Array(lNumberOfWords - 1);
    var lBytePosition = 0;
    var lByteCount = 0;

    while (lByteCount < lMessageLength) {
      lWordCount = (lByteCount - lByteCount % 4) / 4;
      lBytePosition = lByteCount % 4 * 8;
      lWordArray[lWordCount] = lWordArray[lWordCount] | str.charCodeAt(lByteCount) << lBytePosition;
      lByteCount++;
    }

    lWordCount = (lByteCount - lByteCount % 4) / 4;
    lBytePosition = lByteCount % 4 * 8;
    lWordArray[lWordCount] = lWordArray[lWordCount] | 0x80 << lBytePosition;
    lWordArray[lNumberOfWords - 2] = lMessageLength << 3;
    lWordArray[lNumberOfWords - 1] = lMessageLength >>> 29;
    return lWordArray;
  };

  var wordToHex = function wordToHex(lValue) {
    var wordToHexValue = "",
        wordToHexValue_temp = "",
        lByte,
        lCount;

    for (lCount = 0; lCount <= 3; lCount++) {
      lByte = lValue >>> lCount * 8 & 255;
      wordToHexValue_temp = "0" + lByte.toString(16);
      wordToHexValue = wordToHexValue + wordToHexValue_temp.substr(wordToHexValue_temp.length - 2, 2);
    }

    return wordToHexValue;
  };

  var x = [],
      k,
      AA,
      BB,
      CC,
      DD,
      a,
      b,
      c,
      d,
      S11 = 7,
      S12 = 12,
      S13 = 17,
      S14 = 22,
      S21 = 5,
      S22 = 9,
      S23 = 14,
      S24 = 20,
      S31 = 4,
      S32 = 11,
      S33 = 16,
      S34 = 23,
      S41 = 6,
      S42 = 10,
      S43 = 15,
      S44 = 21;
  str = this.utf8_encode(str);
  x = convertToWordArray(str);
  a = 0x67452301;
  b = 0xEFCDAB89;
  c = 0x98BADCFE;
  d = 0x10325476;
  xl = x.length;

  for (k = 0; k < xl; k += 16) {
    AA = a;
    BB = b;
    CC = c;
    DD = d;
    a = _FF(a, b, c, d, x[k + 0], S11, 0xD76AA478);
    d = _FF(d, a, b, c, x[k + 1], S12, 0xE8C7B756);
    c = _FF(c, d, a, b, x[k + 2], S13, 0x242070DB);
    b = _FF(b, c, d, a, x[k + 3], S14, 0xC1BDCEEE);
    a = _FF(a, b, c, d, x[k + 4], S11, 0xF57C0FAF);
    d = _FF(d, a, b, c, x[k + 5], S12, 0x4787C62A);
    c = _FF(c, d, a, b, x[k + 6], S13, 0xA8304613);
    b = _FF(b, c, d, a, x[k + 7], S14, 0xFD469501);
    a = _FF(a, b, c, d, x[k + 8], S11, 0x698098D8);
    d = _FF(d, a, b, c, x[k + 9], S12, 0x8B44F7AF);
    c = _FF(c, d, a, b, x[k + 10], S13, 0xFFFF5BB1);
    b = _FF(b, c, d, a, x[k + 11], S14, 0x895CD7BE);
    a = _FF(a, b, c, d, x[k + 12], S11, 0x6B901122);
    d = _FF(d, a, b, c, x[k + 13], S12, 0xFD987193);
    c = _FF(c, d, a, b, x[k + 14], S13, 0xA679438E);
    b = _FF(b, c, d, a, x[k + 15], S14, 0x49B40821);
    a = _GG(a, b, c, d, x[k + 1], S21, 0xF61E2562);
    d = _GG(d, a, b, c, x[k + 6], S22, 0xC040B340);
    c = _GG(c, d, a, b, x[k + 11], S23, 0x265E5A51);
    b = _GG(b, c, d, a, x[k + 0], S24, 0xE9B6C7AA);
    a = _GG(a, b, c, d, x[k + 5], S21, 0xD62F105D);
    d = _GG(d, a, b, c, x[k + 10], S22, 0x2441453);
    c = _GG(c, d, a, b, x[k + 15], S23, 0xD8A1E681);
    b = _GG(b, c, d, a, x[k + 4], S24, 0xE7D3FBC8);
    a = _GG(a, b, c, d, x[k + 9], S21, 0x21E1CDE6);
    d = _GG(d, a, b, c, x[k + 14], S22, 0xC33707D6);
    c = _GG(c, d, a, b, x[k + 3], S23, 0xF4D50D87);
    b = _GG(b, c, d, a, x[k + 8], S24, 0x455A14ED);
    a = _GG(a, b, c, d, x[k + 13], S21, 0xA9E3E905);
    d = _GG(d, a, b, c, x[k + 2], S22, 0xFCEFA3F8);
    c = _GG(c, d, a, b, x[k + 7], S23, 0x676F02D9);
    b = _GG(b, c, d, a, x[k + 12], S24, 0x8D2A4C8A);
    a = _HH(a, b, c, d, x[k + 5], S31, 0xFFFA3942);
    d = _HH(d, a, b, c, x[k + 8], S32, 0x8771F681);
    c = _HH(c, d, a, b, x[k + 11], S33, 0x6D9D6122);
    b = _HH(b, c, d, a, x[k + 14], S34, 0xFDE5380C);
    a = _HH(a, b, c, d, x[k + 1], S31, 0xA4BEEA44);
    d = _HH(d, a, b, c, x[k + 4], S32, 0x4BDECFA9);
    c = _HH(c, d, a, b, x[k + 7], S33, 0xF6BB4B60);
    b = _HH(b, c, d, a, x[k + 10], S34, 0xBEBFBC70);
    a = _HH(a, b, c, d, x[k + 13], S31, 0x289B7EC6);
    d = _HH(d, a, b, c, x[k + 0], S32, 0xEAA127FA);
    c = _HH(c, d, a, b, x[k + 3], S33, 0xD4EF3085);
    b = _HH(b, c, d, a, x[k + 6], S34, 0x4881D05);
    a = _HH(a, b, c, d, x[k + 9], S31, 0xD9D4D039);
    d = _HH(d, a, b, c, x[k + 12], S32, 0xE6DB99E5);
    c = _HH(c, d, a, b, x[k + 15], S33, 0x1FA27CF8);
    b = _HH(b, c, d, a, x[k + 2], S34, 0xC4AC5665);
    a = _II(a, b, c, d, x[k + 0], S41, 0xF4292244);
    d = _II(d, a, b, c, x[k + 7], S42, 0x432AFF97);
    c = _II(c, d, a, b, x[k + 14], S43, 0xAB9423A7);
    b = _II(b, c, d, a, x[k + 5], S44, 0xFC93A039);
    a = _II(a, b, c, d, x[k + 12], S41, 0x655B59C3);
    d = _II(d, a, b, c, x[k + 3], S42, 0x8F0CCC92);
    c = _II(c, d, a, b, x[k + 10], S43, 0xFFEFF47D);
    b = _II(b, c, d, a, x[k + 1], S44, 0x85845DD1);
    a = _II(a, b, c, d, x[k + 8], S41, 0x6FA87E4F);
    d = _II(d, a, b, c, x[k + 15], S42, 0xFE2CE6E0);
    c = _II(c, d, a, b, x[k + 6], S43, 0xA3014314);
    b = _II(b, c, d, a, x[k + 13], S44, 0x4E0811A1);
    a = _II(a, b, c, d, x[k + 4], S41, 0xF7537E82);
    d = _II(d, a, b, c, x[k + 11], S42, 0xBD3AF235);
    c = _II(c, d, a, b, x[k + 2], S43, 0x2AD7D2BB);
    b = _II(b, c, d, a, x[k + 9], S44, 0xEB86D391);
    a = addUnsigned(a, AA);
    b = addUnsigned(b, BB);
    c = addUnsigned(c, CC);
    d = addUnsigned(d, DD);
  }

  var temp = wordToHex(a) + wordToHex(b) + wordToHex(c) + wordToHex(d);
  return temp.toLowerCase();
}

function md5_file(str_filename) {
  var buf = '';
  buf = this.file_get_contents(str_filename);

  if (!buf) {
    return false;
  }

  return this.md5(buf);
}

function metaphone(word, phones) {
  var wordlength = word.length,
      x = 0,
      tempchar = '',
      metaword = '',
      removedbl = function removedbl(word) {
    var wordlength = word.length,
        tempword = word.toLowerCase(),
        rebuilt,
        tempchar1,
        tempchar2,
        x;
    tempchar1 = tempword.charAt(0);
    rebuilt = tempchar1;

    for (x = 1; x < wordlength; x++) {
      tempchar2 = tempword.charAt(x);

      if (tempchar2 != tempchar1 || tempchar2 == 'c' || tempchar2 == 'g') {
        rebuilt += tempchar2;
      }

      tempchar1 = tempchar2;
    }

    return rebuilt;
  },
      isVowel = function isVowel(a) {
    switch (a.toLowerCase()) {
      case 'a':
        return true;

      case 'e':
        return true;

      case 'i':
        return true;

      case 'o':
        return true;

      case 'u':
        return true;

      default:
        return false;
    }
  },
      tempword = removedbl(word.toLowerCase());

  if (tempword.charAt(0) == 'w' && tempword.charAt(1) == 'h') {
    tempword = "w" + tempword.substr(2);
  }

  for (x = 0; x < wordlength; x++) {
    tempchar = String(tempword).charAt(x);

    if (x === 0 && x + 1 <= wordlength) {
      switch (tempchar) {
        case 'a':
          if (tempword.charAt(x + 1) == 'e') {
            metaword += 'e';
          } else {
            metaword += 'a';
          }

          break;

        case 'e':
          metaword += 'e';
          break;

        case 'i':
          metaword += 'i';
          break;

        case 'o':
          metaword += 'o';
          break;

        case 'u':
          metaword += 'u';
          break;

        case 'g':
          if (String(tempword).charAt(x + 1) == 'n') {
            x += 1;
            tempchar = String(tempword).charAt(x);
          }

          break;

        case 'k':
          if (String(tempword).charAt(x + 1) == 'n') {
            x += 1;
            tempchar = String(tempword).charAt(x);
          }

          break;

        case 'p':
          if (String(tempword).charAt(x + 1) == 'n') {
            x += 1;
            tempchar = String(tempword).charAt(x);
          }

          break;

        case 'w':
          if (String(tempword).charAt(x + 1) == 'r') {
            x += 1;
            tempchar = String(tempword).charAt(x);
            break;
          }

          break;
      }
    }

    if (isVowel(tempchar) === false) {
      switch (tempchar) {
        case 'b':
          if (String(tempword).charAt(x - 1) == 'm') {
            break;
          } else {
            metaword += 'b';
          }

          break;

        case 'c':
          if (x + 1 <= wordlength) {
            if (String(tempword).charAt(x + 1) == 'h' && String(tempword).charAt(x - 1) != 's') {
              if (x === 0 && x + 2 <= wordlength && isVowel(String(tempword).charAt(x + 2))) {
                metaword += 'k';
              } else {
                metaword += 'x';
              }
            } else if (String(tempword).charAt(x + 1) == 'i' && String(tempword).charAt(x + 2) == 'a') {
              metaword += 'x';
            } else if (String(tempword).charAt(x + 1) == 'i' || String(tempword).charAt(x + 1) == 'e' || String(tempword).charAt(x + 1) == 'y') {
              if (x > 0) {
                if (String(tempword).charAt(x - 1) == 's') {
                  break;
                } else {
                  metaword += 's';
                }
              } else {
                metaword += 's';
              }
            } else {
              metaword += 'k';
            }
          } else {
            metaword += 'k';
          }

          break;

        case 'd':
          if (x + 2 <= wordlength) {
            if (String(tempword).charAt(x + 1) == 'g') {
              if (String(tempword).charAt(x + 2) == 'e' || String(tempword).charAt(x + 2) == 'y' || String(tempword).charAt(x + 2) == 'i') {
                metaword += 'j';
                x += 2;
              } else {
                metaword += 't';
              }
            } else {
              metaword += 't';
            }
          } else {
            metaword += 't';
          }

          break;

        case 'f':
          metaword += 'f';
          break;

        case 'g':
          if (x < wordlength) {
            if (String(tempword).charAt(x + 1) == 'n' && x + 1 == wordlength - 1 || String(tempword).charAt(x + 1) == 'n' && String(tempword).charAt(x + 2) == 's' && x + 2 == wordlength - 1) {
              break;
            }

            if (String(tempword).charAt(x + 1) == 'n' && String(tempword).charAt(x + 2) == 'e' && String(tempword).charAt(x + 3) == 'd' && x + 3 == wordlength - 1) {
              break;
            }

            if (String(tempword).charAt(x - 1) == 'n' && String(tempword).charAt(x - 2) == 'i' && x == wordlength - 1) {
              break;
            }

            if (String(tempword).charAt(x + 1) == 'h' && x + 1 <= wordlength - 1 && String(tempword).charAt(x - 1) == 'u' && String(tempword).charAt(x - 2) == 'o') {
              metaword += 'f';
              break;
            }

            if (String(tempword).charAt(x + 1) == 'h' && x + 2 <= wordlength) {
              if (isVowel(String(tempword).charAt(x + 2)) === false) {
                break;
              } else {
                metaword += 'k';
              }
            } else if (x + 1 == wordlength) {
              if (String(tempword).charAt(x + 1) == 'n') {
                break;
              } else {
                metaword += 'k';
              }
            } else if (x + 3 == wordlength) {
              if (String(tempword).charAt(x + 1) == 'n' && String(tempword).charAt(x + 2) == 'e' && String(tempword).charAt(x + 3) == 'd') {} else {
                metaword += 'k';
              }
            } else if (x + 1 <= wordlength) {
              if (String(tempword).charAt(x + 1) == 'i' || String(tempword).charAt(x + 1) == 'e' || String(tempword).charAt(x + 1) == 'y') {
                if (String(tempword).charAt(x - 1) != 'g') {
                  metaword += 'j';
                }
              } else if (x > 0) {
                if (String(tempword).charAt(x - 1) == 'd') {
                  switch (String(tempword).charAt(x + 1)) {
                    case 'e':
                    case 'y':
                    case 'i':
                      break;

                    default:
                      metaword += 'k';
                  }
                } else {
                  metaword += 'k';
                }
              } else {
                metaword += 'k';
              }
            } else {
              metaword += 'k';
            }
          } else {
            metaword += 'k';
          }

          break;

        case 'm':
          metaword += 'm';
          break;

        case 'j':
          metaword += 'j';
          break;

        case 'n':
          metaword += 'n';
          break;

        case 'q':
          metaword += 'k';
          break;

        case 'r':
          metaword += 'r';
          break;

        case 'l':
          metaword += 'l';
          break;

        case 'v':
          metaword += 'f';
          break;

        case 'z':
          metaword += 's';
          break;

        case 'x':
          if (x === 0) {
            metaword += 's';
          } else {
            metaword += 'ks';
          }

          break;

        case 'm':
          metaword += 'm';
          break;

        case 'k':
          if (x > 0) {
            if (String(tempword).charAt(x - 1) != 'c') {
              metaword += 'k';
            }
          } else {
            metaword += 'k';
          }

          break;

        case 'p':
          if (x + 1 <= wordlength) {
            if (String(tempword).charAt(x + 1) == 'h') {
              metaword += 'f';
            } else {
              metaword += 'p';
            }
          } else {
            metaword += 'p';
          }

          break;

        case 'y':
          if (x + 1 <= wordlength) {
            if (isVowel(String(tempword).charAt(x + 1)) === true) {
              metaword += 'y';
            }
          } else {
            metaword += 'y';
          }

          break;

        case 'h':
          if (x === 0 || 'csptg'.indexOf(String(tempword).charAt(x - 1)) === -1) {
            if (isVowel(String(tempword).charAt(x + 1)) === true) {
              metaword += 'h';
            }
          }

          break;

        case 's':
          if (x + 1 <= wordlength) {
            if (String(tempword).charAt(x + 1) == 'h') {
              metaword += 'x';
            } else if (x + 2 <= wordlength) {
              if (String(tempword).charAt(x + 1) == 'i') {
                if (String(tempword).charAt(x + 2) == 'o' || String(tempword).charAt(x + 2) == 'a') {
                  metaword += 'x';
                } else {
                  metaword += 's';
                }
              } else {
                metaword += 's';
              }
            } else {
              metaword += 's';
            }
          } else {
            metaword += 's';
          }

          break;

        case 't':
          if (x + 1 <= wordlength) {
            if (String(tempword).charAt(x + 1) == 'h') {
              metaword += '0';
            } else if (x + 2 <= wordlength) {
              if (String(tempword).charAt(x + 1) == 'i') {
                if (String(tempword).charAt(x + 2) == 'o' || String(tempword).charAt(x + 2) == 'a') {
                  metaword += 'x';
                } else {
                  metaword += 't';
                }
              } else {
                metaword += 't';
              }
            } else {
              metaword += 't';
            }
          } else {
            metaword += 't';
          }

          break;

        case 'w':
          if (x + 1 <= wordlength) {
            if (isVowel(String(tempword).charAt(x + 1)) === true) {
              metaword += 'w';
            }
          }

          break;
      }
    }
  }

  phones = parseInt(phones, 10);

  if (metaword.length > phones) {
    return metaword.substr(0, phones).toUpperCase();
  }

  return metaword.toUpperCase();
}

function money_format(format, number) {
  if (typeof number !== 'number') {
    return null;
  }

  var regex = /%((=.|[+^(!-])*?)(\d*?)(#(\d+))?(\.(\d+))?([in%])/g;
  this.setlocale('LC_ALL', 0);
  var monetary = this.php_js.locales[this.php_js.localeCategories['LC_MONETARY']]['LC_MONETARY'];

  var doReplace = function doReplace(n0, flags, n2, width, n4, left, n6, right, conversion) {
    var value = '',
        repl = '';

    if (conversion === '%') {
      return '%';
    }

    var fill = flags && /=./.test(flags) ? flags.match(/=(.)/)[1] : ' ';
    var showCurrSymbol = !flags || flags.indexOf('!') === -1;
    width = parseInt(width, 10) || 0;
    var neg = number < 0;
    number = number + '';
    number = neg ? number.slice(1) : number;
    var decpos = number.indexOf('.');
    var integer = decpos !== -1 ? number.slice(0, decpos) : number;
    var fraction = decpos !== -1 ? number.slice(decpos + 1) : '';

    var _str_splice = function _str_splice(integerStr, idx, thous_sep) {
      var integerArr = integerStr.split('');
      integerArr.splice(idx, 0, thous_sep);
      return integerArr.join('');
    };

    var init_lgth = integer.length;
    left = parseInt(left, 10);
    var filler = init_lgth < left;

    if (filler) {
      var fillnum = left - init_lgth;
      integer = new Array(fillnum + 1).join(fill) + integer;
    }

    if (flags.indexOf('^') === -1) {
      var thous_sep = monetary.mon_thousands_sep;
      var mon_grouping = monetary.mon_grouping;

      if (mon_grouping[0] < integer.length) {
        for (var i = 0, idx = integer.length; i < mon_grouping.length; i++) {
          idx -= mon_grouping[i];

          if (idx < 0) {
            break;
          }

          if (filler && idx < fillnum) {
            thous_sep = fill;
          }

          integer = _str_splice(integer, idx, thous_sep);
        }
      }

      if (mon_grouping[i - 1] > 0) {
        while (idx > mon_grouping[i - 1]) {
          idx -= mon_grouping[i - 1];

          if (filler && idx < fillnum) {
            thous_sep = fill;
          }

          integer = _str_splice(integer, idx, thous_sep);
        }
      }
    }

    if (right === '0') {
      value = integer;
    } else {
      var dec_pt = monetary.mon_decimal_point;

      if (right === '' || right === undefined) {
        right = conversion === 'i' ? monetary.int_frac_digits : monetary.frac_digits;
      }

      right = parseInt(right, 10);

      if (right === 0) {
        fraction = '';
        dec_pt = '';
      } else if (right < fraction.length) {
        fraction = Math.round(parseFloat(fraction.slice(0, right) + '.' + fraction.substr(right, 1), 10)) + '';
      } else if (right > fraction.length) {
        fraction += new Array(right - fraction.length + 1).join('0');
      }

      value = integer + dec_pt + fraction;
    }

    var symbol = '';

    if (showCurrSymbol) {
      symbol = conversion === 'i' ? monetary.int_curr_symbol : monetary.currency_symbol;
    }

    var sign_posn = neg ? monetary.n_sign_posn : monetary.p_sign_posn;
    var sep_by_space = neg ? monetary.n_sep_by_space : monetary.p_sep_by_space;
    var cs_precedes = neg ? monetary.n_cs_precedes : monetary.p_cs_precedes;

    if (flags.indexOf('(') !== -1) {
      repl = (cs_precedes ? symbol + (sep_by_space === 1 ? ' ' : '') : '') + value + (!cs_precedes ? (sep_by_space === 1 ? ' ' : '') + symbol : '');

      if (neg) {
        repl = '(' + repl + ')';
      } else {
        repl = ' ' + repl + ' ';
      }
    } else {
      var pos_sign = monetary.positive_sign;
      var neg_sign = monetary.negative_sign;
      var sign = neg ? neg_sign : pos_sign;
      var otherSign = neg ? pos_sign : neg_sign;
      var signPadding = '';

      if (sign_posn) {
        signPadding = new Array(otherSign.length - sign.length + 1).join(' ');
      }

      var valueAndCS = '';

      switch (sign_posn) {
        case 0:
          valueAndCS = cs_precedes ? symbol + (sep_by_space === 1 ? ' ' : '') + value : value + (sep_by_space === 1 ? ' ' : '') + symbol;
          repl = '(' + valueAndCS + ')';
          break;

        case 1:
          valueAndCS = cs_precedes ? symbol + (sep_by_space === 1 ? ' ' : '') + value : value + (sep_by_space === 1 ? ' ' : '') + symbol;
          repl = signPadding + sign + (sep_by_space === 2 ? ' ' : '') + valueAndCS;
          break;

        case 2:
          valueAndCS = cs_precedes ? symbol + (sep_by_space === 1 ? ' ' : '') + value : value + (sep_by_space === 1 ? ' ' : '') + symbol;
          repl = valueAndCS + (sep_by_space === 2 ? ' ' : '') + sign + signPadding;
          break;

        case 3:
          repl = cs_precedes ? signPadding + sign + (sep_by_space === 2 ? ' ' : '') + symbol + (sep_by_space === 1 ? ' ' : '') + value : value + (sep_by_space === 1 ? ' ' : '') + sign + signPadding + (sep_by_space === 2 ? ' ' : '') + symbol;
          break;

        case 4:
          repl = cs_precedes ? symbol + (sep_by_space === 2 ? ' ' : '') + signPadding + sign + (sep_by_space === 1 ? ' ' : '') + value : value + (sep_by_space === 1 ? ' ' : '') + symbol + (sep_by_space === 2 ? ' ' : '') + sign + signPadding;
          break;
      }
    }

    var padding = width - repl.length;

    if (padding > 0) {
      padding = new Array(padding + 1).join(' ');

      if (flags.indexOf('-') !== -1) {
        repl += padding;
      } else {
        repl = padding + repl;
      }
    }

    return repl;
  };

  return format.replace(regex, doReplace);
}

function nl2br(str, is_xhtml) {
  var breakTag = is_xhtml || typeof is_xhtml === 'undefined' ? '<br />' : '<br>';
  return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}

function nl_langinfo(item) {
  this.setlocale('LC_ALL', 0);
  var loc = this.php_js.locales[this.php_js.localeCategories.LC_TIME];

  if (item.indexOf('ABDAY_') === 0) {
    return loc.LC_TIME.a[parseInt(item.replace(/^ABDAY_/, ''), 10) - 1];
  } else if (item.indexOf('DAY_') === 0) {
    return loc.LC_TIME.A[parseInt(item.replace(/^DAY_/, ''), 10) - 1];
  } else if (item.indexOf('ABMON_') === 0) {
    return loc.LC_TIME.b[parseInt(item.replace(/^ABMON_/, ''), 10) - 1];
  } else if (item.indexOf('MON_') === 0) {
    return loc.LC_TIME.B[parseInt(item.replace(/^MON_/, ''), 10) - 1];
  } else {
    switch (item) {
      case 'AM_STR':
        return loc.LC_TIME.p[0];

      case 'PM_STR':
        return loc.LC_TIME.p[1];

      case 'D_T_FMT':
        return loc.LC_TIME.c;

      case 'D_FMT':
        return loc.LC_TIME.x;

      case 'T_FMT':
        return loc.LC_TIME.X;

      case 'T_FMT_AMPM':
        return loc.LC_TIME.r;

      case 'ERA':
      case 'ERA_YEAR':
      case 'ERA_D_T_FMT':
      case 'ERA_D_FMT':
      case 'ERA_T_FMT':
        return loc.LC_TIME[item];
    }

    loc = this.php_js.locales[this.php_js.localeCategories.LC_MONETARY];

    if (item === 'CRNCYSTR') {
      item = 'CURRENCY_SYMBOL';
    }

    switch (item) {
      case 'INT_CURR_SYMBOL':
      case 'CURRENCY_SYMBOL':
      case 'MON_DECIMAL_POINT':
      case 'MON_THOUSANDS_SEP':
      case 'POSITIVE_SIGN':
      case 'NEGATIVE_SIGN':
      case 'INT_FRAC_DIGITS':
      case 'FRAC_DIGITS':
      case 'P_CS_PRECEDES':
      case 'P_SEP_BY_SPACE':
      case 'N_CS_PRECEDES':
      case 'N_SEP_BY_SPACE':
      case 'P_SIGN_POSN':
      case 'N_SIGN_POSN':
        return loc.LC_MONETARY[item.toLowerCase()];

      case 'MON_GROUPING':
        return loc.LC_MONETARY[item.toLowerCase()];
    }

    loc = this.php_js.locales[this.php_js.localeCategories.LC_NUMERIC];

    switch (item) {
      case 'RADIXCHAR':
      case 'DECIMAL_POINT':
        return loc.LC_NUMERIC[item.toLowerCase()];

      case 'THOUSEP':
      case 'THOUSANDS_SEP':
        return loc.LC_NUMERIC[item.toLowerCase()];

      case 'GROUPING':
        return loc.LC_NUMERIC[item.toLowerCase()];
    }

    loc = this.php_js.locales[this.php_js.localeCategories.LC_MESSAGES];

    switch (item) {
      case 'YESEXPR':
      case 'NOEXPR':
      case 'YESSTR':
      case 'NOSTR':
        return loc.LC_MESSAGES[item];
    }

    loc = this.php_js.locales[this.php_js.localeCategories.LC_CTYPE];

    if (item === 'CODESET') {
      return loc.LC_CTYPE[item];
    }

    return false;
  }
}

function number_format(number, decimals, dec_point, thousands_sep) {
  number = (number + '').replace(/[^0-9+\-Ee.]/g, '');

  var n = !isFinite(+number) ? 0 : +number,
      prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
      sep = typeof thousands_sep === 'undefined' ? ',' : thousands_sep,
      dec = typeof dec_point === 'undefined' ? '.' : dec_point,
      s = '',
      toFixedFix = function toFixedFix(n, prec) {
    var k = Math.pow(10, prec);
    return '' + Math.round(n * k) / k;
  };

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

function ord(string) {
  var str = string + '',
      code = str.charCodeAt(0);

  if (0xD800 <= code && code <= 0xDBFF) {
    var hi = code;

    if (str.length === 1) {
      return code;
    }

    var low = str.charCodeAt(1);
    return (hi - 0xD800) * 0x400 + (low - 0xDC00) + 0x10000;
  }

  if (0xDC00 <= code && code <= 0xDFFF) {
    return code;
  }

  return code;
}

function parse_str(str, array) {
  var glue1 = '=',
      glue2 = '&',
      array2 = String(str).replace(/^&?([\s\S]*?)&?$/, '$1').split(glue2),
      i,
      j,
      chr,
      tmp,
      key,
      value,
      bracket,
      keys,
      evalStr,
      that = this,
      fixStr = function fixStr(str) {
    return that.urldecode(str).replace(/([\\"'])/g, '\\$1').replace(/\n/g, '\\n').replace(/\r/g, '\\r');
  };

  if (!array) {
    array = this.window;
  }

  for (i = 0; i < array2.length; i++) {
    tmp = array2[i].split(glue1);

    if (tmp.length < 2) {
      tmp = [tmp, ''];
    }

    key = fixStr(tmp[0]);
    value = fixStr(tmp[1]);

    while (key.charAt(0) === ' ') {
      key = key.substr(1);
    }

    if (key.indexOf('\0') !== -1) {
      key = key.substr(0, key.indexOf('\0'));
    }

    if (key && key.charAt(0) !== '[') {
      keys = [];
      bracket = 0;

      for (j = 0; j < key.length; j++) {
        if (key.charAt(j) === '[' && !bracket) {
          bracket = j + 1;
        } else if (key.charAt(j) === ']') {
          if (bracket) {
            if (!keys.length) {
              keys.push(key.substr(0, bracket - 1));
            }

            keys.push(key.substr(bracket, j - bracket));
            bracket = 0;

            if (key.charAt(j + 1) !== '[') {
              break;
            }
          }
        }
      }

      if (!keys.length) {
        keys = [key];
      }

      for (j = 0; j < keys[0].length; j++) {
        chr = keys[0].charAt(j);

        if (chr === ' ' || chr === '.' || chr === '[') {
          keys[0] = keys[0].substr(0, j) + '_' + keys[0].substr(j + 1);
        }

        if (chr === '[') {
          break;
        }
      }

      evalStr = 'array';

      for (j = 0; j < keys.length; j++) {
        key = keys[j];

        if (key !== '' && key !== ' ' || j === 0) {
          key = "'" + key + "'";
        } else {
          key = eval(evalStr + '.push([]);') - 1;
        }

        evalStr += '[' + key + ']';

        if (j !== keys.length - 1 && eval('typeof ' + evalStr) === 'undefined') {
          eval(evalStr + ' = [];');
        }
      }

      evalStr += " = '" + value + "';\n";
      eval(evalStr);
    }
  }
}

function printf() {
  var body,
      elmt,
      d = this.window.document;
  var ret = '';
  var HTMLNS = 'http://www.w3.org/1999/xhtml';
  body = d.getElementsByTagNameNS ? d.getElementsByTagNameNS(HTMLNS, 'body')[0] ? d.getElementsByTagNameNS(HTMLNS, 'body')[0] : d.documentElement.lastChild : d.getElementsByTagName('body')[0];

  if (!body) {
    return false;
  }

  ret = this.sprintf.apply(this, arguments);
  elmt = d.createTextNode(ret);
  body.appendChild(elmt);
  return ret.length;
}

function quoted_printable_decode(str) {
  var RFC2045Decode1 = /=\r\n/gm,
      RFC2045Decode2IN = /=([0-9A-F]{2})/gim,
      RFC2045Decode2OUT = function RFC2045Decode2OUT(sMatch, sHex) {
    return String.fromCharCode(parseInt(sHex, 16));
  };

  return str.replace(RFC2045Decode1, '').replace(RFC2045Decode2IN, RFC2045Decode2OUT);
}

function quoted_printable_encode(str) {
  var hexChars = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F'],
      RFC2045Encode1IN = / \r\n|\r\n|[^!-<>-~ ]/gm,
      RFC2045Encode1OUT = function RFC2045Encode1OUT(sMatch) {
    if (sMatch.length > 1) {
      return sMatch.replace(' ', '=20');
    }

    var chr = sMatch.charCodeAt(0);
    return '=' + hexChars[chr >>> 4 & 15] + hexChars[chr & 15];
  },
      RFC2045Encode2IN = /.{1,72}(?!\r\n)[^=]{0,3}/g,
      RFC2045Encode2OUT = function RFC2045Encode2OUT(sMatch) {
    if (sMatch.substr(sMatch.length - 2) === '\r\n') {
      return sMatch;
    }

    return sMatch + '=\r\n';
  };

  str = str.replace(RFC2045Encode1IN, RFC2045Encode1OUT).replace(RFC2045Encode2IN, RFC2045Encode2OUT);
  return str.substr(0, str.length - 3);
}

function quotemeta(str) {
  return (str + '').replace(/([\.\\\+\*\?\[\^\]\$\(\)])/g, '\\$1');
}

function rtrim(str, charlist) {
  charlist = !charlist ? " \\s\xA0" : (charlist + '').replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, '\\$1');
  var re = new RegExp('[' + charlist + ']+$', 'g');
  return (str + '').replace(re, '');
}

function setlocale(category, locale) {
  var categ = '',
      cats = [],
      i = 0,
      d = this.window.document;

  var _copy = function _copy(orig) {
    if (orig instanceof RegExp) {
      return new RegExp(orig);
    } else if (orig instanceof Date) {
      return new Date(orig);
    }

    var newObj = {};

    for (var i in orig) {
      if (_typeof(orig[i]) === 'object') {
        newObj[i] = _copy(orig[i]);
      } else {
        newObj[i] = orig[i];
      }
    }

    return newObj;
  };

  var _nplurals1 = function _nplurals1(n) {
    return 0;
  };

  var _nplurals2a = function _nplurals2a(n) {
    return n !== 1 ? 1 : 0;
  };

  var _nplurals2b = function _nplurals2b(n) {
    return n > 1 ? 1 : 0;
  };

  var _nplurals2c = function _nplurals2c(n) {
    return n % 10 === 1 && n % 100 !== 11 ? 0 : 1;
  };

  var _nplurals3a = function _nplurals3a(n) {
    return n % 10 === 1 && n % 100 !== 11 ? 0 : n !== 0 ? 1 : 2;
  };

  var _nplurals3b = function _nplurals3b(n) {
    return n === 1 ? 0 : n === 2 ? 1 : 2;
  };

  var _nplurals3c = function _nplurals3c(n) {
    return n === 1 ? 0 : n === 0 || n % 100 > 0 && n % 100 < 20 ? 1 : 2;
  };

  var _nplurals3d = function _nplurals3d(n) {
    return n % 10 === 1 && n % 100 !== 11 ? 0 : n % 10 >= 2 && (n % 100 < 10 || n % 100 >= 20) ? 1 : 2;
  };

  var _nplurals3e = function _nplurals3e(n) {
    return n % 10 === 1 && n % 100 !== 11 ? 0 : n % 10 >= 2 && n % 10 <= 4 && (n % 100 < 10 || n % 100 >= 20) ? 1 : 2;
  };

  var _nplurals3f = function _nplurals3f(n) {
    return n === 1 ? 0 : n >= 2 && n <= 4 ? 1 : 2;
  };

  var _nplurals3g = function _nplurals3g(n) {
    return n === 1 ? 0 : n % 10 >= 2 && n % 10 <= 4 && (n % 100 < 10 || n % 100 >= 20) ? 1 : 2;
  };

  var _nplurals3h = function _nplurals3h(n) {
    return n % 10 === 1 ? 0 : n % 10 === 2 ? 1 : 2;
  };

  var _nplurals4a = function _nplurals4a(n) {
    return n % 100 === 1 ? 0 : n % 100 === 2 ? 1 : n % 100 === 3 || n % 100 === 4 ? 2 : 3;
  };

  var _nplurals4b = function _nplurals4b(n) {
    return n === 1 ? 0 : n === 0 || n % 100 && n % 100 <= 10 ? 1 : n % 100 >= 11 && n % 100 <= 19 ? 2 : 3;
  };

  var _nplurals5 = function _nplurals5(n) {
    return n === 1 ? 0 : n === 2 ? 1 : n >= 3 && n <= 6 ? 2 : n >= 7 && n <= 10 ? 3 : 4;
  };

  var _nplurals6 = function _nplurals6(n) {
    return n === 0 ? 5 : n === 1 ? 0 : n === 2 ? 1 : n % 100 >= 3 && n % 100 <= 10 ? 2 : n % 100 >= 11 && n % 100 <= 99 ? 3 : 4;
  };

  this.php_js = this.php_js || {};
  var phpjs = this.php_js;

  if (!phpjs.locales) {
    phpjs.locales = {};
    phpjs.locales.en = {
      'LC_COLLATE': function LC_COLLATE(str1, str2) {
        return str1 == str2 ? 0 : str1 > str2 ? 1 : -1;
      },
      'LC_CTYPE': {
        an: /^[A-Za-z\d]+$/g,
        al: /^[A-Za-z]+$/g,
        ct: /^[\u0000-\u001F\u007F]+$/g,
        dg: /^[\d]+$/g,
        gr: /^[\u0021-\u007E]+$/g,
        lw: /^[a-z]+$/g,
        pr: /^[\u0020-\u007E]+$/g,
        pu: /^[\u0021-\u002F\u003A-\u0040\u005B-\u0060\u007B-\u007E]+$/g,
        sp: /^[\f\n\r\t\v ]+$/g,
        up: /^[A-Z]+$/g,
        xd: /^[A-Fa-f\d]+$/g,
        CODESET: 'UTF-8',
        lower: 'abcdefghijklmnopqrstuvwxyz',
        upper: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
      },
      'LC_TIME': {
        a: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        A: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
        b: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        B: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        c: '%a %d %b %Y %r %Z',
        p: ['AM', 'PM'],
        P: ['am', 'pm'],
        r: '%I:%M:%S %p',
        x: '%m/%d/%Y',
        X: '%r',
        alt_digits: '',
        ERA: '',
        ERA_YEAR: '',
        ERA_D_T_FMT: '',
        ERA_D_FMT: '',
        ERA_T_FMT: ''
      },
      'LC_MONETARY': {
        int_curr_symbol: 'USD',
        currency_symbol: '$',
        mon_decimal_point: '.',
        mon_thousands_sep: ',',
        mon_grouping: [3],
        positive_sign: '',
        negative_sign: '-',
        int_frac_digits: 2,
        frac_digits: 2,
        p_cs_precedes: 1,
        p_sep_by_space: 0,
        n_cs_precedes: 1,
        n_sep_by_space: 0,
        p_sign_posn: 3,
        n_sign_posn: 0
      },
      'LC_NUMERIC': {
        decimal_point: '.',
        thousands_sep: ',',
        grouping: [3]
      },
      'LC_MESSAGES': {
        YESEXPR: '^[yY].*',
        NOEXPR: '^[nN].*',
        YESSTR: '',
        NOSTR: ''
      },
      nplurals: _nplurals2a
    };
    phpjs.locales.en_US = _copy(phpjs.locales.en);
    phpjs.locales.en_US.LC_TIME.c = '%a %d %b %Y %r %Z';
    phpjs.locales.en_US.LC_TIME.x = '%D';
    phpjs.locales.en_US.LC_TIME.X = '%r';
    phpjs.locales.en_US.LC_MONETARY.int_curr_symbol = 'USD ';
    phpjs.locales.en_US.LC_MONETARY.p_sign_posn = 1;
    phpjs.locales.en_US.LC_MONETARY.n_sign_posn = 1;
    phpjs.locales.en_US.LC_MONETARY.mon_grouping = [3, 3];
    phpjs.locales.en_US.LC_NUMERIC.thousands_sep = '';
    phpjs.locales.en_US.LC_NUMERIC.grouping = [];
    phpjs.locales.en_GB = _copy(phpjs.locales.en);
    phpjs.locales.en_GB.LC_TIME.r = '%l:%M:%S %P %Z';
    phpjs.locales.en_AU = _copy(phpjs.locales.en_GB);
    phpjs.locales.C = _copy(phpjs.locales.en);
    phpjs.locales.C.LC_CTYPE.CODESET = 'ANSI_X3.4-1968';
    phpjs.locales.C.LC_MONETARY = {
      int_curr_symbol: '',
      currency_symbol: '',
      mon_decimal_point: '',
      mon_thousands_sep: '',
      mon_grouping: [],
      p_cs_precedes: 127,
      p_sep_by_space: 127,
      n_cs_precedes: 127,
      n_sep_by_space: 127,
      p_sign_posn: 127,
      n_sign_posn: 127,
      positive_sign: '',
      negative_sign: '',
      int_frac_digits: 127,
      frac_digits: 127
    };
    phpjs.locales.C.LC_NUMERIC = {
      decimal_point: '.',
      thousands_sep: '',
      grouping: []
    };
    phpjs.locales.C.LC_TIME.c = '%a %b %e %H:%M:%S %Y';
    phpjs.locales.C.LC_TIME.x = '%m/%d/%y';
    phpjs.locales.C.LC_TIME.X = '%H:%M:%S';
    phpjs.locales.C.LC_MESSAGES.YESEXPR = '^[yY]';
    phpjs.locales.C.LC_MESSAGES.NOEXPR = '^[nN]';
    phpjs.locales.fr = _copy(phpjs.locales.en);
    phpjs.locales.fr.nplurals = _nplurals2b;
    phpjs.locales.fr.LC_TIME.a = ['dim', 'lun', 'mar', 'mer', 'jeu', 'ven', 'sam'];
    phpjs.locales.fr.LC_TIME.A = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
    phpjs.locales.fr.LC_TIME.b = ['jan', "f\xE9v", 'mar', 'avr', 'mai', 'jun', 'jui', "ao\xFB", 'sep', 'oct', 'nov', "d\xE9c"];
    phpjs.locales.fr.LC_TIME.B = ['janvier', "f\xE9vrier", 'mars', 'avril', 'mai', 'juin', 'juillet', "ao\xFBt", 'septembre', 'octobre', 'novembre', "d\xE9cembre"];
    phpjs.locales.fr.LC_TIME.c = '%a %d %b %Y %T %Z';
    phpjs.locales.fr.LC_TIME.p = ['', ''];
    phpjs.locales.fr.LC_TIME.P = ['', ''];
    phpjs.locales.fr.LC_TIME.x = '%d.%m.%Y';
    phpjs.locales.fr.LC_TIME.X = '%T';
    phpjs.locales.fr_CA = _copy(phpjs.locales.fr);
    phpjs.locales.fr_CA.LC_TIME.x = '%Y-%m-%d';
  }

  if (!phpjs.locale) {
    phpjs.locale = 'en_US';
    var NS_XHTML = 'http://www.w3.org/1999/xhtml';
    var NS_XML = 'http://www.w3.org/XML/1998/namespace';

    if (d.getElementsByTagNameNS && d.getElementsByTagNameNS(NS_XHTML, 'html')[0]) {
      if (d.getElementsByTagNameNS(NS_XHTML, 'html')[0].getAttributeNS && d.getElementsByTagNameNS(NS_XHTML, 'html')[0].getAttributeNS(NS_XML, 'lang')) {
        phpjs.locale = d.getElementsByTagName(NS_XHTML, 'html')[0].getAttributeNS(NS_XML, 'lang');
      } else if (d.getElementsByTagNameNS(NS_XHTML, 'html')[0].lang) {
        phpjs.locale = d.getElementsByTagNameNS(NS_XHTML, 'html')[0].lang;
      }
    } else if (d.getElementsByTagName('html')[0] && d.getElementsByTagName('html')[0].lang) {
      phpjs.locale = d.getElementsByTagName('html')[0].lang;
    }
  }

  phpjs.locale = phpjs.locale.replace('-', '_');

  if (!(phpjs.locale in phpjs.locales)) {
    if (phpjs.locale.replace(/_[a-zA-Z]+$/, '') in phpjs.locales) {
      phpjs.locale = phpjs.locale.replace(/_[a-zA-Z]+$/, '');
    }
  }

  if (!phpjs.localeCategories) {
    phpjs.localeCategories = {
      'LC_COLLATE': phpjs.locale,
      'LC_CTYPE': phpjs.locale,
      'LC_MONETARY': phpjs.locale,
      'LC_NUMERIC': phpjs.locale,
      'LC_TIME': phpjs.locale,
      'LC_MESSAGES': phpjs.locale
    };
  }

  if (locale === null || locale === '') {
    locale = this.getenv(category) || this.getenv('LANG');
  } else if (locale instanceof Array) {
    for (i = 0; i < locale.length; i++) {
      if (!(locale[i] in this.php_js.locales)) {
        if (i === locale.length - 1) {
          return false;
        }

        continue;
      }

      locale = locale[i];
      break;
    }
  }

  if (locale === '0' || locale === 0) {
    if (category === 'LC_ALL') {
      for (categ in this.php_js.localeCategories) {
        cats.push(categ + '=' + this.php_js.localeCategories[categ]);
      }

      return cats.join(';');
    }

    return this.php_js.localeCategories[category];
  }

  if (!(locale in this.php_js.locales)) {
    return false;
  }

  if (category === 'LC_ALL') {
    for (categ in this.php_js.localeCategories) {
      this.php_js.localeCategories[categ] = locale;
    }
  } else {
    this.php_js.localeCategories[category] = locale;
  }

  return locale;
}

function sha1(str) {
  var rotate_left = function rotate_left(n, s) {
    var t4 = n << s | n >>> 32 - s;
    return t4;
  };

  var cvt_hex = function cvt_hex(val) {
    var str = "";
    var i;
    var v;

    for (i = 7; i >= 0; i--) {
      v = val >>> i * 4 & 0x0f;
      str += v.toString(16);
    }

    return str;
  };

  var blockstart;
  var i, j;
  var W = new Array(80);
  var H0 = 0x67452301;
  var H1 = 0xEFCDAB89;
  var H2 = 0x98BADCFE;
  var H3 = 0x10325476;
  var H4 = 0xC3D2E1F0;
  var A, B, C, D, E;
  var temp;
  str = this.utf8_encode(str);
  var str_len = str.length;
  var word_array = [];

  for (i = 0; i < str_len - 3; i += 4) {
    j = str.charCodeAt(i) << 24 | str.charCodeAt(i + 1) << 16 | str.charCodeAt(i + 2) << 8 | str.charCodeAt(i + 3);
    word_array.push(j);
  }

  switch (str_len % 4) {
    case 0:
      i = 0x080000000;
      break;

    case 1:
      i = str.charCodeAt(str_len - 1) << 24 | 0x0800000;
      break;

    case 2:
      i = str.charCodeAt(str_len - 2) << 24 | str.charCodeAt(str_len - 1) << 16 | 0x08000;
      break;

    case 3:
      i = str.charCodeAt(str_len - 3) << 24 | str.charCodeAt(str_len - 2) << 16 | str.charCodeAt(str_len - 1) << 8 | 0x80;
      break;
  }

  word_array.push(i);

  while (word_array.length % 16 != 14) {
    word_array.push(0);
  }

  word_array.push(str_len >>> 29);
  word_array.push(str_len << 3 & 0x0ffffffff);

  for (blockstart = 0; blockstart < word_array.length; blockstart += 16) {
    for (i = 0; i < 16; i++) {
      W[i] = word_array[blockstart + i];
    }

    for (i = 16; i <= 79; i++) {
      W[i] = rotate_left(W[i - 3] ^ W[i - 8] ^ W[i - 14] ^ W[i - 16], 1);
    }

    A = H0;
    B = H1;
    C = H2;
    D = H3;
    E = H4;

    for (i = 0; i <= 19; i++) {
      temp = rotate_left(A, 5) + (B & C | ~B & D) + E + W[i] + 0x5A827999 & 0x0ffffffff;
      E = D;
      D = C;
      C = rotate_left(B, 30);
      B = A;
      A = temp;
    }

    for (i = 20; i <= 39; i++) {
      temp = rotate_left(A, 5) + (B ^ C ^ D) + E + W[i] + 0x6ED9EBA1 & 0x0ffffffff;
      E = D;
      D = C;
      C = rotate_left(B, 30);
      B = A;
      A = temp;
    }

    for (i = 40; i <= 59; i++) {
      temp = rotate_left(A, 5) + (B & C | B & D | C & D) + E + W[i] + 0x8F1BBCDC & 0x0ffffffff;
      E = D;
      D = C;
      C = rotate_left(B, 30);
      B = A;
      A = temp;
    }

    for (i = 60; i <= 79; i++) {
      temp = rotate_left(A, 5) + (B ^ C ^ D) + E + W[i] + 0xCA62C1D6 & 0x0ffffffff;
      E = D;
      D = C;
      C = rotate_left(B, 30);
      B = A;
      A = temp;
    }

    H0 = H0 + A & 0x0ffffffff;
    H1 = H1 + B & 0x0ffffffff;
    H2 = H2 + C & 0x0ffffffff;
    H3 = H3 + D & 0x0ffffffff;
    H4 = H4 + E & 0x0ffffffff;
  }

  temp = cvt_hex(H0) + cvt_hex(H1) + cvt_hex(H2) + cvt_hex(H3) + cvt_hex(H4);
  return temp.toLowerCase();
}

function sha1_file(str_filename) {
  var buf = this.file_get_contents(str_filename);
  return this.sha1(buf);
}

function similar_text(first, second) {
  if (first === null || second === null || typeof first === 'undefined' || typeof second === 'undefined') {
    return 0;
  }

  first += '';
  second += '';
  var pos1 = 0,
      pos2 = 0,
      max = 0,
      firstLength = first.length,
      secondLength = second.length,
      p,
      q,
      l,
      sum;
  max = 0;

  for (p = 0; p < firstLength; p++) {
    for (q = 0; q < secondLength; q++) {
      for (l = 0; p + l < firstLength && q + l < secondLength && first.charAt(p + l) === second.charAt(q + l); l++) {
        ;
      }

      if (l > max) {
        max = l;
        pos1 = p;
        pos2 = q;
      }
    }
  }

  sum = max;

  if (sum) {
    if (pos1 && pos2) {
      sum += this.similar_text(first.substr(0, pos2), second.substr(0, pos2));
    }

    if (pos1 + max < firstLength && pos2 + max < secondLength) {
      sum += this.similar_text(first.substr(pos1 + max, firstLength - pos1 - max), second.substr(pos2 + max, secondLength - pos2 - max));
    }
  }

  return sum;
}

function soundex(str) {
  str = (str + '').toUpperCase();

  if (!str) {
    return '';
  }

  var sdx = [0, 0, 0, 0],
      m = {
    B: 1,
    F: 1,
    P: 1,
    V: 1,
    C: 2,
    G: 2,
    J: 2,
    K: 2,
    Q: 2,
    S: 2,
    X: 2,
    Z: 2,
    D: 3,
    T: 3,
    L: 4,
    M: 5,
    N: 5,
    R: 6
  },
      i = 0,
      j,
      s = 0,
      c,
      p;

  while ((c = str.charAt(i++)) && s < 4) {
    if (j = m[c]) {
      if (j !== p) {
        sdx[s++] = p = j;
      }
    } else {
      s += i === 1;
      p = 0;
    }
  }

  sdx[0] = str.charAt(0);
  return sdx.join('');
}

function split(delimiter, string) {
  return this.explode(delimiter, string);
}

function sprintf() {
  var regex = /%%|%(\d+\$)?([-+\'#0 ]*)(\*\d+\$|\*|\d+)?(\.(\*\d+\$|\*|\d+))?([scboxXuidfegEG])/g;
  var a = arguments,
      i = 0,
      format = a[i++];

  var pad = function pad(str, len, chr, leftJustify) {
    if (!chr) {
      chr = ' ';
    }

    var padding = str.length >= len ? '' : Array(1 + len - str.length >>> 0).join(chr);
    return leftJustify ? str + padding : padding + str;
  };

  var justify = function justify(value, prefix, leftJustify, minWidth, zeroPad, customPadChar) {
    var diff = minWidth - value.length;

    if (diff > 0) {
      if (leftJustify || !zeroPad) {
        value = pad(value, minWidth, customPadChar, leftJustify);
      } else {
        value = value.slice(0, prefix.length) + pad('', diff, '0', true) + value.slice(prefix.length);
      }
    }

    return value;
  };

  var formatBaseX = function formatBaseX(value, base, prefix, leftJustify, minWidth, precision, zeroPad) {
    var number = value >>> 0;
    prefix = prefix && number && {
      '2': '0b',
      '8': '0',
      '16': '0x'
    }[base] || '';
    value = prefix + pad(number.toString(base), precision || 0, '0', false);
    return justify(value, prefix, leftJustify, minWidth, zeroPad);
  };

  var formatString = function formatString(value, leftJustify, minWidth, precision, zeroPad, customPadChar) {
    if (precision != null) {
      value = value.slice(0, precision);
    }

    return justify(value, '', leftJustify, minWidth, zeroPad, customPadChar);
  };

  var doFormat = function doFormat(substring, valueIndex, flags, minWidth, _, precision, type) {
    var number;
    var prefix;
    var method;
    var textTransform;
    var value;

    if (substring == '%%') {
      return '%';
    }

    var leftJustify = false,
        positivePrefix = '',
        zeroPad = false,
        prefixBaseX = false,
        customPadChar = ' ';
    var flagsl = flags.length;

    for (var j = 0; flags && j < flagsl; j++) {
      switch (flags.charAt(j)) {
        case ' ':
          positivePrefix = ' ';
          break;

        case '+':
          positivePrefix = '+';
          break;

        case '-':
          leftJustify = true;
          break;

        case "'":
          customPadChar = flags.charAt(j + 1);
          break;

        case '0':
          zeroPad = true;
          break;

        case '#':
          prefixBaseX = true;
          break;
      }
    }

    if (!minWidth) {
      minWidth = 0;
    } else if (minWidth == '*') {
      minWidth = +a[i++];
    } else if (minWidth.charAt(0) == '*') {
      minWidth = +a[minWidth.slice(1, -1)];
    } else {
      minWidth = +minWidth;
    }

    if (minWidth < 0) {
      minWidth = -minWidth;
      leftJustify = true;
    }

    if (!isFinite(minWidth)) {
      throw new Error('sprintf: (minimum-)width must be finite');
    }

    if (!precision) {
      precision = 'fFeE'.indexOf(type) > -1 ? 6 : type == 'd' ? 0 : undefined;
    } else if (precision == '*') {
      precision = +a[i++];
    } else if (precision.charAt(0) == '*') {
      precision = +a[precision.slice(1, -1)];
    } else {
      precision = +precision;
    }

    value = valueIndex ? a[valueIndex.slice(0, -1)] : a[i++];

    switch (type) {
      case 's':
        return formatString(String(value), leftJustify, minWidth, precision, zeroPad, customPadChar);

      case 'c':
        return formatString(String.fromCharCode(+value), leftJustify, minWidth, precision, zeroPad);

      case 'b':
        return formatBaseX(value, 2, prefixBaseX, leftJustify, minWidth, precision, zeroPad);

      case 'o':
        return formatBaseX(value, 8, prefixBaseX, leftJustify, minWidth, precision, zeroPad);

      case 'x':
        return formatBaseX(value, 16, prefixBaseX, leftJustify, minWidth, precision, zeroPad);

      case 'X':
        return formatBaseX(value, 16, prefixBaseX, leftJustify, minWidth, precision, zeroPad).toUpperCase();

      case 'u':
        return formatBaseX(value, 10, prefixBaseX, leftJustify, minWidth, precision, zeroPad);

      case 'i':
      case 'd':
        number = +value | 0;
        prefix = number < 0 ? '-' : positivePrefix;
        value = prefix + pad(String(Math.abs(number)), precision, '0', false);
        return justify(value, prefix, leftJustify, minWidth, zeroPad);

      case 'e':
      case 'E':
      case 'f':
      case 'F':
      case 'g':
      case 'G':
        number = +value;
        prefix = number < 0 ? '-' : positivePrefix;
        method = ['toExponential', 'toFixed', 'toPrecision']['efg'.indexOf(type.toLowerCase())];
        textTransform = ['toString', 'toUpperCase']['eEfFgG'.indexOf(type) % 2];
        value = prefix + Math.abs(number)[method](precision);
        return justify(value, prefix, leftJustify, minWidth, zeroPad)[textTransform]();

      default:
        return substring;
    }
  };

  return format.replace(regex, doFormat);
}

function sscanf(str, format) {
  var retArr = [],
      num = 0,
      _NWS = /\S/,
      args = arguments,
      that = this,
      digit;

  var _setExtraConversionSpecs = function _setExtraConversionSpecs(offset) {
    var matches = format.slice(offset).match(/%[cdeEufgosxX]/g);

    if (matches) {
      var lgth = matches.length;

      while (lgth--) {
        retArr.push(null);
      }
    }

    return _finish();
  };

  var _finish = function _finish() {
    if (args.length === 2) {
      return retArr;
    }

    for (var i = 0; i < retArr.length; ++i) {
      that.window[args[i + 2]] = retArr[i];
    }

    return i;
  };

  var _addNext = function _addNext(j, regex, cb) {
    if (assign) {
      var remaining = str.slice(j);
      var check = width ? remaining.substr(0, width) : remaining;
      var match = regex.exec(check);
      var testNull = retArr[digit !== undefined ? digit : retArr.length] = match ? cb ? cb.apply(null, match) : match[0] : null;

      if (testNull === null) {
        throw 'No match in string';
      }

      return j + match[0].length;
    }

    return j;
  };

  if (arguments.length < 2) {
    throw 'Not enough arguments passed to sscanf';
  }

  for (var i = 0, j = 0; i < format.length; i++) {
    var width = 0,
        assign = true;

    if (format.charAt(i) === '%') {
      if (format.charAt(i + 1) === '%') {
        if (str.charAt(j) === '%') {
          ++i, ++j;
          continue;
        }

        return _setExtraConversionSpecs(i + 2);
      }

      var prePattern = new RegExp('^(?:(\\d+)\\$)?(\\*)?(\\d*)([hlL]?)', 'g');
      var preConvs = prePattern.exec(format.slice(i + 1));
      var tmpDigit = digit;

      if (tmpDigit && preConvs[1] === undefined) {
        throw 'All groups in sscanf() must be expressed as numeric if any have already been used';
      }

      digit = preConvs[1] ? parseInt(preConvs[1], 10) - 1 : undefined;
      assign = !preConvs[2];
      width = parseInt(preConvs[3], 10);
      var sizeCode = preConvs[4];
      i += prePattern.lastIndex;

      if (sizeCode) {
        switch (sizeCode) {
          case 'h':
          case 'l':
          case 'L':
            break;

          default:
            throw 'Unexpected size specifier in sscanf()!';
            break;
        }
      }

      try {
        switch (format.charAt(i + 1)) {
          case 'F':
            break;

          case 'g':
            break;

          case 'G':
            break;

          case 'b':
            break;

          case 'i':
            j = _addNext(j, /([+-])?(?:(?:0x([\da-fA-F]+))|(?:0([0-7]+))|(\d+))/, function (num, sign, hex, oct, dec) {
              return hex ? parseInt(num, 16) : oct ? parseInt(num, 8) : parseInt(num, 10);
            });
            break;

          case 'n':
            retArr[digit !== undefined ? digit : retArr.length - 1] = j;
            break;

          case 'c':
            j = _addNext(j, new RegExp('.{1,' + (width || 1) + '}'));
            break;

          case 'D':
          case 'd':
            j = _addNext(j, /([+-])?(?:0*)(\d+)/, function (num, sign, dec) {
              var decInt = parseInt((sign || '') + dec, 10);

              if (decInt < 0) {
                return decInt < -2147483648 ? -2147483648 : decInt;
              } else {
                return decInt < 2147483647 ? decInt : 2147483647;
              }
            });
            break;

          case 'f':
          case 'E':
          case 'e':
            j = _addNext(j, /([+-])?(?:0*)(\d*\.?\d*(?:[eE]?\d+)?)/, function (num, sign, dec) {
              if (dec === '.') {
                return null;
              }

              return parseFloat((sign || '') + dec);
            });
            break;

          case 'u':
            j = _addNext(j, /([+-])?(?:0*)(\d+)/, function (num, sign, dec) {
              var decInt = parseInt(dec, 10);

              if (sign === '-') {
                return 4294967296 - decInt;
              } else {
                return decInt < 4294967295 ? decInt : 4294967295;
              }
            });
            break;

          case 'o':
            j = _addNext(j, /([+-])?(?:0([0-7]+))/, function (num, sign, oct) {
              return parseInt(num, 8);
            });
            break;

          case 's':
            j = _addNext(j, /\S+/);
            break;

          case 'X':
          case 'x':
            j = _addNext(j, /([+-])?(?:(?:0x)?([\da-fA-F]+))/, function (num, sign, hex) {
              return parseInt(num, 16);
            });
            break;

          case '':
            throw 'Missing character after percent mark in sscanf() format argument';

          default:
            throw 'Unrecognized character after percent mark in sscanf() format argument';
        }
      } catch (e) {
        if (e === 'No match in string') {
          return _setExtraConversionSpecs(i + 2);
        }
      }

      ++i;
    } else if (format.charAt(i) !== str.charAt(j)) {
      _NWS.lastIndex = 0;

      if (_NWS.test(str.charAt(j)) || str.charAt(j) === '') {
        return _setExtraConversionSpecs(i + 1);
      } else {
        str = str.slice(0, j) + str.slice(j + 1);
        i--;
      }
    } else {
      j++;
    }
  }

  return _finish();
}

function str_getcsv(input, delimiter, enclosure, escape) {
  var output = [];

  var backwards = function backwards(str) {
    return str.split('').reverse().join('');
  };

  var pq = function pq(str) {
    return (str + '').replace(/([\\\.\+\*\?\[\^\]\$\(\)\{\}\=\!\<\>\|\:])/g, "\\$1");
  };

  delimiter = delimiter || ',';
  enclosure = enclosure || '"';
  escape = escape || '\\';
  input = input.replace(new RegExp('^\\s*' + pq(enclosure)), '').replace(new RegExp(pq(enclosure) + '\\s*$'), '');
  input = backwards(input).split(new RegExp(pq(enclosure) + '\\s*' + pq(delimiter) + '\\s*' + pq(enclosure) + '(?!' + pq(escape) + ')', 'g')).reverse();

  for (var i = 0; i < input.length; i++) {
    output.push(backwards(input[i]).replace(new RegExp(pq(escape) + pq(enclosure), 'g'), enclosure));
  }

  return output;
}

function str_ireplace(search, replace, subject) {
  var i,
      k = '';
  var searchl = 0;
  var reg;

  var escapeRegex = function escapeRegex(s) {
    return s.replace(/([\\\^\$*+\[\]?{}.=!:(|)])/g, '\\$1');
  };

  search += '';
  searchl = search.length;

  if (!(replace instanceof Array)) {
    replace = [replace];

    if (search instanceof Array) {
      while (searchl > replace.length) {
        replace[replace.length] = replace[0];
      }
    }
  }

  if (!(search instanceof Array)) {
    search = [search];
  }

  while (search.length > replace.length) {
    replace[replace.length] = '';
  }

  if (subject instanceof Array) {
    for (k in subject) {
      if (subject.hasOwnProperty(k)) {
        subject[k] = str_ireplace(search, replace, subject[k]);
      }
    }

    return subject;
  }

  searchl = search.length;

  for (i = 0; i < searchl; i++) {
    reg = new RegExp(escapeRegex(search[i]), 'gi');
    subject = subject.replace(reg, replace[i]);
  }

  return subject;
}

function str_pad(input, pad_length, pad_string, pad_type) {
  var half = '',
      pad_to_go;

  var str_pad_repeater = function str_pad_repeater(s, len) {
    var collect = '',
        i;

    while (collect.length < len) {
      collect += s;
    }

    collect = collect.substr(0, len);
    return collect;
  };

  input += '';
  pad_string = pad_string !== undefined ? pad_string : ' ';

  if (pad_type != 'STR_PAD_LEFT' && pad_type != 'STR_PAD_RIGHT' && pad_type != 'STR_PAD_BOTH') {
    pad_type = 'STR_PAD_RIGHT';
  }

  if ((pad_to_go = pad_length - input.length) > 0) {
    if (pad_type == 'STR_PAD_LEFT') {
      input = str_pad_repeater(pad_string, pad_to_go) + input;
    } else if (pad_type == 'STR_PAD_RIGHT') {
      input = input + str_pad_repeater(pad_string, pad_to_go);
    } else if (pad_type == 'STR_PAD_BOTH') {
      half = str_pad_repeater(pad_string, Math.ceil(pad_to_go / 2));
      input = half + input + half;
      input = input.substr(0, pad_length);
    }
  }

  return input;
}

function str_repeat(input, multiplier) {
  return new Array(multiplier + 1).join(input);
}

function str_replace(search, replace, subject, count) {
  var i = 0,
      j = 0,
      temp = '',
      repl = '',
      sl = 0,
      fl = 0,
      f = [].concat(search),
      r = [].concat(replace),
      s = subject,
      ra = r instanceof Array,
      sa = s instanceof Array;
  s = [].concat(s);

  if (count) {
    this.window[count] = 0;
  }

  for (i = 0, sl = s.length; i < sl; i++) {
    if (s[i] === '') {
      continue;
    }

    for (j = 0, fl = f.length; j < fl; j++) {
      temp = s[i] + '';
      repl = ra ? r[j] !== undefined ? r[j] : '' : r[0];
      s[i] = temp.split(f[j]).join(repl);

      if (count && s[i] !== temp) {
        this.window[count] += (temp.length - s[i].length) / f[j].length;
      }
    }
  }

  return sa ? s : s[0];
}

function str_rot13(str) {
  return (str + '').replace(/[a-z]/gi, function (s) {
    return String.fromCharCode(s.charCodeAt(0) + (s.toLowerCase() < 'n' ? 13 : -13));
  });
}

function str_shuffle(str) {
  if (str == undefined) {
    throw 'Wrong parameter count for str_shuffle()';
  }

  var getRandomInt = function getRandomInt(max) {
    return Math.floor(Math.random() * (max + 1));
  };

  var newStr = '',
      rand = 0;

  while (str.length) {
    rand = getRandomInt(str.length - 1);
    newStr += str.charAt(rand);
    str = str.substring(0, rand) + str.substr(rand + 1);
  }

  return newStr;
}

function str_split(string, split_length) {
  if (split_length === null) {
    split_length = 1;
  }

  if (string === null || split_length < 1) {
    return false;
  }

  string += '';
  var chunks = [],
      pos = 0,
      len = string.length;

  while (pos < len) {
    chunks.push(string.slice(pos, pos += split_length));
  }

  return chunks;
}

function str_word_count(str, format, charlist) {
  var len = str.length,
      cl = charlist && charlist.length,
      chr = '',
      tmpStr = '',
      i = 0,
      c = '',
      wArr = [],
      wC = 0,
      assoc = {},
      aC = 0,
      reg = '',
      match = false;

  var _preg_quote = function _preg_quote(str) {
    return (str + '').replace(/([\\\.\+\*\?\[\^\]\$\(\)\{\}\=\!<>\|\:])/g, '\\$1');
  },
      _getWholeChar = function _getWholeChar(str, i) {
    var code = str.charCodeAt(i);

    if (code < 0xD800 || code > 0xDFFF) {
      return str.charAt(i);
    }

    if (0xD800 <= code && code <= 0xDBFF) {
      if (str.length <= i + 1) {
        throw 'High surrogate without following low surrogate';
      }

      var next = str.charCodeAt(i + 1);

      if (0xDC00 > next || next > 0xDFFF) {
        throw 'High surrogate without following low surrogate';
      }

      return str.charAt(i) + str.charAt(i + 1);
    }

    if (i === 0) {
      throw 'Low surrogate without preceding high surrogate';
    }

    var prev = str.charCodeAt(i - 1);

    if (0xD800 > prev || prev > 0xDBFF) {
      throw 'Low surrogate without preceding high surrogate';
    }

    return false;
  };

  if (cl) {
    reg = '^(' + _preg_quote(_getWholeChar(charlist, 0));

    for (i = 1; i < cl; i++) {
      if ((chr = _getWholeChar(charlist, i)) === false) {
        continue;
      }

      reg += '|' + _preg_quote(chr);
    }

    reg += ')$';
    reg = new RegExp(reg);
  }

  for (i = 0; i < len; i++) {
    if ((c = _getWholeChar(str, i)) === false) {
      continue;
    }

    match = this.ctype_alpha(c) || reg && c.search(reg) !== -1 || i !== 0 && i !== len - 1 && c === '-' || i !== 0 && c === "'";

    if (match) {
      if (tmpStr === '' && format === 2) {
        aC = i;
      }

      tmpStr = tmpStr + c;
    }

    if (i === len - 1 || !match && tmpStr !== '') {
      if (format !== 2) {
        wArr[wArr.length] = tmpStr;
      } else {
        assoc[aC] = tmpStr;
      }

      tmpStr = '';
      wC++;
    }
  }

  if (!format) {
    return wC;
  } else if (format === 1) {
    return wArr;
  } else if (format === 2) {
    return assoc;
  }

  throw 'You have supplied an incorrect format';
}

function strcasecmp(f_string1, f_string2) {
  var string1 = (f_string1 + '').toLowerCase();
  var string2 = (f_string2 + '').toLowerCase();

  if (string1 > string2) {
    return 1;
  } else if (string1 == string2) {
    return 0;
  }

  return -1;
}

function strchr(haystack, needle, bool) {
  return this.strstr(haystack, needle, bool);
}

function strcmp(str1, str2) {
  return str1 == str2 ? 0 : str1 > str2 ? 1 : -1;
}

function strcoll(str1, str2) {
  this.setlocale('LC_ALL', 0);
  var cmp = this.php_js.locales[this.php_js.localeCategories.LC_COLLATE].LC_COLLATE;
  return cmp(str1, str2);
}

function strcspn(str, mask, start, length) {
  start = start ? start : 0;
  var count = length && start + length < str.length ? start + length : str.length;

  strct: for (var i = start, lgth = 0; i < count; i++) {
    for (var j = 0; j < mask.length; j++) {
      if (str.charAt(i).indexOf(mask[j]) !== -1) {
        continue strct;
      }
    }

    ++lgth;
  }

  return lgth;
}

function strip_tags(input, allowed) {
  allowed = (((allowed || "") + "").toLowerCase().match(/<[a-z][a-z0-9]*>/g) || []).join('');
  var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,
      commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
  return input.replace(commentsAndPhpTags, '').replace(tags, function ($0, $1) {
    return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
  });
}

function stripos(f_haystack, f_needle, f_offset) {
  var haystack = (f_haystack + '').toLowerCase();
  var needle = (f_needle + '').toLowerCase();
  var index = 0;

  if ((index = haystack.indexOf(needle, f_offset)) !== -1) {
    return index;
  }

  return false;
}

function stripslashes(str) {
  return (str + '').replace(/\\(.?)/g, function (s, n1) {
    switch (n1) {
      case '\\':
        return '\\';

      case '0':
        return "\0";

      case '':
        return '';

      default:
        return n1;
    }
  });
}

function stristr(haystack, needle, bool) {
  var pos = 0;
  haystack += '';
  pos = haystack.toLowerCase().indexOf((needle + '').toLowerCase());

  if (pos == -1) {
    return false;
  } else {
    if (bool) {
      return haystack.substr(0, pos);
    } else {
      return haystack.slice(pos);
    }
  }
}

function strlen(string) {
  var str = string + '';
  var i = 0,
      chr = '',
      lgth = 0;

  if (!this.php_js || !this.php_js.ini || !this.php_js.ini['unicode.semantics'] || this.php_js.ini['unicode.semantics'].local_value.toLowerCase() !== 'on') {
    return string.length;
  }

  var getWholeChar = function getWholeChar(str, i) {
    var code = str.charCodeAt(i);
    var next = '',
        prev = '';

    if (0xD800 <= code && code <= 0xDBFF) {
      if (str.length <= i + 1) {
        throw 'High surrogate without following low surrogate';
      }

      next = str.charCodeAt(i + 1);

      if (0xDC00 > next || next > 0xDFFF) {
        throw 'High surrogate without following low surrogate';
      }

      return str.charAt(i) + str.charAt(i + 1);
    } else if (0xDC00 <= code && code <= 0xDFFF) {
      if (i === 0) {
        throw 'Low surrogate without preceding high surrogate';
      }

      prev = str.charCodeAt(i - 1);

      if (0xD800 > prev || prev > 0xDBFF) {
        throw 'Low surrogate without preceding high surrogate';
      }

      return false;
    }

    return str.charAt(i);
  };

  for (i = 0, lgth = 0; i < str.length; i++) {
    if ((chr = getWholeChar(str, i)) === false) {
      continue;
    }

    lgth++;
  }

  return lgth;
}

function strnatcasecmp(str1, str2) {
  var a = (str1 + '').toLowerCase();
  var b = (str2 + '').toLowerCase();

  var isWhitespaceChar = function isWhitespaceChar(a) {
    return a.charCodeAt(0) <= 32;
  };

  var isDigitChar = function isDigitChar(a) {
    var charCode = a.charCodeAt(0);
    return charCode >= 48 && charCode <= 57;
  };

  var compareRight = function compareRight(a, b) {
    var bias = 0;
    var ia = 0;
    var ib = 0;
    var ca;
    var cb;

    for (var cnt = 0; true; ia++, ib++) {
      ca = a.charAt(ia);
      cb = b.charAt(ib);

      if (!isDigitChar(ca) && !isDigitChar(cb)) {
        return bias;
      } else if (!isDigitChar(ca)) {
        return -1;
      } else if (!isDigitChar(cb)) {
        return 1;
      } else if (ca < cb) {
        if (bias === 0) {
          bias = -1;
        }
      } else if (ca > cb) {
        if (bias === 0) {
          bias = 1;
        }
      } else if (ca === '0' && cb === '0') {
        return bias;
      }
    }
  };

  var ia = 0,
      ib = 0;
  var nza = 0,
      nzb = 0;
  var ca, cb;
  var result;

  while (true) {
    nza = nzb = 0;
    ca = a.charAt(ia);
    cb = b.charAt(ib);

    while (isWhitespaceChar(ca) || ca === '0') {
      if (ca === '0') {
        nza++;
      } else {
        nza = 0;
      }

      ca = a.charAt(++ia);
    }

    while (isWhitespaceChar(cb) || cb === '0') {
      if (cb === '0') {
        nzb++;
      } else {
        nzb = 0;
      }

      cb = b.charAt(++ib);
    }

    if (isDigitChar(ca) && isDigitChar(cb)) {
      if ((result = compareRight(a.substring(ia), b.substring(ib))) !== 0) {
        return result;
      }
    }

    if (ca === '0' && cb === '0') {
      return nza - nzb;
    }

    if (ca < cb) {
      return -1;
    } else if (ca > cb) {
      return +1;
    }

    ++ia;
    ++ib;
  }
}

function strnatcmp(f_string1, f_string2, f_version) {
  var i = 0;

  if (f_version == undefined) {
    f_version = false;
  }

  var __strnatcmp_split = function __strnatcmp_split(f_string) {
    var result = [];
    var buffer = '';
    var chr = '';
    var i = 0,
        f_stringl = 0;
    var text = true;
    f_stringl = f_string.length;

    for (i = 0; i < f_stringl; i++) {
      chr = f_string.substring(i, i + 1);

      if (chr.match(/\d/)) {
        if (text) {
          if (buffer.length > 0) {
            result[result.length] = buffer;
            buffer = '';
          }

          text = false;
        }

        buffer += chr;
      } else if (text == false && chr == '.' && i < f_string.length - 1 && f_string.substring(i + 1, i + 2).match(/\d/)) {
        result[result.length] = buffer;
        buffer = '';
      } else {
        if (text == false) {
          if (buffer.length > 0) {
            result[result.length] = parseInt(buffer, 10);
            buffer = '';
          }

          text = true;
        }

        buffer += chr;
      }
    }

    if (buffer.length > 0) {
      if (text) {
        result[result.length] = buffer;
      } else {
        result[result.length] = parseInt(buffer, 10);
      }
    }

    return result;
  };

  var array1 = __strnatcmp_split(f_string1 + '');

  var array2 = __strnatcmp_split(f_string2 + '');

  var len = array1.length;
  var text = true;
  var result = -1;
  var r = 0;

  if (len > array2.length) {
    len = array2.length;
    result = 1;
  }

  for (i = 0; i < len; i++) {
    if (isNaN(array1[i])) {
      if (isNaN(array2[i])) {
        text = true;

        if ((r = this.strcmp(array1[i], array2[i])) != 0) {
          return r;
        }
      } else if (text) {
        return 1;
      } else {
        return -1;
      }
    } else if (isNaN(array2[i])) {
      if (text) {
        return -1;
      } else {
        return 1;
      }
    } else {
      if (text || f_version) {
        if ((r = array1[i] - array2[i]) != 0) {
          return r;
        }
      } else {
        if ((r = this.strcmp(array1[i].toString(), array2[i].toString())) != 0) {
          return r;
        }
      }

      text = false;
    }
  }

  return result;
}

function strncasecmp(argStr1, argStr2, len) {
  var diff,
      i = 0;
  var str1 = (argStr1 + '').toLowerCase().substr(0, len);
  var str2 = (argStr2 + '').toLowerCase().substr(0, len);

  if (str1.length !== str2.length) {
    if (str1.length < str2.length) {
      len = str1.length;

      if (str2.substr(0, str1.length) == str1) {
        return str1.length - str2.length;
      }
    } else {
      len = str2.length;

      if (str1.substr(0, str2.length) == str2) {
        return str1.length - str2.length;
      }
    }
  } else {
    len = str1.length;
  }

  for (diff = 0, i = 0; i < len; i++) {
    diff = str1.charCodeAt(i) - str2.charCodeAt(i);

    if (diff !== 0) {
      return diff;
    }
  }

  return 0;
}

function strncmp(str1, str2, lgth) {
  var s1 = (str1 + '').substr(0, lgth);
  var s2 = (str2 + '').substr(0, lgth);
  return s1 == s2 ? 0 : s1 > s2 ? 1 : -1;
}

function strpbrk(haystack, char_list) {
  for (var i = 0, len = haystack.length; i < len; ++i) {
    if (char_list.indexOf(haystack.charAt(i)) >= 0) {
      return haystack.slice(i);
    }
  }

  return false;
}

function strpos(haystack, needle, offset) {
  var i = (haystack + '').indexOf(needle, offset || 0);
  return i === -1 ? false : i;
}

function strrchr(haystack, needle) {
  var pos = 0;

  if (typeof needle !== 'string') {
    needle = String.fromCharCode(parseInt(needle, 10));
  }

  needle = needle.charAt(0);
  pos = haystack.lastIndexOf(needle);

  if (pos === -1) {
    return false;
  }

  return haystack.substr(pos);
}

function strrev(string) {
  string = string + '';
  var grapheme_extend = /(.)([\uDC00-\uDFFF\u0300-\u036F\u0483-\u0489\u0591-\u05BD\u05BF\u05C1\u05C2\u05C4\u05C5\u05C7\u0610-\u061A\u064B-\u065E\u0670\u06D6-\u06DC\u06DE-\u06E4\u06E7\u06E8\u06EA-\u06ED\u0711\u0730-\u074A\u07A6-\u07B0\u07EB-\u07F3\u0901-\u0903\u093C\u093E-\u094D\u0951-\u0954\u0962\u0963\u0981-\u0983\u09BC\u09BE-\u09C4\u09C7\u09C8\u09CB-\u09CD\u09D7\u09E2\u09E3\u0A01-\u0A03\u0A3C\u0A3E-\u0A42\u0A47\u0A48\u0A4B-\u0A4D\u0A51\u0A70\u0A71\u0A75\u0A81-\u0A83\u0ABC\u0ABE-\u0AC5\u0AC7-\u0AC9\u0ACB-\u0ACD\u0AE2\u0AE3\u0B01-\u0B03\u0B3C\u0B3E-\u0B44\u0B47\u0B48\u0B4B-\u0B4D\u0B56\u0B57\u0B62\u0B63\u0B82\u0BBE-\u0BC2\u0BC6-\u0BC8\u0BCA-\u0BCD\u0BD7\u0C01-\u0C03\u0C3E-\u0C44\u0C46-\u0C48\u0C4A-\u0C4D\u0C55\u0C56\u0C62\u0C63\u0C82\u0C83\u0CBC\u0CBE-\u0CC4\u0CC6-\u0CC8\u0CCA-\u0CCD\u0CD5\u0CD6\u0CE2\u0CE3\u0D02\u0D03\u0D3E-\u0D44\u0D46-\u0D48\u0D4A-\u0D4D\u0D57\u0D62\u0D63\u0D82\u0D83\u0DCA\u0DCF-\u0DD4\u0DD6\u0DD8-\u0DDF\u0DF2\u0DF3\u0E31\u0E34-\u0E3A\u0E47-\u0E4E\u0EB1\u0EB4-\u0EB9\u0EBB\u0EBC\u0EC8-\u0ECD\u0F18\u0F19\u0F35\u0F37\u0F39\u0F3E\u0F3F\u0F71-\u0F84\u0F86\u0F87\u0F90-\u0F97\u0F99-\u0FBC\u0FC6\u102B-\u103E\u1056-\u1059\u105E-\u1060\u1062-\u1064\u1067-\u106D\u1071-\u1074\u1082-\u108D\u108F\u135F\u1712-\u1714\u1732-\u1734\u1752\u1753\u1772\u1773\u17B6-\u17D3\u17DD\u180B-\u180D\u18A9\u1920-\u192B\u1930-\u193B\u19B0-\u19C0\u19C8\u19C9\u1A17-\u1A1B\u1B00-\u1B04\u1B34-\u1B44\u1B6B-\u1B73\u1B80-\u1B82\u1BA1-\u1BAA\u1C24-\u1C37\u1DC0-\u1DE6\u1DFE\u1DFF\u20D0-\u20F0\u2DE0-\u2DFF\u302A-\u302F\u3099\u309A\uA66F-\uA672\uA67C\uA67D\uA802\uA806\uA80B\uA823-\uA827\uA880\uA881\uA8B4-\uA8C4\uA926-\uA92D\uA947-\uA953\uAA29-\uAA36\uAA43\uAA4C\uAA4D\uFB1E\uFE00-\uFE0F\uFE20-\uFE26]+)/g;
  string = string.replace(grapheme_extend, '$2$1');
  return string.split('').reverse().join('');
}

function strripos(haystack, needle, offset) {
  haystack = (haystack + '').toLowerCase();
  needle = (needle + '').toLowerCase();
  var i = -1;

  if (offset) {
    i = (haystack + '').slice(offset).lastIndexOf(needle);

    if (i !== -1) {
      i += offset;
    }
  } else {
    i = (haystack + '').lastIndexOf(needle);
  }

  return i >= 0 ? i : false;
}

function strrpos(haystack, needle, offset) {
  var i = -1;

  if (offset) {
    i = (haystack + '').slice(offset).lastIndexOf(needle);

    if (i !== -1) {
      i += offset;
    }
  } else {
    i = (haystack + '').lastIndexOf(needle);
  }

  return i >= 0 ? i : false;
}

function strspn(str1, str2, start, lgth) {
  var found;
  var stri;
  var strj;
  var j = 0;
  var i = 0;
  start = start ? start < 0 ? str1.length + start : start : 0;
  lgth = lgth ? lgth < 0 ? str1.length + lgth - start : lgth : str1.length - start;
  str1 = str1.substr(start, lgth);

  for (i = 0; i < str1.length; i++) {
    found = 0;
    stri = str1.substring(i, i + 1);

    for (j = 0; j <= str2.length; j++) {
      strj = str2.substring(j, j + 1);

      if (stri == strj) {
        found = 1;
        break;
      }
    }

    if (found != 1) {
      return i;
    }
  }

  return i;
}

function strstr(haystack, needle, bool) {
  var pos = 0;
  haystack += '';
  pos = haystack.indexOf(needle);

  if (pos == -1) {
    return false;
  } else {
    if (bool) {
      return haystack.substr(0, pos);
    } else {
      return haystack.slice(pos);
    }
  }
}

function strtok(str, tokens) {
  this.php_js = this.php_js || {};

  if (tokens === undefined) {
    tokens = str;
    str = this.php_js.strtokleftOver;
  }

  if (str.length === 0) {
    return false;
  }

  if (tokens.indexOf(str.charAt(0)) !== -1) {
    return this.strtok(str.substr(1), tokens);
  }

  for (var i = 0; i < str.length; i++) {
    if (tokens.indexOf(str.charAt(i)) !== -1) {
      break;
    }
  }

  this.php_js.strtokleftOver = str.substr(i + 1);
  return str.substring(0, i);
}

function strtolower(str) {
  return (str + '').toLowerCase();
}

function strtoupper(str) {
  return (str + '').toUpperCase();
}

function strtr(str, from, to) {
  var fr = '',
      i = 0,
      j = 0,
      lenStr = 0,
      lenFrom = 0,
      tmpStrictForIn = false,
      fromTypeStr = '',
      toTypeStr = '',
      istr = '';
  var tmpFrom = [];
  var tmpTo = [];
  var ret = '';
  var match = false;

  if (_typeof(from) === 'object') {
    tmpStrictForIn = this.ini_set('phpjs.strictForIn', false);
    from = this.krsort(from);
    this.ini_set('phpjs.strictForIn', tmpStrictForIn);

    for (fr in from) {
      if (from.hasOwnProperty(fr)) {
        tmpFrom.push(fr);
        tmpTo.push(from[fr]);
      }
    }

    from = tmpFrom;
    to = tmpTo;
  }

  lenStr = str.length;
  lenFrom = from.length;
  fromTypeStr = typeof from === 'string';
  toTypeStr = typeof to === 'string';

  for (i = 0; i < lenStr; i++) {
    match = false;

    if (fromTypeStr) {
      istr = str.charAt(i);

      for (j = 0; j < lenFrom; j++) {
        if (istr == from.charAt(j)) {
          match = true;
          break;
        }
      }
    } else {
      for (j = 0; j < lenFrom; j++) {
        if (str.substr(i, from[j].length) == from[j]) {
          match = true;
          i = i + from[j].length - 1;
          break;
        }
      }
    }

    if (match) {
      ret += toTypeStr ? to.charAt(j) : to[j];
    } else {
      ret += str.charAt(i);
    }
  }

  return ret;
}

function substr(str, start, len) {
  var i = 0,
      allBMP = true,
      es = 0,
      el = 0,
      se = 0,
      ret = '';
  str += '';
  var end = str.length;
  this.php_js = this.php_js || {};
  this.php_js.ini = this.php_js.ini || {};

  switch (this.php_js.ini['unicode.semantics'] && this.php_js.ini['unicode.semantics'].local_value.toLowerCase()) {
    case 'on':
      for (i = 0; i < str.length; i++) {
        if (/[\uD800-\uDBFF]/.test(str.charAt(i)) && /[\uDC00-\uDFFF]/.test(str.charAt(i + 1))) {
          allBMP = false;
          break;
        }
      }

      if (!allBMP) {
        if (start < 0) {
          for (i = end - 1, es = start += end; i >= es; i--) {
            if (/[\uDC00-\uDFFF]/.test(str.charAt(i)) && /[\uD800-\uDBFF]/.test(str.charAt(i - 1))) {
              start--;
              es--;
            }
          }
        } else {
          var surrogatePairs = /[\uD800-\uDBFF][\uDC00-\uDFFF]/g;

          while (surrogatePairs.exec(str) != null) {
            var li = surrogatePairs.lastIndex;

            if (li - 2 < start) {
              start++;
            } else {
              break;
            }
          }
        }

        if (start >= end || start < 0) {
          return false;
        }

        if (len < 0) {
          for (i = end - 1, el = end += len; i >= el; i--) {
            if (/[\uDC00-\uDFFF]/.test(str.charAt(i)) && /[\uD800-\uDBFF]/.test(str.charAt(i - 1))) {
              end--;
              el--;
            }
          }

          if (start > end) {
            return false;
          }

          return str.slice(start, end);
        } else {
          se = start + len;

          for (i = start; i < se; i++) {
            ret += str.charAt(i);

            if (/[\uD800-\uDBFF]/.test(str.charAt(i)) && /[\uDC00-\uDFFF]/.test(str.charAt(i + 1))) {
              se++;
            }
          }

          return ret;
        }

        break;
      }

    case 'off':
    default:
      if (start < 0) {
        start += end;
      }

      end = typeof len === 'undefined' ? end : len < 0 ? len + end : len + start;
      return start >= str.length || start < 0 || start > end ? !1 : str.slice(start, end);
  }

  return undefined;
}

function substr_compare(main_str, str, offset, length, case_insensitivity) {
  if (!offset && offset !== 0) {
    throw 'Missing offset for substr_compare()';
  }

  if (offset < 0) {
    offset = main_str.length + offset;
  }

  if (length && length > main_str.length - offset) {
    return false;
  }

  length = length || main_str.length - offset;
  main_str = main_str.substr(offset, length);
  str = str.substr(0, length);

  if (case_insensitivity) {
    main_str = (main_str + '').toLowerCase();
    str = (str + '').toLowerCase();

    if (main_str == str) {
      return 0;
    }

    return main_str > str ? 1 : -1;
  }

  return main_str == str ? 0 : main_str > str ? 1 : -1;
}

function substr_count(haystack, needle, offset, length) {
  var pos = 0,
      cnt = 0;
  haystack += '';
  needle += '';

  if (isNaN(offset)) {
    offset = 0;
  }

  if (isNaN(length)) {
    length = 0;
  }

  offset--;

  while ((offset = haystack.indexOf(needle, offset + 1)) != -1) {
    if (length > 0 && offset + needle.length > length) {
      return false;
    } else {
      cnt++;
    }
  }

  return cnt;
}

function substr_replace(str, replace, start, length) {
  if (start < 0) {
    start = start + str.length;
  }

  length = length !== undefined ? length : str.length;

  if (length < 0) {
    length = length + str.length - start;
  }

  return str.slice(0, start) + replace.substr(0, length) + replace.slice(length) + str.slice(start + length);
}

function trim(str, charlist) {
  var whitespace,
      l = 0,
      i = 0;
  str += '';

  if (!charlist) {
    whitespace = " \n\r\t\f\x0B\xA0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200A\u200B\u2028\u2029\u3000";
  } else {
    charlist += '';
    whitespace = charlist.replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, '$1');
  }

  l = str.length;

  for (i = 0; i < l; i++) {
    if (whitespace.indexOf(str.charAt(i)) === -1) {
      str = str.substring(i);
      break;
    }
  }

  l = str.length;

  for (i = l - 1; i >= 0; i--) {
    if (whitespace.indexOf(str.charAt(i)) === -1) {
      str = str.substring(0, i + 1);
      break;
    }
  }

  return whitespace.indexOf(str.charAt(0)) === -1 ? str : '';
}

function ucfirst(str) {
  str += '';
  var f = str.charAt(0).toUpperCase();
  return f + str.substr(1);
}

function ucwords(str) {
  return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
    return $1.toUpperCase();
  });
}

function urldecode(str) {
  return decodeURIComponent((str + '').replace(/\+/g, '%20'));
}

function utf8_encode(argString) {
  var string = argString + '';
  var utftext = "",
      start,
      end,
      stringl = 0;
  start = end = 0;
  stringl = string.length;

  for (var n = 0; n < stringl; n++) {
    var c1 = string.charCodeAt(n);
    var enc = null;

    if (c1 < 128) {
      end++;
    } else if (c1 > 127 && c1 < 2048) {
      enc = String.fromCharCode(c1 >> 6 | 192) + String.fromCharCode(c1 & 63 | 128);
    } else {
      enc = String.fromCharCode(c1 >> 12 | 224) + String.fromCharCode(c1 >> 6 & 63 | 128) + String.fromCharCode(c1 & 63 | 128);
    }

    if (enc !== null) {
      if (end > start) {
        utftext += string.slice(start, end);
      }

      utftext += enc;
      start = end = n + 1;
    }
  }

  if (end > start) {
    utftext += string.slice(start, stringl);
  }

  return utftext;
}

function vprintf(format, args) {
  var body, elmt;
  var ret = '',
      d = this.window.document;
  var HTMLNS = 'http://www.w3.org/1999/xhtml';
  body = d.getElementsByTagNameNS ? d.getElementsByTagNameNS(HTMLNS, 'body')[0] ? d.getElementsByTagNameNS(HTMLNS, 'body')[0] : d.documentElement.lastChild : d.getElementsByTagName('body')[0];

  if (!body) {
    return false;
  }

  ret = this.sprintf.apply(this, [format].concat(args));
  elmt = d.createTextNode(ret);
  body.appendChild(elmt);
  return ret.length;
}

function vsprintf(format, args) {
  return this.sprintf.apply(this, [format].concat(args));
}

function wordwrap(str, int_width, str_break, cut) {
  var m = arguments.length >= 2 ? arguments[1] : 75;
  var b = arguments.length >= 3 ? arguments[2] : "\n";
  var c = arguments.length >= 4 ? arguments[3] : false;
  var i, j, l, s, r;
  str += '';

  if (m < 1) {
    return str;
  }

  for (i = -1, l = (r = str.split(/\r\n|\n|\r/)).length; ++i < l; r[i] += s) {
    for (s = r[i], r[i] = ""; s.length > m; r[i] += s.slice(0, j) + ((s = s.slice(j)).length ? b : "")) {
      j = c == 2 || (j = s.slice(0, m + 1).match(/\S*(\s)?$/))[1] ? m : j.input.length - j[0].length || c == 1 && m || j.input.length + (j = s.slice(m).match(/^\S*/)).input.length;
    }
  }

  return r.join("\n");
}

/***/ }),

/***/ "./resources/js/variable.min.js":
/*!**************************************!*\
  !*** ./resources/js/variable.min.js ***!
  \**************************************/
/***/ (() => {

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/* 
 * More info at: http://phpjs.org
 * 
 * This is version: 3.19
 * php.js is copyright 2010 Kevin van Zonneveld.
 * 
 * Portions copyright Brett Zamir (http://brett-zamir.me), Kevin van Zonneveld
 * (http://kevin.vanzonneveld.net), Onno Marsman, Theriault, Michael White
 * (http://getsprink.com), Waldo Malqui Silva, Paulo Freitas, Jack, Jonas
 * Raoni Soares Silva (http://www.jsfromhell.com), Philip Peterson, Legaev
 * Andrey, Ates Goral (http://magnetiq.com), Alex, Ratheous, Martijn Wieringa,
 * lmeyrick (https://sourceforge.net/projects/bcmath-js/), Nate, Philippe
 * Baumann, Enrique Gonzalez, Webtoolkit.info (http://www.webtoolkit.info/),
 * Ole Vrijenhoek, Ash Searle (http://hexmen.com/blog/), Jani Hartikainen,
 * travc, Carlos R. L. Rodrigues (http://www.jsfromhell.com), WebDevHobo
 * (http://webdevhobo.blogspot.com/), stag019, Rafał Kukawski
 * (http://blog.kukawski.pl), GeekFG (http://geekfg.blogspot.com), pilus,
 * Rafał Kukawski (http://blog.kukawski.pl/), T.Wild, Erkekjetter,
 * http://stackoverflow.com/questions/57803/how-to-convert-decimal-to-hex-in-javascript,
 * marrtins, d3x, Andrea Giammarchi (http://webreflection.blogspot.com),
 * Michael Grier, Johnny Mast (http://www.phpvrouwen.nl), majak, mdsjack
 * (http://www.mdsjack.bo.it), Felix Geisendoerfer
 * (http://www.debuggable.com/felix), Martin (http://www.erlenwiese.de/),
 * gorthaur, Steve Hilder, Oleg Eremeev, gettimeofday, Chris, Mailfaker
 * (http://www.weedem.fr/), Marc Palau, felix, AJ, Steven Levithan
 * (http://blog.stevenlevithan.com), Paul Smith, Tim de Koning
 * (http://www.kingsquare.nl), Joris, KELAN, Kevin van Zonneveld
 * (http://kevin.vanzonneveld.net/), Arpad Ray (mailto:arpad@php.net),
 * Breaking Par Consulting Inc
 * (http://www.breakingpar.com/bkp/home.nsf/0/87256B280015193F87256CFB006C45F7),
 * Lars Fischer, Josh Fraser
 * (http://onlineaspect.com/2007/06/08/auto-detect-a-time-zone-with-javascript/),
 * Mirek Slugen, Sakimori, Karol Kowalski, Michael White, David, Diplom@t
 * (http://difane.com/), Imgen Tata (http://www.myipdf.com/), Pellentesque
 * Malesuada, Tyler Akins (http://rumkin.com), Thunder.m, Caio Ariede
 * (http://caioariede.com), saulius, Aman Gupta, Robin, Kankrelune
 * (http://www.webfaktory.info/), Public Domain
 * (http://www.json.org/json2.js), Alfonso Jimenez
 * (http://www.alfonsojimenez.com), ReverseSyntax, sankai, Frank Forte, Oskar
 * Larsson Högfeldt (http://oskar-lh.name/), Arno, madipta, Slawomir
 * Kaniecki, vlado houba, Billy, class_exists, noname, Mateusz "loonquawl"
 * Zalega, Marco, Jalal Berrami, Itsacon (http://www.itsacon.net/), Nick
 * Kolosov (http://sammy.ru), ger, marc andreu, Fox, Scott Cariss, Francois,
 * john (http://www.jd-tech.net), nobbler, Nathan, date, Douglas Crockford
 * (http://javascript.crockford.com), mktime, David James, Denny Wardhana,
 * Sanjoy Roy, Steve Clay, merabi, Subhasis Deb, Gilbert, Soren Hansen, T0bsn,
 * Tim Wiel, Brad Touesnard, MeEtc (http://yass.meetcweb.com), Peter-Paul Koch
 * (http://www.quirksmode.org/js/beat.html), Pyerre, Jon Hohle, jmweb, Bayron
 * Guevara, Adam Wallner (http://web2.bitbaro.hu/), paulo kuong, duncan,
 * Lincoln Ramsay, Thiago Mata (http://thiagomata.blog.com), Linuxworld,
 * lmeyrick (https://sourceforge.net/projects/bcmath-js/this.), djmix, Bryan
 * Elliott, David Randall, Marc Jansen, Francesco, Stoyan Kyosev
 * (http://www.svest.org/), J A R, kenneth, T. Wild, Ole Vrijenhoek
 * (http://www.nervous.nl/), Raphael (Ao RUDLER), Shingo, LH, JB, nord_ua,
 * josh, JT, Thomas Beaucourt (http://www.webapp.fr), Ozh, XoraX
 * (http://www.xorax.info), Eugene Bulkin (http://doubleaw.com/), Der Simon
 * (http://innerdom.sourceforge.net/), echo is bad, 0m3r, FremyCompany,
 * stensi, Devan Penner-Woelk, Kristof Coomans (SCK-CEN Belgian Nucleair
 * Research Centre), Pierre-Luc Paour, Kirk Strobeck, Martin Pool, Saulo
 * Vallory, Christoph, Wagner B. Soares, Artur Tchernychev, Valentina De Rosa,
 * Jason Wong (http://carrot.org/), Daniel Esteban, strftime, Brant Messenger
 * (http://www.brantmessenger.com/), Rick Waldron, Bug?, Blues
 * (http://tech.bluesmoon.info/), Bjorn Roesbeke
 * (http://www.bjornroesbeke.be/), Anton Ongson, Gabriel Paderni, Simon
 * Willison (http://simonwillison.net), Luke Godfrey, Pul, rezna, Mick@el,
 * Tomasz Wesolowski, Eric Nagel, Bobby Drake, Evertjan Garretsen, uestla,
 * Alan C, Ulrich, Zahlii, Yves Sucaet, sowberry, Norman "zEh" Fuchs, hitwork,
 * johnrembo, Brian Tafoya (http://www.premasolutions.com/), Nick Callen,
 * Steven Levithan (stevenlevithan.com), ejsanders, Scott Baker, Philippe
 * Jausions (http://pear.php.net/user/jausions), Aidan Lister
 * (http://aidanlister.com/), Rob, Orlando, HKM, ChaosNo1, metjay, strcasecmp,
 * strcmp, Taras Bogach, jpfle, Alexander Ermolaev
 * (http://snippets.dzone.com/user/AlexanderErmolaev), DxGx, dptr1988, kilops,
 * Le Torbi, James, James (http://www.james-bell.co.uk/), Pedro Tainha
 * (http://www.pedrotainha.com), Marco van Oort, Philipp Lenssen, jakes,
 * 3D-GRAF, Yannoo, gabriel paderni, baris ozdil, FGFEmperor, daniel airton
 * wermann (http://wermann.com.br), Atli Þór, Howard Yeend, Diogo Resende,
 * Allan Jensen (http://www.winternet.no), Benjamin Lupton, Maximusya, davook,
 * Greg Frazier, Tod Gentille, Manish, Matt Bradley, Cord, fearphage
 * (http://http/my.opera.com/fearphage/), Matteo, Victor, taith, Tim de
 * Koning, Alexander M Beedie, Ryan W Tenney (http://ryan.10e.us), Riddler
 * (http://www.frontierwebdev.com/), T.J. Leahy, Luis Salazar
 * (http://www.freaky-media.com/), Rafał Kukawski, Rival, Luke Smith
 * (http://lucassmith.name), Russell Walker (http://www.nbill.co.uk/), Jamie
 * Beck (http://www.terabit.ca/), Garagoth, Andrej Pavlovic, Dino, Le Torbi
 * (http://www.letorbi.de/), DtTvB
 * (http://dt.in.th/2008-09-16.string-length-in-bytes.html), Andreas, Arnout
 * Kazemier (http://www.3rd-Eden.com), penutbutterjelly, Michael, setcookie,
 * Blues at http://hacks.bluesmoon.info/strftime/strftime.js, YUI Library:
 * http://developer.yahoo.com/yui/docs/YAHOO.util.DateLocale.html, rem, Josep
 * Sanz (http://www.ws3.es/), Cagri Ekin, Dreamer, Amirouche, Amir Habibi
 * (http://www.residence-mixte.com/), Kheang Hok Chin
 * (http://www.distantia.ca/), Jay Klehr, booeyOH, Ben Bryan, meo, William,
 * Greenseed, Yen-Wei Liu, Leslie Hoare, mk.keck
 * 
 * Dual licensed under the MIT (MIT-LICENSE.txt)
 * and GPL (GPL-LICENSE.txt) licenses.
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a
 * copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL KEVIN VAN ZONNEVELD BE LIABLE FOR ANY CLAIM, DAMAGES
 * OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
 * ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 */
// Compression: minified
function doubleval(mixed_var) {
  return this.floatval(mixed_var);
}

function echo() {
  var arg = '',
      argc = arguments.length,
      argv = arguments,
      i = 0;
  var win = this.window;
  var d = win.document;
  var ns_xhtml = 'http://www.w3.org/1999/xhtml';
  var ns_xul = 'http://www.mozilla.org/keymaster/gatekeeper/there.is.only.xul';
  var holder;

  var stringToDOM = function stringToDOM(str, parent, ns, container) {
    var extraNSs = '';

    if (ns === ns_xul) {
      extraNSs = ' xmlns:html="' + ns_xhtml + '"';
    }

    var stringContainer = '<' + container + ' xmlns="' + ns + '"' + extraNSs + '>' + str + '</' + container + '>';

    if (win.DOMImplementationLS && win.DOMImplementationLS.createLSInput && win.DOMImplementationLS.createLSParser) {
      var lsInput = DOMImplementationLS.createLSInput();
      lsInput.stringData = stringContainer;
      var lsParser = DOMImplementationLS.createLSParser(1, null);
      return lsParser.parse(lsInput).firstChild;
    } else if (win.DOMParser) {
      try {
        var fc = new DOMParser().parseFromString(stringContainer, 'text/xml');

        if (!fc || !fc.documentElement || fc.documentElement.localName !== 'parsererror' || fc.documentElement.namespaceURI !== 'http://www.mozilla.org/newlayout/xml/parsererror.xml') {
          return fc.documentElement.firstChild;
        }
      } catch (e) {}
    } else if (win.ActiveXObject) {
      var axo = new ActiveXObject('MSXML2.DOMDocument');
      axo.loadXML(str);
      return axo.documentElement;
    }

    if (d.createElementNS && (d.documentElement.namespaceURI || d.documentElement.nodeName.toLowerCase() !== 'html' || d.contentType && d.contentType !== 'text/html')) {
      holder = d.createElementNS(ns, container);
    } else {
      holder = d.createElement(container);
    }

    holder.innerHTML = str;

    while (holder.firstChild) {
      parent.appendChild(holder.firstChild);
    }

    return false;
  };

  var ieFix = function ieFix(node) {
    if (node.nodeType === 1) {
      var newNode = d.createElement(node.nodeName);
      var i, len;

      if (node.attributes && node.attributes.length > 0) {
        for (i = 0, len = node.attributes.length; i < len; i++) {
          newNode.setAttribute(node.attributes[i].nodeName, node.getAttribute(node.attributes[i].nodeName));
        }
      }

      if (node.childNodes && node.childNodes.length > 0) {
        for (i = 0, len = node.childNodes.length; i < len; i++) {
          newNode.appendChild(ieFix(node.childNodes[i]));
        }
      }

      return newNode;
    } else {
      return d.createTextNode(node.nodeValue);
    }
  };

  for (i = 0; i < argc; i++) {
    arg = argv[i];

    if (this.php_js && this.php_js.ini && this.php_js.ini['phpjs.echo_embedded_vars']) {
      arg = arg.replace(/(.?)\{\$(.*?)\}/g, function (s, m1, m2) {
        if (m1 !== '\\') {
          return m1 + eval(m2);
        } else {
          return s;
        }
      });
    }

    if (d.appendChild) {
      if (d.body) {
        if (win.navigator.appName == 'Microsoft Internet Explorer') {
          d.body.appendChild(stringToDOM(ieFix(arg)));
        } else {
          var unappendedLeft = stringToDOM(arg, d.body, ns_xhtml, 'div').cloneNode(true);

          if (unappendedLeft) {
            d.body.appendChild(unappendedLeft);
          }
        }
      } else {
        d.documentElement.appendChild(stringToDOM(arg, d.documentElement, ns_xul, 'description'));
      }
    } else if (d.write) {
      d.write(arg);
    }
  }
}

function empty(mixed_var) {
  var key;

  if (mixed_var === "" || mixed_var === 0 || mixed_var === "0" || mixed_var === null || mixed_var === false || typeof mixed_var === 'undefined') {
    return true;
  }

  if (_typeof(mixed_var) == 'object') {
    for (key in mixed_var) {
      return false;
    }

    return true;
  }

  return false;
}

function floatval(mixed_var) {
  return parseFloat(mixed_var) || 0;
}

function get_defined_vars() {
  var i = '',
      arr = [],
      already = {};

  for (i in this.window) {
    try {
      if (_typeof(this.window[i]) === 'object') {
        for (var j in this.window[i]) {
          if (this.window[j] && !already[j]) {
            already[j] = 1;
            arr.push(j);
          }
        }
      } else if (!already[i]) {
        already[i] = 1;
        arr.push(i);
      }
    } catch (e) {
      if (!already[i]) {
        already[i] = 1;
        arr.push(i);
      }
    }
  }

  return arr;
}

function get_resource_type(handle) {
  var getFuncName = function getFuncName(fn) {
    var name = /\W*function\s+([\w\$]+)\s*\(/.exec(fn);

    if (!name) {
      return '(Anonymous)';
    }

    return name[1];
  };

  if (!handle || _typeof(handle) !== 'object' || !handle.constructor || getFuncName(handle.constructor) !== 'PHPJS_Resource') {
    return false;
  }

  return handle.get_resource_type();
}

function gettype(mixed_var) {
  var s = _typeof(mixed_var),
      name;

  var getFuncName = function getFuncName(fn) {
    var name = /\W*function\s+([\w\$]+)\s*\(/.exec(fn);

    if (!name) {
      return '(Anonymous)';
    }

    return name[1];
  };

  if (s === 'object') {
    if (mixed_var !== null) {
      if (typeof mixed_var.length === 'number' && !mixed_var.propertyIsEnumerable('length') && typeof mixed_var.splice === 'function') {
        s = 'array';
      } else if (mixed_var.constructor && getFuncName(mixed_var.constructor)) {
        name = getFuncName(mixed_var.constructor);

        if (name === 'Date') {
          s = 'date';
        } else if (name === 'RegExp') {
          s = 'regexp';
        } else if (name === 'PHPJS_Resource') {
          s = 'resource';
        }
      }
    } else {
      s = 'null';
    }
  } else if (s === 'number') {
    s = this.is_float(mixed_var) ? 'double' : 'integer';
  }

  return s;
}

function import_request_variables(types, prefix) {
  var i = 0,
      current = '',
      url = '',
      vars = '',
      arrayBracketPos = -1,
      arrName = '',
      win = this.window,
      requestObj = this.window,
      getObj = false,
      cookieObj = false;
  prefix = prefix || '';
  var that = this;

  var _ini_get = function _ini_get(ini) {
    if (that.php_js && that.php_js.ini && that.php_js.ini[ini] && that.php_js.ini[ini].local_value) {
      return that.php_js.ini[ini].local_value;
    }

    return false;
  };

  requestObj = _ini_get('phpjs.requestVarsObj') || requestObj;

  if (/g/i.test(types)) {
    getObj = _ini_get('phpjs.getVarsObj') || getObj;

    for (i = 0, url = win.location.href, vars = url.substring(url.lastIndexOf('?') + 1, url.length).split('&'); i < vars.length; i++) {
      current = vars[i].split('=');
      current[1] = decodeURIComponent(current[1]);
      arrayBracketPos = current[0].indexOf('[');

      if (arrayBracketPos !== -1) {
        arrName = current[0].substring(0, arrayBracketPos);
        arrName = decodeURIComponent(arrName);

        if (!requestObj[prefix + arrName]) {
          requestObj[prefix + arrName] = [];
        }

        requestObj[prefix + arrName].push(current[1] || null);

        if (getObj) {
          if (!getObj[prefix + arrName]) {
            getObj[prefix + arrName] = [];
          }

          getObj[prefix + arrName].push(current[1] || null);
        }
      } else {
        current[0] = decodeURIComponent(current[0]);
        requestObj[prefix + current[0]] = current[1] || null;

        if (getObj) {
          getObj[prefix + current[0]] = current[1] || null;
        }
      }
    }
  }

  if (/c/i.test(types)) {
    cookieObj = _ini_get('phpjs.cookieVarsObj') || cookieObj;

    for (i = 0, vars = win.document.cookie.split("&"); i < vars.length; i++) {
      current = vars[i].split("=");
      requestObj[prefix + current[0]] = current[1].split(";")[0] || null;

      if (cookieObj) {
        cookieObj[prefix + current[0]] = current[1].split(";")[0] || null;
      }
    }
  }
}

function intval(mixed_var, base) {
  var tmp;

  var type = _typeof(mixed_var);

  if (type === 'boolean') {
    return mixed_var ? 1 : 0;
  } else if (type === 'string') {
    tmp = parseInt(mixed_var, base || 10);
    return isNaN(tmp) || !isFinite(tmp) ? 0 : tmp;
  } else if (type === 'number' && isFinite(mixed_var)) {
    return Math.floor(mixed_var);
  } else {
    return 0;
  }
}

function is_array(mixed_var) {
  var key = '';

  var getFuncName = function getFuncName(fn) {
    var name = /\W*function\s+([\w\$]+)\s*\(/.exec(fn);

    if (!name) {
      return '(Anonymous)';
    }

    return name[1];
  };

  if (!mixed_var) {
    return false;
  }

  this.php_js = this.php_js || {};
  this.php_js.ini = this.php_js.ini || {};

  if (_typeof(mixed_var) === 'object') {
    if (this.php_js.ini['phpjs.objectsAsArrays'] && (this.php_js.ini['phpjs.objectsAsArrays'].local_value.toLowerCase && this.php_js.ini['phpjs.objectsAsArrays'].local_value.toLowerCase() === 'off' || parseInt(this.php_js.ini['phpjs.objectsAsArrays'].local_value, 10) === 0)) {
      return mixed_var.hasOwnProperty('length') && !mixed_var.propertyIsEnumerable('length') && getFuncName(mixed_var.constructor) !== 'String';
    }

    if (mixed_var.hasOwnProperty) {
      for (key in mixed_var) {
        if (false === mixed_var.hasOwnProperty(key)) {
          return false;
        }
      }
    }

    return true;
  }

  return false;
}

function is_binary(vr) {
  return typeof vr === 'string';
}

function is_bool(mixed_var) {
  return typeof mixed_var === 'boolean';
}

function is_buffer(vr) {
  return typeof vr === 'string';
}

function is_callable(v, syntax_only, callable_name) {
  var name = '',
      obj = {},
      method = '';

  var getFuncName = function getFuncName(fn) {
    var name = /\W*function\s+([\w\$]+)\s*\(/.exec(fn);

    if (!name) {
      return '(Anonymous)';
    }

    return name[1];
  };

  if (typeof v === 'string') {
    obj = this.window;
    method = v;
    name = v;
  } else if (v instanceof Array && v.length === 2 && _typeof(v[0]) === 'object' && typeof v[1] === 'string') {
    obj = v[0];
    method = v[1];
    name = (obj.constructor && getFuncName(obj.constructor)) + '::' + method;
  } else {
    return false;
  }

  if (syntax_only || typeof obj[method] === 'function') {
    if (callable_name) {
      this.window[callable_name] = name;
    }

    return true;
  }

  return false;
}

function is_double(mixed_var) {
  return this.is_float(mixed_var);
}

function is_float(mixed_var) {
  if (typeof mixed_var !== 'number') {
    return false;
  }

  return !!(mixed_var % 1);
}

function is_int(mixed_var) {
  if (typeof mixed_var !== 'number') {
    return false;
  }

  return !(mixed_var % 1);
}

function is_integer(mixed_var) {
  return this.is_int(mixed_var);
}

function is_long(mixed_var) {
  return this.is_float(mixed_var);
}

function is_null(mixed_var) {
  return mixed_var === null;
}

function is_numeric(mixed_var) {
  return (typeof mixed_var === 'number' || typeof mixed_var === 'string') && mixed_var !== '' && !isNaN(mixed_var);
}

function is_object(mixed_var) {
  if (mixed_var instanceof Array) {
    return false;
  } else {
    return mixed_var !== null && _typeof(mixed_var) == 'object';
  }
}

function is_real(mixed_var) {
  return this.is_float(mixed_var);
}

function is_resource(handle) {
  var getFuncName = function getFuncName(fn) {
    var name = /\W*function\s+([\w\$]+)\s*\(/.exec(fn);

    if (!name) {
      return '(Anonymous)';
    }

    return name[1];
  };

  return !(!handle || _typeof(handle) !== 'object' || !handle.constructor || getFuncName(handle.constructor) !== 'PHPJS_Resource');
}

function is_scalar(mixed_var) {
  return /boolean|number|string/.test(_typeof(mixed_var));
}

function is_string(mixed_var) {
  return typeof mixed_var == 'string';
}

function is_unicode(vr) {
  if (typeof vr !== 'string') {
    return false;
  }

  var arr = [],
      any = '([\s\S])',
      highSurrogate = "[\uD800-\uDBFF]",
      lowSurrogate = "[\uDC00-\uDFFF]",
      highSurrogateBeforeAny = new RegExp(highSurrogate + any, 'g'),
      lowSurrogateAfterAny = new RegExp(any + lowSurrogate, 'g'),
      singleLowSurrogate = new RegExp('^' + lowSurrogate + '$'),
      singleHighSurrogate = new RegExp('^' + highSurrogate + '$');

  while ((arr = highSurrogateBeforeAny.exec(vr)) !== null) {
    if (!arr[1] || !arr[1].match(singleLowSurrogate)) {
      return false;
    }
  }

  while ((arr = lowSurrogateAfterAny.exec(vr)) !== null) {
    if (!arr[1] || !arr[1].match(singleHighSurrogate)) {
      return false;
    }
  }

  return true;
}

function isset() {
  var a = arguments,
      l = a.length,
      i = 0,
      undef;

  if (l === 0) {
    throw new Error('Empty isset');
  }

  while (i !== l) {
    if (a[i] === undef || a[i] === null) {
      return false;
    }

    i++;
  }

  return true;
}

function print_r(array, return_val) {
  var output = "",
      pad_char = " ",
      pad_val = 4,
      d = this.window.document;

  var getFuncName = function getFuncName(fn) {
    var name = /\W*function\s+([\w\$]+)\s*\(/.exec(fn);

    if (!name) {
      return '(Anonymous)';
    }

    return name[1];
  };

  var repeat_char = function repeat_char(len, pad_char) {
    var str = "";

    for (var i = 0; i < len; i++) {
      str += pad_char;
    }

    return str;
  };

  var formatArray = function formatArray(obj, cur_depth, pad_val, pad_char) {
    if (cur_depth > 0) {
      cur_depth++;
    }

    var base_pad = repeat_char(pad_val * cur_depth, pad_char);
    var thick_pad = repeat_char(pad_val * (cur_depth + 1), pad_char);
    var str = "";

    if (_typeof(obj) === 'object' && obj !== null && obj.constructor && getFuncName(obj.constructor) !== 'PHPJS_Resource') {
      str += "Array\n" + base_pad + "(\n";

      for (var key in obj) {
        if (obj[key] instanceof Array) {
          str += thick_pad + "[" + key + "] => " + formatArray(obj[key], cur_depth + 1, pad_val, pad_char);
        } else {
          str += thick_pad + "[" + key + "] => " + obj[key] + "\n";
        }
      }

      str += base_pad + ")\n";
    } else if (obj === null || obj === undefined) {
      str = '';
    } else {
      str = obj.toString();
    }

    return str;
  };

  output = formatArray(array, 0, pad_val, pad_char);

  if (return_val !== true) {
    if (d.body) {
      this.echo(output);
    } else {
      try {
        d = XULDocument;
        this.echo('<pre xmlns="http://www.w3.org/1999/xhtml" style="white-space:pre;">' + output + '</pre>');
      } catch (e) {
        this.echo(output);
      }
    }

    return true;
  } else {
    return output;
  }
}

function serialize(mixed_value) {
  var _utf8Size = function _utf8Size(str) {
    var size = 0,
        i = 0,
        l = str.length,
        code = '';

    for (i = 0; i < l; i++) {
      code = str[i].charCodeAt(0);

      if (code < 0x0080) {
        size += 1;
      } else if (code < 0x0800) {
        size += 2;
      } else {
        size += 3;
      }
    }

    return size;
  };

  var _getType = function _getType(inp) {
    var type = _typeof(inp),
        match;

    var key;

    if (type === 'object' && !inp) {
      return 'null';
    }

    if (type === "object") {
      if (!inp.constructor) {
        return 'object';
      }

      var cons = inp.constructor.toString();
      match = cons.match(/(\w+)\(/);

      if (match) {
        cons = match[1].toLowerCase();
      }

      var types = ["boolean", "number", "string", "array"];

      for (key in types) {
        if (cons == types[key]) {
          type = types[key];
          break;
        }
      }
    }

    return type;
  };

  var type = _getType(mixed_value);

  var val,
      ktype = '';

  switch (type) {
    case "function":
      val = "";
      break;

    case "boolean":
      val = "b:" + (mixed_value ? "1" : "0");
      break;

    case "number":
      val = (Math.round(mixed_value) == mixed_value ? "i" : "d") + ":" + mixed_value;
      break;

    case "string":
      val = "s:" + _utf8Size(mixed_value) + ":\"" + mixed_value + "\"";
      break;

    case "array":
    case "object":
      val = "a";
      var count = 0;
      var vals = "";
      var okey;
      var key;

      for (key in mixed_value) {
        if (mixed_value.hasOwnProperty(key)) {
          ktype = _getType(mixed_value[key]);

          if (ktype === "function") {
            continue;
          }

          okey = key.match(/^[0-9]+$/) ? parseInt(key, 10) : key;
          vals += this.serialize(okey) + this.serialize(mixed_value[key]);
          count++;
        }
      }

      val += ":" + count + ":{" + vals + "}";
      break;

    case "undefined":
    default:
      val = "N";
      break;
  }

  if (type !== "object" && type !== "array") {
    val += ";";
  }

  return val;
}

function settype(vr, type) {
  var is_array = function is_array(arr) {
    return _typeof(arr) === 'object' && typeof arr.length === 'number' && !arr.propertyIsEnumerable('length') && typeof arr.splice === 'function';
  };

  var v, mtch, i, obj;
  v = this[vr] ? this[vr] : vr;

  try {
    switch (type) {
      case 'boolean':
        if (is_array(v) && v.length === 0) {
          this[vr] = false;
        } else if (v === '0') {
          this[vr] = false;
        } else if (_typeof(v) === 'object' && !is_array(v)) {
          var lgth = false;

          for (i in v) {
            lgth = true;
          }

          this[vr] = lgth;
        } else {
          this[vr] = !!v;
        }

        break;

      case 'integer':
        if (typeof v === 'number') {
          this[vr] = parseInt(v, 10);
        } else if (typeof v === 'string') {
          mtch = v.match(/^([+\-]?)(\d+)/);

          if (!mtch) {
            this[vr] = 0;
          } else {
            this[vr] = parseInt(v, 10);
          }
        } else if (v === true) {
          this[vr] = 1;
        } else if (v === false || v === null) {
          this[vr] = 0;
        } else if (is_array(v) && v.length === 0) {
          this[vr] = 0;
        } else if (_typeof(v) === 'object') {
          this[vr] = 1;
        }

        break;

      case 'float':
        if (typeof v === 'string') {
          mtch = v.match(/^([+\-]?)(\d+(\.\d+)?|\.\d+)([eE][+\-]?\d+)?/);

          if (!mtch) {
            this[vr] = 0;
          } else {
            this[vr] = parseFloat(v, 10);
          }
        } else if (v === true) {
          this[vr] = 1;
        } else if (v === false || v === null) {
          this[vr] = 0;
        } else if (is_array(v) && v.length === 0) {
          this[vr] = 0;
        } else if (_typeof(v) === 'object') {
          this[vr] = 1;
        }

        break;

      case 'string':
        if (v === null || v === false) {
          this[vr] = '';
        } else if (is_array(v)) {
          this[vr] = 'Array';
        } else if (_typeof(v) === 'object') {
          this[vr] = 'Object';
        } else if (v === true) {
          this[vr] = '1';
        } else {
          this[vr] += '';
        }

        break;

      case 'array':
        if (v === null) {
          this[vr] = [];
        } else if (_typeof(v) !== 'object') {
          this[vr] = [v];
        }

        break;

      case 'object':
        if (v === null) {
          this[vr] = {};
        } else if (is_array(v)) {
          for (i = 0, obj = {}; i < v.length; i++) {
            obj[i] = v;
          }

          this[vr] = obj;
        } else if (_typeof(v) !== 'object') {
          this[vr] = {
            scalar: v
          };
        }

        break;

      case 'null':
        delete this[vr];
        break;
    }

    return true;
  } catch (e) {
    return false;
  }
}

function strval(str) {
  var type = '';

  if (str === null) {
    return '';
  }

  type = this.gettype(str);

  switch (type) {
    case 'boolean':
      if (str === true) {
        return '1';
      }

      return '';

    case 'array':
      return 'Array';

    case 'object':
      return 'Object';
  }

  return str;
}

function unserialize(data) {
  var that = this;

  var utf8Overhead = function utf8Overhead(chr) {
    var code = chr.charCodeAt(0);

    if (code < 0x0080) {
      return 0;
    }

    if (code < 0x0800) {
      return 1;
    }

    return 2;
  };

  var error = function error(type, msg, filename, line) {
    throw new that.window[type](msg, filename, line);
  };

  var read_until = function read_until(data, offset, stopchr) {
    var buf = [];
    var chr = data.slice(offset, offset + 1);
    var i = 2;

    while (chr != stopchr) {
      if (i + offset > data.length) {
        error('Error', 'Invalid');
      }

      buf.push(chr);
      chr = data.slice(offset + (i - 1), offset + i);
      i += 1;
    }

    return [buf.length, buf.join('')];
  };

  var read_chrs = function read_chrs(data, offset, length) {
    var buf;
    buf = [];

    for (var i = 0; i < length; i++) {
      var chr = data.slice(offset + (i - 1), offset + i);
      buf.push(chr);
      length -= utf8Overhead(chr);
    }

    return [buf.length, buf.join('')];
  };

  var _unserialize = function _unserialize(data, offset) {
    var readdata;
    var readData;
    var chrs = 0;
    var ccount;
    var stringlength;
    var keyandchrs;
    var keys;

    if (!offset) {
      offset = 0;
    }

    var dtype = data.slice(offset, offset + 1).toLowerCase();
    var dataoffset = offset + 2;

    var typeconvert = function typeconvert(x) {
      return x;
    };

    switch (dtype) {
      case 'i':
        typeconvert = function typeconvert(x) {
          return parseInt(x, 10);
        };

        readData = read_until(data, dataoffset, ';');
        chrs = readData[0];
        readdata = readData[1];
        dataoffset += chrs + 1;
        break;

      case 'b':
        typeconvert = function typeconvert(x) {
          return parseInt(x, 10) !== 0;
        };

        readData = read_until(data, dataoffset, ';');
        chrs = readData[0];
        readdata = readData[1];
        dataoffset += chrs + 1;
        break;

      case 'd':
        typeconvert = function typeconvert(x) {
          return parseFloat(x);
        };

        readData = read_until(data, dataoffset, ';');
        chrs = readData[0];
        readdata = readData[1];
        dataoffset += chrs + 1;
        break;

      case 'n':
        readdata = null;
        break;

      case 's':
        ccount = read_until(data, dataoffset, ':');
        chrs = ccount[0];
        stringlength = ccount[1];
        dataoffset += chrs + 2;
        readData = read_chrs(data, dataoffset + 1, parseInt(stringlength, 10));
        chrs = readData[0];
        readdata = readData[1];
        dataoffset += chrs + 2;

        if (chrs != parseInt(stringlength, 10) && chrs != readdata.length) {
          error('SyntaxError', 'String length mismatch');
        }

        readdata = that.utf8_decode(readdata);
        break;

      case 'a':
        readdata = {};
        keyandchrs = read_until(data, dataoffset, ':');
        chrs = keyandchrs[0];
        keys = keyandchrs[1];
        dataoffset += chrs + 2;

        for (var i = 0; i < parseInt(keys, 10); i++) {
          var kprops = _unserialize(data, dataoffset);

          var kchrs = kprops[1];
          var key = kprops[2];
          dataoffset += kchrs;

          var vprops = _unserialize(data, dataoffset);

          var vchrs = vprops[1];
          var value = vprops[2];
          dataoffset += vchrs;
          readdata[key] = value;
        }

        dataoffset += 1;
        break;

      default:
        error('SyntaxError', 'Unknown / Unhandled data type(s): ' + dtype);
        break;
    }

    return [dtype, dataoffset - offset, typeconvert(readdata)];
  };

  return _unserialize(data + '', 0)[2];
}

function utf8_decode(str_data) {
  var tmp_arr = [],
      i = 0,
      ac = 0,
      c1 = 0,
      c2 = 0,
      c3 = 0;
  str_data += '';

  while (i < str_data.length) {
    c1 = str_data.charCodeAt(i);

    if (c1 < 128) {
      tmp_arr[ac++] = String.fromCharCode(c1);
      i++;
    } else if (c1 > 191 && c1 < 224) {
      c2 = str_data.charCodeAt(i + 1);
      tmp_arr[ac++] = String.fromCharCode((c1 & 31) << 6 | c2 & 63);
      i += 2;
    } else {
      c2 = str_data.charCodeAt(i + 1);
      c3 = str_data.charCodeAt(i + 2);
      tmp_arr[ac++] = String.fromCharCode((c1 & 15) << 12 | (c2 & 63) << 6 | c3 & 63);
      i += 3;
    }
  }

  return tmp_arr.join('');
}

function utf8_encode(argString) {
  var string = argString + '';
  var utftext = "";
  var start, end;
  var stringl = 0;
  start = end = 0;
  stringl = string.length;

  for (var n = 0; n < stringl; n++) {
    var c1 = string.charCodeAt(n);
    var enc = null;

    if (c1 < 128) {
      end++;
    } else if (c1 > 127 && c1 < 2048) {
      enc = String.fromCharCode(c1 >> 6 | 192) + String.fromCharCode(c1 & 63 | 128);
    } else {
      enc = String.fromCharCode(c1 >> 12 | 224) + String.fromCharCode(c1 >> 6 & 63 | 128) + String.fromCharCode(c1 & 63 | 128);
    }

    if (enc !== null) {
      if (end > start) {
        utftext += string.substring(start, end);
      }

      utftext += enc;
      start = end = n + 1;
    }
  }

  if (end > start) {
    utftext += string.substring(start, string.length);
  }

  return utftext;
}

function var_dump() {
  var output = '',
      pad_char = ' ',
      pad_val = 4,
      lgth = 0,
      i = 0,
      d = this.window.document;

  var _getFuncName = function _getFuncName(fn) {
    var name = /\W*function\s+([\w\$]+)\s*\(/.exec(fn);

    if (!name) {
      return '(Anonymous)';
    }

    return name[1];
  };

  var _repeat_char = function _repeat_char(len, pad_char) {
    var str = '';

    for (var i = 0; i < len; i++) {
      str += pad_char;
    }

    return str;
  };

  var _getInnerVal = function _getInnerVal(val, thick_pad) {
    var ret = '';

    if (val === null) {
      ret = 'NULL';
    } else if (typeof val === 'boolean') {
      ret = 'bool(' + val + ')';
    } else if (typeof val === 'string') {
      ret = 'string(' + val.length + ') "' + val + '"';
    } else if (typeof val === 'number') {
      if (parseFloat(val) == parseInt(val, 10)) {
        ret = 'int(' + val + ')';
      } else {
        ret = 'float(' + val + ')';
      }
    } else if (typeof val === 'undefined') {
      ret = 'undefined';
    } else if (typeof val === 'function') {
      var funcLines = val.toString().split('\n');
      ret = '';

      for (var i = 0, fll = funcLines.length; i < fll; i++) {
        ret += (i !== 0 ? '\n' + thick_pad : '') + funcLines[i];
      }
    } else if (val instanceof Date) {
      ret = 'Date(' + val + ')';
    } else if (val instanceof RegExp) {
      ret = 'RegExp(' + val + ')';
    } else if (val.nodeName) {
      switch (val.nodeType) {
        case 1:
          if (typeof val.namespaceURI === 'undefined' || val.namespaceURI === 'http://www.w3.org/1999/xhtml') {
            ret = 'HTMLElement("' + val.nodeName + '")';
          } else {
            ret = 'XML Element("' + val.nodeName + '")';
          }

          break;

        case 2:
          ret = 'ATTRIBUTE_NODE(' + val.nodeName + ')';
          break;

        case 3:
          ret = 'TEXT_NODE(' + val.nodeValue + ')';
          break;

        case 4:
          ret = 'CDATA_SECTION_NODE(' + val.nodeValue + ')';
          break;

        case 5:
          ret = 'ENTITY_REFERENCE_NODE';
          break;

        case 6:
          ret = 'ENTITY_NODE';
          break;

        case 7:
          ret = 'PROCESSING_INSTRUCTION_NODE(' + val.nodeName + ':' + val.nodeValue + ')';
          break;

        case 8:
          ret = 'COMMENT_NODE(' + val.nodeValue + ')';
          break;

        case 9:
          ret = 'DOCUMENT_NODE';
          break;

        case 10:
          ret = 'DOCUMENT_TYPE_NODE';
          break;

        case 11:
          ret = 'DOCUMENT_FRAGMENT_NODE';
          break;

        case 12:
          ret = 'NOTATION_NODE';
          break;
      }
    }

    return ret;
  };

  var _formatArray = function _formatArray(obj, cur_depth, pad_val, pad_char) {
    var someProp = '';

    if (cur_depth > 0) {
      cur_depth++;
    }

    var base_pad = _repeat_char(pad_val * (cur_depth - 1), pad_char);

    var thick_pad = _repeat_char(pad_val * (cur_depth + 1), pad_char);

    var str = '';
    var val = '';

    if (_typeof(obj) === 'object' && obj !== null) {
      if (obj.constructor && _getFuncName(obj.constructor) === 'PHPJS_Resource') {
        return obj.var_dump();
      }

      lgth = 0;

      for (someProp in obj) {
        lgth++;
      }

      str += 'array(' + lgth + ') {\n';

      for (var key in obj) {
        var objVal = obj[key];

        if (_typeof(objVal) === 'object' && objVal !== null && !(objVal instanceof Date) && !(objVal instanceof RegExp) && !objVal.nodeName) {
          str += thick_pad + '[' + key + '] =>\n' + thick_pad + _formatArray(objVal, cur_depth + 1, pad_val, pad_char);
        } else {
          val = _getInnerVal(objVal, thick_pad);
          str += thick_pad + '[' + key + '] =>\n' + thick_pad + val + '\n';
        }
      }

      str += base_pad + '}\n';
    } else {
      str = _getInnerVal(obj, thick_pad);
    }

    return str;
  };

  output = _formatArray(arguments[0], 0, pad_val, pad_char);

  for (i = 1; i < arguments.length; i++) {
    output += '\n' + _formatArray(arguments[i], 0, pad_val, pad_char);
  }

  if (d.body) {
    this.echo(output);
  } else {
    try {
      d = XULDocument;
      this.echo('<pre xmlns="http://www.w3.org/1999/xhtml" style="white-space:pre;">' + output + '</pre>');
    } catch (e) {
      this.echo(output);
    }
  }
}

function var_export(mixed_expression, bool_return) {
  var retstr = '',
      iret = '',
      cnt = 0,
      x = [],
      i = 0,
      funcParts = [],
      idtLevel = arguments[2] || 2,
      innerIndent = '',
      outerIndent = '';

  var getFuncName = function getFuncName(fn) {
    var name = /\W*function\s+([\w\$]+)\s*\(/.exec(fn);

    if (!name) {
      return '(Anonymous)';
    }

    return name[1];
  };

  var _makeIndent = function _makeIndent(idtLevel) {
    return new Array(idtLevel + 1).join(' ');
  };

  var __getType = function __getType(inp) {
    var i = 0;

    var match,
        type = _typeof(inp);

    if (type === 'object' && inp.constructor && getFuncName(inp.constructor) === 'PHPJS_Resource') {
      return 'resource';
    }

    if (type === 'function') {
      return 'function';
    }

    if (type === 'object' && !inp) {
      return 'null';
    }

    if (type === "object") {
      if (!inp.constructor) {
        return 'object';
      }

      var cons = inp.constructor.toString();
      match = cons.match(/(\w+)\(/);

      if (match) {
        cons = match[1].toLowerCase();
      }

      var types = ["boolean", "number", "string", "array"];

      for (i = 0; i < types.length; i++) {
        if (cons === types[i]) {
          type = types[i];
          break;
        }
      }
    }

    return type;
  };

  var type = __getType(mixed_expression);

  if (type === null) {
    retstr = "NULL";
  } else if (type === 'array' || type === 'object') {
    outerIndent = _makeIndent(idtLevel - 2);
    innerIndent = _makeIndent(idtLevel);

    for (i in mixed_expression) {
      var value = this.var_export(mixed_expression[i], true, idtLevel + 2);
      value = typeof value === 'string' ? value.replace(/</g, '&lt;').replace(/>/g, '&gt;') : value;
      x[cnt++] = innerIndent + i + ' => ' + (__getType(mixed_expression[i]) === 'array' ? '\n' : '') + value;
    }

    iret = x.join(',\n');
    retstr = outerIndent + "array (\n" + iret + '\n' + outerIndent + ')';
  } else if (type === 'function') {
    funcParts = mixed_expression.toString().match(/function .*?\((.*?)\) \{([\s\S]*)\}/);
    retstr = "create_function ('" + funcParts[1] + "', '" + funcParts[2].replace(new RegExp("'", 'g'), "\\'") + "')";
  } else if (type === 'resource') {
    retstr = 'NULL';
  } else {
    retstr = typeof mixed_expression !== 'string' ? mixed_expression : "'" + mixed_expression.replace(/(["'])/g, "\\$1").replace(/\0/g, "\\0") + "'";
  }

  if (bool_return !== true) {
    this.echo(retstr);
    return null;
  } else {
    return retstr;
  }
}

/***/ }),

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/css/app.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;