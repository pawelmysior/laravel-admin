<template>
    <a class="btn btn-low btn-blue" :href="route" v-once>
        <slot>Nowy</slot>
    </a>
</template>

<script>
  export default {
    props: ['route'],
  };
</script>
