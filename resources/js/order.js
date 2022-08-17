// ------------------------------------    FORM PEDIDO HIDE CAMPOS
$(document).ready(function(){
    //executar quando a página é carregada
    esconde();

    //executar todas as vezes que houver alterações do select;
    $('#selectOrderType').change(function(){
        esconde();
    });


});

function esconde(){
    //quando tiver editando o formuláro o valor fica no Select
    selectedValue = $('#selectOrderType').val();

    //quando tiver visualizando o formulário o valor fica no campo text;
    if(!selectedValue){
        selectedValue = $('#selectOrderType').text();
    }
    switch(selectedValue) {
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
}

//DESABILITA ENVIO POR ENTER
$(document).ready(function() {
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
});

// SELECTIZE
$(document).ready(function () {

    $(".select_selectize").selectize({
        // create:true, //DAR A OPCAO DE ADICIOANR CASO NAO TIVER
        sortField: {
            field: 'text',
            direction: 'asc'
        },
        placeholder: $(this).data('placeholder'),
        // width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        allowClear: Boolean($(this).data('allow-clear')),

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

        onChange:function (value){
            if(value){
                document.getElementById('validatyClient').style.display= 'block'
                $(".select_selectize_client").removeClass("is-invalid").addClass("is-valid")
            }else{
                document.getElementById('validatyClient').style.display= 'none'
                $(".select_selectize_client").removeClass("is-valid").addClass("is-invalid")
            }
        },
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
        onFocus: function () {
            // control has gained focus
            let selectClient = $(document.getElementById('validationCustomClient').value);

            if(selectClient.prevObject === undefined){
                $('#tooltipSearchAddress').tooltip({
                    'trigger': 'manual',
                    'title': 'Selecione um cliente por favor.',
                    'placement': 'top'
                }).tooltip('show');
            }

        },
        onBlur: function () {
            $('#tooltipSearchAddress').tooltip().tooltip('dispose');
        },

    });
});

$(document).ready(function() {

    $("#searchProduct").change((event)=> {
        addProduct(event.target.value);
    });

    $("#searchService").change((event)=> {
        addService(event.target.value);
    });

    $("#searchAddress").change((event)=> {
        addDeliveryAddress(event.target.value);
    });

});

// ------------------------------------------------------------------------------------------------------------------------------------------------------

