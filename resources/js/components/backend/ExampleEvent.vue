<template>
    <div>
    <h3>Event</h3>
        <div class="row">
            <div class="col-3">
                <label for="title">Titel</label>
                <input id="title" type="text" v-model="article.title">
            </div>
            <div class="col-4">
                <label for="description">Description</label>
                <input id="description" type="text" v-model="article.description">
            </div>
            <div class="col-5">
                <button class="btn btn-primary" @click="submit()">Emit Data</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                article: {
                    title: '',
                    description: ''
                }
            }
        },
        methods: {
            submit: function() {
                this.$eventBus.$emit('emitted-data', this.article);
                this.article = {};
            }
        }
    }
</script>
