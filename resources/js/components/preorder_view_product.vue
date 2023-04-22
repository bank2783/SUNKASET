<template>

<div class="container bg-white  shadow-sm fluid" >
        <div class="row">


    <div class="border-end col-sm-5 col-12 pt-3 pb-2 px-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <img  :src="pre_data[0].pre_img_src" id="mainImage" class="img-fluid rounded-1" alt="..." style="height: 400px; width: 400px;">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 d-flex justify-content-center my-3">
                <div v-bind:key="images" v-for="images in pre_images.image_name">

                    <div class=" col-12 px-2">
                        <div class="subImage-border">

                            <img
                            @mouseover="changeMainImage(images.image_name)"
                            @mouseleave="resetMainImage()"
                            :src="'../../../../storage/images/preorders/'+images.image_name"
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
                    {{pre_data[0].pre_name}}
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-4 d-flex align-items-center fs-5 text-secondary">
                    ราคา :
                </div>
                <div class="col-8 d-flex align-items-center justify-content-start fs-3" style="color:#ff6600;">
                    {{ pre_data[0].pre_price}} .-
                </div>

            </div>
            <div class="row mt-5">
                <div class="col-3 d-flex align-items-center fs-5 text-secondary">
                    จำนวนคงเหลือ :
                </div>
                <div class="col-2 d-flex align-items-center justify-content-start fs-5 text-secondary">
                    {{ pre_data[0].pre_amount }}
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
                <div v-if="product_add_num == pre_data.pre_amount">
                    <span  class="plus">+</span>
                </div>
                <div v-if="product_add_num < pre_data[0].pre_amount">
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

<div class="container bg-light mt-2">
        <div style="height:300px;" class="col-sm-12">
            <p class="fs-4">รายละเอียดสินค้า</p>
            <p class="text-break fs-6 ">{{pre_data[0].pre_description}}</p>

        </div>


    </div>
</template>

<script>
import axios from 'axios';
export default {
    props:['id','value'],
    data(){
        return{
            sum:0,
            product_add_num:1,
            pre_data:[{
                id:0,
                pre_name:'',
                pre_total_price:'',
                pre_price:0,
                pre_amount:0,
                pre_description:'',
                pre_image:'',
                pre_img_src:''
            }],
            pre_images:[{
                image_name:[]
            }

            ],


        }
    },
    methods:{
        async GetPreorderOneData(){
            const path="../../../../storage/images/preorders/";
            const res = await axios.get('/api/preorders/product/view/'+this.id);
            this.pre_data = res.data
            this.pre_data[0].pre_img_src = path + this.pre_data[0].pre_image;
            this.pre_images.image_name = this.pre_data[1];
            console.log(this.pre_data.TransportData.id);
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
                axios.post('/api/preorder/add',{

                pre_name:this.pre_data[0].pre_name,
                 pre_price:this.pre_data[0].pre_price * this.product_add_num,
                pre_amount:this.product_add_num,
                pre_image:this.pre_data[0].pre_image,
                pre_product_id:this.id,
                user_id:this.value,
        }


);
this.$swal({
title: "พรีออเดอร์สินค้าสำเร็จ!",
// timer: true,
});


}


        },

        changeMainImage(images) {
                const path="../../../../storage/images/preorders/";
                this.pre_data[0].pre_img_src = path + images;
              },
        resetMainImage() {
                const path="../../../../storage/images/preorders/";
                this.pre_data[0].pre_img_src = path + this.pre_data[0].pre_image;
        },

    },
    mounted(){
        this.GetPreorderOneData();
    }
  }

</script>
<style scoped>

.subImage-border:hover {
  border-color: #28a745;
  border: 3px solid #28a745;
}
.subImage-border{
    border: 1px solid #cdcecf;
}


</style>
