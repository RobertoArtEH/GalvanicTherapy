new Vue({
    el: '#crud',
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
        newnombre: '',
        newdescripcion: '',
        newcondicion: '',
        fillcategoria: { 'nombre': '', 'descripcion': '', 'idcategoria': '', 'condicion': '' },
        errors: []
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
        getcategorias: function(page) {
            var urlcategorias = 'categorias?page=' + page;
            axios.get(urlcategorias).then(response => {
                this.categorias = response.data.category.data,
                    this.pagination = response.data.pagination
            });
        },
        editcategorias: function(categoria) {
            this.fillcategoria.idcategoria = categoria.idcategoria;
            this.fillcategoria.nombre = categoria.nombre;
            this.fillcategoria.descripcion = categoria.descripcion;
            this.fillcategoria.condicion = categoria.condicion;
            $('#edit').modal('show');
        },
        updatecategorias: function(idcategoria) {
            var url = 'categorias/' + idcategoria;
            axios.put(url, this.fillcategoria).then(response => {
                this.getcategorias();
                this.fillcategoria = { 'nombre': '', 'descripcion': '', 'idcategoria': '', 'condicion': '' };
                this.errors = [];
                $('#edit').modal('hide');
                toastr.success('Categoria actualizada con exito');
            });
        },
        deletecategorias: function(categoria) {
            var url = 'categorias/' + categoria.idcategoria;
            axios.delete(url).then(response => {
                this.getcategorias(); //
                // aqui va lo bueno de notificacion con toastr
                toastr.success('Eliminado correctamente');
            });
        },
        createcategorias: function() {
            var url = 'categorias';
            axios.post(url, {
                nombre: this.newnombre,
                descripcion: this.newdescripcion,
                condicion: '1'
            }).then(response => {
                this.getcategorias()
                this.newnombre = '';
                this.descripcion = '';
                this.errors = [];
                $('#create').modal('hide');
                toastr.success('Categoria agregada con exito');
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