<?
class Model_country_state extends MY_Model {
	/**
     * TKD inquiry MODEL
     *
     * @package     Country Model
     * @author     	Abdul Ovais Khan (abdul.ovais@tradekey.com)
     * @version     2.0
     * @since       2014 
     */
	 
    protected $_table    = 'country_state';
    protected $_pk    = 'cs_id';

    public $pagination_params = array();
    public $_per_page    = 20;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function join_country($type="" , $append_joint ="" , $prepend_joint = "")
    {
        $joint = $prepend_joint . "cs_country_id = country_id " . $append_joint ; 
        return $this->prep_join("country" , $joint, $type );
    }
    
    public function get_list_by_country_id($country_id)
    {    
        $param = array();
        $param['where']['cs_country_id'] = $country_id;
        $param['order'] = 'cs_name ASC';
        return $this->find_all_list($param , "cs_name");
    }

    // public function get_list()
    // {
    //     $params = array();
    //     $params['joins'][] = $this->join_country();
    //     $data = $this->find_all($params);
    //     debug($data,1);
    // }
    
    // public function get_country_name($id)
    // {    
    //     if($id == 0)
    //         return '';
        
    //     $country =  $this->get_country($id);
    //     return $country['country'] ;
    // }
    
    // public function get_country_list()
    // {
    //     $param = array();
    //     $param['where_string'] = 'country_id > 0';
    //     $param['order'] = 'country ASC';
    //     return $this->find_all_list($param , "country");
    // }

    // public function get_code_by_pk($id)
    // {
    //     $param['fields'] = 'sb_country_alias';
    //     $data = $this->find_by_pk($id,false,$param);
    //     return isset($data['sb_country_alias']) ? $data['sb_country_alias'] : '';
    // }


    // public function get_data_by_iso_code($iso_code)
    // {
    //     $param = array();
    //     $param['where']['sb_iso_code'] = $iso_code;
    //     return $this->find_one($param);
    // }

}
?>