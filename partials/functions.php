<?php

/**
 * Legge i dati dal file e li trasforma in un array
 * @return array
 */
function get_data() {
  $list_string = file_get_contents("todo-list.json"); // string

  // Trasformo la stringa in un array
  return json_decode($list_string, true); // array
}


/**
 * Aggiunge un nuovo todo all'array e aggiorna la lista nel file
 * @param string $new_todo
 * @param array $todo_list
 * 
 * @return array
 */
function add_new_todo($new_todo, $todo_list) {
  // Aggiungo il nuovo todo nell'array
  $todo_list[] = [
    "text" => $new_todo,
    "done" => false
  ];

  // Trasformo l'array aggiornato in stringa json e la scrivo nel file todo-list.json
  file_put_contents("todo-list.json", json_encode($todo_list));
  return $todo_list;
}

/**
 * Toglie un todo dalla lista e aggiorna la lista nel file
 * @param int $index
 * @param array $todo_list
 * 
 * @return array
 */
function delete_todo($index, $todo_list) {
  array_splice($todo_list, $index, 1);
  file_put_contents("todo-list.json", json_encode($todo_list));
  return $todo_list;
}


/**
 * Cambia il valore del campo done del todo e aggiorna la lista nel file
 * @param int $index
 * @param array $todo_list
 * 
 * @return array
 */
function toggle_todo($index, $todo_list) {
  $todo_list[$index]["done"] = !$todo_list[$index]["done"];
  file_put_contents("todo-list.json", json_encode($todo_list));
  return $todo_list;
}


/**
 * Invia la risposta HTTP 
 * @param array $data
 * 
 * @return [type]
 */
function send_http_response($data) {
  // Compongo i dati della risposta
  $response_data = [
    "results" => $data,
    "success" => true
  ];

  // Trasform i dati in stringa json
  $json_list = json_encode($response_data);

  // Informo il browser che gli arriverà json
  header("Content-Type: application/json");

  // Invio la risposta
  echo $json_list;
}
