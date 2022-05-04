<?php
    include_once '../Model/Produit.php';
    include_once '../Controller/ProduitC.php';

    $error = "";

    // create Produit
    $Produit = null;

    // create an instance of the controller
    $ProduitC = new ProduitC();
    if (
        isset($_POST["RefProduit"]) &&
		isset($_POST["Taille"]) &&		
        isset($_POST["Prix"]) &&
		isset($_POST["Genre"])
   
        )
     {
        if (
            !empty($_POST["RefProduit"]) && 
			!empty($_POST['Taille']) &&
            !empty($_POST["Prix"]) && 
			!empty($_POST["Genre"]) 
          
            
        ) {
            $Produit = new Produit(
                $_POST['RefProduit'],
				$_POST['Taille'],
                $_POST['Prix'], 
				$_POST['Genre']
             
                
            );
            $ProduitC->modifierProduit($Produit, $_POST["RefProduit"]);
            header('Location:afficherListeProduits.php');
        }
        else
            $error = "Missing information";
    }    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="afficherListeProduits.php">Retour à la liste des Produits</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['RefProduit'])){
				$Produit = $ProduitC->recupererProduit($_POST['RefProduit']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="RefProduit">Numéro Produit:
                        </label>
                    </td>
                    <td><input type="text" name="RefProduit" id="RefProduit" value="<?php echo $Produit['RefProduit']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="Taille">Taille:
                        </label>
                    </td>
                    <td><input type="text" name="Taille" id="Taille" value="<?php echo $Produit['Taille']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Prix">Prix:
                        </label>
                    </td>
                    <td><input type="text" name="Prix" id="Prix" value="<?php echo $Produit['Prix']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Genre">Genre:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="Genre" value="<?php echo $Produit['Genre']; ?>" id="Genre">
                    </td>
                </tr>
               
                             
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
    </body>
</html>