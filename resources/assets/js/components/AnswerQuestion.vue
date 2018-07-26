<template>
   <div class="col-12 col-3 buttons">
                    <div class="d-inline">
                        <button class="btn btn-xs btn-dark" v-on:click="sendAnswer('answer1',0)" type="submit" value="1" name="answer">
                         <i class="fa fa-check" v-show="shouldBeCheckedButtonOne"></i>
                            {{item.answer1}}
                        </button>
                    </div>
                    <div class="d-inline" method="POST">
                        <button class="btn btn-xs btn-light" v-on:click="sendAnswer('answer2',1)" type="submit" name="answer">
                           <i class="fa fa-check" v-show="shouldBeCheckedButtonTwo"></i>
                           {{item.answer2}}
                        </button>
                    </div>
                </div>
</template>

<script>
    export default {
        mounted() {
            var self = this;
            console.log('Component mounted.')
            this.getItem(this.itemHash);
        },
        props:[
            'itemHash','isAnswered','answeredValue'
        ],
        data: function() {
            return {
                item:{'answer1':'','answer2':''},
                answersCheck:{
                    answer1:false,
                    answer2:false
                },
                
            }
        },
        methods: {
            getItem: function(hash) {
                var self = this;
                axios.get('/api/question/'+hash).then(function(response) {
                    self.item = response.data;
                });
            },
            sendAnswer: function(button,answer) {
                if(button == "answer1") {
                    this.answersCheck.answer1 = !this.answersCheck.answer1;
                }
                  if(button == "answer2") {
                    this.answersCheck.answer2 = !this.answersCheck.answer2;
                }
                var formData = new FormData();
                formData.set('answer',answer);
                axios({
                    url:'/api/question/'+this.itemHash+'/answerQuestion',
                    data:formData,
                    method:'POST'
                    }).then(function(response) {
                   console.log(response);

                    return response;

                });
                this.getItem(this.itemHash);

            }
        },
        computed: {
            shouldBeCheckedButtonOne: function() {
                if((this.isAnswered == 1 && this.answeredValue == "answer1") || this.answersCheck.answer1 ) {
                    return true;
                }
                return false;
            },
             shouldBeCheckedButtonTwo: function() {
                if((this.isAnswered == 1 && this.answeredValue == "answer2") || this.answersCheck.answer2 ) {
                    return true;
                }
                return false;
            }
        }
    }
</script>
