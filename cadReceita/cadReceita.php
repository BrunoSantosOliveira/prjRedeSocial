<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Receita</title>
</head>
<body>
    <h1>Adicionar Receita</h1>
    <form id="form-receita" method="POST" action="insertReceita.php" enctype="multipart/form-data">
        <label for="nomeReceita">Nome da Receita:</label>
        <input type="text" id="nomeReceita" name="nomeReceita" required>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required></textarea>

        <label for="fotoReceita">Foto:</label>
        <input type="file" id="fotoReceita" name="fotoReceita">

        <h3>Ingredientes</h3>
        <div id="ingredientes-container">
            <div class="ingrediente-item">
                <input type="text" class="ingrediente-nome" name="ingrediente[]" required placeholder="Digite ou busque um ingrediente" onkeyup="buscarIngrediente(this)">
                <input type="text" class="ingrediente-quantidade" name="quantidade[]" required placeholder="Quantidade">
                <button type="button" onclick="adicionarIngrediente()">Adicionar outro ingrediente</button>
                <button type="button" onclick="excluirIngrediente()">Excluir ingrediente</button>
            </div>
        </div>
        <input type="submit" value="Adicionar Receita">
    </form>

    <script>
        function buscarIngrediente(input) {
            let query = input.value;
            if (query.length > 2) {
                fetch('pesqIngrediente.php?query=' + query)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                    });
            }
        }

        function adicionarIngrediente() {
            let container = document.getElementById('ingredientes-container');
            let div = document.createElement('div');
            div.classList.add('ingrediente-item');
            div.innerHTML = `
                <input type="text" class="ingrediente-nome" name="ingrediente[]" required placeholder="Digite ou busque um ingrediente" onkeyup="buscarIngrediente(this)">
                <input type="text" class="ingrediente-quantidade" name="quantidade[]" required placeholder="Quantidade">
            `;
            container.appendChild(div);
        }

        function excluirIngrediente(){
            let container = document.getElementById('ingredientes-container');
            container.removeChild(container.lastChild);
        }
    </script>
</body>
</html>
