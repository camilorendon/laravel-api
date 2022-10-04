<template>
    <section>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div v-for="(pokemon, index) in pokemons" :key="index">

                <div class="col" @click="redirectPage(pokemon.url)">
                    <div class="card">
                    <img src="" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">  {{pokemon.name}} </h5>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-around my-3">
            <button class="btn btn-danger" @click="prevPage" v-if="dataPaginate.previous" >previous</button>
            <button class="btn btn-success" @click="nextPage" v-if="dataPaginate.next" >next</button>
        </div>

    </section>



</template>

<script>
    import axios from 'axios'

    export default {


        data(){
            return{
                pokemons:[],
                dataPaginate:{}
            }
        },

        created(){
            this.getPokemons()
        },
        mounted(){

        },
        destroyed(){

        },

        mounted() {
            this.getPokemons
            console.log('Component mounted.')
        },

        methods:{
            getPokemons(){
                axios.get('https://pokeapi.co/api/v2/pokemon/?offset=10&limit=10').then(res => {
                    this.initializeDataPaginate(res)
                })
            },

            nextPage(){
                axios.get(this.dataPaginate.next).then(res =>{
                    this.initializeDataPaginate(res)
                })
		    },
            prevPage(){
                axios.get(this.dataPaginate.previous).then(res =>{
                    this.initializeDataPaginate(res)
                })
            },

            initializeDataPaginate(res){
                this.pokemons = res.data.results
                this.dataPaginate = res.data
		    },

            redirectPage(url){
                window.location.href = `/pokemon/show/?url=${url}`
            }

        }
    }


</script>
