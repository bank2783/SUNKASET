<template>



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
