<template>
    <Index>
      <FormFieldsVue :categories="categories" />
    </Index>
  </template>
  
  <script>
  import Index from '../components/Layout/Index.vue';
  import FormFieldsVue from '../components/Products/FormFields.vue';
  import axiosInstance from '../axiosInsatnce'
  export default {
      components:{
          Index,FormFieldsVue
      },
      data(){
        return{
          categories:[]
        }
      },
      created(){
        this.loadCategories();
      },  
      methods:{
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