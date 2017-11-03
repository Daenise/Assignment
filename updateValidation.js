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

    else{
      alert("Thank you, your profile is successfully updated !");
    }
}
