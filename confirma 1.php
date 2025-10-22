<?php
$lanches = [
    '1' => ['nome' => 'The Bug Fixer', 'preco' => 45.00],
    '2' => ['nome' => 'Stack Overflow', 'preco' => 32.90],
    '3' => ['nome' => 'Kernel Panic', 'preco' => 39.90]
];

$combos = [
    '1' => ['nome' => 'Combo Refrigerante', 'preco' => 15.00],
    '2' => ['nome' => 'Combo Sobremesa', 'preco' => 18.00],
    '3' => ['nome' => 'Combo Família', 'preco' => 30.00]
];

$molhos = [
    'maionese' => ['nome' => 'Maionese da casa', 'preco' => 3.00],
    'barbecue' => ['nome' => 'Barbecue', 'preco' => 4.00],
    'cheddar' => ['nome' => 'Cheddar', 'preco' => 5.00]
];

$fretes = [
    'retirada' => ['nome' => 'Retirada (Grátis)', 'preco' => 0.00],
    'entrega_normal' => ['nome' => 'Entrega Normal', 'preco' => 9.00],
    'entrega_expressa' => ['nome' => 'Entrega Expressa', 'preco' => 15.00]
];

$pagamentos = [
    'pix' => ['nome' => 'Pix (10% de desconto)'],
    'cartao_credito' => ['nome' => 'Cartão de Crédito'],
    'dinheiro' => ['nome' => 'Dinheiro']
];

$nome = $_POST['nome'] ?? '';
$sobrenome = $_POST['sobrenome'] ?? '';
$email = $_POST['email'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$endereco = $_POST['endereco'] ?? '';
$bairro = $_POST['bairro'] ?? '';
$complemento = $_POST['complemento'] ?? '';
$cidade = $_POST['cidade'] ?? '';
$estado = $_POST['estado'] ?? '';
$cep = $_POST['cep'] ?? '';
$codpizza1 = $_POST['codpizza1'] ?? '';
$combo_selecionado = $_POST['combo'] ?? '';
$molhos_selecionados = $_POST['molhos'] ?? [];
$frete_selecionado = $_POST['frete'] ?? '';
$pagamento_selecionado = $_POST['pagamento'] ?? '';


$valor_total = 0;

if (isset($lanches[$codpizza1])) {
    $valor_total += $lanches[$codpizza1]['preco'];
}


if (isset($combos[$combo_selecionado])) {
    $valor_total += $combos[$combo_selecionado]['preco'];
}

foreach ($molhos_selecionados as $molho_id) {
    if (isset($molhos[$molho_id])) {
        $valor_total += $molhos[$molho_id]['preco'];
    }
}


if (isset($fretes[$frete_selecionado])) {
    $valor_total += $fretes[$frete_selecionado]['preco'];
}

$valor_a_pagar = $valor_total;
if ($pagamento_selecionado === 'pix') {
    $valor_a_pagar = $valor_total * 0.90; 
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação do Pedido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        h1, h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .resumo-item {
            margin-bottom: 10px;
        }
        .resumo-item strong {
            display: inline-block;
            min-width: 150px;
            color: #555;
        }
        .destaque {
            font-size: 1.2em;
            font-weight: bold;
            color: #ff9900;
        }
        hr {
            border: 0;
            height: 1px;
            background: #ccc;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Confirmação do Pedido</h1>
        
        <hr>

        <h2>Dados do Cliente</h2>
        <div class="resumo-item"><strong>Nome Completo:</strong> <?php echo htmlspecialchars($nome) . ' ' . htmlspecialchars($sobrenome); ?></div>
        <div class="resumo-item"><strong>E-mail:</strong> <?php echo htmlspecialchars($email); ?></div>
        <div class="resumo-item"><strong>Telefone:</strong> <?php echo htmlspecialchars($telefone); ?></div>
        <div class="resumo-item"><strong>Endereço:</strong> <?php echo htmlspecialchars($endereco); ?></div>
        <div class="resumo-item"><strong>Complemento:</strong> <?php echo htmlspecialchars($complemento); ?></div>
        <div class="resumo-item"><strong>Bairro:</strong> <?php echo htmlspecialchars($bairro); ?></div>
        <div class="resumo-item"><strong>Cidade:</strong> <?php echo htmlspecialchars($cidade); ?></div>
        <div class="resumo-item"><strong>Estado:</strong> <?php echo htmlspecialchars($estado); ?></div>
        <div class="resumo-item"><strong>CEP:</strong> <?php echo htmlspecialchars($cep); ?></div>

        <hr>

        <h2>Resumo do Pedido</h2>
        <div class="resumo-item"><strong>Lanche:</strong> <?php echo htmlspecialchars($lanches[$codpizza1]['nome'] ?? 'Nenhum'); ?> - R$ <?php echo number_format($lanches[$codpizza1]['preco'] ?? 0, 2, ',', '.'); ?></div>
        <div class="resumo-item"><strong>Combo:</strong> <?php echo htmlspecialchars($combos[$combo_selecionado]['nome'] ?? 'Nenhum'); ?> - R$ <?php echo number_format($combos[$combo_selecionado]['preco'] ?? 0, 2, ',', '.'); ?></div>
        
        <div class="resumo-item"><strong>Molhos Adicionais:</strong></div>
        <ul>
            <?php if (!empty($molhos_selecionados)): ?>
                <?php foreach ($molhos_selecionados as $molho_id): ?>
                    <li><?php echo htmlspecialchars($molhos[$molho_id]['nome'] ?? 'Molho não encontrado'); ?> - R$ <?php echo number_format($molhos[$molho_id]['preco'] ?? 0, 2, ',', '.'); ?></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Nenhum molho adicional</li>
            <?php endif; ?>
        </ul>

        <hr>

        <h2>Valores e Pagamento</h2>
        <div class="resumo-item"><strong>Valor Total dos Itens:</strong> R$ <?php echo number_format($valor_total - ($fretes[$frete_selecionado]['preco'] ?? 0), 2, ',', '.'); ?></div>
        <div class="resumo-item"><strong>Frete:</strong> <?php echo htmlspecialchars($fretes[$frete_selecionado]['nome'] ?? 'Não selecionado'); ?> - R$ <?php echo number_format($fretes[$frete_selecionado]['preco'] ?? 0, 2, ',', '.'); ?></div>

        <hr>

        <div class="resumo-item destaque"><strong>Valor Final da Compra:</strong> R$ <?php echo number_format($valor_a_pagar, 2, ',', '.'); ?></div>
        <div class="resumo-item"><strong>Forma de Pagamento:</strong> <?php echo htmlspecialchars($pagamentos[$pagamento_selecionado]['nome'] ?? 'Não selecionada'); ?></div>
    </div>
</body>
</html>