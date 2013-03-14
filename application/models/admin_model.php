<?php

class Admin_model extends CI_Model
{
	/**
	* Insert new news content
	* @author Marko Kovacevic
	* @param title (string)
	* @param text (string)
	* @param category (int) 
	* @return boolean
	*/
	public function add_news($title, $text, $category)
	{
		$title    = $this->db->escape($title);
		$text 	  = $this->db->escape($text);
		$category = $this->db->escape($category); 

		$query = "INSERT INTO hl_news( Title, Text, CategoryID ) 
				  VALUES
				  ( $title, $text , $category )";

				  var_dump($query);
        return $this->db->query($query);
	}

	/**
	* Retrives all news from DB
	* @author Marko Kovacevic
	* @return boolean 
	*/
	public function get_all()
	{
		$query = "SELECT hl_news.newsID, hl_news.Title, hl_news.Text, hl_news.CategoryID, hl_categorys.CategoryName 
					FROM hl_news JOIN hl_categorys 
					ON hl_news.CategoryID = hl_categorys.id";
		$data = $this->db->query($query);

		if($data->num_rows()>0)
		{
			return $data->result_array();
		}
		else
		{
			return false;
		}
	}
	/**
	* Return news for certan category
	* @param (int) category-id
	* @return array
	**/

	function get_all_cat($id)
	{
		//$id = $this->db->escape($id);

		$query = " SELECT hl_news.newsID, hl_news.Title, hl_news.Text, hl_news.CategoryID 
					FROM hl_news  
					 WHERE  CategoryID IN ($id) GROUP BY hl_news.newsID ORDER BY hl_news.newsID DESC";

		$data = $this->db->query($query);

		return $data->result_array();
	}

	/**
	* Retrives new news content
	* @author Marko Kovacevic
	* @param id (int)
	* @return array
	*/
	public function get_news($id)
	{
		$id = $this->db->escape($id);

		$query = "SELECT hl_news.newsID,hl_news.Title, hl_news.Text, hl_news.CategoryID, hl_categorys.CategoryName 
					FROM hl_news JOIN hl_categorys 
					ON hl_news.CategoryID=hl_categorys.id WHERE hl_news.newsID = $id";

		$data = $this->db->query($query);

		return $data->row();
	}

	/**
	* Retrives categories
	* @author Marko Kovacevic
	* @return array
	*/
	public function get_category()
	{
		$query = "SELECT * FROM hl_categorys";

		$data = $this->db->query($query);

		return $data->result_array();
	}

	public function delete_news( $id )
	{
		$id = $this->db->escape($id);

		$query   = "DELETE FROM hl_news WHERE hl_news.newsID = $id";

		return $this->db->query($query);
		
	}

	public function update_news( $title, $text, $category, $newsID )
	{
		$category  = $this->db->escape($category);
		$title     = $this->db->escape($title);
		$text 	   = $this->db->escape($text);
		$newsID    = $this->db->escape($newsID);
	


		$query = "UPDATE hl_news SET Title = $title, Text = $text, CategoryID = $category WHERE hl_news.newsID = $newsID";

		return $this->db->query($query); 
	
	}


	/**
	*Adds new user to DB
	*@param mail (string)
	*@param name (string)
	*@return boolean
	*@author Marko Kovacevic
	*/

	public function add_mail($mail, $name)
	{
		$mail = $this->db->escape($mail);
		$name = $this->db->escape($name);

		$query = "INSERT INTO hl_newsletter(Name, Email) VALUES ( $name, $mail)";

		return $this->db->query($query);
	}


	/**
	*Adds new comment to DB
	*@param mail (string)
	*@param name (string)
	*@param comment
	*@return boolean
	*@author Marko Kovacevic
	*/

	public function add_comment( $mail, $name, $comment )
	{
		$mail    = $this->db->escape($mail);
		$name    = $this->db->escape($name);
		$comment = $this->db->escape($comment);

		$query = "INSERT INTO hl_guestbook(gusetName, guestEmail, guestComment, isApproved) 
				  VALUES
				   ($name, $mail, $comment, 0)";

		return $this->db->query($query);
	}

	public function get_comment_review()
	{
		$query = "SELECT * FROM hl_guestbook WHERE isApproved = 0";

		$data = $this->db->query($query);

		return $data->result_array();
	}

	public function get_comment()
	{
		$query = "SELECT * FROM hl_guestbook WHERE isApproved = 1";

		$data = $this->db->query($query);

		return $data->result_array();
	}

     public function delete_comment($id)
     {
        $query = "DELETE FROM hl_guestbook WHERE commentID = $id";
        return $this->db->query($query);
     }
     public function approve_comment($id)
     {
        $query = "UPDATE hl_guestbook SET isApproved = 1 WHERE commentID = $id";

        return $this->db->query($query);
     }

}

?>