<template>
  <card class="text-center">
    <h3 class="mb-4">
      {{ $t('404 Page Note Found') }}
    </h3>

    <div class="links">
      <router-link :to="{ name: 'welcome' }">
        {{ $t('Go Home') }}
      </router-link>
    </div>
  </card>
</template>

<script>
export default {
  name: 'NotFound'
}
</script>
