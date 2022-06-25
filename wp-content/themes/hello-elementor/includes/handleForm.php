<?php
$res = [
    'status' => 0,
    'errors' => []
];
// if (!isset($_POST['name'])) {
//     $res['errors'][] = "name isn't set";
// } elseif (strlen($_POST['name']) < 2) {
//     $res['errors'][] = "name is invalid";
// }
// if (!isset($_POST['phone'])) {
//     $res['errors'][] = "phone isn't set";
// }
// if (!isset($_POST['email'])) {
//     $res['errors'][] = "email isn't set";
// }

// if (count($res['errors']) == 0) {
//     $res = [
//         'status' => 1,
//     ];
//     wp_insert_user($_POST)
// }

return $_POST;

?>