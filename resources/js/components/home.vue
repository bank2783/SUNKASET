<template>


    <div class="container mt-5 ">

        <div class="row  ">
          <div class="col-sm-2  ">Type layout</div>
            <div class="col-sm-10 ">

                    <div class="d-flex flex-row bd-highlight mb-3  flex-wrap">
                    <div v-for="product in product_data" :key="product" class="mx-1 mt-2 p-2 bd-highlight bg-light " style="width:230px;height:350px;">
                        <a class="nav-link" :href="'/product/view/'+product.id">
                        <div class="bg-dark col-sm-12" style="height:200px;">
                            <img :src="product.product_src" style="width:214px;height:200px;">
                        </div>
                        <div style="height:70px;" class="mt-1  col-sm-12">
                            <p style="font-size:13px;" class="text-break">{{product.product_front_descrip}}</p>
                        </div>
                        <div class="d-flex justify-content-center" >
                            <p class="fs-5 fw-bold" style="color:#FF3600 ;">{{product.product_price}} .-</p>
                        </div>
                        </a>
                    </div>

                    </div>

                    <Pagination :data="product_data" @pagination-change-page="getUserData"></Pagination>




    </div>

        </div>

    </div>






    </template>



    <script>
    import axios from 'axios';


    export default {
    data() {
        return {
            product_data: [{
                    id: 0,
                    product_name: "",
                    product_amount: 0,
                    product_price: 0,
                    product_detail: "",
                    product_front_descrip: "",
                    product_img: "",
                    product_src: ""
                }],
        };
    },
    mounted() {
        this.getUserData();
    },
    methods: {
        async getUserData(page = 1) {
            const path = "../../../../storage/images/products/";
            const res = await axios.get("api/home?page="+page);
            this.product_data = res.data;
            this.product_data.map(product => product.product_src = path + product.product_img);
            console.log(this.product_data);
        }
    },


}

    </script>

<style>


</style>
