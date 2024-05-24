const { createApp } = Vue;

createApp({
  data() {
    return {
      message: "Hello",
      todos: [],
      newTodo: "",
      apiUrl: "http://localhost/boolean/classe124/php-todolis/server.php",
    };
  },
  created() {
    axios.get(this.apiUrl).then((resp) => {
      this.todos = resp.data.results;
    });
  },
  methods: {
    saveNewTodo() {
      const data = {
        new_todo: this.newTodo,
      };

      axios
        .post(this.apiUrl, data, {
          headers: {
            "Content-type": "multipart/form-data",
          },
        })
        .then((resp) => {
          this.todos = resp.data.results;
        });
    },
    cancelTodo(index) {
      const data = {
        action: "delete",
        todo_index: index,
      };
      axios
        .post(this.apiUrl, data, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((resp) => {
          this.todos = resp.data.results;
        });
    },
    toggleDone(index) {
      const data = {
        action: "toggle-done",
        todo_index: index,
      };
      axios
        .post(this.apiUrl, data, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((resp) => {
          this.todos = resp.data.results;
        });
    },
  },
}).mount("#app");
