// ajusta e inicia codigo de Materializer
// 
// 
// //funcion Para Cerrar Session por Post Con palabra Reservada Cerrar Sesion
//Utulizando funcion de etiqueta de html contiene
 function logout() {
// alert( "Handler for .click() called." );
  document.getElementById('logout-form').submit();//funcion para ejectuar FORM #Logout-form
};

$.material.init();
$( document ).ready(function() {
$(".dropdown-button").dropdown();
$(".button-collapse").sideNav();
    console.log( "document loaded" );
});

$( window ).on( "load", function() {
    console.log( "window loaded" );
});


$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
  $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
  );
