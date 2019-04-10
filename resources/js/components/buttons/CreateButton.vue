<template>
    <a class="btn btn-low btn-blue" :href="route">
        <slot>Nowy</slot>
    </a>
</template>

<script>
  export default {
    props: ['route'],
  };
</script>
