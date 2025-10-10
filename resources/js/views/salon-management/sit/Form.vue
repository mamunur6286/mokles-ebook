<template>
  <CRow>
    <CCol>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <router-link to="/"><i class="ri-home-8-line"></i></router-link>
          </li>
          <li class="breadcrumb-item"><router-link to="../">Salon Seat</router-link></li>
          <li class="breadcrumb-item active">{{ editId ? 'Update' : 'Create' }}</li>
        </ol>
      </nav>
      <CCard>
        <CCardHeader>
          <div class="row">
            <div class="col-md-6">
              <p class="mt-1 mb-0"><strong>Salon Seat {{ editId ? 'Update' : 'Create' }}</strong></p>
            </div>
            <div class="col-md-6 text-right">
              <router-link class="btn btn-sm btn-primary" to="/salon-Seats"><i class="ri-arrow-left-circle-line"></i> Back</router-link>
            </div>
          </div>
        </CCardHeader>

        <CCardBody class="pt-0">
          <b-overlay :show="loading">
            <b-form @submit.prevent="submitForm">
              <div class="row">
                <div class="col-md-4">
                  <Select v-model="formData.salon_id" :input="{ name: 'salon_id', label: 'Salon', options: salonList, required: true, errors }" />
                </div>

                <div class="col-md-4">
                  <Input v-model="formData.seat_no" :input="{ type: 'text', name: 'seat_no', label: 'Seat No', required: true, errors }" />
                </div>
                <div class="col-md-4">
                  <Input v-model="formData.service_person_name" :input="{ type: 'text', name: 'service_person_name', label: 'Service Person Name', required: true, errors }" />
                </div>
                <div class="col-md-4">
                  <Input v-model="formData.phone_no" :input="{ type: 'text', name: 'phone_no', label: 'Mobile No', required: true, errors }" />
                </div>
                <div class="col-md-12 text-center mt-2 mb-4">
                  <b-button class="mt-btn" size="sm" type="submit" variant="primary">
                    <i class="ri-save-line"></i> {{ editId ? 'Update' : 'Save' }}
                  </b-button>
                  <b-button class="mt-btn ml-1" size="sm" @click="refresh" variant="warning">
                    <i class="ri-refresh-line"></i> Refresh
                  </b-button>
                </div>
              </div>
            </b-form>
          </b-overlay>
        </CCardBody>

      </CCard>
    </CCol>
  </CRow>
</template>

<script>
import formMixin from '../../../mixins/formMixin';
import RestApi, { baseUrl } from '../../../config/api_config';

export default {
  name: 'ServiceForm',
  props: ['editId'],
  mixins: [formMixin],
  data () {
    return {
      formData: {
        salon_id: null,
        seat_no: null,
        service_person_name: '',
        phone_no: ''
      },
      errors: {}
    }
  },
  computed: {
    salonList () {
      return this.$store.state.commonObj.salonList;
    }
  },
  methods: {
    async getItemById (id) {
      const item = await RestApi.getData(baseUrl, `/salon-seats/${id}/edit`);
      return item.data;
    },
    submitForm () {
      this.createUpdate('salon-seats/store', 'salon-seats/update', '/salon-management/salon-seats');
    },
    refresh () {
      location.reload();
    }
  }
};
</script>