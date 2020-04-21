<?php

/*
 * Every class derriving from Model has access to $this->db
 * $this->db is a PDO object
 * Has a config in /core/config/database.php
 */
class Demo extends Model {

    function validateUser () {
        //$stmt = $this->db->prepare();
        return true;
    }
    function submitData(){
      	if(!isset($_REQUEST['name']))
      	{
            return false;
        }

        $file = $_FILES['img_file']['name'];
        $tmp_name = $_FILES['img_file']['tmp_name'];
        $folder="upload/".$file;
        move_uploaded_file($tmp_name, $folder);

        $query = 'INSERT INTO
              `user`(
                `name`,
                `email`,
                `img_file`
                )
            VALUES("'.$_REQUEST['name'].'","'.$_REQUEST['email'].'","'.$folder.'")';

        $result = $this->db->query($query);

    }

    function showData()
    {
            $query = 'SELECT * FROM user WHERE name = "'.$_REQUEST['name'].'"';
            $result = $this->db->query($query);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            while($r = $result->fetch())
            {
                echo sprintf('%s',$r['name'])."<br>";
                echo sprintf('%s',$r['email'])."<br>";
                echo '<img src="'.$r['img_file'].'" height=200 width=300/>';
            }
    }
}
?>