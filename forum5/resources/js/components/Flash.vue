<template>
<div class="alert alert-success" role="alert" id="alert" v-show="show">
  <strong>success </strong>{{body}}
</div>
</template>
<script>
import Subscribe from './Subscribe';
import Reply from './Reply';
import UserNotifications from './UserNotifications';

   export default {  
    props:['message'],
    components:{Reply,Subscribe,UserNotifications},
    data(){
        return{
            body:'',
            show:false
            
        }
    },
    created(){
        if (this.message)
        {
            this.flash(this.message);
        }

    

        
    },

    methods:{
        flash(message){
            this.body=message;
            this.show=true;
            this.hide(); 
        },

        hide(){
            setTimeout(()=>{
                this.message=false;
            },3000);
        }

    }

    
    
};
</script>
<style>
#alert{
    position:absolute;
    right:105px;
    width:300px;
}
</style>