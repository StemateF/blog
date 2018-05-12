<template>
    <div>
        
        <span>
            <img class="img-fluid rounded-circle" width="50" src="https://www.sephora.com/productimages/product/p427643-av-06-zoom.jpg" alt="Avatar">
        </span>
        <div class="d-inline-block align-middle">
            <div>
                <a href="#">{{ user.details.name }}</a>
            </div>
            <div class="btn-group" role="group" aria-label="Social Details">

                <a v-bind:href="user.socialLinks.facebook" class="btn btn-fa btn-sm" v-if="user.socialLinks.facebook != undefined">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a :href="user.socialLinks.github"  class="btn btn-fa btn-sm" v-if="user.socialLinks.github != undefined">
                    <i class="fab fa-github"></i>
                </a>
                <a :href="user.socialLinks.twitter" class="btn btn-fa btn-sm" v-if="user.socialLinks.twitter != undefined">
                    <i class="fab fa-twitter"></i>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import { user as defaultUser } from "../defaults";

export default {
  props: {
    user: {
      default: function() {
        return defaultUser;
      }
    }
  }
};
</script>
