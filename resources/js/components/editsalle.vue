<script setup>
import { ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import axios from "axios";
const router = useRouter();
const route = useRoute();
let salle = ref([]);
const id = route.params.id;
const getSalle = () => {
    axios.get("http://localhost:8000/api/salles/" + id)
        .then(res => {
            salle.value = res.data;
        })
        .catch(error => {
            salle.value = [];
            console.log(error);
        })
}
onMounted(() => {
    getSalle()
})
const updateSalle = async () => {
    axios.put("http://localhost:8000/api/salles/" + id, salle.value)
        .then(() => (
            router.push({ name: 'sallesList' })
        ))
        .catch(err => {
            console.log(error);
        })
}
</script>
<template>
    <div>
        <form @submit.prevent="updateSalle">
            <h6>Ajouter salle</h6>
            <div class="row">
                <div class="col-md-3">
                    <label for="libsalle" class="form-label">Libelle </label>
                </div>
                <div class="col-md-3">
                    <input v-model="salle.libelle" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="adresse" class="form-label">Adresse </label>
                </div>
                <div class="col-md-3">
                    <input v-model="salle.adresse" />
                </div>
            </div>
            <br />
            <button type="submit" className="btn btn-outline-primary">
                Enregister
            </button>
        </form>
    </div>
</template>
<style scoped></style>