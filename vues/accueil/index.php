<?php
?>
<div id="global">
    <?php while ($recette = $recettes->fetch()): ?>
    <article>
        
        <header>
            <img class="imgRecette" src="img/<?= $recette["photo"]?>" width="300px" height="242px" alt="Tartiflette" />
            <a href="index.php?controller=recette&action=recette&id=<?= $recette["id"]?>">
                <h1 class="titreRecette">
                    <?= $recette["titre"] ?>
                </h1>
            </a>
            <time>
                <?= gmdate('j/m/Y', strtotime($recette["dateCreation"])); ?>
            </time>
        </header>
        <p>
        <?= $recette["description"] ?>
        </p>
    </article>
    <?php endwhile;  ?>
    <hr />

</div>