<template>
    <div>
        <input class="form-control" type="search" name="search" id="search" v-model="search">
        <button type="button" @click="dispatchSearch">Search</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            search: null
        }
    },
    emits: ['search'],
    methods: {
        dispatchSearch () {
            this.$emit('search', {
                search: this.search
            })
        }
    },
}
</script>
