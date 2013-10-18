<?php
class User
{
	private $db;
	private $likes;
	private $hasLiked;

	public function insertUser($user){
		$this->db    = new PDO(DB, USER, PASSWORD);
		$query       = $this->db->prepare('SELECT * FROM user WHERE fbId = ?');
		$query->execute(array($user['id']));
		
		$this->likes = self::getUserLikes($user, PAGEID);

		if(count($query->fetchAll()) == 0){
			self::doInsert($user);
		}else{
			// Check if user already liked the fan page before.
			// If he did, we don't update this field in database
			$this->hasLiked = self::checkIfUserAlreadyLiked($user);
			self::doUpdate($user);
		}
	}
	public function doInsert($user){
		try{
			$query = $this->db->prepare('INSERT INTO user (fbId, firstName, lastName, link, email, gender, likes, hasLiked, location, locale, last_connection) 
									VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)');
			$query->execute(
							array(
								$user['id'],
								$user['first_name'],
								$user['last_name'],
								$user['link'],
								$user['email'],
								$user['gender'],
								$this->likes,
								$this->likes,
								$user['location']['name'],
								$user['locale']
								)
							);
			return $this;
		}catch(PDOException $e){
			echo 'An error occured during the insertion of the user: ' . $e->getMessage();
		}
	}

	public function doUpdate($user){
		try{
			$query = $this->db->prepare('UPDATE user SET
													firstName = ?,
													lastName = ?,
													link = ?,
													email = ?,
													gender = ?,
													likes = ?,
													hasLiked = ?,
													location = ?,
													locale = ?,
													last_connection = CURRENT_TIMESTAMP
												WHERE fbId = ?');
			$query->execute(array(
								$user['first_name'],
								$user['last_name'],
								$user['link'],
								$user['email'],
								$user['gender'],
								$this->likes,
								$this->hasLiked,
								$user['location']['name'],
								$user['locale'],
								$user['id'],
								)
							);
			return $this;
		}catch(PDOException $e){
			echo 'An error occured during the update of the user: ' . $e->getMessage();
		}
	}

	public function getUserLikes($user, $pageId = null){
		global $facebook;
		$likes = 0;
		if($pageId){
			$fql   = 'SELECT page_id FROM page_fan WHERE uid = me() AND page_id = '.PAGEID; 
			$query = $facebook->api(array( 
										'method' => 'fql.query', 
										'query' => $fql,
										)); 
			$likes = count($query);
			return $likes;
		}else{
			$fql   = 'SELECT page_id FROM page_fan WHERE uid = me()'; 
			$query = $facebook->api(array( 
										'method' => 'fql.query', 
										'query' => $fql,
										)); 
			return count($query);
		}
	}

	public function checkIfUserAlreadyLiked($user){
		$query = $this->db->prepare('SELECT hasLiked FROM user WHERE fbId = ?');
		$query->execute(array($user['id']));
		while($datas = $query->fetchAll()){
			foreach ($datas as $data) {
				if($data['hasLiked'] == 0 && self::getUserLikes($user, APPID) == 0){
					$hasLiked = 0;
				}else{
					$hasLiked = 1;
				}
			}
		}
		return $hasLiked;
	}
}