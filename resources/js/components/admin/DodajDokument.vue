
<template>
<div class="container">
    <form method="POST" action="/admin/dokumenti/spremi-dokument" enctype="multipart/form-data">

        <input type="hidden" name="_token" :value="csrf">

        <div class="form-group">
            <label for="naziv">Naziv</label>
            <input type="text" name="naziv" class="form-control" required>
        </div>

         <div class="form-group">
            <label for="opis">Sadrzaj / opis</label>
               <quill-editor 
               v-model="content"
               :options="options"
               ref="myQuillEditor"/>
            <textarea name="opis" id="opis" rows="4" cols="50" class="form-control" style="display:none;"></textarea>
        </div> 

        <div class="form-group">
            <label for="prikazano">Prikazano</label>
            <input type="checkbox" name="prikazano" class="form-control">
        </div>
        

         <input type="submit" v-on:click="submitPost" class="btn-btn success" value="Update"/>
    </form>
</div>
    
</template>

<script>
 import 'quill/dist/quill.snow.css';
import {quillEditor} from 'vue-quill-editor';
    export default {

        name:'DodajDokument',
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
                document.getElementById('opis').innerHTML = this.content;
            }
        },
    }
</script>

