var app = {

  // select all elements with .field-input class and store them in fields (array)
  fields: document.querySelectorAll('.field-input'),

  // select DOM elements by their id
  errorsArea = document.getElementById('errors'),
  loginForm: document.getElementById('login-form'),

  init: function() {
    // console.log('app.init');

    // loop on fields array
    for(let i = 0; i < app.fields.length; i++){

      // console.log(app.fields[i]);

      // store current field
      let currentField = app.fields[i];

      // add listener on blur (lose focus) for currentFieldement sur blur and add function (isInputValid)
      currentField.addEventListener('blur', app.isInputValid);
    }

    // add listener on submit
    app.loginForm.addEventListener('submit', app.isFormValid);
  },

  // waveEvent or evt or e
  isInputValid: function (waveEvent){

    //console.log(waveEvent);

    let field = waveEvent.target;
    app.checkField(field);
  },

  isFormValid: function(event)  {

    // stop browser to send form
    event.preventDefault();

    let isOneError = false;

    // loop on fields array
    for(let i = 0; i < app.fields.length; i++){

      // store current field
      let currentField = app.fields[i];

      // check one by one fields when form is sent and store result
      let result = app.checkField(currentField);

      // if no error but result is false then pass error to true
      if(isOneError === false && result === false){
        // at least one error
        isOneError = true;
      }
    }

    // check if no error
    if(isOneError === false){

      let form = event.target;

      // submit is special function for form
      form.submit();
    }
  },

  checkField: function (myField){

    // clean string
    let inputValue = myField.value.trim();

    // condition length >= 3 for valid
    if(inputValue.length < 3){

      // in this case delete valid class
      myField.classList.remove('valid');
      myField.classList.add('invalid');

      // return value to check if form is sent (false then no form sent)
      return false;

    } else {

      // the reverse for this case
      myField.classList.remove('invalid');
      myField.classList.add('valid');

      return true;
    }
  }
};

// to have time all DOM loaded
document.addEventListener('DOMContentLoaded', app.init);