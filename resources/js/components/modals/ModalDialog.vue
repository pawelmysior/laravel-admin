<template>
    <portal to="modals" v-if="show">
        <div class="fixed inset-0 bg-smoke flex">
            <div class="bg-white p-8 rounded w-full max-w-lg m-auto shadow-md">
                <slot></slot>
            </div>
        </div>
    </portal>
</template>

<script>
  export default {
    props: ['show'],
    watch: {
      show: {
        immediate: true,
        handler: show => {
          if (show) {
            document.body.style.setProperty('overflow', 'hidden');
          } else {
            document.body.style.removeProperty('overflow');
          }
        },
      },
    },
    created() {
      const escapeHandler = e => {
        if (e.key === 'Escape' && this.show) {
          this.cancel();
        }
      };
      document.addEventListener('keydown', escapeHandler);
      this.$once('hook:destroyed', () => {
        document.removeEventListener('keydown', escapeHandler);
      });
    },
    methods: {
      cancel() {
        this.$emit('close');
      },
    },
  };
</script>
