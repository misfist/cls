!function(e){function t(r){if(n[r])return n[r].exports;var o=n[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,t),o.l=!0,o.exports}var n={};t.m=e,t.c=n,t.d=function(e,n,r){t.o(e,n)||Object.defineProperty(e,n,{configurable:!1,enumerable:!0,get:r})},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="",t(t.s=0)}([function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});n(1),n(5),n(8)},function(e,t,n){"use strict";var r=n(2),o=(n.n(r),n(3)),i=(n.n(o),n(4)),l=n.n(i),__=wp.i18n.__,a=wp.blocks.registerBlockType,c=wp.editor,s=c.InspectorControls,u=c.InnerBlocks,p=c.ColorPalette,m=wp.components,f=m.PanelBody,w=m.PanelRow,d={backgroundColor:{type:"string"}};a("custom/group",{title:__("Group","site-functionality"),icon:"screenoptions",category:"layout",keywords:[__("group","site-functionality"),__("section","site-functionality")],attributes:d,supports:{align:["full","wide"]},alignWide:!0,anchor:!0,customClassName:!0,className:"group",edit:function(e){var t=e.attributes.backgroundColor,n=e.className,r=(e.getAttributes,e.setAttributes),o=l()(n,{"has-background":t,"block-group":!0});return wp.element.createElement("div",{className:o},wp.element.createElement(s,null,wp.element.createElement(f,{title:__("Color Settings","core-blocks")},wp.element.createElement(w,null,wp.element.createElement(p,{value:t,onChange:function(e){r({backgroundColor:e})}})))),wp.element.createElement("div",{className:"wp-block-functionality-group__inner-container inner-container"},wp.element.createElement(u,null)))},save:function(e){var t=e.attributes.backgroundColor,n=e.className,r=l()(n,{"has-background":t,"block-group":!0});return wp.element.createElement("div",{className:r},wp.element.createElement("div",{className:"wp-block-functionality-group__inner-container inner-container"},wp.element.createElement(u.Content,null)))}})},function(e,t){},function(e,t){},function(e,t,n){var r,o;!function(){"use strict";function n(){for(var e=[],t=0;t<arguments.length;t++){var r=arguments[t];if(r){var o=typeof r;if("string"===o||"number"===o)e.push(r);else if(Array.isArray(r)&&r.length){var l=n.apply(null,r);l&&e.push(l)}else if("object"===o)for(var a in r)i.call(r,a)&&r[a]&&e.push(a)}}return e.join(" ")}var i={}.hasOwnProperty;"undefined"!==typeof e&&e.exports?(n.default=n,e.exports=n):(r=[],void 0!==(o=function(){return n}.apply(t,r))&&(e.exports=o))}()},function(e,t,n){"use strict";function r(e){if(null==e)throw new TypeError("Cannot destructure undefined")}var o=n(6),i=(n.n(o),n(7)),__=(n.n(i),wp.i18n.__),l=wp.blocks.registerBlockType,a=wp.editor,c=a.InnerBlocks;a.InspectorControls,a.withColors,a.PanelColorSettings,a.getColorClassName,wp.components.ColorPalette;l("custom/intro",{title:__("Intro Section","site-functionality"),icon:"editor-aligncenter",category:"layout",keywords:[__("intro","site-functionality"),__("div","site-functionality")],anchor:!0,customClassName:!0,className:"intro",edit:function(e){r(e.attributes);var t=e.className;e.getAttributes,e.setAttributes;return wp.element.createElement("div",{className:t},wp.element.createElement("div",{className:"wp-block-functionality-intro__inner-container inner-container"},wp.element.createElement(c,null)))},save:function(e){r(e.attributes);e.className;return wp.element.createElement("div",null,wp.element.createElement("div",{className:"wp-block-functionality-intro__inner-container inner-container"},wp.element.createElement(c.Content,null)))}})},function(e,t){},function(e,t){},function(e,t,n){"use strict";function r(e){if(null==e)throw new TypeError("Cannot destructure undefined")}var o=n(9),i=(n.n(o),n(10)),__=(n.n(i),wp.i18n.__),l=wp.blocks.registerBlockType,a=wp.editor.InnerBlocks;l("custom/content-footer",{title:__("Content Footer Section","site-functionality"),icon:"format-aside",category:"layout",keywords:[__("footer","site-functionality"),__("section","site-functionality")],anchor:!0,customClassName:!0,className:"content-footer",edit:function(e){r(e.attributes);var t=e.className;e.getAttributes,e.setAttributes;return wp.element.createElement("section",{className:t},wp.element.createElement("div",{className:"wp-block-functionality-intro__inner-container inner-container"},wp.element.createElement(a,null)))},save:function(e){r(e.attributes);e.className;return wp.element.createElement("section",null,wp.element.createElement("div",{className:"wp-block-functionality-intro__inner-container inner-container"},wp.element.createElement(a.Content,null)))}})},function(e,t){},function(e,t){}]);