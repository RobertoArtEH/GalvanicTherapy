new Vue({
    el: '#catalogo',
    created: function() {
        this.getcategorias();
    },
    data: {
        categorias: [],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0,
        },
        image: '',
        SearchPingu: '',
        newcategoria: {
            newnombre: null,
            newdescripcion: null,
            newcondicion: null,
            newimagen: null,
        },
        fillcategoria: { 'nombre': '', 'descripcion': '', 'idcategoria': '', 'condicion': '', 'imagen': '' },
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
        updateImage() {
            let img = this.newcategoria.newimagen;
            if (img.lenght > 100) {
                return this.newcategoria.newimagen;
            } else {
                return 'imagenes/categorias' + this.newcategoria.newcategoria
            }
        },
        onImageChange(e) {
            let file = e.target.files[0];
            if (file.size > 1048576) {
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<a href>Why do I have this issue?</a>'
                })
            } else {
                let reader = new FileReader();
                reader.onload = e => {
                    this.newcategoria.newimagen = e.target.result
                };
                reader.readAsDataURL(file);
            }
        },
        getcategorias: function(page) {
            var urlcategorias = 'categorias?page=' + page;
            axios.get(urlcategorias).then(response => {
                this.categorias = response.data.category.data,
                    this.pagination = response.data.pagination
            });
        },
        revisar: function(articulo) {
               Swal.fire(
                    'Producto agregado!',
                    'Proceder al pago?',
                    'success')


                    
                },
        updatecategorias: function(idcategoria) {
            this.fillcategoria.imagen = this.newcategoria.newimagen;
            var url = 'categorias/' + idcategoria;
            axios.put(url, this.fillcategoria).then(response => {
                this.getcategorias();
                this.fillcategoria = { 'nombre': '', 'descripcion': '', 'idcategoria': '', 'condicion': '', 'imagen': '' };
                this.newcategoria.newimagen = '';
                this.errors = [];
                $('#edit').modal('hide');
                toastr.success('Categoria actualizada con exito');
            });
        },
        deletecategorias: function(categoria) {
            var url = 'Borrar/' + categoria.idcategoria;
            axios.post(url).then(response => {
                this.getcategorias();
                toastr.success('Estatus cambiado con exito');
                //
                // aqui va lo bueno de notificacion con toastr
            });

        },


        // BusquedaPingu: function() {
        //     axios.get('Search', this.SearchPingu).then(response => {
        //         toastr.success('Categoria actualizada con exito');
        //     });
        // },
        createcategorias: function() {
            var url = 'guardarcategoria';
            axios.post(url, {
                nombre: this.newcategoria.newnombre,
                descripcion: this.newcategoria.newdescripcion,
                condicion: 'Activado',
                imagen: this.newcategoria.newimagen
            }).then(response => {
                this.getcategorias()
                this.newcategoria.newnombre = '';
                this.newcategoria.newdescripcion = '';
                this.newcategoria.newimagen = '',
                    this.errors = [];
                $('#create').modal('hide');
                Swal.fire(
                    'Good job!',
                    'Categoria creada!',
                    'success'
                )
            }).catch(error => {
                this.errors = error.response.data
            });
        },
        changePage: function(page) {
            this.pagination.current_page = page;
            this.getcategorias(page);
        }
    }
});