new Vue({
    el: '#crudarticulos',
    created: function() {
        this.getarticulos();
    },
    data: {
        articulos: [],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0,
        },
        newnombre: '',
        newdescripcion: '',
        newprecio: '',
        newstock: '',
        newimagen: '',
        newidcategoria: '',
        fillarticulo: { 'nombre': '', 'descripcion': '', 'idarticulo': '', 'precio': '', 'stock': '', 'imagen': '', 'idcategoria': '' },
        categorias: [],
        errors: []

    },
    mounted() {
        this.obtenerCategorias();
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
            let img = this.newimagen;
            if (img.lenght > 100) {
                return this.newimagen;
            } else {
                return 'imagenes/articulos' + this.newimagen
            }
        },
        // oncategoriachange(idcategoria) {
        //     console.log(idcategoria)
        // },
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
                    this.newimagen = e.target.result
                };
                reader.readAsDataURL(file);
            }
        },
        getarticulos: function(page) {
            var urlarticulos = 'articulos?page=' + page;
            axios.get(urlarticulos).then(response => {
                this.articulos = response.data.article.data,
                    this.pagination = response.data.pagination
            });
        },
        obtenerCategorias() {
            axios.get('cate').then((response) => {
                this.categorias = response.data;
            })

        },
        // buscarcate: function(nombrecate) {
        //     var url = 'find/' + nombrecate;
        //     axios.get(url).then(response => {
        //         nombrecate = response.nombre;
        //         descripcioncate = response.descripcion;
        //         console.log(nombrecate);
        //         console.log(descripcioncate);

        //     });
        // },
        editarticulos: function(articulo) {
            this.fillarticulo.idarticulo = articulo.idarticulo;
            this.fillarticulo.nombre = articulo.nombre;
            this.fillarticulo.descripcion = articulo.descripcion;
            this.fillarticulo.imagen = articulo.imagen;
            console.log(this.fillarticulo.imagen);
            this.fillarticulo.precio = articulo.precio;
            this.fillarticulo.stock = articulo.stock;
            this.fillarticulo.idcategoria = articulo.categoria;
            // this.buscarcate(this.fillarticulo.idcategoria)

            $('#edit').modal('show');
        },
        updatearticulos: function(idarticulo) {
            this.fillarticulo.imagen = this.newimagen;
            var url = 'articulos/' + idarticulo;
            axios.put(url, this.fillarticulo).then(response => {
                this.getarticulos();
                this.fillarticulo = { 'nombre': '', 'descripcion': '', 'idarticulo': '', 'precio': '', 'stock': '', 'imagen': '', 'idcategoria': '' },
                    this.errors = [];
                $('#edit').modal('hide');
                toastr.success('Categoria actualizada con exito');
            });
        },
        deletearticulos: function(articulo) {
            var url = 'articulos/' + articulo.idarticulo;
            axios.delete(url).then(response => {
                this.getarticulos(); //
                // aqui va lo bueno de notificacion con toastr
                toastr.success('Eliminado correctamente');
            });
        },

        createarticulos: function() {
            var url = 'guardararticulo';
            axios.post(url, {
                nombre: this.newnombre,
                descripcion: this.newdescripcion,
                precio: this.newprecio,
                stock: this.newstock,
                idcategoria: this.newidcategoria,
                imagen: this.newimagen
            }).then(response => {
                this.getarticulos()
                this.errors = [];
                $('#create').modal('hide');
                Swal.fire(
                    'Add!',
                    'Your file has been add.',
                    'success'
                )
            }).catch(error => {
                this.errors = error.response.data
            });
        },
        changePage: function(page) {
            this.pagination.current_page = page;
            this.getarticulos(page);
        }
    }
});