/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/order.js ***!
  \*******************************/
// ------------------------------------    FORM PEDIDO HIDE CAMPOS
$(document).ready(function () {
  //executar quando a página é carregada
  esconde(); //executar todas as vezes que houver alterações do select;

  $('#selectOrderType').change(function () {
    esconde();
  });
});

function esconde() {
  //quando tiver editando o formuláro o valor fica no Select
  selectedValue = $('#selectOrderType').val(); //quando tiver visualizando o formulário o valor fica no campo text;

  if (!selectedValue) {
    selectedValue = $('#selectOrderType').text();
  }

  switch (selectedValue) {
    case "0":
      $('#divValidity').hide();
      $("#divValidity").val("");
      break;

    case "1":
      $('#divValidity').show();
      break;

    default:
      $('#divValidity').hide();
      $("#divValidity").val("");
  }
} //DESABILITA ENVIO POR ENTER


$(document).ready(function () {
  $(window).keydown(function (event) {
    if (event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
}); // SELECTIZE

$(document).ready(function () {
  $(".select_selectize").selectize({
    // create:true, //DAR A OPCAO DE ADICIOANR CASO NAO TIVER
    sortField: {
      field: 'text',
      direction: 'asc'
    },
    placeholder: $(this).data('placeholder'),
    // width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    allowClear: Boolean($(this).data('allow-clear'))
  });
  $(".select_selectize_client").selectize({
    // create:true, //DAR A OPCAO DE ADICIOANR CASO NAO TIVER
    sortField: {
      field: 'text',
      direction: 'asc'
    },
    placeholder: $(this).data('placeholder'),
    // width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    allowClear: Boolean($(this).data('allow-clear')),
    onChange: function onChange(value) {
      if (value !== '') {
        $(".select_selectize_client").removeClass("is-invalid").addClass("is-valid");
      } else {
        $(".select_selectize_client").removeClass("is-valid").addClass("is-invalid");
      }
    }
  });
  $(".select_selectize_address").selectize({
    // create:true, //DAR A OPCAO DE ADICIOANR CASO NAO TIVER
    sortField: {
      field: 'text',
      direction: 'asc'
    },
    placeholder: $(this).data('placeholder'),
    // width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    allowClear: Boolean($(this).data('allow-clear')),
    onFocus: function onFocus() {
      // control has gained focus
      var selectClient = $(document.getElementById('validationCustomClient').value);

      if (selectClient.prevObject === undefined) {
        $('#tooltipSearchAddress').tooltip({
          'trigger': 'manual',
          'title': 'Selecione um cliente por favor.',
          'placement': 'top'
        }).tooltip('show');
      }
    },
    onBlur: function onBlur() {
      $('#tooltipSearchAddress').tooltip().tooltip('dispose');
    }
  });
}); //RETORNA ENDEREÇOS DO CLIENTE SELECIONADO

function idClientForAddress(value) {
  $.ajax({
    url: "{{ route('returnClientAddress') }}",
    data: {
      "_token": "{{ csrf_token() }}",
      "id": value
    },
    success: function success(data) {
      var $selectAddress = $(document.getElementById('searchAddress'));
      var option = $selectAddress[0].selectize;

      for (var i = 0; i <= $selectAddress.length; i++) {
        option.clearOptions(true);
      }

      if (!data[0]) {
        $('#tooltipSearchAddress').tooltip({
          'trigger': 'manual',
          'title': 'Cliente sem endereços cadastrados.',
          'placement': 'top'
        }).tooltip('show');
      }

      $.each(data, function (key, val) {
        var count = option.items.length + 1;

        if (!val.cep) {
          val.cep = '-';
        }

        if (!val.number) {
          val.number = '-';
        }

        option.addOption({
          value: val.id + ':' + val.cep + ':' + val.public_place + ':' + val.number + ':' + val.district + ':' + val.complement,
          text: 'CEP: ' + val.cep + ' | ' + val.public_place + ' | ' + val.number
        });
        option.addItem(count);
      });
    }
  });
}
/******/ })()
;