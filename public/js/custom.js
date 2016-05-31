
//$(document).ready(function () {
//    $('.autosuggest').keyup(function () {
//        var searchitem = $(this).val();
//        $.post('ajax/search.php', {searchitem: searchitem}, function (data) {
//            $('.result').html(data);
//            $('.result li').click(function () {
//                var resultvalue = $(this).text();
//                $('.autosuggest').val(resultvalue);
//                $('.result').html('');
//            });
//        });
//
//    });
//});
$(document).ready(
        function () {
            $('.autosuggest').keyup(function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var searchitem = $(this).val();
                //alert(searchitem);
                $.ajax({
                    url: 'autosuggest',
                    type: 'post',
                    data: {searchitem: searchitem},
                    success: function (data) {
                        
                        $('.result').html(data);


                        $('.result li').click(function () {
                            var result_value = $(this).text();
                            $('.autosuggest').val(result_value);
                            $('.result').html('');
                        });

                    }
                });

            });
        });