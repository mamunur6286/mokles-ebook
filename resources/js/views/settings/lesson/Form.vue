<template>
  <CRow>
    <CCol>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <router-link to="/"><i class="ri-home-8-line"></i></router-link>
          </li>
          <li class="breadcrumb-item"><router-link to="../">Ads</router-link></li>
          <li class="breadcrumb-item active">{{ editId ? 'Update' : 'Create' }}</li>
        </ol>
      </nav>

      <CCard>
        <CCardHeader>
          <div class="row">
            <div class="col-md-6">
              <p class="mt-1 mb-0"><strong>Ads {{ editId ? 'Update' : 'Create' }}</strong></p>
            </div>
            <div class="col-md-6 text-right">
              <router-link class="btn btn-sm btn-primary" to="/lessons"><i class="ri-arrow-left-circle-line"></i> Back</router-link>
            </div>
          </div>
        </CCardHeader>

        <CCardBody class="pt-0">
          <b-overlay :show="loading">
            <b-form @submit.prevent="submitForm">
              <div class="row">
                <div class="col-md-6">
                  <Select v-model="formData.book_id" :input="{ name: 'book_id', label: 'Book', options: bookList, required: true, errors }" />
                </div>

                <div class="col-md-6">
                  <Input v-model="formData.name" :input="{ type: 'text', name: 'name', label: 'Lesson Name', required: true, errors }" />
                </div>
                <div class="col-md-6">
                  <Input v-model="formData.sort_order" :input="{ type: 'text', name: 'sort_order', label: 'Sort', required: true, errors }" />
                </div>

                <div class="col-md-12">
                  <text-editor v-model="formData.description" :input="{ type: 'text', name: 'description', label: 'Description', errors }" />
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
        book_id: null,
        name: '',
        sort_order: 0,
        description: '',
      },
      errors: {}
    }
  },
  computed: {
    bookList () {
      return this.$store.state.commonObj.bookList;
    }
  },
  methods: {
    async getItemById (id) {
      const item = await RestApi.getData(baseUrl, `/lessons/${id}/edit`);
      return item.data;
    },
    submitForm () {
      this.createUpdate('lessons/store', 'lessons/update', '/lessons');
    },
    refresh () {
      location.reload();
    }
  }
};
</script>