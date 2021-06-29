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
		$hashed_password = password_hash('gebruiker', PASSWORD_DEFAULT);
		$sql = 'INSERT INTO Gebruiker VALUES (NULL, :voornaam, :achternaam, :telefoonnummer, :email, :wachtwoord, :is_admin)';	
		$statement = $this->dbh->prepare($sql);
		$statement->each(array)xecute([
			'voornaam' => 'Johnny',
			'username' => 'Test',
			'telefoonnummer' => '0612345678',
			'email' => 'test@mail.com',
			'wachtwoord' => $hashed_password
			'is_admin' => 2	]);
	}

	public function login(string $email, string $wachtwoord): void
    {
        // Zoek op username
        // GEBRUIK BIJ USER INPUT (zoals nu uit een HTML form) **ALTIJD** :key IN DE SQL EN ['key' => value] IN DE execute!!! (voorkom SQL injection!)
        $sql = 'SELECT is_admin, wachtwoord FROM Gebruiker WHERE email = :email';

        $statement = $this->dbh->prepare($sql);
        $statement->execute([
            'email' => $email
        ]);

        // fetch haalt 1 resultaat zijn kolommen en waardes op (of geeft false)
        // PDO::FETCH_ASSOC formatteerd het resultaat als ['column' => 'cell value'] pairs
        $results = $statement->fetch(PDO::FETCH_ASSOC);
        // Als results niet leeg is, is de username dus gevonden
        //var_dump($username, $password, $results['password']); exit;
        if (!empty($results) && password_verify($wachtwoord, $results['wachtwoord']))
        {
            // setcookie() beter voor logins op productie; session makkelijker mee te testen
            session_start();
            $_SESSION['logged_in_as'] = $wachtwoord;
            $_SESSION['is_admin'] = $results['is_admin'] === '1';

            //header('Location: users_overview.php');
        }
        else
            // Je kunt hier ook exit('...') gebruiken als je een aparte pagina teveel moeite vindt
            header('Location: examenvoorvereidingf/Views/login_incorrect.php');
    }


	

}
