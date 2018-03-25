$( document ).ready(function() {
    $.CestaFeira();
});

function initListaOrcamento() {
    var products = $.CestaFeira({}).getItems(),
        totalValueTemp = 0,
        $cartItems = $('#cart-items');

    if (!products) {            
        return;
    }

    function updateTotalValue() {

        var totalValue = 0;

        $.each($('[data-item-total-value]'), function (index, item) {
            totalValue += $(item).data('item-total-value');
        });

        $('#total-value').html("$" + parseFloat(totalValue).toFixed(2));
    }

    function mountLayout(index, data) {

        var totalValueTemp = parseFloat(data.unity_price) * parseInt(data.quantity);

        var $layout =  "<tr id='product-"+ index +"'><td class='col-sm-8 col-md-6'><div class='media'>" +
                        "<img src='"+ data.item_img +"' style='width:50px; height:50px; border-radius: 50%;' class='img-fluid'>" +
                        "<div class='media-body'>" +
                        "<h5 class='mt-0'>"+ data.product_name +"</h5>" +
                        "</div></div></td><td class='col-sm-1 col-md-1' style='text-align: center'>" + data.quantity +
                        "<td class='col-sm-1 col-md-1 text-center'><strong>$"+ data.unity_price +"</strong></td>" +
                        "<td class='col-sm-1 col-md-1 text-center'><strong>"+ data.item_id +"</strong></td>" +
                        "<td class='col-sm-1 col-md-1 text-center' data-item-total-value='"+totalValueTemp+"'><strong>"+parseFloat(totalValueTemp).toFixed(2)+"</strong></td>" +
                        "<td class='col-sm-1 col-md-1'>" +
                        "<a href='javascript:;' class='btn btn-danger' data-cesta-feira-delete-item='"+ index +"'><i class='fas fa-times'></i></a>" +
                        "</td></tr>";        

        $cartItems.append($layout);
    }  

    $.each(products, function (index, value) {
        mountLayout(index, value);
    });

    updateTotalValue();
    
    $(document).on('click', 'a[data-cesta-feira-delete-item]', function(e) {
        e.preventDefault();

        var productId = $(this).data('cesta-feira-delete-item');
        
        if($(document).on('cesta-feira-item-deleted')){
            $('#product-'+productId).fadeOut(500, function() {
                $(this).remove();
                updateTotalValue();
            });
        }
    });

    $(document).on('cesta-feira-clear-basket', function (e) {
        $('#cart-items tr').each(function (index, value) {
            $(value).fadeOut(500, function() {
                $(this).remove();
                updateTotalValue();
            });
        });
    });
}

$(document).ready(function () {
    initListaOrcamento();            
});