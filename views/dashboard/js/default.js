$(function() {

    $.get('dashboard/xhrGetListings', function(o){
        console.log(o[0].text);

        for(var i=0;i<o.length;i++)
        {
            $('#listInserts').append('<div>'+o[i].text+'<a class="del" rel="'+o[i].id+'" href="#">X</a></div>');
        }

        $('#listInserts').on('click','.del',function(){
            var id=$(this).attr('rel');
            $.post('dashboard/xhrDeleteListing',{'id': id}, function(o){
            }, 'json');
            $(this).parent().remove();
            return false;
        });

    }, 'json');

    $('#randomInsert').on('submit',function() {
        var url = $(this).attr('action');
        var data = $(this).serialize();
        $.post(url,data, function(o){
            $('#listInserts').append('<div>'+o.text+'<a class="del" rel="'+o.id+'" href="#">X</a></div>');
        }, 'json');

        return false;
    });
    
});