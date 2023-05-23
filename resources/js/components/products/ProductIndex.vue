<template>
    <div>
        <product-filters @search="searchProducts"></product-filters>

        <div v-for="(chunk, index) in chunks" :key="index" class="row mb-4">
            <div v-for="(product, index) in chunk" :key="index" class="col-3">
                <product-card :product="product"></product-card>
            </div>
        </div>
    </div>
</template>

<script>
import ProductCard from './ProductCard.vue'
import ProductFilters from './ProductFilters.vue'


export default {
    components: {
        ProductCard,
        ProductFilters
    },
    mounted() {
        this.queryProducts()
        console.log(_.chunk(['a', 'b', 'c', 'd'], 2));
    },
    data() {
        return {
            products: [],
            search: null
        }
    },
    computed: {
        chunks () {
            return _.chunk(this.products, 4)
        }
    },
    methods: {
        queryProducts () {
            const params = {
                params: {}
            }

            if (this.search) {
                params.params = {
                    search: this.search
                }
            }

            axios.get('api/v1/products', params)
                .then(response => {
                    this.products = response.data.data
                })
                .catch(error => {
                    console.log(error);
                })
        },
        searchProducts (data) {
            this.search = data.search

            this.queryProducts()
        }
    }
}
</script>
