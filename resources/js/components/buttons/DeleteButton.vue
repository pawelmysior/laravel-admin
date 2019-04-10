<template>
    <button class="btn btn-transparent" type="button" @click="modalOpen = true">
        <slot>Usuń</slot>

        <confirm-delete-modal
            :show="modalOpen"
            @close="modalOpen = false"
            :route="route"
        ></confirm-delete-modal>
    </button>
</template>

<script>
  import ConfirmDeleteModal from './../modals/ConfirmDeleteModal';

  export default {
    components: {
      ConfirmDeleteModal,
    },
    props: ['route'],
    data() {
      return {
        modalOpen: false,
      };
    },
  };
</script>
