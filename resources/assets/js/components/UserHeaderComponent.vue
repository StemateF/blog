<template>
    <div>
        <div v-if="!auth">
            <button v-b-modal.loginModal class="btn btn-outline-primary">Sign in</button>
            <b-modal  centered  title="Sign in with" id="loginModal">
                <a href="/login/github" class="btn github btn-block ml-0"> Github</a>
                <a href="/login/facebook" class="btn facebook btn-block ml-0">Facebook</a>
                <div slot="modal-footer"></div>
            </b-modal>
        </div>
        <div v-else>
            <b-dropdown variant="link" size="lg" no-caret>
                <template slot="button-content">
                    <span>
                        <img class="img-fluid rounded-circle" width="50" :src="user.details.avatar" alt="Avatar">
                    </span>
                    <span>{{user.details.name}}</span>
                </template>
                <b-dropdown-item href="#">Setings</b-dropdown-item>
                <b-dropdown-divider></b-dropdown-divider>
                <b-dropdown-item-button v-on:click="logout">
                        Sign out 
                </b-dropdown-item-button>
              
            </b-dropdown>
        </div>
    </div>
</template>

<script>
import { mapMutations, mapState } from "vuex";
import { logout as apiLogout } from "../store/api";
export default {
  methods: {
    logout: () => {
      apiLogout();
    }
  },
  computed: {
    ...mapState(["login", "auth", "loading", "user"])
  }
};
</script>
