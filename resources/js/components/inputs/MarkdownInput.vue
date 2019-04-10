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
            ref="input"
        >{{ old }}</textarea>
    </form-input>
</template>

<script>
  import SimpleMDE from 'simplemde';
  import 'simplemde/dist/simplemde.min.css'
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
    mounted() {
      let simplemde = new SimpleMDE({
        element: this.$refs.input,
        spellChecker: false,
        status: false,
      });

      simplemde.codemirror.on('focus', () => {
        document.getElementsByClassName('editor-toolbar')[0].classList.add('editor-toolbar-focused');
      });

      simplemde.codemirror.on('blur', () => {
        document.getElementsByClassName('editor-toolbar')[0].classList.remove('editor-toolbar-focused');
      });
    },
  };
</script>

<style>
    .editor-toolbar {
        @apply bg-gray-200 border-gray-200 opacity-100;
    }

    .editor-toolbar-focused {
        @apply bg-white border-gray-500;
    }

    .editor-toolbar:hover {
        @apply opacity-100;
    }

    .editor-toolbar i.separator {
        border-left: 1px solid #d3dbe4;
        border-right: 0;
    }

    .CodeMirror {
        @apply bg-gray-200 border-gray-200 text-gray-900 leading-tight;
        border-top: 1px solid #d3dbe4;
    }

    .CodeMirror-focused {
        @apply bg-white border-gray-500;
        border-top: 1px solid #d3dbe4;
    }
</style>
