new Vue({
    el: '#prueba',
    data() {
        return {
            image: ''
        }
    },
    computed: {
        makeFormData() {
            var formData = new FormData();
            formData.append('image_file', this.image);
            return formData;
        }
    },
    methods: {
        onImageChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
        },
        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.image = e.target.result;
            };
            reader.readAsDataURL(file);
            console.log(file);
        },
        uploadImage() {
            axios.post('/guardar', this.makeFormData)
                .then(this.submitResponse);


        }
    }

});