<template>
    <div>
        <h5>course batch season</h5>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
    created: function(){
        console.log('hi');
        this.$watch('get_auth_tokens',function(){
            axios.post('/user/user_info')
                .then(res=>{
                    console.log(res.data);
                })
        })
    },
    computed: {
        ...mapGetters([
            'get_auth_tokens',
        ])
    }
}
</script>

<style>

</style>
