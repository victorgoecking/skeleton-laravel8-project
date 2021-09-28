/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/product.js ***!
  \*********************************/
// CALCULANDO VALOR DE VENDA E PORCENTAGEM DE LUCRO
//
// $("#validationCustomProductCostValue").keyup(function(){
//     calculatePersentagem();
// });
//
// $("#profitPercentage").keyup(function(){
//     calculatePersentagem();
// });
$("#validationCustomProductCostValue").change(function () {
  calculatePersentagem();
});
$("#buttonCalculateSalesValueProduct").click(function () {
  calculatePersentagem();
});

function calculatePersentagem() {
  var product_cost_value = $("#validationCustomProductCostValue").val();
  var profit_percentage = $("#profitPercentage").val();
  var sales_value_product_used;

  if (product_cost_value && !isNaN(product_cost_value)) {
    if (profit_percentage) {
      sales_value_product_used = parseFloat(product_cost_value) + profit_percentage / 100 * parseFloat(product_cost_value);
      $("#titleSuggestedSalesValue").html('Valor (R$) de venda referente a ' + parseFloat(profit_percentage) + '%');
    } else {
      sales_value_product_used = product_cost_value * 1.5; // if(!$("#profitPercentage").focus){

      $("#profitPercentage").val(50);
      $("#titleSuggestedSalesValue").html('Valor (R$) de venda referente a 50%'); // }
    }

    $("#salesValueProductUsed").val(parseFloat(sales_value_product_used));
    $("#suggestedSalesValue").html(parseFloat(sales_value_product_used));
  } else {
    $("#salesValueProductUsed").val('');
    $("#suggestedSalesValue").html('0,00');
    alert("Valor de custo deve ser maior que ZERO");
  }
}
/******/ })()
;