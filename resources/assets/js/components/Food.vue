<template>
  <tr>
    <td class="drag-handle">&#8693;</td>
    <td><slot name="thumbnail"></slot></td>
    <td><slot name="title"></slot></td>
    <td><slot name="price"></slot></td>
    <td><slot name="created"></slot></td>
    <td><slot name="actions"></slot></td>
  </tr>
</template>

<script>
    export default {
        // data() {
        //   return {};
        // }
    }
</script>
