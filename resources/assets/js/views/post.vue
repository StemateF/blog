<template>
	<div>
  		<h1>{{ title }}</h1>
  		<div>{{ body }}</div>
  </div>
</template>
<script>
export default {
   created(){
			this.getPost(this.$route.params.id)
			
		},
		data:function(){
			return {title:'',body:''}
		},
		methods:{
			getPost(id){
				axios.get('/api/post',{
					params:{
						post:id
					}
				}).then(response=>{
					this.title=response.data.title;
					this.body=response.data.body;
					
					})
		}}
}
</script>
