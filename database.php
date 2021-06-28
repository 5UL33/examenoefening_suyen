<?php
class Database {
	private $dbh;
	public function __construct() {
		try {
			$dsn = "mysql:host=localhost;dbname=examenoefening_suyen;charset=utf8";
			$this->dbh = new PDO($dsn, 'root', 'root');
		} catch (\PDOException $exception) {
			exit('Unable to connect. Error message ' . $exception-getMessage());
		}
	}


	public function create_gebruiker() {
		$hashed_password = password_hash('Gebruiker', PASSWORD_DEFAULT);
		$sql = 'INSERT INTO Gebruiker VALUES (NULL, :voornaam, :achternaam, :telefoonnummer, :email, :wachtwoord)';	
		$statement = $this->dbh->prepare($sql);
		$statement->execute([
			'voornaam' => 'Johnny',
			'username' => 'Test',
			'telefoonnummer' => '0612345678',
			'email' => 'test@mail.com',
			'wachtwoord' => $hashed_password]);
	}

	

}
