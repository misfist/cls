import $ from 'jquery';
import whatInput from 'what-input';


window.$ = $;

import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
// import './lib/foundation-explicit-pieces';

$(document).foundation();


console.log( 'foundation.js loaded' );

const mainNav = new Foundation.DropdownMenu($('#site-navigation'), {});