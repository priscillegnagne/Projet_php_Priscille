<!-- code php très inspiré du cours et adapté au code html -->
<?php
$info = '';

if(isset($_POST['ajout_panier'])) {
    if(isset($_COOKIE['panier'])) {
        $cookie_contenu = $_COOKIE['panier'];
        $panier_contenu = json_decode($cookie_contenu, true);
    } else{
        $panier_contenu = array();
    }

    $article_liste = array_column($panier_contenu, 'hidden_id');
    if(in_array($_POST["hidden_id"], $article_liste)) {
        foreach($panier_contenu as $k => $v) {
            if($panier_contenu[$k]["hidden_id"] == $_POST["hidden_id"]) {
                $panier_contenu[$k]["quantite"] = $panier_contenu[$k]["quantite"] + $_POST["quantite"];
            }
        }
    } else{
        $article_array = array(
            'hidden_id' => $_POST['hidden_id'],
            'hidden_article' => $_POST['hidden_article'],
            'hidden_prix' => $_POST['hidden_prix'],
            'quantite' => $_POST['quantite']
        );

        $panier_contenu[] = $article_array;
    }

    $article_contenu = json_encode($panier_contenu);
    setcookie('panier',$article_contenu, time ()+1800);
    header("location:projetP.php?succes=1");
}
if(isset($_GET["action"]) == "effacer") {
    setcookie('panier','', time () -900,);
    header("location:projetP.php?effacerTout=1");
}

if(isset($_GET['succes'])) {
    $info ='
    <div>
        Produit mis dans le panier
    </div>
    ';
} 

