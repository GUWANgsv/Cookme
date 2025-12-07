$(document).ready(function() {
  $('#loginForm').on('submit', function(e) {
    if ($('#email').val() == '' || $('#password').val() == '') {
      alert('Both fields are required!');
      e.preventDefault();
    }
  });
});