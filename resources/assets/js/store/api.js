import store from "../store/index"
import vm from "../app"
export function logout() {
    axios.post('logout').then(response => {
        store.commit('updateAuthState', false)
        store.commit('updateCurrentUser', null)

    })
}
export function getAuthStatus() {

    axios.get("/api/auth").then(response => {
        console.log(response);
        if (response.data.data == null) {
            store.commit('updateAuthState', false);
        } else {
            store.commit('updateAuthState', true);
            store.commit('updateCurrentUser', response.data.data);
        }

    });
}