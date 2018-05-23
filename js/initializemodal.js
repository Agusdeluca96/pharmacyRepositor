$(document).ready(function(){
    $(".modal").modal();
});

$("html").on("drop", function() {
  $('#modalCompra').modal("open");
  var mydiv = document.getElementById("modalContent");
  var node = document.createTextNode(document.getElementById("drag1").getAttribute("sistema"));
  mydiv.appendChild(node);
});
