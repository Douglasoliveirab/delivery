 // Adiciona evento change para os inputs radio
 $("input[name='pagamento']").change(function() {
    var pagamento = $("input[name='pagamento']:checked").val();

    if (pagamento === "entrega") {
        $(".pagamento-entrega").show();
        $(".btn-payment").show();

    }
});

$("#pagamento-online").click(function() {
    $(".btn-payment").show();
    $(".pagamento-entrega").hide();
});

 // Exibir o modal e preencher o campo com o valor atual do endereço
 $('#btn-editar').click(function() {
            
    $('.custom-modal').show();
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