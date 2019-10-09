<template>
    <div class="col-lg-6 col-xl-4">
        <div class="card mb-2">
            <div class="card-header"><a :href='url'>{{titel}}</a></div>
            <div class="card-body">
                <h5 class="card-title">{{article.name}}</h5>
                <div class="card-text">
                    <p>Kategorie: {{article.categorie.name}}</p>
                    <p>Herstelle: {{article.manufacturer.name}}</p>
                    <template v-for="tag in article.tags">
                        <span class="badge badge-pill badge-info" style="color:#fff">{{tag.name}}</span>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       props : {
           article : Object,
           url : String
       },
        computed : {
           titel : function() {
               return this.article.id + ' | ' + this.article.name
           }
        }
    }
</script>
