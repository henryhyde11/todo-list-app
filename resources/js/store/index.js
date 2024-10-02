import { createStore } from "vuex";

export default createStore({
    state: {
        user: null,
        authenticated: false,
    },
    mutations: {
        setUser(state, user) {
            state.user = user;
            state.authenticated = !!user;
        },
        clearUser(state) {
            state.user = null;
            state.authenticated = false;
        },
    },
    actions: {
        async login({ commit }, credentials) {
            try {
                const response = await axios.post("/login", credentials);
                commit("setUser", response.data.user);
                return response;
            } catch (error) {
                console.error(error);
                throw error;
            }
        },
        async register({ commit }, credentials) {
            try {
                const response = await axios.post("/register", credentials);
                commit("setUser", response.data.user);
                return response;
            } catch (error) {
                console.error(error);
                throw error;
            }
        },
        async logout({ commit }) {
            try {
                await axios.post("/logout");
                commit("clearUser");
            } catch (error) {
                console.error(error);
            }
        },
        async checkAuth({ commit }) {
            try {
                const response = await axios.get("/api/user");
                commit("setUser", response.data);
            } catch (error) {
                commit("clearUser");
            }
        },
    },
    getters: {
        isAuthenticated: (state) => state.authenticated,
        getUser: (state) => state.user,
    },
});
