<?php
class Welcome_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    function registerdata($data)
    {             
        $this->db->insert('register',$data);
        return true;    
    }

    
    public function email_exists($email) {
        $this->db->where('registeremail', $email);
        $query = $this->db->get('register');

        return $query->num_rows() > 0; // Returns true if email exists
    }


 public function signindata($loginemail, $loginpassword) {
    // echo $loginemail;exit;
        // Query to check if the email exists
        $this->db->where('registeremail', $loginemail);
        $query = $this->db->get('register');  // Query the 'register' table

        // Check if a user with the provided email exists
        if ($query->num_rows() > 0) {
            $user = $query->row();  // Get the user data
            // Verify the password (assuming it's hashed)
            if($user->registerpassword == $loginpassword) {
        // echo "<pre>";print_r($user);exit;
                return $user; // Return user data if valid
            }
        }
        return false; // Invalid credentials
    }

    }
    ?>
