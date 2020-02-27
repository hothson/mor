/*
Baobav.js
Background Video/Image Player

Version: 0.0.8 FREEPLUS Version
Author: Romot

usage : 

bav('#element').play({
    videos: Array,
    images: Array
  },{
    autoPlay: true,                 // 自動再生(今のところ必ず指定する)
    loop: true,                     // ループ再生
    loopMode: 'repeatAll',          // ループの動作 'repeatAll'
                                    // repeatAll: ループ後、最初からすべてをループ
                                    // repeatLast: ループ後、最後を連続再生
                                    // repeatFirst : ループ後、最初を連続再生
                                    // random : ランダム
    muted: true,                    // 音声非再生
    playbackRate: 1.0               // 再生スピード
    parallax: false,                // 偽パララックス(position: fixed or absolute)
    fullWidth: true,                // 親エレメントに対して最大化
    keepAspect: true,               // 動画・静止画のアスペクト比を保ったまま拡大・縮小
    baseClass: 'bav',               // ベースクラス
    backgroundColor: '#000',        // 背景カラー
    transitionEffect: 'crossfade',  // 切り替え動作
                                    // crossfade : 現在の動画/画像をフェードアウト、次の動画/画像をフェードイン
    transitionSpeed: 700,           // アニメーションスピード(ms)
    slideSpeed: 5000,               // 静止画スライドの切り替えスピード(ms)
    inSlowFallback: 0,              // ビデオの読み込みが遅いの場合に静止画スライドに切り替える(ms、0の場合は行わない)(現状実装なし)
    debug: false                    // デバッグモード
});

*/

