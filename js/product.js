var productName = $('#productName').html();
var quantity = $("#cantidad option:selected").html();

$('#cantidad').change(function(){
  quantity = $("#cantidad option:selected").html();
});

$('#btnAdd').click(function() {
  $.ajax({
    type: 'POST',
    url: 'validar-cart.php',
    dataType: 'text',
    data: {
      productName: productName,
      quantity: quantity
    },
    success: function(resp) {
      if(resp == 'error') {
        Swal.fire({
          type: 'error',
          title: '¡No hay productos disponibles!',
          showConfirmButton: false,
          timer: 2000
        });
      }

      if(resp == 'success') {
        window.location.href = window.location.href;
      }
    }
  });
});