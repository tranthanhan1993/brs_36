$(document).ready(function(){

     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.update-accept', function (e){
        e.preventDefault();
        divChangeAmount = $(this).parent();
        $this = $(this);
        var requestId = divChangeAmount.data('requestId');
        var route = $('.hide').data('route');
        var token = divChangeAmount.data('token');

        $.ajax({
            type: 'POST',
            url: route + '/' + requestId,
            dataType: 'JSON',
            data: {
                '_method': 'PUT',
                'request_id': requestId,
                '_token': token,
            },
            success: function(data){
                if (data.success) {
                    $('.request' + requestId).html(data.html);
                }
            }
        });
    });
});
