/*!
* jQuery Smoove v0.2.11 (http://smoove.js.org/)
* Copyright (c) 2017 Adam Bouqdib
* Licensed under GPL-2.0 (http://abemedia.co.uk/license) 
*/
!function(o,s,e){function t(o,s,e){function t(o){return o.charAt(0).toUpperCase()+o.slice(1)}for(var r=["webkit","moz","ms","o"],a={},n=0;n<r.length;n++)e&&(s=s.replace(e,"-"+r[n]+"-"+e)),a[t(r[n])+t(o)]=s;return a[o]=s,a}function r(e){for(var r=o(s).height(),a=(o(s).width(),0);a<o.fn.smoove.items.length;a++){var n=o.fn.smoove.items[a],i=n.params;if(!n.hasClass("smooved")){var l=!e||"down"===e&&"1"===n.css("opacity")?0:i.offset,f=o(s).scrollTop()+r-n.offset().top;if("string"==typeof l&&l.indexOf("%")&&(l=parseInt(l)/100*r),f<l||"first"==e){isNaN(i.opacity)||n.css({opacity:i.opacity});for(var c=[],d=["move","move3D","moveX","moveY","moveZ","rotate","rotate3d","rotateX","rotateY","rotateZ","scale","scale3d","scaleX","scaleY","skew","skewX","skewY"],m=0;m<d.length;m++)void 0!==i[d[m]]&&(c[d[m]]=i[d[m]]);var v="";for(var p in c)v+=p.replace("move","translate")+"("+c[p]+") ";v&&(n.css(t("transform",v)),n.parent().css(t("perspective",i.perspective)),i.transformOrigin&&n.css(t("transformOrigin",i.transformOrigin))),void 0!==i.delay&&i.delay>0&&n.css("transition-delay",parseInt(i.delay)+"ms"),n.addClass("first_smooved")}else!0==!n.hasClass("first_smooved")?(n.css("opacity",1).css(t("transform","translate(0px, 0px)")).css("transform",""),n.addClass("smooved"),n.parent().addClass("smooved")):(jQuery("body").addClass("has-smoove"),f<l?n.stop().delay(1e3).queue((function(o){jQuery(this).css("opacity",1).css(t("transform","translate(0px, 0px)")).css("transform",""),n.addClass("smooved"),n.parent().addClass("smooved"),n.removeClass("first_smooved"),o()})):(n.stop().delay(1e3).queue((function(o){s.scrollTo(s.scrollX,s.scrollY+1)})),n.removeClass("first_smooved")))}}}function a(o,s,e){var t,r;return s=s||250,function(){var a=e||this,n=+new Date,i=arguments;t&&n<t+s?(clearTimeout(r),r=setTimeout((function(){t=n,o.apply(a,i)}),s)):(t=n,o.apply(a,i))}}o.fn.smoove=function(s){return o.fn.smoove.init(this,o.extend({},o.fn.smoove.defaults,s)),this},o.fn.smoove.items=[],o.fn.smoove.loaded=!1,o.fn.smoove.defaults={offset:"50%",opacity:0,delay:"0ms",duration:"500ms",transition:"",transformStyle:"preserve-3d",transformOrigin:!1,perspective:1e3,min_width:768,min_height:!1},o.fn.smoove.init=function(n,i){if(n.each((function(){var s=o(this),e=s.params=o.extend({},i,s.data());s.data("top",s.offset().top),e.transition=t("transition",e.transition,"transform"),s.css(e.transition),o.fn.smoove.items.push(s)})),!o.fn.smoove.loaded){o.fn.smoove.loaded=!0;var l,f=0,c=o(s).height(),d=o(s).width(),m=o(e).height();o("body").width()===o(s).width()&&o("body").css("overflow-x","hidden"),o(s).on("orientationchange resize",(function(){clearTimeout(l),l=setTimeout((function(){var a=o(s).height(),n=o(s).width(),i=c>a?i="up":"down",l=o.fn.smoove.items;if(c=a,d!==n){for(var f=0;f<l.length;f++)l[f].css(t("transform","")).css(t("transition",""));var v=setInterval((function(){var t=o(e).height();if(t===m){s.clearInterval(v);for(var a=0;a<l.length;a++)l[a].data("top",l[a].offset().top),l[a].css(l[a].params.transition);r(i)}m=t}),500)}else r(i);d=n}),500)})),o("body").hasClass("elementor-editor-active")?o("iframe#elementor-preview-iframe").ready((function(){r("first"),o(s).on("scroll",a((function(){var e=o(s).scrollTop(),t=e<f?t="up":"down";f=e,r(t)}),250)),s.scrollTo(s.scrollX,s.scrollY+1)})):o(s).on("load",(function(){r("first"),o(s).on("scroll",a((function(){var e=o(s).scrollTop(),t=e<f?t="up":"down";f=e,r(t)}),250)),jQuery(s).height()>=jQuery(e).height()&&r("down"),s.scrollTo(s.scrollX,s.scrollY+1)}))}}}(jQuery,window,document);