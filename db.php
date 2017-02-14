<?php
define("DB_HOST", "");
define("DB_USER", "");
define("DB_PASS", "");
define("DB_NAME", "");


function db_select($table, $query, $order = array()) {
  $pdo = new PDO('mysql:host=' . DB_HOST . ';' . 'dbname=' . DB_NAME . '', DB_USER, DB_PASS);
  $quey_key = array_keys($query);
  $query_values = array_values($query);
  $sql_query_condition = "";
  for ($i = 0; $i < count($quey_key); $i++) {
    if (!isset($quey_key[$i + 1])) {
      $sql_query_condition .= $quey_key[$i] . "=?";
    }
    else {
      $sql_query_condition .= $quey_key[$i] . "=? and ";
    }
  }
  $squ_query_final = "SELECT * FROM " . $table . " WHERE " . $sql_query_condition;

  if (!empty($order)) {
    $squ_query_final .= "Order By " . $order['field'] . " " . $order['pos'];
  }

  $stmt = $pdo->prepare($squ_query_final);
  $stmt->execute($query_values);
  $res = $stmt->fetchAll();
  return $res;
}

function db_insert($table, $data) {
  $question_mark = array_fill(0, count($data), "?");
  $keys = array_keys($data);
  $values = array_values($data);
  $query = "insert into " . $table . "(" . implode(',', $keys) . ") value (" . implode(',', $question_mark) . ')';
  $pdo = new PDO('mysql:host=' . DB_HOST . ';' . 'dbname=' . DB_NAME . '', DB_USER, DB_PASS);
  $stmt = $pdo->prepare($query);
  $stmt->execute($values);

  return $pdo->lastInsertId();
}

function db_delete($table, $conditions) {
  $conditions_key = array_keys($conditions);
  $conditions_value = array_values($conditions);
  $pdo = new PDO('mysql:host=' . DB_HOST . ';' . 'dbname=' . DB_NAME . '', DB_USER, DB_PASS);
  $sql_query_condition = "";
  for ($i = 0; $i < count($conditions_key); $i++) {
    if (!isset($conditions_key[$i + 1])) {
      $sql_query_condition .= $conditions_key[$i] . "=?";
    }
    else {
      $sql_query_condition .= $conditions_key[$i] . "=? and ";
    }
  }
  $squ_query_final = "DELETE FROM " . $table . " WHERE " . $sql_query_condition;
  //echo $squ_query_final;
  $stmt = $pdo->prepare($squ_query_final);
  return $stmt->execute($conditions_value);
}