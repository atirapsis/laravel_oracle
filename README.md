How to Connect Laravel 10 to Oracle 10g

Download Oracle 10g
Link :https://drive.google.com/file/d/19si_aseUoIEsBVM813xFC8fVzvEVm5QV/view

Oracle Instant Client 
Link: https://www.oracle.com/database/technologies/instant-client/winx64-64-downloads.html

PECL OCI
Link: https://pecl.php.net/package/oci8

Move all .dll file Oci to laragon/bin/php/ext

Move all .dll file from Instant Client to laragon/bin/apache 

Enable extension at Laragon (oci8_19 and pdo_oci)

Create a project with Laravel 10 

Install Oracle SQL Developer on Visual Studio Code 

Install Yajra package for oracle 
Link : https://yajrabox.com/docs/laravel-oci8/10.0/installation

Look for file tnsnames.ora at oracle/product/server/NETWORK/ADMIN

Insert information from tnsnames.ora to:

--> env. 

--> oracle.php 
comment edition 

--> web.php
 add this coding 

Route::get('/oci', function () {

    // $host = 'SHUKRI';
    // $port = '1521';
    // $service_name = 'XE';
    // $username = 'BMS';
    // $password = 'password';

    $host = 'hsnzdb1';
    $port = '1521';
    $service_name = 'FSCLIVE';
    $username = 'fisicien';
    $password = 'zxcvbnm';

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


Run the project at the laragon terminal
--> php artisan serve

Based on the web.php, add /oci 

Try to php artisan migrate:fresh 

From there, your project successfully connected to Oracle 10g.

-------------------------------------------------------------------------------------------

Website: 
https://tarsoft.com.my/

Instagram: 
https://www.instagram.com/tarsoft.co/ 

TikTok: 
https://www.tiktok.com/@tarsoft.co?lang=en 

YouTube: 
https://www.youtube.com/@TarsoftSdnBhd

Telegram: 
https://t.me/tarsoftco 

Email: 
admin@tarsoft.co

