<template>
  <div>
        <Nav />
        <div class="container mx-auto">
        <slot></slot>
        </div>
        <Footer />
</div>
</template>

<script>
import Nav from './Nav.vue';
import Footer from './Footer.vue';
export default {
    components:{
        Nav,Footer
    }

}
</script>

<style>

</style>