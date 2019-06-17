<?php
class myPoll{
private $host = 'localhost';
private $user = 'root';
private $password = '';
private $database = 'opiniondb';
private $pollTable = 'poll';
private $dbConnect = false;
public $msg="You have successfully voted!";
public $color="green";
// Create connection
public function __construct(){
if(!$this->dbConnect){
$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
if($conn->connect_error){
die("Error failed to connect to MySQL: " . $conn->connect_error);
}else{
$this->dbConnect = $conn;
}
}
}
public function addVote($sql) {
	$author = $_POST["author"];
	$conn=$this->dbConnect;
	if(isset($_SESSION['voted'])){
		$this->msg="You have already voted!";
		$this->color="orange";
	}
		else {
			if ($conn->query($sql) === TRUE) {
				/* echo "New record created successfully"; */
				} else {
						$sql = "SELECT count From poll WHERE author='$author'";
						$result = $conn->query($sql);
						$data= $result->fetch_assoc();
						$count = $data["count"] + 1;
						/* echo $count; */
						$sql = "UPDATE Poll SET count=$count WHERE author='$author'";
						if ($conn->query($sql) === TRUE) {
							/* echo "New record created successfully"; */
							} else {
								echo "Error: " . $sql . "<br>" . $conn->error;
								}
						}
			return TRUE;
		}
	}	
public function getCount($authoris) {
	$conn=$this->dbConnect;
	$authorCount=0;
	$sql = "SELECT count From poll WHERE author='$authoris'";
	$result = $conn->query($sql);
	$data= $result->fetch_assoc();
	if($data["count"]>0) {
	 $authorCount = $data["count"];
	}
	return $authorCount;
	
}
}

?>