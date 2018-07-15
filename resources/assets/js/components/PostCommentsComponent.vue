<template>
 <div class="row mt-5">
	<div class="col-lg-9" >
			<div class="card">
				<div class="card-body">
					<h3 class="card-title mb-3">Comments</h3>
					<div class="position-relative">
						<div class="position-absolute abs-vc abs-hc" v-if="!auth">
								<button v-b-modal.loginModal class="btn btn-outline-primary">Login before posting</button>
						</div>
						<textarea class="form-control" rows="5" placeholder="What do you think?" :disabled="!auth?true:false"></textarea>
					</div>
					<button class="btn btn-primary float-right mt-3">Post</button>
				</div>
			</div>
			<comment v-for="comment in comments.data" :key="comment.id" v-bind:comment="comment"></comment>
		</div>
	</div>
</template>


<script>
import { comment as defaultComments } from "../defaults";
import UserFooterComponent from "../components/UserFooterComponent";
import CommentComponent from "../components/CommentComponent.vue";
import { mapState } from "vuex";

export default {
  props: {
    comments: {
      default: [defaultComments]
    }
  },
  components: {
    comment: CommentComponent
  },
  computed: {
    ...mapState(["auth"])
  }
};
</script>

