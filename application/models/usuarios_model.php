<?php
class Usuarios_model extends CI_Model
 
{
/* we will use the function getUsers */
  function get_usuarios()
  {
    /* all the queries relating to the data we want to retrieve will go in here. */
    // $this->db->where(array('id'=>7,'usr_mail'=>'mail@mail.org'));
    //$this->db->where(array('1'));
    $this->db->select('username');
    $q = $this->db->get('usuarios'); 
    /* after we've made the queries from the database, we will store them inside a variable called $data, and return the variable to the controller */
    if($q->num_rows() > 0)
    {
      foreach ($q->result_array() as $i => $row)
      {
        $data[$i] = $row;
      }
      return $data;
    }
  }
}
?>