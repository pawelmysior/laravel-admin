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
  import tinymce from 'tinymce/tinymce';
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

        plugins: 'code image link lists media paste',
        image_advtab: false,
        image_dimensions: false,
        link_context_toolbar: true,
        link_title: false,
        media_alt_source: false,
        media_dimensions: false,
        media_poster: false,
        paste_as_text: true,
      });
    },
  };
</script>
