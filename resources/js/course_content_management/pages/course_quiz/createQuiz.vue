<template>
    <div>
        <form action="" class="my-3">
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
                </div>

                <div class="col-12">
                    <div class="row border border-1 p-3">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="quiz_title">Quiz Title</label>
                                <input type="text" name="quiz_title" id="quiz_title" class="form-control">
                                <div class="text-danger quiz_title_error"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="quiz_title">Quiz No</label>
                                <input type="number" name="quiz_no" id="quiz_no" class="form-control">
                                <div class="text-danger quiz_no_error"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="episode_publish_date">Publish Date</label>
                                <input type="date" :value="new Date().toISOString().substring(0, 10)" name="episode_publish_date" id="episode_publish_date" class="form-control">
                                <div class="text-danger episode_publish_date_error"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="border table-responsive border-1 p-3 my-3">
                                <table style="min-width: 768px;max-width: 100%;" class="table text-center table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Quiz Title</th>
                                            <th>Quiz options</th>
                                            <th style="width: 70px;" class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(quiz,index) in quiz_questions" :key="index">
                                            <td >
                                                {{index+1}}
                                            </td>
                                            <td>
                                                <input type="text" v-model="quiz.title" name="quiz_question_title" id="quiz_question_title" class="form-control">
                                                <div class="text-danger quiz_question_title_error"></div>
                                            </td>
                                            <td>
                                                <ul class="w-100 p-0 m-0">
                                                    <li class="d-flex align-items-center my-1" v-for="(quiz_answer, quiz_answer_index) in quiz.option" :key="quiz_answer_index">
                                                        <input type="radio" :name="`question_${index}_correct_answer`">
                                                        <input type="text" :name="`question_${index}_answer_${quiz_answer_index}`" class="ms-2 flex-fill form-control">
                                                        <button v-if="quiz.option.length > 1" type="button" @click="remove_quiz_option(index,quiz_answer_index)" class="btn btn-danger btn-sm ms-2 px-2"><i class="fa fa-trash"></i></button>
                                                    </li>
                                                </ul>
                                                <div class="text-center">
                                                    <button @click="push_quiz_question_option(index)" type="button" class="btn btn-info btn-sm mt-2">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <button v-if="quiz_questions.length > 1" type="button" @click="remove_quiz(index)" class="btn btn-danger btn-sm px-2"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group text-center mt-4">
                                <button @click="push_quiz_question()" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row border border-1 p-3">

                    </div>
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

            quiz_questions: [],

            selected_week: null,
            course_batch_season_week_episode_id: null,
        }
    },
    created: function(){
        this.get_auth_tokens?.length && this.get_course_related_info();
        this.push_quiz_question();

        this.$watch('get_auth_tokens',function(){
            this.get_course_related_info();
        })
    },
    methods: {
        get_course_related_info: function(){
            axios.get('/course/get-course-related-contents')
                .then(res=>{
                    this.course_related_info = res.data;
                    // console.log(res.data);
                })
        },
        set_course_batches: function(course_batches_index){
            this.course_batches = this.course_related_info[course_batches_index].course_batches;
            // console.log(course_batches_index);
        },
        set_course_batch_seasons: function(course_batch_index){
            this.course_batch_seasons = this.course_batches[course_batch_index].course_batch_seasons;
            // console.log(course_batch_index);
        },
        set_course_batch_season_week: function(course_batch_season_index){
            this.course_batch_season_week = this.course_batch_seasons[course_batch_season_index].course_batch_season_week;
            // console.log(course_batch_season_index);
        },
        set_course_batch_season_week_episode: function(course_batch_season_week_index){
            this.course_batch_season_week_episode = this.course_batch_season_week[course_batch_season_week_index].course_batch_season_week_episodes;
            // console.log(course_batch_season_week_index, this.course_batch_season_week);
        },
        push_quiz_question: function(){
            let temp_quiz = {
                title: null,
                course_batch_season_week_episode_quiz_id: null,
                correct_answer_id: null,
                option: []
            };
            this.quiz_questions.push(temp_quiz);
            this.push_quiz_question_option(this.quiz_questions.length - 1);
        },
        push_quiz_question_option: function(quiz_question_index){
            let temp_option = {
                course_batch_season_week_episode_quiz_question_id: null,
                title: null,
            };
            this.quiz_questions[quiz_question_index].option.push(temp_option);
        },
        remove_quiz: function(index){
            this.quiz_questions.splice(index,1);
        },
        remove_quiz_option: function(quiz_question_index, quiz_option_index){
            this.quiz_questions[quiz_question_index].option.splice(quiz_option_index,1);
        },

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
