$(document).ready(function(){
$("#newUser").click(function(e){
    e.preventDefault();
    $(".newConta").show();
    $("#logar").hide();
    console.log("teste");
  });

  $("#nextLogar").click(function(e){
    e.preventDefault();
    $(".newConta").hide();
    $("#logar").show();
    console.log("teste");
  });
});
