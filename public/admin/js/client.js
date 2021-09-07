/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/client.js ***!
  \********************************/
// ------------------------------------    FORM CLIENTE HIDE CAMPOS
$(document).ready(function () {
  //executar quando a página é carregada
  esconde(); //executar todas as vezes que houver alterações do select;

  $('#selectPersonType').change(function () {
    esconde();
  });
});

function esconde() {
  //quando tiver editando o formuláro o valor fica no Select
  selectedValue = $('#selectPersonType').val(); //quando tiver visualizando o formulário o valor fica no campo text;

  if (!selectedValue) {
    selectedValue = $('#selectPersonType').text();
  }

  switch (selectedValue) {
    case "PF":
      $('#divCNPJ').hide();
      $("#customCNPJ").val("");
      $('#divCorporateReason').hide();
      $("#validationCorporateReason").val("");
      $('#divFantasyName').hide();
      $("#validationFantasyName").val("");
      $('#divCPF').show();
      $('#divSex').show();
      $('#divBirdDate').show();
      break;

    case "PJ":
      $('#divCNPJ').show();
      $('#divCorporateReason').show();
      $('#divFantasyName').show();
      $('#divCPF').hide();
      $("#customCPF").val("");
      $('#divSex').hide();
      $("#selectSex").val("-");
      $('#divBirdDate').hide();
      $("#customBirthDate").val("");
      break;

    default:
  }
} // ------------------------------------    ADICIONANDO ENDERECO DINAMICAMENTE


$(document).ready(function () {
  var nextAddress = $('input[name="countAddress"]:last').val();
  $('#addRowAddress').click(function () {
    nextAddress++;
    $('input[name="countContact"]').val(nextAddress);
    var newAddress = '<div id="addAddress' + nextAddress + '">';
    newAddress += '<hr class="bg-secondary">';
    newAddress += '<div class="d-flex flex-row-reverse bd-highlight">';
    newAddress += '<button  id="' + nextAddress + '" type="button" class="btn btn-danger btn-sm bd-highlight btn_remove_address" data-toggle="tooltip" data-placement="top" title="Remover"><i class="fas fa-times"></i></button>';
    newAddress += '</div>';
    newAddress += '<div class="form-row" >';
    newAddress += '<div class="col-md-2 mb-3">';
    newAddress += '<label for="customCEP' + nextAddress + '">CEP</label>';
    newAddress += '<input type="text" class="form-control" name="cep[]" id="customCEP' + nextAddress + '" MAXLENGTH="9" placeholder="Ex.: 00000-000">';
    newAddress += '</div>';
    newAddress += '<div class="col-md-4 mb-3">';
    newAddress += '<label for="validationPublicPlace' + nextAddress + '">Logradouro</label>';
    newAddress += '<input type="text" class="form-control" name="public_place[]" id="validationPublicPlace' + nextAddress + '" placeholder="Ex.: Rua ...">';
    newAddress += '</div>';
    newAddress += '<div class="col-md-2 mb-3">';
    newAddress += '<label for="validationNumber' + nextAddress + '">Numero</label>';
    newAddress += '<input type="text" class="form-control" name="number[]" id="validationNumber' + nextAddress + '" placeholder="">';
    newAddress += '</div>';
    newAddress += '<div class="col-md-4 mb-3">';
    newAddress += '<label for="validationDistrict' + nextAddress + '">Bairro</label>';
    newAddress += '<input type="text" class="form-control" name="district[]" id="validationDistrict' + nextAddress + '" placeholder="Ex.: Bairro ...">';
    newAddress += '</div>';
    newAddress += '<div class="col-md-6 mb-3">';
    newAddress += '<label for="validationComplement' + nextAddress + '">Complemento</label>';
    newAddress += '<input type="text" class="form-control" name="complement[]" id="validationComplement' + nextAddress + '" placeholder="Ex.: APTO...">';
    newAddress += '</div>';
    newAddress += '<div class="col-md-6 mb-3">';
    newAddress += '<label for="selectCity' + nextAddress + '">Cidade</label>';
    newAddress += '<select class="form-control" name="city[]" id="selectCity' + nextAddress + '">';
    newAddress += '<option value="-" >-</option>';
    newAddress += '<option value="MG">Teofilo Otoni</option>';
    newAddress += '</select>';
    newAddress += '</div>';
    newAddress += '<div class="col-md-4 mb-3">';
    newAddress += '<label for="selectState' + nextAddress + '">Estado</label>';
    newAddress += '<select class="form-control" name="state[]" id="selectState' + nextAddress + '">';
    newAddress += '<option value="-" >-</option>';
    newAddress += '<option value="Minas Gerais">Minas Gerais</option>';
    newAddress += '</select>';
    newAddress += '</div>';
    newAddress += '<div class="col-md-2 mb-3">';
    newAddress += '<label for="selectUF' + nextAddress + '">UF</label>';
    newAddress += '<select class="form-control" name="uf[]" id="selectUF' + nextAddress + '">';
    newAddress += '<option value="-" >-</option>';
    newAddress += '<option value="MG">MG</option>';
    newAddress += '</select>';
    newAddress += '</div>';
    newAddress += '<div class="col-md-6 mb-3">';
    newAddress += '<label for="customNoteAddress1">Observação</label>';
    newAddress += '<input type="text" class="form-control" name="note_address[]" id="customNoteAddress1" placeholder="Ex.: Endereço de entrega">';
    newAddress += '</div>';
    newAddress += '</div>';
    newAddress += '</div>';
    $('#addAddressLast').append(newAddress);
  });
  $(document).on('click', '.btn_remove_address', function () {
    var button_id = $(this).attr("id");
    $('#addAddress' + button_id + '').remove();
  });
}); // ------------------------------------    ADICIONANDO CONTATO DINAMICAMENTE

