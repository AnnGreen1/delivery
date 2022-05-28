export default {
    namespaced: true,
    state: {
        username: sessionStorage.getItem('username')
    },
    getters: {
        getusername:(state) => {
            return state.username
        }
    },
    mutations: {
        saveUserInfo(state, username) {
            state.username = username
        },
    },
    actions: {

    },
    modules: {

    }
}