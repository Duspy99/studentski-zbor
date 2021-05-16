<template>
    <div class="container">
        <h1>Admin Dokumenti</h1>
        <a :href="'/admin/dokumenti/dodaj-dokument'" class="btn btn-success">Dodaj dokument</a>
            <b-table :items="dokumenti" :fields="fields">
             <template #cell(akcije)="data">
                 
                <a :href="'/admin/dokumenti/izbrisi-dokument/'+ data.item.id" class="btn btn-danger" >Ukloni</a>
                <a :href="'/admin/dokumenti/' + data.item.id + '/datoteke'" class="btn btn-secondary" >Datoteke</a>
                <a :href="'/admin/dokumenti/prikazi-dokument/' + data.item.id" class="btn btn-info" >Prikazi na stranici</a>
                
            </template>
              </b-table>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                dokumenti:[],
                fields: [
                        'naziv',
                        'prikazano',
                         {
                            key: 'akcije',
                            label: 'Akcije',
                            // formatter: 'fullName'
                        },
                    ],
            }   
        },
        mounted() {
            axios.get('/api/dokumenti').then(response => this.dokumenti = response.data);
        }
    }
</script>

