window.onload = function(){
  function reqListener () {
    console.log(this.responseText);
  }
  
  var oReq = new XMLHttpRequest();
  oReq.addEventListener("load", reqListener);
  oReq.open("GET", "http://localhost:8080/api/automata?cells=101&steps=3&rule=110");
  oReq.send();
}