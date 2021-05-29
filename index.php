<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Pa Pg</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <form action="" method="post">
    <label for="felem">Valor do primeiro elemento(a1):</label>
    <input type="text" id="felem" name="felem" placeholder="0000"><br>

    <label for="razao">Razão:</label>
    <input type="text" id="razao" name="razao" placeholder="0000"><br>

    <label for="nelem">Quantidade de elementos:</label>
    <input type="text" id="nelem" name="nelem" placeholder="0000"><br>

    <select>
        <option value="PA" name="paO">Progressão aritimética</option>
        <option value="PG" name="pgO">Progressão geométrica</option>
    </select>
    <br>
    <label for="namefile">Nome do arquivo JSON:</label>
    <input type="text" id="namefile" name="namefile" placeholder="filename.json">
    <br>
    <input type="submit" value="Salvar">
    </form>
</body>