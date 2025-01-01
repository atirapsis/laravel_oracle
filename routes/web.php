<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/oci', function () {

    $host = 'LAPTOP-IK7C1JGP';
    $port = '1521';
    $service_name = 'XE';
    $username = 'TASK';
    $password = 'password';


    $XE = "(DESCRIPTION =
        (ADDRESS = (PROTOCOL = TCP)(HOST = $host)(PORT = $port))
        (CONNECT_DATA =
            (SERVICE_NAME = $service_name)
        )
    )";

    $conn = oci_connect($username, $password, $XE);

    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    } else {

        return 'Connected to Oracle Database';
        // $sql = 'SELECT * FROM  BMS.USERS';
        // $stmt = oci_parse($conn, $sql);
        // if (!$stmt) {
        //     $e = oci_error($conn);
        //     trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        // } else {
        //     oci_execute($stmt);
        //     while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
        //         foreach ($row as $item) {
        //             echo $item;
        //         }
        //     }
        // }
    }

    oci_close($conn);
})->name('oci');
