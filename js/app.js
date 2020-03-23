var app = {

  // select all elements with .field-input class and store them in fields (array)
  fields: document.querySelectorAll('.field-input'),

  // select DOM elements by their id
  errorsArea = document.getElementById('errors'),
  loginForm: document.getElementById('login-form'),

  init: function() {
    // console.log('app.init');

    // loop on fields array
    for(var fieldIndex = 0; i < app.fields.length; fieldIndex++){

      // console.log(app.fields[i]);

      // store current field
      var currentField = app.fields[i];

      // add listener on blur (lose focus) for currentFieldement sur blur and add function (isInputValid)
      currentField.addEventListener('blur', app.isInputValid);
    }

    // add listener on submit
    app.loginForm.addEventListener('submit', app.isFormValid);
  },

  errors: [],

  // waveEvent or evt or e
  isInputValid: function (evt){

    //console.log(waveEvent);

    var field = evt.target;
    app.checkField(field);
  },

  isFormValid: function (evt) {
    app.clearErrors();
    if (app.hasErrors()) {
      evt.preventDefault();
      app.showErrors();
    }
  },

  hasErrors: function () {
    var usernameField = document.getElementById('field-username');
    var passwordField = document.getElementById('field-password');

    var usernameValid = app.checkField(usernameField);
    var passwordValid = app.checkField(passwordField);

    return !usernameValid || !passwordValid;
  },

  checkField: function(field) {
    field.className = 'field-input';

    if (field.value.length < 3) {
      app.errors.push(field.placeholder + ' doit contenir au moins 3 caractères');
      field.classList.add('invalid');
      return false;
    }

    field.classList.add('valid');
    return true;
  },

  clearErrors: function() {
    app.errors = [];
    app.errorsArea.innerHTML = '';
  },

  showErrors: function() {
    for (var errorIndex = 0; errorIndex < app.errors.length; errorIndex++) {
      app.errorsArea.innerHTML += '<p class="error">' + app.errors[errorIndex] + '</p>';
    }
  },
};

// to have time all DOM loaded
document.addEventListener('DOMContentLoaded', app.init);