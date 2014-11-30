<?

class Facebooktest extends Controller{
        function Facebooktest(){
                parent::Controller();
                $this->load->model('facebook_model');
				$this->load->model('facebook_model');
        		$cookie = $this->facebook_model->get_facebook_cookie();
        }
        
        function index(){
                $this->load->view('facebooktest/index');
        }

        function test1(){
                $data = array();
                $data['user'] = $this->facebook_model->getUser();
                $this->load->view('facebooktest/test1',$data);
        }
}

?>