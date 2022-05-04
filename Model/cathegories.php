<?php
	class cathegories{
		private $IDcathegories=null;
		private $nomcathegories=null;
	
		
		
		private $password=null;
		function __construct($IDcathegories, $nomcathegories ){
			$this->IDcathegories=$IDcathegories;
			$this->nomcathegories=$nomcathegories;
		
			
		}
		function getIDcathegories(){
			return $this->IDcathegories;
		}
		function getnomcathegories(){
			return $this->nomcathegories;
		}
		

		function setIDcathegories(string $IDcathegories){
			$this->IDcathegories=$IDcathegories;
		}
		function setnomcathegories(string $nomcathegories){
			$this->nomcathegories=$nomcathegories;
		}

		
		}

	
		
		
		
	


?>