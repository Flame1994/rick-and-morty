import Home from '../views/Home.vue';
import Location from '../views/Location.vue';
import Episode from '../views/Episode.vue';
import Character from '../views/Character.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'episode',
        path: '/episode',
        component: Episode
    },
    {
        name: 'location',
        path: '/location',
        component: Location
    },
    {
        name: 'character',
        path: '/character',
        component: Character
    },
];
