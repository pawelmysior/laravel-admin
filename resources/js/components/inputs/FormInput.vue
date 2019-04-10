<template>
    <div>
        <label class="label" :for="name" v-once>
            {{ label }} <span v-if="required">*</span> <span class="label-extra" v-html="labelExtra" v-if="labelExtra"></span>
        </label>

        <slot
            :error="error"
            :old="old"
        ></slot>

        <p class="error" v-if="error" v-html="error" v-once></p>
    </div>
</template>

<script>
  export default {
    props: [
      'label',
      'labelExtra',
      'name',
      'required',
      'value',
    ],
    data() {
      return {
        error: false,
        old: this.value,
      };
    },
    created() {
      if (this.name in window.App.errors) {
        this.error = window.App.errors[this.name][0];
      }
      if (this.name in window.App.oldInput) {
        this.old = window.App.oldInput[this.name];
      }
    },
  };
</script>
