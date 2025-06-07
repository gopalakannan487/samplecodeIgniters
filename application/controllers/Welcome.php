<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Welcome_model');
        // Load the session library
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('login_helper');

        // Load the email library
        $this->load->library('email');

    }

 private function is_loggedin() {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('welcome/login'));
        }
    }

	public function index()
	{
        // $this->is_loggedin();
        $this->load->view('header');
		// $this->load->view('welcome_message');
       
        $data['events'] = $this->Welcome_model->get_all_events(); // Fetch events from the model
	    $this->load->view('welcome_message', $data); // Pass data to view
         $this->load->view('footer');
    }

 

public function formsubmit()
{
    $email = $this->input->post('email');

    // Email configuration
    $config = array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.gmail.com', // Corrected SMTP host
        'smtp_user' => 'gopalfrontenddeveloper@gmail.com',
        'smtp_pass' => 'yuhtqrxmndjfeujo', // Ensure this is an App Password
        'smtp_port' => 465,
        'mailtype' => 'html',
        'charset' => 'utf-8',
        'wordwrap' => TRUE,
        'newline' => "\r\n"
    );

    // Initialize email library with configuration
    $this->email->initialize($config);

    // Email sending settings
    $this->email->from($email, 'Test Mail');
    $this->email->to('gopalfrontenddeveloper@gmail.com');
    $this->email->subject('Subscribe email');
    $this->email->message('Subscribe email is: ' . $email);

    // Sending email and handling response
    if($this->email->send()) {
        $response = array('status' => 'success', 'message' => 'Email sent successfully.');
    } else {
        $response = array('status' => 'error', 'message' => $this->email->print_debugger());
    }

    // Return response as JSON
    echo json_encode($response);
}


// Register form
    public function caccount()
    {
        $this->load->view('header');
        $this->load->view('createaccount');
        $this->load->view('footer');
    }

    public function formregister()
    {
        //echo'<pre>';print_r($_POST);exit;
        $data['registername'] = $this->input->post('registername'); 
        $data['registeremail'] = $this->input->post('registeremail'); 
        $data['registerpassword'] = $this->input->post('registerpassword'); 
        $result = $this->Welcome_model->registerdata($data);
        // echo'<pre>';print_r($result);exit;
        
        // if($result == true)
        // {
        //     echo 'successfully created';
        // }
        // else
        // {
            echo  $result;
        //}
       // redirect('Welcome/caccount');
    }

      public function check_email() {
        // Load the model for checking email
        $this->load->model('Welcome_model');
        
        // Get the posted email
        $email = $this->input->post('registeremail');

        // Check if the email exists
        if ($this->Welcome_model->email_exists($email)) {
            echo 'false'; // Email exists
        } else {
            echo 'true'; // Email does not exist
        }
    }

// Login form
    public function login()
    {
         // echo "<pre>";print_r($_SESSION);exit;
        $this->load->view('header');
        $this->load->view('login');
        $this->load->view('footer');
    }

//Logout 

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('welcome/login');
    }


   public function formsignin() {
 

        // Get the posted data
        $email = $this->input->post('loginemail'); 
        $password = $this->input->post('loginpassword'); 
 
        // Call the signindata method
        $result = $this->Welcome_model->signindata($email, $password);
 // echo "<pre>";print_r($result);exit;
      
        // Check the result
        if ($result) {
            // User is valid, set session data
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('user_id', $result['id']); // Assuming 'id' is the user's ID
            // Return success response
            echo json_encode(['status' => 'success', 'message' => 'Login successful!']);
        } else {
            // Invalid credentials
            echo json_encode(['status' => 'error', 'message' => 'Invalid email or password.']);
        }
    }



   public function formdep() {
 

        // Get the posted data
        $depname['dept_name'] = $this->input->post('dept_name'); 
 
   // echo "<pre>";print_r($depname);exit;
        $result = $this->Welcome_model->formdepdata($depname);
        // Check the result
        if ($result) {
         
            // Return success response
            echo json_encode(['status' => 'success', 'message' => 'Department saved successful!']);
        } else {
            // Invalid credentials
            echo json_encode(['status' => 'error', 'message' => 'Department Not saved!']);
        }
    }


    public function fetch_departments() {
                $this->load->library('datatables');
                $this->datatables
            ->select('dept_id, dept_name as dn')
            ->from('departments D');
       
        echo $this->datatables->generate();
 
    }

    public function depupdates(){
        // $deparna = $this->input->post('depnam');
        $data['dept_name'] = $this->input->post('depnam');
        $deparnid = $this->input->post('depnamid');
             // echo '<pre>';print_r($deparna);exit;
        $dep_details = $this->Welcome_model->update_dept($data, $deparnid);
        echo json_encode($dep_details);
    }


  public function delete_dept()
    {
        $dept_id = $this->input->post('dept_id');
        $deleted = $this->Welcome_model->delete_dept($dept_id);
        echo $deleted ? 1 : 0;
    }

