<template>
  <CRow>
    <CCol>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <router-link to="/"><i class="ri-home-8-line"></i></router-link>
          </li>
          <li class="breadcrumb-item"><router-link to="../">District</router-link></li>
          <li class="breadcrumb-item active">{{ editId ? 'Update' : 'Create' }}</li>
        </ol>
      </nav>

      <CCard>
        <CCardHeader>
          <div class="row">
            <div class="col-md-6">
              <p class="mt-1 mb-0"><strong>District {{ editId ? 'Update' : 'Create' }}</strong></p>
            </div>
            <div class="col-md-6 text-right">
              <router-link class="btn btn-sm btn-primary" to="/districts"><i class="ri-arrow-left-circle-line"></i> Back</router-link>
            </div>
          </div>
        </CCardHeader>

        <CCardBody class="pt-0">
          <b-overlay :show="loading">
            <b-form @submit.prevent="submitForm">
              <div class="row">
                <div class="col-md-4">
                  <Input v-model="formData.name" :input="{ type: 'text', name: 'name', label: 'District Name', required: true, errors }" />
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
        name: '',
      },
      errors: {}
    }
  },
  methods: {
    async getItemById (id) {
      const item = await RestApi.getData(baseUrl, `/districts/${id}/edit`);
      return item.data;
    },
    submitForm () {
      this.createUpdate('districts/store', 'districts/update', '/system-settings/districts');
    },
    refresh () {
      location.reload();
    }
  }
};
</script>