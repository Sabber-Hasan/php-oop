<template>
    <div>
      <input v-if="editing" v-model="editedTodo.title" placeholder="Title" />
      <input v-if="editing" v-model="editedTodo.description" placeholder="Description" />
  
      <span v-else>{{ todo.title }} - {{ todo.description }}</span>
  
      <button @click="toggleEdit">{{ editing ? 'Save' : 'Edit' }}</button>
      <button @click="deleteTodo">Delete</button>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      todo: Object,
    },
  
    data() {
      return {
        editing: false,
        editedTodo: { ...this.todo },
      };
    },
  
    methods: {
      toggleEdit() {
        if (this.editing) {
          this.$emit('update', this.editedTodo);
        }
        this.editing = !this.editing;
      },
  
      deleteTodo() {
        this.$emit('delete', this.todo.id);
      }
    }
  };
  </script>
  