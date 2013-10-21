<?php
class User extends Model
{
	private $likes;
	private $hasLiked;
	
	public function insertUser($user)
	{
		$fields = array();
		$this->table = 'user';
		$where = array('fbId' => $user['id']);

		$query = $this->select($fields, $where);
		
		$this->likes = self::getUserLikes(PAGEID);

		if(count($query) == 0){
			self::doInsert($user);
		}else{
			// Check if user already liked the fan page before.
			// If he did, we don't update this field in database
			$this->hasLiked = self::checkIfUserAlreadyLiked($user);
			self::doUpdate($user);
		}
	}
	

	public function doInsert($user){
		$fields = array(
						'fbId' => $user['id'],
						'firstName' => $user['first_name'],
						'lastName' => $user['last_name'],
						'link' => $user['link'],
						'email' => $user['email'],
						'gender' => $user['gender'],
						'likes' => $this->likes,
						'hasLiked' => $this->likes,
						'location' => $user['location']['name'],
						'locale' => $user['locale'],
						'last_connection' => date('Y-m-d H:i:s', time()),
							);
		$this->table = 'user';
		$this->insert($fields);
		return $this;
	}

	public function doUpdate($user)
	{
		$fields = array(
						'id' => $user['id'],
						'firstName' => $user['first_name'],
						'lastName' => $user['last_name'],
						'link' => $user['link'],
						'email' => $user['email'],
						'gender' => $user['gender'],
						'likes' => $this->likes,
						'hasLiked' => $this->hasLiked,
						'location' => $user['location']['name'],
						'locale' => $user['locale'],
						'last_connection' => date("Y-m-d H:i:s", time()),
				  );
		$where = array('fbId' => $user['id']);
		$this->insert($fields, $where);
		return $this;
	}

	public function getUserLikes($pageId = null)
	{
		$likes = 0;
		if($pageId){
			$fql   = 'SELECT page_id FROM page_fan WHERE uid = me() AND page_id = '.PAGEID; 
			$query = $this->facebook->api(array( 
										'method' => 'fql.query', 
										'query' => $fql,
										)); 
			$likes = count($query);
			return $likes;
		}else{
			$fql   = 'SELECT page_id FROM page_fan WHERE uid = me()'; 
			$query = $this->facebook->api(array( 
										'method' => 'fql.query', 
										'query' => $fql,
										)); 
			return count($query);
		}
	}

	public function checkIfUserAlreadyLiked($user)
	{
		$fields      = array('hasLiked');
		$this->table = 'user';
		$where       = array('fbId' => $user['id']);
		$order       = array();
		$limit       = array();

		$datas       = $this->select($fields, $where, $order, $limit, null);
		if($datas['hasLiked'] == 0 && self::getUserLikes(APPID) == 0){
			$hasLiked = 0;
		}else{
			$hasLiked = 1;
		}
		return $hasLiked;
	}
}