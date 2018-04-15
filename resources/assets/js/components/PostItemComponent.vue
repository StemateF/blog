<template>
    <div>
        <div class="card mb-3">
            <img class="card-img-top" src="https://i1.wp.com/wp.laravel-news.com/wp-content/uploads/2018/04/20-eloquent-tricks.png?resize=1400%2C709" :alt="title">
            <div class="card-body">
                <div class="card-title">
                    <div class="categories"> 
                        <span class="text-primary">NEWS</span>/
                        <time>
                            April 13, 2018
                        </time>
                    </div>
                    <h1 class="text-primary">
                        <router-link :to="{ name: 'post', params: { id: id }}">{{title}}</router-link>
                    </h1>
                </div>
                <p class="card-text ">
                    {{excerpt}}
                </p>
            </div>
        </div>
    </div>

</template>

<script>
    export default  {
        props:['title','excerpt','id']
    }
</script>