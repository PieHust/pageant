"use strict";

$(function () {

  "use strict";

  var $txt = $("#txt"), $txt1 = $("#txt1"),
      anim = function anim() {
    $({ storoke: 50 }).animate({
      storoke: 10
    }, {
      duration: 600,
      easing: "easeInBounce",
      step: function step(stroke) {
        $txt[0].style.cssText += ";-webkit-text-stroke:" + (stroke | 0) + "px #B71C1C";
        // $txt[1].style.cssText += ";-webkit-text-stroke:" + (stroke | 0) + "px #B71C1C";
      }
    }).animate({
      storoke: 50
    }, {
      duration: 400,
      easing: "easeInBounce",
      step: function step(stroke) {
        $txt[0].style.cssText += ";-webkit-text-stroke:" + (stroke | 0) + "px #B71C1C";
        // $txt[1].style.cssText += ";-webkit-text-stroke:" + (stroke | 0) + "px #B71C1C";
      },
      complete: anim
    });
  };

  anim();

  
});