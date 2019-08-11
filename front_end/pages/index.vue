<template>
  <div>
  <h1>App start</h1>
   </div>
</template>

<script>
import axios from "axios";

axios.get("http://localhost/mobile_shop/api/Users/").then(res => console.log(res.data));


export default {
 
}
</script>

<style>

</style>
