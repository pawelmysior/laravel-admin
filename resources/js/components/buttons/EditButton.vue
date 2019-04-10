<template>
    <a :href="route" class="btn btn-low btn-blue-outline" v-once>
        <slot>Edytuj</slot>
    </a>
</template>

<script>
  export default {
    props: ['route'],
  };
</script>
