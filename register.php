<?php 

include ("connect.php");
$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql1 = "select id from utilisateurs where id = '$id' ";
$res1 = Mysqli_Query($connection,$sql1);

$existe=false;
while ($existe == false and $row = Mysqli_Fetch_Assoc($res1)) {
    
	if ($id == $row['id']) {
        
        echo "id déjà existante!!!";
		$exist=true;
    }
}


if($existe==false) {
	$sql = "insert into utilisateurs (id, username, email, password ) values ".
	"('$id','$username','$email','$password')";
		//echo $sql ."br>";
		$result = Mysqli_Query($connection,$sql);

        if($result ==TRUE)
			echo "Bonjour cher utilisateur ". $username. " ,".
			" ayant la matricule ". $id. ",vous êtes inscrit.";
		else
		{
			echo "Bonjour cher utilisateurs ". $username. " ,".
			" ayant la matricule ". $id. ",vous n'êtes pas inscrit car la matricule deja existante.";
		}
}
?>

        <p>Vous avez déjà un compte ? <a href="login.html">Connectez-vous ici</a>.</p>

    
    </div>
</body>
</html>
