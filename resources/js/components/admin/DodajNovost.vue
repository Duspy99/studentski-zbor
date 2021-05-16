
<template>
<div class="container">

  
      
 <form method="POST" action="/admin/novosti/spremi-novost" enctype="multipart/form-data">
        <input type="hidden" name="_token" :value="csrf" hidden>

        <div class="form-group">
            <label for="naslov">Naslov</label>
            <input type="text" name="naslov" class="form-control" required>
        </div>

       <div class="form-group">
            <label for="sadrzaj">Sadrzaj</label>
               <quill-editor 
               v-model="content"
               :options="options"
               ref="myQuillEditor"/>
            <textarea name="sadrzaj" id="sadrzaj" rows="4" cols="50" class="form-control" style="display:none;" required></textarea>

            <div id="sadrzajError" style="display:none;">
                <div class="alert alert-danger" role="alert">
                    Ispuni polje sadržaj!
                </div>
            </div>
        </div> 

       <div class="form-group">
            <input type="radio" name="vrsta" value="službeno">
            <label for="other">Sluzbeno</label><br>
            <input type="radio" name="vrsta" value="kultura">
            <label for="vrsta">Kultura</label><br>
            <input type="radio"  name="vrsta" value="edukacija">
            <label for="vrsta">Edukacija</label><br>
            <input type="radio"  name="vrsta" value="sport">
            <label for="vrsta">Sport</label><br>
            <input type="radio" name="vrsta" value="zabava">
            <label for="other">Zabava</label><br>
            <input type="radio" name="vrsta" value="ostalo" checked>
            <label for="other">Ostalo</label>
        </div>

        <div class="form-group">
            <label for="naslovna_slika">Naslovna slika</label>
            <input type="file" name="naslovna_slika" accept="image/*" class="form-control">
        </div>

        <div class="form-group">
            <label for="galerija_slike">Galerija</label>
            <input type="file" name="galerija_slike[]" accept="image/*" class="form-control" multiple>
        </div>

        <input type="submit" v-on:click="submitPost" class="btn-btn success" value="Update"/>
    </form>
</div>
   

</template>

<script>
import 'quill/dist/quill.snow.css'
import {quillEditor} from 'vue-quill-editor';


    export default {
        name:'DodajNovost',
        components:{
            quillEditor
        },
        data(){
            return{
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                options:{
                    debug:'none',
                    placeholder:'Unesite neki tekst',
                    readOnly: true,
                    theme:'snow',
                    modules:{
                        toolbar:['bold','italic','strike','underline','link']
                    }
                    
                },
                content:''
            }   
        },methods:{
            submitPost: function () {
                if(this.content == '')
                {
                    document.getElementById('sadrzajError').style.display = 'block';
                }
                document.getElementById('sadrzaj').innerHTML = this.content;
            }
        }
    }
    
   

</script>

<style scoped>
.quill-editor{
    min-height: 100px !important;
}
</style>