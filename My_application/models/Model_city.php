<?
class Model_city extends MY_Model {
	/**
     * TKD inquiry MODEL
     *
     * @package     Country Model
     * @author     	Abdul Ovais Khan (abdul.ovais@tradekey.com)
     * @version     2.0
     * @since       2014 
     */
	 
    protected $_table    = 'city';
    protected $_pk    = 'c_id';

    public $pagination_params = array();
    public $_per_page    = 20;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
   
    public function get_list_by_state_id($state_id)
    {    
        $param = array();
        $param['where']['c_state_id'] = $state_id;
        $param['order'] = 'c_name ASC';
        return $this->find_all_list($param , "c_name");
    }
}
?>