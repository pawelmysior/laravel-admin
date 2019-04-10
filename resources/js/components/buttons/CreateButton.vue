<template>
    <a :href="route" class="btn btn-low btn-blue" v-once>
        <slot>Nowy</slot>
    </a>
</template>

<script>
  export default {
    props: ['route'],
  };
</script>
