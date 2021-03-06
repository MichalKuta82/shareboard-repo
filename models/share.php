<?php
/**
 * 
 */
class ShareModel extends Model
{
	
	public function Index()
	{
		$this->query('SELECT * FROM shares');
		$rows = $this->resultSet();
		return ($rows);
	}

	public function add()
	{
		//sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if (isset($post['submit'])) {
			if ($post['title'] == '' || $post['body'] == '' || $post['link'] == '') {
				return Messages::setMsg('Please Fill In All Fields', 'error');
			}
			//INSERT INTO MYSQL
			$this->query('INSERT INTO shares (title, body, link, user_id) VALUES (:title, :body, :link, :user_id)');
			$this->bind(':title', $post['title']);
			$this->bind(':body', $post['body']);
			$this->bind(':link', $post['link']);
			$this->bind(':user_id', 1);
			$this->execute();
			//verify
			if ($this->lastInsertId()) {
				header('Location: ' . ROOT_URL . 'shares');
			}
		}
		return;
	}
}