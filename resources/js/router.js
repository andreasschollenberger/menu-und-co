export const routes = [
    {
        name: 'home',
        path: "/",
        component: () => import("./pages/Home.vue"),
    },

    {
        name: 'rezepte',
        path: "/rezepte",
        component: () => import("./pages/Rezepte.vue"),
    },

    {
        name: 'produkte',
        path: "/produkte",
        component: () => import("./pages/Produkte.vue"),
    },

    {
        name: 'restaurants',
        path: "/restaurants",
        component: () => import("./pages/Restaurant.vue"),
    },

    {
        name: 'tipps',
        path: "/tipps",
        component: () => import("./pages/Tipps.vue"),
    },

    {
        name: 'über-uns',
        path: "/über-uns",
        component: () => import("./pages/Überuns.vue"),
    },


    {
        name: 'agb',
        path: "/agb",
        component: () => import("./pages/AGB.vue"),
    },

    {
        name: 'registrierung',
        path: "/registrierung",
        component: () => import("./pages/Registrierung.vue"),
    },

    {
        name: 'dashboard',
        path: "/dashboard",
        component: () => import("./pages/Dashboard.vue"),
        meta: {
            requiresAuth: true,
        },
    },

    {
        name: 'rezept',
        path: "/rezept/:id",
        component: () => import("./pages/Rezept.vue"),
    },

    {
        name: 'registrierung-firma',
        path: "/registrierung-firma",
        component: () => import("./pages/RegistrierungFirma.vue"),
    },

    {
        name: 'edit-user',
        path: "/edit-user",
        component: () => import("./pages/EditUser.vue"),
    },

    {
        name: 'create-rezept',
        path: "/create-rezept",
        component: () => import("./pages/CreateRezept.vue"),
    },

    {
        name: 'edit-rezept',
        path: "/edit-rezept/:id",
        component: () => import("./pages/EditRezept.vue"),
    },

    {
        name: 'edit-firma',
        path: "/edit-firma",
        component: () => import("./pages/EditFirma.vue"),
    },

    {
        name: 'edit-produkt',
        path: "/edit-produkt",
        component: () => import("./pages/EditProdukt.vue"),
    },

    {
        name: 'edit-restaurant',
        path: "/edit-restaurant",
        component: () => import("./pages/EditRestaurant.vue"),
    },

    {
        name: 'create-werbung',
        path: "/create-werbung",
        component: () => import("./pages/CreateWerbung.vue"),
    },

    
    {
        name: 'login',
        path: "/login",
        component: () => import("./pages/Auth/Login.vue"),
    },

    {
        name: 'admin',
        path: "/admin",
        component: () => import("./pages/Admin.vue"),
    },

];




