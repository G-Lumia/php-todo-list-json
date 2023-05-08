// MILESTONE 1
// Stampare all'interno di una lista HTML un item per ogni todo.
// Se la proprietà done è uguale a true, visualizzare il testo del todo sbarrato.
// MILESTONE 2
// Visualizzare a fianco ad ogni item ha una "x": cliccando su di essa, il todo viene rimosso dalla lista.
// MILESTONE 3
// Predisporre un campo di input testuale e un pulsante "aggiungi": cliccando sul pulsante, il testo digitato viene letto e utilizzato per creare un nuovo todo, che quindi viene aggiunto alla lista dei todo esistenti.Bonus:
// 1- oltre al click sul pulsante, intercettare anche il tasto ENTER per aggiungere il todo alla lista
// 2- cliccando sul testo dell'item, invertire il valore della proprietà done del todo corrispondente (se done era uguale a false, impostare true e viceversa)

const {createApp} = Vue;

createApp({
    data(){
        return {
            todoList: [],
            apiUrl: 'server.php',
            title: 'UE',
            newTodo : 
                {
                    todo : '',
                    completed : false
                }
        }
    },
    methods: {
        readList()
        {
            axios.get(this.apiUrl).then((res) => {
                this.todoList = res.data;
            });
        },
        updateList()
        {
            const data = {
                newTodo: this.newTodo
            };
            axios.post(this.apiUrl, data, {headers: { 'Content-Type': 'multipart/form-data'}}).then((res) => {});
        },
        //viene eliminata una task con un determinato indice
        deleteTodo(index)
        {
            this.todoList.splice(index , 1);
        },
        //una task viene contrassegnata come completata
        completeTodo(index)
        {
            this.todoList[index].done = true;
        },
        //cliccando sul testo della task, viene invertito il valore della proprietà done (se done era uguale a false, impostare true e viceversa)
        change(index)
        {
            if(this.todoList[index].done === true)
            {
                this.todoList[index].done = false;
            }
            else
            {
                this.todoList[index].done = true;
            }
        }
    },
    mounted(){
        this.readList();
    }
}).mount("#app");