<?php

function success_response($data = [],string $message = 'Process Successed', int $statusCode = 200)
{
    return response()->json([
        'success' => true,
        'data' => $data,
        'message' => $message,
    ],$statusCode);
}
function error_response(string $message = 'Process Successed', int $statusCode = 300)
{
    return response()->json([
        'success' => false,
        'data' => null,
        'message' => $message,
    ],$statusCode);
}
