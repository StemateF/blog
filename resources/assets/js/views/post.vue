<template>
	<div class="card">
		<img class="card-img-top" src="https://i1.wp.com/wp.laravel-news.com/wp-content/uploads/2018/04/20-eloquent-tricks.png?resize=1400%2C709"  alt="Card image cap">
		<div class="card-body">
			<h5 class="card-title">{{post.title}}</h5>
			<p class="card-text">{{post.body}}</p>
		</div>
	</div>
</template>
<script>
export default {
  beforeCreate() {
    this.$root.showSideBar = false;
  },
  data() {
    return { post: "" };
  },

  beforeRouteEnter: (to, from, next) => {
    console.log("before");
    axios.get("/api/posts/" + to.params.id).then(response => {
      next(vm => {
        vm.setData(response.data.data);
      });
    });
  },

  beforeRouteUpdate(to, from, next) {
    this.post = "";
    axios.get("/api/posts/" + to.params.id).then(response => {
      this.setData(response.data.data);
      next();
    });
  },

  methods: {
    setData(post) {
      this.post = post;
    }
  }
};
</script>
