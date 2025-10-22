<?php
$nome = $_POST['nome'] ?? '';
$sobrenome = $_POST['sobrenome'] ?? '';
$email = $_POST['email'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$endereco = $_POST['endereco'] ?? '';
$bairro = $_POST['bairro'] ?? '';

// Validação dos dados do formulário
if (empty($nome) || empty($sobrenome) || empty($email) || empty($telefone) || empty($endereco) || empty($bairro)) {
    // Redireciona de volta para a página de coleta se algum campo estiver vazio
    header('Location: coleta.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha seu Pedido - Div's Burguer</title>
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
            max-width: 500px;
            width: 100%;
        }
        h1, h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-pedido {
            display: grid;
            gap: 20px;
        }
        .campo {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }
        select, input[type="radio"], input[type="checkbox"] {
            margin-top: 5px;
        }
        .opcoes-radio, .opcoes-checkbox {
            display: flex;
            flex-direction: column;
        }
        .opcoes-radio label, .opcoes-checkbox label {
            font-weight: normal;
        }
        button {
            background-color: #ff9900;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }
        button:hover {
            background-color: #e68a00;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Escolha seu Pedido</h1>
        <h2>Dados do Produto</h2>
        
        <form action="frete-pagamento.php" method="post" class="form-pedido">
            <input type="hidden" name="nome" value="<?php echo htmlspecialchars($nome); ?>">
            <input type="hidden" name="sobrenome" value="<?php echo htmlspecialchars($sobrenome); ?>">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <input type="hidden" name="telefone" value="<?php echo htmlspecialchars($telefone); ?>">
            <input type="hidden" name="endereco" value="<?php echo htmlspecialchars($endereco); ?>">
            <input type="hidden" name="bairro" value="<?php echo htmlspecialchars($bairro); ?>">

            <div class="campo">
                <label for="lanches">Lanches:</label>
                <select name="codlanche" id="lanches" required>
                    <option value="">Selecione um lanche</option>
                    <option value="1">The Bug Fixer - R$45,00</option>
                    <option value="2">Stack Overflow - R$32,90</option>
                    <option value="3">Kernel Panic - R$39,90</option>
                </select>
            </div>
            
            <h2>Escolha seu Combo</h2>
            <div class="opcoes-radio">
                <label>
                    <input type="radio" name="combo" value="1" required> Combo Refrigerante - Inclui refrigerante + batata
                </label>
                <label>
                    <input type="radio" name="combo" value="2"> Combo Sobremesa - Inclui refrigerante + sobremesa
                </label>
                <label>
                    <input type="radio" name="combo" value="3"> Combo Familia - Inclui 2 lanches + refrigerante 2L
                </label>
            </div>
            
            <h2>Molhos Adicionais</h2>
            <div class="opcoes-checkbox">
                <label>
                    <input type="checkbox" name="molhos[]" value="maionese"> Maionese da casa (+R$ 3,00)
                </label>
                <label>
                    <input type="checkbox" name="molhos[]" value="barbecue"> Barbecue (+R$ 4,00)
                </label>
                <label>
                    <input type="checkbox" name="molhos[]" value="cheddar"> Cheddar (+R$ 5,00)
                </label>
            </div>
            
            <button type="submit">Próximo</button>
        </form>
    </div>
</body>
</html>