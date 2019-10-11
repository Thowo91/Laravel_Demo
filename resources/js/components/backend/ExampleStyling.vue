<template>
    <div>
    <h3>Styling</h3>
        <div :class="classObject" :style="styleObject">{{value}}</div>
        <button class="btn btn-sm btn-success mt-2" @click="value++">+</button>
        <button class="btn btn-sm btn-danger mt-2" @click="value--">-</button>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                value: 3,
                error: false,
            }
        },
        computed: {
            classObject: function() {
                return {
                    'red-error' : this.value > 5,
                    'green-info': this.value <= 5
                }
            },
            styleObject: function() {
                return {
                    fontSize: (this.value * 10) + 'px',
                    textAlign: 'center'
                }
            }
        }
    }
</script>

<style>
    .red-error {
        background-color: darkred;
        color: white;
    }
    .green-info {
        background-color: darkgreen;
        color: white;
    }
</style>
