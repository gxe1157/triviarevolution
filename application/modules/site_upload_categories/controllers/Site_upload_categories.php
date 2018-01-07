<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Rename Perfectcontroller to [Name]
class Site_upload_categories extends MY_Controller
{

/* model name goes here */
var $mdl_name = 'mdl_site_upload_categories';
var $site_controller  = 'site_upload_categories';

/* set site upload mysql table name here */
var $items_mysql_table = 'site_upload_categories';
/* set assign category mysql table name here  */
var $cat_assign_mysql_table = 'store_cat_assign';


var $column_rules = array(
        array('field' => 'cat_title', 'label' => 'Category Title', 'rules' => 'required'),
        array('field' => 'parent_cat_id', 'label' => 'Parent Catergory', 'rules' => '')
);

public $columns_not_allowed = [];
public $default = [];

function __construct() {
    parent::__construct();
   /* is user logged in */
    $this->default = login_init();  

    /* Manage panel */
    $update_id = $this->uri->segment(3);
    $this->default['page_title'] = !is_numeric($update_id) ?
                                   "Manage Categories" : "Update Category Details";        
    $this->default['page_nav']   = "Categories"; 
    $this->default['flash'] = $this->session->flashdata('item');
    $this->site_security->_make_sure_logged_in();        
}



/* ===================================================
    Controller functions goes here. Put all DRY
    functions in applications/core/My_Controller.php
  ==================================================== */

function manage()
{
    $parent_cat_id = is_numeric($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

    /* get form fields structure */
    $data['site_controller'] = $this->site_controller;

    /* get form fields structure */
    $data['columns']  = $this->get_where_custom('parent_cat_id', $parent_cat_id);
    $data['sub_cats'] = $this->_count_sub_cats();

    $data['redirect_base']= base_url().$this->uri->segment(1);
    $data['add_button'] =
         $this->uri->segment(4) != null ? "Add Sub Category" : "Add New Category";

    $data['cancel_button_url'] = $data['redirect_base']."/manage";

    $data['add_button_url']=
         $data['redirect_base'].'/create/'.$this->uri->segment(3).'/add_sub-category';

    $data['custom_jscript'] = [ 'sb-admin/js/datatables.min',
                                'public/js/site_datatable_loader',
                                'public/js/format_flds'];    

    $data['default']   = $this->default;    
    $data['page_url'] = "manage";
    $data['title']    = "Admin Manage Pages";    
    $data['update_id'] = "";

    $this->load->module('templates');
    $this->templates->admin($data); 
}


function create()
{
    $update_id = $this->uri->segment(3);

    $submit = $this->input->post('submit', TRUE);
    $posted_mode   = $this->input->post('mode', true);

    $redirect_posted_mode =
        $this->site_controller.'/manage/'.$this->input->post('parent_cat_id', TRUE);

    if( $submit == "Finish" || $submit == "Return" || $submit == "Cancel" )
        redirect( $redirect_posted_mode );


    if( $submit == "Submit" ) {
        // process changes
        $this->load->library('form_validation');
        $this->form_validation->set_rules( $this->column_rules );

        if($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();
            // make search friendly url
            $data['category_url'] = url_title( $data['cat_title'] );

            $flash_message = '';            
            if(is_numeric($update_id)){
                //update the category details
                 $update_rec = $this->_update($update_id, $data);
                if( $update_rec > 0 )
                    $flash_message = "The category details were successfully updated ";
           } else {
                //insert a new category
                $this->_insert($data);
                $update_id = $this->get_max(); // get the ID of new category
                $flash_message = $update_id > 0 ? "The category has been successfully added to database. " : "Add New Category record to database has <b>failed</b>. ";

            }
            if($flash_message)
               $this->_set_flash_msg($flash_message);

            redirect( $redirect_posted_mode );

            // redirect( $redirect_posted_mode );
            // if( $posted_mode == 'add_sub-category'){
            //     redirect( $redirect_posted_mode );
            // } else {
            //     redirect($this->site_controller.'/manage');
            // }
        }

    }

    if( ( is_numeric($update_id) ) && ($submit != "Submit") ) {
        $data['columns'] = $this->fetch_data_from_db($update_id);
    } else {
        $data['columns'] = $this->fetch_data_from_post();
    }

    $data['site_controller'] = $this->site_controller;
    $data['redirect_base']= base_url().$this->uri->segment(1);

    $data['options'] = $this->_get_dropdown_options($update_id);
    $data['num_dropdown_options'] = count( $data['options'] );
    $data['sub_cats'] = $this->_count_sub_cats();

    $data['mode'] = $posted_mode != null ? : $this->uri->segment(4);
    $data['button_options'] = "Update Customer Details";

    $this->default['headline'] = !is_numeric($update_id) ?
                                    "Add New Category" : "Update Category Details";

    $data['default'] = $this->default;  
    $data['columns_not_allowed'] = $this->columns_not_allowed;
    $data['labels'] = $this->_get_column_names('label');

    $data['custom_jscript'] = [ 'sb-admin/js/jquery.cleditor.min'];    
    $data['page_url'] = "create";
    $data['update_id'] = $update_id;

    $this->load->module('templates');
    $this->templates->admin($data);

}

// function delete() {
//     $this->_security_check();
//     $this->load->helper('store_items/store_prd_helper');    

//     $update_id = $this->uri->segment(3);
//     list($item_id, $parent_cat_id) = explode('-',$update_id);

//     if( $parent_cat_id == 0 ) {
//         $category_url = url_title(sub_cat_title($item_id));
//         $directory_name  = build_folder_name($this->parent_cat_img_base, $category_url);
//         $dir_deleted = rmdir($directory_name);
//     }

//     $items_deleted = $this->_delete($item_id);
//     if( $items_deleted > 0 ) {
//         $cat_type = $parent_cat_id == 0 ? 'Category' : 'Sub Category';
//         /* remove sub cat from store_cat_assign */
//         // $data_table = 'store_cat_assign';
//         // $rows_deleted = $this->_delete($item_id, $data_table);

//         $item = $items_deleted == 1 ? 'Item.' : 'Items.';
//         $flash_message = "You have sucessfully removed ".$items_deleted." <b>".$cat_type."</b> ".$item;
//         $this->_set_flash_msg($flash_message);

//     }    
//     redirect($this->site_controller.'/manage/'.$parent_cat_id );
// }

function _get_dropdown_options( $update_id )
{
    if(!is_numeric($update_id))
         $update_id = 0;

    $options[] = "Please Select .... ";
    // parent category array
    $mysql_query =  "SELECT * From ".$this->items_mysql_table." where parent_cat_id=0 and id!=$update_id";
    $query = $this->_custom_query($mysql_query);
    foreach($query->result() as $row){
       $options[ $row->id ] = $row->cat_title;
    }
    return $options;
}

function _count_sub_cats()
{
    $sub_cats = [];
    $mysql_query  =  "SELECT *, count(*) as sub_cats_counts
                      FROM ".$this->items_mysql_table." group by parent_cat_id";

    $myResults = $this->_custom_query($mysql_query );

    foreach( $myResults->result() as $key => $line ){
        $sub_cats[ $line->parent_cat_id ] = $line->sub_cats_counts;
    }
    return $sub_cats;
}

function _get_sub_cat($parent_id)
{
    $sql  = "SELECT * FROM ".$this->items_mysql_table." where parent_cat_id = $parent_id ORDER BY cat_title";
    $sub_categories = $this->db->query($sql)->result();
    return $sub_categories;
}

function _get_cat_id_from_cat_url( $category_url ) {
    $query   = $this->get_where_custom('category_url', $category_url);
    $num_row = $query->num_rows();

    // show_error('Page was found........... ' );
    if($num_row == 0 ) show_404();

    $cat_id = _get_first_record( $query, 'id');
    return $cat_id;
}

function _get_target_pagination_base_url()
{
    $first_seg  = $this->uri->segment(1);
    $second_seg = $this->uri->segment(2);
    $third_seg  = $this->uri->segment(3);
    $target_base_url = base_url().$first_seg.'/'.$second_seg.'/'.$third_seg;
    return $target_base_url;

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
