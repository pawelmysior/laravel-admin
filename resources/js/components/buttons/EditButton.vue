<template>
    <a class="btn btn-low btn-blue-outline" :href="route" v-once>
        <slot>Edytuj</slot>
    </a>
</template>

<script>
  export default {
    props: ['route'],
  };
</script>
