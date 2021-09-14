
// CALCULANDO VALOR DE VENDA E PORCENTAGEM DE LUCRO

$("#validationCustomProductCostValue").keyup(function(){
    calculatePersentagem();
});

$("#profitPercentage").keyup(function(){
    calculatePersentagem();
});

function calculatePersentagem() {
    var product_cost_value = $("#validationCustomProductCostValue").val();
    var profit_percentage = $("#profitPercentage").val();
    let sales_value_product_used;

    if (product_cost_value && !isNaN(product_cost_value)){
        if(profit_percentage){
            sales_value_product_used = parseFloat(product_cost_value) + ((profit_percentage / 100) * parseFloat(product_cost_value));
        }else {
            sales_value_product_used = product_cost_value * 1.5;
            $("#profitPercentage").val(50);
        }

        $("#salesValueProductUsed").val(parseFloat(sales_value_product_used));
        $("#suggestedSalesValue").html(parseFloat(sales_value_product_used));
    }else{
        $("#salesValueProductUsed").val('');
        $("#suggestedSalesValue").html('0,00');
    }
}
