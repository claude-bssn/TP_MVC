<?php
require_once 'modeles/recette.php';
require_once 'modeles/commentaire.php';
require_once 'framework/controller.php';
require_once 'framework/vue.php';
class ControllerRecette extends Controller
{
    private $recette;
    private $commentaire;
    private $erreur;
    public function __construct()
    {
        $this->recette = new Recette();
        $this->commentaire = new Commentaire();
    }
    public function index()
    {
    }
    // Affiche les détails sur une recette
   
    public function recette()
    {
        // code à implémenter
        // récupérer la recette
        // récupérer la liste des ingrédients
        // récupérer la liste des commentaires
        // générer la vue
        $recette = $this->recette->getRecette($_GET['id']);
        $ingredients = $this->recette->getIngredients($_GET['id']);
        $commentaires = $this->commentaire->getCommentaires($_GET['id']);

        $this->genererVue(array(
            'recette' => $recette->fetch(), 
            'ingredients' => $ingredients,
            'commentaires' => $commentaires,
            'erreur' => $this->erreur
        ));
    }

    // Ajoute un commentaire à une recette
    public function commenter()
    {
        // récupérer les paramètres (idRecette, auteur, contenu, note)
        // Sauvegarde du commentaire
        // Actualisation de l'affichage de la recette

        if (empty($_POST['auteur']) == true){
            // throw New Exception("l'auteur ne peut pas etre vide");
            // $erreur['auteur'] = ;
            $this->erreur = "l'auteur ne peut pas etre vide";
            $this->executerAction('recette');
        }else{
            $this->commentaire->ajouterCommentaire($_GET['id'], $_POST['auteur'], $_POST['contenu'], $_POST['note']);
            // $this->genererVue(array('commentaires' => $commentaires));
            header('location: index.php?controller=recette&action=recette&id='.$_GET['id']);
            exit;
        }

    }
}
