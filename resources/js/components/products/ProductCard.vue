<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ product.description }}</h5>
            <p class="card-text">
                Price: {{ product.price }}
            </p>
            <a :href="'/products/' + product.id" class="card-link">Show</a>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        product: {
            type: Object,
            required: true
        }
    }
}
</script>
