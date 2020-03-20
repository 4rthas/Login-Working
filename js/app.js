var app = {

  // select all elements with .field-input class and store them in fields (array)
  fields: document.querySelectorAll('.field-input'),

  init: function() {
    console.log('app.init');

    // loop on fields array
    for(let i = 0; i < app.fields.length; i++){

      console.log(app.fields[i]);

      // store current field
      let currentField = app.fields[i];

      // add listener on blur (lose focus) for currentFieldement sur blur and add function (isInputValid)
      currentField.addEventListener('blur', app.isInputValid);
    }
  },

  // waveEvent or evt or e
  isInputValid: function (waveEvent){

    console.log(waveEvent);
  },
};



document.addEventListener('DOMContentLoaded', app.init);