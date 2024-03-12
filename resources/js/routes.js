import addSalle from "./components/addSalle.vue";
import editsalle from "./components/editsalle.vue";
import sallesList from "./components/sallesList.vue";

export const routes = [
    {
        name: 'sallesList',
        path: '/',
        component: sallesList
    },
    {
        name: 'editsalle',
        path: '/editsalle/:id',
        component: editsalle
    },
    {
        name: 'addSalle',
        path: '/addSalle',
        component: addSalle
    }
]
