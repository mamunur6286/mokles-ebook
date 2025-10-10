<template>
    <div>
        <b-form-group
            :label-cols-sm="parseInt(input.cols || 12)"
            :label-for="input.name"
            >
        <template v-slot:label>
        <span>{{ input?.label || input.name | formatLabel }}</span> <Required v-if="input.required" />
        </template>
        <vue-editor
            :type="input.type"
            :id="input.name"
            v-model="value"
            v-bind="$attrs"
            v-on="$listeners"
            :name="input.name"
            size="sm"
            ></vue-editor>
            <Error :name="input.name" :errors="input.errors" />
        </b-form-group>
    </div>
</template>
<script>
import { VueEditor } from "vue2-editor";
export default {
    name:'TextEditor',
    props: ['input'],
    components: {
        VueEditor
    },
    data () {
        return {
            value: ''
        }
    },
    methods: {
    }
}
</script>
