import RestApi, { baseUrl } from '../config/api_config'
import iziToast from 'izitoast';

export default {
  computed: {
    loading () {
        return this.$store.state.static.loading
    },
    id () {
        return this.$route.query.id
    }
  },
  watch: {
    
  },
  created () {
    if (this.editId) {
      this.formData = this.getItem()
    }
    if (this.$route.query.id) {
      this.getItemById(this.$route.query.id).then(response => {
        this.formData = response
      })
    }
  },
  methods: {
    getItem () {
        const item = this.$store.state.list.find(item => item.id === parseInt(this.editId))
        return JSON.parse(JSON.stringify(item))
    },
    dispatchLoad (loading = false) {
      if (loading) {
          this.$store.dispatch('mutedLoad', { loading: true, listReload: false })
          return;
      }
      this.$store.dispatch('mutedLoad', { loading: false, listReload: true })
      this.$store.dispatch('dropdownLoad', { hasDropdownLoaded: false })
    },
    async createUpdate (createUrl = '', updateUrl = '', redirect='../') {
      try {
        let result = null
        this.dispatchLoad(true)
        if (this.editId || this.id) {
            const id = this.editId ? this.editId : this.id
            result = await RestApi.putData(baseUrl, `${updateUrl}/${id}`, this.formData)
        } else {
            result = await RestApi.postData(baseUrl, createUrl, this.formData)
        }
        this.dispatchLoad(false)

        iziToast.success({
            title: 'Success',
            message: result.message
        })
        if (result.success) {
          this.$router.push({ path: redirect })
        }
      } catch (e) {
        this.$store.dispatch('mutedLoad', { loading: false, listReload: false })
        if(e.status == 422) {
            this.errors = e.errors
        }
        iziToast.error({
            title: 'Success',
            message: 'Something went wrong'
        })
      }
    },
    async createUpdateWithFile(createUrl = '', updateUrl = '', redirect = '../') {
        let result = null
        this.dispatchLoad(true)

        const formData = new FormData()

        Object.keys(this.formData).forEach(key => {
          const value = this.formData[key]

          if (value instanceof File || value instanceof Blob) {
            formData.append(key, value, value.name)
          } 
          else if (value !== null && value !== undefined) {
            formData.append(key, value)
          }
        })

        if (this.editId || this.id) {
          formData.append('_method', 'PUT')
          const id = this.editId ? this.editId : this.id
          result = await RestApi.postData(baseUrl, `${updateUrl}/${id}`, formData)
        } else {
          result = await RestApi.postData(baseUrl, createUrl, formData)
        }

        this.dispatchLoad(false)

        iziToast.success({
          title: 'Success',
          message: result.message
        })

        if (result.success) {
          this.$router.push({ path: redirect })
        }
      }
  }
}
