<template>
     <div class="comment-feed">
         <div v-if="!loadingUser">
             <comment-form v-if="this.user" v-bind:user="this.user"></comment-form>
            <div v-else>
                <a href="#" data-target="#loginModal" data-toggle="modal">Sign in to Comment or Reply</a>
            </div>
        </div>
        <div v-else>Please Wait...</div>
        <div v-if="loading"><em>Comments are being loaded...</em></div>
        <div v-else>
        <ul class="list-group" v-if="comments.length > 0">
            <li class="list-group-item border-0" v-bind:key="comment.id" v-for="comment in comments">
                <a href="">{{comment.user.user_name}}</a>: {{comment.comment_text}}
            </li>
         </ul>
         <div v-else>There are no comments.</div>     
        </div>
     </div>
</template>

<script>
    export default {
        mounted() {
          axios.get('/question/'+this.hash+'/api/comments').then(function(response) {
              return response.data;
          }).then(function(data) {
              console.log(data);
              this.comments = data;
              this.loading = false;
          }.bind(this));
           axios.get('/auth/api/is-logged').then(function(response) {
              return response.data;
          }).then(function(data) {
              console.log(data);
              this.user = data;
              this.loadingUser = false;

             console.log(this.user);
          }.bind(this));

        },
        props:['hash'],
        data() {
            return {
                loadingUser:true,
                loading:true,
                comments:null,
                user:null
            }
        },
        methods: {

        }
    }
</script>
