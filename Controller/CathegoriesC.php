<?php
	include_once 'config.php';
    include_once 'C:/xampp/htdocs/hiba/Model/cathegories.php';
	class 	cathegoriesC {
		function affichercathegoriess(){
			$sql="SELECT * FROM cathegories";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimercathegories($IDcathegories){
			$sql="DELETE FROM cathegories WHERE IDcathegories=:IDcathegories";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':IDcathegories', $IDcathegories);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajoutercathegories($cathegories){
			$sql="INSERT INTO cathegories (IDcathegories, nomcathegories) 
			VALUES (:IDcathegories,:nomcathegories)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'IDcathegories' => $cathegories->getIDcathegories(),
					'nomcathegories' => $cathegories->getnomcathegories(),
					
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recuperercathegories($IDcathegories){
			$sql="SELECT * from cathegories where IDcathegories=$IDcathegories";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$cathegories=$query->fetch();
				return $cathegories;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiercathegories($cathegories, $IDcathegories){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE cathegories SET 
						nomcathegories= :nomcathegories, 
					
						
					WHERE IDcathegories= :IDcathegories'
				);
				$query->execute([
					'nomcathegories' => $cathegories->getnomcathegories(),
					
					
					'IDcathegories' => $IDcathegories
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>