$(document).ready(function(){
    // Add smooth scrolling to all links
    $(".nav-link").on('click', function(event) {
        var hash = this.hash;

        $('html, body').animate({
          scrollTop: $(hash).offset().top - $("#menu-bar").height()
        }, 800);
    });
  });