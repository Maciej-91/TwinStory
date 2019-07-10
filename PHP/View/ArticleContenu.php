<?php
$action = $_GET['action'];

//var_dump($elt);
switch ($action) {
    case "chap1":
        {
            $listArticle = ArticleManager::getByChapitre("Construction");
            echo '<div id="contenuArticle">';
            echo '<h2 class="titreArticle">Construction</h2>';  /*gérer le titre du chapitre en dynamique*/
                    foreach($listArticle as $article){
                    echo    '<div id="conteneurArticles">                      
                            
                        <h4>'.$article->getTitre().'</h4>
                        
                        <div class="p">'.ArticleManager::AfficherContenu($article->getIdArticle()).'</div>
                        <a href='.Parametre::getAdresseRoot().'> revenir</a>
                        </div>';
                    }'
                  </div>';
            break;
        }
    case "chap2":
        {
            $listArticle = ArticleManager::getByChapitre("Attentats: les faits");
            echo '<div id="contenuArticle">';
            echo '<h2 class="titreArticle">Attentats: les faits</h2>';  /*gérer le titre du chapitre en dynamique*/
                    foreach($listArticle as $article){
                    echo    '<div id="conteneurArticles">                      
                            
                        <h4>'.$article->getTitre().'</h4>
                        
                        <div class="p">'.ArticleManager::AfficherContenu($article->getIdArticle()).'</div>
                        <a href='.Parametre::getAdresseRoot().'> revenir</a>
                        </div>';
                    }'
                  </div>';
            break;
        }
    case "chap3":
        {
            $listArticle = ArticleManager::getByChapitre("Enquêtes et polémiques");
            echo '<div id="contenuArticle">';
            echo '<h2 class="titreArticle">Enquêtes et polémiques</h2>';  /*gérer le titre du chapitre en dynamique*/
                    foreach($listArticle as $article){
                    echo    '<div id="conteneurArticles">                      
                            
                        <h4>'.$article->getTitre().'</h4>
                        
                        <div class="p">'.ArticleManager::AfficherContenu($article->getIdArticle()).'</div>
                        <a href='.Parametre::getAdresseRoot().'> revenir</a>
                        </div>';
                    }'
                  </div>';
            break;
        }
    case "chap4":
        {
            $listArticle = ArticleManager::getByChapitre("Conséquences");
            echo '<div id="contenuArticle">';
            echo '<h2 class="titreArticle">Conséquences</h2>';  /*gérer le titre du chapitre en dynamique*/
                    foreach($listArticle as $article){
                    echo    '<div id="conteneurArticles">                      
                            
                        <h4>'.$article->getTitre().'</h4>
                        
                        <div class="p">'.ArticleManager::AfficherContenu($article->getIdArticle()).'</div>
                        <a href='.Parametre::getAdresseRoot().'> revenir</a>
                        </div>';
                    }'
                  </div>';
            break;
        }
}
?>