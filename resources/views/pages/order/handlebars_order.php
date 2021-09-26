
<script type="x-handlebars-template" id="tamplateAddProduct">
    <div id="{{id}}" class="form-row">
        <div class="col-md-12 table-responsive">
            <table class="table table-bordered table-hover table-sortable" id="tab_logic_product">
                <thead>
                <tr >
                    <th >
                        Produto *
                    </th>
                    <th >
                        Detalhes
                    </th>
                    <th >
                        Quant. *
                    </th>
                    <th >
                        Valor *
                    </th>
                    <th >
                        Desconto
                    </th>
                    <th >
                        Subtotal
                    </th>
                    <th class="text-center">
                        {{--                                <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">--}}
                        Del
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr id='addr0' data-id="0" class="hidden">
                    <td data-name="product">
                        <input type="text" name='name_product' placeholder='' value="" class="form-control" disabled/>
                    </td>
                    <td data-name="description_product">
                        <input type="text" name='description_product' placeholder='' class="form-control"/>
                    </td>
                    <td data-name="quantity">
                        <input type="text" name='quantity' placeholder='' class="form-control"/>
                    </td>
                    <td data-name="product_order_value">
                        <input type="text" name="product_order_value" placeholder="" class="form-control" />
                    </td>
                    <td data-name="discount_product">
                        <input type="text" name='discount_product' placeholder='' class="form-control"/>
                    </td>
                    <td data-name="subtotal_product">
                        <input type="text" name='subtotal_product' placeholder='0,00' class="form-control"/>
                    </td>
                    <td data-name="del_product">
                        <button name="del_product" class='btn btn-danger glyphicon glyphicon-remove row-remove' onclick="removeDiv({{id}})"><span aria-hidden="true">×</span></button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</script>
