
<template>
<div class="container">
    <form method="POST" action="/admin/sazivi/spremi-clana-saziva" enctype="multipart/form-data">

        <input type="hidden" name="_token" :value="csrf">

         <input type="hidden" name="id" :value="id"/>

        <div class="form-group">
            <label for="ime">Ime i prezime</label>
            <input type="text" name="ime" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="ime">Opis</label>
            <input type="text" name="opis" class="form-control" required>
        </div>


        <div class="form-group">
            <label for="ime">Email</label>
            <input type="text" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="ime">Telefon</label>
            <input type="text" name="telefon" class="form-control">
        </div>

                              

        <div class="form-group">
            <input type="radio" name="uloga" id="1" value="1">
            <label for="uloga">Predsjednik/ca</label><br>
            <input type="radio"  name="uloga" id="2" value="2">
            <label for="uloga">Zamjenik/ca predsjednika/ce</label><br>
            <input type="radio"  name="uloga" id="3" value="3">
            <label for="uloga">Neka veća funkcija</label><br>
            <input type="radio" name="uloga" id="99" value="99" checked>
            <label for="other">Ostalo</label>
        </div>

        <input type="submit" class="btn-btn success" value="Submit"/>

    </form>
    <br>

    <div v-if="poruka" class="alert alert-success" role="alert">
        {{poruka}}
    </div>
    
</div>
    

</template>

<script>

    export default {
           props: {
                id:{
                    type:Number,
                    required: true,
                },
                poruka:{
                    type:String,
                    required: false,
                }
            },
        data(){
            return{
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
              
            }   
        },
    }
</script>

