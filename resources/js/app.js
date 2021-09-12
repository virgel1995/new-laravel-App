require('./bootstrap');
require('alpinejs');

const jQuery = require("jquery");
jQuery(document).ready(function($) {
    var alterClass = function() {
        var screensize = document.documentElement.clientWidth;
        if (screensize < 600) {

        // $('#feature-hidden').addClass('feature-hidden-class');
        $('.feature-hidden').hide()
        // console.log('added')
      } else if (screensize >= 601) {
        // $('#feature-hidden').removeClass('feature-hidden-class');
        $('.feature-hidden').show()
        // console.log('removed')

      };
    };
    $(window).resize(function(){
      alterClass();
    });
    //Fire it when the page first loads:
    alterClass();
  });



