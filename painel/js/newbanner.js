$(document).ready(function() {
    // Abrir o modal quando o botão "Cadastrar novo banner" for clicado
    $('#btn-cadastrar-banner').click(function() {
      $('#modal').css('display', 'block');
    });
  
    // Fechar o modal quando o botão "X" for clicado
    $('.close').click(function() {
      $('#modal').css('display', 'none');
    });
  
    // Enviar o formulário via AJAX
    $('#form-banner').submit(function(e) {
      e.preventDefault(); // impede o comportamento padrão de envio do formulário
  
      // Verifica se o campo de arquivo está vazio
      if ($('#banner')[0].files.length === 0) {
        // Exibe mensagem de erro
        $('#error-modal').html('Selecione um arquivo para criar o banner.').css('display', 'block');
      } else {
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
      }
    });
  });
  