/*validateSession.js*/

//check the user selected the class type
function checkClassType(){
if (document.activeElement.id == 'submitSession'){
  var classTypes = document.forms["addGSession"]["classTypes"].value;
  if (classTypes === "Choose your class type"){
    alert("Class types must be either Sport, Dance, or MMA.");
    document.forms["addGSession"]["classTypes"].focus();
    return false;
  }
  }
  var date = document.forms["addGSession"]["sessionDate"].value;
  //check date before today
  var strDate = date.split("-");
  var year =  strDate[0];
  var month = strDate[1];
  var day = strDate[2];
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1; // Since first value is 0, add 1 to reflect January as first month
  var yyyy = today.getFullYear();
  if(year < yyyy){
    alert("Year cannot be before today !");
    return false;
  }
  if (year == yyyy && month < mm){
    alert("Month cannot be before today !");
    return false;
  }
  if (year == yyyy && month == mm && day < dd){
      alert("Date cannot be before today !");
      return false;
    }
 //check if user create a session for today
 if (year == yyyy && month == mm && day == dd){
   alert("You cannot create session for today !" + "\n" + "Session should be created one day before !");
    return false;
  }
}

function addPSession() {
    var title = document.forms["addSession"]["title"].value;
    var date = document.forms["addSession"]["sessionDate"].value;
    var time = document.forms["addSession"]["sessionTime"].value;
    var fee = document.forms["addSession"]["sessionFee"].value;

    //check date before today
    var strDate = date.split("-");
    var year =  strDate[0];
    var month = strDate[1];
    var day = strDate[2];
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; // Since first value is 0, add 1 to reflect January as first month
    var yyyy = today.getFullYear();
    if(year < yyyy){
      alert("Year cannot be before today !");
      return false;
    }
    if (year == yyyy && month < mm){
      alert("Month cannot be before today !");
      return false;
    }
    if (year == yyyy && month == mm && day < dd){
        alert("Date cannot be before today !");
        return false;
    }
   //check if user create a session for today
   if (year==yyyy && month==mm && day==dd){
     alert("You cannot create session for today !" + "\n" + "Session should be created one day before !");
      return false;
    }

  //check if user enter every field
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
