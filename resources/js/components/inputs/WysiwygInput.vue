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
            ref="input"
            slot-scope="{ error, old }"
            class="input"
            :class="{ 'has-error': error }"
            :id="name"
            :name="name"
        >{{ old }}</textarea>
    </form-input>
</template>

<script>
  import axios from 'axios';
  import tinymce from 'tinymce/tinymce';
  import 'tinymce/plugins/autoresize';
  import 'tinymce/plugins/code';
  import 'tinymce/plugins/image';
  import 'tinymce/plugins/link';
  import 'tinymce/plugins/lists';
  import 'tinymce/plugins/media';
  import 'tinymce/plugins/paste';
  import 'tinymce/themes/modern/theme';
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
      tinymce.init({
        target: this.$refs.input,

        language: 'pl',
        language_url: '/vendor/admin/tinymce/langs/pl.js',

        menubar: false,
        min_height: 250,
        skin_url: '/vendor/admin/tinymce/skins/laravel-admin',
        statusbar: false,
        toolbar: 'removeformat | bold italic underline | blockquote | alignleft aligncenter alignright alignjustify | bullist numlist | link image media | code',

        element_format: 'html',
        entity_encoding: 'raw',
        keep_styles: false,
        relative_urls: false,

        plugins: 'autoresize code image link lists media paste',
        image_advtab: false,
        image_dimensions: false,
        link_context_toolbar: true,
        link_title: false,
        media_alt_source: false,
        media_dimensions: false,
        media_poster: false,
        paste_as_text: true,

        file_picker_types: 'image',
        file_picker_callback: function (callback, value, meta) {
          /*
           * Create a file input on the fly, click it and listen to changes.
           * When the file is selected, create a FormData with this file and send it through a POST call.
           * Get the uploaded file url back and put it into the text input.
           */
          if (meta.filetype === 'image') {
            let fileInput = document.createElement('input');
            fileInput.setAttribute('type', 'file');

            fileInput.addEventListener('change', (e) => {
              if (!e.target.files.length) {
                return false;
              }

              let formData = new FormData();
              formData.append('image', e.target.files[0]);

              axios.post('/admin/upload', formData)
                .then(response => {
                  callback(response.data);
                })
                .catch(error => {
                  console.log(error);
                });
            });

            fileInput.click();
          }
        },

        init_instance_callback: function (editor) {
          editor.on('focus', function (e) {
            editor.getContainer().classList.add('mce-tinymce-focused');
          });

          editor.on('blur', function (e) {
            editor.getContainer().classList.remove('mce-tinymce-focused');
          });
        },

        setup(editor) {
          editor.on('init', () => {
            if (editor.getElement().classList.contains('has-error')) {
              editor.getContainer().classList.add('has-error');
            }
          });
        },
      });
    },
  };
</script>
