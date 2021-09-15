window.onload = function(){
  function reqListener () {
    console.log(this.responseText);
  }

  let rule = document.getElementById("rule").value;
  
  var oReq = new XMLHttpRequest();
  oReq.addEventListener("load", reqListener);
  oReq.open("GET", `http://localhost:8080/api/automata?cells=000010000&steps=8&rule=${rule}`);
  oReq.send();
}