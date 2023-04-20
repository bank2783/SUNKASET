<template>

</template>

<script>
import {computed} from 'vue'
import { userGeolocation } from '../useGeolocation';
export default {
    name:'google_map',
    setup(){
        const { coords } = useGeolocation()
            const currPos = computed(()=>({
                lat: coords.value.latitude,
                lat: coords.value.longitude

            }))
        return{



        }
    },
    methods:{

    }
  }

</script>
