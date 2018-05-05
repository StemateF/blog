export default {
    showLoading(state, payload) {

        state.loading = payload;
    },
    updateAuthState(state, payload) {
        state.auth = payload;

    },
    updateCurrentUser(state, payload) {
        state.user = payload;
    }

}