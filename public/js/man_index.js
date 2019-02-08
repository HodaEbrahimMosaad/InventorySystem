'use strict';
$(document).ready(function () {

    function succFun() {
        $("#exampleModal").modal('hide');
        $("#exampleModal").removeClass('fade');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        $('#freshItems').load(window.location.href + " #freshItems", function () {
            $('.test .test').removeClass('col-md-10').addClass('col-md-12');
        });
        $("body").css('padding-right' , '0px');
    }
    var deletedId;
    $(document).on("click", ".delete",function () {
        deletedId = $(this).data("id");
    });

    $(document).on("click", "#delete", function () {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            method: "POST",
            url: "manager/destroy",
            data: {
                deletedId: deletedId,
            },
            success: function (data) {
                alert('g');
                succFun();
            },
            error:function(data){
                succFun();
            },
        })

    });

});