<template>
  <CRow>
    <CCol>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <router-link to="/"><i class="ri-home-8-line"></i></router-link>
          </li>
          <li class="breadcrumb-item"><router-link to="../">Apps</router-link></li>
          <li class="breadcrumb-item active">Create</li>
        </ol>
      </nav>

      <CCard>
        <CCardHeader>
          <div class="row">
            <div class="col-md-6">
              <p class="mt-1 mb-0"><strong>App {{ editId ? 'Update' : 'Create' }}</strong></p>
            </div>
            <div class="col-md-6 text-right">
              <router-link class="btn btn-sm btn-primary" to="/apps"><i class="ri-arrow-left-circle-line"></i> Back</router-link>
            </div>
          </div>
        </CCardHeader>

        <CCardBody class="pt-0">
          <b-overlay :show="loading">
            <b-form @submit.prevent="submitForm">
              <div class="row">
                <div class="col-md-4">
                  <Input v-model="formData.name" :input="{ type: 'text', name: 'name', label: 'Name', required: true, errors }" />
                </div>
                <div class="col-md-4">
                  <Input v-model="formData.unique_id" :input="{ type: 'text', name: 'unique_id', label: 'Unique ID', required: true, errors }" />
                </div>
                <div class="col-md-4">
                  <Input v-model="formData.icon_url" :input="{ type: 'text', name: 'icon_url', label: 'Icon Url', errors }" />
                </div>
                <div class="col-md-4">
                  <Input v-model="formData.description" :input="{ type: 'text', name: 'description', label: 'Description', errors }" />
                </div>
                <div class="col-md-4">
                  <Input v-model="formData.app_update_version" :input="{ type: 'text', name: 'app_update_version', label: 'App Update Version', errors }" />
                </div>
                <div class="col-md-4">
                  <Input v-model="formData.app_update_description" :input="{ type: 'text', name: 'app_update_description', label: 'Update Description', errors }" />
                </div>
                <div class="col-md-4">
                  <Input v-model="formData.app_update_link" :input="{ type: 'text', name: 'app_update_link', label: 'Update Link', errors }" />
                </div>
                <div class="col-md-4">
                    <SwitchCheck
                      v-model="formData.is_app_update_popup"
                      :input="{
                        type: 'checkbox',
                        name: 'is_app_update_popup',
                        label: 'Allow App Update popup?',
                        isLabel: true,
                        showValue: true,
                        errors: errors
                      }"
                    />
                </div>
                <div class="col-md-4">
                    <SwitchCheck
                      v-model="formData.is_app_update_cancel"
                      :input="{
                        type: 'checkbox',
                        name: 'is_app_update_cancel',
                        label: 'Allow Cancel Update?',
                        isLabel: true,
                        showValue: true,
                        errors: errors
                      }"
                    />
                </div>
                <div class="col-md-12 text-center mt-2 mb-4">
                  <b-button class="mt-btn" size="sm" type="submit" variant="primary"><i class="ri-save-line"></i> {{ editId ? 'Update' : 'Save' }}</b-button>
                  <b-button class="mt-btn ml-1" size="sm" @click="refresh" variant="warning"><i class="ri-refresh-line"></i> Refresh</b-button>
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

import formMixin from '../../mixins/formMixin';
import RestApi, { baseUrl } from '../../config/api_config'

export default {
  name: 'AppForm',
  props: ['editId'],
  mixins: [formMixin],
  data () {
    return {
      formData: {
        unique_id: '',
        name: '',
        description: '',
        icon_url: '',
        is_app_update_popup: false,
        is_app_update_cancel: false,
        app_update_version: '',
        app_update_description: '',
        app_update_link: '',
        status: 1,
      },
      errors: {}
    }
  },
  methods: {
    async getItemById (id) {
        const item = await RestApi.getData(baseUrl, `/apps/${id}/edit`)
        return item.data
    },
    submitForm () {
      this.createUpdate('apps/store', 'apps/update', '/apps')
    },
    refresh () {
      location.reload()
    }
  }
}
</script>
