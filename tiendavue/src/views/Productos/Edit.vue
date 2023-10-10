<template>
    <div class="container mt-5">
        <div class="card">
            <h4>Edit Product</h4>
        </div>
        <div class="card-body">
            <ul class="alert alert-warning" v-if="Object.keys(this.errorList).length > 0">
                <li class="mb-0 ms-3" v-for="(error, index) in this.errorList" :key="index">
                    {{ error[0] }}
                </li>
            </ul>
            <div class="mb-3">
                <label for="">Nombre Producto</label>
                <input type="text" v-model="model.producto.nombre_producto" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Cantidad</label>
                <input type="text" v-model="model.producto.cantidad" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Precio</label>
                <input type="text" v-model="model.producto.precio" class="form-control">
            </div>
            <div class="mb-3">
                <button type="button" @click="updateProducto" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default{
    name : 'productoEdit',
    data(){
        return{
            productoId: '',
            errorList : '',
            model:{
                producto :{
                    nombre_producto : '',
                    cantidad : '',
                    precio : ''
                }
            }
        }
    }, 

    mounted(){
        this.productoId = this.$route.params.id;
        this.getProductoData(this.$route.params.id);
    },

    methods: {
        getProductoData(productoId){

            axios.get(`http://localhost:8000/api/productos/${productoId}/edit`)
            .then(res => {
                console.log(res.data.producto)

                this.model.producto = res.data.producto
            })
            .catch(function (error){
                if(error.response){

                    if(error.response.status == 404){
                       alert(error.response.data.message);
                    }
                }
            });
        }, 

        updateProducto(){

            var mythis = this;
            axios.put(`http://localhost:8000/api/productos/${this.productoId}/edit`, this.model.producto)
            .then(res => {
                console.log(res.data)
                alert(res.data.message);

                this.errorList = '';
            })
            .catch(function (error){
                if(error.response){
                    if(error.response.status == 422){
                        mythis.errorList = error.response.data.errors;
                    }

                    if(error.response.status == 404){
                        alert(error.response.data.message);
                    }
                }else if(error.request) {
                    console.log(error.request);
                } else {
                    console.log('Error', error.message);
                }
            });
        }
    },
}
</script>