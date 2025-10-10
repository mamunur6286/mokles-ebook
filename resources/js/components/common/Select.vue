<template>
    <div>
        <b-form-group
            :label-cols-sm="parseInt(input.cols | 12)"
            :label-for="input.name"
        >
        <template v-slot:label>
            <span>{{ input?.label || input.name | formatLabel }}</span> <Required v-if="input.required" />
        </template>
        <v-select
            :id="input.name"
            v-bind="$attrs"
            v-on="$listeners"
            :options="input.options"
            label="text"
            :reduce="(option) => option.value"
            :placeholder="input?.placeholder"
        ></v-select>
            <Error :name="input.name" :errors="input.errors" />
        </b-form-group>
    </div>
</template>
<script>
import Error from './Error.vue';
import Required from './Required.vue';
import vSelect from 'vue-select'

export default {
    name: 'Select',
    props: ['input'],
    components: {
        Required,
        Error,
        vSelect
    },
    methods: {
    }
}
</script>
