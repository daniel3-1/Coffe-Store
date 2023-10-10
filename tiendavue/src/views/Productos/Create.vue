<template>
    <div class="container mt-5">
        <div class="card">
            <h4>Add Product</h4>
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
                <button type="button" @click="saveProducto" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default{
    name: 'productoCreate',
    data(){
        return{
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

    methods: {
        saveProducto(){

            var mythis = this;
            axios.post('http://localhost:8000/api/productos', this.model.producto)
            .then(res => {
                console.log(res.data)
                alert(res.data.message);

                this.model.producto = {
                    nombre_producto : '',
                    cantidad : '',
                    precio : ''
                }
                this.errorList = '';
            })
            .catch(function (error){
                if(error.response){

                    if(error.response.status == 422){
                        mythis.errorList = error.response.data.errors;
                    }
                }else if (error.request){
                    console.log(error.request);
                }else {
                    console.log('Error', error.message);
                }
            });
        }
    },
}
</script>