<template>
    <div class="container mt-5">
    <div class="d-flex p-2 bd-highlight  bg-white text-dark rounded-1 ">ใช้โค้ดส่วนลด!</div>
    </div>

    <div class="container mt-2">
    <div class="d-flex p-2 bd-highlight  bg-white text-dark rounded-1  align-items-center shadow-sm" style="height: 70px;">
      <div class=" mx-1 text-center" style="width:100px;">สินค้า</div>
      <div class="container ">
      <div class="row justify-content-end">
        <div class="col-6 text-center ">

        </div>
        <div class="col-2 text-center ">
        ราคา
        </div>
        <div class="col-2 text-center  ">
          จำนวน
        </div>
        <div class="col-2 text-center ">
          แอคชั่น
        </div>
      </div>
    </div>
    </div>
    </div>

    <div v-for="cart in cart_data" :key="cart" class="container mt-1 ">
        <div class=" d-flex p-2 bd-highlight  bg-white text-dark rounded-1  align-items-center shadow-sm" style="height: 150px;">
          <div class="p-2 mx-1  bd-highlight ">
              <img :src="cart.product_src"  style="height: 70px;width: 70px;" >
          </div>


          <div class="container ">
      <div class="row justify-content-start">
        <div class="col-6 text-center ">
            <p class="text-break">{{cart.product_front_descript}}</p>
        </div>
        <div class="col-6 text-center  align">

        </div>
        </div>
    </div>
    <div class="container ">
      <div class="row justify-content-end">
        <div class="col-4 text-center ">
            <p class="text-break">{{cart.total_price}}</p>
        </div>
        <div class="col-4 text-center  align">
            <p>{{cart.product_amount}}</p>
        </div>
        <div class="col-4 text-center  align">
            <p>ลบ</p>
        </div>

    </div>
    </div>


        </div>

    </div>
    <div class="container mt-2">
      <div class="d-flex p-2 bd-highlight  bg-white text-dark rounded-1 align-items-center shadow-sm" style="height: 150px;">
      <div class="container">
        <div class="row justify-content-end">
        <div class="col-2  text-end mt-2">
            ราคารวม
          </div>
          <div class="col-2 fw-bold text-center mt-2" style="color:#FF4600">
            <p>{{sum}} .-</p>
          </div>
          <div class="col-2 text-end  align-items-end ">
           <div class="d-grid gap-2">
           <button type="button" class="btn btn-dark">สั่งซื้อ</button>

            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {

    data(){

        return{
            sum:0,
            cart_data:[{
                product_front_descript:'',
                total_price:'',
                product_amount:'',
                product_img:'',
                product_src:'',
                sum_price:0,
            }]
        }
    },
    methods:{
        async GetData(){
            const path="../../../../storage/images/products/";
            const res = await axios.get('api/cart');
            this.cart_data = res.data
            this.cart_data.map(cart => cart.product_src = path + cart.product_img);

            let sum = 0;
            this.cart_data.forEach(el => {
                sum += el.total_price;
            })
            this.sum = sum;


            console.log(this.cart_data);

        }
    },
    mounted(){
        this.GetData();
    }
  }

</script>
