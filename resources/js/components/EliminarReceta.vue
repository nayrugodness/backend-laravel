<template>
    <input 
        type="submit" 
        class="btn btn-danger d-block w-100 mb-2" 
        value="Eliminar ×"
        @click="eliminarReceta"
    >
</template>

<script>
    export default {
        props: ['recetaId'],
        methods: {
            eliminarReceta(){
                    this.$swal({
                        title: '¿Deseas eliminar este restaurante?',
                        text: "Una vez eliminado, no se puede recuperar",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si',
                        cancelButtonText: 'No'
                    }).then((result) => {
                        if (result.value) {
                            const params = {
                                id: this.recetaId
                            }

                            // Enviar la petición al servidor
                            axios.post(`/recetas/${this.recetaId}`, {params, _method: 'delete'})
                                .then(respuesta => {
                                    this.$swal({
                                        title: 'Restaurante eliminado',
                                        text: 'Se eliminó el restaurante',
                                        icon: 'success'
                                    });

                                    // Eliminar receta del DOM
                                    this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);

                                })
                                .catch(error => {
                                    console.log(error)
                                })
                        }
                    })
            }
        }
    }

</script>