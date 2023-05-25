$(document).ready(function() {
    $('#btn-endereço').click(function(e) {
      e.preventDefault();
      $('.container-endereço').toggle();
    });

     // Exibir o modal e preencher o campo com o valor atual do endereço
     $('#btn-editar').click(function() {

      $('.custom-modal').show();
  });

  // Fechar o modal ao clicar no botão de atualizar
  $('#btn-atualizar').click(function() {

  });
  $('.modal-close-mob').click(function() {
          $('.custom-modal').css('display', 'none');
      });

 
      // Abrir o modal ao clicar no botão "Editar"
      $('#edit-address').click(function(e) {
          e.preventDefault();
          $('#address-modal').css('display', 'block');
      });

      // Fechar o modal ao clicar no botão de fechar ou fora do modal
      $('.modal-close').click(function() {
          $('#address-modal').css('display', 'none');
      });
      $(window).click(function(event) {
          if (event.target == document.getElementById('address-modal')) {
              $('#address-modal').css('display', 'none');
          }
      });
  });
  
  