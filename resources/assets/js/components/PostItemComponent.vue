<template>
    <router-link :to="{ name : 'post', params: { id:id }}">
        <md-card md-with-hover class="mb-5" >
            <md-ripple>
                <md-card-media>
                    <img src="http://www.circleseven.co.uk/wp-content/uploads/2017/10/laravel-simple-leader.png" alt="People">
                </md-card-media>
                <md-card-header>
                    <div class="md-title">{{ name }}</div>
                    <div class="md-subhead">{{ excerpt }}</div>    
                </md-card-header>
            </md-ripple>
        </md-card>
    </router-link>
</template>

<script>
    export default  {
        props:['name','excerpt','id']
    }
</script>