<template>
    <div>
        <form action="" @submit.prevent="store_week($event)"  class="my-3">
            <div class="loader"><div class="d_progress"></div></div>
            <div class="row">
                <div class="col-lg-4 col-xl-3">
                    <div class="form-group mb-3">
                        <label for="course_id">Courses</label>
                        <select @change="set_course_batches($event.target.value)" name="course_id" id="course_id" class="form-control">
                            <option value="">select</option>
                            <option :value="index" v-for="(course,index) in course_related_info" :key="course.id">
                                    {{ course.title }}
                            </option>
                        </select>
                        <div class="text-danger course_id_error"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3" v-if="course_batches.length">
                    <div class="form-group mb-3">
                        <label for="batch_id">Select Batch</label>
                        <select @change="set_course_batch_seasons($event.target.value)" name="batch_id" id="batch_id" class="form-control">
                            <option value="">select</option>
                            <option :value="index" v-for="(batch, index) in course_batches" :key="batch.id">
                                    {{ batch.title }}
                            </option>
                        </select>
                        <div class="text-danger batch_id_error"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3" v-if="course_batch_seasons.length">
                    <div class="form-group mb-3">
                        <label for="season_id">Select Batch Season</label>
                        <select v-model="course_batch_season_id" @change="set_course_batch_season_week($event.target.value)" name="season_id" id="season_id" class="form-control">
                            <option value="">select</option>
                            <option :value="index" v-for="(season, index) in course_batch_seasons" :key="season.id">
                                {{ season.title }}
                            </option>
                        </select>
                        <div class="text-danger season_id_error"></div>
                    </div>
                </div>

                <!-- <div class="col-lg-4 col-xl-3" v-if="course_batch_season_week.length">
                    <div class="form-group mb-3">
                        <label for="week_id">Select Batch Season Week</label>
                        <select @change="set_course_batch_season_week_episode($event.target.value)" v-model="selected_week" name="week_id" id="week_id" class="form-control">
                            <option value="">select</option>
                            <option :value="index" v-for="(week, index) in course_batch_season_week" :key="week.id">
                                    {{ week.title }}
                            </option>
                        </select>
                        <div class="text-danger week_id_error"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3" v-if="course_batch_season_week_episode.length">
                    <div class="form-group mb-3">
                        <label for="week_id">Select Episode</label>
                        <select v-model="course_batch_season_week_episode_id" name="week_id" id="week_id" class="form-control">
                            <option value="">select</option>
                            <option :value="index" v-for="(episode, index) in course_batch_season_week_episode" :key="episode.id">
                                {{ episode.title }}
                            </option>
                        </select>
                        <div class="text-danger week_id_error"></div>
                    </div>
                </div> -->

                <div class="col-12">
                    <div v-if="course_batch_season_week && course_batch_season_week.length">
                        <h6>
                            uploaded weeks:
                        </h6>
                        <div class="d-flex flex-wrap mb-3">
                            <span class="btn btn-sm btn-dark m-1 px-2" v-for="(week) in course_batch_season_week" :key="week.id">{{week.title}}</span>
                        </div>
                    </div>
                    <div class="row border border-1 p-3">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="week_title">Week Title</label>
                                <input type="text" v-model="week_title" name="week_title" id="week_title" class="form-control">
                                <div class="text-danger week_title_error"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center pt-3">
                    <button type="submit" class="btn submit_button btn-outline-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
    data: function(){
        return {
            course_related_info : [],
            course_batches : [],
            course_batch_seasons : [],
            course_batch_season_week : [],
            course_batch_season_week_episode : [],

            course_batch_season_id: null,
            week_title: null,
        }
    },
    created: function(){
        this.get_auth_tokens?.length && this.get_course_related_info();

        this.$watch('get_auth_tokens',function(){
            this.get_course_related_info();
        })
    },
    methods: {
        reset_data_infos: function(){
            this.course_batch_season_week = [];
            this.course_batch_season_id = null;
            this.week_title = null;
        },
        get_course_related_info: function(){
            axios.get('/course/get-course-related-contents')
                .then(res=>{
                    this.course_related_info = res.data;
                    // console.log(res.data);
                })
        },
        set_course_batches: function(course_batches_index){
            this.reset_data_infos();
            course_batches_index ?
            this.course_batches = this.course_related_info[course_batches_index].course_batches :
            this.course_batches = [];
            // console.log(course_batches_index);
        },
        set_course_batch_seasons: function(course_batch_index){
            this.reset_data_infos();
            course_batch_index ?
            this.course_batch_seasons = this.course_batches[course_batch_index].course_batch_seasons :
            this.course_batch_seasons = [];
            // console.log(course_batch_index);
        },
        set_course_batch_season_week: function(course_batch_season_index){
            course_batch_season_index?
            this.course_batch_season_week = this.course_batch_seasons[course_batch_season_index].course_batch_season_week:
            this.course_batch_season_week = [];
            // console.log(course_batch_season_index);
        },
        set_course_batch_season_week_episode: function(course_batch_season_week_index){
            course_batch_season_week_index ?
            this.course_batch_season_week_episode = this.course_batch_season_week[course_batch_season_week_index].course_batch_season_week_episodes :
            this.course_batch_season_week_episode = [];
            // console.log(course_batch_season_week_index, this.course_batch_season_week);
        },

        store_week: function(e){
            let form_data = new FormData(e.target);
            form_data.append('course_batch_season_id', this.course_batch_seasons[e.target.course_id.value]?.id || null);
            axios.post('/course/week/store',form_data)
                .then(res=>{
                    this.course_batch_season_week = res.data;
                    this.week_title = null;
                    window.s_alert('success','new week inserted');
                })
                .catch(err=>{
                    console.log(err.response);
                    window.s_alert('error','something went wrong');
                })
        },

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
