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
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
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
  var route = Routing.generate('app_getCartInfo');
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
          <a class="col-12 btn btn-primary" href="#">VER CARRO DE COMPRA</a>  
  </>`
  return (tmp);
}

function checkLoging(){
  if(getCookie('PHPSESSID') != ""){
    var ses = $('#session')[0];
    console.log(ses);
    ses.innerHTML = "Mi perfil";
  }
  else{
    console.log('poraqui');
  }
}

function inicio() {
  //inicia todos los popover de bootstrap 4
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
  viewCart();
  checkLoging();
}

window.onload = inicio;