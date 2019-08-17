new Vue({
    el: '#user',
    created: function() {
        this.getusers();
    },
    data: {
        usuarios: [],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0,
        },
        errors: []
    },
    computed: {
        makeFormData() {
            var formData = new FormData();
            formData.append('image_file', this.image);
            return formData;
        }
    },
    computed: {
        isActived: function() {
            return this.pagination.current_page;
        },
        pagesNumber: function() {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - 2; // TODO offset
            if (from < 1) {
                from = 1;
            }

            var to = from + (2 * 2); //TODO OFFSET
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },
    // creo metodo para que vaya y consulte mi url donde tengo mis registros,
    // despues los tome mediante axios,los guarde en response y finalmente los guarde en mi arreglo
    methods: {
        getusers: function(page) {
            var urlusuarios = 'usuarios?page=' + page;
            axios.get(urlusuarios).then(response => {
                this.usuarios = response.data.usuariosr.data,
                    this.pagination = response.data.pagination
                console.log(this.usuarios);
            });
        },
        editcategorias: function(categoria) {
            this.fillcategoria.idcategoria = categoria.idcategoria;
            this.fillcategoria.nombre = categoria.nombre;
            this.fillcategoria.descripcion = categoria.descripcion;
            this.fillcategoria.condicion = categoria.condicion;
            this.fillcategoria.imagen = categoria.imagen;
            $('#edit').modal('show');
            console.log(this.fillcategoria.imagen);
        },
        updatecategorias: function(idcategoria) {
            this.fillcategoria.imagen = this.newcategoria.newimagen;
            var url = 'categorias/' + idcategoria;
            axios.put(url, this.fillcategoria).then(response => {
                this.getusers();
                this.fillcategoria = { 'nombre': '', 'descripcion': '', 'idcategoria': '', 'condicion': '', 'imagen': '' };
                this.newcategoria.newimagen = '';
                this.errors = [];
                $('#edit').modal('hide');
                toastr.success('Categoria actualizada con exito');
            });
        },
        deletecategorias: function(categoria) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    var url = 'Borrar/' + categoria.idcategoria;
                    axios.post(url).then(response => {
                        this.getusers(); //
                        // aqui va lo bueno de notificacion con toastr
                    });
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })

        },
        // BusquedaPingu: function() {
        //     axios.get('Search', this.SearchPingu).then(response => {
        //         toastr.success('Categoria actualizada con exito');
        //     });
        // },
        changePage: function(page) {
            this.pagination.current_page = page;
            this.getusers(page);
        }
    }
});