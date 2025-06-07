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
         $this->db->where('registerpassword', $loginpassword);
        $query = $this->db->get('register');  // Query the 'register' table
    
        $result = $query -> row_array();

            return $result;
        // Check if a user with the provided email exists
        // if ($query->num_rows() > 0) {
        //     $user = $query->row();  // Get the user data
        //     // Verify the password (assuming it's hashed)
        //     if($user->registerpassword == $loginpassword) {
        // // echo "<pre>";print_r($user);exit;
        //         return $user; // Return user data if valid
        //     }
        // }
        // return false; // Invalid credentials
    }


 public function formdepdata($depname) {
    $this->db->insert('departments',$depname);
        return true;
      
    }

 
public function update_dept($data, $deparnid)
{
    $this->db->where('dept_id', $deparnid); 
    $query = $this->db->update('departments',$data); 

    return $this->db->affected_rows();
}

    public function delete_dept($dept_id)
    {
        $this->db->where('dept_id', $dept_id);
        $this->db->delete('departments');
        return $this->db->affected_rows(); // returns 1 if successful
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

    public function updateroledata($data)
    {

        $this->db->where('id', $data['id']); 
         $query = $this->db->update('roles', $data); 

             return $this->db->affected_rows();

    }

    public function insert_event($data) {
        return $this->db->insert('events', $data);
    }

public function get_all_events() {
    $this->db->select("event_id, event_title, DATE_FORMAT(event_date, '%d %b %Y') as formatted_date, event_description, event_image");
    return $this->db->get('events')->result_array();
}



//ulselect
    public function save_tutorial($name) {
        $data = [
            'name' => $name
        ];

        // insert into 'tutorials' table (make sure it exists)
        return $this->db->insert('tutorials', $data);
    }



    }
    ?>
