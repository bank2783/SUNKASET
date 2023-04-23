

import './bootstrap';
import { createApp } from 'vue';
// import Swal from 'sweetalert2'





const app = createApp({});



import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

app.use(VueSweetalert2);








// import buttonView from "../js/components/App.vue";
// app.component('button-view', buttonView);

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

// import preorder_view from "../js/components/Preorder.vue";
// app.component('preorder-view',preorder_view);

import preorder_view_product from "../js/components/preorder_view_product.vue";
app.component('preorder-view-product',preorder_view_product);

import Profile_menu_list from "../js/components/Profile_menu_list.vue";
app.component('profile-menu-list',Profile_menu_list);

import user_preorder_view from "../js/components/user_preorder_view.vue";
app.component('preorder-list-view',user_preorder_view);

import google_map from "../js/components/google_map.vue";
app.component('google-map-view',google_map);

// window.successMessage = function(){
//     Swal.fire('Good job!', 'You clicked the button!', 'success')
// }

import successMessage2 from "../js/successMessage";
window.successMessage = successMessage2



app.mount('#app');


