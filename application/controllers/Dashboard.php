
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
            ['[PartId]', '[PartName]', '[Model]', '[Placement]', '[AMOUNT]'];
        $data['sparePart'] = $this->Troublelist_model->getSparepartList();
        $this->load->view('function/print_table_spare_lite');
        f_generate_table_select($data);
    }




    // UNUSED
    public function productForm()
    {
        $this->load->view('templates/header');
        $this->load->view('Pages/productForm');
        $this->load->view('templates/footer');

        // $this->load->view('Trouble/js/home_js');
        // $this->load->view('Trouble/modal/schedule');
    } // UNUSED






    public function equipmentForm()
    {


        $this->load->view('templates/header');
        $this->load->view('Pages/equipmentForm');
        $this->load->view('templates/footer');

        // $this->load->view('Trouble/js/home_js');
        // $this->load->view('Trouble/modal/spareParts');
        // $this->load->model('Trouble_model');
        // if ($this->input->post('add_trouble')) {
        //     $this->Trouble_model->add_equipment_data();
        //     $this->Trouble_model->add_equipment_fmea_data();
        // }
    }

    // View individual item
    public function viewRecord()
    {
        $id = $this->uri->segment(2);
        $data['item'] = $this->Troublelist_model->getEquipmentId(intval($id));
        $data['title'] = $this->Troublelist_model->getTitle('t202_spareparts');

        $this->load->view('templates/header');
        $this->load->view('Pages/recordView', $data);
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
                $this->load->view('Pages/equipmentForm');
                $this->load->view('templates/footer');
            } else {
                $pic = $this->doupload();
                // CHECK IF PIC IS EMPTY/ERROR
                // YES -> USE DEFAULT
                $this->Troublelist_model->addData('equipment_fmea', $pic);
                redirect(base_url(), '/');
            }
        }

        // Invoke Part list
        //  $this->get_sparepartList();
        $this->load->view('modals/partsSelect');
    }

    public function doupload()
    {
        // File RULES
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['max_size']             = 1024;


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('対策書')) {
            //  $error = array('error' => $this->upload->display_errors());
            return 'error';

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
            default:
                # code...
                break;
        }
        $this->Troublelist_model->deleteData($id, $title, $head);
        redirect('dashboard');
    }

    public function editData_view($id)
    {
        $id = $this->uri->segment(3);
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

        if ($data['items'] != null) {
            $this->load->view('templates/header');
            $this->load->view('Pages/equipmentForm_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = $this->doupload();
            $this->Troublelist_model->updateData($data);
            redirect('/');
        }
    }

    public function editSpares_view($id)
    {
        $data['spare'] = $this->Troublelist_model->getSpareId($id);
        $this->load->view('modals/editParts', $data);
    }

    public function editSpare()
    {   
        
        $this->form_validation->set_rules('c_department', 'Message', 'required');
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
        // Spare part adder 'add_sparepart is modal -> form.ID'

        if ($this->input->post('add_sparepart')) {
            $this->Troublelist_model->addData('spareparts', 'empty');
            // if ($this->form_validation->run() == FALSE) {


            // } else {

            // 	redirect(base_url(),'/');
            // }

        }
    }
}
