<template>
     <div class="comment-feed">
        <div v-if="!this.loadingUser">
             <comment-form v-if="this.user.hasOwnProperty('user_name')" v-bind:user="this.user" v-bind:hash="this.hash" v-on:updatedData="loadComments"></comment-form>
            <div v-else>
               <a href="#" data-toggle="modal" data-target="#loginModal">Sign in to Comment or Reply</a>
            </div>
        </div>
        <div v-else>Please wait..</div>
        <div v-if="loading"><em>Comments are being loaded...</em></div>
        <div v-else>
        <ul class="list-group" v-if="comments.length > 0">
            <li class="list-group-item border-0" v-bind:key="comment.id" v-for="comment in comments">
                <a href="#">{{comment.user.user_name}}</a>: {{comment.comment_text}}
            </li>
         </ul>
         <div v-else>There are no comments.</div>     
        </div>
     </div>
</template>

<script>
    export default {
        mounted() {
        
          this.loadComments();


           axios.get('/auth/api/is-logged').then(function(response) {
              return response.data;
          }).then(function(data) {
              this.user = data;
              this.loadingUser = false;

          }.bind(this));
                     console.log(this.user);
        },
        props:['hash','id'],
        data() {
            return {
                loadingUser:true,
                loading:true,
                comments:null,
                user:null
            }
        },
        methods: {
            loadComments() {
              this.loading = true;
            axios.get('/question/'+this.hash+'/api/comments').then(function(response) {
              return response.data;
          }).then(function(data) {
              this.comments = data;
              this.loading = false;
          }.bind(this));
          
            }
        }
    }
</script>
