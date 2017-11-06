/*updateValidation.js*/

function editMProfile() {
    var password = document.forms["updateMProfile"]["inputPswd"].value;
    var confirmPassword = document.forms["updateMProfile"]["confirmPswd"].value;
    //check if the password enter are the same
    if (password != confirmPassword) {
      alert("Your two password entries are not the same.");
      document.forms["updateMProfile"]["confirmPswd"].focus();
      document.forms["updateMProfile"]["confirmPswd"].select();
      return false
      }

    else{
      alert("Thank you, your profile is successfully updated !");
    }

}

function editTProfile() {
    var password = document.forms["updateTProfile"]["inputPswd"].value;
    var confirmPassword = document.forms["updateTProfile"]["confirmPswd"].value;
    var email = document.forms["updateTProfile"]["email"].value;
    var specialty = document.forms["updateTProfile"]["specialty"].value;
    //check if the password enter are the same
    if (password != confirmPassword) {
      alert("Your two password entries are not the same.");
      document.forms["updateTProfile"]["confirmPswd"].focus();
      document.forms["updateTProfile"]["confirmPswd"].select();
      return false
    }

    else{
      alert("Thank you, your profile is successfully updated !");
    }
}
