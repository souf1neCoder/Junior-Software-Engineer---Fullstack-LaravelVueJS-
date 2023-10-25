import { createWebHistory, createRouter } from "vue-router";
import Home from "../views/Home.vue";
import CreateProduct from "../views/CreateProduct.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/create-product",
    name: "CreateProduct",
    component: CreateProduct,
  },
//   {
//     path: "/:catchAll(.*)",
//     name: "NotFound",
//     component: PageNotFound,
//   }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;