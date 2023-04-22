<template>
<ul class="list-group  list-group-flush rounded-1">
                        <li class="menu-list list-group-item text-center" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg> <a class="nav-link" href="/user/account/profile">บัญชีของฉัน</a>
                        </li>
                        <li class="menu-list list-group-item text-center rounded-1 mt-1" >
                            <a href="/user/acount/by-product-confirm-list" class="nav-link">รายการสั่งซื้อสินค้า</a>
                        </li>
                        <li class="menu-list list-group-item text-center rounded-1 mt-1" >
                            <a href="/user/account/profile/edit" class="nav-link">แก้ไข้ข้อมูล</a>
                        </li>
                        <li class="menu-list list-group-item text-center rounded-1 mt-1" >
                            <a href="/user/acount/preorder" class="nav-link">รายการพรีออเดอร์</a>
                        </li>
                        <li class="menu-list list-group-item text-center rounded-1 mt-1" >
                            <a href="/user/acount/view-order-must-get" class="nav-link">พรีออเดอร์ที่ต้องได้รับ</a>
                        </li>

                        <li class="menu-list list-group-item text-center rounded-1 mt-1">
                            <a href="/user/acount/bought-histories" class="nav-link">ประวัติการซื้อของฉัน</a>
                            
                        </li>
                        

</ul>
</template>

<script>
export default {

    data(){
        return{

        }
    },
    methods:{

    }
  }

</script>

<style scoped>
    .menu-list:hover{
        background-color: #28a745;
        color:white;
        
    }
</style>