<template>
    <form-input
        :label="label"
        :labelExtra="labelExtra"
        :name="name"
        :required="required"
    >
        <div
            slot-scope="{ error, old }"
            class="input-image"
            :class="{ 'has-error': error }"
            :style="targetStyle"
        >
            <img class="absolute w-full h-full" :src="url ? url : old" v-show="url || old">

            <input
                class="absolute w-full h-full opacity-0 cursor-pointer"
                type="file"
                accept="image/*"
                @change="upload"
            >

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
      'targetStyle',
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
