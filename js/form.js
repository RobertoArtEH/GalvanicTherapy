$(function() {
  $('#registro').click(function(e) {
    $('#email').removeClass('is-invalid');
    $('#user').removeClass('is-invalid');
    
    var valid = this.form.checkValidity();

    if(valid) {
      var user = $('#user').val();
      var nombre = $('#nombre').val();
      var apellidos = $('#apellidos').val();
      var f_nacimiento = $('#f_nacimiento').val();
      var email = $('#email').val();
      var pass = $('#pass').val();

      e.preventDefault();

      $.ajax({
        type: 'POST',
        url: 'validar-registro.php',
        data: {
          user: user,
          nombre: nombre,
          apellidos: apellidos,
          f_nacimiento: f_nacimiento,
          email: email,
          pass: pass
        },
        success: function(data) {
          if(data == 'no-data') {
            Swal.fire({
              type: 'error',
              title: 'No data.',
              showConfirmButton: false,
              timer: 1500
            })

            setTimeout(() => window.location = 'registro.php', 1000);
          }

          if(data == 'correo-user-error') {
            $('#email').addClass('is-invalid');
            $('#user').addClass('is-invalid');
          }

          if(data == 'correo-existente') {
            $('#email').addClass('is-invalid');
          }

          if(data == 'user-existente') {
            $('#user').addClass('is-invalid');
          }

          if(data == 'success') {
            Swal.fire({
              type: 'success',
              title: 'Tu cuenta se ha registrado exitosamente.',
              showConfirmButton: false,
              timer: 1500
            })

            setTimeout(() => window.location = 'login.php', 1000);
          }

          if(data == 'error') {
            Swal.fire({
              type: 'error',
              title: 'Hubo un error...',
              showConfirmButton: false,
              timer: 1500
            })

            setTimeout(() => window.location = 'registro.php', 1000);
          }
                    
          // setTimeout(() => window.location = 'login.php', 1000);
        },
        error: function(x, e) {
          if (x.status==0) {
            Swal.fire({
              type: 'error',
              title: 'You are offline!\n Please Check Your Network.'
            })
          } else if(x.status==404) {
            Swal.fire({
              type: 'error',
              title: 'Requested URL not found.'
            })
          } else if(x.status==500) {
            Swal.fire({
              type: 'error',
              title: 'Internel Server Error.'
            })
          } else if(e=='parsererror') {
            Swal.fire({
              type: 'error',
              title: 'Error.\nParsing JSON Request failed.'
            })
          } else if(e=='timeout'){
            Swal.fire({
              type: 'error',
              title: 'Request Time out.'
            })
          } else {
            Swal.fire({
              type: 'error',
              title: 'Unknow Error.\n'+x.responseText
            })
          }

          // setTimeout(() => window.location = 'register.php', 1000);
        }
      });
    }
  })
});