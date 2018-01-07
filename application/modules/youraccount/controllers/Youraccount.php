<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Rename Perfectcontroller to [Name]
class Youraccount extends MY_Controller 
{

/* model name goes here */
public $mdl_name = 'Mdl_youraccount';
public $main_controller = 'youraccount';

public $_check_username,
       $_check_email,
       $flash_msg = '';


function __construct( ) {
    parent::__construct();

 // checkField(uri_string(),1);
 // quit(0,1);

}


/* ===================================================
    Controller functions goes here. Put all DRY
    functions in applications/core/My_Controller.php
  ==================================================== */

function welcome()
{
    $this->load->module('site_security');
    $userid = $this->site_security->_make_sure_logged_in();

    // $data['flash'] = $this->session->flashdata('item');
    list( $data['status'], $data['user_avatar'],
          $data['member_id'], $data['fullname'] ) = get_login_info($userid); 

    $data['menu_level'] = 1;
    $data['custom_jscript'] = ['public/js/member-portal',
                               'public/js/model_js',
                              ];

    $data['page_url'] = 'welcome';
    $data['page_title'] = 'Member Portal';
    $data['image_repro'] = '';
    $data['left_side_nav'] = true;
    $data['view_module'] = 'youraccount';
    $data['title'] = "Welcome. You are logged in.";
    $this->load->module('templates');
    $this->templates->public_main($data);     
}


function login()
{
    $data['username'] = $this->input->post('username', TRUE);
    $data['custom_jscript'] = '';
    $data['page_url'] = 'login';
    $data['page_title'] = 'Login';
    $data['image_repro'] = '';
    $data['left_side_nav'] = false;
    $data['view_module'] = 'youraccount';
    $data['title'] = "Membership Login";

    $this->load->module('templates');
    $this->templates->public_main($data); 
}

function submit_login()
{
    $submit = $this->input->post('submit', TRUE);

    if ($submit=="Submit") {
        //process the form
        $this->form_validation->set_rules('username', 'Username',
                 'required|min_length[5]|max_length[60]|callback_username_check');

        $this->form_validation->set_rules('pword', 'Password', 'required|min_length[6]|max_length[35]');

        if ($this->form_validation->run() == TRUE) {
            //figure out the user_id
            $col1 = 'username';
            $value1 = $this->input->post('username', TRUE);
            $col2 = 'email';
            $value2 = $this->input->post('username', TRUE);
            $query = $this->model_name->get_with_double_condition($col1, $value1, $col2, $value2);

            foreach($query->result() as $row) {
                $user_id = $row->id;
                $account_status = $row->status;
                $application_status = $row->app_completed_date;
            }

            /* member is not active - redirect to not active page */
            // if($account_status == 0)  redirect();

            $remember = $this->input->post('remember', TRUE);
            if ($remember=="remember-me") {
                $login_type = "longterm";
            } else {
                $login_type = "shortterm";
            }

            $data['last_login'] = time();
            $this->model_name->_update($user_id, $data);

            //send them to the private page
            $this->_in_you_go($user_id, $login_type, $application_status);

        } else {
            $this->login();
            // echo validation_errors();
            // on fail 3 times use capcha after 3 more attempts then suspend.
        }
    }

}

function activate( $security_code=null )
{
    $submit = $this->input->post('submit-form', TRUE);
    $security_code = $submit != null ?
                     $this->input->post('activate_code', TRUE) : $security_code;

    $results_set = $this->model_name->get_view_data_custom('security_code', $security_code, 'user_login', null);

    if( count($results_set->result()) == 0 ) redirect( 'youraccount/site_404page' );

    foreach($results_set->result() as $row) {
        $user_id = $row->id;
        $application_status = $row->app_completed_date;
    }    

    if ($submit=="Submit") {
        // $this->load->module('site_security');        
        $new_password = $this->input->post('password', TRUE);
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password',
         'trim|required|matches[password]');

        if ($this->form_validation->run() == TRUE) {
            $login_type = "shortterm";
            $data['last_login'] = time();
            $data['status'] = 1;                        
            $data['user_priv'] = 1;                                    
            $data['user_access'] = 1;                                                
            $data['security_code'] = '';  
            $data['password'] = $this->site_security->_hash_string($new_password);
            $this->model_name->_update($user_id, $data);

            //send them to the private page
            $this->_in_you_go($user_id, $login_type, $application_status);
            die('I should not be here .............................');            
        } else {
            echo validation_errors();
        }

    }

    $data['activate_code'] =  $security_code;
    $data['custom_jscript'] = ['public/js/reg_pswrd'];
    $data['page_url'] = 'password_form';
    $data['page_title'] = 'Member Portal';
    $data['image_repro'] = '';
    $data['left_side_nav'] = false;
    $data['view_module'] = 'youraccount';
    $data['title'] = "Membership Login";

