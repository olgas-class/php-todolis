const { createApp } = Vue;

createApp({
  data() {
    return {
      message: "Hello",
      todos: [],
      newTodo: "",
    };
  },
  created() {
    axios
      .get("http://localhost/boolean/classe124/php-todolis/server.php")
      .then((resp) => {
        this.todos = resp.data.results;
      });
  },
  methods: {
    saveNewTodo() {
      const data = {
        new_todo: this.newTodo,
      };

      axios
        .post(
          "http://localhost/boolean/classe124/php-todolis/server.php",
          data,
          {
            headers: {
              "Content-type": "multipart/form-data",
            },
          }
        )
        .then((resp) => {
          this.todos = resp.data.results;
        });
    },
  },
}).mount("#app");
