<template>
  <CDropdown
    inNav
    class="c-header-nav-items nav-name-icon"
    placement="bottom-end"
    add-menu-classes="pt-0"
  >
    <template #toggler>
      <CHeaderNavLink>
        <span class="name text-dark">Md Mamunur Rashid &nbsp;&nbsp;</span> <br>
        <div class="c-avatar">
          
          <img
            src="../assets/images/profile.png"
            class="c-avatar-img "
          />
        </div> <i class="ri-arrow-down-s-fill"></i>
      </CHeaderNavLink>
    </template>
    <CDropdownItem>
      <CIcon name="cil-user" /> Profile
    </CDropdownItem>
    <CDropdownItem>
      <CIcon name="cil-settings" /> Settings
    </CDropdownItem>
    <CDropdownItem @click="logout" >
      <i class="ri-logout-circle-line"></i> Logout
    </CDropdownItem>
  </CDropdown>
</template>

<script>
export default {
  name: 'TheHeaderDropdownAccnt',
  data () {
    return { 
      itemsCount: 42
    }
  },
  methods: {
    logout: function () {
      this.$store.dispatch('logout')
      .then(() => {
        this.$router.push('/pages/login')
      })
    }
  }
}
</script>

<style scoped>
  .c-icon {
    margin-right: 0.3rem;
  }
</style>