    $this->load->module('templates');
    $this->templates->public_main($data); 
}

function reset_password( $security_code=null )
{
    $submit = $this->input->post('submit-form', TRUE);
    $security_code = $submit != null ?
                     $this->input->post('activate_code', TRUE) : $security_code;

    $results_set = $this->model_name->get_view_data_custom('security_code', $security_code, 'user_login', null);

    if( count($results_set->result()) == 0 ) redirect( 'youraccount/site_404page' );

    foreach($results_set->result() as $row) {
        $user_id = $row->id;
        $application_status = $row->app_completed_date;
    }    

    if ($submit=="Submit") {
        // $this->load->module('site_security');        
        $new_password = $this->input->post('password', TRUE);
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password',
         'trim|required|matches[password]');

        if ($this->form_validation->run() == TRUE) {
            $login_type = "shortterm";
            $data['last_login'] = time();
            $data['status'] = 1;                        
            $data['user_priv'] = 1;                                    
            $data['user_access'] = 1;                                                
            $data['security_code'] = '';  
            $data['password'] = $this->site_security->_hash_string($new_password);
            $this->model_name->_update($user_id, $data);

            //send them to the private page
            $this->_in_you_go($user_id, $login_type, $application_status);
            die('I should not be here .............................');            
        } else {
            echo validation_errors();
        }
    }

    $data['activate_code'] =  $security_code;
    $data['custom_jscript'] = ['public/js/reg_pswrd'];
    $data['page_url'] = 'password_reset';
    $data['page_title'] = 'Member Portal';
    $data['image_repro'] = '';
    $data['left_side_nav'] = false;
    $data['view_module'] = 'youraccount';
    $data['title'] = "Membership Login";

    $this->load->module('templates');
    $this->templates->public_main($data); 
}

function forgot_password()
{
    // $this->load->module('site_security');

    $submit = $this->input->post('submit', TRUE);
    if ($submit=="Send My Password") {
        //process the form
        $this->form_validation->set_rules('email', 'email',
            'required|min_length[5]|max_length[60]|valid_email|is_valid[user_login.email]');

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email', TRUE);

            $results_set = $this->model_name->get_view_data_custom(
                           'email', $email, 'user_login', $orderby = null)->result();

            $user_id = $results_set[0]->id;

            $expire_date = time() + (3 * 24 * 60 * 60); // 3 days; 24 hours; 60 mins; 60 secs
            $random_str  = $this->site_security->generate_random_string(20);
            $data['status'] = 0;                        
            $data['user_priv'] = 0;                                    
            $data['user_access'] = 0;        
            $data['last_login'] = time();
            $data['security_code']  = $expire_date.$random_str;
            $data['password'] = $this->site_security->_hash_string('Smokey{2012}');            

            $this->model_name->_update($user_id, $data);

            /* send rest password email */
            $this->send_mail($email, 'recover', $data['security_code'] );                 

            $this->flash_msg =
              "We have received your password reset request. Please check your email for further instructions.";
            $this->_set_flash_msg($this->flash_msg);

        } else {
           // echo validation_errors();
 
        }
    }

    $data['flash'] = $this->flash_msg ? $this->session->flashdata('item') : '';   
    $data['email'] = $this->input->post('username', TRUE);
    $data['custom_jscript'] = '';
    $data['page_url'] = 'forgot_password';
    $data['page_title'] = 'Login';
    $data['image_repro'] = '';
    $data['left_side_nav'] = false;
    $data['view_module'] = 'youraccount';
    $data['title'] = "Membership Login";

    $this->load->module('templates');
    $this->templates->public_main($data);     

}


function change_password()
{
    $this->load->module('site_security');
    $userid = $this->site_security->_make_sure_logged_in();

    $password  = $this->input->post('password', TRUE);
    $submit    = $this->input->post('submit-form', TRUE);

    if($submit == 'Cancel'){
        redirect( 'youraccount/welcome' );
    }    

    /* make sure password is not contained in userid or email */
    $results_set = $this->model_name->get_view_data_custom('id', $userid, 'user_login', null)->result();
    $this->_check_username = strtolower($results_set[0]->username);
    $this->_check_email  = strtolower($results_set[0]->email);

    $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_password');
    $this->form_validation->set_rules('confirm_password', 'Confirm Password',
     'trim|required|matches[password]');

    if ($this->form_validation->run() == TRUE) {
        /* update database */
        $data['last_login'] = time();
        $data['password']    = $this->site_security->_hash_string($password);        
        $this->model_name->_update($userid, $data);

        /* send email notification of password change */
        $this->send_mail( $this->_check_email, 'recover', null);        

        $this->_end_session();    
        $this->login();

    } else {
       /* found username or email inside password */
       echo validation_errors();
    }

}

