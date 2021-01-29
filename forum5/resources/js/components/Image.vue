<template>
        <div class="form-group">
            <form @submit.prevent="upload">
                
                <input type="file" @change="handleOnChange" class="form-control-file form-control-sm" name="avatar">
                <button type="button" class="btn btn-xs btn-link">upload</button>
                </form>
            </div>
</template>
<script>
export default {
    data:()=>({
        image:''
    }),

    methods:{
        handleOnChange(e){
            this.image=e.target.files[0]
        },

        upload(){
            const formData=new FormData;
            formData.set('image',this.image);
            axios.post('/upload',formData);
        }
    }
    
}
</script>