$(document).ready(function () {
  var nextContact = $('input[name="countContact"]:last').val();
  $('#addRowContact').click(function () {
    nextContact++;
    $('input[name="countContact"]').val(nextContact);
    var newContact = '<div id="addContact' + nextContact + '">';
    newContact += '<hr class="bg-secondary">';
    newContact += '<div class="d-flex flex-row-reverse bd-highlight">';
    newContact += '<button  id="' + nextContact + '" type="button" class="btn btn-danger btn-sm bd-highlight btn_remove_contact" data-toggle="tooltip" data-placement="top" title="Remover"><i class="fas fa-times"></i></button>';
    newContact += '</div>';
    newContact += '<div class="form-row">';
    newContact += '<div class="col-md-4 mb-3">';
    newContact += '<label for="customPhone' + nextContact + '">Telefone</label>';
    newContact += '<input type="text" class="form-control" name="phone[]" id="customPhone' + nextContact + '" MAXLENGTH="14" placeholder="Ex.: (00) 0000-0000">';
    newContact += '</div>';
    newContact += '<div class="col-md-4 mb-3">';
    newContact += '<label for="customCellPhone' + nextContact + '">Telefone Celular</label>';
    newContact += '<input type="text" class="form-control" name="cell_phone[]" id="customCellPhone' + nextContact + '" MAXLENGTH="16" placeholder="Ex.: (00) 0 0000-0000">';
    newContact += '</div>';
    newContact += '<div class="col-md-4 mb-3">';
    newContact += '<label for="customWhatsapp' + nextContact + '">Whatsapp</label>';
    newContact += '<input type="text" class="form-control" name="whatsapp[]" id="customWhatsapp' + nextContact + '" MAXLENGTH="20" placeholder="Ex.: (00) 0 0000-0000">';
    newContact += '</div>';
    newContact += '<div class="col-md-6 mb-3">';
    newContact += '<label for="validationCustomEmail' + nextContact + '">E-mail</label>';
    newContact += '<input type="email" class="form-control" name="email[]" id="validationCustomEmail' + nextContact + '" aria-describedby="emailHelp" placeholder="Ex.: email@email.com">';
    newContact += '<div class="invalid-feedback">Por favor, providencie um e-mail valido.</div>';
    newContact += '</div>';
    newContact += '<div class="col-md-6 mb-3" >';
    newContact += '<label for="customNoteContact' + nextContact + '">Observação</label>';
    newContact += '<input type="text" class="form-control" name="note_contact[]" id="customNoteContact' + nextContact + '" placeholder="Ex.: Comercial">';
    newContact += '</div>';
    newContact += '</div>';
    newContact += '</div>';
    $('#addContactLast').append(newContact);
  });
  $(document).on('click', '.btn_remove_contact', function () {
    var button_id = $(this).attr("id");
    $('#addContact' + button_id + '').remove();
  });
});
/******/ })()
;