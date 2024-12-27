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


        public function get_all_roles() {
        // Example query: Adjust according to your database schema
        $query = $this->db->get('roles'); // 'roles' is your database table
        return $query->result_array();
    }

  public function get_teaching_roles() {
    $this->db->where('role_type', 'Teaching'); // Add condition for Teaching roles
    $query = $this->db->get('roles'); // 'roles' is your database table
    return $query->result_array();
}
  public function get_nonteaching_roles() {
    $this->db->where('role_type', 'Non-Teaching'); // Add condition for Teaching roles
    $query = $this->db->get('roles'); // 'roles' is your database table
    return $query->result_array();
}

    }
    ?>
