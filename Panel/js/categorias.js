$(document).ready(function(){
    
    let edit=false;
        Listadocate();  
  $('#products-form').submit(function(e){
     var formData = new FormData();
          var files = $('#imagen')[0].files[0];
          formData.append('imagen',files);
          formData.append('categoryname',$('#nombre').val());
          formData.append('categoryid',$('#id').val());
          formData.append('descriptions',$('#descripcion').val());
          formData.append('statuscategorie','activa');
          
         let url = edit === false ? 'category-add.php' : 'category-edit.php';
  
          $.ajax({
              url: url,
              type: 'post',
              data: formData,
              contentType: false,
              processData: false,
              success: function(response) {
                Listadocate();  
                $('#products-form').trigger('reset');
                if(response == 1)
                {
                  Swal.fire(
                    'Producto agregado',
                   '',
                  'success',
                  )
                }
               else if (response == 0)
               {
                Swal.fire(
                  'Producto existente',
                   '',
                  'error'
                  )
               }
               else
               {Swal.fire(
                  'Producto Actualizado',
                   '',
                  'info'
                  )
  
               }
              }
          });
          e.preventDefault();
  });
  // $.ajax({
    //    url:'productsadd.php',
    //    type: 'POST',
    //    data:{postData},
    //    processData: false,
    //    contentType: false,
    //    cache : false,
    //    success: function(response){
    //     console.log(response);
    //     alert('hola');
    //    }
    //      });
    //      return false;
    // const postData ={
    //   nombre:$('#nombre').val(),
    //   id:$('#id').val(),
    //   descripcion:$('#descripcion').val(),
    //   content:$('#content').val(),
    //   imagen:$('#imagen').val(),
    //   precio:$('#precio').val(),
    //   categoria:$('#categoria').val(),
    //   stock:$('#stock').val()
    // };
    //  console.log(postData);
    //  $.ajax({
    //    url:'productsadd.php',
    //    type: 'POST',
    //    data:{frmData},
    //    processData: false,
    //    contentType: false,
    //    cache : false,
    //    success: function(response){
    //    console.log(response);
    //    }
    //      });
  
        // BUSQUEDA  READY
    $('#search').keyup(function(e){
      let searchPingu = $('#search').val();
      $.ajax({
       url:'SearchPingucategories.php',
       type: 'POST',
       data:{searchPingu},
       success: function(response){
         console.log(response);
         let template ='';
         $(response.data).each(function(index,value){
          template+=`
                 <tr productid="${value.categoryid}">
                 <td>${value.categoryid}</td>
                 <td>${value.categoryname}</td>
                      <td>${value.descriptions}</td>
                      <td><img class="img-thumbnail"width="100px" src="../img/backgrounds/${value.picturecategorie}"></td>
                      <td><div class="btn status">${value.statuscategorie}</div></td>
                      <td><button id="edit" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg""><i class="fa fa-edit" style="color :white"></i></button><button id="change" class="btn btn-primary"><i class="fa fa-sync " style ="color :white"></i></button></td>
                     </tr>
                      `       
         });
         $('#categories').html(template); 
         Pintado();

  
       }
      })
    })
  
    // AGREGAR PRODUCTO
    $(document).on('click','#agregar',function(){
    $('#TituloModal').text('AGREGAR CATEGORIA');
    $('#id').prop('disabled',false);
    $('#products-form').trigger('reset');
    });
  
  
    // EDITAR PRODUCTO
    $(document).on('click','#edit',function(){
    $('#TituloModal').text('EDITAR PRODUCTO');
    let element = $(this)[0].parentElement.parentElement;
    let id= $(element).attr('categoryid');
    $.post('category-single.php',{id}, function(response){
      $('#id').val(response.data[0].categoryid);
      $('#id').prop('disabled',true);
      $('#nombre').val(response.data[0].categoryname);
      $('#descripcion').val(response.data[0].descriptions);
      $('#imagen').text(response.data[0].picturecategorie);

      edit=true;
      // <form id="products-form" action="" method="post" enctype="multipart/form-data">
      // <label for="" class="control-label">ID</label>
      // <input type="text" class="form-control" id="id" name="id"placeholder="" required="" >
      // <label for="" class="control-label">Nombre</label>
      // <input type="text" class="form-control" id="nombre" name="nombre"placeholder="" required=""  >
      // <label for="" class="control-label">Descripcion</label>
      // <input type="text" class="form-control" id="descripcion" name="descripcion"placeholder="" required="" >
      // <label for="" class="control-label">Content</label>
      // <input type="text" class="form-control" id="content" name="content"placeholder="" required="" >
      // <label for="imagen" class="control-label">imagen</label>
      // <input type="file" accept="image/*" class="form-control" id="imagen" name="imagen" required="" placeholder="" >    
      // <label for="" class="control-label">Precio</label>
      // <input type="text" class="form-control" id="precio" name="precio"placeholder="" required="" >
      // <label for="" class="control-label">Categoria</label>
      // <select class="form-control" name="category" id="categoria" required="" >                
      // <label for="" class="control-label">Stock</label>
      // <input type="text" class="form-control" id="stock" name="stock" placeholder="" required="" >
    })
    });
    // CAMBIAR ESTATUS READY
  $(document).on('click','#change',function(){
          Swal.fire({
    title: 'Desea cambiar el status?',
    text:'Esto afectara la visualizacion de sus categorias y productos relacionados.',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si!',
    cancelButtonText: 'No'
  }).then((result) => {
    if (result.value) {
      let element = $(this)[0].parentElement.parentElement;
          let id = $(element).attr('categoryid');
          $.post('categoriasstatus.php',{id},function(response){
            Listadocate();  
              Swal.fire(
        response,
        '',
        'success'
      )
      })
    }
  })
  })
  
  
  // LISTAR Categorias READY
  function Listadocate(){
    $.ajax({
      type: "GET",
      url: "categorieslist.php",
      success: function (response) {
          console.log(response);
          let template ='';
             $(response.data).each(function(index,value){
                 template+=`
                 <tr categoryid="${value.categoryid}">
                 <td>${value.categoryid}</td>
                 <td>${value.categoryname}</td>
                 <td>${value.descriptions}</td>
                      <td><img class="img-thumbnail"width="100px" src="../img/backgrounds/${value.picturecategorie}"></td>
                      <td><div class="btn status">${value.statuscategorie}</div></td>
                      <td><button id="edit" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg""><i class="fa fa-edit" style="color :white"></i></button><button id="change" class="btn btn-primary"><i class="fa fa-sync " style ="color :white"></i></button></td>
                     </tr>
                      `
                  });
                  $('#categories').html(template); 
                  Pintado();      
      }
  });
  
    }

    function Pintado(){
        $('.status').each(function(indice,valor) {
            if($(this).text()== 'activa')
            {
           $(this).addClass('btn-success');
            }
            else if($(this).text()== 'desactivada')
              $(this).addClass('btn-danger');
            });  
    }
  });
  