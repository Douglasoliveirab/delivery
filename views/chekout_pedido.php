<!DOCTYPE html>
<html>
  <head>
    <title>Minha Página</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
      /* Estilos CSS aqui */
      body {
        background-color: #f0f0f0;
        font-family: Arial, sans-serif;
      }

      h1 {
        color: #333;
        font-size: 2rem;
        text-align: center;
        margin-top: 2rem;
      }

      form {
        display: flex;
        flex-direction: column;
        max-width: 600px;
        margin: 0 auto;
        padding: 2rem;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
       
      }

      @media only screen and (max-width: 768px) {
  form {
    max-width: 90%;
    padding: 2rem;
  }
}
  
 


      .teste{
        display:none;
      }

      input[type=text], select, input[type=submit] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }

      input[type=submit] {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
      }

      input[type=submit]:hover {
        background-color: #45a049;
      }

      label {
        display: block;
        margin-top: 1rem;
        font-weight: bold;
      }

      input[type=radio], select {
        width: auto;
        margin: 0 0.5rem;
        
        
      }

      select {
        width: 48%;
        margin-right: 4%;
      }

      option {
        font-weight: bold;
      }

      /* Estilos para o input de cartão de crédito */
      #cc-info {
        display: none;
        margin-top: 1rem;
      }

      #cc-info label {
        margin-top: 0.5rem;
      }

      #cc-info input[type=text] {
        width: 48%;
        margin-right: 4%;
      }

      #cc-info input[type=submit] {
        margin-top: 1rem;
      }

      
      

    </style>
     </head>
<body>
<h1>Minha Página</h1>
<form>
    <div class="container_select">
   
  <label for="payment-method">Escolha a forma de pagamento:</label>
  <select id="payment-method" name="payment-method">
    <option value="pix">Pix</option>
    <option value="cartao_pelo_app">Cartão de crédito pelo App</option>
    <option value="cartao_debito">Cartão de débito pelo App</option>
    <option value="maquininha">Maquininha de cartão na Entrega</option>
    <option value="dinheiro">Dinheiro</option>
  </select>
     
 <div class="teste">
    <label for="cartao-numero">Número do Cartão:</label>
    <input type="text" id="cartao-numero" name="cartao-numero" placeholder="Insira o número do seu cartão">

    <label for="cartao-nome">Nome do Titular:</label>
    <input type="text" id="cartao-nome" name="cartao-nome" placeholder="Insira o nome do titular do cartão">

    <label for="cartao-validade">Validade:</label>
    <input type="text" id="cartao-validade" name="cartao-validade" placeholder="MM/AA">

    <label for="cartao-cvv">CVV:</label>
    <input type="text" id="cartao-cvv" name="cartao-cvv" placeholder="Insira o CVV do cartão">

    <input type="submit" value="Enviar">
  </form>


 


    <script>
  $(document).ready(function() {
  $('#payment-method').change(function() {
    if ($(this).val() == 'cartao_pelo_app' || $(this).val() == 'cartao_debito') {
        console.log('payment');
      $('.teste').show();
    } else {
      $('.teste').hide();
    }
  });
});

    </script>

    </body>
</html>