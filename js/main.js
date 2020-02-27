$(document).ready(function(){
  // Add smooth scrolling to all links
  $(".nav-link").on('click', function (event) {
    var hash = this.hash;

    $('html, body').animate({
      scrollTop: $(hash).offset().top - $("#menu-bar").height()
    }, 800);

    return false;
  });
});

(function () {
  'use strict';
  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
