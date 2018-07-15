<template>

	<div>
			<post  v-for="post in posts" v-bind:post="post" v-bind:key="post.id" ></post>
	</div>
</template>

<script>
import PostItemComponentVue from "../components/PostItemComponent.vue";
import { mapMutations } from "vuex";
export default {
  components: { post: PostItemComponentVue },
  created: function() {
    this.$store.commit("showLoading", true);
    this.getPosts();
    this.$root.showSideBar = true;
  },
  data: function() {
    return {
      posts: []
    };
  },
  methods: {
    getPosts() {
      axios.get("/api/posts").then(response => {
        this.posts = response.data.data;
        this.$store.commit("showLoading", false);
        console.log(this.posts);
      });
    },
    ...mapMutations(["showLoading"])
  }
};
</script>