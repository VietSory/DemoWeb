$(document).ready(function (){
    $('.btn_submit').click(function(e){
        e.preventDefault();
        var fullname= $(".fullname").val();
        var star=$('input.star-input:checked').val();
        var content=$(".content").val();
        var idsp=$(".idsp").val();
        var email= $(".email").val();

        $.ajax({
            type: "POST",
            url: 'view/client/index?act=xulicmt',
            dataType : "html",
            data : {
                idsp : idsp,
                fullname :  fullname,
                star :star,
                content : content,
                email: email
            }
        }).done(function(rs){
            $("#newcomment").html(rs);
            $(".content").val("");
            $("input[type='radio']").prop("checked",false);
        })
        .fail(function(){
            $("#newcomment").html(fail);
        });
    });
 });