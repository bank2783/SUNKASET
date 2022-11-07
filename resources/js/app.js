

import './bootstrap';
import { createApp } from 'vue';





const app = createApp({});



import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

app.use(VueSweetalert2);








import buttonView from "../js/components/App.vue";
app.component('button-view', buttonView);

import testView from "../js/components/text.vue";
app.component('text-view', testView);

import homeView from "../js/components/home.vue";
app.component('home-view', homeView);

import product_view from "../js/components/product_view.vue";
app.component('product-view', product_view);

import cart from "../js/components/cart.vue";
app.component('cart-view', cart);

import User_profile from "../js/components/User_Profile.vue";
app.component('user-profile', User_profile);

import User_edit_profile_form from "../js/components/User_edit_profile_form.vue";
app.component('user-edit-profile-form', User_edit_profile_form);

app.mount('#app');


