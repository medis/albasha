<template>
  <tr>
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
