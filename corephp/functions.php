<?php

/**
 * @author Surinder Rana
 * @since 27/09/2024
 *  Check the user name and password exists in database
 */

function authentication($conn)
{
    /// Get the token and decode it according to the base64
    $headers = getallheaders();
    $authorizationHeader = $headers['Authorization'] ?? '';
    if (strpos($authorizationHeader, 'Bearer ') === 0) {
        $base64Token = substr($authorizationHeader, 7);
        $base64Encoded = base64_decode($base64Token);
        $data = explode('|', $base64Encoded);
        $userName = $data[0] ?? '';
        $password = $data[1] ?? '';
        // Validate user
        $sql = "SELECT * FROM users WHERE `email` = '$userName' AND `password` = '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return true;
        }
        return '403';
    } else {
        return '400';
    }
}


/**
 * @author Surinder Rana
 * @since 27/09/2024
 *  Get the Csv Data from the database
 */

function csvData($conn)
{
    $sql = "SELECT `id`,`title`,`description`,`status`,`priority` FROM tasks";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $row['status'] =  ChangeStatusText($row['status']);
            $row['priority'] =  ChangePriorityText($row['priority']);
            $data[] = $row;
        }
        array_unshift($data, ['ID', 'Title', 'Description', 'Status', 'Priority']);
        return $data;
    } else {
        return [];
    }
}


/**
 * @author Surinder Rana
 * @since 27/09/2024
 *  Status Label according to the Code
 */

function ChangeStatusText($status)
{
    $result = match ($status) {
        '0' => 'Pending',
        '1' => 'Completed',
        '2' => 'Hold',
        default => 'Pending',
    };
    return $result;
}


/**
 * @author Surinder Rana
 * @since 27/09/2024
 *  Priority Label according to the Code
 */

function ChangePriorityText($priority)
{
    $result = match ($priority) {
        '0' => 'Low',
        '1' => 'Medium',
        '2' => 'High',
        default => 'Low',
    };

    return $result;
}