function check_password_ajax()
{
    $this->load->module('site_security');
    $userid = $this->site_security->_make_sure_logged_in();

    $results_set = $this->model_name->get_view_data_custom('id', $userid, 'user_login', null)->result();
    $pword_on_table = $results_set[0]->password;

    $old_password = $this->input->post('old_password', TRUE);
    $result = $this->site_security->_verify_hash($old_password, $pword_on_table);

    if ($result==TRUE) {
        echo 1;
    } else {
        echo 0;
    }
}

function logout()
{
    $this->_end_session();        
    redirect(base_url());
}

function _end_session()
{
    unset($_SESSION['user_id']);
    unset($_SESSION['cs_user_id']);    
    unset($_SESSION['cs_user_email']);        

    $this->load->module('site_cookies');
    $this->site_cookies->_destroy_cookie();
}

function complete_application()
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_logged_in();

    $data['flash'] = $this->session->flashdata('item');
    $data['menu_level'] = 1;

    $data['custom_jscript'] = '';
    $data['page_url'] = 'complete_application';
    $data['page_title'] = 'Member Portal';
    $data['image_repro'] = '';
    $data['left_side_nav'] = '';
    $data['view_module'] = 'youraccount';
    $data['title'] = "Welcome. You are logged in.";

    $this->load->module('templates');
    $this->templates->public_main($data);     
}

function _in_you_go($user_id, $login_type, $application_status)
{
    //NOTE: the login_type can be longterm or shortterm
    if ($login_type=="longterm") {
        //set a cookie
        $this->load->module('site_cookies');
        $this->site_cookies->_set_cookie($user_id);
    } else {
        //set a session variable
        $this->session->set_userdata('user_id', $user_id);
    }
    //send the user to the private page
    $url_location = $application_status == 0 ?
             'youraccount/complete_application' : 'youraccount/welcome';

    redirect($url_location);
}


function site_404page()
{
    $data['page_url'] = 'site_404page';
    $data['view_module'] = 'partials';
    $data['page_title'] = 'Member Portal';    
    $data['title'] = "Membership Login";
    $data['left_side_nav'] = false;
    $data['custom_jscript'] = '';
    $this->load->module('templates');
    $this->templates->public_main($data);        
}


function test1()
{
    $your_name = "David";
    $this->session->set_userdata('your_name', $your_name);
    echo "The session variable was set.";

    echo "<hr>";
    echo anchor('youraccount/test2', 'Get (display) the session variable')."<br>";
    echo anchor('youraccount/test3', 'Unset (destry) the session variable')."<br>";
}

function test2()
{
    $your_name = $this->session->userdata('your_name');
    if ($your_name!="") {
        echo "<h1>Hello $your_name</h1>";
    } else {
        echo "No session variable has been set for your_name";
    }

    echo "<hr>";
    echo anchor('youraccount/test1', 'Set the session variable')."<br>";
    echo anchor('youraccount/test3', 'Unset (destry) the session variable')."<br>";
}

function test3()
{
    unset($_SESSION['your_name']);
    echo "The session variable was unset.";

    echo "<hr>";
    echo anchor('youraccount/test1', 'Set the session variable')."<br>";
    echo anchor('youraccount/test2', 'Get (display) the session variable')."<br>";
}




/* ===============================================
    Call backs go here...
  =============================================== */


function username_check($str) 
{
    $this->load->module('site_security');
    $error_msg = "You did not enter a correct username and/or password.";

    $col1 = 'username';
    $value1 = $str;
    $col2 = 'email';
    $value2 = $str;
    $query = $this->model_name->get_with_double_condition($col1, $value1, $col2, $value2);    
    $num_rows = $query->num_rows();

    if ($num_rows<1) {
        $this->form_validation->set_message('username_check', $error_msg);
        return FALSE;        
    }

    foreach($query->result() as $row) {
        $pword_on_table = $row->password;
    }

    $pword = $this->input->post('pword', TRUE);
    $result = $this->site_security->_verify_hash($pword, $pword_on_table);

    if ($result==TRUE) {
        return TRUE;
    } else {
       $this->form_validation->set_message('username_check', $error_msg);
       return FALSE;         
    }
}

function password($pword) 
{

    $error_msg = "Password may not contain your username or email.";

    $pos = strpos($this->_check_username, strtolower($pword)); // strpos($mystring, $findme);
    if ($pos === false)
        $pos = strpos($this->_check_email, strtolower($pword));

    if ($pos==TRUE) {
        $this->form_validation->set_message('password', $error_msg);                
        return FALSE;  // means validation found password inside username or email.
    } else {
        $this->form_validation->set_message('password', $error_msg);                
        return TRUE;         
    }

}


/* ===============================================
    David Connelly's work from perfectcontroller
    is in applications/core/My_Controller.php which
    is extened here.
  =============================================== */


} // End class Controller
