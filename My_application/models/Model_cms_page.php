<?

class Model_cms_page extends MY_Model
{


    protected $_table = 'cms_page';
    protected $_field_prefix = 'cms_page_';
    protected $_pk = 'cms_page_id';
    protected $_status_field = 'cms_page_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // $this->type = (intval($this->uri->segment(4)) == 2 ? 'editor' : 'hidden');
        // $this->file = (intval($this->uri->segment(4)) == 2 ? 'fileupload' : 'hidden');

        // Call the Model constructor
        if(isset($_GET['seo_module']) AND ($_GET['seo_module'] == 1)) {
          $this->pagination_params['fields'] = "cms_page_id,cms_page_name,cms_page_meta_title,cms_page_meta_keywords";
          $this->pagination_params['where_string'] = 'cms_page_page = 1';
        }
        else {
          $this->pagination_params['fields'] = "cms_page_id,cms_page_name,cms_page_page";

          $this->pagination_params['where_string'] = 'cms_page_page > 1';
        }

            $segment = array(20,23,45);
        if (in_array($this->uri->segment(4), $segment)) {
            $this->heading = "hidden";
        }else
        {
            $this->heading = "text";
        }

        $segment_d = array(45);
        if (in_array($this->uri->segment(4), $segment_d)) {
            $this->description = "hidden";
        }else
        {
            $this->description = "editor";
        }

        
      $segment_url = array(44,45, 47,29);
        if (in_array($this->uri->segment(4), $segment_url)) {
            $this->cms_url = "text";
        }else
        {
            $this->cms_url = "hidden";
        }

        $segment_video = array(10,12,13,14,15, 44,45, 47);
        if (in_array($this->uri->segment(4), $segment_video)) {
            $this->cms_video = "videoupload";
        }else
        {
            $this->cms_video = "hidden";
        }

        $segment_hours = array(10);
        if (in_array($this->uri->segment(4), $segment_hours)) {
            $this->cms_duration = "text";
        }else
        {
            $this->cms_duration = "hidden";
        }

