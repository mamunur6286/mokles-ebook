<template>
    <div>
             <b-form-group
                :label-cols-sm="parseInt(input.cols || 12)"
                :label-for="input.name"
                >
            <template v-slot:label>
            <span>{{ input?.label || input.name | formatLabel }}</span> <Required v-if="input.required" />
            </template>
            <b-form-checkbox-group
                v-bind="$attrs"
                v-on="$listeners"
                :name="input.name"
                :id="input.name"
                :options="input.options"
                v-model="input.vmodel"
                :value="input.vmodel"
                @change="setData()"
                size="sm"
                >
                </b-form-checkbox-group>
                <Error :name="input.name" :errors="input.errors" />
            </b-form-group>
    </div>


</template>
<script>
import Error from './Error.vue';
import Required from './Required.vue';
export default {
  props: ['input'],
  data () {
      return {
          value: this.input.vmodel
      }
  },
  components: {
    Error,
    Required
  },
  methods: {
    ucfirst(str) {
        var firstLetter = str.substr(0, 1);
        return firstLetter.toUpperCase() + str.substr(1);
    },
    setData () {
        this.$emit('return-value', this.value)
    }
  }
}
</script>
