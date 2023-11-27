const { createApp } = Vue;

createApp({
  data() {
    return {
      subTitle: "Aggiungi un task",
      todos: [],
      newTodo: "",
    };
  },
  methods: {
    addTodo() {
      console.log(this.newTodo);

      if (this.newTodo) {
        const data = {
          todo: this.newTodo.trim(),
        };
        axios
          .post("./store.php", data, {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          })
          .then((res) => {
            this.todos = res.data.results;
            console.log(res.data.results);
            console.log(this.newTodo);
          });

        this.newTodo = "";
      }
    },
    fetchToDo() {
      axios.get("./server.php").then((res) => {
        console.log(res.data.results);
        this.todos = res.data.results;
      });
    },
  },
  created() {
    this.fetchToDo();
    console.log(this.todos);
  },
}).mount("#app");
