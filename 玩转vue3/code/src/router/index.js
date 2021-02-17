import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'

const routes = [{
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/about',
        name: 'About',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () =>
            import ( /* webpackChunkName: "about" */ '../views/About.vue')
    },
    {
        path: '/todoList',
        name: 'todoList',
        component: () =>
            import ('../views/TodoList.vue')
    },
    {
        path: '/markRaw',
        name: 'markRaw',
        component: () =>
            import ('../views/markRaw.vue')
    },
    {
        path: '/counter',
        name: 'Counter',
        component: () =>
            import ('../views/TestCounter.vue')
    },
    {
        path: '/parent',
        name: 'Parent',
        component: () =>
            import ('../views/Parent.vue')
    },
    {
        path: '/slot',
        name: 'Slot',
        component: () =>
            import ('../views/SlotName.vue')
    },
    {
        path: '/parent_v1',
        name: 'parent_v1',
        component: () =>
            import ('../views/parent_v1.vue')
    },
    {
        path: '/drag',
        name: 'drag',
        component: () =>
            import ('../views/kDragTest.vue')
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router