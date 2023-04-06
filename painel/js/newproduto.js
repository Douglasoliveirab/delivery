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
    $('#form-produto').submit(function(e) {
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
        });$('#form-produto').submit(function(e) {
            e.preventDefault(); // impede o comportamento padrão de envio do formulário
          
            // Verifica se o campo de arquivo está vazio
            var fileInput = $('#img_produto');
            var filePath = fileInput.val();
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            if (!allowedExtensions.exec(filePath)) {
              alert('Por favor, selecione um arquivo de imagem válido (JPEG/JPG/PNG)');
              fileInput.val('');
              return false;
            }
          
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
  