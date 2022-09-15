export default [
    {
        path     : '/',
        name     : 'HomePage',
        component: () => import('./Home.vue'),
        meta     : {
            title: 'Home Page',
        }
    }, {
        path     : '/report-1',
        name     : 'Report1',
        component: () => import('./report/Report1.vue'),
        meta     : {
            title: 'Report 1',
        }
    }, {
        path     : '/report-2',
        name     : 'Report2',
        component: () => import('./report/Report2.vue'),
        meta     : {
            title: 'Report 2',
        }
    },
];
