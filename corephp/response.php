<?php

/**
 * @author Surinder Rana
 * @since 27/09/2024
 *  Functions Used to provide the status code and message
 */

function ApiResponses($status, $csvData = null)
{
    if ($status == '403') {
        $data = [
            "status" => 403,
            "message" => 'UnAuthenticated User'
        ];
        return $data;
    }
    if ($status == '400') {
        $data = [
            "status" => 400,
            "message" => 'Bad Request'
        ];
        return $data;
    }
    if ($status == '200') {
        $data = [
            'status' => 200,
            'data' => json_encode($csvData)
        ];
        return $data;
    }
}
