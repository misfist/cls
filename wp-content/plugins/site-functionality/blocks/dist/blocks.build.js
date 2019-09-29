!function(e){function t(o){if(n[o])return n[o].exports;var r=n[o]={i:o,l:!1,exports:{}};return e[o].call(r.exports,r,r.exports,t),r.l=!0,r.exports}var n={};t.m=e,t.c=n,t.d=function(e,n,o){t.o(e,n)||Object.defineProperty(e,n,{configurable:!1,enumerable:!0,get:o})},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="",t(t.s=0)}([function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o=(n(1),n(4),n(8));n.n(o)},function(e,t,n){"use strict";function o(e){if(null==e)throw new TypeError("Cannot destructure undefined")}var r=n(2),c=(n.n(r),n(3)),__=(n.n(c),wp.i18n.__),i=wp.blocks.registerBlockType,l=wp.editor.InnerBlocks,a=[["core/heading",{level:2,content:__("Footnotes","site-functionality"),className:"footnotes-title"}],["core/list",{placeholder:__("Add footnotes items","site-functionality"),tagName:"ol",type:"ol"}]];i("core-functionality/footnotes",{title:__("Footnotes","core-functionality"),icon:{background:"#11155e",foreground:"#ffffff",src:"editor-ol"},category:"common",keywords:[__("footnotes","core-functionality"),__("reference","core-functionality")],className:"footnotes",edit:function(e){o(e.attributes);var t=e.className;e.getAttributes,e.setAttributes;return wp.element.createElement("footer",{className:t,id:"page-footnotes"},wp.element.createElement(l,{template:a,templateLock:"all"}))},save:function(e){o(e.attributes);e.className;return wp.element.createElement("footer",{id:"page-footnotes"},wp.element.createElement(l.Content,null))}})},function(e,t){},function(e,t){},function(e,t,n){"use strict";function o(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}var r,c=n(5),i=(n.n(c),n(6)),l=(n.n(i),n(7)),a=n.n(l);console.log("group loaded");var __=wp.i18n.__,u=wp.blocks.registerBlockType,s=wp.editor,f=s.InspectorControls,p=s.InnerBlocks,m=s.ColorPalette,d=wp.components,g=d.PanelBody,y=d.PanelRow,b={backgroundColor:{type:"string"}};u("core-functionality/group",(r={title:__("Group","core-functionality"),icon:{background:"#11155e",foreground:"#ffffff",src:"screenoptions"},category:"layout",keywords:[__("group","core-functionality"),__("section","core-functionality")]},o(r,"keywords",[__("group section content","core-blocks")]),o(r,"attributes",b),o(r,"supports",{align:["full","wide"]}),o(r,"alignWide",!0),o(r,"anchor",!0),o(r,"customClassName",!0),o(r,"className","group"),o(r,"edit",function(e){var t=e.attributes.backgroundColor,n=e.className,o=(e.getAttributes,e.setAttributes),r=a()(n,{"has-background":t,"block-group":!0});return wp.element.createElement("section",{className:r},wp.element.createElement(f,null,wp.element.createElement(g,{title:__("Color Settings","core-blocks")},wp.element.createElement(y,null,wp.element.createElement(m,{value:t,onChange:function(e){o({backgroundColor:e})}})))),wp.element.createElement("div",{className:"wp-block-functionality-group__inner-container inner-container"},wp.element.createElement(p,null)))}),o(r,"save",function(e){var t=e.attributes.backgroundColor,n=e.className,o=a()(n,{"has-background":t,"block-group":!0});return wp.element.createElement("section",{className:o},wp.element.createElement("div",{className:"wp-block-functionality-group__inner-container inner-container"},wp.element.createElement(p.Content,null)))}),r))},function(e,t){},function(e,t){},function(e,t,n){var o,r;!function(){"use strict";function n(){for(var e=[],t=0;t<arguments.length;t++){var o=arguments[t];if(o){var r=typeof o;if("string"===r||"number"===r)e.push(o);else if(Array.isArray(o)&&o.length){var i=n.apply(null,o);i&&e.push(i)}else if("object"===r)for(var l in o)c.call(o,l)&&o[l]&&e.push(l)}}return e.join(" ")}var c={}.hasOwnProperty;"undefined"!==typeof e&&e.exports?(n.default=n,e.exports=n):(o=[],void 0!==(r=function(){return n}.apply(t,o))&&(e.exports=r))}()},function(e,t){var __=wp.i18n.__,n=wp.compose,o=n.compose,r=n.ifCondition,c=wp.richText,i=c.registerFormatType,l=c.toggleFormat,a=wp.blockEditor.RichTextToolbarButton,u=wp.data.withSelect,s=function(e){return wp.element.createElement(a,{icon:"testimonial",title:__("Insert Tooltip","core-functonality"),onClick:function(){e.onChange(l(e.value,{type:"core-functionality/tooltip"}))},isActive:e.isActive})},f=o(u(function(e){return{selectedBlock:e("core/editor").getSelectedBlock()}}),r(function(e){return e.selectedBlock&&("core/paragraph"===e.selectedBlock.name||"core/list"===e.selectedBlock.name)}))(s);i("core-functionality/tooltip",{title:__("Footnote Citation","core-functonality"),tagName:"a",className:"fn-citation",attributes:{editable:"contenteditable",id:"id",note:"data-note"},edit:f})}]);