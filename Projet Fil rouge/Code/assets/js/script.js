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

// function addField() {
//   try {
//   var div = document.createElement("div");
//   var input = document.createElement("input");
//   input.setAttribute("type","text");
//   input.setAttribute("name","language[]");
//   input.setAttribute("value","");
//   input.appendChild(document.createTextNode(""));
//   div.appendChild(document.createTextNode("Langage: "));
//   div.appendChild(input);
//   document.getElementById("languages").appendChild(div);
//   } catch(e) {
//   alert(e);
//   }
//   }