<template>
<div>
    <CRow>
        <CCol>
            <BreadCrumb></BreadCrumb>
            <CCard>
            <CCardHeader>
                <list-header @emitSearch="searchData()" @filterAction="filterEmitAction" ></list-header>
            </CCardHeader>
            <CCardBody class="pt-0">
                <div class="row mb-3" >
                    <div class="col-md-12" v-if="isFilter">
                        <b-form>
                            <div class="row">
                                <div class="col-md-3">
                                    <b-form-group
                                        label-cols-md="12"
                                    >
                                    <template v-slot:label>
                                    Name
                                    </template>
                                    <b-form-input
                                        size="sm"
                                        id="email"
                                        v-model="search.email"
                                        ></b-form-input>
                                    </b-form-group>
                                </div>
                                <div class="col-md-12 text-right">
                                </div>
                            </div>
                        </b-form>
                    </div>
                </div>
                <b-overlay :show='loading'>
                    <div class="overflow-auto">
                        <b-table thead-class="thead-color" emptyText="Data Not Found" small show-empty bordered hover :items="itemList" :fields="fields">
                            <template v-slot:cell(index)="data">
                                {{ (data.index +1 + pagination.slOffset) }}
                            </template>
                           
                            <template v-slot:cell(status)="data">
                                <span class="badge badge-success" v-if="data.item.status == 1">Active</span>
                                <span class="badge badge-warning" v-if="data.item.status == 0">Pending</span>
                                <span class="badge badge-danger" v-if="data.item.status == 2">Reject</span>
                            </template>
                            <template v-slot:cell(action)="data">
                                <b-button v-if="data.item.status == 0 || data.item.status == 2" title="Approve" class="ml-2 btn btn-success btn-sm" @click="changeStatus(data.item, 1)"> <i class="ri-check-line"></i> </b-button>
                                <b-button v-if="data.item.status == 1" title="pending" class="ml-2 btn btn-warning btn-sm" @click="changeStatus(data.item, 0)"> <i class="ri-close-circle-line"></i> </b-button>
                                <b-button v-if="data.item.status == 0" title="Reject" class="ml-2 btn btn-danger btn-sm" @click="changeStatus(data.item, 2)"> <i class="ri-close-circle-line"></i> </b-button>
                                <!-- <b-button title="Edit" class="ml-2 btn btn-success btn-sm" @click="editRouter(data.item, 'salon-list/create')"> <i class="ri-eye-line"></i> </b-button> -->
                            </template>
                        </b-table>
                    </div>
                </b-overlay>
                <b-pagination
                size="sm"
                v-model="pagination.currentPage"
                :total-rows="pagination.total"
                :per-page="pagination.perPage"
                @input="searchData"
                align="right"
                ></b-pagination>
            </CCardBody>
        </CCard>
        </CCol>
    </CRow>
</div>
</template>
<script>
import RestApi, { baseUrl } from '../../../config/api_config'
import iziToast from 'izitoast';
import listMixin from '../../../mixins/listMixin';

export default {
    name: 'List',
    mixins: [listMixin],
    data() {
      return {
        isFilter: false,
        search: {
            name: '',
            district_id: null
        },
        pagination: {
            perPage: 10,
            currentPage: 1,
            total: 0
        },
        editId: ''
      }
    },
    computed: {
        fields () {
            const labels = [
                { label: 'Sl No', class: 'text-center' },
                { label: 'Salon Name', class: 'text-center' },
                { label: 'Owner Name', class: 'text-center' },
                { label: 'Phone No', class: 'text-center' },
                { label: 'Status', class: 'text-center' },
                { label: 'Action', class: 'text-center' }
            ]
            let keys = []
            keys = [
            { key: 'index' },
            { key: 'salon_name' },
            { key: 'owner_name' },
            { key: 'phone_no' },
            { key: 'status' },
            { key: 'action' }
            ]
            return labels.map((item, index) => {
                return Object.assign(item, keys[index])
            })
        }
    },
    watch: {
      listReload: function (newVal) {
        if (newVal) {
            this.loadData()
        }
      }
    },
    methods: {
        toggleStatus (item, status=0) {
            RestApi.putData(baseUrl, `/salons/status/${item.id}/`, { ...item, status: status }).then(response => {
                this.$store.dispatch('mutedLoad', { listReload: true })
                iziToast.success({
                    title: 'Success',
                    message: response.message
                })
            })
        },
        loadData () {
            const params = Object.assign({}, this.search, { page: this.pagination.currentPage, per_page: this.pagination.perPage, status: [1,2] })
            this.$store.dispatch('mutedLoad', { loading: true})
            RestApi.getData(baseUrl, 'salons', params).then(response => {
                if (response.success) {
                    this.$store.dispatch('setList', response.data.data)
                    this.paginationData(response.data)
                }
                this.$store.dispatch('mutedLoad', { loading: false })
            })
        }
    }
}
</script>