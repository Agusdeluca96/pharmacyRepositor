function handleDragStart(e) { //aca indico todo lo que sucede cuando se dragguea un elemento
  this.style.opacity = '0.7';  // this / e.target is the source node.
  e.dataTransfer.setData("text", e.target.id);
  $("#imgCaja").addClass("bordes bounceIn");
}

function handleDragEnd(e) { //aca indico todo lo que sucede cuando se suelta un elemento que se estaba draggueando
  // this.style.opacity = '1';  // this / e.target is the source node.
  $("#imgCaja").removeClass("bordes bounceIn");
}

var draggableDivs = document.querySelectorAll('.draggable');
[].forEach.call(draggableDivs, function(draggableDiv) {
	draggableDiv.setAttribute("draggable", "true") //indico que los elementos de la clase draggable pueden ser draggued
	draggableDiv.addEventListener('dragstart', handleDragStart, false); //asocio una funcion al evento dragstart del nodo
	draggableDiv.addEventListener('dragend', handleDragEnd, false); //asocio una funcion al evento dragend del nodo
});
