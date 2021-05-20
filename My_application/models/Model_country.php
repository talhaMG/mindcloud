<?
class Model_country extends MY_Model {
	/**
     * TKD inquiry MODEL
     *
     * @package     Country Model
     * @author     	Abdul Ovais Khan (abdul.ovais@tradekey.com)
     * @version     2.0
     * @since       2014 
     */
	 
    protected $_table    = 'country';
    protected $_pk    = 'id';

    public $pagination_params = array();
    public $_per_page    = 20;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function get_country($id)
    {    
        $id = intval($id);
        if(!$id)
            return false;
            
        return $this->find_by_pk($id);
    }
    
    public function get_country_name($id)
    {    
        if($id == 0)
            return '';
        
        $country =  $this->get_country($id);
        return $country['country'] ;
    }
    
    public function get_country_list()
    {
        $param = array();
        $param['where_string'] = 'country_id > 0';
        $param['order'] = 'country ASC';
        return $this->find_all_list($param , "country");
    }

    public function get_code_by_pk($id)
    {
        $param['fields'] = 'sb_country_alias';
        $data = $this->find_by_pk($id,false,$param);
        return isset($data['sb_country_alias']) ? $data['sb_country_alias'] : '';
    }


    public function get_data_by_iso_code($iso_code)
    {
        $param = array();
        $param['where']['sb_iso_code'] = $iso_code;
        return $this->find_one($param);
    }

}
?>