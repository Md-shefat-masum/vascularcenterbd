<template>
    <div class="form_contents">
        <router-view></router-view>
        <div class="form_errors"></div>
    </div>
</template>

<script>
import {
    mapGetters,
    mapActions,
    mapMutations
} from 'vuex';
export default {
    props: [
        'user'
    ],
    data: function(){
        return {
            user_data: {},
        }
    },
    created: function(){
        this.user_data = JSON.parse(this.user);
        // console.log(this.user_data);
        this.api_login();
    },
    methods: {
        // ...mapActions([]),
        ...mapMutations([
            'set_auth_tokens'
        ]),
        api_login: function(){
            axios.post('/user/get-token',this.user_data)
                .then(res=>{
                    this.set_auth_tokens(res.data);
                    window.axios.defaults.headers.common["Authorization"] = `Bearer ${res.data}`;
                })
        }
    },
    computed: {
        ...mapGetters([]),
    }
}
</script>

<style scoped>
    .form_errors{
        position: fixed;
        top: 81px;
        background: white;
        right: 0;
        border: 1px solid #ff000029;
        border-radius: 5px;
    }
</style>
