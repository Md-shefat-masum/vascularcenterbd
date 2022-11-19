import axios from 'axios';

// state list
const state = {
    auth_information: {},
    auth_tokens: null,
}

// get state
const getters = {
    get_auth_information: state => state.auth_information,
    get_auth_tokens: state => state.auth_tokens,
}

// actions
const actions = {
    fetch_auth_information: function (state) {
        axios.get('/api/customer-get-basic-information')
            .then((res) => {
                // console.log(res.data);
                this.commit('set_basic_information', res.data);
            })
            .catch((err)=>{
                window.s_alert('error','something went wrong, reload window to fix it. '+(err.response?.data?.err_message || err.response?.data?.message));
            })
    },
}

// mutators
const mutations = {
    set_auth_information: function (state, auth_information) {
        state.auth_information = auth_information;
    },
    set_auth_tokens: function (state, auth_tokens) {
        state.auth_tokens = auth_tokens;
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}
