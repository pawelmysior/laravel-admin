<template>
    <modal-dialog :show="show" @close="cancel">
        <h1 class="text-center text-2xl font-bold mb-4">
            Czy na pewno?
        </h1>

        <p class="text-center text-grey-darker mb-6">
            Tej operacji nie można cofnąć!
        </p>

        <div class="text-center">
            <button class="btn btn-gray mr-2" @click="cancel">
                Anuluj
            </button>

            <button class="btn btn-red" @click="confirm">
                Usuń
            </button>
        </div>
    </modal-dialog>
</template>

<script>
  import ModalDialog from './ModalDialog.vue';

  export default {
    components: {
      ModalDialog
    },
    props: ['route', 'show'],
    methods: {
      cancel() {
        this.$emit('close');
      },
      confirm() {
        let form = document.createElement('form');
        form.setAttribute('method', 'post');
        form.setAttribute('action', this.route);

        let csrfField = document.createElement('input');
        csrfField.setAttribute('type', 'hidden');
        csrfField.setAttribute('name', '_token');
        csrfField.setAttribute('value', document.head.querySelector('meta[name="csrf-token"]').content);
        form.appendChild(csrfField);

        let methodField = document.createElement('input');
        methodField.setAttribute('type', 'hidden');
        methodField.setAttribute('name', '_method');
        methodField.setAttribute('value', 'DELETE');
        form.appendChild(methodField);

        document.body.appendChild(form);

        form.submit();
      },
    },
  };
</script>
