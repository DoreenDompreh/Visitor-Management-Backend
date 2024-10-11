<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class SmsHelper
{
    protected $client;
    protected $apiUrl;

    public function __construct()
    {
        $this->client = new Client;
    }

    public function send($to, $message): array
    {
        // Validate the inputs
        if (empty($to) || empty($message)) {
            return $this->errorResponse('Recipient phone number and message are required.');
        }

        try {
            // Sending the SMS via Guzzle
            $response = $this->client->get($this->apiUrl = env('api/example/send?'), [
                'query' => [
                    'from' => 'FF',
                    'to' => $to,
                    'message' => $message,
                ],
            ]);

            // Decode the response to array
            $responseBody = json_decode($response->getBody()->getContents(), true);

            // Log the success and return the response
            Log::info("SMS sent to {$to}: {$message}");
            return $this->successResponse('SMS sent successfully', $responseBody);
        } catch (\Exception $e) {
            // Log and return an error response
            Log::error('Failed to send SMS: ' . $e->getMessage());
            return $this->errorResponse('Failed to send SMS', $e->getMessage());
        }
    }

    /**
     * Helper to format a successful response.
     *
     * @param string $message
     * @param array|null $data
     * @return array
     */
    private function successResponse(string $message, array $data = null): array
    {
        return [
            'success' => true,
            'message' => $message,
            'data' => $data,
        ];
    }

    /**
     * Helper to format an error response.
     *
     * @param string $message
     * @param string|null $error
     * @return array
     */
    private function errorResponse(string $message, string $error = null): array
    {
        return [
            'success' => false,
            'message' => $message,
            'error' => $error,
        ];
    }
}
