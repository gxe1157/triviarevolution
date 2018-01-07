<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Rename Perfectcontroller to [Name]
class Site_users extends MY_Controller 
{

/* model name goes here */
public $mdl_name = 'Mdl_site_users';
public $main_controller = 'site_users';

public $column_pword_rules  = array(
        array('field' => 'current_password', 'label' => 'Current Password',
              'rules' => 'required|min_length[7]|max_length[35]'),
        array('field' => 'password', 'label' => 'Password',
              'rules' => 'required|min_length[7]|max_length[35]'),
        array('field' => 'confirm_password', 'label' => 'Confirm Password',
              'rules' => 'required|matches[password]')
);

// used like this.. in_array($key, $columns_not_allowed ) === false )
public $columns_not_allowed = array( 'create_date' );
public $default = array();

function __construct() {
    parent::__construct();

    $this->load->helper('site_users/form_flds_helper');
    list( $this->Select_option, $this->column_rules ) = get_fields();
    list( $this->user_main, $this->user_address,
          $this->user_mail_to, $this->user_info, $this->user_employment_le,
          $this->user_employment_prv_sector ) = get_table_data();

    $this->form_tables = array('user_address','user_mail_to','user_main',
                               'user_info','user_employment_le','user_employment_prv_sector');

    /* page settings */
    $update_id = $this->uri->segment(3);
    $this->default['page_title'] = "Manage Members";        
    $this->default['page_header']   = !is_numeric($update_id) ? "Manage Members" : "Update Member Details";
    $this->default['add_button'] = "Add New Memeber";
    $this->default['page_nav']   = "Manage Members";         

    $this->default['flash'] = $this->session->flashdata('item');
}


  
/* ===================================================
    Controller functions goes here. Put all DRY
    functions in applications/core/My_Controller.php
   ==================================================== */
function manage()
{
     $data['custom_jscript'] = [ 'sb-admin/js/datatables.min',
                                'public/js/site_loader_datatable',
                              ];    

    $data['columns']  = $this->get('last_name'); // get data from table
    $data['default']  = $this->default;    
    $data['page_url'] = "manage";

    $this->load->module('templates');
    $this->templates->admin($data);        
}


function create()
{
    quit("create new user here");
}


function save_changes_ajax()
{

    $fld_group = $this->input->post('fld_group', TRUE);
    $update_id = $this->input->post('id', TRUE);
    $fld_arr = $this->$fld_group;

    /* Filter the column rules */
    foreach ($this->column_rules as $index => $array) {
        $chk_value = $array['field'];
        if ( !in_array($chk_value, $fld_arr) ) {
            unset( $this->column_rules[$index]);
        } else{
            $this->column_rules[$index]['input_value'] = $_POST[$chk_value];
        }
    }

    /* Validate form here 0 = failed and 1 = passed */
    $this->load->library('form_validation');
    $this->form_validation->set_rules( $this->column_rules );

    if($this->form_validation->run() == TRUE) {
        $rows_updated = $this->_update_user_tables($fld_group, $fld_arr, $update_id );
        $response['flash_message'] = $rows_updated > 0 ?
            "Record details have been updates." : "Record details did not update.<br>Please notify the website administrator.";

        $response['flash_type'] = $rows_updated > 0 ? "success" : "warning";

        $response['success'] =  '1';            
        $response['errors_array'] = '';        
    } else {
        /*  $row as each individual field array  */
        foreach($this->column_rules as $row){
            $field = $row['field'];                     // getting field name
            $error = form_error($field);                // getting error for field name
            if($error) $errors_array[$field] = $error;  // Add errrors to $errors_array   
        }
        $validation_errors = implode( $errors_array);

        $response['flash_message'] = $validation_errors;
        $response['success'] =  '0';                
        $response['errors_array'] = $errors_array;        
    }
    echo json_encode($response);                                
}


function update_user()
{
    $this->site_security->_make_sure_logged_in();        
    $update_id = is_numeric($this->uri->segment(3)) ?
             $this->uri->segment(3) : $this->site_security->_get_user_id(); 

    /* fetch user application data */
    $result_set = $this->fetch_form_data($update_id);
    $data['columns'] = $result_set[0];
    list( $data['status'], $data['user_avatar'],
          $data['member_id'], $data['fullname'] ) = get_login_info($update_id);    

    $data['Select_option']  = $this->Select_option;

    $data['user_main'] = $this->user_main;
    $data['user_address'] = $this->user_address;
    $data['user_mail_to'] = $this->user_mail_to;
    $data['user_info'] = $this->user_info;    
    $data['user_employment_le'] = $this->user_employment_le;    
    $data['user_employment_prv_sector'] = $this->user_employment_prv_sector;        

    $data['custom_jscript'] = ['public/js/site_user_details',
                               'public/js/model_js'             
                              ];    

    $data['default']   = $this->default;  
    $data['columns_not_allowed'] = $this->columns_not_allowed;
    $data['labels']    = $this->_get_column_names('label');
    $data['input_type']= $this->_get_input_type();    

    $data['page_url']  = "create";
    $data['update_id'] = $update_id;
  
    /* Update member page */
    if( uri_string() == 'member_profile') {
        /* member manager */
        $data['mode'] = 'member_profile';
        $data['menu_level'] = 1;
        $data['image_repro'] = '';
        $data['left_side_nav'] = true;
        $data['nav_module']= 'youraccount/';
  
        $data['cancel'] = 'cancel_member_manage';
        // $data['form_location'] = base_url()."site_users/update_password/".$update_id;

        $data['view_module'] = "site_users";    
        $this->load->module('templates');
        $this->templates->public_main($data);
    } else {
        $data['mode'] = 'admin_member_profile';
        $data['cancel'] = 'cancel';

        $this->load->module('templates');
        $this->templates->admin($data);
    }

}

function _update_user_tables( $table_name, $field_names = array(), $update_id)
{
    /* Get data from post inputs */
    $table_data = array();
    foreach ($field_names as $field_name) {
        $value =  $this->input->post( $field_name, TRUE);
        if( !empty($value) ){
            /* If field is date field the format for SQL */
            if( substr($value,2,1) =='/' && substr($value,5,1) =='/'  )
                $value = SQLformat_date($value);

          $table_data[$field_name] = $value;
        }
    }
    /* Update into mysql here */
    $rows_updated = $this->model_name->update_data($table_name, $table_data, $update_id );    
    return $rows_updated;
    unset($table_data);
}

function _get_input_type() 
{
    foreach ($this->column_rules as $key => $value) {
      $field  = $this->column_rules[$key]['field'];
      $data[$field] = $this->column_rules[$key]['input_type']."|".$this->column_rules[$key]['input_options'];
    }
    return $data;
}

function fetch_form_data($user_id)
{

  $user_tables = implode(",", $this->form_tables);

  $mysql_query ="SELECT ";
  $mysql_query .= $this->_build_select_query('user_main', $this->user_main );  
  $mysql_query .= $this->_build_select_query('user_address', $this->user_address );
  $mysql_query .= $this->_build_select_query('user_mail_to', $this->user_mail_to );
  $mysql_query .= $this->_build_select_query('user_info', $this->user_info );    
  $mysql_query .= $this->_build_select_query('user_employment_le', $this->user_employment_le );
  // $mysql_query .= $this->_build_select_query('user_children', $this->user_children );
  $mysql_query .= $this->_build_select_query('user_employment_prv_sector',
                                            $this->user_employment_prv_sector );

  $mysql_query = substr($mysql_query, 0, -2);
  $mysql_query .=" FROM ".$user_tables;
  $mysql_query .=" where user_address.user_id = '".$user_id."'";
  $mysql_query .=" and user_mail_to.user_id = '".$user_id."'";
  $mysql_query .=" and user_main.user_id = '".$user_id."'";  
  $mysql_query .=" and user_info.user_id = '".$user_id."'";
  $mysql_query .=" and user_employment_le.user_id = '".$user_id."'";
  // $mysql_query .=" and user_children.user_id = '".$user_id."'";  
  $mysql_query .=" and user_employment_prv_sector.user_id = '".$user_id."'";

  $result_set = $this->_custom_query($mysql_query)->result();
  return $result_set;
}

function _build_select_query($table_name, $field_array)
{
    $query_line = '';
    foreach ($field_array as $value) {
        $query_line .= $table_name.'.'.$value.', ';
    }

    if( $table_name == 'user_main') $query_line .= $table_name.'.create_date, ';
    return $query_line;
}


function change_account_status( $update_id, $status )
{
    /* unsuspend = 1, suspend = 2 */
    $this->_numeric_check($update_id);    
    // $this->_security_check();    
    $table_data = ['status' => $status];
    $this->model_name->update_data( 'user_login', $table_data, $update_id );  
    if( $status == 1)
        $this->_set_flash_msg("The user account was sucessfully re-activated");

    redirect( $this->main_controller.'/update_user/'.$update_id);
}


function update_password()
{
    $this->site_security->_make_sure_logged_in();        
    $update_id = is_numeric($this->uri->segment(3)) ?
             $this->uri->segment(3) : $this->site_security->_get_user_id(); 

    $submit = $this->input->post('submit', TRUE);
    if ($submit=="Cancel_member_manage")
        redirect('youraccount/welcome');


    if( !is_numeric($update_id) ){
        redirect( $this->main_controller.'/manage');
    } elseif( $submit == "Cancel" ) {
        redirect( $this->main_controller.'/update_user/'.$update_id);
    } 

    if( $submit == "Submit" ) {
        // process changes
        $this->load->library('form_validation');
        $this->form_validation->set_rules( $this->column_pword_rules );

        if($this->form_validation->run() == TRUE) {
            $password = $this->input->post('password', TRUE);
            $this->load->module('site_security');
            $data['password'] = $this->site_security->_hash_string($password);

            //update the account details
            $this->_update($update_id, $data);
            $this->_set_flash_msg("The account password was sucessfully updated");
            redirect( $this->main_controller.'/create/'.$update_id);
        }
     }

    $result_set = $this->fetch_form_data($update_id);
    $data['columns'] = $result_set[0];
    list( $data['status'], $data['user_avatar'],
          $data['member_id'], $data['fullname'] ) = get_login_info($update_id);    

    $data['default']  = $this->default;    
    $data['page_url']  = "update_password";
    $data['update_id'] = $update_id;

    /* Update member page */
    if( uri_string() == 'password_reset') {
        /* member manager */
        $data['mode'] = 'password_reset';
        $data['menu_level'] = 1;
        $data['image_repro'] = '';
        $data['left_side_nav'] = true;
        $data['nav_module']= 'youraccount/';
  
        $data['cancel'] = 'Cancel_member_manage';
        $data['form_location'] = base_url()."password_reset";

        $data['view_module'] = "site_users";    
        $this->load->module('templates');
        $this->templates->public_main($data);
    } else {
        $data['mode'] = 'admin_member_profile';
        $data['cancel'] = 'Cancel';

        $data['view_module'] = "site_users";    
        $this->load->module('templates');
        $this->templates->admin($data);
    }
}

function delete( $update_id )
{
    $this->_numeric_check($update_id);    
        

    $submit = $this->input->post('submit', TRUE);

    if( $submit =="Cancel" ){
        redirect( $main_controller.'/update_user/'.$update_id);
    } elseif( $submit=="Yes - Delete Account" ){
        /* get account title from site_users table */
        $row_data = $this->fetch_data_from_db($update_id);
        $data['firstname'] = $row_data['firstname'];            
        // $this->_process_delete($update_id);
        $this->_set_flash_msg("The account ".$data['firstname'].", was sucessfully deleted");

        redirect( $main_controller.'/manage');
    }

}

function _process_delete( $update_id )
{
    /* delete related table */

    /* remove the images */
    // if(file_exists($big_pic_path)) {
    //     unlink($big_pic_path);
    // } 

    /* delete account */
     $this->_delete( $update_id );
}



/* ===============================================
    Call backs go here...
  =============================================== */





/* ===============================================
    David Connelly's work from perfectcontroller
    is in applications/core/My_Controller.php which
    is extened here.
  =============================================== */


} // End class Controller
