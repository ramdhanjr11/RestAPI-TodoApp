<?php

include_once "connection.php";

if (function_exists($_GET['fun'])) {
    $_GET['fun']();
} else {
    $response['status'] = 401;
    $response['message'] = "Url tidak ditemukan!"; 

    echo json_encode($response);
}

function getAllTodo() {
    global $connect;

    $query = mysqli_query($connect, "SELECT * FROM todo_tb");
    
    while($row = mysqli_fetch_object($query)) {
        $data[] = $row;
    }

    if (empty($data)) {
        $response['status'] = 201;
        $response['message'] = "Belum ada data!";
        $response['data'] = [];
    } else {
        $response['status'] = 200;
        $response['message'] = "Data tersedia!";
        $response['data'] = $data;
    }

    echo json_encode($response);
}

function getTodoById() {
    global $connect;

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        
        $query = mysqli_query($connect, "SELECT * FROM todo_tb WHERE id = $id");

        while($row = mysqli_fetch_object($query)) {
            $data[] = $row;
        }

        if (empty($data)) {
            $response['status'] = 201;
            $response['message'] = "Belum ada data!";
            $response['data'] = [];
        } else {
            $response['status'] = 200;
            $response['message'] = "Data tersedia!";
            $response['data'] = $data;
        }
        
    } else {
        $response['status'] = 401;
        $response['message'] = "Tidak terdapat parameter id";
    }

    echo json_encode($response);
}

function deleteTodoById() {
    global $connect;

    $todoId = $_GET['id'];
    $query = mysqli_query($connect, "DELETE FROM todo_tb WHERE id = '$todoId'");
    
    if ($query) {
        $response['status'] = 200;
        $response['message'] = "Sukses menghapus".$todoId;
    } else {
        $response['status'] = 400;
        $response['message'] = "Terjadi kesalahan saat menghapus";
    }

    echo json_encode($response);
}

function insertTodo() {
    global $connect;

    $check = array('title' => '', 'catatan' => '', 'tanggal' => '', 'status' => '');
    $checkMatch = count(array_intersect_key($_POST, $check));

    if ($checkMatch == count($check)) {

        $title      = $_POST['title'];
        $catatan    = $_POST['catatan'];
        $tanggal    = $_POST['tanggal'];
        $status     = $_POST['status'];

        $query = mysqli_query($connect, "INSERT INTO todo_tb SET 
                title = '$title',
                catatan = '$catatan',
                tanggal = '$tanggal',
                status = '$status'");

        if ($query) {
            $response['status'] = 200;
            $response['message'] = "Data berhasil ditambahkan!";
        } else {
            $response['status'] = 401;
            $response['message'] = "Data tidak berhasil ditambahkan!";
        }

    } else {
        $response['status'] = 400;
        $response['message'] = "Parameter tidak sesuai!";
    }

    echo json_encode($response);
}

function updateTodoById() {
    global $connect;

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
    
        $check = array('title' => '', 'catatan' => '', 'tanggal' => '', 'status' => '');
        $checkMatch = count(array_intersect_key($_POST, $check));

        if ($checkMatch == count($check)) {

            $title      = $_POST['title'];
            $catatan    = $_POST['catatan'];
            $tanggal    = $_POST['tanggal'];
            $status     = $_POST['status'];

            $query = mysqli_query($connect, "UPDATE todo_tb SET 
                    title = '$title',
                    catatan = '$catatan',
                    tanggal = '$tanggal',
                    status = '$status'
                    WHERE id = $id");

            if ($query) {
                $response['status'] = 200;
                $response['message'] = "Data berhasil diupdate!";
            } else {
                $response['status'] = 401;
                $response['message'] = "Data tidak berhasi diupdate!";
            }

        } else {
            $response['status'] = 400;
            $response['message'] = "Parameter tidak sesuai!";
        }

    } else {
        $response['status'] = 400;
        $response['message'] = "Tidak terdapat parameter id!";
    }

    echo json_encode($response);
}

?>