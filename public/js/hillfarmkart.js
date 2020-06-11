function markDelivered(e){
    let orderId = $(e).data('orderid');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'PUT',
        url: '/order/markDelivered',
        data: {'orderID':orderId},
        success: function(data){
            try {
                result = JSON.parse(data);
                if(result){
                    $(e).val('Delivered');
                    $(e).removeClass('btn-outline-success').addClass('btn-success');
                    $(e).prop("onclick", null).off("click");
                    $(e).blur();
                    $(e).siblings('.cancelled').remove();
                }
            } catch (error) {
                
            }
        }
     });
}

function markCancelled(e){

    let orderId = $(e).data('orderid');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 
    $.ajax({
        type: 'PUT',
        url: '/order/markCancelled',
        data: {'orderID':orderId},
        success: function(data){
            try {
                result = JSON.parse(data);
                if(result){
                    $(e).val('Cancelled');
                    $(e).removeClass('btn-outline-danger').addClass('btn-danger');
                    $(e).prop("onclick", null).off("click");
                    $(e).blur();
                    $(e).siblings('.delivered').remove();
                }
            } catch (error) {
                
            }
        }
     });
}