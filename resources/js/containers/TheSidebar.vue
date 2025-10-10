<template>
  <CSidebar 
    fixed 
    :minimize="minimize"
    :show="show"
    @update:show="(value) => $store.commit('set', ['sidebarShow', value])"
  >
    <CSidebarBrand class="d-md-down-none" to="/">
      <img class="p-4" src="../assets/images/logo.png"/>
    </CSidebarBrand>
    <CRenderFunction flat :content-to-render="navData"/>
    <CSidebarMinimizer
      class="d-md-down-none"
      @click.native="$store.commit('set', ['sidebarMinimize', !minimize])"
    />
  </CSidebar>
</template>

<script>
import nav from './_nav'

export default {
  name: 'TheSidebar',
  nav,
  computed: {
    show () {
      return this.$store.state.sidebarShow 
    },
    minimize () {
      return this.$store.state.sidebarMinimize 
    },
    navData () {
      const tempData = this.$options.nav[0]._children.map((item, index) => {
      const itemsData = item.items.map(childItem => {
          return{
            name: this.$t(childItem.name),
            to: childItem.to
          }
        })

        if (itemsData.length <1) {
          return {
            _name: item._name,
            name: this.$t(item.name),
            to: item.to,
            icon: item.icon,
            items: itemsData,
            }
        }else{
          return {
            _name: item._name,
            name: this.$t(item.name),
            route: item.route,
            icon: item.icon,
            show: index == 1 ? true: false,
            items: itemsData,
            }
        }
       
      })
      return  [
          {
            _name: 'CSidebarNav',
            _children: tempData
          }
        ]
      }
  }
}
</script>
