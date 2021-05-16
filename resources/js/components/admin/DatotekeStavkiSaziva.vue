<template>
    <div class="container">
        <h1>{{saziv.naziv}}</h1>
        <h2>STAVKA: {{stavka.naziv}}</h2>
        <h5>SADRZAJ: {{stavka.sadrzaj}}</h5>
        <a :href="'/admin/sazivi/'+id+'/stavke/'+id_datoteke+'/datoteke/dodaj-datoteke-stavki-saziva'" class="btn btn-success">Dodaj datoteku stavke saziva</a>
            <b-table :items="datoteke" :fields="fields">
             <template #cell(akcije)="data">
                <a :href="'/admin/sazivi/stavke/datoteke/izbrisi-datoteku-stavke-saziva/'+ data.item.id" class="btn btn-danger" >Ukloni</a>

            </template>
              </b-table>
    </div>
    
</template>

<script>
    export default {
        methods: {

        },

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
                saziv:[],
                stavka:[],
                datoteke:[],
                fields: [
                        'ime_datoteke',
                        'path_datoteke',
                         {
                            key: 'akcije',
                            label: 'Akcije',
                            // formatter: 'fullName'
                        },
                    ],
            }   
        },
        mounted() {
            axios.get('/api/sazivi/'+this.id).then(response => this.saziv = response.data);
            axios.get('/api/sazivi/'+this.id+'/stavke/'+this.id_datoteke).then(response => this.stavka = response.data);
            axios.get('/api/sazivi/'+this.id+'/stavke/'+this.id_datoteke+'/datoteke').then(response => this.datoteke = response.data);
        }
    }
</script>

