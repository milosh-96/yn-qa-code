
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('comment-feed', require('./components/questions/CommentFeed.vue'));
Vue.component('comment-form', require('./components/questions/CommentForm.vue'));

const app = new Vue({
    el: '#wrapper'
});

$.fn.editable.defaults.ajaxOptions = {type: "PUT"};
$.fn.editable.defaults.mode = 'inline';
$(".comment-text").editable({
    params: function(params) {
        params._token =  $('meta[name="csrf-token"]').attr('content');        
        return params;
    },
    success: function(response, newValue) {
        if(response.status == 'error') {
            return response.msg; //msg will be shown in editable form
        }
    }
});