function _gambitRefreshScroll(){var $=jQuery;_gambitScrollTop=window.pageYOffset,_gambitScrollLeft=window.pageXOffset}function _gambitParallaxAll(){_gambitRefreshScroll();for(var t=0;t<_gambitImageParallaxImages.length;t++)_gambitImageParallaxImages[t].doParallax()}function _vcRowGetAllElementsWithAttribute(t){for(var e=[],i=document.getElementsByTagName("*"),a=0,n=i.length;n>a;a++)i[a].getAttribute(t)&&e.push(i[a]);return e}function _vcRowOnPlayerReady(t){var e=t.target;e.playVideo(),e.isMute&&e.mute();var i=e.getCurrentTime(),a=+new Date/1e3,n=0,r=!0;e.loopInterval=setInterval(function(){"undefined"!=typeof e.loopTimeout&&clearTimeout(e.loopTimeout),i==e.getCurrentTime()?n=i+(+new Date/1e3-a):(n=e.getCurrentTime(),a=+new Date/1e3),i=e.getCurrentTime(),n+(r?.45:.21)>=e.getDuration()&&(e.pauseVideo(),e.seekTo(0),e.playVideo(),r=!1)},150)}function _vcRowOnPlayerStateChange(t){t.data===YT.PlayerState.ENDED?("undefined"!=typeof t.target.loopTimeout&&clearTimeout(t.target.loopTimeout),t.target.seekTo(0)):t.data===YT.PlayerState.PLAYING&&jQuery(t.target.getIframe()).parent().css("visibility","visible")}function resizeVideo(t){var e=t.parent();if(null===e.find("iframe").width())return void setTimeout(function(){resizeVideo(t)},500);var i=t;i.css({width:"auto",height:"auto",left:"auto",top:"auto"}),i.css("position","absolute");var a=e.find("iframe").width(),n=e.find("iframe").height(),r=e.width(),s=e.height(),o,d,g,l,p="16:9";"undefined"!=typeof t.attr("data-video-aspect-ratio")&&-1!==t.attr("data-video-aspect-ratio").indexOf(":")&&(p=t.attr("data-video-aspect-ratio").split(":"),p[0]=parseFloat(p[0]),p[1]=parseFloat(p[1])),d=s,o=p[0]/p[1]*s,g=p[0]/p[1]*s-r,l=r*p[1]/p[0]-s,o>=r&&d>=s?(height=s,width=p[0]/p[1]*s):(width=r,height=r*p[1]/p[0]),marginTop=-(height-s)/2,marginLeft=-(width-r)/2,e.find("iframe").css({width:width,height:height,marginLeft:marginLeft,marginTop:marginTop})}function onYouTubeIframeAPIReady(){for(var t=_vcRowGetAllElementsWithAttribute("data-youtube-video-id"),e=0;e<t.length;e++){for(var i=t[e].getAttribute("data-youtube-video-id"),a="",n=0;n<t[e].childNodes.length;n++)if(/div/i.test(t[e].childNodes[n].tagName)){a=t[e].childNodes[n].getAttribute("id");break}if(""!==a){var r=t[e].getAttribute("data-mute"),s=new YT.Player(a,{height:"auto",width:"auto",videoId:i,playerVars:{autohide:1,autoplay:1,fs:0,showinfo:0,loop:1,modestBranding:1,start:0,controls:0,rel:0,disablekb:1,iv_load_policy:3,wmode:"transparent"},events:{onReady:_vcRowOnPlayerReady,onStateChange:_vcRowOnPlayerStateChange}});s.isMute="true"===r,"true"===t[e].getAttribute("data-youtube-video-id")&&s.setPlaybackQuality("hd720"),setTimeout(function(){jQuery("#"+a).css("visibility","visible")},500)}}}if("undefined"==typeof Modernizr&&(window.Modernizr=function(t,e,i){function a(t){h.cssText=t}function n(t,e){return a(u.join(t+";")+(e||""))}function r(t,e){return typeof t===e}function s(t,e){return!!~(""+t).indexOf(e)}function o(t,e,a){for(var n in t){var s=e[t[n]];if(s!==i)return a===!1?t[n]:r(s,"function")?s.bind(a||e):s}return!1}var d="2.8.3",g={},l=e.documentElement,p="modernizr",c=e.createElement(p),h=c.style,m,f={}.toString,u=" -webkit- -moz- -o- -ms- ".split(" "),b={},v={},y={},w=[],T=w.slice,x,I=function(t,i,a,n){var r,s,o,d,g=e.createElement("div"),c=e.body,h=c||e.createElement("body");if(parseInt(a,10))for(;a--;)o=e.createElement("div"),o.id=n?n[a]:p+(a+1),g.appendChild(o);return r=["&#173;",'<style id="s',p,'">',t,"</style>"].join(""),g.id=p,(c?g:h).innerHTML+=r,h.appendChild(g),c||(h.style.background="",h.style.overflow="hidden",d=l.style.overflow,l.style.overflow="hidden",l.appendChild(h)),s=i(g,t),c?g.parentNode.removeChild(g):(h.parentNode.removeChild(h),l.style.overflow=d),!!s},P={}.hasOwnProperty,_;_=r(P,"undefined")||r(P.call,"undefined")?function(t,e){return e in t&&r(t.constructor.prototype[e],"undefined")}:function(t,e){return P.call(t,e)},Function.prototype.bind||(Function.prototype.bind=function(t){var e=this;if("function"!=typeof e)throw new TypeError;var i=T.call(arguments,1),a=function(){if(this instanceof a){var n=function(){};n.prototype=e.prototype;var r=new n,s=e.apply(r,i.concat(T.call(arguments)));return Object(s)===s?s:r}return e.apply(t,i.concat(T.call(arguments)))};return a}),b.touch=function(){var i;return"ontouchstart"in t||t.DocumentTouch&&e instanceof DocumentTouch?i=!0:I(["@media (",u.join("touch-enabled),("),p,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(t){i=9===t.offsetTop}),i};for(var k in b)_(b,k)&&(x=k.toLowerCase(),g[x]=b[k](),w.push((g[x]?"":"no-")+x));return g.addTest=function(t,e){if("object"==typeof t)for(var a in t)_(t,a)&&g.addTest(a,t[a]);else{if(t=t.toLowerCase(),g[t]!==i)return g;e="function"==typeof e?e():e,"undefined"!=typeof enableClasses&&enableClasses&&(l.className+=" "+(e?"":"no-")+t),g[t]=e}return g},a(""),c=m=null,g._version=d,g._prefixes=u,g.testStyles=I,g}(this,this.document)),function(){for(var t=0,e=["ms","moz","webkit","o"],i=0;i<e.length&&!window.requestAnimationFrame;++i)window.requestAnimationFrame=window[e[i]+"RequestAnimationFrame"];window.requestAnimationFrame||(window.requestAnimationFrame=function(t,e){return window.setTimeout(function(){t()},16)})}(),"undefined"==typeof _gambitImageParallaxImages)var _gambitImageParallaxImages=[],_gambitScrollTop,_gambitWindowHeight,_gambitScrollLeft,_gambitWindowWidth;!function($,t,e,i){function a(t,e){this.element=t,this.settings=$.extend({},r,e),""==this.settings.align&&(this.settings.align="center"),this._defaults=r,this._name=n,this.init()}var n="gambitImageParallax",r={direction:"up",mobileenabled:!1,mobiledevice:!1,width:"",height:"",align:"center",opacity:"1",velocity:".3",image:"",target:"",repeat:!1,loopScroll:"",loopScrollTime:"2",removeOrig:!1,complete:function(){}};$.extend(a.prototype,{init:function(){""===this.settings.target&&(this.settings.target=$(this.element)),this.settings.target.addClass(this.settings.direction),""===this.settings.image&&"undefined"!=typeof $(this.element).css("backgroundImage")&&""!==$(this.element).css("backgroundImage")&&(this.settings.image=$(this.element).css("backgroundImage").replace(/url\(|\)|"|'/g,"")),_gambitImageParallaxImages.push(this),this.setup(),this.settings.complete(),this.containerWidth=0,this.containerHeight=0},setup:function(){this.settings.removeOrig!==!1&&$(this.element).remove(),this.resizeParallaxBackground()},doParallax:function(){if(!this.settings.mobiledevice||this.settings.mobileenabled){if("fixed"==this.settings.direction)return void(t.devicePixelRatio>1&&$(this.settings.target).hide().show(0));if(this.isInView()){var e=this.settings.target.find(".parallax-inner");e.css({minHeight:"150px"});var i=this.settings.target.width()+parseInt(this.settings.target.css("paddingRight"))+parseInt(this.settings.target.css("paddingLeft")),a=this.settings.target.height()+parseInt(this.settings.target.css("paddingTop"))+parseInt(this.settings.target.css("paddingBottom"));if(0===this.containerWidth||0===this.containerHeight||i===this.containerWidth&&a===this.containerHeight||this.resizeParallaxBackground(),this.containerWidth=i,this.containerHeight=a,"undefined"!=typeof e&&0!==e.length){var n=(_gambitScrollTop-this.scrollTopMin)/(this.scrollTopMax-this.scrollTopMin),r=this.moveMax*n;("left"==this.settings.direction||"up"==this.settings.direction)&&(r*=-1);var s="translate3d(",o="px, 0px, 0px)",d="translate3d(0px, ",g="px, 0px)";"undefined"!=typeof _gambitParallaxIE9&&(s="translate(",o="px, 0px)",d="translate(0px, ",g="px)"),"no-repeat"==e.css("background-repeat")&&("down"==this.settings.direction&&0>r&&(r=0),"up"==this.settings.direction&&r>0&&(r=0)),e.css("left"===this.settings.direction||"right"===this.settings.direction?{webkitTransition:"webkitTransform 1ms linear",mozTransition:"mozTransform 1ms linear",msTransition:"msTransform 1ms linear",oTransition:"oTransform 1ms linear",transition:"transform 1ms linear",webkitTransform:s+r+o,mozTransform:s+r+o,msTransform:s+r+o,oTransform:s+r+o,transform:s+r+o}:{webkitTransition:"webkitTransform 1ms linear",mozTransition:"mozTransform 1ms linear",msTransition:"msTransform 1ms linear",oTransition:"oTransform 1ms linear",transition:"transform 1ms linear",webkitTransform:d+r+g,mozTransform:d+r+g,msTransform:d+r+g,oTransform:d+r+g,transform:d+r+g}),e.css({webkitTransition:"webkitTransform -1ms linear",mozTransition:"mozTransform -1ms linear",msTransition:"msTransform -1ms linear",oTransition:"oTransform -1ms linear",transition:"transform -1ms linear"})}}}},isInView:function(){var t=this.settings.target;if("undefined"!=typeof t&&0!==t.length){var e=t.offset().top,i=t.height()+parseInt(t.css("paddingTop"))+parseInt(t.css("paddingBottom"));return _gambitScrollTop>e+i||e>_gambitScrollTop+_gambitWindowHeight?!1:!0}},resizeParallaxBackground:function(){var t=this.settings.target;if("undefined"!=typeof t&&0!==t.length){var e="true"===this.settings.repeat||this.settings.repeat===!0||1===this.settings.repeat;if("none"===this.settings.direction){var i=t.width()+parseInt(t.css("paddingRight"))+parseInt(t.css("paddingLeft")),a=t.offset().left;"center"===this.settings.align?a="50% 50%":"left"===this.settings.align?a="0% 50%":"right"===this.settings.align?a="100% 50%":"top"===this.settings.align?a="50% 0%":"bottom"===this.settings.align&&(a="50% 100%"),t.css({opacity:Math.abs(parseFloat(this.settings.opacity)/100),backgroundSize:"cover",backgroundAttachment:"scroll",backgroundPosition:a,backgroundRepeat:"no-repeat"}),""!==this.settings.image&&"none"!==this.settings.image&&t.css({opacity:Math.abs(parseFloat(this.settings.opacity)/100),backgroundImage:"url("+this.settings.image+")"})}else if("fixed"===this.settings.direction)t.css({backgroundAttachment:"fixed",backgroundRepeat:"repeat"}),""!==this.settings.image&&"none"!==this.settings.image&&t.attr("style","background-image: url("+this.settings.image+") !important;"+t.attr("style"));else if("left"===this.settings.direction||"right"===this.settings.direction){var i=t.width()+parseInt(t.css("paddingRight"))+parseInt(t.css("paddingLeft")),n=t.height()+parseInt(t.css("paddingTop"))+parseInt(t.css("paddingBottom")),r=i;i+=400*Math.abs(parseFloat(this.settings.velocity));var s="0%";"center"===this.settings.align?s="50%":"bottom"===this.settings.align&&(s="100%");var o=0;"right"===this.settings.direction&&(o-=i-r),t.find(".parallax-inner").length<1&&t.prepend('<div class="parallax-inner"></div>'),t.css({position:"relative",overflow:"hidden",zIndex:1}).attr("style","background-image: none !important; "+t.attr("style")).find(".parallax-inner").css({pointerEvents:"none",width:i,height:n,position:"absolute",zIndex:-1,top:0,left:o,opacity:Math.abs(parseFloat(this.settings.opacity)/100),backgroundPosition:e?"0 0 ":"50% "+s,backgroundRepeat:e?"repeat":"no-repeat"}),""!==this.settings.image&&"none"!==this.settings.image&&t.find(".parallax-inner").css({opacity:Math.abs(parseFloat(this.settings.opacity)/100),backgroundImage:"url("+this.settings.image+")"});var d=0;t.offset().top>_gambitWindowHeight&&(d=t.offset().top-_gambitWindowHeight);var g=t.offset().top+t.height()+parseInt(t.css("paddingTop"))+parseInt(t.css("paddingBottom"));this.moveMax=i-r,this.scrollTopMin=d,this.scrollTopMax=g}else{var l=800;"down"===this.settings.direction&&(l*=1.2);var i=t.width()+parseInt(t.css("paddingRight"))+parseInt(t.css("paddingLeft")),n=t.height()+parseInt(t.css("paddingTop"))+parseInt(t.css("paddingBottom")),p=n;n+=l*Math.abs(parseFloat(this.settings.velocity));var o="0%";"center"===this.settings.align?o="50%":"right"===this.settings.align&&(o="100%");var s=0;"down"===this.settings.direction&&(s-=n-p),t.find(".parallax-inner").length<1&&t.prepend('<div class="parallax-inner"></div>'),t.css({position:"relative",overflow:"hidden",zIndex:1}).attr("style","background-image: none !important; "+t.attr("style")).find(".parallax-inner").css({pointerEvents:"none",width:i,height:n,position:"absolute",zIndex:-1,top:s,left:0,opacity:Math.abs(parseFloat(this.settings.opacity)/100),backgroundPosition:e?"0":o+" 50%",backgroundRepeat:e?"repeat":"no-repeat"}),""!==this.settings.image&&"none"!==this.settings.image&&t.find(".parallax-inner").css({opacity:Math.abs(parseFloat(this.settings.opacity)/100),backgroundImage:"url("+this.settings.image+")"});var d=0;t.offset().top>_gambitWindowHeight&&(d=t.offset().top-_gambitWindowHeight);var g=t.offset().top+t.height()+parseInt(t.css("paddingTop"))+parseInt(t.css("paddingBottom"));this.moveMax=n-p,this.scrollTopMin=d,this.scrollTopMax=g}}}}),$.fn[n]=function(t){return this.each(function(){$.data(this,"plugin_"+n)||$.data(this,"plugin_"+n,new a(this,t))}),this}}(jQuery,window,document),jQuery(document).ready(function($){"use strict";function t(){_gambitRefreshScroll();for(var e=0;e<_gambitImageParallaxImages.length;e++)_gambitImageParallaxImages[e].doParallax();requestAnimationFrame(t)}function e(){_gambitScrollTop=window.pageYOffset,_gambitWindowHeight=$(window).height(),_gambitScrollLeft=window.pageXOffset,_gambitWindowWidth=$(window).width()}$(window).on("scroll touchmove touchstart touchend gesturechange mousemove",function(t){requestAnimationFrame(_gambitParallaxAll)}),(Modernizr.touch&&jQuery(window).width()<=1024||window.screen.width<=1281&&window.devicePixelRatio>1)&&requestAnimationFrame(t),$(window).on("resize",function(){setTimeout(function(){var $=jQuery;e(),$.each(_gambitImageParallaxImages,function(t,e){e.resizeParallaxBackground()})},1)}),setTimeout(function(){var $=jQuery;e(),$.each(_gambitImageParallaxImages,function(t,e){e.resizeParallaxBackground()})},1),setTimeout(function(){var $=jQuery;e(),$.each(_gambitImageParallaxImages,function(t,e){e.resizeParallaxBackground()})},100)}),jQuery(document).ready(function($){"use strict";function t(){return Modernizr.touch&&jQuery(window).width()<=1e3||window.screen.width<=1281&&window.devicePixelRatio>1}if(!$("body").hasClass("vc_editor")){t()&&$(".bg-parallax.video > div, .gambit-bg-parallax.video > div").remove();var e=function(){var $=jQuery;$(".bg-parallax, .gambit-bg-parallax").each(function(){var t=$(this).next();if(0!=t.length&&"undefined"!=typeof $(this).attr("data-break-parents")){var e=parseInt($(this).attr("data-break-parents"));if(!isNaN(e)){for(var i=t.parent(),a=0;e>a&&!i.is("html");a++)i=i.parent();"undefined"==typeof t.attr("data-orig-margin-left")?(t.attr("data-orig-margin-left",t.css("marginLeft")),t.attr("data-orig-padding-left",t.css("paddingLeft")),t.attr("data-orig-margin-right",t.css("marginRight")),t.attr("data-orig-padding-right",t.css("paddingRight"))):(t[0].style.removeProperty("margin-left"),t[0].style.removeProperty("padding-left"),t[0].style.removeProperty("margin-right"),t[0].style.removeProperty("padding-right"),t[0].style.setProperty("margin-left",t.attr("data-orig-margin-left"),"important"),t[0].style.setProperty("padding-left",t.attr("data-orig-padding-left"),"important"),t[0].style.setProperty("margin-right",t.attr("data-orig-margin-right"),"important"),t[0].style.setProperty("padding-right",t.attr("data-orig-padding-right"),"important"));var n=i.width()+parseInt(i.css("paddingLeft"))+parseInt(i.css("paddingRight")),r=t.width()+parseInt(t.css("paddingLeft"))+parseInt(t.css("paddingRight")),s=t.offset().left-i.offset().left,o=i.offset().left+n-(t.offset().left+r),d=parseFloat(t.css("marginLeft")),g=parseFloat(t.css("marginRight")),l=parseFloat(t.css("paddingLeft")),p=parseFloat(t.css("paddingRight"));d-=s,l+=s,g-=o,p+=o,t[0].style.removeProperty("margin-left"),t[0].style.removeProperty("padding-left"),t[0].style.removeProperty("margin-right"),t[0].style.removeProperty("padding-right"),t[0].style.setProperty("margin-left",d+"px","important"),t[0].style.setProperty("padding-left",l+"px","important"),t[0].style.setProperty("margin-right",g+"px","important"),t[0].style.setProperty("padding-right",p+"px","important"),t.addClass("broke-out broke-out-"+e)}}})};$(window).resize(e),e(),$(".bg-parallax, .gambit-bg-parallax").next().addClass("bg-parallax-parent"),$(".bg-parallax.parallax, .gambit-bg-parallax.parallax").attr("style","").css("display","none"),$(".bg-parallax.parallax, .gambit-bg-parallax.parallax").each(function(){$(this).gambitImageParallax({image:$(this).attr("data-bg-image"),direction:$(this).attr("data-direction"),mobileenabled:$(this).attr("data-mobile-enabled"),mobiledevice:t(),opacity:$(this).attr("data-opacity"),width:$(this).attr("data-bg-width"),height:$(this).attr("data-bg-height"),velocity:$(this).attr("data-velocity"),align:$(this).attr("data-bg-align"),repeat:$(this).attr("data-bg-repeat"),target:$(this).next(),complete:function(){}})})}});var tag=document.createElement("script");tag.src="https://www.youtube.com/iframe_api";var firstScriptTag=document.getElementsByTagName("script")[0];firstScriptTag.parentNode.insertBefore(tag,firstScriptTag),jQuery(document).ready(function($){if(!$("body").hasClass("vc_editor")){$(".bg-parallax.video, .gambit-bg-parallax.video").each(function(){$(this).prependTo($(this).next().addClass("video")),$(this).css({opacity:Math.abs(parseFloat($(this).attr("data-opacity"))/100)})});var t=$("[data-youtube-video-id], [data-vimeo-video-id]").parent();t.css("overflow","hidden"),$("[data-youtube-video-id], [data-vimeo-video-id]").each(function(){var t=$(this);setTimeout(function(){resizeVideo(t)},100)}),$(window).resize(function(){$("[data-youtube-video-id], [data-vimeo-video-id]").each(function(){var t=$(this);setTimeout(function(){resizeVideo(t)},2)})}),$("[data-vimeo-video-id]").each(function(){var t=$f($(this).find("iframe")[0]),e=$(this);t.addEvent("ready",function(){"true"===e.attr("data-mute")&&t.api("setVolume",0),t.addEvent("playProgress",function i(t,e){jQuery("#"+e).parent().css("visibility","visible")})})})}});