<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>

  <body class="bg-primary">

    <!-- inizio header -->
    <header class="container rounded bg-light d-flex justify-content-between align-items-center my-3 p-3">
        <h1 class="text-primary">
            The ToDo List Generator
        </h1>
        <h2> Have fun creating your todo list!</h2>
    </header>
    <!-- fine header -->

    <!-- inizio main -->
    <main>
        <div id="app" class="container d-flex justify-content-center">
            <div class="p-5 bg-warning rounded">
                <!-- verrà visualizzato un input ed un bottone d'invio -->
                <div class="d-flex justify-content-center gap-3">
                    <input type="text" name="toDo" id="toDo" v-model="task">
                    <button class="btn btn-light" @click ="addTodo"> Invia </button>
                </div>
                <!-- viene verificato che ci siano elementi presenti all'interno del vettore todoList -->
                <ul class="py-4" v-if ="todoList.length > 0">
                    <!-- se sono presenti, vengono visualizzati-->
                    <li class="d-flex align-items-center justify-content-between py-2 gap-5" v-for="(task, index) in todoList" :key="index">
                        <!-- se la task è compiuta, sara sbarrata da una linea -->
                        <span @click = "change(index)" :class="task.done ? 'line': '' ">
                            {{task.todo.toUpperCase()}}
                        </span>
                        <!-- accanto alla task saranno presenti due pulsanti  -->
                        <div class="d-flex gap-4">
                            <!-- con questo bottone si potrà completare una task -->
                            <button class="btn btn-success" @click = "completeTodo(index)" ><i class="fa-solid fa-check text-light"></i> </button>
                            <!-- tramite questo bottone si potrà eliminare una task -->
                            <button class="btn btn-danger" @click.stop = "deleteTodo(index)"> <i class="fa-solid fa-xmark text-light"></i> </button>
                        </div>
                    </li>
                </ul>
                <!-- se non ci sono più task, verrà visualizzato un messaggio -->
                <ul v-else>
                    <h3 class="text-danger text-center my-3"> La tua lista è vuota </h3>
                </ul>
            </div>
        </div>
    </main>
    <!-- fine main -->
    
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="./js/myscript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>