<template>
<div>
    <CRow>
        <CCol>
            <BreadCrumb></BreadCrumb>
            <CCard>
            <CCardHeader>
                <list-header @emitSearch="searchData()" @filterAction="filterEmitAction" :createUri="'/create'"></list-header>
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
                            { key: 'salon_name' },
                            { key: 'salon_mobile' },
                            { key: 'address' },
                            { key: 'customer_name' },
                            { key: 'customer_mobile' },
                            { key: 'seat_no' },
                            { key: 'barber' },
                            { key: 'service_start' },
                            { key: 'service_end' },
                            <template v-slot:cell(salon_name)="data">
                                {{ data.item.salon.salon_name }}
                            </template>
                            <template v-slot:cell(salon_mobile)="data">
                                {{ data.item.salon.phone_no }}
                            </template>
                            <template v-slot:cell(address)="data">
                                {{ data.item.salon.address }}
                            </template>
                            <template v-slot:cell(customer_name)="data">
                                {{ data.item.user.name }}
                            </template>
                            <template v-slot:cell(customer_mobile)="data">
                                {{ data.item.user.mobile_no }}
                            </template>
                            <template v-slot:cell(seat_no)="data">
                                {{ data.item.seat.seat_no }}
                            </template>
                            <template v-slot:cell(barber)="data">
                                {{ data.item.seat.service_person_name }}
                            </template>
                            <template v-slot:cell(barber_mobile)="data">
                                {{ data.item.seat.phone_no }}
                            </template>
                            <template v-slot:cell(status)="data">
                                <span class="badge badge-success" v-if="data.item.status == 2">Active</span>
                                <span class="badge badge-warning" v-if="data.item.status == 1">Pending</span>
                                <span class="badge badge-danger" v-if="data.item.status == 4">Reject</span>
                            </template>
                            <template v-slot:cell(action)="data">
                                <b-button v-if="data.item.status == 1 || data.item.status == 4" title="Approve" class="ml-2 btn btn-success btn-sm" @click="changeStatus(data.item, 2)"> <i class="ri-check-line"></i> </b-button>
                                <b-button v-if="data.item.status == 2" title="pending" class="ml-2 btn btn-warning btn-sm" @click="changeStatus(data.item, 1)"> <i class="ri-close-circle-line"></i> </b-button>
                                <b-button v-if="data.item.status == 1" title="Reject" class="ml-2 btn btn-danger btn-sm" @click="changeStatus(data.item, 4)"> <i class="ri-close-circle-line"></i> </b-button>
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
import RestApi, { baseUrl } from '../../config/api_config'
import iziToast from 'izitoast';
import listMixin from '../../mixins/listMixin';

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
                { label: 'Salon Mobile', class: 'text-center' },
                { label: 'Address', class: 'text-center' },
                { label: 'Customer Name', class: 'text-center' },
                { label: 'Customer Mobile', class: 'text-center' },
                { label: 'Seat No', class: 'text-center' },
                { label: 'Barber', class: 'text-center' },
                { label: 'Barber Mobile', class: 'text-center' },
                { label: 'Service Time', class: 'text-center' },
                { label: 'Status', class: 'text-center' },
                { label: 'Action', class: 'text-center' }
            ]
            let keys = []
            keys = [
            { key: 'index' },
            { key: 'salon_name' },
            { key: 'salon_mobile' },
            { key: 'address' },
            { key: 'customer_name' },
            { key: 'customer_mobile' },
            { key: 'seat_no' },
            { key: 'barber' },
            { key: 'barber_mobile' },
            { key: 'service_time' },
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
        toggleStatus (item, status) {
            RestApi.putData(baseUrl, `/service-requests/status/${item.id}/`, { ...item, status:status }).then(response => {
                this.$store.dispatch('mutedLoad', { listReload: true })
                iziToast.success({
                    title: 'Success',
                    message: response.message
                })
            })
        },
        loadData () {
            const params = Object.assign({}, this.search, { page: this.pagination.currentPage, per_page: this.pagination.perPage, status: 1 })
            this.$store.dispatch('mutedLoad', { loading: true})
            RestApi.getData(baseUrl, 'service-requests', params).then(response => {
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