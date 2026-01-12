<?php
// Arquivo: view/treino_detalhes.php
session_start();
if (!isset($_SESSION['id_usuario'])) { header('Location: login.php'); exit(); }

// Se não veio o ID do treino na URL, volta pro menu
if (!isset($_GET['id_treino'])) { header('Location: meus_treinos.php'); exit(); }

$id_treino = $_GET['id_treino'];

// Importa os Models necessários
require_once '../model/clsExercicio.php';
require_once '../model/clsItemTreino.php';

// 1. Busca lista de exercícios para preencher o <select>
$objExercicio = new clsExercicio();
$listaExercicios = $objExercicio->listar();

// 2. Busca os itens que já foram adicionados neste treino
$objItem = new clsItemTreino();
$meusItens = $objItem->listarDoTreino($id_treino);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>SudoLift - Treinando</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { max-width: 800px; margin: 0 auto; }
        
        .card-form { background: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        
        /* Layout do formulário lado a lado */
        .form-row { display: flex; gap: 10px; flex-wrap: wrap; }
        .form-group { flex: 1; min-width: 100px; }
        
        input, select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;}
        label { font-size: 12px; font-weight: bold; color: #555; }
        
        .btn-add { background-color: #007bff; color: white; border: none; padding: 10px; width: 100%; border-radius: 4px; cursor: pointer; margin-top: 22px; }
        .btn-concluir { display: block; background-color: #28a745; color: white; text-align: center; padding: 15px; text-decoration: none; border-radius: 8px; font-weight: bold; font-size: 18px; margin-top: 20px;}
        
        /* Tabela dos itens já feitos */
        .item-lista { background: white; padding: 15px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center; }
        .item-info { font-size: 16px; font-weight: bold; }
        .item-detalhe { font-size: 14px; color: #666; }
        .btn-remove { color: red; text-decoration: none; font-weight: bold; border: 1px solid red; padding: 5px 10px; border-radius: 4px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Registrando Treino</h2>

    <div class="card-form">
        <form action="../controller/ctrl_ItemTreino.php" method="POST">
            <input type="hidden" name="treino_id" value="<?php echo $id_treino; ?>">
            
            <div class="form-row">
                <div class="form-group" style="flex: 3;"> <label>Exercício:</label>
                    <select name="exercicio_id" required>
                        <option value="">Selecione...</option>
                        <?php
                        // Preenche o dropdown com o banco de dados
                        while($ex = mysqli_fetch_assoc($listaExercicios)) {
                            echo "<option value='" . $ex['id'] . "'>" . $ex['nome'] . " (" . $ex['grupo_muscular'] . ")</option>";
                        }
                        ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Carga (kg):</label>
                    <input type="number" name="carga" step="0.5" placeholder="Kg" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Séries:</label>
                    <input type="number" name="series" value="3" required>
                </div>
                <div class="form-group">
                    <label>Reps:</label>
                    <input type="number" name="repeticoes" value="10" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-add">+ Adicionar</button>
                </div>
            </div>
        </form>
    </div>

    <h3>Histórico de hoje:</h3>
    <div style="background: white; border-radius: 8px; overflow: hidden;">
        <?php
        if (mysqli_num_rows($meusItens) > 0) {
            while ($item = mysqli_fetch_assoc($meusItens)) {
                echo "<div class='item-lista'>";
                
                echo "<div>";
                echo "<div class='item-info'>" . $item['nome_exercicio'] . "</div>";
                echo "<div class='item-detalhe'>" . $item['series'] . " séries x " . $item['repeticoes'] . " reps | Carga: " . $item['carga_kg'] . "kg</div>";
                echo "</div>";

                // Botão de Excluir Item
                echo "<a href='../controller/ctrl_ItemTreino.php?acao=excluir&id_item=" . $item['id'] . "&id_treino=$id_treino' class='btn-remove'>X</a>";
                
                echo "</div>";
            }
        } else {
            echo "<p style='padding:20px; text-align:center; color:#777;'>Nenhum exercício registrado ainda.</p>";
        }
        ?>
    </div>

    <a href="meus_treinos.php" class="btn-concluir">✓ Finalizar Treino</a>

</div>

</body>
</html>