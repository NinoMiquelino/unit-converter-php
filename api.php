<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// --- Lógica de Conversão (PHP Puro) ---

function convertUnit($value, $from, $to) {
    // Garante que o valor é um float
    $value = (float) $value;

    // Tabela de conversões (Foco em Temperatura e Distância para demo)
    $conversion_map = [
        // --- TEMPERATURA ---
        'celsius' => [
            'fahrenheit' => fn($v) => ($v * 9 / 5) + 32,
            'kelvin' => fn($v) => $v + 273.15,
            'celsius' => fn($v) => $v // Conversão para si mesmo
        ],
        'fahrenheit' => [
            'celsius' => fn($v) => ($v - 32) * 5 / 9,
            'kelvin' => fn($v) => (($v - 32) * 5 / 9) + 273.15,
            'fahrenheit' => fn($v) => $v
        ],
        'kelvin' => [
            'celsius' => fn($v) => $v - 273.15,
            'fahrenheit' => fn($v) => ($v - 273.15) * 9 / 5 + 32,
            'kelvin' => fn($v) => $v
        ],
        
        // --- DISTÂNCIA ---
        'kilometers' => [
            'miles' => fn($v) => $v / 1.60934,
            'meters' => fn($v) => $v * 1000,
            'kilometers' => fn($v) => $v
        ],
        'miles' => [
            'kilometers' => fn($v) => $v * 1.60934,
            'meters' => fn($v) => $v * 1609.34,
            'miles' => fn($v) => $v
        ],
        'meters' => [
            'kilometers' => fn($v) => $v / 1000,
            'miles' => fn($v) => $v / 1609.34,
            'meters' => fn($v) => $v
        ]
    ];

    $from = strtolower($from);
    $to = strtolower($to);
    
    // 1. Verifica se a unidade de origem é suportada
    if (!isset($conversion_map[$from])) {
        throw new Exception("Unidade de origem '$from' não suportada.");
    }
    
    // 2. Verifica se a conversão de origem para destino é suportada
    if (!isset($conversion_map[$from][$to])) {
        throw new Exception("Conversão de '$from' para '$to' não é uma operação conhecida.");
    }

    // Realiza a conversão chamando a função anônima
    $result = $conversion_map[$from][$to]($value);

    // Retorna o resultado formatado com 4 casas decimais para precisão
    return number_format($result, 4, '.', '');
}


// --- Lógica da API ---

$method = $_SERVER['REQUEST_METHOD'] ?? '';

if ($method === 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    $value = $data['value'] ?? null;
    $from = $data['from'] ?? null;
    $to = $data['to'] ?? null;
    
    $result = ['success' => false, 'result' => null, 'error' => ''];

    try {
        if (!is_numeric($value) || $value === null) {
            throw new Exception("Valor inválido fornecido.");
        }
        if (empty($from) || empty($to)) {
            throw new Exception("Unidades de origem ou destino não especificadas.");
        }

        $converted_value = convertUnit($value, $from, $to);
        
        $result['success'] = true;
        $result['result'] = $converted_value;

    } catch (Exception $e) {
        http_response_code(400);
        $result['error'] = $e->getMessage();
    }

    echo json_encode($result);
    
} elseif ($method === 'OPTIONS') {
    http_response_code(200);
    exit();
} else {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Método não permitido.']);
}
?>