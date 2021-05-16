
<template>

<div class="container">
      <form method="POST" action="/admin/sazivi/spremi-saziv" enctype="multipart/form-data">

        <input type="hidden" name="_token" :value="csrf">

        <div class="form-group">
            <label for="naziv">Naziv</label>
            <input type="text" name="naziv" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="trenutni_saziv">Trenutni saziv</label>
            <input type="checkbox" name="trenutni_saziv" class="form-control">
        </div>
        


        <input type="submit" class="btn-btn success" value="Update"/>
    </form>

</div>

</template>

<script>

    export default {

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

