/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/searchCep.js ***!
  \***********************************/
//Quando o campo cep perde o foco.
$("input[name=cep]").blur(function () {
  //Nova variável "cep" somente com dígitos.
  var cep = $(this).val().replace(/\D/g, ''); //Verifica se campo cep possui valor informado.

  if (cep != "") {
    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/; //Valida o formato do CEP.

    if (validacep.test(cep)) {
      //Preenche os campos com "..." enquanto consulta webservice.
      $("#rua").val("...");
      $("#bairro").val("..."); //$("#cidade").val("...");
      //Consulta o webservice viacep.com.br/

      $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
        if (!("erro" in dados)) {
          //Atualiza os campos com os valores da consulta.
          $("#rua").val(dados.logradouro);
          $("#bairro").val(dados.bairro);
          $("select#idestado").one("atualizado", function () {
            var estado = dados.uf;
            $("select#idestado option").each(function () {
              var text = this.text.split(' - ');
              this.selected = text[0] === estado;
            });
          });
          $("select#idestado").trigger("atualizado");
          getListaCidades(dados); // $("select#cidade").one("atualizado", function(){
          //     var cidade = dados.localidade;
          //     $("select#cidade option").each(function() {
          //         this.selected = (this.text === cidade + ' ('+dados.uf+')');
          //     });
          // });
          // $("select#cidade").trigger("atualizado");
          //
          // $.get( "consultaCidade.php", { cidade: dados.localidade,estado: dados.uf }).done(function( data ) {
          //     //alert( "Data Loaded: " + data );
          //     $("#cidade").val(data);
          // });
          //$("#cidade").val(dados.localidade);
        } //end if.
        else {
          //CEP pesquisado não foi encontrado.
          limpa_formulário_cep();
        }
      });
    } //end if.
    else {
      //cep é inválido.
      limpa_formulário_cep();
    }
  } //end if.
  else {
    //cep sem valor, limpa formulário.
    limpa_formulário_cep();
  }
});
/******/ })()
;