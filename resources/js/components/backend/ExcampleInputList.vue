<template>
    <div>
    <h3>Input List</h3>
        <ul>
            <li v-for="todo in items">{{todo}}</li>
        </ul>

        <input type="text" v-model="item">
        <button @click="items.push(item)" >Add Item</button>
    </div>
</template>

<script>
    export default {

        data: function() {
            return {
                item: '',
                items: []
            }
        }
    }
</script>
