$ = jQuery;

var SmoothScroll,
    ShareButtons;

SmoothScroll = {

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

ShareButtons = {

  init: function() {

    // facebook
    $('#share-menu .share-fb').click( function() {
      var shareurl = $(this).data('shareurl');
      window.open('https://www.facebook.com/sharer/sharer.php?u='+escape(shareurl)+'&t='+document.title, '',
      'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
      return false;
    });

    // twitter
    $('#share-menu .share-twitter').click( function() {
      var shareurl = $(this).data('shareurl');
      window.open('https://twitter.com/share?url='+escape(shareurl)+'&text='+document.title, '',
      'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
      return false;
    });

  }

};

PrintButton = {

  init: function() {
    $('#share-menu .print-pdf').click( function() {
      window.print();
      return false;
    });
  }

};

$(function() {
    SmoothScroll.init();
    ShareButtons.init();
    PrintButton.init();
});
