<template>
  <CRow>
    <CCol>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <router-link to="/"><i class="ri-home-8-line"></i></router-link>
          </li>
          <li class="breadcrumb-item"><router-link to="../">Book</router-link></li>
          <li class="breadcrumb-item active">{{ editId ? 'Update' : 'Create' }}</li>
        </ol>
      </nav>

      <CCard>
        <CCardHeader>
          <div class="row">
            <div class="col-md-6">
              <p class="mt-1 mb-0"><strong>Book {{ editId ? 'Update' : 'Create' }}</strong></p>
            </div>
            <div class="col-md-6 text-right">
              <router-link class="btn btn-sm btn-primary" to="/books"><i class="ri-arrow-left-circle-line"></i> Back</router-link>
            </div>
          </div>
        </CCardHeader>

        <CCardBody class="pt-0">
          <b-overlay :show="loading">
            <b-form @submit.prevent="submitForm">
              <div class="row">
                <div class="col-md-4">
                  <Select v-model="formData.author_id" :input="{ name: 'author_id', label: 'Author', options: authorList, required: true, errors }" />
                </div>
                <div class="col-md-4">
                  <Select v-model="formData.category_id" :input="{ name: 'category_id', label: 'Category', options: categoryList, required: true, errors }" />
                </div>
                <div class="col-md-4">
                  <Select v-model="formData.series_id" :input="{ name: 'series_id', label: 'Series', options: seriesList, required: true, errors }" />
                </div>

                <div class="col-md-4">
                  <File v-model="formData.book_image" :input="{ type: 'text', name: 'book_image', label: 'Book Image', required: true, errors }" />
                </div>
                <div class="col-md-4">
                  <Input v-model="formData.name" :input="{ type: 'text', name: 'name', label: 'Book Name', required: true, errors }" />
                </div>
                <div class="col-md-12">
                  <TextEditor v-model="formData.description" :input="{ type: 'text', name: 'description', label: 'Description', required: true, errors, value: formData.description }" />
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
import formMixin from '../../mixins/formMixin';
import RestApi, { baseUrl } from '../../config/api_config';

export default {
  name: 'ServiceForm',
  props: ['editId'],
  mixins: [formMixin],
  data () {
    return {
      formData: {
        author_id: null,
        name: '',
        description: '',
      },
      errors: {}
    }
  },
  computed: {
    authorList () {
      return this.$store.state.commonObj.authorList;
    },
    categoryList () {
      return this.$store.state.commonObj.categoryList;
    },
    seriesList () {
      return this.$store.state.commonObj.seriesList;
    }
  },
  methods: {
    async getItemById (id) {
      const item = await RestApi.getData(baseUrl, `/books/${id}/edit`);
      return item.data;
    },
    submitForm () {
      this.createUpdateWithFile('books/store', 'books/update', '/books');
    },
    refresh () {
      location.reload();
    }
  }
};
</script>