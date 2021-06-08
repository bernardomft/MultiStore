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



function inicio() {
  $(function () {
    $('[data-toggle="popover"]').popover()
  })

}

window.onload = inicio;