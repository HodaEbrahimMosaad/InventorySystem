'use strict';
$(document).ready(function () {
    $(document).on("click", ".edit", function () {
        var inventory_id = $(this).data("id");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            method: "POST",
            url: "inventory/edit",
            data: {
                inventory_id: inventory_id
            }
        }).done(function( msg ) {
            $(".modal-body").empty();
            $(".modal-body").append(msg);
            $("#exampleModal").modal('show');
        });
    });

    $(document).on("click", "#saveChanges", function () {
        var name = $("#name").val(),
            description = $("#description").val(),
            manager = $("#manager").val(),
            id = $("#id").val()
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            method: "POST",
            url: "inventory/update",
            data: {
                id: id,
                name: name,
                description: description,
                manager: manager,
            },
            success: function (data) {
                succFun();
            }
        });
    });
    $('.test .test').removeClass('col-md-10').addClass('col-md-12');
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
        $("#exampleModal").modal('show');
        $(".modal-body").html('you sure?');
        $('#exampleModalLabel').text("Delete User");
        $('#saveChanges').css('display' , 'none');
        $('#delete').css('display' , 'block');
        deletedId = $(this).data("id");
    });

    $(document).on("click", "#delete", function () {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            method: "POST",
            url: "inventory/destroy",
            data: {
                deletedId: deletedId,
            },
            success: function (data) {
                succFun();
            },
            error:function(data){
                succFun();
            },
        })

    });

});