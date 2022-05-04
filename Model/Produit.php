<?php
	class Produit{
		private $RefProduit=null;
		private $Taille=null;
		private $nom=null;
		private $image=null;
		private $Prix=null;
		private $Genre=null;
		
		
		private $password=null;
		function __construct( $Taille, $Prix, $Genre,$nom,$image){
			$this->Taille=$Taille;
			$this->Prix=$Prix;
			$this->Genre=$Genre;
			$this->nom=$nom;
			$this->image=$image;
		}
		function getRefProduit(){
			return $this->RefProduit;
		}
		function getnom(){
			return $this->nom;
		}
		function getimage(){
			return $this->image;
		}
		function getTaille(){
			return $this->Taille;
		}
		function getPrix(){
			return $this->Prix;
		}
		function getGenre(){
			return $this->Genre;
		}
		function setRefProduit(string $RefProduit){
			$this->RefProduit=$RefProduit;
		}
		function setTaille(string $Taille){
			$this->Taille=$Taille;
		}
		function setPrix(string $Prix){
			$this->Prix=$Prix;
		}
		function setGenre(string $Genre){
			$this->Genre=$Genre;
		}
		function setnom(string $nom){
			$this->nom=$nom;
		}
		function setimage(string $image){
			$this->image=$image;
		}
		
		
	}


?>