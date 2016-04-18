var Erudit;
Erudit = {
    init: function() {
      // smooth scroll for all anchor links
        $("a[href*=#]:not([href=#])").click(function(a) {
            a.preventDefault();
            $("html,body").animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    }
};
$(function() {
    Erudit.init();
});
