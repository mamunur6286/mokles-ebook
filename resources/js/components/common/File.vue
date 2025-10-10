<template>
    <div>
        <b-form-group
            :label-cols-sm="parseInt(input?.cols || 12)"
            :label-for="input.name"
            >
            <template v-slot:label>
            <span>{{ input?.label || input.name | formatLabel }}</span> <Required v-if="input.required" />
            </template>
            <b-form-file
                class="form-control-sm"
                size="sm"
                :type="input.type"
                :value="$attrs.value"
                v-bind="$attrs"
                v-on="$listeners"
                :id="input.name"
                ></b-form-file>
            </b-form-group>
        <Error :name="input.name" :errors="input.errors" />
    </div>
</template>
<script>
export default {
  props: ['input'],
  data () {
      return {
      }
  },
  methods: {
    ucfirst(str) {
        var firstLetter = str.substr(0, 1);
        return firstLetter.toUpperCase() + str.substr(1);
    }
  }
}
</script>
