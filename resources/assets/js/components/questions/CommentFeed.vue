<template>
     <div class="comment-feed">
        <div v-if="loading"><em>Comments are being loaded...</em></div>
        <div v-else><
        <ul class="list-group">
            <li class="list-group-item border-0">
                <a href="">User1</a>: YOO HOO
            </li>
         </ul>     
        </div>
     </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                loading:true
            }
        },
        methods: {

        }
    }
</script>
