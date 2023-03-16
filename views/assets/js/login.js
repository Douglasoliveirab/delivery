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
//mask para os campos de cpf e telefone usando jquery
  $('input[name="cpf"]').mask('000.000.000-00', {reverse: true});
    $('input[name="telefone"]').mask('(00) 00000-0000');

    // mostra e oculta a senha e compara se as senhas sao iguais 
    $(".senha-toggle").click(function() {
      var senhaInput = $("#senha");
      var senhaToggle = $(".senha-toggle");
      if (senhaInput.attr("type") === "password") {
        senhaInput.attr("type", "text");
        senhaToggle.html('<i class="bi bi-eye-slash-fill"></i>');
      } else {
        senhaInput.attr("type", "password");
        senhaToggle.html('<i class="bi bi-eye-fill"></i>');
      }
    });
  
    $(".confirma-senha-toggle").click(function() {
      var confirmaSenhaInput = $("#confirma_senha");
      var confirmaSenhaToggle = $(".confirma-senha-toggle");
      if (confirmaSenhaInput.attr("type") === "password") {
        confirmaSenhaInput.attr("type", "text");
        confirmaSenhaToggle.html('<i class="bi bi-eye-slash-fill"></i>');
      } else {
        confirmaSenhaInput.attr("type", "password");
        confirmaSenhaToggle.html('<i class="bi bi-eye-fill"></i>');
      }
    });
  
    $("#confirma_senha").keyup(function() {
      var senha = $("#senha").val();
      var confirmaSenha = $(this).val();
      if (senha === confirmaSenha) {
        $(this).removeClass("borda-vermelha");
        $("#senha-mensagem").empty();
      } else {
        $(this).addClass("borda-vermelha");
        $("#senha-mensagem").text("As senhas não coincidem");
      }
    });
});



