
<template>
<div class="container">
     <form method="POST" action="/admin/sazivi/spremi-stavku-saziva" enctype="multipart/form-data">

        <input type="hidden" name="_token" :value="csrf">

         <input type="hidden" name="id" :value="id" required/>

        <div class="form-group">
            <label for="naziv">Naziv</label>
            <input type="text" name="naziv" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="sadrzaj">Sadrzaj</label>
            <textarea name="sadrzaj" rows="4" cols="50" class="form-control"></textarea>
        </div>


        <input type="submit" class="btn-btn success" value="Submit"/>
    </form>
</div>
   

</template>

<script>

    export default {
           props: {
                id:{
                    type:Number,
                    required: true,
                }
            },
        data(){
            return{
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }   
        },
        mounted() {
            //axios.get('/api/novosti/'+this.id).then(response => this.novosti = response.data);
            
        }
    }
</script>

