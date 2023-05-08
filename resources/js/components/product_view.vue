<template>
    <div class="container bg-white  shadow-sm fluid" >
        <div class="row">


    <div class="border-end col-sm-5 col-12 pt-3 pb-2 px-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <img  :src="product_data[0].product_src" id="mainImage" class="img-fluid rounded-1" alt="..." style="height: 400px; width: 400px;">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 d-flex justify-content-center my-3">
                <div v-bind:key="images" v-for="images in product_images.image_name">

                    <div class=" col-12 px-2">
                        <div class="subImage-border">

                            <img
                            @mouseover="changeMainImage(images.image_name)"
                            @mouseleave="resetMainImage()"
                            :src="'../../../../storage/images/products/'+images.image_name"
                            class="subImage img-fluid"
                            alt="..."
                            style="height: 80px;width: 80px;">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="col-sm-7">
            <div class="row">
                <div class="col-12 d-flex align-items-center fs-2">
                    {{product_data[0].product_front_descrip}}
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-4 d-flex align-items-center fs-5 text-secondary">
                    ราคา :
                </div>
                <div class="col-8 d-flex align-items-center justify-content-start fs-3" style="color:#ff6600;">
                    {{ product_data[0].product_price}} .-
                </div>

            </div>
            <div class="row mt-5">
                <div class="col-3 d-flex align-items-center fs-5 text-secondary">
                    จำนวนคงเหลือ :
                </div>
                <div class="col-2 d-flex align-items-center justify-content-start fs-5 text-secondary">
                    {{ product_data[0].product_amount }}
                </div>
                <div class="col-7 d-flex align-items-center justify-content-start fs-5 text-secondary">
                    ชิ้น
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-3 d-flex align-items-center justify-content-start fs-5 text-secondary">
                    จำนวน :
                </div>

                    <div class="warpper col-3">
                <div v-if="product_add_num == 1">

                    <span  class="minus">-</span>
                </div>
                <div v-if="product_add_num > 1">
                    <span v-on:click="MinusNumber" class="minus">-</span>
                </div>
                <span class="num">{{product_add_num}}</span>
                <div v-if="product_add_num == product_data[0].product_amount">
                    <span  class="plus">+</span>
                </div>
                <div v-if="product_add_num < product_data[0].product_amount">
                    <span v-on:click="AddNumber" class="plus">+</span>
                </div>

                </div>
                <div class="col-6 d-flex align-items-center justify-content-start  fs-5 text-secondary">
                    ชิ้น
                </div>
            </div>



            <div class="row mt-5">
                <div class="col-12 d-flex justify-content-center mt-5">
                    <button v-on:click="AddNewOrder()" class="btn btn-success rounded-0 ">เพิ่มไปที่รถเข็น</button>
                </div>
            </div>


        </div>
    </div>


    </div>

    </template>

    <script>



     import axios from 'axios';


    export default {


        props:['id','value'],

        data(){


            return{
                product_add_num:1,
                product_data:[{
                    id:0,
                    product_name:'',
                    product_amount:0,
                    product_price:0,
                    product_detail:'',
                    product_img:'',
                    product_front_descrip:'',
                    product_src:'',


                }],
                product_main_image:[{
                    main_image_src:''
                }],
                product_images:[

                ],
                product_one_data:[{

                }

                ],
                isHovering: null,

            }
        },
        methods:{
            async GetData(){
                const path="../../../../storage/images/products/";
                const res = await axios.get('/api/product/view/'+this.id);
                this.product_data = res.data



                this.product_data[0].product_src = path + this.product_data[0].product_img
                this.product_images.image_name = this.product_data[1]
                console.log(this.product_data)

            },

            changeMainImage(images) {
                const path="../../../../storage/images/products/";
                this.product_data[0].product_src = path + images;

                },
            resetMainImage() {
                const path="../../../../storage/images/products/";
                this.product_data[0].product_src = path + this.product_data[0].product_img

            },



            AddNumber(){
                this.product_add_num++
            },
            MinusNumber(){
                this.product_add_num--
            },
            AddNewOrder(){
                if(this.value == 0){
                    window.location.href = '/login';
                }else{
                    axios.post('/api/order/cart',{
                    product_id:this.id,
                    user_id:this.value,
                    product_front_descrip:this.product_data[0].product_front_descrip,
                    total_price:this.product_add_num * this.product_data[0].product_price,
                    product_amount:this.product_add_num,
                    product_img:this.product_data[0].product_img,
                    market_id:this.product_data[0].market_id,
                });

                this.$swal({
                    title: "เพิ่มไปที่รถเข็นสำเร็จ!",
                    // timer: true,
                });
                }

            },
            AlertSuccess(){

            }
        },
        mounted(){
            this.GetData()

         },

      }

    </script>

<style scoped>

.subImage-border:hover {
  border-color: #28a745;
  border: 3px solid #be2a16;
  border-radius: 3px;
}
.subImage-border{
    border: 1px solid #cdcecf;
}


</style>

