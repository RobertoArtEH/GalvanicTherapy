 $(document).ready(function () {
     $(".user" ).click(function() {
        let id = $(this).text();
        alert(id);
        $.post('prueba.php',{id},function(response){
            const user =JSON.parse(response);
            $('.usuarios').removeClass('invisible');
            $('#tabla').append('<td>'+user.id+'</td>');
            $('#tabla').append('<td>'+user.first_name+'</td>');
            $('#tabla').append('<td>'+user.last_name+'</td>');
            $('#tabla').append('<td><img class="img-thumbnail"width="100px" src="imagenes/'+user.imageprofile+'"></td>');
            
          
        })
       });  
       
       $(".order" ).click(function() {
        let id = $(this).text();
        alert('order');
        })
    });
