<script type="x-handlebars-template" id="tamplateNoProductAdded">
    <tr id="noProductAdded">
        <td class="text-center" colspan="8">Nenhum produto adicionado</td>
    </tr>
</script>

<script type="x-handlebars-template" id="tamplateNoServiceAdded">
    <tr id="noServiceAdded">
        <td class="text-center" colspan="6">Nenhum serviço adicionado</td>
    </tr>
</script>

<script type="x-handlebars-template" id="tamplateNoAddressAdded">
    <tr id="noAddressAdded">
        <td class="text-center" colspan="7">Nenhum endereço adicionado</td>
    </tr>
</script>

<script type="x-handlebars-template" id="tamplateAddProduct">

    @{{#each products}}
    <tr id="@{{id_handlebars_product}}" class="existsProduct">
        <td data-name="product">
            <input type="hidden" name="id_product[]" value="@{{id_product}}">
            <input type="hidden" name="product_cost_value[]" value="@{{product_cost_value}}">
            <input type="text" name='name_product[]' placeholder='' value="@{{name_product}}" class="form-control" readonly/>
        </td>
        <td data-name="product_description_order">
            <input
                type="text"
                name='product_description_order[]'
                value="@{{product_description_order}}"
                onblur="updateValueProduct(@{{ @index }}, 'product_description_order', this.value, '@{{id_handlebars_product}}')"
                onkeyup="updateValueProduct(@{{ @index }}, 'product_description_order', this.value, '@{{id_handlebars_product}}')"
                placeholder=''
                class="form-control"
            />
        </td>
        <td data-name="quantity_product">
            <input
                type="text"
                id="quantityProduct_@{{id_handlebars_product}}"
                name='quantity_product[]'
                value="@{{quantity_product}}"
                onblur="updateValueProduct(@{{ @index }}, 'quantity_product', this.value, '@{{id_handlebars_product}}')"
                onkeyup="updateValueProduct(@{{ @index }}, 'quantity_product', this.value, '@{{id_handlebars_product}}')"
                placeholder=''
                class="form-control"
                required
            />
        </td>
        <td data-name="meter" title="Arredondando para o '0,5' acima. Ex.: 1,2 => 1,5">
            <input
                type="text"
                id="meter_@{{id_handlebars_product}}"
                name='meter[]'
                onblur="updateValueProduct(@{{ @index }}, 'meter', this.value, '@{{id_handlebars_product}}')"
                onkeyup="updateValueProduct(@{{ @index }}, 'meter', this.value, '@{{id_handlebars_product}}')"
                value="@{{ meter }}"
                placeholder=''
                class="form-control"
            />
        </td>
        <td data-name="sales_value_product_used_order">
            <input
                type="text"
                id="salesValueProductUsedOrder_@{{id_handlebars_product}}"
                name="sales_value_product_used_order[]"
                value="@{{sales_value_product_used_order}}"
                onblur="updateValueProduct(@{{ @index }}, 'sales_value_product_used_order', this.value, '@{{id_handlebars_product}}')"
                onkeyup="updateValueProduct(@{{ @index }}, 'sales_value_product_used_order', this.value, '@{{id_handlebars_product}}')"
                placeholder=""
                class="form-control"
            />
        </td>
        <td data-name="discount_product">
            <input
                type="text"
                id="discountProduct_@{{id_handlebars_product}}"
                name='discount_product[]'
                onblur="updateValueProduct(@{{ @index }}, 'discount_product', this.value, '@{{id_handlebars_product}}')"
                onkeyup="updateValueProduct(@{{ @index }}, 'discount_product', this.value, '@{{id_handlebars_product}}')"
                value="@{{ discount_product }}"
                placeholder=''
                class="form-control"
            />
        </td>
        <td data-name="order_product_subtotal">
            <input
                type="text"
                id="orderProductSubtotal_@{{id_handlebars_product}}"
                name='order_product_subtotal[]'
                value="@{{order_product_subtotal}}"
                onblur="updateValueProduct(@{{ @index }}, 'order_product_subtotal', this.value, '@{{id_handlebars_product}}')"
                onkeyup="updateValueProduct(@{{ @index }}, 'order_product_subtotal', this.value, '@{{id_handlebars_product}}')"
                placeholder='0,00'
                class="form-control order_product_subtotal"
                required
                readonly
            />
        </td>
        <td data-name="del_product">
            <button
                class='btn btn-danger row-remove'
                onclick="removeProduct(@{{ @index }})">
                <i class="fas fa-times-circle"></i>
            </button>
        </td>
    </tr>
    @{{/each}}
</script>

<script type="x-handlebars-template" id="tamplateAddService">

    @{{#each services}}
    <tr id="@{{id_handlebars_service}}" class="existsService">
        <td data-name="service">
            <input type="hidden" name="id_service[]" value="@{{id_service}}">
            <input type="hidden" name="service_cost_value[]" value="@{{service_cost_value}}">
            <input type="text" name='name_service[]' value="@{{name_service}}" placeholder='' class="form-control" readonly/>
        </td>
        <td data-name="description_service">
            <input
                type="text"
                name='service_description_order[]'
                value="@{{service_description_order}}"
                onblur="updateValueService(@{{ @index }}, 'service_description_order', this.value, '@{{id_handlebars_service}}')"
                onkeyup="updateValueService(@{{ @index }}, 'service_description_order', this.value, '@{{id_handlebars_service}}')"
                placeholder=''
                class="form-control"
            />
        </td>
        <td data-name="sales_value_service_used_order">
            <input
                type="text"
                id="serviceCostValue_@{{id_handlebars_service}}"
                name="sales_value_service_used_order[]"
                value="@{{service_cost_value}}"
                onblur="updateValueService(@{{ @index }}, 'sales_value_service_used_order', this.value, '@{{id_handlebars_service}}')"
                onkeyup="updateValueService(@{{ @index }}, 'sales_value_service_used_order', this.value, '@{{id_handlebars_service}}')"
                placeholder=""
                class="form-control"
            />
        </td>
        <td data-name="discount_service">
            <input
                type="text"
                id="discountService_@{{id_handlebars_service}}"
                name='discount_service[]'
                onblur="updateValueService(@{{ @index }}, 'discount_service', this.value, '@{{id_handlebars_service}}')"
                onkeyup="updateValueService(@{{ @index }}, 'discount_service', this.value, '@{{id_handlebars_service}}')"
                value="@{{ discount_service }}"
                placeholder=''
                class="form-control"
            />
        </td>
        <td data-name="subtotal_service">
            <input
                type="text"
                id="orderServiceSubtotal_@{{id_handlebars_service}}"
                name='order_service_subtotal[]'
                value="@{{ order_service_subtotal }}"
                onblur="updateValueService(@{{ @index }}, 'order_service_subtotal', this.value, '@{{id_handlebars_service}}')"
                onkeyup="updateValueService(@{{ @index }}, 'order_service_subtotal', this.value, '@{{id_handlebars_service}}')"
                placeholder=''
                class="form-control order_service_subtotal"
                required
                readonly
            />
        </td>
        <td data-name="del_service">
            <button
                class='btn btn-danger row-remove'
                onclick="removeService(@{{ @index }})">
                <i class="fas fa-times-circle"></i>
            </button>
        </td>
    </tr>
    @{{/each}}

</script>

<script type="x-handlebars-template" id="tamplateAddAddress">

    <tr id="@{{id_handlebars_address}}" class="existsAddress">
        <td data-name="address">
            <input type="hidden" id="remove_address" value="@{{id_handlebars_address}}">
            <input type="hidden" name="delivery_address_id" value="@{{id_address}}">
            <input type="text" name='cep' value="@{{cep}}" placeholder='' class="form-control" readonly/>
        </td>
        <td data-name="public_place">
            <input type="text" name='public_place' value="@{{public_place}}" placeholder='' class="form-control" readonly/>
        </td>
        <td data-name="number">
            <input type="text" name='number' value="@{{number}}" placeholder='' class="form-control" readonly/>
        </td>
        <td data-name="district">
            <input type="text" name="district" value="@{{district}}" placeholder="" class="form-control" readonly/>
        </td>
        <td data-name="complement">
            <input type="text" name='complement' value="@{{complement}}" placeholder='' class="form-control" readonly/>
        </td>
        <td data-name="del_address">
            <button
                class='btn btn-danger row-remove'
                onclick="removeAddress('@{{id_handlebars_address}}')">
                <i class="fas fa-times-circle"></i>
            </button>
        </td>
    </tr>

</script>

<script type="text/javascript">
    {{-- CLIENTS --}}
    function checkClient(){
        document.getElementById('validatyClient').style.display= 'none';
        let removeSelectizeItem = document.getElementById("validationCustomClient").value;
        if (removeSelectizeItem){
            $(".select_selectize_client").removeClass("is-invalid").addClass("is-valid")
        }else{
            $(".select_selectize_client").removeClass("is-valid").addClass("is-invalid")
        }
    }

    {{-- ADDRESS --}}
    function addDeliveryAddress(value) {
        let myStr = value.split(":");
        let idAddress = myStr[0];
        let cepAddress = myStr[1];
        let publicPlaceAddress = myStr[2];
        let numberAddress = myStr[3];
        let districtAddress = myStr[4];
        let complementAddress = myStr[5];
        //verificando se um valor foi adicionado para mandar pro handlesbars
        if(value){
            if (document.getElementById("noAddressAdded")) {
                document.getElementById("noAddressAdded").remove()
            }else{
                document.getElementById("addressHandlebars").remove();
            }
            let templateProduct = document.getElementById('tamplateAddAddress').innerHTML;
            let compiled = Handlebars.compile(templateProduct);
            let service = document.getElementById('containerAddresses');
            let infoAddress = {
                id_handlebars_address: "addressHandlebars",
                id_address: idAddress,
                cep: cepAddress,
                public_place: publicPlaceAddress,
                number: numberAddress,
                district: districtAddress,
                complement: complementAddress,
            }
            service.innerHTML += compiled(infoAddress);
            // Removendo item selecionado
            let removeSelectizeItem = value;
            document.getElementById("searchAddress").selectize.removeItem(removeSelectizeItem);
        }
    }

    function removeAddress(id) {
        document.getElementById(id).remove();
        if(document.getElementsByClassName("existsAddress").length == 0){
            let compiled = Handlebars.compile(document.getElementById("tamplateNoAddressAdded").innerHTML);
            document.getElementById('containerAddresses').innerHTML = compiled();
        }
    }

    //RETORNA ENDEREÇOS DO CLIENTE SELECIONADO
    function idClientForAddress(value) {
        $.ajax({
            url: "{{ route('return-client-address') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": value
            },
            success: function (data){
                let $selectAddress = $(document.getElementById('searchAddress'));
                let option = $selectAddress[0].selectize;
                for(let i=0; i <= $selectAddress.length; i++){
                    option.clearOptions(true)
                }
                if(!data[0]){
                    $('#tooltipSearchAddress').tooltip({
                        'trigger': 'manual',
                        'title': 'Cliente sem endereços cadastrados.',
                        'placement': 'top'
                    }).tooltip('show');
                }
                $.each(data, function (key, val) {
                    let count = option.items.length + 1;
                    if(!val.cep){ val.cep = '-' }
                    if(!val.number){ val.number = '-'}
                    option.addOption({value: val.id+':'+val.cep+':'+val.public_place+':'+val.number+':'+val.district+':'+val.complement, text: 'CEP: '+val.cep+' | '+val.public_place+' | '+val.number});
                    option.addItem(count);
                });
            },
        });
        if (document.getElementsByClassName("existsAddress").length > 0){
            removeAddress(document.getElementById("remove_address").value);
        }
    }

    {{-- CALCS --}}
    function calcSubtotalProduct(id){
        let quantityProduct = $('#quantityProduct_'+id).val()
        let meter = $('#meter_'+id).val()
        let productOrderValue = $('#salesValueProductUsedOrder_'+id).val()
        let discountProduct = $('#discountProduct_'+id).val()
        let subtotalProduct;
        if(meter){
            subtotalProduct = (quantityProduct *  (Math.ceil(meter * 2) / 2) * productOrderValue) - discountProduct;
        }else{
            subtotalProduct = (quantityProduct * productOrderValue) - discountProduct;
        }
        $('#orderProductSubtotal_'+id).val(subtotalProduct)
        return subtotalProduct;
    }

    function calcTotalProduct(){
        //AQUI FAZER LOOP PARA CONTAR QUANTOS PRODUTOS TEM E SOMAR TODOS OS SUBTOTAIS
        let countProduct = $("input.order_product_subtotal").length;
        let valuesProducts = $("input.order_product_subtotal").map(function(){return $(this).val();}).get();
        let totalProduct = 0;
        if(countProduct > 0){
            for (let i = 0; i < countProduct; i++){
                totalProduct += parseFloat(valuesProducts[i]);
            }
        }
        $('#total_products').val(totalProduct);
        calcTotal();
    }

    function calcSubtotalService(id){
        let serviceCostValue = $('#serviceCostValue_'+id).val();
        let discountService = $('#discountService_'+id).val();
        let serviceSubtotal;
        serviceSubtotal = serviceCostValue - discountService;
        $('#orderServiceSubtotal_'+id).val(serviceSubtotal)
        return serviceSubtotal;
    }

    function calcTotalService(){
        //AQUI FAZER LOOP PARA CONTAR QUANTOS SERVIÇOS TEM E SOMAR TODOS OS SUBTOTAIS
        let countService = $("input.order_service_subtotal").length;
        let valuesServices = $("input.order_service_subtotal").map(function(){return $(this).val();}).get();
        let totalService = 0;
        if(countService > 0){
            for (let i = 0; i < countService; i++){
                totalService += parseFloat(valuesServices[i]);
            }
        }
        $('#total_services').val(totalService);
        calcTotal();
    }

    function calcTotal(){
        let totalProducts = parseFloat($('#total_products').val());
        let totalServices = parseFloat($('#total_services').val());
        let costFreight = parseFloat($('#customCostFreight').val());
        let totalCashDiscount = parseFloat($("#total_cash_discount").val());
        let totalPercentageDiscount = parseFloat($("#total_percentage_discount").val());
        if(!costFreight){
            costFreight = 0;
        }
        if(!totalProducts){
            totalProducts = 0;
        }
        if(!totalServices){
            totalServices = 0;
        }
        let sumSubtotal = totalProducts + totalServices + costFreight
        if(totalCashDiscount && totalPercentageDiscount){
            let percentageDiscount  = (sumSubtotal-totalCashDiscount) * totalPercentageDiscount
            $('#total').val((sumSubtotal-totalCashDiscount) - (percentageDiscount / 100 ));
        }else if(totalCashDiscount){
            $('#total').val(sumSubtotal-totalCashDiscount);
        }else if(totalPercentageDiscount){
            let percentageDiscount  = (sumSubtotal) * totalPercentageDiscount
            $('#total').val((sumSubtotal) - (percentageDiscount / 100 ));
        }else{
            $('#total').val(sumSubtotal);
        }

    }

</script>
