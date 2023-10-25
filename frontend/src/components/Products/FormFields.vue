<template>
    <div class="max-w-md my-16 mx-auto">
        <div class="w-full my-4 flex justify-start items-center ">

            <router-link
                class="text-white bg-primary  focus:ring-4 focus:ring-primary font-medium rounded-lg text-sm px-4 py-2.5 text-center"
                to="/">List Product</router-link>
        </div>
        <form @submit.prevent="addProduct" enctype="multipart/form-data"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-4" for="name">
                    Name
                </label>
                <input v-model="product.name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" id="name" placeholder="Product Name" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-4" for="description">
                    Description
                </label>
                <textarea v-model="product.description"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="description" placeholder="Product Description" rows="4" required></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-4" for="price">
                    Price
                </label>
                <input v-model="product.price"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="number" min="1" id="price" placeholder="Product Price" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                    Image
                </label>
                <input @change="handleImageUpload"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="file" id="image">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-4" for="categories">
                    Categories
                </label>
                <select v-model="product.categories"
                    class="form-multiselect block w-full mt-1 rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    id="categories" multiple>
                    <option v-for="category in categories" :value="category.id"
                        :class="!category.parent_id ? 'font-bold' : 'font-normal'" :key="category.id">{{ category.name }}
                    </option>
                </select>
            </div>

            <div class="flex items-center justify-center">
                <button class="bg-primary text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Add Product
                </button>
            </div>
        </form>
    </div>
</template>
  
<script>
import axiosInstance from '../../axiosInstance'
export default {
    data() {
        return {
            product: {
                name: "",
                description: "",
                price: null,
                image: null,
                categories: [],
            },
        };
    },
    props: {
        categories: Array
    },
    methods: {
        async addProduct() {
            const formData = new FormData();
            formData.append('name', this.product.name);
            formData.append('description', this.product.description);
            formData.append('price', this.product.price);
            formData.append('image', this.product.image);
            this.product.categories.forEach((categoryId) => {
                formData.append('categories[]', categoryId);
            });
            await axiosInstance.post('/products', formData).then((res) => {
                alert(res.data.message)
                this.clearProduct();
            }).catch((err) => {
                console.error(err.message);
                alert(res.data.message);
            })
        },
        handleImageUpload(event) {
            this.product.image = event.target.files[0];
        },
        clearProduct() {
            this.product.name = '';
            this.product.description = '';
            this.product.price = null;
            this.product.image = null;
            this.product.categories = [];
        }
    },
}
</script>
  
<style></style>