if(isset($_GET['effacerTout'])) {
    $info ='
    <div>
    Plus rien dans le panier
    </div>
    ';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ballons et raquettes de sport</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
   <header>
       <h1>Ballons et raquettes de sport</h1>
       <!-- logo fait avec www.canva.com -->
       <div id="logo">
			<img src="images/logo-ballon.png" width="170"
			height="170" alt=">Ballons et raquettes de sport" /> 
		</div>
       <nav>
			<ul>
				<li><a href="#ballons">Ballons</a></li>
				<li><a href="#raquettes">Raquettes</a></li>
				<li><a href="#pied-page">Contactez-nous</a></li>
			</ul>
		</nav>
   </header>

   <main class="contenu">
        <?php
        if(isset($_COOKIE['panier'])) {}
            echo $info;
        ?>

        <div id="ballons">
            <form method="post">
                <div class="ballon">
                    <img src="images/ballon_soccer.jpg" alt="ballon soccer">
                    <h4>Ballon de soccer</h4>
                    <h4>25$</h4>
                    <input type="text" name="quantite" value="1">
                    <input type="hidden" name="hidden_article" value="Ballon de soccer">
                    <input type="hidden" name="hidden_prix" value="25">
                    <input type="hidden" name="hidden_id" value="1">
                    <input type="submit" value="Ajouter au panier" name="ajout_panier">
                </div>
            </form>
            <form method="post">
                <div class="ballon">
                    <img src="images/basketball.jpg" alt="ballon basket">
                    <h4>Ballon de basket</h4>
                    <h4>30$</h4>
                    <input type="text" name="quantite" value="1">
                    <input type="hidden" name="hidden_article" value="Ballon de basket">
                    <input type="hidden" name="hidden_prix" value="30">
                    <input type="hidden" name="hidden_id" value="2">
                    <input type="submit" value="Ajouter au panier" name="ajout_panier">
                </div>
            </form>
            <form method="post">
                <div class="ballon">
                    <img src="images/handball.jpg" alt="ballon handball">
                    <h4>Ballon de handball</h4>
                    <h4>20$</h4>
                    <input type="text" name="quantite" value="1">
                    <input type="hidden" name="hidden_article" value="Ballon de handball">
                    <input type="hidden" name="hidden_prix" value="20">
                    <input type="hidden" name="hidden_id" value="3">
                    <input type="submit" value="Ajouter au panier" name="ajout_panier">
                </div>
            </form>
            <form method="post">
                <div class="ballon">
                    <img src="images/balloon-equipment.jpg" alt="ballon exercice">
                    <h4>Ballon d exercice</h4>
                    <h4>20$</h4>
                    <input type="text" name="quantite" value="1">
                    <input type="hidden" name="hidden_article" value="Ballon d exercice">
                    <input type="hidden" name="hidden_prix" value="20">
                    <input type="hidden" name="hidden_id" value="4">
                    <input type="submit" value="Ajouter au panier" name="ajout_panier">
                </div>
            </form>
       </div>
       <div id="raquettes">
            <form method="post">
                <div class="raquette">
                    <img src="images/tennis-racket.jpg" alt="raquette tennis">
                    <h4>Raquette de tennis</h4>
                    <h4>50$</h4>
                    <input type="text" name="quantite" value="1">
                    <input type="hidden" name="hidden_article" value="Raquette de tennis">
                    <input type="hidden" name="hidden_prix" value="50">
                    <input type="hidden" name="hidden_id" value="5">
                    <input type="submit" value="Ajouter au panier" name="ajout_panier">
                </div>
            </form>
            <form method="post">
                <div class="raquette">
                    <img src="images/badminton.jpg" alt="raquette badminton">
                    <h4>Raquette de badminton</h4>
                    <h4>50$</h4>
                    <input type="text" name="quantite" value="1">
                    <input type="hidden" name="hidden_article" value="Raquette de badminton">
                    <input type="hidden" name="hidden_prix" value="50">
                    <input type="hidden" name="hidden_id" value="6">
                    <input type="submit" value="Ajouter au panier" name="ajout_panier">
                </div>
            </form>
            <form method="post">
                <div class="raquette">
                    <img src="images/table-tennis.jpg" alt="raquette tennis de table">
                    <h4>Raquette de tennis de table</h4>
                    <h4>30$</h4>
                    <input type="text" name="quantite" value="1">
                    <input type="hidden" name="hidden_article" value="Raquette de tennis de table">
                    <input type="hidden" name="hidden_prix" value="30">
                    <input type="hidden" name="hidden_id" value="7">
                    <input type="submit" value="Ajouter au panier" name="ajout_panier">
                </div>
            </form>
       </div>
       <div style="clear:both">
            <br />
            <a href="projetP.php?action=clear">Vider le panier</a>
            <h2>Detail de la commande</h2>
            <div class="detail-commande">
                <div class="affichage">
                    <div class="case">Article</div>
                    <div class="case">Prix unitaire</div>
                    <div class="case">Quantite</div>
                    <div class="case">Total</div>
                </div><br/>
            
            <?php

            if(isset($_COOKIE['panier'])){
                $total = 0;
                $cookie_contenu = stripslashes($_COOKIE['panier']);
                $panier_contenu = json_decode($cookie_contenu, true);
                foreach($panier_contenu as $k => $v){                
                
                ?>    
                    <div class="af">
                        <div class="case"><?php echo $v["hidden_article"]; ?></div>
                        <div class="case"><?php echo $v["hidden_prix"]; ?></div>
                        <div class="case"><?php echo $v["quantite"]; ?></div>
                        <div class="case"><?php echo number_format($v["quantite"]*$v["hidden_prix"],2) ?>$<br/></div> 
                    </div>

                <?php
                }
            } else{
                echo "Le panier est vide";
            }
                ?>

            </div>
        </div>
                
   </main>

    <footer id="pied-page">
        <h2>Nous joindre</h2>
        <h3>Ballons et raquettes de sport</h3>
        <p>
            Mont-Laurier (Québec), Canada J9L 3B7<br/>
            Téléphone&#160;: (438) 501-XXXX<br/>
            Courriel&#160;: <a href="mailto:info@ballons-raquettes-sport.ca">info@ballons-raquettes-sport.ca</a><br/>
            &#169; Tous droits réservés 2022, Ballons et raquettes de sport
        </p>  
            
    </footer>
</body>
</html>
