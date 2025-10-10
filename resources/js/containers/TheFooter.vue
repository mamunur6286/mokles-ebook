<template>
  <CFooter :fixed="false">
    <div>
      <a href="https://lifecare.willdevs.net" target="_blank">Life Care</a>
      <span class="ml-1">&copy; {{new Date().getFullYear()}}  &nbsp;</span>
      <a href="https://willdevs.net" target="_blank">willdevs.net</a>

    </div>
    <div class="mfs-auto">
      <span class="mr-1 text-bold" target="_blank">Version: 1.0</span>
    </div>
  </CFooter>
</template>

<script>
export default {
  name: 'TheFooter'
}
</script>
