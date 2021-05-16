<template>
    <div class="container">
        <h1>ČLANOVI {{saziv.naziv}}A</h1>
        <a :href="'/admin/sazivi/dodaj-clana-saziva/'+id" class="btn btn-success">Dodaj clana saziva</a>
            <b-table :items="clanovi" :fields="fields">
             <template #cell(akcije)="data">
                <a :href="'/admin/sazivi/izbrisi-clana-saziva/'+ data.item.id" class="btn btn-danger" >Ukloni</a>
            </template>
              </b-table>
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
                saziv:[],
                clanovi:[],
                fields: [
                        'ime',
                        'opis',
                        'uloga',
                        'email',
                        'telefon',
                         {
                            key: 'akcije',
                            label: 'Akcije',
                            // formatter: 'fullName'
                        },
                    ],
            }   
        },
        mounted() {
            axios.get('/api/sazivi/'+this.id+'/clanovi').then(response => this.clanovi = response.data);
            axios.get('/api/sazivi/'+this.id).then(response => this.saziv = response.data);
        }
    }
</script>

