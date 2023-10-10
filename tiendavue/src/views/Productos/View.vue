<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>
                    Productos
                <RouterLink to="/productos/create" class="btn btn-primary float-end">
                     Agregar un Producto
                    </RouterLink>
                </h4>
            </div>
            <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody v-if="this.productos.length > 0">
                        <tr v-for="(producto, index) in this.productos" :key="index">
                            <td> {{ producto.id }}</td>
                            <td> {{ producto.nombre_producto }}</td>
                            <td> {{ producto.cantidad }}</td>
                            <td> {{ producto.precio }}</td>
                            <td> {{ producto.created_at }}</td>

                            <td>
                                <RouterLink :to="{path: '/productos/' + producto.id + '/edit' }" class="btn btn-success">
                                        Editar
                                    </RouterLink>
                                    <button type="button" @click="deleteProducto(producto.id)" class="btn btn-danger">
                                        Delete
                                    </button>
                            </td>
                        </tr>
                    </tbody>
                    <tbody v-else>
                        <tr>
                            <td colspan="7">Loading</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'productos',
    data(){
        return {
            productos: []
        }
    }, 
    mounted(){
        this.getProductos();
    }, 
    methods: {
        getProductos(){   //Funcion que me va a traer todos los datos de la API
            axios.get('http://localhost:8000/api/productos').then(res => {
                this.productos = res.data.productos //Carga la informacion en la tabla
                //console.log(this.productos)
            });
        }, 

        deleteProducto(productoId){
            
            if(confirm('Are you sure you want delete this Product?')){
                axios.delete(`http://localhost:8000/api/productos/${productoId}/delete`)
                .then(res => {

                    alert(res.data.message);
                    this.getProductos();
                })
                .catch(function (error){

                    if(error.response){
                        if(error.response.status == 404){
                            alert(error.response.data.message);
                        }
                    }
                });
            }
        }
    }, 

}
</script>