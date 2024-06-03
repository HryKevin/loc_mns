// controle de l'email et du mot de passe
document.addEventListener("DOMContentLoaded", function () {
  let user_email = document.querySelector("#user_email");

  user_email.addEventListener("blur", function (e) {
    let errorElement = document.querySelector("#error");
    if (
      user_email.value.match(
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))/i
      )
    ) {
      errorElement.innerHTML = "Email valide";
      errorElement.style.color = "green"; 
    } else {
      errorElement.innerHTML = "Email invalide";
      errorElement.style.color = "red"; 
    }
  });
});

// verification de tous les champs
let datakeys = document.querySelectorAll(
  "input[data-required], textarea[data-required], select[data-required]"
);
let form = document.querySelector("#form");

btn_submit.addEventListener("click", function (e) {
  

  // verification si tous les champs sont remplis
  let allFieldsFilled = true;
  datakeys.forEach(function (field) {
    if (field.value.trim() === "") {
      allFieldsFilled = false;
    }
  });

  // Si tous les champs sont remplis
  if (allFieldsFilled) {
    form.submit();
  } else {
    e.preventDefault();
    alert("Veuillez remplir tous les champs obligatoires");;
  }
});

// oeil

let eye = document.querySelector("#eye");
let password = document.querySelector("#user_password");

eye.addEventListener("click", function () {
  if (password.type === "password") {
    password.type = "text";
    eye.src = "assets/img/eye-closed.svg"; 
  } else {
    password.type = "password";
    eye.src = "assets/img/eye-open.svg"; 
  }
});