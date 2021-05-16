<template>
    <div class="container">
        <h1>Admin Novosti</h1>
        <a :href="'/admin/novosti/dodaj-novost'" class="btn btn-success">Dodaj novost</a>
            <b-table :items="novosti" :fields="fields">
                <template #cell(kreirano)="data">
                    <p>{{data.item.created_at.split('T')[0].split('-')[2] + '.' + data.item.created_at.split('T')[0].split('-')[1] + '.' + data.item.created_at.split('T')[0].split('-')[0] + '.' }}</p>
                </template>
             <template #cell(akcije)="data">
                <a :href="'/admin/novosti/izbrisi-novost/'+ data.item.id" class="btn btn-danger" >Ukloni</a>
            </template>
              </b-table>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                novosti:[],
                fields: [
                        'naslov',
                        'vrsta',
                       
                        {
                            key:'kreirano',
                            label:'Kreirano'
                        },
                         {
                            key: 'akcije',
                            label: 'Akcije',
                            
                            // formatter: 'fullName'
                        },
                    ],
            }   
        },
        mounted() {
            axios.get('/api/novosti').then(response => {
                this.novosti = response.data;
            });
        }
    }
</script>

