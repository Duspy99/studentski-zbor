
<template>

<div class="container">
     <form method="POST" action="/admin/sponzori/spremi-sponzora" enctype="multipart/form-data">

        <input type="hidden" name="_token" :value="csrf">

        <div class="form-group">
            <label for="naziv">Naziv sponzora</label>
            <input type="text" name="naziv" class="form-control" required>
        </div>

          <div class="form-group">
            <label for="slika">Slika sponzora</label>
            <input type="file" name="slika" accept="image/*" class="form-control" required>
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
    }
</script>

