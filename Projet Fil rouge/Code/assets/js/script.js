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
    }
    // hide last div showed
    switch (indexCurrent) {
      case 1: document.getElementById("tableUser").style.display = "none";
        break;
      case 2: document.getElementById("tableRoleUser").style.display = "none";
        break;
    }
    indexCurrent = index;
  }
}

function superAddFormUser(tabRoleUser){
  // var input = document.createElement("input");
  // input.setAttribute("type", "text");
  // input.setAttribute("name", "lastname");
  // input.setAttribute("value", "lastname");
  // document.getElementById("formRow").appendChild(input);

  // form's creation
  var form = document.createElement("form");
  form.setAttribute("action", "");
  form.setAttribute("method", "post");

  // element's form creation
  var label = document.createElement("label");
  label.setAttribute("for", "lastname");
  form.appendChild(label);

  form.appendChild(document.createTextNode("Nom"));

  var input = document.createElement("input");
  input.setAttribute("type", "text");
  input.setAttribute("name", "lastname");
  input.setAttribute("value", tabRoleUser[1]);
  // input.setAttribute("value", "<?= set_value('lastname') ?? '' ?>");
  form.appendChild(input);
  
  document.getElementById("formRow").appendChild(form);

}
