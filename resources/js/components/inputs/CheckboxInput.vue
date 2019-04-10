<template>
    <form-input
        :label="label"
        :labelExtra="labelExtra"
        :name="name"
        :required="required"
        :value="value"
        v-once
    >
        <div slot-scope="{ error, old }">
            <input :name="name" type="hidden" value="0">

            <input
                class=""
                :class="{ 'has-error': error }"
                :id="name"
                :name="name"
                type="checkbox"
                value="1"
                :checked="parseInt(old)"
            >
        </div>
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
