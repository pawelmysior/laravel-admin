<template>
    <form-input
        :label="label"
        :labelExtra="labelExtra"
        :name="name"
        :required="required"
    >
        <div
            slot-scope="{ error, old }"
            class="flex items-stretch mb-3"
            :class="{ 'has-error': error }"
        >
            <a
                :href="url ? url : old"
                class="input-file"
                target="_blank"
                v-html="url ? url : old"
                v-show="url || old"
            ></a>

            <div class="relative btn btn-gray cursor-pointer flex items-center" :class="{ 'rounded-l-none': url }">
                <input
                    class="absolute w-full inset-0 cursor-pointer opacity-0"
                    type="file"
                    @change="upload"
                >

                <div class="whitespace-no-wrap">Dodaj plik</div>
            </div>

            <input
                :name="name"
                type="hidden"
                :value="url ? url : old"
            >
        </div>
    </form-input>
</template>

<script>
  import axios from 'axios';
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
      'modelType',
      'modelId',
      'collection',
    ],
    data() {
      return {
        url: '',
      };
    },
    created() {
      if (!this.modelId) {
        return false;
      }

      axios
        .post('/admin/media/fetch', {
          model_type: this.modelType,
          model_id: this.modelId,
          collection: this.collection,
        })
        .then(response => {
          this.url = response.data;
        })
        .catch(error => {
          //
        });
    },
    methods: {
      upload(e) {
        if (!e.target.files.length) {
          return false;
        }

        let data = this.createFormData(e.target.files[0]);

        axios.post('/admin/media', data)
          .then(response => {
            this.url = response.data;
          })
          .catch(error => {
            console.log(error);
          });
      },
      createFormData(file) {
        let formData = new FormData();

        formData.append('model_type', this.modelType);
        formData.append('model_id', this.modelId);
        formData.append('collection', this.collection);
        formData.append('media', file);

        return formData;
      },
    },
  };
</script>
