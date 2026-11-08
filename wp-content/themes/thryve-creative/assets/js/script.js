(function ($) {
  $(document).ready(function () {
    
    const $header = $('#main-header');
    const $window = $(window);
    const $goTop = $('.thryvewp-go-to-top');

    // Sticky header (check if sticky plugin exists)
    if ($header.length && $.fn.sticky) {
      $header.sticky({ topSpacing: 0 });
    }

     // Show / hide scroll-to-top button
    function toggleGoTop() {
      if ($window.scrollTop() > 100) {
        $goTop.fadeIn();
      } else {
        $goTop.fadeOut();
      }
    }

    $window.on('scroll', toggleGoTop);
    toggleGoTop(); // Run on page load

    // Scroll to top on click
    $goTop.on('click', function (e) {
      e.preventDefault();
      $('html, body').animate({ scrollTop: 0 }, 600);
    });

    wow = new WOW({
      boxClass: "wow", // default
      animateClass: "animated", // default
      offset: 0, // default
      mobile: true, // default
      live: true, // default
    });
    wow.init();
  });
})(jQuery);
