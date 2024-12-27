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
        // Load the email library
        $this->load->library('email');
    }
	public function index()
	{

        $this->load->view('header');
		$this->load->view('welcome_message');
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
        //echo'<pre>';print_r($result);exit;
        
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
        $this->load->view('header');
        $this->load->view('login');
        $this->load->view('footer');
    }


   public function formsignin() {
 

        // Get the posted data
        $email = $this->input->post('loginemail'); 
        $password = $this->input->post('loginpassword'); 

        // Call the signindata method
        $result = $this->Welcome_model->signindata($email, $password);

        // Check the result
        if ($result) {
            // User is valid, set session data
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('user_id', $result->id); // Assuming 'id' is the user's ID
            
            // Return success response
            echo json_encode(['status' => 'success', 'message' => 'Login successful!']);
        } else {
            // Invalid credentials
            echo json_encode(['status' => 'error', 'message' => 'Invalid email or password.']);
        }
    }


// Dashboard view

    public function dashboard()
    {
        $this->load->view('header-template');
         // Fetch all roles
    $data['roles'] = $this->Welcome_model->get_all_roles();
    $data['troles'] = $this->Welcome_model->get_teaching_roles();
    $data['nroles'] = $this->Welcome_model->get_nonteaching_roles();


    // echo '<pre>';print_r($data);exit;
        $this->load->view('role_view', $data);
        $this->load->view('footer');
    }
}


