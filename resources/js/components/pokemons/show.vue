<template>
    <div class="d-flex justify-content-center align-items-center">
        <div class="card" style="width: 18rem;">
            <img :src="`${pokemon.sprites ? pokemon.sprites.other.dream_world.front_default : '' }`" class="card-img-top" :alt="`${pokemon.name}`">
            <div class="card-body">
                <h5 class="card-title">{{pokemon.name}}</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item" v-for="(ability, index) in pokemon.abilities" :key="index">
                    {{ability.ability.name}}
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default{
        name: 'show',
        props:['url'],
        data(){
            return {
                pokemon:''
            }
        },
        created(){
            this.getInfoPokemon()
        },
        methods:{
            getInfoPokemon(){
                axios.get(this.url).then(res=>{
                    console.log(res)
                    this.pokemon = res.data
                })
            }
        }
    }
</script>
