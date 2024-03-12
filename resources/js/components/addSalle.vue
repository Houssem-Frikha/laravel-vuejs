<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";
const router = useRouter()
const spectacle = ref({})
const salles = ref([]);
const pieces = ref([])
const getsPieces = () => {
    axios.get("http://localhost:8000/api/pieces/")
        .then(res => {
            pieces.value = res.data;
        })
        .catch(error => {
            salles.value = [];
            console.log(error);
        })
}
const getSalles = () => {
    axios.get("http://localhost:8000/api/salles/")
        .then(res => {
            salles.value = res.data;
        })
        .catch(error => {
            salles.value = [];
            console.log(error);
        })
}
onMounted(() => {
    getSalles()
    getsPieces()
})
const addSpectacle = async () => {
    axios.post("http://localhost:8000/api/spectacles/", spectacle.value)
        .then(() => (
            router.push({ name: 'viewspectacles' })
        ))
        .catch(err => {
            console.log(error);
        })
}
</script>
<template>
    <div>
        <form @submit.prevent="addSpectacle">
            <h6>Ajout de Spectacle</h6>
            <div class="row">
                <div class="col-md-3">
                    <label for="piece" class="form-label">Pièce</label>
                    <select class="form-control" v-model="spectacle.idpiece">
                        <option v-for="piece in pieces" :value="piece.id">
                            {{ piece.titre }}
                        </option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="salle" class="form-label">Salle</label>
                    <select class="form-control" v-model="spectacle.idsalle">
                        <option v-for="salle in salles" :value="salle.id">
                            {{ salle.libelle }}
                        </option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="libsalle" class="form-label">Date du Spectacle </label>
                    <input type="text" class="form-control" id="date" v-model="spectacle.datespectacle"
                        placeholder="2012-12-12">
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