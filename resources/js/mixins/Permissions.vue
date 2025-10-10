<script>
  export default {
    methods: {
      $can(permissionName) {
        if(Permissions.toString().indexOf(permissionName) !== -1) {
          return true
        } else {
          return false
        }
      }
    }
  }
</script>
