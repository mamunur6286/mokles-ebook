<template>
  <div>
    <b-form-group
      :label-cols-sm="parseInt(input?.cols || 12)"
      :label-for="input.name"
    >
      <template v-slot:label>
        <span>{{ formatLabel(input?.label || input.name) }}</span>
        <Required v-if="input.required" />
      </template>

      <b-form-file
        class="form-control-sm"
        size="sm"
        :id="input.name"
        :state="!input.errors?.length"
        v-bind="$attrs"
        v-on="$listeners"
        @change="onFileChange"
      ></b-form-file>
    </b-form-group>

    <Error :name="input.name" :errors="input.errors" />
  </div>
</template>

<script>
export default {
  props: {
    input: {
      type: Object,
      required: true
    }
  },
  methods: {
    formatLabel(str) {
      if (!str) return ''
      const firstLetter = str.charAt(0).toUpperCase()
      return firstLetter + str.slice(1).replace(/_/g, ' ')
    },

    onFileChange(e) {
      const file = e.target.files[0] || null
      this.$emit('input', file)
      this.input.vmodel = file
    }
  }
}
</script>
