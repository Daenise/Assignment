
function checkClassType(){
if (document.activeElement.id == 'submitSession'){
  var classTypes = document.forms["addGSession"]["classTypes"].value;
  if (classTypes === "Choose your class type"){
    alert("Class types must be either Sport, Dance, or MMA.");
    document.forms["addGSession"]["classTypes"].focus();
    return false;
  }
}
}

function addPSession() {
    var title = document.forms["addSession"]["title"].value;
    var date = document.forms["addSession"]["sessionDate"].value;
    var time = document.forms["addSession"]["sessionTime"].value;
    var fee = document.forms["addSession"]["sessionFee"].value;
    if (title === "") {
        alert("Title cannot be blank.");
        document.forms["addSession"]["title"].focus();
        return false;
    }
    else if (date === ""){
      alert("Date cannot be blank.");
      document.forms["addSession"]["sessionDate"].focus();
      return false;
    }
    else if (time === ""){
      alert("Time cannot be blank.");
      document.forms["addSession"]["sessionTime"].focus();
      return false;
    }
    else if (fee === ""){
      alert("Fee cannot be blank.");
      document.forms["addSession"]["sessionFee"].focus();
      return false;
    }
    else{
      alert("Thank you, your session is successfully created !");
    }
}
