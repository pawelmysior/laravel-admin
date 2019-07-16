<template>
    <a class="flex items-center mb-3 whitespace-no-wrap text-sm text-white hover:text-blue-400" :href="route" v-once>
        <svg-icon class="text-blue-400 h-4 w-4 mr-3" :icon="icon"></svg-icon>
        <span v-html="label"></span>
    </a>
</template>

<script>
  export default {
    props: [
      'icon',
      'label',
      'route',
    ],
  };
</script>
