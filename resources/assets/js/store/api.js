import store from "../store/index"
import {
    apiEndPoints as apiPoints
} from "./apiEndPoints";
export function logout() {
    axios.post('logout')
        .then(response => {
            store.commit('updateAuthState', false)
            store.commit('updateCurrentUser', null)

        })
}
export function getAuthStatus() {

    axios.get("/api/auth")
        .then(response => {
            console.log(response);
            if (response.data.data == null) {
                store.commit('updateAuthState', false);
            } else {
                store.commit('updateAuthState', true);
                store.commit('updateCurrentUser', response.data.data);
            }

        });
}
export function storePost(data) {
    return axios.post(apiPoints.storePost, data);
}
