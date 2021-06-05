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

function loginModal(){
  console.log('por aqui');
  var route = Routing.generate('app_login_modal');
  $.ajax({
    type: 'POST',
    url: route,
    async: true,
    success: function (data) {
      console.log(data);
      var modalBody = document.getElementById('modalBody');
      console.log(modalBody);
      modalBody.innerHTML =modalBody.innerHTML +  data; 
    }
  });
}

function getLoginModal(){
  console.log('por aqui');
  var route = Routing.generate('app_login_get_modal');
  $.ajax({
    type: 'POST',
    url: route,
    async: true,
    success: function (data) {
      console.log(data);
      var modalBody = document.getElementById('modalBody');
      console.log(modalBody);
      modalBody.innerHTML = data; 
    }
  });
}

function getCart(){
  console.log('por aqui');
  var route = Routing.generate('cart_show');
  $.ajax({
    type: 'GET',
    url: route,
    async: false,
    success: function (data){
      document.innerHTML = data;
    }
  });
}

function checkUser(){
  console.log('por aqui');
  var route = Routing.generate('app_check_user');
  $.ajax({
    type: 'GET',
    url: route,
    async: false,
    success: function (data) {
     if(data == 'true'){
       console.log('hay usuario')
       location.href = '/cart/show';
     }else if(data == 'false'){
       $('#modal').modal('show');
       getLoginModal();
     }
    }
  });
}

function inicio() {
  $(function () {
    $('[data-toggle="popover"]').popover()
  })

}

window.onload = inicio;