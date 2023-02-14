<?php
$url = "https://pokeapi.co/api/v2/pokemon/";
?>

<div style="max-width: 30%; margin: 10rem auto;">
    <form action="index.php" method="post" style="display: flex; flex-direction: column; align-items: center;">
        <label style="font-size: 30px;">Pokemon à ser pesquisado:</label>
        <input style="max-width: 30%;" type="text" name="pokemon" placeholder="pikachu...">
        <input style="max-width: 30%;" type="submit">
    </form>
</div>
<?php
    $pesquisa = $_POST["pokemon"];
    if(!empty($pesquisa)){
        $pokemon = json_decode(file_get_contents($url . $pesquisa));
        ?>
        <div style="max-width: 15%; margin: 2rem auto; display: flex; flex-direction: column; align-items: center; border: 1px solid black;">
            <h1 style="margin: 15px 0 10px 0;"><?=  ucfirst($pokemon->name) ?></h1>
            <h3 style="margin: 0;">Tipo: <?=  ucfirst($pokemon->types['0']->type->name) ?></h3>
            <h3 style="margin: 0;">Quantidade de Habilidades: <?= count($pokemon->abilities) ?></h3>
            <h3 style="margin: 0;">Quantidade de Movimentos: <?= count($pokemon->moves) ?></h3>
            <h3 style="margin: 0;">Peso: <?=  $pokemon->weight ?> kg</h3>
        </div>
        <?php
    }
?>

