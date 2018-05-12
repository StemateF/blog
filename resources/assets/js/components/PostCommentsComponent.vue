<template>
  <div class="mt-5">
      <div class="card">
        <div class="card-body">
            <h3 class="card-title mb-3">Comments</h3>
            <div class="row">
              <div class="col-lg-9" >
                <h4>Add a comment</h4>
                <div  class="position-relative">
                  <div class="position-absolute" v-if="!auth">
                      <button v-b-modal.loginModal class="btn btn-outline-primary">Sign in</button>
                  </div>
                  <textarea class="form-control" rows="5"></textarea>
                </div>
                <button class="btn btn-primary float-right mt-3">Post</button>
              </div>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-lg-9">

          <div class="card mt-2 " v-for="comment in comments.data" >
            <div class="card-body">
              <div v-bind:comment="comment">
                  {{ comment.body }}
              </div>
            </div>
            <div class="card-footer bg-white ">
              <postfooter v-bind:user="comment.author" ></postfooter>
            </div>
          </div>
      </div>
    </div>
  </div>
</template>

<script>
import { comment as defaultComments } from "../defaults";
import UserFooterComponent from "../components/UserFooterComponent";
import { mapState } from "vuex";

export default {
  props: {
    comments: {
      default: [defaultComments]
    }
  },
  components: {
    postfooter: UserFooterComponent
  },
  computed: {
    ...mapState(["auth"])
  }
};
</script>

