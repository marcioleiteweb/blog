
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  

    <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />

    <meta name="apple-mobile-web-app-title" content="CodePen">

    <link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />

    <link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-b4b4269c16397ad2f0f7a01bcdf513a1994f4c94b8af2f191c09eb0d601762b1.svg" color="#111" />



  
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>


  <title>CodePen - jQuery - CPF e CNPJ Dinâmico com jQuery Mask</title>

    <link rel="canonical" href="https://codepen.io/angelorubin/pen/YymzrM">
  
  
  <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css'>
  
<style>
.container {
  margin-top: 10px;
}
</style>

  <script>
  window.console = window.console || function(t) {};
</script>

  
  
</head>

<body translate="no">
  <div class="container">
  
  <form>
  
    <select id="tipo-fornecedor" name="tipo-fornecedor">
      <option value="" selected="selected">Selecione o tipo do fornecedor</option>
      <option value="fisico">Físico</option>
      <option value="juridico">Jurídico</option>
    </select>

    <hr/>
  
    <div id="container-cpf" hidden>
      <label>CPF</label>
      <input type="text" name="cpf" id="cpf" />
    </div>
  
    <div id="container-cnpj" hidden>
      <label>CNPJ</label>
      <input type="text" name="cnpj" id="cnpj">
    </div>
    
  </form> 
   
</div>
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js'></script>
      <script id="rendered-js" >
(function ($) {

  $('#tipo-fornecedor').select2();
  $('#cpf').mask('000.000.000-00');
  $('#cnpj').mask('00.000.000/0000-00');

  function getKindSupplier(type) {

    if (type == 'fisico') {
      $('#container-cpf').show();
      $('#container-cnpj').hide();
    }

    if (type == 'juridico') {
      $('#container-cnpj').show();
      $('#container-cpf').hide();
    }

    if (type == "") {
      $('#container-cnpj, #container-cpf').hide();
    }

  }

  $(document).on('change', '#tipo-fornecedor', function () {
    getKindSupplier($(this).val());
  });

})(jQuery);
//# sourceURL=pen.js
    </script>

  
</body>

</html>
