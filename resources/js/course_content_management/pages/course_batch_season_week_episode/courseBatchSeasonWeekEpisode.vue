<template>
    <div>
        <form action="" @submit.prevent="store_episode($event)" enctype="multipart/form-data"  class="my-3">
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

                <div class="col-lg-4 col-xl-3" v-if="course_batch_season_week.length">
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
                <!-- <div class="col-lg-4 col-xl-3" v-if="course_batch_season_week_episode.length">
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
                    <div v-if="course_batch_season_week_episode && course_batch_season_week_episode.length">
                        <h6>
                            uploaded episodes:
                        </h6>
                        <div class="d-flex flex-wrap mb-3">
                            <span class="btn btn-sm btn-dark m-1 px-2"
                                v-for="(episode) in course_batch_season_week_episode"
                                :key="episode.id">
                                {{episode.title}}
                            </span>
                        </div>
                    </div>
                    <div class="row border border-1 p-3">
                        <div class="col-lg-4 my-2">
                            <div class="form-group">
                                <label for="episode_title">Episode Title</label>
                                <input type="text" value="episode-, " name="episode_title" id="episode_title" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 my-2">
                            <div class="form-group">
                                <label for="published_date">Published Date</label>
                                <input type="date" :value="new Date().toISOString().substring(0, 10)" name="published_date" id="published_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 my-2">
                            <div class="form-group">
                                <label for="thumbnail">Episode Thumbnail</label>
                                <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group my-2">
                                <label for="description">Episode Description</label>
                                <!-- <input type="text" name="description" id="description" class="form-control"> -->
                                <vue-editor
                                    v-model="description"
                                    name="description"
                                    id="descripiton"
                                    class="form-control"
                                ></vue-editor>
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
import { VueEditor } from "vue2-editor";
export default {
    components: {
        VueEditor
    },
    data: function(){
        return {
            course_related_info : [],
            course_batches : [],
            course_batch_seasons : [],
            course_batch_season_week : [],
            course_batch_season_week_episode : [],

            course_batch_season_id: null,
            course_batch_season_week_episode_id: null,
            selected_week: null,
            episode_title: null,
            description: null,
        }
    },
    created: function(){
        this.get_auth_tokens?.length && this.get_course_related_info();

        this.$watch('get_auth_tokens',function(){
            this.get_course_related_info();
        })
    },
    methods: {
        reset_data_on_change_course: function(){
            this.course_batches = [];
            this.course_batch_seasons = [];
            this.course_batch_season_week = [];
            this.course_batch_season_week_episode = [];

            this.course_batch_season_id = null;
            this.selected_week = null;
            this.episode_title = null;
        },
        reset_data_on_change_batch: function(){
            this.course_batch_seasons = [];
            this.course_batch_season_week = [];
            this.course_batch_season_week_episode = [];

            this.course_batch_season_id = null;
            this.selected_week = null;
            this.episode_title = null;
        },
        reset_data_on_change_batch_season: function(){
            this.course_batch_season_week = [];
            this.course_batch_season_week_episode = [];

            this.selected_week = null;
            this.episode_title = null;
        },
        get_course_related_info: function(){
            axios.get('/course/get-course-related-contents')
                .then(res=>{
                    this.course_related_info = res.data;
                    // console.log(res.data);
                })
        },
        set_course_batches: function(course_batches_index){
            this.reset_data_on_change_course();
            course_batches_index ?
            this.course_batches = this.course_related_info[course_batches_index].course_batches : '';
            // console.log(course_batches_index);
        },
        set_course_batch_seasons: function(course_batch_index){
            this.reset_data_on_change_batch();
            course_batch_index ?
            this.course_batch_seasons = this.course_batches[course_batch_index].course_batch_seasons : this.reset_data_on_change_batch();
            // console.log(course_batch_index);
        },
        set_course_batch_season_week: function(course_batch_season_index){
            this.reset_data_on_change_batch_season();
            course_batch_season_index ?
            this.course_batch_season_week = this.course_batch_seasons[course_batch_season_index].course_batch_season_week :
            this.reset_data_on_change_batch_season();
            // console.log(course_batch_season_index);
        },
        set_course_batch_season_week_episode: function(course_batch_season_week_index){
            course_batch_season_week_index ?
            this.course_batch_season_week_episode = this.course_batch_season_week[course_batch_season_week_index].course_batch_season_week_episodes :
            this.course_batch_season_week_episode = [];
            // console.log(course_batch_season_week_index, this.course_batch_season_week);
        },

        store_episode: function(e){
            let form_data = new FormData(e.target);
            form_data.append('course_batch_season_week_id', this.course_batch_season_week[e.target?.week_id?.value]?.id || null);
            form_data.append('description', this.description || null);
            axios.post('/course/week-episode/store',form_data)
                .then(res=>{
                    console.log(res.data);
                    // this.course_batch_season_week_episode = res.data;
                    // e.target.episode_title.value = 'episode-, ';
                    // e.target.thumbnail.value = [];
                    // this.description = null;
                    // window.s_alert('success','new week episode inserted');
                })
                .catch(err=>{
                    console.log(err?.response || err);
                    window.s_alert('error','something went wrong, '+(err.response?.data?.err_message || err.response?.data?.message));
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
