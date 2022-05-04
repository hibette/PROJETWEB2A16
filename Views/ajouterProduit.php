<?php
    include_once '../Model/Produit.php';
    include_once '../Controller/ProduitC.php';

    $error = "";

    // create produit
    $Produit = null;

    // create an instance of the controller
    $ProduitC = new ProduitC();
    if (
        isset($_POST["RefProduit"]) &&
		isset($_POST["Taille"]) &&		
        isset($_POST["Prix"]) &&
		isset($_POST["Genre"])
   
    ) {
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
            $ProduitC->ajouterProduit($Produit); // appel fn ajouter 
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
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="RefProduit">Numéro Produit:
                        </label>
                    </td>
                    <td><input type="text" name="RefProduit" id="RefProduit" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="Taille">Taille:
                        </label>
                    </td>
                    <td><input type="text" name="Taille" id="Taille" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Prix">Prix:
                        </label>
                    </td>
                    <td><input type="text" name="Prix" id="Prix" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Genre">Genre:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="Genre" id="Genre">
                    </td>
                </tr>
                
                            
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>