        parent::__construct();
    }

    public function get_seo_data($id)
    {
      $param = array();
      $param['fields'] = 'cms_page_meta_title as meta_title,cms_page_meta_keywords as meta_keywords,cms_page_meta_description as meta_description';
      return $this->find_by_pk($id,false,$param);
    }


    public function get_page($id)
    {
      $data = $this->find_by_pk($id);
      $data['child'] = $this->find_all_active(array('where'=>array('cms_page_page'=>$id)));

      return $data;
    }

    /*
    * table             Table Name
    * Name              FIeld Name
    * label             Field Label / Textual Representation in form and DT headings
    * type              Field type : hidden, text, textarea, editor, etc etc. 
    *                                 Implementation in form_generator.php
    * type_dt           Type used by prepare_datatables method in controller to prepare DT value
    *                                 If left blank, prepare_datatable Will opt to use 'type'
    * type_filter_dt    Used by DT FILTER PREPRATION IN datatables.php
    * attributes        HTML Field Attributes
    * js_rules          Rules to be aplied in JS (form validation)
    * rules             Server side Validation. Supports CI Native rules

    * list_data         For dropdown etc, data in key-value pair that will populate dropdown 
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    * list_data_key     For dropdown etc, if you want to define list_data in CONTROLLER (public _list_data[$key]) list_data_key is the $key which identifies it
    *                   -----Incase list_data_key is not defined, it will look for field_name as a $key
    *                   -----USED IN ADMIN_CONTROLLER AND admin's database.php
    */
    public function get_fields($specific_field = "")
    {

        $fields['cms_page_id'] = array(
                   'table'   => $this->_table,
                   'name'   => 'cms_page_id',
                   'label'   => 'id #',
                   'type'   => 'hidden',
                   'type_dt'   => 'text',
                   'attributes'   => array(),
                   'dt_attributes'   => array("width"=>"5%"),
                   'js_rules'   => '',
                   'rules'   => 'trim'
              );

        $fields['cms_page_page'] = array(
                   'table'   => $this->_table,
                   'name'   => 'cms_page_page',
                   'label'   => 'Page / Location',
                   'type'   => 'dropdown',
                   'type_dt'   => 'dropdown',
                   'type_filter_dt'=>'dropdown',
                   'attributes'   => array('additional'=>'disabled="disabled"'),
                   'dt_attributes'   => array("width"=>"5%"),
                   'js_rules'   => '',
                   'rules'   => 'trim'
              );

        $fields['cms_page_name'] = array(
                   'table'   => $this->_table,
                   'name'   => 'cms_page_name',
                   'label'   => 'Name',
                   'type'   => 'label',
                   'type_dt'   => 'text',
                   'attributes'   => array(),
                   'dt_attributes'   => array("width"=>"5%"),
                   'js_rules'   => '',
                   'rules'   => 'trim|htmlentities'
              );

        $fields['cms_page_title'] = array(
                   'table'   => $this->_table,
                   'name'   => 'cms_page_title',
                   'label'   => 'Heading',
                   'type'   => $this->heading,
                   'attributes'   => array(),
                   'dt_attributes'   => array("width"=>"5%"),
                   'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
              );
        

        $fields['cms_page_url'] = array(
                   'table'   => $this->_table,
                   'name'   => 'cms_page_url',
                   'label'   => 'Link',
                   'type'   => $this->cms_url,
                   'attributes'   => array(),
                   'dt_attributes'   => array("width"=>"5%"),
                   'js_rules' => '',
                'rules' => 'trim|htmlentities'
              );


        $fields['tutorial_video'] = array(
                'table' => $this->_table,
                'name' => 'tutorial_video',
                'label' => 'Video',
                'name_path' => 'tutorial_video_path',
                'upload_config' => 'site_upload_cms_page',
                'type' => $this->cms_video,
                'type_dt' => 'video',
                'randomize' => true,
                'preview' => 'true',
                'attributes'   => array(
                    'allow_ext'=>'mkv|avi|mp4',
                ),
                'dt_attributes' => array("width" => "10%"),
                'rules' => 'trim|htmlentities',
                // 'js_rules'=>$is_required_image
              );
 
          // $fields['cms_page_duration'] = array(
          //       'table'   => $this->_table,
          //       'name'   => 'cms_page_duration',
          //       'label'   => 'Duration',
          //       'type'   => $this->cms_duration,
          //       'type_dt'   => 'text',
          //       'attributes'   => array(),
          //       'dt_attributes'   => array("width"=>"5%"),
          //       'js_rules'   => 'required',
          //       'rules'   => 'required|trim|htmlentities'
          //  );


        $fields['cms_page_content'] = array(
                   'table'   => $this->_table,
                   'name'   => 'cms_page_content',
                   'label'   => 'Description',
                   'type'   => $this->description,
                   'attributes'   => array(),
                   'dt_attributes'   => array(),
                   'js_rules' => 'required',
                'rules' => 'required|trim|htmlentities'
              );
      
        $fields['cms_page_meta_title'] = array(
                   'table'   => $this->_table,
                   'name'   => 'cms_page_meta_title',
                   'label'   => 'Meta Title',
                   'type'   => 'text',
                   'attributes'   => array(),
                   'dt_attributes'   => array(),
                   'js_rules' => '',
                'rules' => 'trim|htmlentities'
              );
        $fields['cms_page_meta_keywords'] = array(
                   'table'   => $this->_table,
                   'name'   => 'cms_page_meta_keywords',
                   'label'   => 'Meta Keywords',
                   'type'   => 'textarea',
                   'attributes'   => array(),
                   'dt_attributes'   => array(),
                   'js_rules' => '',
                'rules' => 'trim|htmlentities'
              );
        $fields['cms_page_meta_description'] = array(
                   'table'   => $this->_table,
                   'name'   => 'cms_page_meta_description',
                   'label'   => 'Meta Description',
                   'type'   => 'textarea',
                   'attributes'   => array(),
                   'dt_attributes'   => array(),
                   'js_rules' => '',
                'rules' => 'trim|htmlentities'
              );
           


        if ($specific_field)
            return $fields[$specific_field];
        else
            return $fields;
    }

}

?>