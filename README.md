## API

### Prelevare tutti i todo
URL: http://localhost/boolean/classe124/php-todolis/server.php
METHOD: GET
RESPONSE: 
  results: array
  success: boolean


### Aggiungere un nuvo todo
URL: http://localhost/boolean/classe124/php-todolis/server.php
METHOD: POST
REQ BODY: 
  new_todo: string
RESPONSE: 
  results: array
  success: boolean

### Cancella un todo
URL: http://localhost/boolean/classe124/php-todolis/server.php
METHOD: POST
REQ BODY:
  action: "delete"
  todo_index: number
RESPONSE: 
  results: array
  success: boolean


### Toggle done del todo
URL: http://localhost/boolean/classe124/php-todolis/server.php
METHOD: POST
REQ BODY:
  action: "toggle-done"
  todo_index: number
RESPONSE: 
  results: array
  success: boolean