<template>
    <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
      <span class="block">{{ message }}</span>
    </div>

</template>

<script>
export default {
  props: ['message'],
  name: "MessageLeft"
}
</script>