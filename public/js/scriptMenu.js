$(document).ready(function () {

    $(".submenu > a").click(function (e) {
        e.preventDefault();
        var $li = $(this).parent("li");
        var $ul = $(this).next("ul");

        if ($li.hasClass("open")) {
            $ul.slideUp(350);
            $li.removeClass("open");
        } else {
            $(".nav > li > ul").slideUp(350);
            $(".nav > li").removeClass("open");
            $ul.slideDown(350);
            $li.addClass("open");
        }
    });

});


//sortable menu

var newParentId;
var id;
$("li").mousedown(function (event) {
    id = event.target.id;

    var elementParentId = $('.list-group-item#' + id).parent().children("li").parents("li").attr("i");
    newParentId = $(this).attr("parent_id", elementParentId);
});

$(".ul").sortable({
    connectWith: $('.ul'),
    items: '.list-group-item',
    revert: true,
    scrollSensitivity: 10,
    flexibleHours: true,
    companyCulture: 100,
    accept: "li",
    forceHelperSize: true,
    forcePlaceholderSize: true,
    opacity: .6,
    tolerance: 'pointer',
    cursor: 'pointer',
    cursorAt: {
        top: -20
    },
    zIndex: 9999,

    update: function () {
        var data = [];
        $(".list-group-item").each(function (key, val) {
            var pId = $(this).parents('li').length > 0 ? $(this).parents('li').attr('id') : null;
            var id = $(this).attr("id");
            var dataObj = {
                order: key,
                pId: pId,
                id: id
            };
            data.push(dataObj);
        });

        $.ajax({
            data: {"data": data},
            dataType: "json",
            type: 'POST',
            url: 'menu/update',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                console.log(data);
                $(".alert").show(1000)
                $(".alert").hide(5000);

                $("#mess").text(data["data"])
            }
        });
    }
});

//image upload

$('input[type="file"]').change(function (e) {
    var fileName = e.target.files[0].name;
    $('img').attr('src', 'http://laravel.loc/images/' + fileName);
});


//edit

$(".edit").on("click", function () {
    var txt;
    if (confirm("Are you sure you want to delete this menu!")) {
        var edit_id = $(this).attr("id");

        $.ajax({
            data: {"data": edit_id},
            dataType: "json",
            type: 'POST',
            url: 'menu/destroy/' + edit_id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data) {
                    window.location.href = "menu";
                }
            }
        })
    } else {
        console.log("You pressed Cancel!");
    }

})

//image cropper

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 300,
        height: 255,
        type: 'squire'
    },
    boundary: {
        width: 300,
        height: 255


    }
});


$('#upload').change(function () {
    var lastClass = $('.upload-result').attr('class').split(' ').pop();
    $(".upload-result").removeClass(lastClass);
    var reader = new FileReader();
    reader.onload = function (e) {
        $uploadCrop.croppie('bind', {
            url: e.target.result
        }).then(function () {
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
});

var img;
$('.upload-result').click(function (ev) {

    $uploadCrop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function (resp) {
        img = resp;
        html = '<img src="' + img + '" />';
        $("#upload-demo-i").html(html);

    });


});
var data;
$("#create111").click(function () {
    data = {
        "name": $("#name").val(),
        "description": $("#description").val(),
        "price": $("#price").val(),
        "category_id": $("#category_id").val(),
        "image": img
    }
    $.ajax({
        url: "/admin/product/create",
        type: "post",
        dataType: "json",
        cache: false,
        data: data,
        success: function (data) {
            if (data["data"] == "ok") {
                location.href = "/admin/product"
            } else {
                $("#res").html("Your data  don't saved").css("color", "red")

            }
        }
    })

})


//table sortable


$("#productBody").sortable({
    connectWith: $('tbody'),
    items: 'tr',
    revert: true,
    zIndex: 9999,

    update: function () {
        var data = [];
        $("tr").each(function (key) {
            if (key != 0) {
                var id = $(this).attr("id");
                dat = {
                    order: key,
                    id: id,
                };

                data.push(dat)


            }
        });

        $.ajax({
            url: 'product/update',
            type: 'post',
            data: {data:data},
            dataType: "json",
            success: function (data) {
               console.log(data)
            }
        })

    }

});