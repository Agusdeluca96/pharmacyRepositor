function allowDrop(ev) {
    ev.preventDefault();

}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var elem = document.querySelector('.modal');
    var instance = M.Modal.init(elem, "{dismissible:false}");
    instance.open();

    var productName = document.getElementById("productName");
    productName.removeChild(productName.firstChild);
    var productNameTitle = document.createElement("P");
    var name = "Producto: ";
  	var pn = document.createTextNode(name.concat(document.getElementById(data).getAttribute("nombre")));
    productNameTitle.appendChild(pn);
    productName.appendChild(productNameTitle);

    var productProspect = document.getElementById("productProspect");
    productProspect.removeChild(productProspect.firstChild);
    var productProspectTitle = document.createElement("P");
    var prospect = "Prospecto: ";
  	var pp = document.createTextNode(prospect.concat(document.getElementById(data).getAttribute("prospecto")));
    productProspectTitle.appendChild(pp);
    productProspect.appendChild(productProspectTitle);

    var productPrice = document.getElementById("productPrice");
    productPrice.removeChild(productPrice.firstChild);
    var productPriceTitle = document.createElement("P");
    var price = "Precio: $";
  	var ppr = document.createTextNode(price.concat(document.getElementById(data).getAttribute("precio")));
    productPriceTitle.appendChild(ppr);
    productPrice.appendChild(productPriceTitle);

    document.getElementById("productId").value = document.getElementById(data).getAttribute("id");
}

var droppableDivs = document.querySelectorAll('.droppable');
[].forEach.call(droppableDivs, function(droppableDiv) {
	droppableDiv.addEventListener('dragover', allowDrop, false); //asocio una funcion al evento dragstart del nodo
	droppableDiv.addEventListener('drop', drop, false); //asocio una funcion al evento dragend del nodo
});
