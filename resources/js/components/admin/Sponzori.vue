<template>
    <div class="container">
        <h1>Admin Sponzori</h1>
        <a :href="'/admin/sponzori/dodaj-sponzora'" class="btn btn-success">Dodaj sponzora</a>
            <b-table :items="sponzori" :fields="fields">
             <template #cell(akcije)="data">
                <a :href="'/admin/sponzori/izbrisi-sponzora/'+ data.item.id" class="btn btn-danger" >Ukloni</a>
            </template>
              </b-table>         
    </div>
</template>

<script>
    export default {
        data(){
            return{
                sponzori:[],
                fields: [
                        'naziv',
                         {
                            key: 'akcije',
                            label: 'Akcije',
                        },
                    ],
            }   
        },
        mounted() {
            axios.get('/api/sponzori').then(response => {
                this.sponzori = response.data;
            });
        }
    }
</script>

