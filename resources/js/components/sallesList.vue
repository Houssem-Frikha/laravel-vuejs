<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
const router = useRouter();
import axios from "axios";
const salles = ref([]);

const getsalles = async () => {
    await axios
        .get("http://localhost:8000/api/salles")
        .then((res) => {
            salles.value = res.data;
        })
        .catch((error) => {
            salles.value = [];
            console.log(error);
        });
};
onMounted(() => {
    getsalles();
});
const deletesalle = async (id) => {
    try {
        await axios.delete("http://localhost:8000/api/salles/"+id);
    } catch (error) {
        console.log(error);
    }
};
</script>
<template>
    <div style="background: green; padding: 10px">
        <router-link class="btn" style="background-color: aliceblue" :to="{ name: 'addSalle' }">Ajouter
            salle</router-link>
    </div>
    <table class="table table-striped shadow">
        <thead>
            <tr>
                <th>Libellé</th>
                <th>Adresse</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="sal in salles">
                <th>{{ sal.libelle }}</th>
                <th>{{ sal.adresse }}</th>
                <th>
                    <router-link class="btn btn-primary" :to="{ path: 'editsalle/' + sal.id }">Edit</router-link>
                </th>
                <th>
                    <button class="btn btn-danger" @click="deletesalle(sal.id)">Delete</button>
                </th>
            </tr>
        </tbody>
    </table>
</template>
