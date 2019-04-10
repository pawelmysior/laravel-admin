<template>
    <a class="btn btn-low btn-gray" :href="route">
        <slot>Wróć do listy</slot>
    </a>
</template>

<script>
  export default {
    props: ['route'],
  };
</script>
