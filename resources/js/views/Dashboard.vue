<template>
  <div>
    <CRow>
      <CCol sm="12" md="12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <router-link  to="/"> <i class="ri-home-8-line"></i> </router-link></li>
                <li class="breadcrumb-item"><router-link  to="dashboard">Dashboard</router-link></li>
            </ol>
        </nav>
        <CCard >
            <CCardHeader>
                <strong>Salon Summary</strong>
            </CCardHeader>
            <CCardBody>
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card bg-success text-light m-0">
                            <div class="card-body d-flex align-items-center">
                                <div>
                                    <div class="font-weight-bold"> Total Booking </div>
                                    <div class="text-value">{{ parseFloat(formData.total_bookings || 0) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card bg-gradient-info text-light m-0">
                            <div class="card-body d-flex align-items-center">
                                <div>
                                    <div class="font-weight-bold"> Total Salon </div>
                                    <div class="text-value">{{ parseFloat(formData.total_salons || 0) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card bg-gradient-warning text-light m-0">
                            <div class="card-body d-flex align-items-center">
                                <div>
                                    <div class="font-weight-bold"> Total Customer  </div>
                                    <div class="text-value">{{ parseFloat(formData.total_users || 0) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card bg-gradient-danger text-light m-0">
                            <div class="card-body d-flex align-items-center">
                                <div>
                                    <div class="font-weight-bold"> Total Services</div>
                                    <div class="text-value">{{ parseFloat(formData.total_services || 0) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </CCardBody>
        </CCard>
      </CCol>
    </CRow>
    <CRow>
      <CCol sm="12" md="6">
        <CCard >
            <CCardHeader>
                <strong>Salon Summary</strong>
            </CCardHeader>
            <CCardBody>
                <apexchart height="320" type="bar" :options="options" :series="series"></apexchart>
            </CCardBody>
        </CCard>
      </CCol>
      <CCol sm="12" md="6">
        <CCard >
            <CCardHeader>
                <strong>Service Progress</strong>
            </CCardHeader>
            <CCardBody>
                <apexchart height="320" type="line" :options="options" :series="series"></apexchart>
            </CCardBody>
        </CCard>
      </CCol>
    </CRow>
  </div>
</template>

<script>
import topTen from '../components/dashboard/top-ten.vue'
import RestApi, { baseUrl } from '../config/api_config'
export default {
  name: 'Dashboard',
  components: {
    topTen
  },
  data () {
    return {
      selected: 'Month',
      formData: {
        "total_users": 0,
        "total_salons": 0,
        "total_services": 0,
        "total_bookings": 0
      },
      options: {
        chart: {
          id: 'vuechart-example'
        },
        xaxis: {
          categories: ['01 Aprl 2025','02 Aprl 2025','03 Aprl 2025','04 Aprl 2025','05 Aprl 2025','05 Aprl 2025','05 Aprl 2025','05 Aprl 2025','05 Aprl 2025','05 Aprl 2025']
        }
      },
      series: [{
        name: 'Pattients',
        data: [30, 40, 45, 50, 49, 60, 70, 99,102, 106]
      },{
        name: 'Appointments',
        data: [45, 40, 30, 50, 33, 34, 99,102, 106, 108]
      }],
      
    }
  },
  created() {
      this.loadData()
  },
  methods: {
        loadData () {
            const params = {}
            this.$store.dispatch('mutedLoad', { loading: true})
            RestApi.getData(baseUrl, '/dashboard', params).then(response => {
                if (response.success) {
                    this.formData = response.data
                }
                this.$store.dispatch('mutedLoad', { loading: false })
            })
        },
  }
}
</script>
