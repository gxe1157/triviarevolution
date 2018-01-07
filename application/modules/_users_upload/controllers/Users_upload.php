<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Rename Perfectcontroller to [Name]
class Users_upload extends MY_Controller
{

/* model name goes here */
var $mdl_name = 'Mdl_users_upload';
var $store_controller = 'users_upload';

var $column_rules = array(
    array('field' => '---', 'label' => '---', 'rules' => '---')
);

//// use like this.. in_array($key, $columns_not_allowed ) === false )
var  $columns_not_allowed = array( 'create_date' );

function __construct() {
    parent::__construct();

    // checkArray($this->default,1);
}


/* ===================================================
    Controller functions goes here. Put all DRY
    functions in applications/core/My_Controller.php
   =================================================== */

function index()
{
quit('users_upload',1)  ;
    $userid = $this->site_security->_make_sure_logged_in();
    $image_list = array();
    $users_images = array();

    list( $image_list, $users_images ) = $this->_get_image_info($userid);
    $data['image_list'] = $image_list;
    $data['users_images'] = $users_images;

    $data['userid'] = $userid;

    $data['menu_level'] = 1;
    $data['custom_jscript'] = ['public/js/upload-image',
                               'public/js/format_flds'
                              ];

    $data['page_url'] = 'image_upload';
    $data['image_repro'] = '';
    $data['left_side_nav'] = false;
    $data['view_module'] = 'users_upload';
    $data['title'] = "Upload Image using Ajax JQuery in CodeIgniter";

    $url = basename($_SERVER['HTTP_REFERER']);
    if($url == 'users_application' || $url == 'welcome') {
      $data['page_title'] = 'Upload Files';
      $this->load->module('templates');
      $this->templates->public_main($data);
    } else {
      $this->default['page_title'] = 'Dashboard Page';
      $data['default'] =  $this->default;

      $this->load->module('templates');
      $this->templates->admin($data);
    }
}

function _get_image_info($userid)
{

  /* Check userid account to verify passcode here */
    $image_list = array();
    $users_images = array();

    /* Get image categories */
    $query = $this->model_name->get_view_data_custom('parent_cat', 0,'users_upload', null);
    foreach($query->result() as $row){
        $image_list[$row->id] = $row->role;
    }
    //echo "image_list: ".count($image_list);

    if( count($image_list) > 0 )  {
      /* assign images to categories */
      $query = $this->model_name->get_view_data_custom('userid', $userid,'users_upload', null);
      foreach($query->result() as $row){
          $role = $image_list[$row->parent_cat];
          $img_uploaded = explode("_", $row->image);
          /* minimize image name conflicts by verifing userid attached to image name.*/
          if( $userid != $img_uploaded[0] ){
              die('.......... ERROR .............. prg: users_upload | '.$row->image);
              $users_images[ $role ] = array( $row->id, '');
          } else {
              $users_images[ $role ] = array( $row->id, $img_uploaded[1], $row->image,
                    $row->create_date, $row->path );
          }
      }
    }
    return array($image_list, $users_images);
}


function ajax_remove()
{
    // $this->_security_check();
    sleep(1);

    $id = $_POST['id'];  // image_id
    $query = $this->get_where_custom('id', $id);
    $results = $query->result();
    $file_name = $results[0]->image;
    $file_location = './upload/'.$file_name;
    $file_name = explode("_",$file_name);

    $this->_delete($id);

    /* get absolute path to file */
    if( file_exists( $file_location ) ) {
        unlink($file_location);
        $response = array(
          "position"  => $_POST['position'],
          "remove_name" => $file_name[1],
          "error_mess" => ''
        );
    } else {
        $response = array(
          "position"  => $_POST['position'],
          "remove_name" => $file_location,
          "error_mess" => 'We can not remove the file at this time... Try again later... '
        );
    }

    echo json_encode($response);
}

function ajax_remove_avatar()
{
    $userid = $this->site_security->_make_sure_logged_in();

    $imagename = 'annon_user.png';
    $this->_update_avatar_data($imagename, $userid);

    $data['file_name'] = $imagename;
    echo json_encode($data);
}

function ajax_upload_one()
{
    // $this->_security_check();
    sleep(1);
    $userid = $this->site_security->_make_sure_logged_in();

    $config["upload_path"]   = './upload/';
    $config['allowed_types'] = 'jpeg|jpg|png|gif';
    $config['max_size']      = '1024';

    $this->load->library('upload', $config);

    $imagename = $userid.'_avatar_'.$_FILES['file']['name'];
    $config['file_name'] = $imagename; // set the name here

    $this->upload->initialize($config);

    if($this->upload->do_upload('file')) {
       $data = $this->upload->data();
       $this->_update_avatar_data($imagename, $userid);
       $data['Success'] = 1;
    } else {
      // display errors
      $data['Success'] = 0;
      $data['file_info'] = $this->upload->data();
      $data = "<p>The filetype/size you are attempting to upload is not allowed. The max-size for files is ".$config['max_size']." kb and accepted file formats are ".$config['allowed_types'].".</p>";

    }
    echo json_encode($data);
}

function _update_avatar_data($imagename, $userid)
{
    /* get image name on file */
    $default_avatar = 'annon_user.png';
    $mysql_query    = "SELECT avatar_name FROM `user_login` WHERE `id` =".$userid;
    $result_set     = $this->model_name->_custom_query($mysql_query)->result();
    $avatar_on_file = $result_set[0]->avatar_name;

    if( $avatar_on_file != $default_avatar  &&  $avatar_on_file !='' ){
        $file_location  = './upload/'.$avatar_on_file;
        if( file_exists( $file_location ) )
            unlink($file_location);
    }

    /* Update database */
    $mysql_query = "UPDATE `user_login` SET `avatar_name` = '".$imagename."' WHERE `user_login`.`id` = ".$userid;

    $this->model_name->_custom_query($mysql_query);
}


function in_array($haystack, $needle)
{
   foreach($haystack as $first_key => $array) {
      foreach( $array as $sec_key=>$value){
        if( $needle == $value ){
            return true;
        }
      }
   }
   return false;
}

function test()
{

  echo "<h1>test</h1>";

  list( $image_list, $users_images ) = $this->_get_image_info(1);

  $isFound = $this->in_array($users_images, '1_Chrysanthemum.jpg' );

  echo $isFound == true ? 'found dupes':' Nope..';

}

function ajax_upload()
{
  // $this->_security_check();

  sleep(1);

  $userid = $this->site_security->_make_sure_logged_in();

  list( $image_list, $users_images ) = $this->_get_image_info($userid);

  $vector = $_FILES['file'];
  foreach($vector as $key1 => $value1)
      foreach($value1 as $key2 => $value2)
          $result[$key2][$key1] = $value2;
  $uploaded_files = $result;

  if( count($uploaded_files) > 0) {
    // $output = '';
    $config["upload_path"]   = './upload/';
    $config['allowed_types'] = 'jpeg|jpg|png|gif';
    $config['max_size']      = '1024';

    $this->load->library('upload', $config);

    for($display_position = 0; $display_position<count($uploaded_files); $display_position++) {

      if( !empty($uploaded_files[$display_position]["name"]) ) {
        $_FILES["file"]["name"] = $uploaded_files[$display_position]["name"];
        $_FILES["file"]["type"] = $uploaded_files[$display_position]["type"];
        $_FILES["file"]["tmp_name"] = $uploaded_files[$display_position]["tmp_name"];
        $_FILES["file"]["error"] = $uploaded_files[$display_position]["error"];
        $_FILES["file"]["size"] = $uploaded_files[$display_position]["size"];

        $imagename = $userid.'_'.$uploaded_files[$display_position]["name"];
        $config['file_name'] = $imagename; // set the name here
        $this->upload->initialize($config);

        $isFound = $this->in_array($users_images, $imagename );
        if( $isFound ) {
            /* Duplicate found... Do Not Upload */
            $response[$display_position] = array(
              "error_mess"=> ''
            );

        } else {

              if($this->upload->do_upload('file')) {
                  /* pload is successful - update mySQL */
                  $data = $this->upload->data();

                  $row_data = array(
                    'userid' => $userid,
                    'parent_cat' => $display_position+1,
                    'image' => $data['file_name'],
                    'path'  => $data['full_path'],
                    'size'  => $data['file_size'],
                    'width_height'=> $data['image_size_str'],
                    'create_date'=> time()  // timestamp for database
                  );

                  /* Insert data and get record id */
                  $update_id = $this->_insert($row_data);
                  $response[$display_position] = array(
                    "position"  => $display_position+1,
                    "update_id" => $update_id,
                    "file_name" => $data["client_name"],
                    "file_ext"  => $data["file_ext"],
                    "file_size" => $data["file_size"],
                    "image_type"=> $data["image_type"],
                    "image_size_str"=>$data["image_size_str"],
                    "error_mess"=> ''
                  );

              } else {
                  /* Upload has failed....*/
                  $data = '';
                  $data = "<p>The filetype/size you are attempting to upload is not allowed. The max-size for files is ".$config['max_size']." kb and accepted file formats are ".$config['allowed_types'].".</p>";

                  $response[$display_position] = array(
                    "file_name" => '',
                    "position"  =>$display_position+1,
                    "error_mess"=> $data,
                  );

              }
            } // end if
          } // end Duplicate
    } // end foreach
    echo json_encode($response);
  }
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
