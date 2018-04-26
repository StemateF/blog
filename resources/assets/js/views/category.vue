<template>

	<div>
		<div v-for="post in posts">
			<post v-bind:post="post" ></post>
		</div>
	</div>
</template>

<script>
import PostItemComponentVue from '../components/PostItemComponent.vue';
import {mapMutations} from 'vuex';

	export default {
		components:{post:PostItemComponentVue},
		created(){
		this.$store.commit('showLoading',true)
			this.getPosts()
		},
		data:function(){
			return {
					posts: []
				}
		},
		methods:{
			getPosts(){
				axios.get('/api/posts').then(response=>{
					
					this.posts=response.data.data;
					this.$store.commit('showLoading',false)
					
					})
		},
		  ...mapMutations(['showLoading'])
		}
	}
</script>