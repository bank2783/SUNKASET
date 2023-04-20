<template>

</template>

<script>

export default {
    props:['id'],
    data(){
        return{
        user_data:{
                id:0,
                first_name:'',
                last_name:'',
                email:'',
                address:'',
                image:'',
                identity_card_number:'',
                tel:0,
                line_id:'',
                image_src:'',
                image_change:''
            }
        }
    },
    methods:{
        async GetUserData(){
            const path = "../../../../storage/images/profiles/";
            const res = await axios.get('/api/user/account/profile/'+this.id);
            this.user_data = res.data;
            this.user_data.image_src = path + this.user_data.image;

            console.log(this.user_data.id);
        },
        submit(){
            console.log(this.user_data.id);
            axios.post('/api/user/account/profile/update/'+this.id,
                 this.user_data



            )


        },
        onFileChange(event){
            var fileData =  event.target.files[0];
            this.user_data.image_change = fileData.name;
        }

    },
    mounted(){
        this.GetUserData();

    },

  }

</script>
