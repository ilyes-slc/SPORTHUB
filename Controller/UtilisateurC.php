<?PHP
	include "../config.php";
	require_once '../Model/Utilisateur.php';

	class UtilisateurC {
		
		function ajouterUtilisateur($Utilisateur){
			$sql="INSERT INTO Utilisateur (username, email, password) 
			VALUES (:username ,:email,:password)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'username' => $Utilisateur->getUsername(),
					'email' => $Utilisateur->getEmail(),
					'password' => $Utilisateur->getPassword()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
	/*	function signinUtilisateur($username,$password){
			$sql="SELECT * from Utilisateur where username='nassim' AND password=$password";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
			//	'username' => $Utilisateur->getUsername(),
			//	'password' => $Utilisateur->getPassword()
				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
					'username' => $Utilisateur->getUsername(),
					'password' => $Utilisateur->getPassword()
						
		}*/
		function modifierUtilisateur($Utilisateur){
			$sql="UPDATE users SET email = '$email',
			password = '$password'
			WHERE user_id = '$id'";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'email' => $_SESSION['email'],
					'password' => $_SESSION['password']
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function verifierUtilisateur($id)//updated
        {
            try {
                $db = config::getConnexion();
                $query = $db->prepare(
                    'UPDATE Utilisateur SET                           
                            verified = :verified
                        WHERE id = :id'
                );
                $query->execute([
                    'verified' => 1,
                    'id' => $id
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }

   
		

?>