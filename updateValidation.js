function editMProfile() {
    var password = document.forms["updateMProfile"]["inputPswd"].value;
    var confirmPassword = document.forms["updateMProfile"]["confirmPswd"].value;
    var email = document.forms["updateMProfile"]["email"].value;
    var level = document.forms["updateMProfile"]["level"].value;

  //check if user enter every field
    if (password === "") {
        alert("Password cannot be blank.");
        document.forms["updateMProfile"]["password"].focus();
        return false;
    }
    else if (confirmPassword === ""){
      alert("Date cannot be blank.");
      document.forms["updateMProfile"]["confirmPassword"].focus();
      return false;
    }

    else if (email === ""){
      alert("Time cannot be blank.");
      document.forms["updateMProfile"]["email"].focus();
      return false;
    }
    else if (level === ""){
      alert("Fee cannot be blank.");
      document.forms["updateMProfile"]["level"].focus();
      return false;
    }
    if (password != confirmPassword) {
      alert("Your two password entries are not the same.");
      document.forms["updateMProfile"]["confirmPswd"].focus();
      document.forms["updateMProfile"]["confirmPswd"].select();
      return false
    }

    if (document.activeElement.id == 'updateBtn'){
      var level = document.forms["updateMProfile"]["level"].value;
      if (level === "Choose your level"){
        alert("Level must be either Beginner, Advanced, or Expert.");
        document.forms["updateMProfile"]["level"].focus();
        return false;
      }
    else{
      alert("Thank you, your session is successfully created !");
    }
}
