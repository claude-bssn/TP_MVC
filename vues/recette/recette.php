<div id="global">
    <article>
        <header>
            <img class="imgRecette" src="img/<?= $recette["photo"]?>" alt="Tartiflette" />
            <h1 class="titreRecette">
                <?= $recette["titre"]?>
            </h1>
            <time>
                <?= gmdate('j/m/Y', strtotime($recette["dateCreation"])); ?>
            </time>
        </header>
        <p>
        <?= $recette["description"]?>

        </p>
    </article>
    <hr />
    <header>
        <h2 id="titreIngredient">
            Ingrédients
        </h2>
        <ul>
        <?php while ($ingredient = $ingredients->fetch()): ?>
            <li><?= $ingredient['quantite']." ".$ingredient['unit']." ". $ingredient['nom']?></li>
        <?php endwhile; ?>
        </ul>
    </header>
    <h2 id="titreCommentaire">
        Commentaires
    </h2>
   
    <?php while ($commentaire = $commentaires->fetch()): ?>
        <div class="divCommentaire">
            <p><?= $commentaire['auteur']?> : <?= $commentaire['contenu']?> </p>
            <p> Note : <?= $commentaire['note']?>/5 </p>
            <p>
                <?= gmdate('j/m/Y', strtotime($commentaire["dateCreation"])); ?>

            </p>
            <hr>
        </div>
    <?php endwhile; ?>
    <form method="post" action="index.php?controller=recette&action=commenter&id=<?= $recette['id']?> ">
        <input id="auteur" name="auteur" type="text" placeholder="Votre Nom" /><br />
        <textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire"></textarea><br />
        <label for="note">Note</label><br />
        <select name="note" id="note">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br />
        <input type="submit" value="Commenter" />
    </form>
    
    <div id="erreur" >
    <?php if (isset($erreur)):?>
        <p > <?= $erreur?> </p>
    <?php endif;?>
    </div>
</div>