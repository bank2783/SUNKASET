<template>
<div class="container bg-white  shadow-sm fluid" >
<div class="container fluid">
  <div class="row mx-5  mt-2 ">
    <div class="col-sm-5 my-5  d-flex justify-content-center align-items-center  mt-4">
        <img :src="pre_data.pre_img_src" class="rounded-1 fluid mt-0" style="height:400px;width:400px;"  alt="...">
  </div>
      <div class="col-sm-7 mt-4">
            <h5 class="mx-2 fw-bold">{{pre_data.pre_name}}</h5>
              <div class="d-flex p-2 bd-highlight mt-5 ">
                <div class="col-sm-2 p-2 bd-highlight  ">
                  ราคา:
                </div>
                <div class="container fluid">
                <div class="d-flex p-2 bd-highlight text-color justify-content-center  ">
                  <h4 class="fw-bold" style="color:#1e3b37">{{pre_data.pre_price}} .-</h4>
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
      <div class="p-1  bg-light text-center mt-1">{{pre_data.pre_amount}} ชิ้น</div>
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
            <div v-if="product_add_num == pre_data.pre_amount">
                <span  class="plus">+</span>
            </div>
            <div v-if="product_add_num < pre_data.pre_amount">
                <span v-on:click="AddNumber" class="plus">+</span>
            </div>



        </div>


    </div>
  </div>
</div>
<!-- ปุ่มเพิ่มตัวเลข -->

<div class="d-flex p-2 bd-highlight mt-5 align-items-center mx-5">
  <div class="container  d-flex justify-content-center">
  <button v-on:click="AddNewOrder()" type="button" class="btn btn-success my- btn-lg rounded-0 color-white"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi  bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg> พรีออเดอร์สินค้า</button>
  </div>


</div>

</div>

  </div>

</div>
</div>


<div class="container bg-light mt-2">
        <div style="height:300px;" class="col-sm-12">
            <p class="fs-4">รายละเอียดสินค้า</p>
            <p class="text-break fs-6 ">{{pre_data.pre_description}}</p>

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
            }]

        }
    },
    methods:{
        async GetPreorderOneData(){
            const path="../../../../storage/images/products/";
            const res = await axios.get('/api/preorder/product/view/'+this.id);
            this.pre_data = res.data
            this.pre_data.pre_img_src = path + this.pre_data.pre_image;



            console.log(this.pre_data);
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

                pre_name:this.pre_data.pre_name,
                 pre_price:this.pre_data.pre_price * this.product_add_num,
                pre_amount:this.product_add_num,
                 pre_image:this.pre_data.pre_image,
                pre_product_id:this.id,
                user_id:this.value,
});
this.$swal({
title: "พรีออเดอร์สินค้าสำเร็จ!",
// timer: true,
});
            }


        }
    },
    mounted(){
        this.GetPreorderOneData();
    }
  }

</script>
