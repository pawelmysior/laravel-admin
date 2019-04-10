<template>
    <form-input
        :label="label"
        :labelExtra="labelExtra"
        :name="name"
        :required="required"
        :value="value"
        v-once
    >
        <div class="relative" slot-scope="{ error, old }">
            <select
                class="input"
                :class="{ 'has-error': error }"
                :id="name"
                :name="name"
            >
                <option value="">Wybierz...</option>
                <option v-for="(value, key) in options" :value="key" :selected="key == old">{{ value }}</option>
            </select>

            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-600">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                </svg>
            </div>
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
      'options',
      'required',
      'value',
    ],
  };
</script>
