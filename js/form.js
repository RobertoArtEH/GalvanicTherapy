// Validación de registro
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
      dataType: 'text',
      data: {
        user: user,
        nombre: nombre,
        apellidos: apellidos,
        f_nacimiento: f_nacimiento,
        email: email,
        pass: pass
      },
      success: function(data) {
        console.log(data);

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

          $('#user').focus();
        }

        if(data == 'correo-existente') {
          $('#email').addClass('is-invalid');
          $('#email').focus();
        }

        if(data == 'user-existente') {
          $('#user').addClass('is-invalid');
          $('#user').focus();
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
        }
      },
      error: function() {
        Swal.fire({
          type: 'error',
          title: 'Ha ocurrido un error.'
        })
      }
    });
  }
})

// Validación para login
$('#login-btn').click(function(e) {
  var valid = this.form.checkValidity();

  if(valid) {
    $('#login-alert').addClass('d-none');

    var access = $('#access').val();
    var password = $('#password').val();

    e.preventDefault();

    $.ajax({
      type: 'POST',
      url: 'validar.php',
      dataType: 'text',
      data: {
        access: access,
        password: password
      },
      success: function(data) {
        if(data == 'user-success') {
          window.location = 'index.php';
        }

        if(data == 'admin-success') {
          window.location = 'Panel/index.php';
        }

        if(data == 'error') {
          $('#login-alert').html('Usuario o contraseña incorrecta.');
          $('#login-alert').removeClass('d-none');
          $('#password').focus();
          $('#password').val('');
        }
        
        if(data == 'inactive') {
          $('#login-alert').html('Tu cuenta ha sido deshabilitada.');
          $('#login-alert').removeClass('d-none');
          $('#password').val('');
        }
      },
      error: function() {
        Swal.fire({
          type: 'error',
          title: 'Ha ocurrido un error.'
        })
      }
    });
  }
})
