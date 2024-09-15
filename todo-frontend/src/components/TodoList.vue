<template>
    <div>
        <h1>Todo List</h1>

        <form @submit.prevent="addTodo">
            <input v-model="newTodo.title" placeholder="Title" required />
            <input v-model="newTodo.description" placeholder="Description" required />
            <button type="submit">Add Todo</button>
        </form>

        <ul>
            <li v-for="todo in todos" :key="todo.id">
                <TodoItem :todo="todo" @delete="deleteTodo" @update="updateTodo" />
            </li>
        </ul>
    </div>
</template>

<script>
import TodoService from '@/services/todoService';
import TodoItem from './TodoItem.vue';
import API_URL from '@/services/todoService';
import axios from 'axios';

export default {
    components: { TodoItem },

    data() {
        return {
            todos: [],
            newTodo: {
                title: '',
                description: '',
            },
        };
    },

    created() {
        this.fetchTodos();
    },

    methods: {
        async fetchTodos() {
            const response = await axios.get(`${API_URL}`);
            this.todos = response.data;
        },

        async addTodo() {
            if (this.newTodo.title && this.newTodo.description) {
                const response = await axios.post(`${API_URL}`, this.newTodo);
                this.todos.push(response.data);
                this.newTodo = { title: '', description: '' }; // Reset form
            }
        },

        async deleteTodo(id) {
            await axios.delete(`${API_URL}/${id}`);
            this.todos = this.todos.filter(todo => todo.id !== id);
        },

        async updateTodo(updatedTodo) {
            await axios.put(`${API_URL}/${updatedTodo.id}`, updatedTodo);
            const index = this.todos.findIndex(todo => todo.id === updatedTodo.id);
            this.todos.splice(index, 1, updatedTodo);
        },
    },
};
</script>
