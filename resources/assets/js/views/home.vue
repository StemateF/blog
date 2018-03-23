<template>
	<div >
		<div  v-for="post in posts">
			<post v-bind:name="post.name" v-bind:excerpt="post.excerpt" v-bind:id="post.id" ></post>
		</div>
	</div>
</template>

<script>
import PostItemComponentVue from '../components/PostItemComponent.vue';
	export default {
		components:{post:PostItemComponentVue},
		created(){
			this.getPosts()
		},
		data:function(){
			return {posts: [
			
				]}
		},
		methods:{
			getPosts(){
				axios.get('/api/posts').then(response=>{
					this.posts=response.data;
					})
		}}
	}
</script>