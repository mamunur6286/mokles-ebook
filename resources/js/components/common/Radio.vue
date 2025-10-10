<template>
    <div>
        <b-form-group
        :label-cols-sm="parseInt(input.cols || 12)"
        :label-for="input.name"
        >
        <template v-slot:label>
          <span>{{ input?.label || input.name | formatLabel }}</span> <Required v-if="input.required" />
        </template>
        <b-form-radio-group
            v-bind="$attrs"
            v-on="$listeners"
            :name="input.name"
            :id="input.name"
            :options="input.options"
            v-model="input.vmodel"
            >
            </b-form-radio-group>
            <Error :name="input.name" :errors="input.errors" />
        </b-form-group>
    </div>
</template>
<script>
import Error from './Error.vue';
import Required from './Required.vue';
export default {
  name: 'Radio',
  props: ['input'],
  components: {
    Error,
    Required,
  }
}
</script>
