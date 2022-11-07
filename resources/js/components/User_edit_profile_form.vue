<template>
<div class="container">
  <div class="row mt-2">
    <div class="col-sm-2">
        <div class="container mt-2">
            <div class="row mt-2 ">
                <div class="col" width="30">
                    <!-- รูป -->
                    <div v-if="User_data.image == '' ">
                    <img src=""  class="rounded-circle  shadow-sm" width="60" height="60" alt="...">
                    </div>
                    <div v-else>
                        <img :src="User_data.image_src"  class="rounded-circle border shadow-sm" width="60" height="60" alt="...">
                    </div>
                </div>
                <div class="col mt-4 ">
                    <p class="fw-bold text-break">{{User_data.first_name}}</p>
                </div>
            </div>
            <div class="row ">
                <div class="col mt-3 ">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center" style="background-color: #F0F0F0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg> บัญชีของฉัน</li>
                        <li class="list-group-item text-center" style="background-color: #F0F0F0">
                            <a href="profile.php" class="nav-link">แก้ไข้ข้อมูล</a>
                        </li>
                        <li class="list-group-item text-center" style="background-color: #F0F0F0">
                            <a href="order.php" class="nav-link">การซื้อของ</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-10  shadow-sm" style="background-color: white; height:440px;">
    <div  class="row mt-3 g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">ชื่อจริง</label>
    <input type="text" class="form-control" id="inputEmail4" v-model="User_data.first_name" >
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">นามสกุล</label>
    <input type="text" class="form-control" id="inputPassword4" v-model="User_data.last_name" >
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Email</label>
    <input type="Email" class="form-control" id="inputAddress" v-model="User_data.email">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">ที่อยู่</label>
    <input type="text" class="form-control" id="inputAddress2" v-model="User_data.address" >
  </div>
  <div class="col-md-4">
    <label for="inputCity" class="form-label">เบอร์โทร</label>
    <input type="text" class="form-control" id="inputCity" v-model="User_data.tel" >
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Line ID</label>
    <input type="text" class="form-control" id="inputCity" v-model="User_data.line_id" >
  </div>
  <div class="col-md-4">
    <label for="inputZip" class="form-label">รูปโปรไฟล์</label>
    <input type="file" class="form-control" id="inputZip" @change="onFileChange" >
  </div>




  <div class="col-12 ">
    <button @click="EditUserData()" class="btn btn-dark">บันทึก</button>
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


            User_data:{
                id:0,
                first_name:'',
                last_name:'',
                email:'',
                address:'',
                // image:'',
                identity_card_number:'',
                tel:'',
                line_id:'',
                image_src:''
            }
        }
    },
    methods:{
        async GetUserData(){
            const path = "../../../../storage/images/profiles/";
            const res = await axios.get('/api/user/account/profile');
            this.User_data = res.data;
            this.User_data.image_src = path + this.User_data.image;

            console.log(this.User_data.id);
        },
        EditUserData(){
            console.log(this.User_data.id);
            axios.post('/api/user/account/profile/update/'+this.User_data.id,{

                first_name:this.first_name,
                last_name:this.last_name,
                email:this.email,
                address:this.address,
                // image:this.image,
                identity_card_number:this.identity_card_number,
                tel:this.tel,
                line_id:this.line_id,

            });
        },
        onFileChange(event){
            var fileData =  event.target.files[0];
            this.image=fileData.name;
        }

    },
    mounted(){
        this.GetUserData();

    }
  }

</script>
