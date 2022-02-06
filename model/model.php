<?php
require_once('UserInfos.php');
require_once('Estimation.php');

class model
{
	public $dbname = "postgres";
	public $username = "postgres";
	public $password = "admin";

	private function connect()
	{
		$s_connection = "host=localhost port=5432 dbname=" . $this->dbname . " user=" . $this->username . " password=" . $this->password;
		$db_con = pg_connect($s_connection);

		return $db_con;
	}

	public function idExist($id)
	{
		$db_con = $this->connect();
		$result = pg_query_params($db_con, "SELECT identifiant FROM users WHERE identifiant = $1;", array($id));
		if($result)
			if(pg_num_rows($result) > 0)
			{
				return True;
			}
		
		return False;
	}

	public function createUser($user)
	{
		$db_con = $this->connect();
		$id = $this->getNewId();
		$params = array(
			intval($id),
			$user->genre,
			$user->naissance,
			strval($user->dalt),
			$user->etude,
			$user->pays,
			intval($user->niveau_bota),
			intval($user->annee_bota),
			strval($user->recouvre),
			$user->echelle);
		$result = pg_query_params($db_con, "INSERT INTO users VALUES($1, $2, $3, $4, $5, $6, $7, $8, $9, $10);", $params); 
		if(!$result)
			throw new Excpetion("Creation user query failed");

		return $id;
	}

	public function getNewId()
	{
		$db_con = $this->connect();
		while($this->idExist($new_id = rand(100000000000, 999999999999)));

		return $new_id;
	}

	public function getNextSerieNbForUser($id)
	{
		$db_con = $this->connect();
		$result = pg_query_params($db_con, "
			SELECT
				serie
			FROM
				estimations
			WHERE
				identifiant = $1
			ORDER BY
				serie DESC", array($id));
		if($result)
			$lastSerie = pg_fetch_result($result, 0, 0);
		else
			$lastSerie = 0;

		return $lastSerie + 1;
	}
	
	public function getGreenCounter()
	{
		$db_con = $this->connect();
		$result = pg_query($db_con, "
			SELECT
				green_counter
			FROM
				counter
			");
		$count = pg_fetch_result($result, 0, 0);

		return $count;
	}

	public function setGreenCounter($new_count)
	{
		$db_con = $this->connect();
		pg_query_params($db_con, "
			UPDATE
				counter
			SET
				green_counter = $1
			", array($new_count));
	}
	
	public function getRedCounter()
	{
		$db_con = $this->connect();
		$result = pg_query($db_con, "
			SELECT
				red_counter
			FROM
				counter
			");
		$count = pg_fetch_result($result, 0, 0);

		return $count;
	}

	public function setRedCounter($new_count)
	{
		$db_con = $this->connect();
		pg_query_params($db_con, "
			UPDATE
				counter
			SET
				red_counter = $1
			", array($new_count));
	}
	
	public function updateUserInfo($id, $column, $val)
	{
		$db_con = $this->connect();
		$query_str = "UPDATE users SET " . $column . " = $1 WHERE identifiant = $2";
		pg_send_query_params($db_con, $query_str, array($val, $id));
		$result = pg_get_result($db_con);
		echo pg_result_error($result);
	}
	
	public function enregistrer_estimation($esti)
	{
		$db_con = $this->connect();
		$query_str = "
			INSERT INTO 
				estimations
			VALUES ($1, $2, $3, $4, $5, $6, $7);";
		$result = pg_query_params($db_con, $query_str, array(
				$esti->id, 
				$esti->num,
				$esti->nom,
				$esti->debut->format('Y-m-d H:i:s'),
				$esti->fin->format('Y-m-d H:i:s'),
				$esti->serie,
				$esti->valeur
				));
	}
}