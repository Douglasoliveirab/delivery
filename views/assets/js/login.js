$(document).ready(function(){
$("#newUser").click(function(e){
    e.preventDefault();
    $(".newConta").show();
    $("#logar").hide();
  
  });

  $("#nextLogar").click(function(e){
    e.preventDefault();
    $(".newConta").hide();
    $("#logar").show();
    
  });
});
