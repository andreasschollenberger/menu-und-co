export const routes = [
    {
        path: "/",
        component: () => import("./pages/Home.vue"),
    },

    {
        path: "/rezepte",
        component: () => import("./pages/Rezepte.vue"),
    },

    {
        path: "/produkte",
        component: () => import("./pages/Produkte.vue"),
    },

    {
        path: "/restaurants",
        component: () => import("./pages/Restaurant.vue"),
    },

    {
        path: "/tipps",
        component: () => import("./pages/Tipps.vue"),
    },

    {
        path: "/über-uns",
        component: () => import("./pages/Überuns.vue"),
    },


    {
        path: "/agb",
        component: () => import("./pages/AGB.vue"),
    },

    {
        path: "/registrierung",
        component: () => import("./pages/Registrierung.vue"),
    },

    {
        path: "/dashboard",
        component: () => import("./pages/User.vue"),
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
        path: "/registrierung-firma",
        component: () => import("./pages/RegistrierungFirma.vue"),
    },

    {
        path: "/edit-user",
        component: () => import("./pages/EditUser.vue"),
    },

    {
        path: "/create-rezept",
        component: () => import("./pages/CreateRezept.vue"),
    },

    {
        name: 'edit-rezept',
        path: "/edit-rezept/:id",
        component: () => import("./pages/EditRezept.vue"),
    },

    {
        path: "/edit-firma",
        component: () => import("./pages/EditFirma.vue"),
    },

    {
        path: "/edit-produkt",
        component: () => import("./pages/EditProdukt.vue"),
    },

    {
        path: "/edit-restaurant",
        component: () => import("./pages/EditRestaurant.vue"),
    },

    {
        path: "/create-werbung",
        component: () => import("./pages/CreateWerbung.vue"),
    },

    
    {
        path: "/login",
        component: () => import("./pages/Auth/Login.vue"),
    },

];




