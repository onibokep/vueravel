<template>
  <tr class="article">
    <td>{{id}}</td>
    <td class="title">{{title}}</td>
    <td class="content">{{content}}</td>
    <td class="action">
      <button @click="del" class="btn btn-dark">Delete</button>
      <button @click="edit" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Edit</button>
    </td>
  </tr>
</template>
<script>
export default {
  methods: {
    del() {
      this.$emit('delete', this.id);
    },
    edit() {
      this.$emit('edit', this.id, this.title, this.content);
    }
  },
  props: ['id', 'title', 'content'],
}
</script>