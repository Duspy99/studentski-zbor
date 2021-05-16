<template>
    <div class="container">
        <h1>Admin Sazivi</h1>
        <a :href="'/admin/sazivi/dodaj-saziv'" class="btn btn-success">Dodaj saziv</a>
            <b-table :items="sazivi" :fields="fields">
             <template #cell(akcije)="data">
                 
                <a :href="'/admin/sazivi/izbrisi-saziv/'+ data.item.id" class="btn btn-danger" >Ukloni</a>
                <a :href="'/admin/sazivi/' + data.item.id + '/clanovi'" class="btn btn-secondary" >Članovi</a>
                <a :href="'/admin/sazivi/' + data.item.id + '/stavke'" class="btn btn-warning" >Stavke</a>
                <a :href="'/admin/sazivi/trenutni-saziv/' + data.item.id" class="btn btn-info" >Trenutni saziv</a>
                
            </template>
              </b-table>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                sazivi:[],
                fields: [
                        'naziv',
                        'trenutni_saziv',
                        'created_at',
                         {
                            key: 'akcije',
                            label: 'Akcije',
                            // formatter: 'fullName'
                        },
                    ],
            }   
        },
        mounted() {
            axios.get('/api/sazivi').then(response => this.sazivi = response.data);
        }
    }
</script>

