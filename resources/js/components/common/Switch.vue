<template>
    <div>
        <b-form-group
            :label-cols-sm="parseInt(input.cols || 12)"
            :label-for="input.name"
        >
        <template v-slot:label>
        <span v-if="input?.isLabel">{{ input?.label || input.name | formatLabel }}</span> <Required v-if="input.required" />
        </template>

      <b-form-checkbox
        v-bind="$attrs"
        :name="input.name"
        :id="input.name"
        switch
        :value="true"
        :unchecked-value="false"
        :checked="value"
        @change="$emit('input', $event)"
      >
        <span v-if="input.switchLabel">{{ input.switchLabel }}</span>
        <span v-if="input.showValue">{{ value ? 'Yes' : 'No' }}</span>
      </b-form-checkbox>

      <Error :name="input.name" :errors="input.errors" />
    </b-form-group>
  </div>
</template>

<script>
import Error from './Error.vue'
import Required from './Required.vue'

export default {
  name: 'SwitchCheck',
  props: {
    value: {
        type: Boolean,
        default: false
    },
    input: {
        type: Object,
        required: true
    }
  },
  components: {
    Error,
    Required
  }
}
</script>
