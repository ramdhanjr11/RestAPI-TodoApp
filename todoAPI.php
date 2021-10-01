<?php

include_once "connection.php";

if (function_exists($_GET['fun'])) {
    $_GET['fun']();
} else {
    $response['status'] = 403;
    $response['message'] = "Url tidak ditemukan!"; 

    echo json_encode($response);
}

// CRUD todo

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

// CRUD tabel Pengguna

function insertImage() {
    global $connect;

    $image = $_FILES['file']['tmp_name'];
    $imageName = $_FILES['file']['name'];

    $filePath = $_SERVER['DOCUMENT_ROOT']."/todoAPI/gambar";

    if (!file_exists($filePath)) {
        mkdir($filePath, 0777, true);
    }

    if (!$image) {
        $response["status"] = 400;
        $response["message"] = "Gambar tidak ditemukan";
    } else {
        if (move_uploaded_file($image, $filePath.'/'.$imageName)) {
            $response["status"] = 200;
            $response["message"] = "Sukses upload gambar";
        }
    }

    echo json_encode($response);
}

function get_pengguna_by_id() {
    global $connect;

    if (!empty($_GET["id"])) {
        $id = $_GET["id"]; 
        
        $query = mysqli_query($connect, "SELECT * FROM pengguna_tb WHERE id = $id");

        if ($query) {

            while($row = mysqli_fetch_object($query)) {
                $data[] = $row;
            }
        
            if (empty($data)) {
                $response["status"] = 201;
                $response["message"] = "Data tidak tersedia";
            } else {
                $response["status"] = 200;
                $response["message"] = "Sukses mengambil data";
                $response["data"] = $data;
            }

        } else {
            $response["status"] = 404;
            $response["message"] = "Terjadi kesalahan dalam server";
        }

    } else {
        $response["status"] = 400;
        $response["message"] = "Masukan parameter id";
    }

    echo json_encode($response);
}

function get_all_pengguna() {
    global $connect;
        
    $query = mysqli_query($connect, "SELECT * FROM pengguna_tb");

    if ($query) {

        while($row = mysqli_fetch_object($query)) {
            $data[] = $row;
        }
    
        if (empty($data)) {
            $response["status"] = 201;
            $response["message"] = "Data belum tersedia";
        } else {
            $response["status"] = 200;
            $response["message"] = "Sukses mengambil data";
            $response["data"] = $data;
        }

    } else {
        $response["status"] = 404;
        $response["message"] = "Terjadi kesalahan dalam server";
    }

    echo json_encode($response);
}

function insert_pengguna() {
    global $connect;

    $check = array('nama' => '', 'alamat' => '', 'email' => '', 'image' => '', 'password' => '');
    $checkMatch = count(array_intersect_key($_POST, $check));

    if ($checkMatch == count($check)) {

        $nama       = $_POST["nama"];
        $alamat     = $_POST["alamat"];
        $email      = $_POST["email"];
        $image      = $_POST["image"];
        $password   = $_POST["password"];

        $query = mysqli_query($connect, "INSERT INTO pengguna_tb SET 
                nama = '$nama',
                alamat = '$alamat',
                email = '$email', 
                image = '$image',
                password = '$password'");

        if ($query) {
            $response["status"] = 200;
            $response["message"] = "Sukses memasukan data pengguna";
        } else {
            $response["status"] = 404;
            $response["message"] = "Terjadi kesalahan";
        }

    } else {
        $response["status"] = 400;
        $response["message"] = "Parameter tidak sesuai";
    }

    echo json_encode($response);
}

function delete_pengguna() {
    global $connect;

    if (!empty($_GET["id"])) {
        $id = $_GET["id"];

        $query = mysqli_query($connect, "DELETE FROM pengguna_tb WHERE id = $id");

        if ($query) {
            $response["status"] = 200;
            $response["message"] = "Pengguna berhasil dihapus";
        } else {
            $response["status"] = 404;
            $response["message"] = "Terjadi kesalahan";
        }

    } else {
        $response["status"] = 400;
        $response["message"] = "Masukan parameter id";
    }

    echo json_encode($response);
}

function update_pengguna() {
    global $connect;

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];

        $check = array('nama' => '', 'alamat' => '', 'email' => '', 'image' => '', 'password' => '');
        $checkMatch = count(array_intersect_key($_POST, $check));

        if ($checkMatch == count($check)) {

            $nama       = $_POST["nama"];
            $alamat     = $_POST["alamat"];
            $email      = $_POST["email"];
            $image      = $_POST["image"];
            $password   = $_POST["password"];

            $query = mysqli_query($connect, "UPDATE pengguna_tb SET 
                    nama = '$nama',
                    alamat = '$alamat',
                    email = '$email',
                    image = '$image',
                    password = '$password' WHERE id = $id");

            if ($query) {
                $response["status"] = 200;
                $response["message"] = "Data pengguna berhasil diupdate";
            } else {
                $response["status"] = 404;
                $response["message"] = "Terjadi kesalahan";
            }
        } else {
            $response["status"] = 401;
            $response["message"] = "Parameter tidak sesuai";
        }

    } else {
        $response["status"] = 400;
        $response["message"] = "Masukan parameter id";
    }

    echo json_encode($response);
}

function login() {
    global $connect;

    $check      = array('email' => '', 'password' => '');
    $checkMatch = count(array_intersect_key($_POST, $check));
    
    if ($checkMatch == count($check)) {
        
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $query    = mysqli_query($connect, "SELECT * FROM pengguna_tb WHERE email = '$email' && password = '$password'");
        $row      = mysqli_num_rows($query);

        if ($row > 0) {
            $response["status"] = 200;
            $response["mesasge"] = "Login sukses";
            $response["data"] = mysqli_fetch_object($query);
        } else {
            $response["status"] = 400;
            $response["message"] = "Login gagal";
        }

    } else {
        $response["status"] = 403;
        $response["message"] = "Masukan parameter";
    }

    echo json_encode($response);
}
?>