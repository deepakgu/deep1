<?php

class Auth_model extends CI_model{

    public function create($formArray)
    {
     
        $this->db->insert('register',$formArray);
    }
    public function checkUser($email)
     {
        // echo $email;
        $this->db->where('email',$email);
    
         return $row = $this->db->get('register')->row_array();  
    }

    public function dass()
    {
      $user = $this->$user->session->userdata('user');
      if(!empty($user))
      {
        return true;
      }
      else{
        return false;
      }
    }
   
}

?>