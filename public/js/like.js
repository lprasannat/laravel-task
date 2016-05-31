function like_add(Article_Id) {
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }});
   
        $.ajax({
              url:'like_add',
              type:'post',
            data: {Article_Id: Article_Id},
            success:function(data)
            {
  
        if (data == 'success') {
            like_get(Article_Id);
        }
        else {
             $('#danger').html(data);
        }
            }
    });

}
function like_get(Article_Id) {
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
        $.ajax({
              url:'like_get',
              type:'post',
            data:{Article_Id: Article_Id},
            success:function(data)
            {  
                
                        
    $('#article_' + Article_Id + '_likes').text(data);
            }
    });
}