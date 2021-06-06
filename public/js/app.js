$('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
  }
  var $subMenu = $(this).next('.dropdown-menu');
  $subMenu.toggleClass('show');


  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
    $('.dropdown-submenu .show').removeClass('show');
  });


  return false;
});

function loginModal() {
  var route = Routing.generate('app_login_modal');
  $.ajax({
    type: 'POST',
    url: route,
    async: true,
    success: function (data) {
      var modalBody = document.getElementById('modalBody');
      modalBody.innerHTML = modalBody.innerHTML + data;
    }
  });
}

function getLoginModal() {
  var route = Routing.generate('app_login_get_modal');
  $.ajax({
    type: 'POST',
    url: route,
    async: true,
    success: function (data) {
      var modalBody = document.getElementById('modalBody');
      console.log(modalBody);
      modalBody.innerHTML = data;
    }
  });
}

function getCart() {
  var route = Routing.generate('cart_show');
  $.ajax({
    type: 'GET',
    url: route,
    async: true,
    success: function (data) {
      document.innerHTML = data;
    }
  });
}

function checkUser() {
  var route = Routing.generate('app_check_user');
  $.ajax({
    type: 'GET',
    url: route,
    async: true,
    success: function (data) {
      if (data == 'true') {
        location.href = '/cart/show';
      } else if (data == 'false') {
        $('#modal').modal('show');
        getLoginModal();
      }
    }
  });
}

function checkAddCart(id) {
  var route = Routing.generate('app_check_user');
  $.ajax({
    type: 'GET',
    url: route,
    async: true,
    success: function (data) {
      if (data == 'true') {
        //location.href = '/cart/show';
        addToCart(id);
      } else if (data == 'false') {
        $('#modal').modal('show');
        getLoginModal();
      }
    }
  });
}

function addToCart(id) {
  console.log('por aqui');
  var tmp = document.getElementById('stockSelect');
  var stock = tmp.options[tmp.selectedIndex];
  //console.log(stock.text);
  var route = Routing.generate('app_addToCart');
  $.ajax({
    type: 'POST',
    url: route,
    async: true,
    datatype: "json",
    data: JSON.stringify([id, stock.text]),
    success: function (data) {
      //console.log(data);
      if (data == 'true')
        location.href = '/cart/show';
    }
  });
}

function getSubCategories() {
  if (document.getElementById('subcategoryContainer')) {
    document.getElementById('containerNewProduct').removeChild(document.getElementById('subcategoryContainer'));
  }
  var route = Routing.generate('app_get_subcategories');
  var tmp = document.getElementById('categorySelect');
  var categorie = tmp.options[tmp.selectedIndex];
  $.ajax({
    type: 'POST',
    url: route,
    async: true,
    datatype: "json",
    data: JSON.stringify(categorie.value),
    success: function (data) {
      console.log(JSON.parse(data));
      showSubcats(JSON.parse(data));
    }
  });
}

function showSubcats(subcats) {
  var divP = document.createElement('div');
  divP.className = "col-4 row justify-content-end";
  divP.id = "subcategoryContainer";

  var divS = document.createElement('div');
  divS.className = "col-6";
  divS.innerHTML = "Subcategoria";

  var select = document.createElement('select');
  select.id = "subCategorySelect";
  select.className = "col-6 lead form-select";
  select.setAttribute("aria-label","Default select example");

  for (var i = 0; i < subcats.length; i++) {
    var option = document.createElement('option');
    option.setAttribute("value", subcats[i]);
    option.innerHTML = subcats[i];
    select.appendChild(option);
  }
  var button = document.createElement("button");
  button.className = "col-4 btn btn-primary mt-2";
  button.setAttribute("onClick", "getCaracteristics()")
  button.innerHTML="Seleccionar";

  divP.appendChild(divS);
  divP.appendChild(select);
  divP.appendChild(button);
  
  var form = document.getElementById('newProductForm');
  var div = document.getElementById('containerNewProduct');
  div.insertBefore(divP,form);
}

function getCaracteristics(){
  var route = Routing.generate('app_get_features');
  var tmp = document.getElementById('subCategorySelect');
  var categorie = tmp.options[tmp.selectedIndex];
  $.ajax({
    type: 'POST',
    url: route,
    async: true,
    datatype: "json",
    data: JSON.stringify(categorie.value),
    success: function (data) {
      console.log(JSON.parse(data)); 
      displayFeatures(data);
    }
  });
}

function displayFeatures(data){
  
  var productFeatures = ["Nombre", "Modelo", "Marca", "Fabricante", "Stock", "Descripción", "Precio", "Descuento", "Dimensiones", "Peso", "Año"];
  var array = data.split('#');
  array[0] = array[0].slice(1);
  array[array.length-1] = array[array.length-1].slice(0,-1);
  var form = document.getElementById('newProductForm');
  for(var i = 0; i<array.length;i++){
    var div = document.createElement('div');
    div.className = "form-group";
    var label = document.createElement('label');
    label.setAttribute("for",array[i]);
    label.innerHTML = array[i];
    var input = document.createElement('input');
    input.id = array[i];
    input.setAttribute("type","text");
    input.setAttribute("name",array[i]);
    input.className = "form-control";
    div.appendChild(label);
    div.appendChild(input);
    form.appendChild(div);
  }


  for(var i = 0; i< productFeatures.length;i++){
    var tmp = createFormfield(productFeatures[i]);
    form.appendChild(tmp);
  }






  var fileDiv = document.createElement('div');
  fileDiv.className = "form-group";
  var fileLabel = document.createElement('label');
  fileLabel.setAttribute("for","picture");
  fileLabel.innerHTML = "Picture";
  var inputFile = document.createElement('input');
  inputFile.id = "picture";
  inputFile.setAttribute("type","file");
  inputFile.setAttribute("name","picture");
  inputFile.className = "form-control";
  var button = document.createElement("button");
  button.setAttribute("type", "submit");
  button.className = "btn btn-primary";
  button.innerHTML = "Añadir producto";
  fileDiv.appendChild(fileLabel);
  fileDiv.appendChild(inputFile);
  form.appendChild(fileDiv);
  form.appendChild(button);
  form.setAttribute("class","col-12");
}

function createFormfield(str){
  var div = document.createElement('div');
  div.className = "form-group";
  var label = document.createElement('label');
  label.setAttribute("for",str);
  label.innerHTML = str;
  var input = document.createElement('input');
  input.id = str;
  input.setAttribute("type","text");
  input.setAttribute("name",str);
  input.className = "form-control";
  div.appendChild(label);
  div.appendChild(input);
  return div;
}

function inicio() {
  $(function () {
    $('[data-toggle="popover"]').popover()
  })

}

window.onload = inicio;