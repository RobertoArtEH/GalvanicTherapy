$(function(){
    let busqueda =$('#txt_busqueda');
    // TOMAMOS EL VALOR DE EL INPUT Y LO GUARDAMOS EN UNA VARIABLE
    listar('');
    SearchPingu(busqueda);
    crearPaginacion();
});
// GUARDAR DATOS
let guardardatos=()=>{
    let values =[];
    //Evento boton editar
    $('#table .editar').on('click',function(){
        values=ciclo($(this));
        $('#opcion').val('editar');
        $('#txtid').prop('disabled', true);
        $('#txtid').val(values[0]);
        $('#txt_nombre').val(values[1]);
        $('#txt_descripcion').val(values[2]);
        $('#txt_imagen').val(values[3]);
        $('#txt_content').val(values[4]);
        $('#txt_precio').val(values[5]);
        $('#txt_stock').val(values[6]);
        $('#txt_categoria').val(values[7]);
        cambiarTitulo("Editar producto");
    });
    //Evento Eliminar
    $("#table .eliminar").on('click',function(){
        values=ciclo($(this));
        $('#opcion').val('eliminar');
        $('#txtid').val(values[0]);
        $('#txt_nombre').val(values[1]);
        $('#txt_descripcion').val(values[2]);
        $('#txt_imagen').val(values[3]);
        $('#txt_content').val(values[4]);
        $('#txt_precio').val(values[5]);
        $('#txt_stock').val(values[6]);
        $('#txt_categoria').val(values[7]);
        cambiarTitulo("Eliminar producto");
    });
        //Evento Insertar
        $("#btn_insertar").on('click',function(){
            values=ciclo($(this));
            $('#opcion').val('insertar');
            $('#txtid').prop('disabled', false);
            $('#txtid').val("");
            $('#txt_nombre').val("");
            $('#txt_descripcion').val("");
            $('#txt_imagen').val("");
            $('#txt_content').val("");
            $('#txt_precio').val("");
            $('#txt_stock').val("");
            $('#txt_categoria').val("");
            cambiarTitulo("insertar producto");
        });

}
// Ciclo que recorrera toda la tabla 
let ciclo =(selector)=>{
    let datos=[];
    $(selector).parents("tr").find("td").each(function(i)
    {
        if(i<9){
            // Capturamos toda la data de products
            datos[i]=$(this).text();
            console.log(datos[i]);
        }
        else{
            return false;
        }
    });
    return datos;
}
let cambiarTitulo=(titulo)=>{
    $('.modal-header .modal-title').text(titulo);
}
// Paginacion
let cambiarPagina=()=>{
    $('.page-item>.page-link').on('click',function(){
        $.ajax({
            url:'controllers/ControllerList.php',
            method:'POST',
            data:{
                pagina: $(this).text()
            },
        }).done(function(data){
            console.log(data);
            $('#div_tabla').html(data);
            guardardatos();
                });
    });
   
}
let crearPaginacion =()=>{
    $.ajax({
        url:'controllers/ControllerPaginacion.php',
        method:'POST'
    }).done(function(data){
        console.log(data);
            $('#pagination li').remove();
        for(var i=1;i<=data;i++){
            $('#pagination').append('<li class="page-item"><a class="page-link text-muted"href="#">'+i+'</a></li>');
        }
        cambiarPagina();
    });
}
let listar =(param)=>{
    $.ajax({
        url:'controllers/ControllerList.php',
        method:'POST', 
        data:{
            termino:param
        }
    })
    .done(function(data){
       $('#div_tabla').html(data);
       guardardatos();
    });
}
let SearchPingu=(input)=>{
    $(input).on('keyup',function(){
        let termino='';
        if($(this).val()!=''){
                // si esto no esta vacio quiere decir que ya se tecleo algo
                termino=$(this).val();
        }
        listar(termino);
    });
}