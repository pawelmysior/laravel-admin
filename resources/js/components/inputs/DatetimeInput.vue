<template>
    <form-input
        :label="label"
        :labelExtra="labelExtra"
        :name="name"
        :required="required"
        :value="value"
        v-once
    >
        <input
            ref="input"
            slot-scope="{ error, old }"
            class="input"
            :class="{ 'has-error': error }"
            :id="name"
            :name="name"
            type="text"
            :value="old"
        >
    </form-input>
</template>

<script>
  import flatpickr from "flatpickr";
  import {Polish} from "flatpickr/dist/l10n/pl";
  import "flatpickr/dist/themes/light.css";
  import FormInput from './FormInput';

  export default {
    components: {
      FormInput,
    },
    props: [
      'label',
      'labelExtra',
      'name',
      'required',
      'value',
    ],
    mounted() {
      flatpickr(this.$refs.input, {
        allowInput: true,
        dateFormat: 'Y-m-d H:i:S',
        enableTime: true,
        locale: Polish,
        time_24hr: true,
      });
    },
  };
</script>
