
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
            'CANCEL_BUTTON'                         =>  'キャンセル',
            'SUBMIT_BUTTON'                         =>  '登録',
            'UPDATE_BUTTON'                         =>  '変更',
            'DELETE_BUTTON'                         =>  '削除',
            'BACK_BUTTON'                           =>  '戻る',

            'INSERT_BUTTON_TROUBLE'                 =>  '新規',
            'INSERT_BUTTON_SPARE'                   =>  '新規',
            'SPARE_LIST_BUTTON'                     =>  '予備品リスト',

            'NEW_TROUBLE_BUTTON'                    =>  'NEW_TROUBLE',
            'NEW_SPARE_BUTTON'                      =>  'NEW_SPARE',


            // Dashboard 
            'RADIO_A_EQUIPMENT'                     =>  '設備',
            'RADIO_A_PRODUCT'                       =>  '品質',
            'RADIO_A_SPARE'                         =>  '予備品',

            'RADIO_B_REAL'                          =>  'トラブル',
            'RADIO_B_FMEA'                          =>  'FMEA',

            //Transition screen

            'TRANSITION_BACK'                       =>  '閉じる',
            'TRANSITION_TOOLS_PROBLEM_BUTTON'       =>  '設備・工程',
            'TRANSITION_PRODUCT_PROBLEM_BUTTON'     =>  '製品',

            'TRANSITION_LABEL_TOP'                  =>  '新規',
            'TRANSITION_LABEL_BOTTOM'               =>  'FMEAのほう',

            //Form 
            //Equipment
            'FMEA_BUTTON_NEED'                      =>  '必要',
            'FMEA_BUTTON_NOT'                       =>  '不要',

            'FMEA_SEARCH_BUTTON'                    =>  '検索',
            'FMEA_ADD_BUTTON'                       =>  '足す',
            //]

            // Labels[

            //Form (EQUIPMENT)
            'FORM_TITLE'                            =>  '設備トラブル',
            'ACCIDENT_DATE'                         =>  '発生日',
            'REPAIR_DATE'                           =>  '作業日',
            'HAPPENING_TIME'                        =>  '発生時間',
            'STOP_TIME'                             =>  '停止時間',
            'DEPARTMENT'                            =>  '部署名',
            'PIC'                                   =>  '担当者',
            'FACILITY'                              =>  '設備名',
            'UNIT'                                  =>  '号機',
            'PROCESS_NAME'                          =>  '工程名',
            'FAIL_MODE'                             =>  '故障モード',
            'PHENOMENON'                            =>  '現象・発生要因詳細',
            'REPAIR_DETAIL'                         =>  '修理内容',
            'RESPONSE'                              =>  '対応・処置',
            'MECHANISM'                             =>  '故障のメカニズム',
            'COUNTERMEASURES'                       =>  '対策書',
            'SECTION_1'                             =>  '発生状況',
            'SECTION_2'                             =>  '設備情報',
            'SECTION_3'                             =>  '修理内容',
            'SECTION_3_F'                           =>  '影響',


            'SECTION_4'                             =>  '現在の工程管理',
            'SECTION_5'                             =>  '対策',
            ''                                      =>  '',

            'COUNTERMEASURES_OLD'                   =>  '今＿ファイル',
            //Form (FMEA)
            'FORM_TITLE'                            =>  '設備トラブル',
            'EQUIPMENT_DEPARTMENT_F'                =>  '部署',
            'EQUIPMENT_PIC_F'                       =>  '担当者',
            'EQUIPMENT_FACILITY_F'                  =>  '設備',
            'EQUIPMENT_UNIT_F'                      =>  '号機',
            'EQUIPMENT_PROCESS_NAME_F'              =>  '工程名',
            'EQUIPMENT_FAIL_MODE_F'                 =>  '故障モード',
            'EQUIPMENT_MECHANISM_F'                 =>  '故障のメカニズム',
            'EQUIPMENT_FAIL_IMPACT_F'               =>  '故障の影響',
            'EQUIPMENT_LINE_EFFECT_F'               =>  'ライン停止の可能性',
            'EQUIPMENT_SPECIAL_CHAR_F'              =>  '特 殊 特性等',
            'EQUIPMENT_PIC_SCHEDULE_F'              =>  '担当者 日程',
            'EQUIPMENT_PERIOD_F'                    =>  '周期',
            'EQUIPMENT_MONTH_F'                     =>  '月',
            'EQUIPMENT_PREVENTION_F'                =>  '予防',
            'EQUIPMENT_DETECTION_F'                 =>  '検出',




            'EQUIPMENT_COUNTER_PLAN_F'              =>  '対策案',
            'EQUIPMENT_MEASURE_F'                   =>  '対策',
            'EQUIPMENT_SECTION_1_F'                 =>  '発生状況',
            'EQUIPMENT_SECTION_2_F'                 =>  '設備の内容',
            'EQUIPMENT_SECTION_3_F'                 =>  '修理内容',

            //Form (SPARE_PART)
            'PURCHASE_DATE'                         =>  '購入日',
            'PARTS_NAME'                            =>  '部品',
            'MODEL'                                 =>  '型式',
            'MAKER_NAME'                            =>  'メーカー',
            'QUANTITY'                              =>  '数量',
            'PRICE'                                 =>  '単価',
            'UNIT'                                  =>  '単位',
            'STORAGE'                               =>  '保管場所',
            'ARRANGEMENT'                           =>  '手配先',

            // Delete confirm
            'DELETE_CONFIRM'                        =>  'データを削除しますか？',
            'DELETE_SUCCESS'                        =>  'データが削除されました',
            'DELETE_FAIL'                           =>  '',


            //UNSUSED
            // 'EQUIPMENT_PHENOMENON_F' => '現象・不具合要因詳細',
            // 'EQUIPMENT_REPAIR_DETAIL_F' => '修理内容',
            // 'EQUIPMENT_RESPONSE_F' => '対応・処置',
            // 'EQUIPMENT_ACCIDENT_DATE_F' => '発生日',
            // 'EQUIPMENT_REPAIR_DATE_F' => '修理日',
            // 'EQUIPMENT_HAPPENING_TIME_F' => '発生時間',
            // 'EQUIPMENT_STOP_TIME_F' => '停止時間',


        );
    }


    public function index()
    {
        $data = $this->data;
        // Breadcrumb with flashdata (magic)
        
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
        $this->post_spare();
        $this->session->set_flashdata('crumbs', '0');
    }

    // =============== Data Grabbers
    // The {lite} part means it uses as a smaller table mostly on update function

    public function get_trouble_list_tool()
    {
        $data = $this->data;
        $data['troubleList'] = $this->Troublelist_model->get_tool_trouble_list();
        $data['title'] = [
            '発生日', '設備', '工程', '故障モード',   '担当者'
        ];
        $this->load->view('function/print_table_trouble', $data);
        f_generate_table_select($data);
    }


    public function get_trouble_list__tool_fmea()
    {
        $data = $this->data;
        $data['tool_Fmea'] = $this->Troublelist_model->get_tool_trouble_fmea_list();
        $data['title'] = [
            '設備', '工程', '故障モード',   '担当者'
        ];
        $this->load->view('function/print_table_tool_fmea', $data);
        f_generate_table_select($data);
    }


    public function get_trouble_list_tool_fmea_lite()
    {
        $data = $this->data;
        $data['tool_Fmea'] = $this->Troublelist_model->get_tool_trouble_fmea_list();
        $data['title'] = $this->Troublelist_model->get_title('t203_equipment_fmea');
        $this->load->view('function/print_table_tool_fmea_lite', $data);
        f_generate_table_select($data);
    }

    public function get_sparepart_list()
    {
        $data = $this->data;
        $data['title'] = $this->Troublelist_model->get_title('t202_spareparts');
        $data['sparePart'] = $this->Troublelist_model->get_sparepart_list();
        $this->load->view('function/print_table_spare', $data);
        f_generate_table_select($data);
    }

    public function get_sparepartList_lite()
    {
        $data = $this->data;
        $data['title'] =
            ['部品NO', '部品名', '型式',  '数量'];
        $data['sparePart'] = $this->Troublelist_model->get_sparepart_list();
        $this->load->view('function/print_table_spare_lite', $data);
        f_generate_table_select($data);
    }

    // Create fmea reference layout in  equipmentForm
    public function fmea_tool_print($id)
    {
        $data = $this->data;
        $data['fmea_tool'] = $this->Troublelist_model->get_tool_fmea_id($id);
        $this->load->view('function/print_fmea_tool_formHelper', $data);
        f_generate_table_select($data);
    }




    // UNUSED
    public function product_form()
    {
        $this->load->view('templates/header');
        $this->load->view('Pages/productForm');
        $this->load->view('templates/footer');
    } // UNUSED




    // ===================== Forms

    public function tool_form()
    {
        $this->session->set_flashdata('crumbs', '0');

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

    public function tool_fmea()
    {
        $this->session->set_flashdata('crumbs', '1');
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
    public function view_record_tool()
    {
        $this->session->set_flashdata('crumbs', '0');

        $id = $this->uri->segment(2);
        $data = $this->data;

        $data['item'] = $this->Troublelist_model->get_tool_id(intval($id));

        $fmeaid = $this->db->get_where('t800_equipment', array("c_t800_id" => $id))->row()->c_t203_id;

        $data['fmea'] = $this->Troublelist_model->get_tool_fmea_id($fmeaid);
        $data['title'] = $this->Troublelist_model->get_title('t202_spareparts');


        $this->load->view('templates/header');
        $this->load->view('Pages/recordView_equipment', $data);
        $this->load->view('templates/footer');
    }

    public function view_record_tool_fmea()
    {
        $this->session->set_flashdata('crumbs', '1');
        $id = $this->uri->segment(2);
        $data = $this->data;
        $data['fmea'] = $this->Troublelist_model->get_tool_fmea_id($id);
        $data['title'] = $this->Troublelist_model->get_title('t202_spareparts');


        $this->load->view('templates/header');
        $this->load->view('Pages/recordView_equipment_FMEA', $data);
        $this->load->view('templates/footer');
    }

    // Inbetween pages for which form to select/use
    public function transition_form_select()
    {
        $this->load->view('templates/header');
        $this->load->view('transitions/issueStart');
        $this->load->view('templates/footer');
    }

    // ====================================== CRUD

    // CRUD FUNCTION //Dont need server side validation (probably [kinda dangerous long term])
    //basically the action on form submit, the id
    //
    public function post_tools()
    {
        $id = $this->uri->segment(2);
        if (empty($id))
            redirect(base_url(), '/');

        if ($id == 1) {

            $pic = $this->do_upload();
            $this->Troublelist_model->add_data_tool($pic);
            $this->session->set_flashdata('crumbs', '0');
            redirect(base_url(), '/');
        }





        if ($id == 2) { //FMEA

            $this->Troublelist_model->add_data_tool_fmea();
            $this->session->set_flashdata('crumbs', '1');
            redirect(base_url(), '/');
        }

        // Invoke Part list
        //  $this->get_sparepartList();
        $this->load->view('modals/partsSelect');
    }

    function check_default($post_string)
    {
        return $post_string == '' ? FALSE : TRUE;
    }

    public function do_upload() //For files
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
            $picture = $this->upload->data();
            $picture = $picture['file_name'];

            return $picture;
        }
    }

    public function delete_data_tool($id)
    {
        $this->Troublelist_model->delete_tool($id);
        redirect('dashboard');
    }
    public function delete_data_tool_fmea($id)
    {
        $this->Troublelist_model->delete_tool_fmea($id);
        redirect('dashboard');
    }
    // zero the amount so it cant be used as reference in real trouble entry,
    // In case of the data is used as reference in older entry
    public function zero_data_sparepart($id)
    {
        $this->Troublelist_model->delete_sparepart($id);
        redirect('dashboard');
    }
    // USE WITH CAUTION WILL RETURN ERROR IF ON MISSUSES
    // SHOULD ONLY BE ENABLED ON ADMIN ONLY ENVIRONMENT
    // WILL DELETE THE DATA
    public function delete_data_sparepart($id)
    {
        $this->Troublelist_model->real_delete_sparepart($id);
        redirect('dashboard');
    }


    public function edit_data_tool_view($id)
    {
        $id = $this->uri->segment(2);
        $data['items'] = $this->Troublelist_model->get_tool_id(intval($id));
        // NEED DATA LIST THIS PART
        //This use as
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

        $this->load->view('templates/header');
        $this->load->view('Pages/equipmentForm_edit', $data);
        $this->load->view('templates/footer');


        //invoke modal spare parte select
        $this->load->view('modals/partSelect_Edit', $data);

        //js
        $this->load->view('js/form_js');
    }


    public function post_edit_data_tool()
    {
        $data = $this->do_upload();
        $this->Troublelist_model->update_data_tool($data);
        redirect(base_url(), '/');


        //js

    }
    public function edit_data_tool_fmea_view($id)
    {
        $data = $this->data;
        $id = $this->uri->segment(2);
        $data['items'] = $this->Troublelist_model->get_tool_fmea_id(intval($id));
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

        $this->load->view('templates/header');
        $this->load->view('Pages/equipmentFmea_edit', $data);
        $this->load->view('templates/footer');


        //invoke modal spare parte select
        $this->load->view('modals/partsSelect');

        //js
        $this->load->view('js/form_js');
    }

    public function post_edit_data_tool_fmea()
    {

        $this->Troublelist_model->update_data_tool_fmea();
        redirect(base_url(), '/');
    }

    public function edit_data_sparepart_view($id)
    {
        $data = $this->data;
        $data['spare'] = $this->Troublelist_model->get_sparepart_id($id);
        $this->load->view('modals/editParts', $data);
    }

    public function post_edit_data_sparepart()
    {

        // FOR SERVER SIDE VALIDATION,
        // since this form is in a modal and not a page it need to use ajax
        // not a fun ajax tbh

        $this->form_validation->set_rules("c_t202_id", '1', 'required');
        $this->form_validation->set_rules("c_purchaseDate", '2', 'required');
        $this->form_validation->set_rules("c_partName", '3', 'required');
        $this->form_validation->set_rules("c_model", '4', 'required');
        $this->form_validation->set_rules("c_maker", '5', 'required');
        $this->form_validation->set_rules("c_quantity", '6', 'required|is_natural');
        $this->form_validation->set_rules("c_unit", '7', 'required');
        $this->form_validation->set_rules("c_price", '8', 'required|decimal');
        $this->form_validation->set_rules("c_storage", '9', 'required');
        $this->form_validation->set_rules("c_arrangement", '0', 'required');

        if ($this->form_validation->run() === FALSE) {
            echo validation_errors();
        } else {
            $this->Troublelist_model->edit_sparepart();
            echo 1;
        }
    }
    // Need Validation
    public function post_spare()
    {
        $this->form_validation->set_rules("c_purchaseDate", '1', 'required');
        $this->form_validation->set_rules("c_partName", '2', 'required');
        $this->form_validation->set_rules("c_model", '3', 'required');
        $this->form_validation->set_rules("c_maker", '4', 'required');
        $this->form_validation->set_rules("c_quantity", '5', 'required|is_natural');
        $this->form_validation->set_rules("c_unit", '6', 'required');
        $this->form_validation->set_rules("c_price", '7', 'required|decimal');
        $this->form_validation->set_rules("c_storage", '8', 'required');
        $this->form_validation->set_rules("c_arrangement", '9', 'required');


        // $this->form_validation->set_message('required', '{field}');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        } else {
            $this->Troublelist_model->add_sparepart();
            echo 1;
        }
    }

    public function all_fmea_list()
    {
        $data = $this->data;
        
        $this->load->view('templates/header', $data);
        $this->load->view('Pages/all_fmea');
        $this->load->view('templates/footer');
        $this->load->view('js/dashboard_js');
    }



    public function get_all_fmea_list_modular()
    {
        $data = $this->data;
        
        // $id = $this->uri->segment(2);
        // $this->load->view('/templates/header', $data);
        $this->load->library('table');

        $data = $this->Troublelist_model->get_trouble_fmea_array($_GET['department']);

        $template = array(
            'table_open'            => '<table class="table table-sm table-striped-columns table-responsive" id="all_trouble_table">',

            'thead_open'            => '<thead class="table-dark">',

            'heading_cell_start'    => '<th style="border-width: 2px;" class="kanjifont table-head text-center border-right border-left text-nowrap ">',

            'cell_start'            => '<td style="border-width: 2px;" class="kanjifont table-data text-center align-middle border-right border-left pointer col">',

            'cell_alt_start'        => '<td style="border-width: 2px;" class="kanjifont table-data text-center align-middle border-right border-left pointer col">',
        );

        $this->table->set_template($template);
        $this->table->set_heading('設備', '号機', '工程名・工程機能', '故障モード', '故障の影響', 'ライン停止の可能性', '特殊特性等', '故障の潜在原因メカニズム', '予防', '周期', '月', '検出', '対策案', '担当者日程', '対策');

        echo $this->table->generate($data);
    }
}
