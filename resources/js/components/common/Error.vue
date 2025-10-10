<template>
    <span class="text-danger error-message" v-if="errors[name]">
        {{ errorMessage }}
    </span>

</template>
<script>
export default {
    name: "Error",
    props: {
        name: {
            type: String,
            required: true
        },
        msg: {
            type: String,
            required: false,
            default: () => '',
        },
        errors: {
            type: [Object, Array],
            required: true
        }
    },
    computed: {
        errorMessage: function () {
            if (this.errors[this.name] && this.msg) {
                return this.msg;
            }
            if (this.errors[this.name]) {
                return typeof this.errors[this.name] === 'object' ? this.errors[this.name][0] : this.errors[this.name];
            }

            return ''
        }
    }
}
</script>
