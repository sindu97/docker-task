<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ApiService
{

    /**
     * @throws Exception
     * @author Surinder Rana
     * @since 27/09/2024
     * Create the Authorization Token for the Api Request
     */

    public function createtoken()
    {
        try {
            $user = Auth::user();
            $email = $user->email;
            $hashedPassword = $user->password;
            $string = $email . '|' . $hashedPassword;
            $encodedHashedPassword = base64_encode($string);
            return $encodedHashedPassword;
        } catch (Exception $e) {
            Log::info($e->getMessage() . 'createtoken');
            return false;
        }
    }

    /**
     * @throws Exception
     * @author Surinder Rana
     * @since 27/09/2024
     * Api Call for the Csv Download
     */

    public function downaloadCsv()
    {
        $token = $this->createtoken();
        if (!$token) {
            return false;
        }
        try {
            $url  = config('customApi.CORE_API_URL') . '/taskcsv.php';
            $method = 'GET';
            $response = $this->APiCall($url, $method, $token);
            if ($response->successful()) {
                $csvContent = $response->body();
                $data = json_decode($csvContent, true);
                $csvData = (isset($data['data'])) ? json_decode($data['data'], true) : [];
                if (empty($csvData)) {
                    return "No data found";
                } else {
                    $handle = fopen('php://output', 'w');
                    header('Content-Type: text/csv');
                    header('Content-Disposition: attachment; filename="taskList.csv"');
                    header('Cache-Control: private');
                    header('Content-Transfer-Encoding: binary');
                    fputcsv($handle, $csvData[0]);
                    // Output the data
                    foreach (array_slice($csvData, 1) as $row) {
                        fputcsv($handle, $row);
                    }
                    // Close the file pointer
                    fclose($handle);
                    exit;
                }
            }

            Log::info('Request failed' . 'downloadcsv');
            return false;
        } catch (Exception $e) {
            dd($e->getMessage());
            Log::info($e->getMessage() . 'downloadcsv Fail');
            return false;
        }
    }


    /**
     * @throws Exception
     * @author Surinder Rana
     * @since 27/09/2024
     * Generic Api Call function
     */

    public function APiCall($url, $method, $token)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->$method($url);
        return $response;
    }
}
