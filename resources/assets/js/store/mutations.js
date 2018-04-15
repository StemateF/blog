export default {
    showLoading(state, payload) {

        state.loading = payload;
    },
    updateAuth(state) {
        state.auth = true;

    }
}