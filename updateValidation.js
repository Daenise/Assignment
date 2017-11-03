function editMProfile() {
    var password = document.forms["updateMProfile"]["inputPswd"].value;
    var confirmPassword = document.forms["updateMProfile"]["confirmPswd"].value;
    var email = document.forms["updateMProfile"]["email"].value;
    var level = document.forms["updateMProfile"]["level"].value;

    if (password != confirmPassword) {
      alert("Your two password entries are not the same.");
      document.forms["updateMProfile"]["confirmPswd"].focus();
      document.forms["updateMProfile"]["confirmPswd"].select();
      return false
    }
    if (password === ""){
      alert("Date cannot be blank.");
      document.forms["updateMProfile"]["inputPswd"].focus();
      return false;
    }
    else if (confirmPassword === ""){
      alert("Time cannot be blank.");
      document.forms["updateMProfile"]["confirmPswd"].focus();
      return false;
    }
    else if (email === ""){
      alert("Fee cannot be blank.");
      document.forms["updateMProfile"]["email"].focus();
      return false;
    }
    else{
      alert("Session updated successfully !");
    }
}
    else{
      alert("Thank you, your profile is successfully updated !");
    }
}

function editTProfile() {
    var password = document.forms["updateTProfile"]["inputPswd"].value;
    var confirmPassword = document.forms["updateTProfile"]["confirmPswd"].value;
    var email = document.forms["updateTProfile"]["email"].value;
    var level = document.forms["updateTProfile"]["level"].value;

    if (password != confirmPassword) {
      alert("Your two password entries are not the same.");
      document.forms["updateTProfile"]["confirmPswd"].focus();
      document.forms["updateTProfile"]["confirmPswd"].select();
      return false
    }
    if (password === ""){
      alert("Password cannot be blank.");
      document.forms["updateTProfile"]["inputPswd"].focus();
      return false;
    }
    else if (confirmPassword === ""){
      alert("Password cannot be blank.");
      document.forms["updateTProfile"]["confirmPswd"].focus();
      return false;
    }
    else if (email === ""){
      alert("Email cannot be blank.");
      document.forms["updateTProfile"]["email"].focus();
      return false;
    }
    else if (specialty === ""){
      alert("Specialty cannot be blank.");
      document.forms["updateTProfile"]["specialty"].focus();
      return false;
    }
}
    else{
      alert("Thank you, your profile is successfully updated !");
    }
}
