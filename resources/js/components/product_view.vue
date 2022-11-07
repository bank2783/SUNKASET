<template>
<div class="container bg-white shadow-sm " style="height: 600px;">
<div class="container ">
  <div class="row mx-5 mt-2">
    <div class="col-sm-5 mt-4 "><img :src="product_data.product_src" style="height:400px;width:400px;"  alt="...">
  </div>
      <div class="col-sm-7 mt-4">
            <h4 class="mx-2 fw-bold">{{product_data.product_front_descrip}}</h4>
              <div class="d-flex p-2 bd-highlight mt-5 ">
                <div class="col-sm-2 p-2 bd-highlight  ">
                  ราคา:
                </div>
                <div class="container">
                <div class="d-flex p-2 bd-highlight text-color justify-content-center  ">
                  <h4 class="fw-bold" style="color:#FF4600">{{product_data.product_price}} .-</h4>
                </div>
                </div>
              </div>
              <div class="d-flex p-2 bd-highlight mt-4">
                <div class="col-sm-2 p-2 bd-highlight ">
                  <div>คงเหลือ</div>
                </div>
<div class="container">
  <div class="row g-1 ">
    <div class="col-3">
      <div class="p-1  bg-light text-center mt-1">{{product_data.product_amount}} ชิ้น</div>
    </div>


  </div>
</div>
      </div>

<div class="d-flex p-2 bd-highlight mt-5">
  <div class="d-flex p-2 bd-highlight  align-items-center">
    <div>จำนวน</div>
  </div>

  <!-- ปุ่มเพิ่มตัวเลข -->
  <div class="container">
    <div class="d-flex p-2 bd-highlight text-color  justify-content-start">
        <div class="warpper">
            <div v-if="product_add_num ==1">
                <span  class="minus">-</span>
            </div>
            <div v-if="product_add_num > 1">
                <span v-on:click="MinusNumber" class="minus">-</span>
            </div>
            <span class="num">{{product_add_num}}</span>
            <div v-if="product_add_num == product_data.product_amount">
                <span  class="plus">+</span>
            </div>
            <div v-if="product_add_num < product_data.product_amount">
                <span v-on:click="AddNumber" class="plus">+</span>
            </div>



        </div>


    </div>
  </div>
</div>
<!-- ปุ่มเพิ่มตัวเลข -->

<div class="d-flex p-2 bd-highlight mt-5 align-items-center mx-5">
  <div class="container">
  <button v-on:click="AddNewOrder()" type="button" class="btn btn-light btn-lg rounded-1 " style="background-color:#E5ECE6  "><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg> เพิ่มไปที่รถเข็น</button>
  </div>
  <div class="container">
  <a type="button" class="btn btn btn-light btn-lg rounded-1 " style="width: 200px; height: 50px; background-color:#E5ECE6"> สั่งซื้อ </a>
  </div>

</div>

</div>

  </div>

</div>
</div>
    <div class="container bg-light mt-2">
        <div style="height:300px;" class="col-sm-12">
            <p class="fs-4">รายละเอียดสินค้า</p>
            <p class="text-break fs-6 ">{{product_data.product_detail}}</p>
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
                product_src:''
            }],

        }
    },
    methods:{
        async GetData(){
            const path="../../../../storage/images/products/";
            const res = await axios.get('/api/product/view/'+this.id);
            this.product_data = res.data
            this.product_data.product_src = path + this.product_data.product_img;
            console.log(this.value);
        },
        AddNumber(){
            this.product_add_num++
        },
        MinusNumber(){
            this.product_add_num--
        },
        AddNewOrder(){
            axios.post('/api/order/cart',{
                product_id:this.id,
                user_id:this.value,
                product_front_descrip:this.product_data.product_front_descrip,
                total_price:this.product_add_num * this.product_data.product_price,
                product_amount:this.product_add_num,
                product_img:this.product_data.product_img

            });

            this.$swal({
                title: "เพิ่มไปที่รถเข็นสำเร็จ!",
                // timer: true,
            });
        },
        AlertSuccess(){

        }
    },
    mounted(){
        this.GetData()
     },

  }

</script>
