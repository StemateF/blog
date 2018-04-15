<template>
  <div  v-bind:class="{ loading:loading }" class=" loader">
      <div class="line"></div>
  </div>
</template>

<script>
    export default {
        props: ["loading"],
    }
</script>