
<template>

<div class="container">
     <form method="POST" action="/admin/sazivi/stavke/datoteke/spremi-datoteke-stavki-saziva" enctype="multipart/form-data">

        <input type="hidden" name="_token" :value="csrf">

         <input type="hidden" name="id" :value="id" required/>

           <input type="hidden" name="id_datoteke" :value="id_datoteke" required/>
           
        <div class="form-group">
            <label for="dokumenti[]">Dodaj datoteku</label>
            <input type="file" accept=".pdf,.doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" name="dokumenti[]" class="form-control" multiple required>
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
                },
                 id_datoteke:{
                    type:Number,
                    required: true,
                }
            },
        data(){
            return{
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }   
        },
    }
</script>

