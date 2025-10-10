<template>
  <CHeader fixed with-subheader light  style="font-size: 14px;">
    <CToggler
      in-header
      class="ml-3 d-lg-none"
      @click="$store.commit('toggleSidebarMobile')"
    />
    <CToggler
      in-header
      class="ml-3 d-md-down-none"
      @click="$store.commit('toggleSidebarDesktop')"
    />
    <CHeaderBrand class="mx-auto d-lg-none" to="/">
      <CIcon name="logo" height="48" alt="Logo"/>
    </CHeaderBrand>
    <CHeaderNav class="d-md-down-none mr-auto">

  <!-- <CDropdown
    class="c-header-nav-items"
    add-menu-classes=""
  >
    <template #toggler>
      <CHeaderNavLink class="text-dark">
        <i class="ri-Salon-fill" style="font-size: 24px;"></i> &nbsp; {{ $t('Bismillah Dental Care') }} <i class="ri-arrow-down-s-fill"></i>
      </CHeaderNavLink>
    </template>
    <CDropdownItem>
      <i class="ri-arrow-right-s-line"></i>{{$t('Bismillah Dental Care') }}
    </CDropdownItem>
    <CDropdownItem>
      <i class="ri-arrow-right-s-line"></i>{{$t('My Dental') }}
    </CDropdownItem>
    <CDropdownItem>
      <i class="ri-arrow-right-s-line"></i>{{$t('Will Dental Care') }}
    </CDropdownItem>
  </CDropdown> -->

<!-- 
      <CHeaderNavItem class="">
        <b-dropdown block id="dropdown-offset" no-caret offset="25" :text="$t('Bismillah Dental Care')" variant="link" class="btn-sm">
          <b-dropdown-item href="#">Add Product</b-dropdown-item>
          <b-dropdown-item href="#">Product Report</b-dropdown-item>
          <b-dropdown-item href="#">Manage Product</b-dropdown-item>
        </b-dropdown>
      </CHeaderNavItem> -->

    </CHeaderNav>
    <CHeaderNav class="">
      <CDropdown
        class="c-header-nav-items nav-notifications"
        add-menu-classes=""
      >
        <template #toggler>
          <CHeaderNavLink class="text-dark">
            <i class="ri-notification-2-fill" style="font-size: 15px;"></i>
            <span class="badge blink">10</span>
          </CHeaderNavLink>
        </template>
        <CDropdownItem>
          <i class="ri-arrow-right-s-line"></i> <router-link to='' > 
            1. Your order is approved ...
          </router-link>
        </CDropdownItem>
        <CDropdownItem>
          <i class="ri-arrow-right-s-line"></i> 
          <router-link to='' >
            2. Your order is Cancel ...
          </router-link>
        </CDropdownItem>
        <CDropdownItem>
          <i class="ri-arrow-right-s-line"></i> 
          <router-link to='' >
            3. Your order is Ammened ...
          </router-link>
        </CDropdownItem>
        <CDropdownItem>
          <i class="ri-arrow-right-s-line"></i> 
          <router-link to='' >
            4. Your order is Singed ...
          </router-link>
        </CDropdownItem>
        <CDropdownItem>
          <i class="ri-arrow-right-s-line"></i> 
          <router-link to='' >
            4. Your order is Singed ...
          </router-link>
        </CDropdownItem>
        <CDropdownItem>
          <i class="ri-arrow-right-s-line"></i> 
          <router-link to='' >
            4. Your order is Singed ...
          </router-link>
        </CDropdownItem>
        <CDropdownItem>
          <i class="ri-arrow-right-s-line"></i> 
          <router-link to='' >
            4. Your order is Singed ...
          </router-link>
        </CDropdownItem>
        <CDropdownItem>
          <i class="ri-arrow-right-s-line"></i> 
          <router-link to='' >
            4. Your order is Singed ...
          </router-link>
        </CDropdownItem>
        <CDropdownItem>
          <i class="ri-arrow-right-s-line"></i> 
          <router-link to='' >
            4. Your order is Singed ...
          </router-link>
        </CDropdownItem>
        <CDropdownItem>
          <i class="ri-arrow-right-s-line"></i> 
          <router-link to='' >
            4. Your order is Singed ...
          </router-link>
        </CDropdownItem>
        <CDropdownItem>
          <i class="ri-arrow-right-s-line"></i> 
          <router-link to='' >
            4. Your order is Singed ...
          </router-link>
        </CDropdownItem>
        <CDropdownItem>
          <i class="ri-arrow-right-s-line"></i> 
          <router-link to='' >
            4. Your order is Singed ...
          </router-link>
        </CDropdownItem>
        <CDropdownItem>
          <i class="ri-arrow-right-s-line"></i> 
          <router-link to='' >
            4. Your order is Singed ...
          </router-link>
        </CDropdownItem>
        <CDropdownItem>
          <i class="ri-arrow-right-s-line"></i> 
          <router-link to='' >
            4. Your order is Singed ...
          </router-link>
        </CDropdownItem>
      </CDropdown>
      <CDropdown
        class="c-header-nav-items mx-2"
        add-menu-classes=""
      >
        <template #toggler>
          <CHeaderNavLink class="text-dark">
            <a @click="langChange('en')"><img width="22px" height="15px" src="../assets/images//en.png"/></a> &nbsp; <span>English</span> <i class="ri-arrow-down-s-fill"></i>
          </CHeaderNavLink>
        </template>
        <CDropdownItem>
          <img width="25px" src="../assets/images/en.png"/> Bangla
        </CDropdownItem>
        <CDropdownItem>
          <img width="25px" src="../assets/images/bn.png"/> English
        </CDropdownItem>
        <CDropdownItem>
          <img width="25px" src="../assets/images/en.png"/> Arabic
        </CDropdownItem>
       
      </CDropdown>
      
      <TheHeaderDropdownAccnt/>
    </CHeaderNav>
  </CHeader>
</template>

<script>
import TheHeaderDropdownAccnt from './TheHeaderDropdownAccnt.vue'
import { mapActions } from 'vuex'

export default {
  name: 'TheHeader',
  components: {
    TheHeaderDropdownAccnt
  },
  methods:{
    langChange (lang) {
      this.langChangeState(lang)
      this.$i18n.locale = lang
    },
    ...mapActions({
      langChangeState: 'setLangAction'
    })
  }
 
  
}
</script>
<style>
  .dropdown-menu {
      margin-top: 8px !important;
      font-size: 14px;
  }
  .nav-notifications .dropdown-menu {
      margin-top: 8px !important;
      height: 350px;
      overflow-y: scroll;
  }
  .nav-notifications .dropdown-menu a {
      color: #343a40 !important
  }
  .nav-notifications .dropdown-menu a:hover {
      color: #0087d2 !important
  }
  .dropdown-item {
    min-width: 120px !important;
  }

.blink {
  background: palevioletred;
  color: white;
  border-radius: 28px;
  font-size: 10px !important;
}
</style>