<?php
require_once 'db.php';

if ($_GET) {
  $method = $_GET['method'];
  if ($method == 'addnotes') {
    $data = $_GET['data'];
    $status = addnotes($data);
    if ($status != '') {
      $output = array('status' => 'success', 'id' => $status);
    }
    else {
      $output = array('status' => 'error');
    }
    echo json_encode($output);
  }
  if ($method == 'delnotes') {
    $id = $_GET['id'];
    $status = delnotes($id);
    if ($status == 'success') {
      $output = array('status' => 'success');
    }
    else {
      $output = array('status' => 'error');
    }
    echo json_encode($output);
  }

}

function addnotes($data) {
  $last_id = db_insert('notes', [
    'description' => $data
  ]);
  return db_select('notes', ['id' => $last_id]);
}

function delnotes($id) {
  $delete = db_delete('notes', ['id' => $id]);
  if ($delete) {
    return 'success';
  }
  return FALSE;
}

function loadnotes() {
  $notes = db_select('notes', ['1' => '1']);
  foreach ($notes as $note) {
    echo '<li id="' . $note['id'] . '" >' . $note['description'] . '
		<a href="#"class="event-close"> &#10005; </a>
	</li>';
  }
}
