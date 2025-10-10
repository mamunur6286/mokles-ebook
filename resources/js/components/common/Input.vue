<template>
    <div>
        <b-form-group
        :label-cols-sm="parseInt(input?.cols || 12)"
        :label-for="input.name"
        >
        <template v-slot:label>
        <span v-if="input?.label || input.name">{{ input?.label || input.name | formatLabel }}</span> <Required v-if="input.required" />
        </template>
        <b-form-input
            size="sm"
            :type="input.type"
            v-bind="$attrs"
            v-on="$listeners"
            :id="input.name"
            ></b-form-input>
            <Error :name="input.name" :errors="input.errors" />
        </b-form-group>
    </div>
</template>

<script>
import Error from './Error.vue';
import Required from './Required.vue';

export default {
    name: 'Input',
    props: ['input'],
    components: {
        Error,
        Required
    }
}
</script>
