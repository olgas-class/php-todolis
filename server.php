<?php
require_once __DIR__ . "/partials/functions.php";
// Per risolvere il problema di CORS nel caso di front fatto con vite
// header("Access-Control-Allow-Origin: http://localhost:5173");
// header("Access-Control-Allow-Headers: X-Requested-With");

// Leggo il file
$list = get_data();

// Controllo se è la chiamata per inserire un nuovo TODO
// var_dump($_POST); 
if (isset($_POST["new_todo"])) {
  // CREATE
  // Leggo il nuovo todo dal post
  $new_todo = $_POST["new_todo"];
  $list = add_new_todo($new_todo, $list);
} else if (isset($_POST["action"]) && $_POST["action"] === "delete") {
  // DELETE
  $todo_index = $_POST["todo_index"];
  $list = delete_todo($todo_index, $list);
} else if (isset($_POST["action"]) && $_POST["action"] === "toggle-done") {
  // TOGGLE DONE
  $todo_index = $_POST["todo_index"];
  // nella psizione del todo_index dobbiamo cambiare il valore del attributo done
  $list = toggle_todo($todo_index, $list);
}

// RISPOSTA
send_http_response($list);
