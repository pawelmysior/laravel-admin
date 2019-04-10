<template>
    <form-input
        :label="label"
        :labelExtra="labelExtra"
        :name="name"
        :required="required"
        :value="value"
        v-once
    >
        <textarea
            slot-scope="{ error, old }"
            class="input"
            :class="{ 'has-error': error }"
            :id="name"
            :name="name"
            :rows="rows ? rows : 5"
        >{{ old }}</textarea>
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
      'rows',
    ],
  };
</script>
