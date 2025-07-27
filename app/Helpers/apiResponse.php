<?php

function api_response(bool $success = true, $data = [],string $message = 'Process Successed', int $statusCode = 200)
{
    return response()->json([
        'success' => $success,
        'data' => $data,
        'message' => $message,
    ],$statusCode);

}
