<template>
	<div>
			<h1>{{ post.title }}</h1>
			<div>{{ post.body }}</div>
			<router-link :to="{ name : 'post', params: { id:2 }}">ssssssssss</router-link>
	</div>
</template>
<script>
export default {
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
		this.post = '';
		axios.get("/api/posts/" + to.params.id).then(response => {
			this.setData( response.data.data);
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
