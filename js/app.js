const { createApp } = Vue;

createApp({
  data() {
    return {
      subTitle: "Aggiungi un task",
      todos: [],
      newTodo: "",
      errorState: false,
      errorMessage: "",
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
            console.log(res.data);
            if (res.data.success === true) {
              this.todos = res.data.results;
            } else {
              this.errorMessage = res.data.errorMessage;
              this.errorState = true;
            }
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
    deleteToDo(index) {
      const data = {
        dataindex: index,
      };
      axios
        .post("./delete.php", data, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((res) => {
          if (res.data.success === true) {
            this.todos = res.data.results;
          }
        });
    },
    taskDone(index) {
      const data = {
        dataindex: index,
      };
      axios
        .post("./taskdone", data, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((res) => {
          if (res.data.success === true) {
            this.todos = res.data.results;
          }
        });
    },
  },
  created() {
    this.fetchToDo();
    console.log(this.todos);
  },
}).mount("#app");
