!function(n,e){var t=function(n){return n.trim?n.trim():n.replace(/^\s+|\s+$/g,"")},i=function(n,e){return-1!==(" "+n.className+" ").indexOf(" "+e+" ")},a=function(n,e){i(n,e)||(n.className=""===n.className?e:n.className+" "+e)},r=function(n,e){n.className=t((" "+n.className+" ").replace(" "+e+" "," "))},o=function(n,e){if(n)do{if(n.id===e)return!0;if(9===n.nodeType)break}while(n=n.parentNode);return!1},s=e.documentElement,d=(n.Modernizr.prefixed("transform"),n.Modernizr.prefixed("transition")),c=function(){var n={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",msTransition:"MSTransitionEnd",transition:"transitionend"};return n.hasOwnProperty(d)?n[d]:!1}();n.App=function(){var t=!1,l={},v=(e.getElementById("inner-wrap"),e.getElementById("navoverlay-wrap")),u=!1,f="js-nav";return l.init=function(){if(!t){t=!0;var p=function(n){n&&n.target===v&&e.removeEventListener(c,p,!1),u=!1};l.closeNav=function(){if(u){var t=c&&d?parseFloat(n.getComputedStyle(v,"")[d+"Duration"]):0;t>0?e.addEventListener(c,p,!1):p(null)}r(s,f)},l.openNav=function(){u||(a(s,f),u=!0)},l.toggleNav=function(n){u&&i(s,f)?l.closeNav():l.openNav(),n&&n.preventDefault()},e.getElementById("nav-open-btn").addEventListener("click",l.toggleNav,!1),e.getElementById("nav-close-btn").addEventListener("click",l.toggleNav,!1),e.addEventListener("click",function(n){u&&!o(n.target,"navoverlay")&&(n.preventDefault(),l.closeNav())},!0),a(s,"js-ready")}},l}(),n.addEventListener&&n.addEventListener("DOMContentLoaded",n.App.init,!1)}(window,window.document);