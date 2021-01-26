<template>
    <button type="submit" class="btn btn-link" @click="toggle">
        <i class="fas fa-heart"></i>
        <i v-text="favoritesCount"></i>
    </button>

</template>
<script>
export default {
    props:['reply'],
    data(){
        return{
            favoritesCount:1
        }

    },
    methods:{
        toggle(){
            if(this.isFavorited){
                axios.delete('/replies/' +this.reply.id+'/favorites');
            }
            else{
                axios.post('/replies/'+this.reply.id+'/favorites');
            }
        }
    }
}
</script>