// formValidation.js

/* Validate when a user registers for an account (member or trainer) */
function registerAccount() {
  var pwd = document.forms["registerMember"]["inputPswd"].value;
  var pwd2 = document.forms["registerMember"]["confirmPswd"].value;
  var pwd3 = document.forms["registerTrainer"]["inputPswd"].value;
  var pwd4 = document.forms["registerTrainer"]["confirmPswd"].value;

  //to confirm the password entries are the same
  if ((pwd != pwd2) || (pwd3 != pwd4)) {
    alert("Your two password entries are not the same.");
    document.forms["registerMember"]["confirmPswd"].focus();
    document.forms["registerMember"]["confirmPswd"].select();
    document.forms["registerTrainer"]["confirmPswd"].focus();
    document.forms["registerTrainer"]["confirmPswd"].select();
    return false
  }
  //to confirm user choose a level
  if (document.activeElement.id == 'registerMBtn'){
    var level = document.forms["registerMember"]["level"].value;
    if (level === "Choose your level"){
      alert("Level must be either Beginner, Advanced, or Expert.");
      document.forms["registerMember"]["level"].focus();
      return false;
    }
  }
}

function updateSession() {
    var date = document.forms["updateSession"]["sessionDate"].value;
    var time = document.forms["updateSession"]["sessionTime"].value;
    var fee = document.forms["updateSession"]["sessionFee"].value;
    var status = document.forms["updateSession"]["sessionStatus"].value;
    var classType = document.forms["updateSession"]["sessionType"].value;
    //to check user have enter every field of the form
    if (date === ""){
      alert("Date cannot be blank.");
      document.forms["updateSession"]["sessionDate"].focus();
      return false;
    }
    else if (time === ""){
      alert("Time cannot be blank.");
      document.forms["updateSession"]["sessionTime"].focus();
      return false;
    }
    else if (fee === ""){
      alert("Fee cannot be blank.");
      document.forms["updateSession"]["sessionFee"].focus();
      return false;
    }
    //to confirm user have choose a status
    else if (status === "Choose status"){
      alert("Status must be either Cancelled, Completed, or Available.");
      document.forms["updateSession"]["sessionStatus"].focus();
      return false;
    }
    //to check user have choose a class type
    else if (classType === "Choose class type"){
      alert("Class type must be either Sport, Dance, or MMA.");
      document.forms["updateSession"]["sessionType"].focus();
      return false;
    }
    else{
      alert("Session updated successfully !");
    }
}

function searchTrainingHist() {
   // Declare variables
  var input = document.getElementById("s");
  var table = document.getElementById("tb");
  var filter = input.value.toUpperCase();
  var rows = table.getElementsByTagName("tr");
  var on = 0;
   // Loop through all table rows, and hide those who don't match the search query
   for (i = 0; i < rows.length; i++)
     {
       //don't initiate search unless user types at least 3 characters. This will greatly improve performance and usability especially with large tables.
       if (filter.length >= 3)
       {
   	     var match = false;
         var tdList = rows[i].getElementsByTagName("td");

   	  //loop through every td
   	    for (j = 0; j < tdList.length; j++)
   	    {
   	       var td = tdList[j];

           if (td)
   	       {
             if (td.innerText.toUpperCase().indexOf(filter) > -1) {
   		    match = true;
             }
   	       }
         }

   	    if (match == true)
     	  {
             rows[i].style.display = "";
     	  }
   	    else
     	  {
     		rows[i].style.display = "none";
     	  }
   	  }
       else
       {
         rows[i].style.display = "";
       }
    }
}


function sortTrainingHist(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("t");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
