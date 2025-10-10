import ListHeader from '../components/common/ListHeader.vue';
import BreadCrumb from '../components/common/BreadCrumb.vue';

export default {
  components: {
        ListHeader,
        BreadCrumb
    },
    computed: {
      itemList () {
          return this.$store.state.list
      },
      loading () {
        return this.$store.state.static.loading
      },
      listReload () {
        return this.$store.state.static.listReload
      }
    },
    created () {
        this.loadData ()
    },
    methods: {
        editModal (item) {
            this.editId = item.id
        },
        editRouter (item, uri) {
            this.$router.push(`${uri}?id=${item.id}`)
        },
        changeStatus (item, status) {
          this.$swal({
            title: "Are you sure?",
            text: "You won't be inactive this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
          }).then((result) => {
            if (result.isConfirmed) {
              this.toggleStatus(item, status)
            }
          });
        },
        searchData () {
            this.loadData()
        },
        paginationData (data) {
            this.pagination.perPage = parseInt(data.per_page)
            this.pagination.currentPage = parseInt(data.current_page)
            this.pagination.total = parseInt(data.total)
            this.pagination.slOffset = (parseInt(data.per_page) * (parseInt(data.current_page) - 1))
        },
        filterEmitAction (filterValue) {
            this.isFilter = filterValue
        }
    }
}
