<template>

    <button @click="addnumber()">click test</button>
        <p>test {{ counter }} times.</p>

    </template>

    <script>
    export default {

        data(){
            return{
                counter: 1
            }
        },
        methods:{

            addnumber(){

                this.counter++

            }
        }

    }


    </script>

    <style>

    </style>
