<?PHP
class user{

	private $id;
	private $nom;
	private $mail;
	private $pass;
	private $type;
	function __construct($id,$nom,$mail,$pass,$type){
		$this->id=$id;
		$this->nom=$nom;
		$this->mail=$mail;
		$this->pass=$pass;
		$this->type=$type;
	}
	
	function getId(){
		return $this->id;
	}

	function getNom(){
		return $this->nom;
	}
	function getMail(){
		return $this->mail;
	}
	function getPass(){
		return $this->pass;
	}
	function getType(){
		return $this->type;
	}

	function setNom($nom){
		$this->nom=$nom;
	}
	function setMail($mail){
		$this->mail;
	}
	function setPass($pass){
		$this->pass=$pass;
	}
	function setType($type){
		$this->type=$type;
	}
	
}

?>