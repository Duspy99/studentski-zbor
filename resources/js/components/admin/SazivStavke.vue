<template>
    <div class="container">
        <h1>STAVKE {{saziv.naziv}}A</h1>
        <a :href="'/admin/sazivi/dodaj-stavku-saziva/'+id" class="btn btn-success">Dodaj stavku saziva</a>
            <b-table :items="stavke" :fields="fields">
             <template #cell(akcije)="data">
                <a :href="'/admin/sazivi/izbrisi-stavku-saziva/'+ data.item.id" class="btn btn-danger" >Ukloni</a>
                <a :href="'/admin/sazivi/'+id+'/stavke/'+ data.item.id+'/datoteke'" class="btn btn-success" >Datoteke</a>
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
                }
            },
        data(){
            
            return{
                saziv:[],
                stavke:[],
                fields: [
                        'naziv',
                        'sadrzaj',
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
            axios.get('/api/sazivi/'+this.id+'/stavke').then(response => this.stavke = response.data);
        }
    }
</script>

