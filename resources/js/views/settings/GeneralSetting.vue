<template>
  <CRow>
    <CCol>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <router-link to="/"><i class="ri-home-8-line"></i></router-link>
          </li>
          <li class="breadcrumb-item"><router-link to="../">Settings</router-link></li>
          <li class="breadcrumb-item active">{{ 'Update' }}</li>
        </ol>
      </nav>

      <CCard>
        <CCardHeader>
          <div class="row">
            <div class="col-md-6">
              <p class="mt-1 mb-0"><strong>Settings {{ 'Update' }}</strong></p>
            </div>
          </div>
        </CCardHeader>

        <CCardBody class="pt-0">
          <b-overlay :show="loading">
            <b-form @submit.prevent="submitForm">

              <!-- Dynamic settings rows -->
              <div v-for="(item, index) in formData.settings" :key="index" class="row mb-2">

                <div class="col-md-2">
                  <div style="margin-top: 15px;">{{ item.key | formatLabel }} </div>
                </div>

                <div class="col-md-6">
                  <Input
                    v-model="item.value"
                    :input="{
                      type: 'text',
                      name: ``,
                      label: '',
                      rows: 1,
                      errors
                    }"
                  />
                </div>

              </div>


              <!-- Submit / Refresh buttons -->
              <div class="col-md-12 text-center mt-2 mb-4">
                <b-button class="mt-btn" size="sm" type="submit" variant="primary">
                  <i class="ri-save-line"></i> {{ editId ? 'Update' : 'Save' }}
                </b-button>
                <b-button class="mt-btn ml-1" size="sm" @click="refresh" variant="warning">
                  <i class="ri-refresh-line"></i> Refresh
                </b-button>
              </div>

            </b-form>
          </b-overlay>
        </CCardBody>
      </CCard>
    </CCol>
  </CRow>
</template>

<script>
import formMixin from '../../mixins/formMixin';
import RestApi, { baseUrl } from '../../config/api_config';

export default {
  name: 'SettingsForm',
  props: ['editId'],
  mixins: [formMixin],
  data () {
    return {
      formData: {
        settings: [
        ]
      },
      typeOptions: [
        { value: 'string', text: 'String' },
        { value: 'number', text: 'Number' },
        { value: 'boolean', text: 'Boolean' },
        { value: 'json', text: 'JSON' }
      ],
      errors: {},
      loading: false
    }
  },
  methods: {
    async getData () {
      this.loading = true;
      try {
        const item = await RestApi.getData(baseUrl, `/settings`);
        this.formData.settings = item.data;
      } finally {
        this.loading = false;
      }
    },
    submitForm() {
      // You can handle the array of settings in your API
      this.createUpdate('settings/store', 'settings/update', '/system-settings/general-setting');
    },
    refresh() {
      location.reload();
    }
  },
  mounted() {
      this.getData();
  }
};
</script>
