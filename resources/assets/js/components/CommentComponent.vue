<template>
  <div>
    <div class="card mt-2"  :class="{'ml-sm-5 ml-2':isReplay}" :data-comment="comment.id" >
        <div class="card-body">
          <div >
              {{ comment.body }}
          </div>
        </div>
        <div class="card-footer bg-white ">
          <postfooter v-bind:user="comment.author" ></postfooter>
        </div>
      </div>
      <comment 
        v-for="comment in comment.replays.data" 
        :key="comment.id"
        v-bind:comment="comment"
        v-bind:isReplay="true"></comment>
  </div>    
</template>

<script>
import CommentComponent from "./CommentComponent.vue";
import { comment as defaultComment } from "../defaults";

import UserFooterComponent from "../components/UserFooterComponent";

export default {
  name: "comment",
  // beforeCreate: function() {
  //   this.$options.components.replay = require("./CommentComponent.vue").default;
  // },
  created: function() {
    // console.log(this.comment.id);
    console.log(this.comment);
    console.log(this.replays);
  },
  props: {
    comment: {
      default: defaultComment
    },
    isReplay: {
      default: false
    }
  },
  components: {
    postfooter: UserFooterComponent,
    comment: CommentComponent
  }
};
</script>

