import Vue from 'vue'
import VueRouter from 'vue-router'
import courseContentLayout from './layouts/courseContentLayout'
import createCourseContent from './pages/createCourseContent'
import allCategory from './pages/course_category/allCategories'
import createQuiz from './pages/course_quiz/createQuiz'
import allCourses from './pages/courses/allCourses'
import allCourseBatch from './pages/course_batch/allCourseBatch'
import courseBatchSeason from './pages/course_batch_season/courseBatchSeason'
import courseBatchSeasonWeek from './pages/course_batch_season_week/courseBatchSeasonWeek'
import courseBatchSeasonWeekEpisode from './pages/course_batch_season_week_episode/courseBatchSeasonWeekEpisode'

Vue.use(VueRouter);
window.Fire = new Vue();

const routes = [
    {
        path: '/',
        component: courseContentLayout,
        children: [
            {path: 'create-course-content', name:'createCourseContent', component: createCourseContent},
            {path: 'create-quiz', name:'createQuiz', component: createQuiz},
            {path: 'course-category', name:'allCategory', component: allCategory},
            {path: 'courses', name:'allCourses', component: allCourses},
            {path: 'course-batch', name:'allCourseBatch', component: allCourseBatch},
            {path: 'course-batch-season', name:'courseBatchSeason', component: courseBatchSeason},
            {path: 'course-batch-season-week', name:'courseBatchSeasonWeek', component: courseBatchSeasonWeek},
            {path: 'course-batch-season-week-episode', name:'courseBatchSeasonWeekEpisode', component: courseBatchSeasonWeekEpisode},
        ]
    },
];

const course_content_router = new VueRouter({
    routes,
    mode: 'hash',
    linkActiveClass: 'active',
    // scrollBehavior: function(to, from, savedPosition) {
    //     return { x: 0, y: 0 }
    // }
});

export default course_content_router
