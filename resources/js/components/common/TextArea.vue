<template>
    <div>
        <b-form-group
            :label-cols-sm="parseInt(input.cols || 12)"
            :label-for="input.name"
            >
        <template v-slot:label>
        <span>{{ input?.label || input.name | formatLabel }}</span> <Required v-if="input.required" />
        </template>
        <b-form-textarea
            :type="input.type"
            :id="input.name"
            v-model="value"
            v-bind="$attrs"
            v-on="$listeners"
            :name="input.name"
            size="sm"
            class="form-control"
            ></b-form-textarea>
            <Error :name="input.name" :errors="input.errors" />
        </b-form-group>
    </div>
</template>
<script>
export default {
  name: 'TextArea',
  props: ['input'],
  data () {
      return {
          value: ''
      }
  },
  methods: {
  }
}
</script>
