<template>
    <a :href="route" class="btn btn-low btn-gray" v-once>
        <slot>Wróć do listy</slot>
    </a>
</template>

<script>
  export default {
    props: ['route'],
  };
</script>
