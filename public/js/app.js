$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
    if (!$(this).next().hasClass('show')) {
      $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
    }
    var $subMenu = $(this).next('.dropdown-menu');
    $subMenu.toggleClass('show');
  
  
    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
      $('.dropdown-submenu .show').removeClass('show');
    });
  
  
    return false;
  });

  function addToCart(id){
    console.log('Añadir al carro '+ id);
    var select = $('#stockSelect')[0];
    console.log(select);
    var stock = select.options[select.options.selectedIndex];
    var stock = stock.text;
    if(getCookie('cart') == ""){
      setCookie('cart',id + ','+ stock, 30);
    }
    else{
      setCookie('cart', getCookie('cart') + '/' + id + ','+ stock, 30);
    }
  }


  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
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

  function viewCart(){
    var cart = $('#cart')[0];
    var cookieCart = getCookie('cart');
    console.log(cookieCart);
    if(cookieCart == ""){
      cart.setAttribute('data-content', 'No hay ningún artículo selecionado');
    }
    else{
      var id = [];
      var stock = [];
      var tmp = cookieCart.split('/');
      tmp.forEach(t => {
        var tmp2 = t.split(',');
        id.push(tmp2[0]);
        stock.push(tmp2[1]);
      });
      getCartInfo(id,stock);
      console.log(id);
      console.log(stock);
    }
  }

  function getCartInfo(id,stock){
    var route = "{{ asset('/getCartInfo/', { products: 'fileid' }) }}"
    $.ajax({
      type: 'POST',
      url: route.replace('fileid' , JSON.stringify([id,stock])),
      async: true,
      dataType: 'text',
      data: JSON.stringify([id,stock]),
      success: function (data) {
          console.log(data);
      }
  });
  }


function inicio(){
  //inicia todos los popover de bootstrap 4
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
}
  
window.onload = inicio;