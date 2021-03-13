// document.getElementById("selectuser").addEventListener("click", function (){
//   alert("coucou");
// });
var indexCurrent = 0;

function superAdmSelectTable(){
  var index = document.getElementById("selectTables").selectedIndex;

  // if selectedIndex has changed
  console.log("index:" + index + " indexCurrent:" + indexCurrent);
  if (indexCurrent != index){
    // reset msg error
    document.getElementById("superAdmError").innerHTML = "";
    
    // show div of table selected
    switch (index) {
      case 1: document.getElementById("tableUser").style.display = "block";
        break;
      case 2: document.getElementById("tableRoleUser").style.display = "block";
        break;
      case 3: document.getElementById("tableCity").style.display = "block";
        break;
      case 4: document.getElementById("tableAgency").style.display = "block";
        break;
    }
    // hide last div showed
    switch (indexCurrent) {
      case 1: document.getElementById("tableUser").style.display = "none";
        break;
      case 2: document.getElementById("tableRoleUser").style.display = "none";
        break;
      case 3: document.getElementById("tableCity").style.display = "none";
        break;
      case 4: document.getElementById("tableAgency").style.display = "none";
        break;
    }
    indexCurrent = index;
  }
}

function employAdmSelectTable(){
  var index = document.getElementById("selectTables").selectedIndex;

  // if selectedIndex has changed
  console.log("index:" + index + " indexCurrent:" + indexCurrent);
  if (indexCurrent != index){
    // reset msg error
    document.getElementById("employAdmError").innerHTML = "";
    
    // show div of table selected
    switch (index) {
      case 1: document.getElementById("tableParkcar").style.display = "block";
        break;
      case 2: document.getElementById("tableBooking").style.display = "block";
        break;
    }
    // hide last div showed
    switch (indexCurrent) {
      case 1: document.getElementById("tableParkcar").style.display = "none";
        break;
      case 2: document.getElementById("tableBooking").style.display = "none";
        break;
    }
    indexCurrent = index;
  }
}

var openedMenu = false;

function openCloseMenu(){
  if (openedMenu == false){
    openedMenu = true;
    document.getElementById("navSideCont").style.width = "80px";
    document.getElementById("navSideBtn").style.marginLeft = "80px";
  } else {
    openedMenu = false;
    document.getElementById("navSideCont").style.width = "0px";
    document.getElementById("navSideBtn").style.marginLeft = "0px";
    
  }
}

