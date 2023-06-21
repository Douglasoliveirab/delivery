$(document).ready(function() {
    // Abrir o modal quando o botão "Cadastrar novo banner" for clicado
    $('#btn-cadastrar-adm').click(function() {
      $('#modal').css('display', 'block');
    });
  
    // Fechar o modal quando o botão "X" for clicado
    $('.close').click(function() {
      $('#modal').css('display', 'none');
    });
  
    // Enviar o formulário via AJAX
    $('#form-adm').submit(function(e) {
      e.preventDefault(); // impede o comportamento padrão de envio do formulário
  
    
        // Envia o formulário via AJAX
        $.ajax({
          url: $(this).attr('action'), // obtém a URL de destino do formulário
          type: 'POST',
          data: new FormData(this), // obtém os dados do formulário
          processData: false,
          contentType: false,
          success: function() {
            // Exibir mensagem de sucesso
            $('#modal').css('display', 'none');
            $('#success-modal').css('display', 'block');
  
            // Fechar a mensagem de sucesso após 2 segundos
            setTimeout(function() {
              $('#success-modal').css('display', 'none');
            }, 3000);
          }
        });$('#form-adm').submit(function(e) {
            e.preventDefault(); // impede o comportamento padrão de envio do formulário
          
          
          
            // Envia o formulário via AJAX
            $.ajax({
              url: $(this).attr('action'), // obtém a URL de destino do formulário
              type: 'POST',
              data: new FormData(this), // obtém os dados do formulário
              processData: false,
              contentType: false,
              success: function() {
                // Exibir mensagem de sucesso
                $('#modal').css('display', 'none');
                $('#success-modal').css('display', 'block');
          
                // Fechar a mensagem de sucesso após 2 segundos
                setTimeout(function() {
                  $('#success-modal').css('display', 'none');
                }, 3000);
              }
            });
          });
          
    });
  });
  