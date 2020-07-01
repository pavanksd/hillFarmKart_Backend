function markDelivered(e){
    const orderId = $(e).data('orderid');
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

    const orderId = $(e).data('orderid');

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

function createItem(){
    const itemName      = $('#itemName').val();
    const itemPrice     = $('#itemPrice').val();
    const itemImage     = $('#imageUpload').prop("files")[0];    
    
    const formData = new FormData();
    formData.append("itemImage", itemImage);
    formData.append("itemName", itemName);
    formData.append("itemPrice", itemPrice );

    $('.alert').fadeOut();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '/catalog/store',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            try {
                result = JSON.parse(data);
                if(result['status']){
                    $('#itemName,#itemPrice').val('');
                    $('.alert-success').fadeIn();
                } else {
                    $('.alert-danger').fadeIn()
                }
            } catch (error) {
                
            }
        }
     });
}

function updateItem(id){
    const itemName      = $('.itemName_'+id).val();
    const itemPrice     = $('.itemPrice_'+id).val();
    const enabled       = $('.enabled_'+id).val();
    $('.alert').fadeOut();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '/catalog/update',
        data: {'itemId':id,'itemName':itemName,'itemPrice':itemPrice,'enabled':enabled},
        success: function(data){
            try {
                result = JSON.parse(data);
                if(result['status']){
                    alert('Data saved');
                } else {
                    alert('Error in upadting item!! Enter valid values in all fields');
                }
            } catch (error) {
                
            }
        }
     });
}

$('.is_enabled').change(function(){
    $(this).parent('td').hasClass('table-success') ? 
        $(this).parent('td').removeClass('table-success').addClass('table-danger'):
        $(this).parent('td').removeClass('table-danger').addClass('table-success')
});