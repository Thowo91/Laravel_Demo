<template>
    <div>
    <h3>Computed Properties</h3>

        <input type="text" v-model="price">
        <div>Tax {{moneyFormat(tax)}}</div>
        <div>Total {{moneyFormat(total)}}</div>
    </div>
</template>

<script>
    export default {

        data: function() {
            return {
                price: 100
            }
        },
        computed: {
            tax: function() {
                return this.price * 0.1;
            },
            total: function() {
                return parseInt(this.price) + this.tax;
            }
        },
        methods: {
            moneyFormat: function(price) {
                return price + ' €';
            }
        }
    }
</script>