// Dashboard view

   public function dashboard()
    {
   $this->is_loggedin(); // Check if logged in

        $this->load->view('header-template');
            // echo '<pre>';print_r($data);exit;
        $this->load->view('dashboard' );
        $this->load->view('footer');
    }



    public function billing()
    {

         // echo "<pre>";print_r($_SESSION['user_id']);exit;
        $this->is_loggedin(); // Check if logged in

        $this->load->view('header-template');
         // Fetch all roles
    $data['roles'] = $this->Welcome_model->get_all_roles();
    $data['troles'] = $this->Welcome_model->get_teaching_roles();
    $data['nroles'] = $this->Welcome_model->get_nonteaching_roles();


    // echo '<pre>';print_r($data);exit;
        $this->load->view('role_view', $data);
        $this->load->view('footer');
    }


// updaterole

    public function updaterole()
    {
          $data['id'] = $this->input->post('id'); 
          $data['name'] = $this->input->post('tname'); 
          $data['role_type'] = $this->input->post('ttype'); 
          // echo '<pre>';print_r($_POST);exit;
            $result = $this->Welcome_model->updateroledata($data);
          // echo '<pre>';print_r($result);exit;


    }

// Event view
   public function events()
    {
   $this->is_loggedin(); // Check if logged in

        $this->load->view('header-template');
            // echo '<pre>';print_r($data);exit;
        $this->load->view('events' );
        $this->load->view('footer');
    }

//ulselect
public function ulselect()
{
    $selected = $this->input->post('selected_tutorial', true);
    if ($selected) {
        $this->Welcome_model->save_tutorial($selected);
        $this->session->set_flashdata('success_msg', $selected);
    } else {
        $this->session->set_flashdata('error_msg', 'No selection made.');
    }
    redirect('Welcome'); // redirect back to form
}



public function save_event() {
    $response = ["status" => "error", "message" => "Something went wrong!"];

    // Get event details from the request
    $data['event_title'] = $this->input->post('event_title', true);
    $data['event_date'] = $this->input->post('event_date', true);

    // echo '<pre>';print_r($data['event_date']);exit;
    $data['event_description'] = $this->input->post('event_description', true);

    // Validate required fields
    if (empty($data['event_title']) || empty($data['event_description'])) {
        echo json_encode(['status' => 'error', 'message' => 'Title and description are required!']);
        return;
    }

    // Image upload handling
    if (!empty($_FILES['event_image']['name'])) {
        $uploadPath = './uploads/events/';

        // Create folder if not exists
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB max size
        $config['file_name'] = time() . '_' . $_FILES['event_image']['name'];

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('event_image')) {
            $uploadData = $this->upload->data();
            $data['event_image'] = $uploadData['file_name']; // Save file name in DB
        } else {
            echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors('', '')]);
            return;
        }
    } else {
        $data['event_image'] = null; // No image uploaded
    }



    // Save event details in database
    $result = $this->Welcome_model->insert_event($data);
    
    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Event saved successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to save event']);
    }
}

    



}



