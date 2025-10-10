<template>
    <div>
        <div class="row">
            <div class="col-md-6">
                <p class="mt-1 mb-0"><strong>{{ pageTitle() | formatLabel }}</strong></p>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <router-link v-if="createUrl()" class="btn btn-sm btn-primary" :to="createUrl()"><i class="ri-add-circle-line"></i> Add New</router-link>
                    <button class="btn btn-sm btn-warning ml-2" @click="enableDisableFilter"><i :class=" isFilter ? 'ri-filter-off-line' : 'ri-filter-line'"></i></button>
                    <b-button v-if="isFilter" class="ml-4" @click="search" size="sm" type="submit" variant="primary">  <i class="ri-search-line"></i> Search</b-button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ListHeader',
    props: ['createUri'],
    data() {
      return {
        isFilter: false
      }
    },
    methods: {
        pageTitle () {
           return  this.$route.name;
        },
        createUrl () {
            if (!this.createUri) return;
            return  this.$route.path + this.createUri;
        },
        enableDisableFilter () {
            this.isFilter = !this.isFilter
            this.$emit('filterAction', this.isFilter)
        },
        search () {
            this.$emit('emitSearch')
        }
    }
}
</script>
