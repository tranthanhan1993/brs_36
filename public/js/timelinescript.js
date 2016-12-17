window.onload = (function () {
    $(".clickOnChange").click(function () {
        var token  = $("input[name = '_token']").val();
        var followed_id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: '/home/unfollow/' + followed_id,
            cache: false,
            data: {'_token': token,'id': followed_id},
            success:function(data) {

                if (data == "Success") {
                    $('#follow').load(location.href + " #follow>*", "");
                    $('#timeline').load(location.href + " #timeline>*", "");
                } else {
                    alert('Faile');
                }
            }
        });
    });
});
