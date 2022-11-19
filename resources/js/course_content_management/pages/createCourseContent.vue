<template>
    <div>
        <form action="" @submit.prevent="store_content($event)"  class="my-3">
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
                        <select @change="set_course_batch_season_week($event.target.value)" name="season_id" id="season_id" class="form-control">
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
                        <select @change="set_course_batch_season_week_episode($event.target.value)" name="week_id" id="week_id" class="form-control">
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
                        <label for="week_id">Select Batch Season Week Episode</label>
                        <select @change="set_course_batch_season_week_episode_content($event.target.value)" name="episode_id" id="episode_id" class="form-control">
                            <option value="">select</option>
                            <option :value="index" v-for="(episode, index) in course_batch_season_week_episode" :key="episode.id">
                                    {{ episode.title }}
                            </option>
                        </select>
                        <div class="text-danger week_id_error"></div>
                    </div>
                </div>
                <div class="col-12">
                    <div v-if="course_batch_season_week_episode_content && course_batch_season_week_episode_content.length">
                        <h6>
                            uploaded contents:
                        </h6>
                        <div class="d-flex flex-wrap mb-3">
                            <span class="btn btn-sm btn-dark m-1 px-2"
                                v-for="(content) in course_batch_season_week_episode_content"
                                :key="content.id">
                                {{content.title}}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row border border-1 p-3">
                        <div class="col-12">
                            <h4>Course Contents</h4>
                            <div class="border table-responsive border-1 p-3 my-3">
                                <table style="min-width: 1122px;max-width: 100%;vertical-align: middle;" class="table text-center table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Content Title</th>
                                            <th style="width: 115px;">Content Type</th>
                                            <th>Content Body / Link</th>
                                            <th style="width: 70px;" class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(episode,index) in episode_contents" :key="index">
                                            <td >
                                                {{index+1}}
                                            </td>
                                            <td>
                                                <textarea type="text" v-model="episode.title" style="min-height: 65px;" name="episode_content_title" id="episode_content_title" class="form-control"></textarea>
                                                <div class="text-primary text-start episode_content_title_error">{{episode.episode_content_title_error}}</div>
                                            </td>
                                            <td>
                                                <select v-model="episode.type" name="episode_content_type" id="episode_content_type" class="form-control">
                                                    <option value="video">video</option>
                                                    <option value="text">text</option>
                                                    <option value="image">image</option>
                                                </select>
                                                <div class="text-primary text-start episode_content_type_error">{{episode.episode_content_type_error}}</div>
                                            </td>
                                            <td>
                                                <textarea v-model="episode.content" style="min-height: 65px;" type="text" name="episode_content_content" id="episode_content_content" class="form-control"></textarea>
                                                <div class="text-primary text-start episode_content_content_error">{{episode.episode_content_content_error}}</div>
                                            </td>
                                            <td class="text-end">
                                                <button v-if="episode_contents.length>1" type="button" @click="remove_episode(index)" class="btn btn-danger btn-sm px-2"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group text-center mt-4">
                                <button @click="push_episode_content()" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add More</button>
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
            course_batch_season_week_episode_content : [],

            episode_contents: [],

            selected_week_episode: null,
            course_batch_season_week_episode_id: null,
        }
    },
    created: function(){
        this.get_auth_tokens?.length && this.get_course_related_info();
        this.push_episode_content();

        this.$watch('get_auth_tokens',function(){
            this.get_course_related_info();
            // console.log(this.get_auth_tokens);
        });
    },
    methods: {
        reset_data_on_change_course: function(){
            this.course_batches = [];
            this.course_batch_seasons = [];
            this.course_batch_season_week = [];
            this.course_batch_season_week_episode = [];
            this.course_batch_season_week_episode_content = [];
            this.episode_contents = [];
        },
        reset_data_on_change_batch: function(){
            this.course_batch_seasons = [];
            this.course_batch_season_week = [];
            this.course_batch_season_week_episode = [];
            this.course_batch_season_week_episode_content = [];
            this.episode_contents = [];
        },
        reset_data_on_change_batch_season: function(){
            this.course_batch_season_week = [];
            this.course_batch_season_week_episode = [];
            this.course_batch_season_week_episode_content = [];
            this.episode_contents = [];
        },
        reset_data_on_change_batch_season_week: function(){
            this.course_batch_season_week_episode = [];
            this.course_batch_season_week_episode_content = [];
            this.episode_contents = [];
        },
        reset_data_on_change_batch_season_week_episode: function(){
            this.course_batch_season_week_episode_content = [];
            this.episode_contents = [];
        },
        get_course_related_info: function(){
            axios.get('/course/get-course-related-contents')
                .then(res=>{
                    this.course_related_info = res.data;
                    // console.log(res.data);
                })
        },
        set_course_batches: function(course_batches_index){
            // console.log(course_batches_index);
            this.reset_data_on_change_course();

            course_batches_index?
            (this.course_batches = this.course_related_info[course_batches_index]?.course_batches) :
            this.reset_data_on_change_course();

        },
        set_course_batch_seasons: function(course_batch_index){
            this.reset_data_on_change_batch();

            course_batch_index ?
            this.course_batch_seasons = this.course_batches[course_batch_index]?.course_batch_seasons :
            this.reset_data_on_change_batch();

        },
        set_course_batch_season_week: function(course_batch_season_index){
            this.reset_data_on_change_batch_season();

            course_batch_season_index ?
            this.course_batch_season_week = this.course_batch_seasons[course_batch_season_index]?.course_batch_season_week
            :this.reset_data_on_change_batch_season();

        },
        set_course_batch_season_week_episode: function(course_batch_season_week_index){
            this.reset_data_on_change_batch_season_week();
            course_batch_season_week_index?
            this.course_batch_season_week_episode = this.course_batch_season_week[course_batch_season_week_index]?.course_batch_season_week_episodes :
            this.reset_data_on_change_batch_season_week();
        },
        set_course_batch_season_week_episode_content: function(course_batch_season_week_episode_index){
            // console.log(course_batch_season_week_episode_index);

            this.reset_data_on_change_batch_season_week_episode();
            if(course_batch_season_week_episode_index){
                this.course_batch_season_week_episode_id = this.course_batch_season_week_episode[course_batch_season_week_episode_index]?.id;
                this.course_batch_season_week_episode_content = this.course_batch_season_week_episode[course_batch_season_week_episode_index]?.course_batch_season_week_episode_contents ;
                this.episode_contents = JSON.parse(JSON.stringify(this.course_batch_season_week_episode_content));
            }
        },
        push_episode_content: function(){
            let temp_content = {
                'course_batch_season_week_episode_id' : this.selected_week,
                'title' : '',
                'type' : 'video',
                'content' : 'https://www.youtube.com/embed/aaaaaaaaaa?autoplay=1&start=0',
            };

            this.episode_contents.push(temp_content);
        },
        remove_episode: function(index){
            this.episode_contents.splice(index,1);
        },
        store_content: function(e){
            let form_data = new FormData(e.target);
            form_data.append('episode_contents',JSON.stringify(this.episode_contents));
            form_data.append('course_batch_season_week_episode_id',JSON.stringify(this.course_batch_season_week_episode_id));

            axios.post('/course/store-course-content',form_data)
                .then(res=>{
                    console.log(res.data);
                    window.s_alert('success','new week episode inserted');
                })
                .catch(err=>{
                    if(err?.response?.data?.episode_contents){
                        this.episode_contents = err.response.data.episode_contents;
                        console.log(this.episode_contents);
                    }
                    console.log(err?.response || err);
                    window.s_alert('error','something went wrong, '+(err.response?.data?.err_message || err.response?.data?.message));
                })
        }
    },
    computed: {
        ...mapGetters([
            'get_auth_tokens'
        ])
    }
}
</script>

<style>

</style>
