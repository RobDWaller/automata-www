window.onload = function(){
  function reqListener () {
    let cellsCollection = JSON.parse(this.responseText);

    let steps = document.createElement("div");
    steps.setAttribute("id", "steps");
    
    for (let key in cellsCollection) {
      let step = document.createElement("div");
      for (let key1 in cellsCollection[key]) {
        let cellDiv = document.createElement("div");
        cellDiv.className = "alive";
        if (cellsCollection[key][key1] == 0) {
          cellDiv.className = "dead";
        }
        step.appendChild(cellDiv);
      }
      steps.appendChild(step);
    }
    automata = document.getElementById("automata");
    automata.appendChild(steps);
  }

  let rule = document.getElementById("rule").value;
  
  var oReq = new XMLHttpRequest();
  oReq.addEventListener("load", reqListener);
  oReq.open("GET", `http://localhost:8080/api/automata?cells=0000000000000000000000000001000000000000000000000000000&steps=54&rule=${rule}`);
  oReq.send();
}