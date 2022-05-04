<?php
    include_once '../Model/cathegories.php';
    include_once '../Controller/cathegoriesC.php';

    $error = "";

    // create cathegories
    $cathegories = null;

    // create an instance of the controller
    $cathegoriesC = new cathegoriesC();
    if (
        isset($_POST["IDcathegories"]) &&
		isset($_POST["nomcathegories"]) 		
       
        )
     {
        if (
            !empty($_POST["IDcathegories"]) && 
			!empty($_POST['nomcathegories']) 
          
          
            
        ) {
            $cathegories = new cathegories(
                $_POST['IDcathegories'],
				$_POST['nomcathegories'],
                
             
                
            );
            $cathegoriesC->modifiercathegories($cathegories, $_POST["IDcathegories"]);
            header('Location:affichercathegories.php');
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
        <button><a hid="affichercathegories.php">Retour à la liste des cathegoriess</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>

        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="IDcathegories">Numéro cathegories:
                        </label>
                    </td>
                    <td><input type="text" name="IDcathegories" id="IDcathegories" value="<?php echo $cathegories['IDcathegories']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="nomcathegories">nomcathegories:
                        </label>
                    </td>
                    <td><input type="text" name="nomcathegories" id="nomcathegories" value="<?php echo $cathegories['nomcathegories']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        
                  
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>

    </body>
</html>