<template>
    <Index>        
          <List :products="products" :categories="categories" @load-products="loadProducts" />
    </Index>
  </template>
  
  <script>
  import Index from '../components/Layout/Index.vue';
  import List from '../components/Products/List.vue';
  import axiosInstance from '../axiosInstance'
  export default {
      components:{
          Index,List
      },
      data(){
          return{
              page:1,
              products:[],
              categories:[]
          }
      },
      created(){
          this.loadProducts();
          this.loadCategories();
      },
      methods:{
          async loadProducts(categoryId=0){
              await axiosInstance.get(`/products/${categoryId>0 ? categoryId : ''}`).then((res)=>{
                  this.products = res.data.data
                  console.log(this.products)
              }).catch((err)=>{
                  console.error(err.message);
              })
          },
          async loadCategories(){
          await axiosInstance.get('/categories').then((res)=>{
            this.categories = res.data.data;
          }).catch((err)=>{
            console.error(err.message);
          })
        }
          
      }
      
  
  }
  </script>
  
  <style>
  
  </style>