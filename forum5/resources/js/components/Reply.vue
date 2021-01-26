<template>
<div>
    <div class="form-group">
        <div v-if="editing">
        <textarea name="body" id="body" class="form-control" placeholder="have a better thing to say?" row="5" v-model="body">
            </textarea>
            <button type="submit" class="btn btn-xs btn-link" @click="AddReply">update Post</button>
        </div>
        <div v-else>
        </div>
        
    </div>
 <button type="submit" class="btn btn-xs btn-link" @click="editing=true">Edit Post</button>
 
</div>
</template>
<script>
export default{

    data(){
        return{
            editing:false,
            body:'',
            endpoint:''

        };

    },
    methods:{
        AddReply(){
            
            axios.patch('/replies/'+this.id,{
                body:this.body

            });
        }

                
            
        

    }
}
</script>