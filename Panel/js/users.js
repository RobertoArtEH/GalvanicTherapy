$(document).ready(function(){
    let edit=false;
        ListaUsuarios();  
  
        // BUSQUEDA 
    $('#search').keyup(function(e){
      let searchPingu = $('#search').val();
      $.ajax({
       url:'SearchPinguusers.php',
       type: 'POST',
       data:{searchPingu},
       success: function(response){
         console.log(response);
         let template ='';
         $(response.data).each(function(index,value){
            template+=`
            <tr id="${value.id}">
            <td>${value.id}</td>
            <td>${value.first_name}</td>
                 <td>${value.last_name}</td>
                 <td><img class="img-thumbnail"width="100px" src="../img/icons/user.png"></td>
                 <td>${value.username}</td>
                 <td><div class="btn role">${value.role}</div></td>
                 <td><div class="btn status">${value.status}</div></td>
                 <td><button id="change" class="btn btn-primary"><i class="fa fa-sync " style ="color :white"></i></button></td>
                </tr>
                 `
             });
             $('#Usuarios').html(template);     
             Pintado();
       }
      })
    })
    // CAMBIAR ESTATUS
  $(document).on('click','#change',function(){
          Swal.fire({
    title: 'Desea cambiar el status?',
    text:'Esto podria afectar el acceso a los usuarios.',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si!',
    cancelButtonText: 'No'
  }).then((result) => {
    if (result.value) {
      let element = $(this)[0].parentElement.parentElement;
          let id = $(element).attr('id');
          $.post('Userstatus.php',{id},function(response){
            ListaUsuarios();  
              Swal.fire(
        response,
        '',
        'success'
      )
      })
    }
  })
  })
  
  
  // LISTAR PRODUCTOS
  function ListaUsuarios(){
    $.ajax({
      type: "GET",
      url: "Userslist.php",
      success: function (response) {
          console.log(response);
          let template ='';
             $(response.data).each(function(index,value){
                 template+=`
                 <tr id="${value.id}">
                 <td>${value.id}</td>
                 <td>${value.first_name}</td>
                      <td>${value.last_name}</td>
                      <td><img class="img-thumbnail"width="100px" src="../img/icons/user.png"></td>
                      <td>${value.username}</td>
                      <td><div class="btn role">${value.role}</div></td>
                      <td><div class="btn status">${value.status}</div></td>
                      <td><button id="change" class="btn btn-primary"><i class="fa fa-sync " style ="color :white"></i></button></td>
                     </tr>
                      `
                  });
                  $('#Usuarios').html(template);  
                  Pintado();     
      }
  });
  
    }
    function Pintado(){
        $('.role').each(function(indice,valor) {
            if($(this).text()== 'admin')
            {
           $(this).addClass('btn-danger');
            }
            else if($(this).text()== 'user')
              $(this).addClass('btn-info');
            });  
        $('.status').each(function(indice,valor) {
            if($(this).text()== 'active')
            {
           $(this).addClass('btn-success');
            }
            else if($(this).text()== 'desactived')
              $(this).addClass('btn-danger');
            });  
    }
  });
  