(function(window, undefined){
  'use strict';
  
  var isObject = function (obj) {
    return (obj instanceof Object && Object.getPrototypeOf(obj) === Object.prototype) ? true : false;
  };
  
  var isArray = function(obj) {
    return Object.prototype.toString.call(obj) === '[object Array]';
  };
  
  var mergeObject = function (currentObj, newObj, unrecurse) {
    var key;
    for (key in newObj) {
      if (!unrecurse && isObject(currentObj[key]) && isObject(newObj[key])) {
        mergeObject(currentObj[key], newObj[key], unrecurse);
      } else {
        currentObj[key] = newObj[key];
      }
    }
    return currentObj;
  };
  
  var canPlayVideo = function() {
    return (!!document.createElement('video').canPlayType);
  };
  
  var isMobile = function() {
    var mobile;
    if (sessionStorage.desktop) {
      return false;
    } else if (localStorage.mobile) {
      return true;
    }
    
    mobile = ['iphone','ipad','android','blackberry','nokia','opera mini','windows mobile','windows phone','iemobile']; 
    for (var i in mobile) {
      if (navigator.userAgent.toLowerCase().indexOf(mobile[i].toLowerCase()) > 0) {
        return true;
      }
    }
    return false;
  };
  
  var canTransform = function() {
    var prefixes;
    prefixes = 'transform WebkitTransform MozTransform OTransform msTransform'.split(' ');
    for(var i = 0; i < prefixes.length; i++) {
      if(document.createElement('div').style[prefixes[i]] !== void 0) {
        return prefixes[i];
      }
    }
    return false;
  };
  
  var defaults = {
    autoPlay: true,                 // 自動再生
    delayStart: 0,                  // 開始を遅らせます
    loop: true,                     // ループ再生
    loopMode: 'repeatAll',          // すべて再生後最初に戻り繰り返す
    muted: true,                    // 音声を再生しない
    playbackRate: 1.0,              // 再生スピード
    parallax: false,                // パララックス(position: fixed or absolute)
    fullWidth: true,                // 親エレメントに対して最大化
    keepAspect: true,               // 動画・静止画のアスペクト比を保ったまま拡大・縮小
    baseClass: 'bav',               // ベースクラス
    backgroundColor: '#000',        // 背景カラー
    transitionEffect: 'crossfade',  // クロスフェードで切り替え
    transitionSpeed: 700,           // アニメーションスピード(700ms)
    slideSpeed: 5000,               // 静止画を5000msごとに切り替える
    inSlowFallback: 0,              // ビデオの読み込みが遅いの場合に静止画に切り替えない 
    debug: false                    // デバッグモード
  };
  
  var bav = function (containerId) {
    return new Baobav(containerId);
  };
  
  var Baobav = function(containerId) {
    var container;
    
    if (typeof(containerId) !== 'string') {
      throw new Error('allow id or body only');
    }
    container = (containerId === 'body') ? document.body : document.getElementById(containerId);
    
    if (container === null) {
      throw new Error('container element not found');
    }
    
    this.container = container;
    
    return this;
  };
  
  Baobav.fn = Baobav.prototype = {
  
    play: function(files, params) {
      var self, opt, started, looped, base, videos, images, index;
      
      self = this;
      opt = mergeObject(defaults, params || {});
      videos = [];
      images = [];
      files.videos = files.videos || [];
      files.images = files.images || [];
      started = false;
      looped = false;
      index = 0;
      
      var getDimension = function(elemHeight, elemWidth) {
        var baseHeight, baseWidth, height, width;
        height = 'auto';
        width = 'auto';
        baseHeight = base.clientHeight;
        baseWidth = base.clientWidth;
        if (opt.fullWidth) {
          height = '100%';
          width = '100%';
        }
        if (opt.fullWidth && opt.keepAspect) {
          if (baseHeight < (baseWidth * (elemHeight / elemWidth))) {
            height = (baseWidth * (elemHeight / elemWidth)).toString() + 'px';
            width = baseWidth.toString() + 'px';
          } else {
            height = baseHeight.toString() + 'px';
            width = (baseHeight * (elemWidth / elemHeight)).toString() + 'px';
          }
        }     
        
        return {
          height: height,
          width: width
        };
      };

      var setNextIndex = function(max) {
        if (opt.loop) {
          switch (opt.loopMode) {
            case 'repeatAll':
              if (index === max) {
                index = 0;
                if (!looped) { looped = true; }
              } else {
                index++;
              }
              break;
              
            case 'repeatLast':
              if (index === max) {
                index = max;
                if (!looped) { looped = true; }
              } else {
                index++;
              }
              break;
              
            case 'repeatFirst':
              if (index === max || (index === 0 && looped)) {
                index = 0;
                if (!looped) { looped = true; }
              } else {
                index++;
              }
              break;
            case 'random':
              var c, cand;
              if (max > 0) {
                cand = Math.floor(Math.random() * max + 1);
                while (cand === index || c > 100) {
                  cand = Math.floor(Math.random() * max + 1);
                  c++;
                }
                index = cand;
              } else {
                index = 0;
              }
              break;
          }
        } else {
          return;
        }
      };

      var playVideo = function(e) {
        e.target.play();
      };
      
      var setVideoSize = function(elem) {
        var dimension;
        dimension = getDimension(elem.videoHeight, elem.videoWidth);
        elem.style.height = dimension.height;
        elem.style.width = dimension.width;
        elem.style.maxHeight = 'none';
        elem.style.maxWidth = 'none';
      };

      var playVideoBefore = function(e) {
        var current;
        current = e.target;
        setVideoSize(current);
        current.style.position = (opt.parallax) ? 'fixed' : 'absolute';
        
        if (opt.fullWidth) {
          if (canTransform()) {
            current.style.top = '50%';
            current.style.left = '50%';
            current.style.transform = 'translate(-50%, -50%)';
            current.style.WebkitTransform = 'translate(-50%, -50%)';
            current.style.msTransform = 'translate(-50%, -50%)';
            current.style.MozTransform = 'translate(-50%, -50%)';
            current.style.OTransform = 'translate(-50%, -50%)';
          } else {
            current.style.top = '0';
            current.style.left = '0';
          }
        }
      };
      
      var playVideoAfter = function(e) {
        var current, next;
        current = e.target;
        setNextIndex(videos.length - 1);
        next = videos[index];
        current.className = 'inactive';
        next.className = 'active';
        next.removeEventListener('canplay', playVideo, false);
        next.addEventListener('canplay', playVideo, false);
        next.play();
      };
      
      var setImageSize = function(elem) {
        var dimension;
        dimension = getDimension(elem.height, elem.width);
        elem.style.height = dimension.height;
        elem.style.width = dimension.width;
        elem.style.maxHeight = 'none';
        elem.style.maxWidth = 'none';
      };
      
      var playImageBefore = function(e) {
        var current;
        current = e.target || e.srcElement;
        setImageSize(current);
        current.style.position = 'absolute';
        
        if (opt.fullWidth) {
          if (canTransform()) {
            current.style.top = '50%';
            current.style.left = '50%';
            current.style.transform = 'translate(-50%, -50%)';
            current.style.WebkitTransform = 'translate(-50%, -50%)';
            current.style.msTransform = 'translate(-50%, -50%)';
            current.style.MozTransform = 'translate(-50%, -50%)';
            current.style.OTransform = 'translate(-50%, -50%)';
          } else {
            current.style.top = '0';
            current.style.left = '0';            
          }
        }
      };
      
      var playImages = function() {
        window.setInterval(function() {
          var current, next;
          current = images[index];          
          setNextIndex(images.length - 1);
          next = images[index];
          current.className = 'inactive';
          next.className = 'active';
        }
        , opt.slideSpeed);
      };
      
      var init = function() {
      
        base = document.createElement('div');
        base.className = opt.baseClass;
        base.style.backgroundColor = opt.backgroundColor;
        base.style.overflow = 'hidden';
        if (opt.fullWidth) {
          base.style.position = 'absolute';
          base.style.top = '0%';
          base.style.left = '0%';
          base.style.height = '100%';
          base.style.width = '100%';
          base.style.zIndex = '-100';
        } else {
          base.style.position = 'relative';
          base.style.zIndex = '-100';
        }
        
        switch (opt.transitionEffect) {
          case 'crossfade':
            (function() {
              var css, rules, baseClass, speed, fadein, fadeout;
              css = document.createElement('style');
              css.media = 'screen';
              css.type = 'text/css';
              baseClass = '.' + opt.baseClass;
              speed = opt.transitionSpeed.toString() + 'ms ease; ';
              fadein = '{' + [
                '0% {opacity: 0}',
                '100% {opacity: 1.0}'
              ].join(' ') + '}';
              fadeout = '{' + [
                '0% {opacity: 1.0}',
                '100% {opacity: 0}'
              ].join('') + '}';
              rules = document.createTextNode([
                ([baseClass, '.loading { opacity: 0; filter: progid:DXImageTransform.Microsoft.Alpha(Opacity="0");}'].join(' ')),
                ([baseClass, '.active { opacity: 1.0; filter: progid:DXImageTransform.Microsoft.Alpha(Opacity="100"); z-index: -1; animation: bav-crossfade-in ' + speed + '-webkit-animation: bav-crossfade-in ' + speed + '-moz-animation: bav-crossfade-in ' + speed + '-o-animation: bav-crossfade-in' + speed + '}'].join(' ')),
                ([baseClass, '.inactive { opacity: 0; filter: progid:DXImageTransform.Microsoft.Alpha(Opacity="0"); z-index: 0; animation: bav-crossfade-out ' + speed + '-webkit-animation: bav-crossfade-out ' + speed + '-moz-animation: bav-crossfade-out ' + speed + '-o-animation: bav-crossfade-out ' + speed + '}'].join(' ')),
                (['@keyframes ' + 'bav-crossfade-in', fadein].join(' ')),
                (['@-webkit-keyframes ' + 'bav-crossfade-in', fadein].join(' ')),
                (['@-moz-keyframes ' + 'bav-crossfade-in', fadein].join(' ')),
                (['@-o-keyframes ' + 'bav-crossfade-in', fadein].join(' ')),
                (['@keyframes ' + 'bav-crossfade-out', fadeout].join(' ')),
                (['@-webkit-keyframes ' + 'bav-crossfade-out', fadeout].join(' ')),
                (['@-moz-keyframes ' + 'bav-crossfade-out', fadeout].join(' ')),
                (['@-o-keyframes ' + 'bav-crossfade-out', fadeout].join(' '))
              ].join(''));
              if (css.styleSheet) {
                  css.styleSheet.cssText = rules.nodeValue;
              } else {
                  css.appendChild(rules);
              }
              document.getElementsByTagName('head')[0].appendChild(css);
            }());
          break;
        }
      
        if (files.videos.length > 0 && (!isMobile() && canPlayVideo())) {
          for (var i = 0; i < files.videos.length; i++) {
            videos[i] = document.createElement('video');
            videos[i].src = files.videos[i];
            videos[i].preload = 'none';
            videos[i].autoplay = false;
            videos[i].muted = opt.muted;
            videos[i].playbackRate = opt.playbackRate;
            if (i === 0) {
              videos[i].preload = 'auto';
              if (opt.autoPlay) {
                videos[i].autoplay = true;
              }
            }
            videos[i].className = 'loading';
            
            videos[i].removeEventListener('loadedmetadata', playVideoBefore, false);
            videos[i].addEventListener('loadedmetadata', playVideoBefore, false);
            videos[i].removeEventListener('ended', playVideoAfter, false);
            videos[i].addEventListener('ended', playVideoAfter, false);
            
            base.appendChild(videos[i]);
          }
          
          window.onresize = function() {
            for (var o = 0; o < videos.length; o++) {
              setVideoSize(videos[o]);
            }
          };
          
        } else {
          
          for (var n = 0; n < files.images.length; n++) {
            images[n] = document.createElement('img');
            images[n].src = files.images[n];
            images[n].className = 'loading';
            if(images[n].addEventListener) {
              images[n].removeEventListener('load', playImageBefore, false);
              images[n].addEventListener('load', playImageBefore, false);
            }
            if(images[n].attachEvent) {
              images[n].detachEvent('onload', playImageBefore);
              images[n].attachEvent('onload', playImageBefore);           
            }
            
            base.appendChild(images[n]);
          }
          
          window.onresize = function() {
            for (var l = 0; l < images.length; l++) {
              setImageSize(images[l]);
            }
          };
        }
        
        self.container.appendChild(base);
      };
      
      var start = function() {
        var videoStart = function() {
          videos[0].play();
          videos[0].className = 'active';
          for (var d = 0; d < videos.length; d++) {
            videos[d].preload = 'metadata';
          }
          started = true;
        };
        var imageStart = function(e) {
          var current;
          playImageBefore(e);
          current = e.target || e.srcElement;
          current.className = 'active';
          playImages(); 
          started = true;
        };
      
        init();
        
        if (videos.length > 0 && (!isMobile() && canPlayVideo())) {
          if (opt.autoPlay && !started) {
            videos[0].addEventListener('canplay', videoStart, false);
          }
        } else {      
          if (opt.autoPlay && !started && images[0]) {
            if (images[0].addEventListener) {
              images[0].addEventListener('load', imageStart, false);
            }
            if (images[0].attachEvent) {
              images[0].attachEvent('onload', imageStart);
            }
          }    
        }
      };
      var delayStart = 0;
      if(opt.delayStart && opt.delayStart > 0){
          delayStart = opt.delayStart;
      }
      setTimeout(function(){start(); }, delayStart);
      return this;
      
    }
    
  };
  
  if (window.bav === void 0) {
    window.bav = bav;  
  }
  
})(window);