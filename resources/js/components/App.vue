<template>

<div class="container bg-white shadow-sm " style="height: 600px;">
    <div class="container ">
      <div class="row mx-5 mt-2">
        <div class="col-sm-5 mt-4"><img src="{{asset('/storage/images/products/'.$product_data->product_img)}}" class="img-thumbnail" alt="..." style="height: 465px;">
      </div>
          <div class="col-sm-7 mt-4">
          {{}}
                  <div class="d-flex p-2 bd-highlight mt-5 ">
                    <div class="d-flex p-2 bd-highlight ">
                      ราคา:
                    </div>
                    <div class="container">
                    <div class="d-flex p-2 bd-highlight text-color justify-content-center  ">
                      <h4 style="color:#FF4600">฿ {{}} .-</h4>
                    </div>
                    </div>
                  </div>
                  <div class="d-flex p-2 bd-highlight mt-4">
                    <div class="d-flex p-2 bd-highlight  align-items-center">
                      <div>จำนวนคงเหลือ</div>
                    </div>
    <div class="container">
      <div class="row g-1 mt-2">
        <div class="col-3 ">
          <div class="p-1 bg-light text-center">{{}}</div>
        </div>


        <div class="col-3">



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
              <span @click="minusnumber" class="minus">-</span>
              <span class="num">{{counter}}</span>
              <span @click="addnumber" class="plus">+</span>
            </div>
        </div>
      </div>

    </div>
    <!-- ปุ่มเพิ่มตัวเลข -->
    <form action="{{route('Cart.insert')}}" method="POST">
        @csrf
    <div class="d-flex p-2 bd-highlight mt-5 align-items-center mx-5">
        <input type="hidden" name="product_id" value="{{$product_data->product_id}}">

      <input type="hidden" name="user_id" value="{{$product_data->product_price}}">
      <input type="hidden" name="product_amount" v-model="counter">
        <div class="container">
      <button type="submit" class="btn btn-light btn-lg rounded-1 " style="background-color:#E5ECE6  "><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
      <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </svg> เพิ่มไปที่รถเข็น</button>
      </div>
      <div class="container">


      <button type="submit" class="btn btn btn-light btn-lg rounded-1 " style="width: 200px; height: 50px; background-color:#E5ECE6   "> สั่งซื้อ </button>
      </div>

    </div>
</form>

    </div>


      </div>
    </div>
    </div>

</template>

<script>
export default {

    data(){
        return{
            counter:1
        }
    },
    methods:{
        addnumber(){
        this.counter++
        },
        minusnumber(){
            this.counter--
        },

        getUserData(){
            console.log("ดึงข้อมูล");
        }

    },
    mounted(){
        this.getUserData();
    }


}


</script>

<style>

</style>
