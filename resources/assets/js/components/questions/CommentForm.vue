<template>
     <div class="comment-form">
         <div class="form-group">
             <strong>You are commenting as {{user.user_name}}</strong>
            <textarea
                class="form-control comment-item"
                ref="commentForm"
                placeholder="Use Shift+Enter for a new line!"
            >
            </textarea>
        </div>
     </div>
</template>

<script>
    export default {
        mounted() {
         this.$refs.commentForm.addEventListener('keypress',function(event) {
            if(event.keyCode == 13 && !event.shiftKey) {
                event.preventDefault();
                alert("BBB");
            }

            
         });
        },
        props:['user'],
        data() {
          
        },
        methods: {

        }
    }
</script>
