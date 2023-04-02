<template>
  <h1>Hello {{ name }}</h1>
  <ul>
    <li v-for="tech in frameworks" :key="tech" >{{ tech }}</li>
  </ul>
</template>


<script>

export default{
    props: {
        "name":String,
        "frameworks":Array,
    },

}
</script>
