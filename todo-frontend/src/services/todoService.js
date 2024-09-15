import axios from 'axios';

const API_URL =  process.env.VUE_APP_API_URL; 

export default {
  // Get all todos
  getAllTodos() {
    return axios.get(API_URL);
  },

  // Create a new todo
  createTodo(todo) {
    return axios.post(API_URL, todo);
  },

  // Update a todo
  updateTodo(id, todo) {
    return axios.put(`${API_URL}/${id}`, todo);
  },

  // Delete a todo
  deleteTodo(id) {
    return axios.delete(`${API_URL}/${id}`);
  }
};
