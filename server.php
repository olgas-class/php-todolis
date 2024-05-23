<?php
// Leggo il file
$list_string = file_get_contents("todo-list.json"); // string

// Trasformo la stringa in un array
$list = json_decode($list_string, true); // array

// var_dump($list);
// Controllo se è la chiamata per inserire un nuovo TODO
// var_dump($_POST); 
if (isset($_POST["new_todo"])) {
  // API per inserire un nuovo todo
  // Leggo il nuovo todo dal post
  $new_todo = $_POST["new_todo"];
  // Aggiungo il nuovo todo nell'array
  $list[] = [
    "text" => $new_todo,
    "done" => false
  ];

  // Trasformo l'array aggiornato in stringa json e la scrivo nel file todo-list.json
  file_put_contents("todo-list.json", json_encode($list));
}

// RISPOSTA
// Compongo i dati della risposta
$response_data = [
  "results" => $list,
  "success" => true
];

// Trasform i dati in stringa json
$json_list = json_encode($response_data);

// Informo il browser che gli arriverà json
header("Content-Type: application/json");

// Invio la risposta
echo $json_list;
