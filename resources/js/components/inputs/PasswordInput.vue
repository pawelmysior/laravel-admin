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
            slot-scope="{ error, old }"
            class="input"
            :class="{ 'has-error': error }"
            :id="name"
            :name="name"
            type="password"
            :value="old"
            autocomplete="new-password"
        >
    </form-input>
</template>

<script>
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
  };
</script>
