<template>
    <div class="row">
        <div class="col-md-6">
            <p class="mt-1 mb-0"><strong>{{ pageTitle() | formatLabel }} {{ editId ? 'Update' : 'Create' }} </strong></p>
        </div>
        <div class="col-md-6">
            <div class="text-right">
                <button class="btn btn-sm btn-primary" @click="$router.back()">
                <i class="ri-arrow-left-circle-line"></i> Back
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'FormHeader',
    computed: {
        editId () {
        return this.$route.params.id || null;
        }
    },
    methods: {
        pageTitle () {
           return  this.$route.name;
        }
    }
}
</script>
