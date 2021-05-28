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

function addToCart(id) {
  var select = $('#stockSelect')[0];
  var stock = select.options[select.options.selectedIndex];
  var stock = stock.text;
  if (getCookie('cart') == "") {
    setCookie('cart', id + ',' + stock, 30);
  } else {
    setCookie('cart', getCookie('cart') + '/' + id + ',' + stock, 30);
  }
}


function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/;SameSite=Lax";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function viewCart() {
  var cart = $('#cart')[0];
  var cookieCart = getCookie('cart');
  if (cookieCart == "") {
    cart.setAttribute('data-content', 'No hay ningún artículo selecionado');
  } else {
    var id = [];
    var stock = [];
    var tmp = cookieCart.split('/');
    tmp.forEach(t => {
      var tmp2 = t.split(',');
      id.push(tmp2[0]);
      stock.push(tmp2[1]);
    });
    getCartInfo(id, stock);
  }
}

function getCartInfo(id, stock) {
  var route = Routing.generate('app_getInfoCarrito');
  $.ajax({
    type: 'POST',
    url: route,
    async: true,
    dataType: "json",
    data: JSON.stringify(id),
    success: function (data) {
      var cart = $('#cart')[0];
      cart.setAttribute('data-content', createCartView(data, stock));
    }
  });
}

function createCartView(data, stock) {
  var arrayTmp = [];
  var arrayEle = [];
  var total = 0;
  var tmp = `<div class=" container-fluid w-100 row">`;
  data.forEach(d => {
    arrayTmp.push(d.split('/'));
  });
  for (var i = 0; i < arrayTmp.length; i++) {
    var str = `<div class="col-12 row border-bottom mt-2 p-1">
      <div class="col-12">
        <p class="lead">` + arrayTmp[i][0] + `</p>
      </div>
      <div class="col-12 row justify-content-around">
        <img class="col-4" src="/images/Desktops/` + arrayTmp[i][1] + `"/>
        <p class="lead" col-4>x` + stock[i] + `</p>
        <p class="lead" col-4>` + arrayTmp[i][2] + `$</p>
      </div>
    </div>`;
    arrayEle.push(str);
    total += (parseFloat(arrayTmp[i][2]) * parseInt(stock[i]));
  }
  arrayEle.forEach(e => {
    tmp += e;
  });
  tmp += `<div class=col-12 row justify-content-around>
            <div class="col-12 lead">TOTAL: ` + total + `$</div>
          </div>
          <a class="col-12 btn btn-primary" href="/cart/show">VER CARRO DE COMPRA</a>  
  </>`
  return (tmp);
}

function checkLoging() {
  var route = Routing.generate('app_isLooged');
  $.ajax({
    type: 'GET',
    url: route,
    async: true,
    //dataType: "json",
    //data: JSON.stringify(id),
    success: function (data) {
      console.log(JSON.parse(data));
      if(JSON.parse(data) == "TRUE")
        return true;
      else 
        return false;
    }
  });
}

function sendCartInfo(data, stock) {
  var route = Routing.generate('app_addToCart');
  $.ajax({
    type: 'POST',
    url: route,
    async: true,
    dataType: "json",
    data: JSON.stringify([data, stock]),
    success: function (data) {
      console.log("exito");
      //return true;
    }
  });
}

function cartManage() {
  if (checkLoging) {
    //Anañadir los productos al carrito
    //Reestablecer cookie
    //viewCart
    var cookieCart = getCookie('cart');
    if (cookieCart != "") {
      var id = [];
      var stock = [];
      var tmp = cookieCart.split('/');
      tmp.forEach(t => {
        var tmp2 = t.split(',');
        id.push(tmp2[0]);
        stock.push(tmp2[1]);
      })
      console.log(id);
      sendCartInfo(id, stock);
      setCookie('cart', '', new Date().toUTCString());
    }

  } else {
    viewCart()
  }
}

function getCart(id){
  var stock = document.getElementById('stockSelect').options.selectedIndex + 1;
  console.log(stock);
  var route = Routing.generate('app_addToCart');
  var arrayTmp= [id,stock];
  $.ajax({
    type: 'POST',
    url: route,
    async: true,
    dataType: "text",
    data: JSON.stringify(arrayTmp),
    success: function (data) {
      console.log("exitoff" + data);
    }
  });
}

function inicio() {
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
}

window.onload = inicio;