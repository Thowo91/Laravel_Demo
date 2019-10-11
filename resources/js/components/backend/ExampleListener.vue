<template>
    <div>
    <h3>Listener</h3>
        <div class="row">
            <div class="col-3">
                <label for="title">Titel</label>
                <input id="title" type="text" disabled :placeholder="title">
            </div>
            <div class="col-4">
                <label for="description">Description</label>
                <input id="description" type="text" disabled :placeholder="description">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                title: '',
                description: ''
            }
        },
        mounted() {
            this.$eventBus.$on('emitted-data', ({
                title,
                description
            }) => {
                this.title = title;
                this.description = description;
            })
        }
    }
</script>
