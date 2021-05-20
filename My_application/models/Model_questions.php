<?

class Model_questions extends MY_Model
{
    /**
     *
     * @package     questions Model
     * @version     1.0
     * @since       15 Jan,2018
     */

    protected $_table = 'questions';
    protected $_field_prefix = 'questions_';
    protected $_pk = 'questions_id';
    protected $_status_field = 'questions_status';
    public $relations = array();
    public $pagination_params = array();
    public $dt_params = array();
    public $_per_page = 20;

    function __construct()
    {
        // Call the Model constructor
      
        $this->pagination_params['fields'] = "
        questions_id,
        questions_name,
        questions_course_id,
        questions_status";

        $this->pagination_params['joins'][] = array(
                                "table"=> "tutorial", 
                                "joint"=> "tutorial.tutorial_id = questions.questions_course_id",
                                "type" => "left"
                                );

           $this->relations['questions_options'] = array(
                        "type"=>"has_many", 
                        "own_key"=>"qo_questions_id", 
                        "other_key"=>"qo_options_id",
        );

        parent::__construct();

    }




public function reset_answers($qid)
{
    $where['qo_questions_id'] = $qid;
    $param['qo_correct_answer'] = 0;
    $this->model_questions_options->update_model($where,$param);
}

public function get_options($qid)
{
    $param = array();
    $param['fields'] = "options_id,options_name,qo_id,qo_correct_answer";
    $param['joins'][] = array(
                                "table"=> "options", 
                                "joint"=> "options.options_id = questions_options.qo_options_id and options_status = 1 and qo_questions_id = $qid",
                                );
    $data = $this->model_questions_options->find_all($param);
    // debug($data);
    return $data;
}
    public function questions_with_options($courseid = 0,$param=array())
    {
                // $param = array();
                $param['where']['questions_course_id'] = $courseid;
                $qs = $this->model_questions->find_all_active($param);
                if (isset($qs) && array_filled($qs)) {
                    foreach ($qs as $key => $value) {
                        $qs[$key]['options'] =  $this->get_options($value['questions_id']);
                    }
                }
    return $qs;
    }

    // public function get_correct_answer($qs_id = 0,$param=array())
    // {
               
    //     return ;
    // }

    public function get_fields($specific_field = "")
    {
      
        $fields = array(

            'questions_id' => array(
                'table' => $this->_table,
                'name' => 'questions_id',
                'label' => 'id #',
                'type' => 'hidden',
                'type_dt' => 'text',
                'attributes' => array(),
                'dt_attributes' => array("width" => "5%"),
                'js_rules' => '',
                'rules' => 'trim'
            ),

          'questions_course_id' => array(
                'table' => $this->_table,
                'name' => 'questions_course_id',
                'label' => 'Course',
                'type' => 'dropdown',
                'attributes' => array(),
                'list_data' => array(
                    ),
                'js_rules' => 'required',
                'dt_attributes' => array("width" => "20%"),
                'rules' => 'required|trim|htmlentities'
            ),

            'questions_name' => array(
                'table' => $this->_table,
                'name' => 'questions_name',
                'label' => 'Question',
                'type' => 'text',
                'attributes' => array(),
                'js_rules' => 'required',
                'dt_attributes' => array("width" => "20%"),
                'rules' => 'required|trim|htmlentities'
            ),

        'questions_options' => array(
                  'table'   => "questions_options",
                  'name'   => 'qo_options_id',
                  'label'   => 'Options',
                  'type'   => 'multiselect',
                  'attributes'   => array(),
                  'js_rules'   => '',
                  'rules'   => '',
      ),

            // 'questions_image' => array(
            //     'table' => $this->_table,
            //     'name' => 'questions_image',
            //     'label' => 'questions Image',
            //     'name_path' => 'questions_image_path',
            //     'upload_config' => 'site_upload_questions',
            //     'type' => 'fileupload',
            //     'type_dt' => 'image',
            //     'randomize' => true,
            //     'preview' => 'true',
            //     'attributes'   => array(
            //         'image_size_recommended'=>'118px × 176px',
            //         'allow_ext'=>'png|jpeg|jpg',
            //     ),
            //     'dt_attributes' => array("width" => "10%"),
            //     'rules' => 'trim|htmlentities',
            //     'js_rules'=>''
            // ),

            'questions_status' => array(
                'table' => $this->_table,
                'name' => 'questions_status',
                'label' => 'Status?',
                'type' => 'switch',
                'type_dt' => 'dropdown',
                'type_filter_dt' => 'dropdown',
                'list_data_key' => "questions_status",
                'list_data' => array(),
                'default' => '1',
                'attributes' => array(),
                'dt_attributes' => array("width" => "7%"),
                'rules' => 'trim'
            )

        );

        if ($specific_field)
            return $fields[$specific_field];
        else
            return $fields;
    }

}

?>