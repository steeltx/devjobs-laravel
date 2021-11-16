<template>
    <div>
        <ul class="flex flex-wrap justify-center">
            <li
            class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4"
                v-for="(skill, i) in this.skills"
                :key="i"
                @click="activar($event)"
            >{{skill}}</li>
        </ul>
        <input type="hidden" name="skills" id="skills">
    </div>
</template>

<script>
    export default{
        props:['skills'],
        mounted(){
            console.log(this.skills);
        },
        data: function(){
            return{
                habilidades: new Set()
            }
        },
        methods: {
            activar(e){
                if(e.target.classList.contains('bg-green-400')){
                    // activo
                    e.target.classList.remove('bg-green-400');

                    // eliminar del set de habilidades
                    this.habilidades.delete(e.target.textContent);
                }
                else{
                    // no esta activo
                    e.target.classList.add('bg-green-400');
                    // agregar al set de habilidades
                    this.habilidades.add(e.target.textContent);
                }

                // agregar habilidades al input hidden
                const stringHabilidades = [...this.habilidades];
                document.querySelector('#skills').value=stringHabilidades;
            }
        }
    }
</script>
