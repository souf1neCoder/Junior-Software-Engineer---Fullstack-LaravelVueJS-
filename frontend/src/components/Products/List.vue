<template>
    <div class="relative overflow-x-auto my-16 shadow-md pb-16 sm:rounded-lg">
        <div class="w-full my-4 p-4 flex justify-between items-center ">
            <div class="filter flex">
                <select @change="$emit('loadProducts',selected_category)" v-model="selected_category"
                    class="py-3 px-4 pr-9 mr-4 border-b border-primary text-sm focus:border-primary focus:ring-primary">
                    <option value="0">Select categories</option>
                    <option v-for="category in categories" :value="category.id"
                        :class="!category.parent_id ? 'font-bold' : 'font-normal'" :key="category.id">{{ category.name }}
                    </option>
                </select>
                <div>
                    <button @click="sortProducts"
                        class="text-white  bg-primary  focus:ring-4 focus:ring-primary font-medium rounded-lg text-sm px-4 py-2.5 text-center">Sort
                        by Price <small>({{ this.ascendingSort ? 'asc' : 'desc' }})</small></button>

                </div>
            </div>
            <router-link
                class="text-white bg-primary  focus:ring-4 focus:ring-primary font-medium rounded-lg text-sm px-4 py-2.5 text-center"
                to="/create-product">Create Product</router-link>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Image</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                </tr>
            </thead>
            <tbody>

                <tr v-for="product in filtredProducts" :key="product.id"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-32 p-4">
                        <img :src="product.image ? product.image : '../../../assets/not-found.jpg'" :alt="product.name">
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        {{ product.name }}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        {{ sliceDescriptionProduct(product.description) }}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        {{ formatCategories(product.categories) || '-' }}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        ${{ product.price.toFixed(2) }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

export default {
    props: {
        products: Array,
        categories: Array
    },
    data() {
        return {
            ascendingSort: true,
            selected_category: 0
        }
    },
    methods: {
        sliceDescriptionProduct(description) {
            if (description.length > 130) {
                return description.slice(0, 130) + '...';
            }
            return description
        },
        sortProducts() {
            this.products.sort((a, b) => {
                if (this.ascendingSort) {
                    return a.price - b.price;
                } else {
                    return b.price - a.price;
                }
            });
            this.ascendingSort = !this.ascendingSort;
        },
        formatCategories(categories) {
            let data = []
            categories.forEach(category => {
                data.push(category.name);
            });
            return data.join(' - ')
        },
    },
    computed: {
        filtredProducts() {
            return [...this.products];
        },
    },


}
</script>

<style></style>