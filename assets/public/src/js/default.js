(() => {
  require("./components/header.js");
  require("./components/swiper.js");
  require("./components/fetch-posts.js");
  require("./components/img-popup.js");
  require("./components/choose-service.js");
  require("./components/tor-fade.js");
})();

(($) => {
  $(() => {
    // Disable Gravity Form fields
    $(".gform_wrapper .disable input, .gform_wrapper .disable textarea").attr('disabled','disabled');
  });
})(jQuery);