
<template>

<div class="container">
      <form method="POST" action="/admin/dokumenti/spremi-datoteku-dokumenta" enctype="multipart/form-data">

        <input type="hidden" name="_token" :value="csrf">

         <input type="hidden" name="id" :value="id" required/>

        <div class="form-group">
            <label for="dokumenti[]">Dodaj datoteke</label>
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
                }
            },
        data(){
            return{
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }   
        },
    }
</script>

