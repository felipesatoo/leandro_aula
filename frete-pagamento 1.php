<?php
$nome = $_POST['nome'] ?? '';
$sobrenome = $_POST['sobrenome'] ?? '';
$email = $_POST['email'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$endereco = $_POST['endereco'] ?? '';
$bairro = $_POST['bairro'] ?? '';
$codpizza1 = $_POST['codpizza1'] ?? '';
$codrefri2 = $_POST['codrefri2'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frete e Pagamento - Div's Burguer</title>
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
        .form-frete-pagamento {
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
        select, input[type="radio"] {
            margin-top: 5px;
        }
        .opcoes-radio {
            display: flex;
            flex-direction: column;
        }
        .opcoes-radio label {
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
        <h1>Frete e Pagamento</h1>
        <form action="confirma.php" method="post" class="form-frete-pagamento">
            <input type="hidden" name="nome" value="<?php echo htmlspecialchars($nome); ?>">
            <input type="hidden" name="sobrenome" value="<?php echo htmlspecialchars($sobrenome); ?>">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <input type="hidden" name="telefone" value="<?php echo htmlspecialchars($telefone); ?>">
            <input type="hidden" name="endereco" value="<?php echo htmlspecialchars($endereco); ?>">
            <input type="hidden" name="bairro" value="<?php echo htmlspecialchars($bairro); ?>">
            <input type="hidden" name="codpizza1" value="<?php echo htmlspecialchars($codpizza1); ?>">
            <input type="hidden" name="codrefri2" value="<?php echo htmlspecialchars($codrefri2); ?>">
            <h2>Opções de Frete</h2>
            <div class="opcoes-radio">
                <label>
                    <input type="radio" name="frete" value="retirada" required> Retirada (Grátis)
                </label>
                <label>
                    <input type="radio" name="frete" value="entrega_normal"> Entrega Normal (R$ 9,00)
                </label>
                <label>
                    <input type="radio" name="frete" value="entrega_expressa"> Entrega Expressa (R$ 15,00)
                </label>
            </div>
            <h2>Opções de Pagamento</h2>
            <div class="campo">
                <select name="pagamento" required>
                    <option value="">Selecione uma opção</option>
                    <option value="pix">Pix (10% de desconto)</option>
                    <option value="cartao_credito">Cartão de Crédito</option>
                    <option value="dinheiro">Dinheiro</option>
                </select>
            </div>
            <button type="submit">Próximo</button>
        </form>
    </div>
</body>
</html>