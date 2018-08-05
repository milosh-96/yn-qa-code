<template>
     <div class="comment-form">
         <div class="form-group">
             <strong>You are commenting as {{user.user_name}}</strong>
            <textarea
                class="form-control comment-item"
                ref="commentText"
                placeholder="Use Shift+Enter for a new line!"
            >
            </textarea>
        </div>
     </div>
</template>

<script>
    export default {
        mounted() {
         this.$refs.commentText.addEventListener('keypress',(event) => {
            if(event.keyCode == 13 && !event.shiftKey) {
                event.preventDefault();
               

                if(confirm("You are about to submit a comment, are you sure?")) {
                    this.submitComment();

                    alert("Your comment has been sent.");
                }
                else {
                    alert("You need to click 'OK' to send an answer'");
                }
            }

            
         });
        },
        props:['user','hash'],
        data() {
          return {}
        },
        methods: {
            submitComment: function() {
                let url = '/comments/api';
                let commentObject = {
                    'comment_text':this.$refs.commentText.value,
                    'object_hash':this.hash,
                    'comment_id':null,
                    'reply':false
                }
                //console.log(this.$refs);
                console.log(commentObject);
                
                axios.post(url,commentObject).then((response) => {
                    console.log(response.data);

                }).then(() => {
                    this.$emit('updatedData');
                }).catch(() => {
                    console.log("Error happened");
                    alert("!");
                });
            }
        }
    }
</script>
