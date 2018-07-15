<template>
  <div>
    <div class="card">
      <img class="card-img-top" src="https://i1.wp.com/wp.laravel-news.com/wp-content/uploads/2018/04/20-eloquent-tricks.png?resize=1400%2C709"  alt="Card image cap">
      <div class="card-body">
        <div class="col-lg-9">
          <div class="categories"> 
            <!-- <router-link :to="{name:'category',params:{slug:post.category.name}}" class="text-primary text-uppercase">{{post.category.name}}</router-link>  -->
            <span class="text-primary text-uppercase">{{post.category.name}}</span> / 
            <time :datetime="post.date_raw" class="text-muted">
                {{post.date}}
            </time>
          </div>
          <h1 class="card-title ">{{ post.title}}</h1>
          <p class="card-text">{{post.body}}</p>
        </div>
      </div>
      <div class="card-footer bg-white ">
        <postfooter v-bind:user="post.author" ></postfooter>
      </div>
    </div>
    <comments v-bind:comments="post.comments"></comments>
  </div>
</template>

<script>
import UserFooterComponent from "../components/UserFooterComponent";
import PostCommentsComponent from "../components/PostCommentsComponent";
import { post } from "../defaults";
export default {
  components: {
    postfooter: UserFooterComponent,
    comments: PostCommentsComponent
  },

  beforeCreate() {
    this.$root.showSideBar = false;
  },
  data: () => {
    return { post: post };
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
