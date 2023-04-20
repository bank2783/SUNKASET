<template>
<div class="container">
  <div class="row mt-2">
    <div class="col-md-2">
        <div class="container mt-2">
            <div class="row mt-2 border " >
                <div class="col-6 ">
                    <!-- รูป -->
                    <div v-if="User_data.image == '' ">
                    <img src=""  class="rounded-circle  shadow-sm" width="60" height="60" alt="...">
                    </div>
                    <div v-else>
                        <img :src="User_data.image_src"  class="rounded-circle border shadow-sm" width="60" height="60" alt="...">
                    </div>
                </div>
                <div class="col-6  mt-4 ">
                    <p class="fw-bold text-break">{{User_data.first_name}}</p>
                </div>
            </div>
            <div class="row ">
                <div class="col mt-3 ">
                    <profile-menu-list></profile-menu-list>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-10  shadow-sm" style="background-color: white; height:440px;">
    <form class="row mt-3 g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">ชื่อจริง</label>
    <input type="text" class="form-control" id="inputEmail4" :placeholder="User_data.first_name">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">นามสกุล </label>
    <input type="text" class="form-control" id="inputPassword4" :placeholder="User_data.last_name">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Email</label>
    <input type="Email" class="form-control" id="inputAddress" :placeholder="User_data.email">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">ที่อยู่</label>
    <input type="text" class="form-control" id="inputAddress2" :placeholder="User_data.address">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">เบอร์โทร</label>
    <input type="text" class="form-control" id="inputCity"  :placeholder="User_data.tel">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Line ID</label>
    <input type="text" class="form-control" id="inputCity"  :placeholder="User_data.line_id">
  </div>

  <div class="col-12 ">

    <a href="profile/edit" class="btn btn-dark ">แก้ไข</a>
  </div>

</form>
    </div>

  </div>
</div>


</template>

<script>

export default {
    props:['id'],
    data(){
        return{
            User_data:[{
                id:0,
                first_name:'',
                last_name:'',
                email:'',
                address:'',
                image:'',
                identity_card_number:'',
                tel:'',
                line_id:'',
                image_src:''

            }],
        }
    },
    methods:{
        async GetUserData(){
            const path = "../../../../storage/images/profiles/";
            const res = await axios.get('/api/user/account/profile/'+this.id);
            this.User_data = res.data;
            this.User_data.image_src = path + this.User_data.image;
            console.log(this.User_data);
        },
        showid(){
            console.log(this.id)
        }
    },
    mounted(){
        this.GetUserData();
        this.showid();
    }
  }

</script>
