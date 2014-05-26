<?php
//mailing_list.php is a codeigniter controller

class Mailing_list extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}//end constructor	

	public function index()
	{//here we are making data available  to our header and footer
		$this->load->model('Mailing_list_model');
		$data['query'] = $this->Mailing_list_model->get_mailing_list();
		$data['title'] = "Here is our title tag!";
		$data['style'] = "cerulean.css";
		$data['banner'] = "Here is our Web Site!";
		$data['copyright'] = "copyright goes here!";
		$data['base_url'] = base_url();
		$this->load->view('header',$data);

		//var_dump($data['query']);
		$this->load->view('mailing_list/view_mailing_list',$data);

		$this->load->view('footer',$data);

	}// end index()

	public function view($id)
	{//this will show us the data from a single page
		$this->load->model('Mailing_list_model');
		$data['query'] = $this->Mailing_list_model->get_id($id);


		$data['title'] = "Here is our title tag!";
		$data['style'] = "cerulean.css";
		$data['banner'] = "Here is our Web Site!";
		$data['copyright'] = "copyright goes here!";
		$data['base_url'] = base_url();
		$this->load->view('header',$data);

		//var_dump($data['query']);
		$this->load->view('mailing_list/view_mailing_list_detail',$data);

		$this->load->view('footer',$data);

	}//end view()

	public function add()
	{//is a form to add a new record
		$this->load->helper('form');
		$data['title'] = "Adding a record!";
		$data['style'] = "cerulean.css";
		$data['banner'] = "Add a record!";
		$data['copyright'] = "copyright goes here!";
		$data['base_url'] = base_url();
		$this->load->view('header',$data);

		//var_dump($data['query']);
		$this->load->view('mailing_list/add_mailing_list',$data);

		$this->load->view('footer',$data);
	}//end add()

	public function insert()
	{//will insert the data entered via add()
		$this->load->model('Mailing_list_model');
		$this->load->library('form_validation');
		//must have atleast one validation rule to insert
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('first_name','First Name','trim|required');
		$this->form_validation->set_rules('last_name','Last Name','trim|required');
		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('state','State','trim|required');
		$this->form_validation->set_rules('zip_postal','Zip Postal','trim|required');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');

		if($this->form_validation->run() == FALSE)
		{//failed valiation - send back to form
			//VIEW DATA ON FAILURE GOES HERE!!
			$this->load->helper('form');
			$data['title'] = "Adding a record!";
			$data['style'] = "cerulean.css";
			$data['banner'] = "Data Entry Error!";
			$data['copyright'] = "copyright goes here!";
			$data['base_url'] = base_url();
			$this->load->view('header',$data);
	
			//var_dump($data['query']);
			$this->load->view('mailing_list/add_mailing_list',$data);
	
			$this->load->view('footer',$data);

			}else{//insert data
				$post = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'email' => $this->input->post('email'),
					'address' => $this->input->post('address'),
					'state_code' => $this->input->post('state_code'),
					'zip_postal' => $this->input->post('zip_postal'),
					'password' => $this->input->post('password'),
					'bio' => $this->input->post('bio'),
					'interests' => $this->input->post('interests'),
					'num_tours' => $this->input->post('num_tours'),

				);

				$id = $this->Mailing_list_model->insert($post);

				echo 'id is:' . $id;
				die;

				redirect('/mailing_list/view/' . $id);




				// echo "Data inserted?";

			}

	}//end insert()
}




// userid: 1
// first_name: John
// last_name: Doe
// email: john@example.com
// address: 123 Any Street
// state_code: WA
// zip_postal: 98111
// password: abc123
// bio: Hi! I'm John, and here's my Bio!
// interests: golf,hiking,billiards
// num_tours: 1


?>