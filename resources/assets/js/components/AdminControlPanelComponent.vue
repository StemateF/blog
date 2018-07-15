<template>
    <div>
        <div id="admin-menu" class="abs-vc" >
            <b-button-group vertical >
                <b-button  @click="toggleAddPost()" variant="outline-primary">Add Post</b-button>
                <b-button variant="outline-primary">Middle</b-button>
                <b-button variant="outline-primary">Bottom</b-button>
            </b-button-group>
        </div>

        <add-post v-on:toggle-add="toggleAddPost()" v-show="addPostIsVisible"></add-post>
    </div>        
</template>

<script>
import AddPostComponentVue from "./AddPostComponent.vue";

export default {
  components: {
    "add-post": AddPostComponentVue
  },
  data: function() {
    return { addPostIsVisible: false };
  },
  methods: {
    toggleAddPost: function() {
      this.addPostIsVisible = !this.addPostIsVisible;
      if (this.addPostIsVisible) {
        document.querySelector("body").classList.add("noScroll");
      } else {
        document.querySelector("body").classList.remove("noScroll");
      }
    }
  }
};
</script>

<style>
#admin-menu {
  position: fixed;
}
</style>
