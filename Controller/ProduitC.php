<?php
	include 'config.php';
    include_once 'C:/xampp/htdocs/hiba/Model/Produit.php';
	class 	ProduitC {
		function afficherProduits(){
			$sql="SELECT * FROM Produit";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerProduit($RefProduit){
			$sql="DELETE FROM Produit WHERE RefProduit=:RefProduit";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':RefProduit', $RefProduit);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterProduit($Produit){
			$sql="INSERT INTO Produit (nom, Taille, Prix, Genre ,image) 
			VALUES (:nom,:taille,:prix, :genre , :image)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'nom' => $Produit->getnom(),
					'taille' => $Produit->getTaille(),
					'prix' => $Produit->getPrix(),
					'genre' => $Produit->getGenre(),
					'image' => $Produit->getimage()
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererProduit($RefProduit){
			$sql="SELECT * from Produit where RefProduit=$RefProduit";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Produit=$query->fetch();
				return $Produit;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierProduit($Produit, $RefProduit){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE Produit SET 
						Taille= :Taille, 
						Prix= :Prix, 
						Genre= :Genre,
						nom=:nom,
						image= :image
						
					WHERE RefProduit= :RefProduit'
				);
				$query->execute([
					'Taille' => $Produit->getTaille(),
					'Prix' => $Produit->getPrix(),
					'Genre' => $Produit->getGenre(),
					'nom' => $Produit->getnom(),
					'image' => $Produit->getimage(),
					'RefProduit' => $RefProduit
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>