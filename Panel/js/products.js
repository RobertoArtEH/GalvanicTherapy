$(document).ready(function(){
  let edit=false;
      ListadoProd();  
$('#products-form').submit(function(e){
   var formData = new FormData();
        var files = $('#imagen')[0].files[0];
        formData.append('imagen',files);
        formData.append('nombre',$('#nombre').val());
        formData.append('id',$('#id').val());
        formData.append('descripcion',$('#descripcion').val());
        formData.append('content',$('#content').val());
        formData.append('precio',$('#precio').val());
        formData.append('categoria',$('#categoria').val());
        formData.append('stock',$('#stock').val());
        formData.append('productstatus','activo');
        
      let url = edit === false ? 'productsadd.php' : 'products-edit.php';

        $.ajax({
            url: url,
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
              ListadoProd();  
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

      // BUSQUEDA 
  $('#search').keyup(function(e){
    let searchPingu = $('#search').val();
    $.ajax({
     url:'SearchPinguproducts.php',
     type: 'POST',
     data:{searchPingu},
     success: function(response){
       console.log(response);
       let template ='';
       $(response.data).each(function(index,value){
        template+=`
               <tr productid="${value.productid}">
               <td>${value.productid}</td>
               <td>${value.productname}</td>
                    <td>${value.description}</td>
                    <td><img class="img-thumbnail"width="100px" src="../img/products/${value.picture}"></td>
                    <td>${value.content}</td>
                    <td>${value.categoryid}</td>
                    <td>${value.price}</td>
                    <td>${value.unitsinstock}</td>
                    <td><div class="btn status">${value.productstatus}</div></td>
                    <td><button id="edit" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg""><i class="fa fa-edit" style="color :white"></i></button><button id="change" class="btn btn-primary"><i class="fa fa-sync " style ="color :white"></i></button></td>
                   </tr>
                    `       
       });
       $('#products').html(template); 
       Pintado();

     }
    })
  })

  // AGREGAR PRODUCTO
  $(document).on('click','#agregar',function(){
  $('#TituloModal').text('AGREGAR PRODUCTO');
  $('#id').prop('disabled',false);
  $('#products-form').trigger('reset');
  });


  // EDITAR PRODUCTO
  $(document).on('click','#edit',function(){
  $('#TituloModal').text('EDITAR PRODUCTO');
  let element = $(this)[0].parentElement.parentElement;
  let id= $(element).attr('productid');
  $.post('products-single.php',{id}, function(response){
    console.log(response.data.productid);
    $('#id').val(response.data[0].productid);
    $('#id').prop('disabled',true);
    $('#nombre').val(response.data[0].productname);
    $('#descripcion').val(response.data[0].description);
    $('#content').val(response.data[0].productid);
    $('#precio').val(response.data[0].price);
    $('#imagen').text(response.data[0].picture);
    $('#categoria').val(response.data[0].categoryid);
    $('#stock').val(response.data[0].unitsinstock);
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
  // CAMBIAR ESTATUS
$(document).on('click','#change',function(){
        Swal.fire({
  title: 'Desea cambiar el status?',
  text:'Esto afectara la visualizacion de sus productos.',
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si!',
  cancelButtonText: 'No'
}).then((result) => {
  if (result.value) {
    let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('productid');
        $.post('producstatus.php',{id},function(response){
          ListadoProd();  
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
function ListadoProd(){
  $.ajax({
    type: "GET",
    url: "productslist.php",
    success: function (response) {
        console.log(response);
        let template ='';
           $(response.data).each(function(index,value){
               template+=`
               <tr productid="${value.productid}">
               <td>${value.productid}</td>
               <td>${value.productname}</td>
                    <td>${value.description}</td>
                    <td><img class="img-thumbnail"width="100px" src="../img/products/${value.picture}"></td>
                    <td>${value.content}</td>
                    <td>${value.categoryid}</td>
                    <td>${value.price}</td>
                    <td>${value.unitsinstock}</td>
                    <td><div class="btn status">${value.productstatus}</div></td>
                    <td><button id="edit" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg""><i class="fa fa-edit" style="color :white"></i></button><button id="change" class="btn btn-primary"><i class="fa fa-sync " style ="color :white"></i></button></td>
                   </tr>
                    `
                });
                $('#products').html(template);  
                Pintado();     
    }
});

  }

  function Pintado(){ 
    $('.status').each(function(indice,valor) {
        if($(this).text()== 'activo')
        {
       $(this).addClass('btn-success');
        }
        else if($(this).text()== 'desactivado')
          $(this).addClass('btn-danger');
        });  
}
});
