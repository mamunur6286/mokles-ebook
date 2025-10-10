<template>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <router-link to="/">
          <i class="ri-home-8-line"></i>
        </router-link>
      </li>
      <li
        v-for="(segment, index) in pathSegments"
        :key="index"
        class="breadcrumb-item"
      >
        <template v-if="index === pathSegments.length - 1">
          <router-link :to="buildLink(index)">{{ segment | formatLabel }}</router-link>
        </template>
        <template v-else>
          <router-link :to="buildLink(index)">{{ segment | formatLabel }}</router-link>
        </template>
      </li>
    </ol>
  </nav>
</template>

<script>
export default {
  name: "BreadCrumb",
  computed: {
    pathSegments() {
      return this.$route.path.split("/").filter(segment => segment);
    }
  },
  methods: {
    buildLink(index) {
      const segments = this.pathSegments.slice(0, index + 1);
      return "/" + segments.join("/");
    }
  }
};
</script>