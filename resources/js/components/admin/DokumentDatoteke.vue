<template>
    <div class="container">
        <h1>{{dokument.naziv}}</h1>
        <h5>Opis: {{dokument.opis}}</h5>
        <p v-if="dokument.prikazano == 1">Ovaj dokument je prikazan na stranici</p>
        <p v-else>Ovaj dokument nije prikazan na stranici</p>
        <a :href="'/admin/dokumenti/dodaj-datoteku-dokumenta/'+id" class="btn btn-success">Dodaj datoteku dokumenta</a>
            <b-table :items="datoteke" :fields="fields">
             <template #cell(akcije)="data">
                <a :href="'/admin/dokumenti/izbrisi-datoteku-dokumenta/'+ data.item.id" class="btn btn-danger" >Ukloni</a>
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
                datoteke:[],
                dokument:[],
                fields: [
                        'ime_datoteke',
                         {
                            key: 'akcije',
                            label: 'Akcije',
                            // formatter: 'fullName'
                        },
                    ],
            }   
        },
        mounted() {
            axios.get('/api/dokumenti/'+this.id).then(response => this.dokument = response.data);
            axios.get('/api/dokumenti/'+this.id+'/datoteke').then(response => this.datoteke = response.data);
        }
    }
</script>

