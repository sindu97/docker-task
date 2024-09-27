<?php
include('./DbConnect.php');
include('./functions.php');
include('./response.php');
$csvdata = [];
// Check the Authentication
$authUser = authentication($conn);
if ($authUser) {
    $csvdata = csvData($conn);
    $authUser = '200';
}
/// Get the data form DB
$data =  ApiResponses($authUser, $csvdata);
echo json_encode($data);
$conn->close();
exit;
