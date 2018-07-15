<template>
    <div>
        <div class="card mb-3 post">
            <img class="card-img-top" src="https://i1.wp.com/wp.laravel-news.com/wp-content/uploads/2018/04/20-eloquent-tricks.png?resize=1400%2C709" :alt="post.title">
            <div class="card-body">
                <div class="card-title">
                    <div class="categories"> 
                        <!-- <router-link :to="{name:'category',params:{slug:post.category.name}}" class="text-primary text-uppercase">{{post.category.name}}</router-link>  -->
                        <span class="text-primary text-uppercase">{{post.category.name}}</span> 
                        <time :datetime="post.date_raw" class="text-muted">
                           {{post.date}}
                        </time>
                    </div>
                    <h1 class="text-primary">
                        <router-link :to="{ name: 'post', params: { id: post.id }}">{{post.title}}</router-link>
                    </h1>
                </div>
                <div  class="card-text position-relative">
                    <p>{{post.excerpt}}</p>
                     <div class="overlay"></div>

                    
               </div>
                    <router-link class="more-link" :to="{ name: 'post', params: { id: post.id }}">Read more...</router-link>
               
            </div>
            <div class="card-footer bg-white">
                <span>
                    <img class="img-fluid rounded-circle" width="50" src="https://www.sephora.com/productimages/product/p427643-av-06-zoom.jpg" alt="Avatar">
                </span>
                <div class="d-inline-block align-middle">
                    <div>
                        
                        <a href="#">{{post.author.details.name}}</a>
                    </div>
                    <div class="btn-group" role="group" aria-label="Social Details">

                        <a :href="post.author.socialLinks.facebook" class="btn btn-fa btn-sm" v-if="post.author.socialLinks.facebook != undefined">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a :href="post.author.socialLinks.github"  class="btn btn-fa btn-sm" v-if="post.author.socialLinks.github != undefined">
                            <i class="fab fa-github"></i>
                        </a>
                        <a :href="post.author.socialLinks.twitter" class="btn btn-fa btn-sm" v-if="post.author.socialLinks.twitter != undefined">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import { post as defaultPost } from "../defaults.js";

export default {
  created: function() {
    console.log(this.post);
  },
  props: {
    post: {
      default: [defaultPost]
    }
  }
};
</script>