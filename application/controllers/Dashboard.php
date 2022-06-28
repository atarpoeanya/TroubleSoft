
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
        // $this->lang->load('information', 'japanese'); //If lang become available you can use this instead of the array labels.

        // this array labels
        $this->data = array(
            // Buttons [
            'CANCEL_BUTTON' => 'CANCEL',
            'SUBMIT_BUTTON' => '登録',
            'UPDATE_BUTTON' => '変更',
            'DELETE_BUTTON' => '削除',

            'INSERT_BUTTON_TROUBLE' => '新しトラブル',
            'INSERT_BUTTON_SPARE' => '新し予備品',
            'SPARE_LIST_BUTTON' => '予備品リスト',

            'NEW_TROUBLE_BUTTON' => 'NEW_TROUBLE',
            'NEW_SPARE_BUTTON' => 'NEW_SPARE',


            // Dashboard 
            'RADIO_A_EQUIPMENT' => '設備',
            'RADIO_A_PRODUCT' => '品質',
            'RADIO_A_SPARE' => '予備品',

            'RADIO_B_REAL' => '実',
            'RADIO_B_FMEA' => 'FMEA',

            //Transition screen

            'TRANSITION_BACK' => '閉じる',

            //Form 
            //Equipment
            'FMEA_BUTTON_NEED' => '要',
            'FMEA_BUTTON_NOT' => '不要',

            'FMEA_SEARCH_BUTTON' => '検索',
            'FMEA_ADD_BUTTON' => '足す',
            //]

            // Labels[

            //Form (EQUIPMENT)
            'FORM_TITLE' => '設備トラブル',
            'ACCIDENT_DATE' => '発生日',
            'REPAIR_DATE' => '修理日',
            'HAPPENING_TIME' => '発生時間',
            'STOP_TIME' => '停止時間',
            'DEPARTMENT' => '部署',
            'PIC' => '担当者',
            'FACILITY' => '設備',
            'UNIT' => '号機',
            'PROCESS_NAME' => '工程名',
            'FAIL_MODE' => '故障モード',
            'PHENOMENON' => '現象・不具合要因詳細',
            'REPAIR_DETAIL' => '修理内容',
            'RESPONSE' => '対応・処置',
            'MECHANISM' => '故障のメカニズム',
            'COUNTERMEASURES' => '対策書',
            'SECTION_1' => 'インフォ',
            'SECTION_2' => '設備の内容',
            'SECTION_3' => '修理内容',
            'SECTION_3_F' => '影響',


            'SECTION_4' => '現在の工程管理',
            'SECTION_5' => '対策',
            '' => '',

            'COUNTERMEASURES_OLD' => '今＿ファイル',
            //Form (FMEA)
            'FORM_TITLE' => '設備トラブル',
            'EQUIPMENT_ACCIDENT_DATE_F' => '発生日',
            'EQUIPMENT_REPAIR_DATE_F' => '修理日',
            // 'EQUIPMENT_HAPPENING_TIME_F' => '発生時間',
            // 'EQUIPMENT_STOP_TIME_F' => '停止時間',
            'EQUIPMENT_DEPARTMENT_F' => '部署',
            'EQUIPMENT_PIC_F' => '担当者',
            'EQUIPMENT_FACILITY_F' => '設備',
            'EQUIPMENT_UNIT_F' => '号機',
            'EQUIPMENT_PROCESS_NAME_F' => '工程名',
            'EQUIPMENT_FAIL_MODE_F' => '故障モード',
            'EQUIPMENT_PHENOMENON_F' => '現象・不具合要因詳細',
            'EQUIPMENT_REPAIR_DETAIL_F' => '修理内容',
            'EQUIPMENT_RESPONSE_F' => '対応・処置',
            'EQUIPMENT_MECHANISM_F' => '故障のメカニズム',
            'EQUIPMENT_FAIL_IMPACT_F' => '故障の影響',
            'EQUIPMENT_LINE_EFFECT_F' => 'ライン停止の可能性',
            'EQUIPMENT_SPECIAL_CHAR_F' => '特 殊 特性等',
            'EQUIPMENT_PIC_SCHEDULE_F' => '担当者 日程',
            'EQUIPMENT_PERIOD_F' => '周期',
            'EQUIPMENT_MONTH_F' => '月',
            'EQUIPMENT_PREVENTION_F' => '予防',
            'EQUIPMENT_DETECTION_F' => '検出',




            'EQUIPMENT_COUNTER_PLAN_F' => '対策案',
            'EQUIPMENT_MEASURE_F' => '対策',
            'EQUIPMENT_SECTION_1_F' => 'インフォ',
            'EQUIPMENT_SECTION_2_F' => '設備の内容',
            'EQUIPMENT_SECTION_3_F' => '修理内容',

            //Form (SPARE_PART)
            'PURCHASE_DATE' => '購入日',
            'PARTS_NAME' => '部品名',
            'MODEL' => '型式',
            'MAKER_NAME' => 'メーカー名',
            'QUANTITY' => '数量',
            'PRICE' => '金額',
            'UNIT' => '単位',
            'STORAGE' => '保管',
            'ARRANGEMENT' => '必要時の手配先',

            // Delete confirm
            'DELETE_CONFIRM' => 'データを削除しますか？',
            'DELETE_SUCCESS' => 'データが削除されました',
            'DELETE_FAIL' => '',

            //]


        );
    }
    public function setting_application_info()
    {

        // $data = [
        //     // header.php
        //     'WEB_TITLE' => '明和工業過去トラブルデータベース',
        //     'DASHBOARD_TITLE' => '明和工業過去トラブルデータベース',

        //     // footer.php
        //     'COMPANY_NAME' => 'Meiwa Industry 2022',
        //     'SOFTWARE_VERSION' => '1.0.0',

        //     // dashboard.php
        //     'EQUIPMENT_RADIO' => '設備',
        //     'PRODUCT_RADIO' => '品質',
        //     'SPAREPART_RADIO' => '予備品',
        //     'REAL_RADIO' => '実',
        //     'FMEA_RADIO' => 'FMEA',

        //     'NEW_TROUBLE_BUTTON' => '新しトラブル',
        //     'NEW_SPAREPART_BUTTON' => '新し予備品',
        //     'CHANGE_BUTTON' => '変更',
        //     '' => '',

        //     // addparts.php
        //     'SPAREPARTS_MODAL' => '予備品',
        //     'PURCHASE_DATE' => '購入日',
        //     'PARTS_NAME' => '部品名',
        //     'MODEL' => '型式',
        //     'MAKER_NAME' => 'メーカー名',
        //     'QUANTITY' => '数量',
        //     'PRICE' => '金額',
        //     'UNIT' => '単位',
        //     'STORAGE' => '保管',
        //     'ARRANGEMENT' => '必要時の手配先',

        //     'BACK_BUTTON' => '閉じる',
        //     'ADD_BUTTON' => '足す',

        //     // equipmentForm.php
        //     'FORM_TITLE' => '設備トラブル',
        //     'ACCIDENT_DATE' => '発生日',
        //     'REPAIR_DATE' => '修理日',
        //     'HAPPENING_TIME' => '発生時間',
        //     'STOP_TIME' => '停止時間',
        //     'DEPARTMENT' => '部署',
        //     'PIC' => '担当者',
        //     'FACILITY' => '設備',
        //     'UNIT' => '号機',
        //     'PROCESS_NAME' => '工程名',
        //     'FAIL_MODE' => '故障モード',
        //     'PHENOMENON' => '現象・不具合要因詳細',
        //     'REPAIR_DETAIL' => '修理内容',
        //     'RESPONSE' => '対応・処置',
        //     'MECHANISM' => '故障の潜在原因 メカニズム',
        //     'COUNTERMEASURES' => '対策書',
        //     'SECTION_1' => 'インフォ',
        //     'SECTION_2' => '設備の内容',
        //     'SECTION_3' => '修理内容',
        //     '' => '',

        //     'FMEA_NO_RADIO' => '不要',
        //     'FMEA_YES_RADIO' => '要',
        //     'FMEA_SEARCH_BUTTON' => '検索',
        //     'SPAREPART_LIST_BUTTON' => '予備品リスト',
        //     'REGISTER_BUTTON' => '登録',
        //     'CANCEL_BUTTON' => 'CANCEL',

        //     // partsSelect.PHP

        //     'MODAL_TITLE' => '予備品',

        //     'BACK_BUTTON' => '閉じる',
        //     'ADD_BUTTON' => '足す',

        //     // issueStart.php

        // ];

        // return $data;
    }


    public function index()
    {
        $data = $this->data;

        // View Load
        $this->load->view('templates/header');
        $this->load->view('dashboard/dashboard', $data);
        $this->load->view('templates/footer');
        // js
        $this->load->view('js/dashboard_js');
        // modals
        $this->load->view('modals/addParts', $data);
        $this->load->view('modals/delete');
        // $this->load->view('modals/editParts');


        //other method
        $this->postSpare();
    }

    // Data Grabbers

    public function get_troubleList()
    {
        $data = $this->data;
        $data['troubleList'] = $this->Troublelist_model->getTroubleList();
        $data['title'] = $this->Troublelist_model->getTitle('t800_equipment');
        $this->load->view('function/print_table_trouble', $data);
        f_generate_table_select($data);
    }

    public function get_troubleList_fmea()
    {
        $data = $this->data;
        $data['tool_Fmea'] = $this->Troublelist_model->getTrouble_fmea();
        $data['title'] = $this->Troublelist_model->getTitle('t203_equipment_fmea');
        $this->load->view('function/print_table_tool_fmea', $data);
        f_generate_table_select($data);
    }


    public function get_troubleList_fmea_lite()
    {
        $data = $this->data;
        $data['tool_Fmea'] = $this->Troublelist_model->getTrouble_fmea();
        $data['title'] = $this->Troublelist_model->getTitle('t203_equipment_fmea');
        $this->load->view('function/print_table_tool_fmea_lite', $data);
        f_generate_table_select($data);
    }

    public function get_sparepartList()
    {
        $data = $this->data;
        $data['title'] = $this->Troublelist_model->getTitle('t202_spareparts');
        $data['sparePart'] = $this->Troublelist_model->getSparepartList();
        $this->load->view('function/print_table_spare', $data);
        f_generate_table_select($data);
    }

    public function get_sparepartList_lite()
    {
        $data = $this->data;
        $data['title'] =
            ['部品NO', '部品名', '型式',  '数量'];
        $data['sparePart'] = $this->Troublelist_model->getSparepartList();
        $this->load->view('function/print_table_spare_lite', $data);
        f_generate_table_select($data);
    }

    // Create fmea reference layout in  equipmentForm
    public function fmea_tool_print($id)
    {
        $data = $this->data;
        $data['fmea_tool'] = $this->Troublelist_model->getFmeaId($id);
        $this->load->view('function/print_fmea_tool_formHelper', $data);
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

        $data = $this->data;
        $this->load->view('templates/header');
        $this->load->view('Pages/equipmentForm', $data);
        $this->load->view('templates/footer');

        // modal
        $this->load->view('modals/partsSelect');
        $this->load->view('modals/tfmeaSelect', $data);

        //js
        $this->load->view('js/form_js.php');
    }

    public function equipmentFMEA()
    {

        $data = $this->data;
        $this->load->view('templates/header');
        $this->load->view('Pages/equipmentFmea', $data);
        $this->load->view('templates/footer');

        // modal
        $this->load->view('modals/partsSelect');

        //js
        $this->load->view('js/form_js');
    }


    // View individual item
    public function viewRecord()
    {
        $id = $this->uri->segment(2);
        $data = $this->data;

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
        $data = $this->data;
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
        if (empty($id))
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
            $this->load->view('modals/partSelect_Edit', $data);
        } else {
            echo "NO DATA";
        }

        //js
        $this->load->view('js/form_js');
    }

    public function editData_fmea($id)
    {
        $data = $this->data;
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
        $data = $this->data;
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
