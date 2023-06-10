document.addEventListener('DOMContentLoaded', function() {
  var formContainer = document.querySelector('.register-form-container');
  var formHeight = formContainer.offsetHeight;

  formContainer.style.height = '0';
  formContainer.style.opacity = '0';

  setTimeout(function() {
      formContainer.style.transition = 'height 0.3s ease, opacity 0.3s ease';
      formContainer.style.height = formHeight + 'px';
      formContainer.style.opacity = '1';
  }, 500);
});