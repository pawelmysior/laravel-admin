<template>
    <div v-html="require('!!html-loader!./../../svg/zondicons/' + this.icon + '.svg')" v-once></div>
</template>

<script>
  export default {
    props: ['icon'],
    mounted() {
      this.$el.firstChild.classList.add(...this.$el.className.split(' '));
      this.$el.firstChild.classList.add('fill-current');
      this.$el.outerHTML = this.$el.innerHTML;
    },
  };
</script>
