<?php
define('GEMINI_API_KEY', getenv('GEMINI_API_KEY') ?: 'YOUR_GEMINI_API_KEY');
define('GEMINI_URL', 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=' . GEMINI_API_KEY);

function obtenerPistaIA($error_mysql, $query_alumno) {
    $prompt = "Actúa como un mentor de programación RPG. El alumno intentó esta query SQL: '$query_alumno' " .
              " pero recibió este error: '$error_mysql'. " .
              "Dale una pista sutil en tono fantástico para que lo corrija, pero NO le des la respuesta directa.";

    $data = [
        "contents" => [["parts" => [["text" => $prompt]]]]
    ];

    $ch = curl_init(GEMINI_URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    
    $response = curl_exec($ch);
    $result = json_decode($response, true);

    return $result['candidates'][0]['content']['parts'][0]['text'] ?? "El Oráculo está dormido... intenta revisar tus comas.";
}