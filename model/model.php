<?php
require_once('UserInfos.php');
require_once('Estimation.php');

class model
{
	public $dbname = "mydb";
	public $username = "postgres";
	public $password = "password";

	private function connect()
	{
		$s_connection = "host=localhost port=5432 dbname=" . $this->dbname . " user=" . $this->username . " password=" . $this->password;
		$db_con = pg_connect($s_connection);

		return $db_con;
	}

	public function idExist(int $id)
	{
		$db_con = $this->connect();
		$result = pg_query_params($db_con, "SELECT identifiant FROM users WHERE identifiant = $1", array($id));
		if(pg_num_rows($result) > 0)
		{
			return True;
		}
		else
		{
			return False;
		}
	}

	public function createUser($infos)
	{
		if($infos->niveau_bota == null)
		{
			$infos->niveau_bota = 0;
		}
		if($infos->annee_bota == null)
		{
			$infos->annee_bota = 0;
		}
		$db_con = $this->connect();
		$id = $this->getNewId();
		$new_user = array(
			$id,
			$infos->genre,
			$infos->naissance,
			$infos->dalt,
			$infos->etude,
			$infos->pays,
			$infos->niveau_bota,
			$infos->annee_bota,
			$infos->recouvre,
			$infos->echelle);
		pg_query_params($db_con, "INSERT INTO users VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10);", $new_user); 

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
		$lastSerie = pg_fetch_result($result, 0, 0);

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
		$query_str = "
			UPDATE
				users
			SET
				" . $column . " = $1
			WHERE
				identifiant = $2";
		pg_query_params($db_con, $query_str, array($val, $id));
	}
	
	public function enregistrer_estimation($esti)
	{
		$db_con = $this->connect();
		$query_str = "
			INSERT INTO 
				estimations
			VALUES ($1, $2, $3, $4, $5, $6, $7);";
		pg_query_params($db_con, $query_str, array(
				$esti->id, 
				$esti->num,
				$esti->serie,
				$esti->nom,
				$esti->debut->format('Y-m-d H:i:s'),
				$esti->fin->format('Y-m-d H:i:s'),
				$esti->valeur
				));
	}
}
