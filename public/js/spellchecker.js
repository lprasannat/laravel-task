$(document).ready(function () {

    $("#word").keyup(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        var word = $("#word").val();

//alert(word);
        $.ajax({
            url: 'checkspelling',
           type: 'post',
            data: {word: word},
            success: function (data) {
//alert(data);
                $("#list").html(data);
                $("#list li").click(function () {

                    $("#word").val($(this).text());
                    $("#list").html("");
                });
            }
        });



    });

    $('body').not('li').click(function () {

        $("#list").html("");
    });
});