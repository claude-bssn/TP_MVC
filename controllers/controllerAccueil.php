<?php
require_once 'modeles/recette.php';
require_once 'framework/controller.php';
require_once 'framework/vue.php';
class ControllerAccueil extends Controller
{
    private $recette;
    public function __construct()
    {
        $this->recette = new Recette();
    }
    // Affiche la liste de toutes les recettes du blog
    public function index()
    {
        $recettes = $this->recette->getRecettes();
        var_dump($recettes);
        $this->genererVue(array('recette' => $recettes));
        // code à implémenter
        // récupérer la liste des recettes
        // générer la vue
        
    }
}
