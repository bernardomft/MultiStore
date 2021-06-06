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
  var str = `<div class="col-4 row justify-content-end" id="subcategoryContainer">
                    <div class="col-6">Subcategoria</div>
                <select id="subCategorySelect" class=" col-6 lead form-select" aria-label="Default select example">`;
  for (var i = 0; i < subcats.length; i++) {
    var strTmp = `<option value="` + subcats[i] + `">` + subcats[i] + `</option>`;
    str += strTmp;
  }
  str += `</select>
      <button class="col-4 btn btn-primary mt-2" onClick="getCaracteristics()">Seleccionar</button></div>`
  var ele = document.getElementById('containerNewProduct');
  ele.innerHTML += str;
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
  var array = data.split('#');
  array[0] = array[0].slice(1);
  array[array.length-1] = array[array.length-1].slice(0,-1);
  var str = `<form class="col-12">`;
  for(var i = 0; i < array.length;i++){
    var strTmp = null;
    strTmp = `<div class="form-group"><label for="`+ array[i] + `">`+ array[i] +`</label><input type="text" class="form-control" id="`+array[i]+`" name="` + array[i] +`/></div>`;
    str += strTmp;
    console.log(strTmp);
  }
  str += `<button type="submit" class="btn btn-primary>Añadir producto</button></form>"`;
  document.getElementById('containerNewProduct').innerHTML += str;
  
}

function inicio() {
  $(function () {
    $('[data-toggle="popover"]').popover()
  })

}

window.onload = inicio;