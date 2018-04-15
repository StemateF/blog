<template>
    <div>
        <div v-if="!auth">
            <button v-b-modal.loginModal class="btn btn-outline-primary">Sign in</button>
            <b-modal  centered  title="Sign in with" id="loginModal">
                <button class="btn github btn-block ml-0"> Github</button>
                <button class="btn bitbucket btn-block ml-0"> Bitbucket</button>
                <button class="btn linkedin btn-block ml-0"> Linkedin</button>
                <div slot="modal-footer"></div>
            </b-modal>
        </div>
        <div v-else>
            <b-dropdown variant="link" size="lg" no-caret>
                <template slot="button-content">
                    <span>
                        <img class="img-fluid rounded-circle" width="50" src="https://www.sephora.com/productimages/product/p427643-av-06-zoom.jpg" alt="Avatar">
                    </span>
                    <span>Stemate Florentin</span>
                </template>
                <b-dropdown-item href="#">Setings</b-dropdown-item>
                <b-dropdown-divider></b-dropdown-divider>
                <b-dropdown-item href="#">Sign out</b-dropdown-item>
            </b-dropdown>
        </div>
    </div>
</template>

<script>
import { mapMutations, mapState } from 'vuex';

export default {

 computed: {
        ...mapState(['login', 'auth', 'loading'])
    }

};
</script>
