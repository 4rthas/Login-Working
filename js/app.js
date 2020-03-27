var app = {
    //minimum of characters for fields
    minChars: 3,

    // content of each value for html element
    usernameField: null,
    passwordField: null,
    loginForm: null,
    errorsElement: null,

    // for theme switcher
    themeSwitcherForm: null,

    // check fields
    isFieldValid: function(inputElement){
      // return a boolean
      return inputElement.value.length >= app.minChars;
    },

    // change class in red or green when lose focus (blur)
    // input (username or password)
    changeFieldClass: function(inputElement){
      // retrieve value set in field
      var fieldValue = inputElement.value;
      // if length isn't sufficent
      if (fieldValue.length < app.minChars){
        console.log("min chars not matched !");

        // add or remove class keeping others already setted
        inputElement.classList.add("invalid");
        inputElement.classList.remove("valid");
      }
      else {
        inputElement.classList.remove("invalid");
        inputElement.classList.add("valid");
      }
    },

    // function loaded when blur (lost focus) come
    handleFieldBlur: function(event){
      console.log("blur come !");

      // display html element on which event come (here the field)
      console.log(event.currentTarget);

      // load function that change class on event on dedicated field losing focus (blur)
      //en lui passant le champ ayant perdu son focus
      app.changeFieldClass(event.currentTarget);
    },

    // loaded when form submitted with event in argument and check fileds
    handleFormSubmission: function(event){
      // stop form submission
      event.preventDefault();

      // delete error messages in case present
      app.errorsElement.innerHTML = "";

      // form is valid by default
      var isValid = true;

      if (app.isFieldValid(app.usernameField)){
        console.log("username is valid");
      }
      else {
        // version with innerHTML to insert html
        app.errorsElement.innerHTML += "<div>Le champ de pseudo est trop court ! 3 caractères minimum SVP.</div>";

        isValid = false;
      }

      if (app.isFieldValid(app.passwordField)){
        console.log("password est valide");
      }
      else {
        // version with createElement and appendChild

        // store html tag in memory (not yet in DOM)
        var errorDiv = document.createElement("div");

        // add to errordiv html string
        errorDiv.innerHTML = "Le champ du mot de passe est trop court ! 3 caractères minimum SVP.";
        // add them in DOM at inside the div (the div with #errors) at the end
        app.errorsElement.appendChild(errorDiv);

        isValid = false;
      }

      // if form always valid so true
      if (isValid){
        // remove event listener
        app.loginForm.removeEventListener("submit", app.handleFormSubmission);
        // form submitted
        app.loginForm.submit();
      }
    },

    //appelée quand on change la valeur du theme switcher dans l'entête du site
    handleThemeSwitch: function(){
      //cible le formulaire et déclenche sa soumission
      document.getElementById("theme-switcher-form").submit();
    },

    init: function() {
      console.log('app.init'); 
      // target on the 2 fields
      app.usernameField = document.getElementById("field-username");
      app.passwordField = document.getElementById("field-password");

      // listening on blur event
      app.usernameField.addEventListener("blur", app.handleFieldBlur);
      app.passwordField.addEventListener("blur", app.handleFieldBlur);

      // target on the form
      app.loginForm = document.getElementById("login-form");
      // listening on submit event
      app.loginForm.addEventListener("submit", app.handleFormSubmission);

      // target on tag #errors which will content errors
      app.errorsElement = document.getElementById("errors");

      // target on theme form to switch it
      app.themeSwitcherForm = document.getElementById("theme-switcher-select");
      app.themeSwitcherForm.addEventListener("change", app.handleThemeSwitch);
    }
  };

  // the event listener wait for whole DOM constructed and loaded by browser
  document.addEventListener('DOMContentLoaded', app.init);