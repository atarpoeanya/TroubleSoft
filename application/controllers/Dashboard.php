
<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Dashboard extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Troublelist_model');
        $this->load->library('form_validation');
    }

    public function index()
    {


        // View Load
        $this->load->view('templates/header');
        $this->load->view('dashboard/dashboard');
        $this->load->view('templates/footer');
        // js
        $this->load->view('js/dashboard_js');
        // modals
        $this->load->view('modals/addParts');
        $this->load->view('modals/delete');
        // $this->load->view('modals/editParts');


        //other method
        $this->postSpare();
    }

    // Data Grabber

    public function get_troubleList()
    {
        $data['troubleList'] = $this->Troublelist_model->getTroubleList();
        $data['title'] = $this->Troublelist_model->getTitle('t800_equipment');
        $this->load->view('function/print_table_trouble');
        f_generate_table_select($data);
    }

    public function get_troubleList_fmea()
    {
        $data['tool_Fmea'] = $this->Troublelist_model->getTrouble_fmea();
        $data['title'] = $this->Troublelist_model->getTitle('t203_equipment_fmea');
        $this->load->view('function/print_table_tool_fmea');
        f_generate_table_select($data);
    }

    
    public function get_troubleList_fmea_lite()
    {
        $data['tool_Fmea'] = $this->Troublelist_model->getTrouble_fmea();
        $data['title'] = $this->Troublelist_model->getTitle('t203_equipment_fmea');
        $this->load->view('function/print_table_tool_fmea_lite');
        f_generate_table_select($data);
    }

    public function get_sparepartList()
    {

        $data['title'] = $this->Troublelist_model->getTitle('t202_spareparts');
        $data['sparePart'] = $this->Troublelist_model->getSparepartList();
        $this->load->view('function/print_table_spare');
        f_generate_table_select($data);
    }

    public function get_sparepartList_lite()
    {

        $data['title'] =
            ['部品NO', '部品名', '型式',  '数量'];
        $data['sparePart'] = $this->Troublelist_model->getSparepartList();
        $this->load->view('function/print_table_spare_lite');
        f_generate_table_select($data);
    }

    public function fmea_tool_print($id)
    {
        
        $data['fmea_tool'] = $this->Troublelist_model->getFmeaId($id);
        $this->load->view('function/print_fmea_tool_formHelper');
        f_generate_table_select($data);
    }




    // UNUSED
    public function productForm()
    {
        $this->load->view('templates/header');
        $this->load->view('Pages/productForm');
        $this->load->view('templates/footer');

    } // UNUSED






    public function equipmentForm()
    {


        $this->load->view('templates/header');
        $this->load->view('Pages/equipmentForm');
        $this->load->view('templates/footer');

        // modal
        $this->load->view('modals/partsSelect');
        $this->load->view('modals/tfmeaSelect');

    }

    public function equipmentFMEA()
    {


        $this->load->view('templates/header');
        $this->load->view('Pages/equipmentFmea');
        $this->load->view('templates/footer');

        $this->load->view('modals/partsSelect');
        
    }


    // View individual item
    public function viewRecord()
    {
        $id = $this->uri->segment(2);

        $data['item'] = $this->Troublelist_model->getEquipmentId(intval($id));
        
        $fmeaid = $this->db->get_where('t800_equipment', array("c_t800_id" => $id))->row()->c_t203_id;
        $data['fmea'] = $this->Troublelist_model->getFmeaId($fmeaid);
        $data['title'] = $this->Troublelist_model->getTitle('t202_spareparts');
        

        $this->load->view('templates/header');
        $this->load->view('Pages/recordView_equipment', $data);
        $this->load->view('templates/footer');
    }

    public function viewRecord_fmea()
    {
        $id = $this->uri->segment(2);

        $data['fmea'] = $this->Troublelist_model->getFmeaId($id);
        $data['title'] = $this->Troublelist_model->getTitle('t202_spareparts');
        

        $this->load->view('templates/header');
        $this->load->view('Pages/recordView_equipment_FMEA', $data);
        $this->load->view('templates/footer');
    }

    // Inbetween pages
    public function transition()
    {
        $this->load->view('templates/header');
        $this->load->view('transitions/issueStart');
        $this->load->view('templates/footer');
    }


    // CRUD FUNCTION //Need validation
    public function postEquipment()
    {
        $id = $this->uri->segment(2);
        if(empty($id))
            $id = 1;


        $this->form_validation->set_rules('発生日', 'a', 'required');

        if ($id == 1) {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header');
                $this->load->view('Pages/equipmentForm');
                $this->load->view('templates/footer');
            } else {
                $pic = $this->doupload();
                $this->Troublelist_model->addData('equipment', $pic);
                $this->session->set_flashdata('flash', 'success');
                redirect(base_url(), '/');
            }
        }





        if ($id == 2) { //FMEA
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header');
                $this->load->view('Pages/equipmentFmea');
                $this->load->view('templates/footer');
            } else {
                // $pic = $this->doupload();
                // CHECK IF PIC IS EMPTY/ERROR
                // YES -> USE DEFAULT
                $this->Troublelist_model->addData('equipment_fmea', null);
                redirect(base_url(), '/');
            }
        }

        // Invoke Part list
        //  $this->get_sparepartList();
        $this->load->view('modals/partsSelect');
    }

    function check_default($post_string)
    {
        return $post_string == '' ? FALSE : TRUE;
    }

    public function doupload() //For files
    {
        // File RULES
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 5024;


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('対策書')) {
            //  $error = array('error' => $this->upload->display_errors());
            return 'no_file';

            //  $this->load->view('upload_form', $error);
        } else {
            $gambar = $this->upload->data();
            $gambar = $gambar['file_name'];

            return $gambar;
        }
    }

    public function deleteDatas($id, $title)
    {
        switch ($title) {
            case 'equipment':
                $head = 'c_t800_id';
                break;
            case 'spareparts':
                $head = 'c_t202_id';
                break;
            case 'equipment_fmea':
                $head = 'c_t203_id';
                break;
            default:
                # code...
                break;
        }
        $this->Troublelist_model->deleteData($id, $title, $head);
        redirect('dashboard');
    }

    public function editData_view($id)
    {
        $this->form_validation->set_rules('発生日', 'a', 'required');
        $id = $this->uri->segment(2);
        $data['items'] = $this->Troublelist_model->getEquipmentId(intval($id));

        $data['division'] = [
            '選び出す',
            '塗装',
            '生技',
            '組付',
            '生管',
            '品証',
            '溶接',
            'プレス・溶接',
            '営業',
            'その他'
        ];

        $data['inspector_'] = [
            '水上',
            '新宮',
            '齋藤'
        ];

        $data['tools_name'] = [
            'プレス',
            '洗浄機',
            '塗装設備'
        ];

        $data['unit'] = [
            '1号機', '2号機', '3号機'
        ];

        if (!empty($data['items'])) {
            $this->form_validation->set_rules('発生日', 'a', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header');
                $this->load->view('Pages/equipmentForm_edit', $data);
                $this->load->view('templates/footer');
            } else {
                $data = $this->doupload();
                $this->Troublelist_model->updateData($data);
                redirect(base_url(), '/');
            }
            //invoke modal spare parte select
            $this->load->view('modals/partsSelect');
        } else {
            echo "NO DATA";
        }
    }

    public function editData_fmea($id)
    {
        $this->form_validation->set_rules('発生日', 'a', 'required');
        $id = $this->uri->segment(2);
        $data['items'] = $this->Troublelist_model->getFmeaId(intval($id));

        if (!empty($data['items'])) {
            $this->form_validation->set_rules('発生日', 'a', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header');
                $this->load->view('Pages/equipmentFmea_edit', $data);
                $this->load->view('templates/footer');
            } else {
                
                $this->Troublelist_model->updateData_fmea($data);
                redirect(base_url(), '/');
            }
            //invoke modal spare parte select
            $this->load->view('modals/partsSelect');
        } else {
            echo "NO DATA";
        }
    }

    public function editSpares_view($id)
    {
        $data['spare'] = $this->Troublelist_model->getSpareId($id);
        $this->load->view('modals/editParts', $data);
    }

    public function editSpare()
    {

        $this->form_validation->set_rules("c_t202_id", '1', 'required');
        $this->form_validation->set_rules("c_purchaseDate", '2', 'required');
        $this->form_validation->set_rules("c_partName", '3', 'required');
        $this->form_validation->set_rules("c_model", '4', 'required');
        $this->form_validation->set_rules("c_maker", '5', 'required');
        $this->form_validation->set_rules("c_quantity", '6', 'required|is_natural');
        $this->form_validation->set_rules("c_unit", '7', 'required');
        $this->form_validation->set_rules("c_price", '8', 'required|is_natural');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        } else {
            $this->Troublelist_model->editSpares();
            echo 1;
        }
    }
    // Need Validation
    public function postSpare()
    {
        $this->form_validation->set_rules("c_purchaseDate", '1', 'required');
      

        $this->form_validation->set_message('required', '{field}');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        } else {
            $this->Troublelist_model->addSpares();
            echo 1;
        }



    }
}
