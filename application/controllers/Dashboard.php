
<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Troublelist_model');
        $this->load->library('form_validation');
        // $this->lang->load('information', 'japanese'); //If lang become available you can use this instead of the array labels.

        // this array labels

        date_default_timezone_set("Asia/Tokyo");

        $this->data = array(
            // Buttons [
            'CANCEL_BUTTON'                         =>  'キャンセル',
            'SUBMIT_BUTTON'                         =>  '登録',
            'UPDATE_BUTTON'                         =>  '変更',
            'MODIFY_BUTTON'                         =>  '修正',
            'DELETE_BUTTON'                         =>  '削除',
            'BACK_BUTTON'                           =>  '戻る',
            'CLEAR_BUTTON'                          =>  '検索条件クリア',

            'INSERT_BUTTON_TROUBLE'                 =>  '新規登録',
            'INSERT_BUTTON_SPARE'                   =>  '新規登録',
            'SPARE_LIST_BUTTON'                     =>  '予備品リスト...',

            'NEW_TROUBLE_BUTTON'                    =>  'NEW_TROUBLE',
            'NEW_SPARE_BUTTON'                      =>  'NEW_SPARE',

            'EQUIPMENT_FMEA_LIST_BUTTON'            =>  'FMEA一覧表',

            // Custom Taisaku button
            'FILE_BUTTON'                           => '選択...',
            // Dashboard 
            'RADIO_A_EQUIPMENT'                     =>  '設備',
            'RADIO_A_PRODUCT'                       =>  '品質',
            'RADIO_A_SPARE'                         =>  '予備品',

            'RADIO_B_REAL'                          =>  'トラブル',
            'RADIO_B_FMEA'                          =>  'FMEA',


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
            'ACCIDENT_DATE'                         =>  '発生日時',
            'STOP_TIME'                             =>  '停止時間',
            'DAYS'                                  =>  '日',
            'HOURS'                                 =>  '時間',
            'MINUTES'                               =>  '分',
            'DEPARTMENT'                            =>  '部署名',
            'PIC'                                   =>  '担当者',
            'FACILITY'                              =>  '設備名',
            'UNIT'                                  =>  '設備No.',
            'PROCESS_NAME'                          =>  '工程名',
            'FAIL_MODE'                             =>  '故障モード',
            'PHENOMENON'                            =>  '発生状況',
            'REPAIR_DETAIL'                         =>  '発生原因',
            'RESPONSE'                              =>  '恒久対策',
            'MECHANISM'                             =>  '暫定対応・処置',
            'COUNTERMEASURES'                       =>  '対策書',
            'SECTION_1'                             =>  '発生状況',
            'SECTION_2'                             =>  '設備情報',
            'SECTION_3'                             =>  'トラブル内容',
            'SECTION_3_F'                           =>  '影響',
            'SECTION_4'                             =>  '現在の工程管理',
            'SECTION_5'                             =>  '対策',
            ''                                      =>  '',

            'COUNTERMEASURES_OLD'                   =>  '登録 対策書',
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
            'SPARE_UNIT'                            =>  '単位',
            'STORAGE'                               =>  '保管場所',
            'ARRANGEMENT'                           =>  '手配先',

            // Delete confirm
            'DELETE_CONFIRM'                        =>  'データを削除しますか？',
            'DELETE_SUCCESS'                        =>  'データが削除されました',
            'DELETE_FAIL'                           =>  '',

            //Modal PartSelect (print_spare_lite)
            'SPARE_ADDED'                           =>  '暫定',
            'SPARE_SELECTED'                        =>  '恒久',
            'EMPTY_PLACEHOLDER'                     =>  '未選択',


            //Validation message
            'IS_REQUIRED'                           =>  '空であってはならない',
            'IS_TOO_LONG'                           =>  '長すぎ',
            'NO_ZERO'                               =>  '合計を0にすることはできません',
            'NOT_PICK'                              =>  '何か選んでください',


            //UNSUSED
            // 'EQUIPMENT_PHENOMENON_F' => '現象・不具合要因詳細',
            // 'EQUIPMENT_REPAIR_DETAIL_F' => '修理内容',
            // 'EQUIPMENT_RESPONSE_F' => '対応・処置',
            // 'EQUIPMENT_ACCIDENT_DATE_F' => '発生日',
            // 'EQUIPMENT_REPAIR_DATE_F' => '修理日',
            // 'EQUIPMENT_HAPPENING_TIME_F' => '発生時間',
            // 'EQUIPMENT_STOP_TIME_F' => '停止時間',

            //Transition screen
            //  'TRANSITION_BACK'                       =>  '閉じる',
            //  'TRANSITION_TOOLS_PROBLEM_BUTTON'       =>  '設備・工程',
            //  'TRANSITION_PRODUCT_PROBLEM_BUTTON'     =>  '製品',

            //  'TRANSITION_LABEL_TOP'                  =>  '新規',
            //  'TRANSITION_LABEL_BOTTOM'               =>  'FMEAのほう',

            // equipment Form
            // 'REPAIR_DATE'                           =>  '作業日',
            // 'HAPPENING_TIME'                        =>  '発生時間',



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
            '発生日時', '修理時間（分）', '部署', '設備', '設備No.', '工程', '故障モード', '担当者', 'FMEA'
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

    public function get_tool_fmea_list()
    {
        echo json_encode($this->Troublelist_model->get_tool_trouble_fmea_list());
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
        $data = $this->data;

        $this->form_validation->set_message('required', $this->data['IS_REQUIRED']);
        $this->form_validation->set_message('max_length', $this->data['IS_TOO_LONG']);
        $this->form_validation->set_message('greater_than', $this->data['NO_ZERO']);
        $this->form_validation->set_message('check_default', $this->data['NOT_PICK']);

        if (empty($id))
            redirect(base_url(), '/');

        if ($id == 1) {

            $this->session->set_flashdata('crumbs', '0');

            $this->form_validation->set_rules('発生日', '1', 'required');

            $this->form_validation->set_rules('days', '2', 'required');
            $this->form_validation->set_rules('hours', '3', 'required');
            $this->form_validation->set_rules('minutes', '4', 'required');
            $this->form_validation->set_rules('duration', '20', 'required|greater_than[0]');

            $this->form_validation->set_rules('担当者', '5', 'required|callback_check_default');
            $this->form_validation->set_rules('部署', '6', 'required|callback_check_default');
            $this->form_validation->set_rules('設備', '7', 'required|callback_check_default');
            $this->form_validation->set_rules('号機', '8', 'required|callback_check_default');

            $this->form_validation->set_rules('工程名', '9', 'required|max_length[20]');
            $this->form_validation->set_rules('故障モード', '10', 'required|max_length[20]');

            $this->form_validation->set_rules('現象', '11', 'required|max_length[140]');
            $this->form_validation->set_rules('修理内容', '12', 'required|max_length[140]');
            $this->form_validation->set_rules('fail_mech', '13', 'required|max_length[140]');
            $this->form_validation->set_rules('response', '14', 'required|max_length[140]');

            // $this->form_validation->set_rules('spareParts', '20', 'greater_than_equal_to[0]');
            // $this->form_validation->set_rules('response', '14', 'required');

            if ($this->form_validation->run() == FALSE) {
                //For data that need to be manually re-populated
                //Spareparts & fmea
                $savedata = array(
                    'error'         =>  validation_errors(),
                    'fmea_id'       =>  $this->input->post('fmea_id', true),
                    'part_info'     =>  $this->input->post('spareParts', true)

                );
                $this->session->set_flashdata($savedata);

                if (!empty($savedata['part_info'])) {

                    $data['temp_spare'] = $this->Troublelist_model
                        ->get_spareparts_list();
                }


                $this->load->view('templates/header');
                $this->load->view('Pages/equipmentForm', $data);
                $this->load->view('templates/footer');

                // modal
                $this->load->view('modals/partsSelect');
                $this->load->view('modals/tfmeaSelect', $data);
                //js
                $this->load->view('js/form_js.php');
            } else {
                $pic = $this->do_upload();
                $this->Troublelist_model->add_data_tool($pic);
                redirect(base_url(), '/');
            }
        }





        if ($id == 2) { //FMEA
            $this->session->set_flashdata('crumbs', '1');

            $this->form_validation->set_rules('部署', '1', 'required|callback_check_default');
            $this->form_validation->set_rules('設備', '2', 'required|callback_check_default');
            $this->form_validation->set_rules('号機', '3', 'required|callback_check_default');
            $this->form_validation->set_rules('工程名', '4', 'required|max_length[140]');
            $this->form_validation->set_rules('故障モード', '5', 'required|max_length[140]');
            $this->form_validation->set_rules('fail_mech', '6', 'required|max_length[140]');
            $this->form_validation->set_rules('故障の影響', '7', 'required|max_length[140]');
            $this->form_validation->set_rules('ライン停止の可能性', '8', 'required|max_length[10]');
            $this->form_validation->set_rules('特殊特性等', '9', 'required|max_length[10]');
            $this->form_validation->set_rules('担当者日程', '10', 'required|callback_check_default');
            $this->form_validation->set_rules('周期', '11', 'required|max_length[140]');
            $this->form_validation->set_rules('月', '12', 'required|max_length[140]');
            $this->form_validation->set_rules('予防', '13', 'required|max_length[140]');
            $this->form_validation->set_rules('検出', '14', 'required|max_length[140]');
            $this->form_validation->set_rules('対策案', '15', 'required|max_length[140]');
            $this->form_validation->set_rules('対策', '16', 'required|max_length[140]');

            if ($this->form_validation->run() == FALSE) {
                //For data that need to be manually re-populated
                //Spareparts & fmea
                $savedata = array(
                    'error'         =>  validation_errors(),
                    'part_info'     =>  $this->input->post('spareParts', true)

                );
                $this->session->set_flashdata($savedata);

                if (!empty($savedata['part_info'])) {

                    $data['temp_spare'] = $this->Troublelist_model
                        ->get_spareparts_list();
                }

                $this->load->view('templates/header');
                $this->load->view('Pages/equipmentFmea', $data);
                $this->load->view('templates/footer');

                // modal
                $this->load->view('modals/partsSelect');
                //js
                $this->load->view('js/form_js.php');
            } else {
                $this->Troublelist_model->add_data_tool_fmea();

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

    public function do_upload() //For files
    {
        // File RULES
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = '5024';


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

    // Check sparepart status (isUsed/isNot); 
    public function check_sparepart_status($id)
    {
        if ($this->Troublelist_model->get_used_sparepart_status($id)) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function edit_data_tool_view($spare_part)
    {
        if (isset($spare_part))
            $data['temp_spare'] = $spare_part;

        $id = $this->uri->segment(2);
        $data['items'] = $this->Troublelist_model->get_tool_id(intval($id));
        // NEED DATA LIST THIS PART
        //This use as
        $data['division'] = [
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
            '1号機',
            '2号機',
            '3号機'
        ];

        $this->load->view('templates/header');
        $this->load->view('Pages/equipmentForm_edit', $data);
        $this->load->view('templates/footer');


        //invoke modal spare parte select
        $this->load->view('modals/partSelect_Edit', $data);

        //js
        // $this->load->view('js/form_js');
        $this->load->view('js/form_edit_js');
    }


    public function post_edit_data_tool()
    {
        $this->session->set_flashdata('crumbs', '0');
        $this->form_validation->set_message('required', $this->data['IS_REQUIRED']);
        $this->form_validation->set_message('max_length', $this->data['IS_TOO_LONG']);
        $this->form_validation->set_message('greater_than', $this->data['NO_ZERO']);
        $this->form_validation->set_message('check_default', $this->data['NOT_PICK']);

        $this->form_validation->set_rules('発生日', '1', 'required');

        $this->form_validation->set_rules('days', '2', 'required');
        $this->form_validation->set_rules('hours', '3', 'required');
        $this->form_validation->set_rules('minutes', '4', 'required');
        $this->form_validation->set_rules('duration', '20', 'required|greater_than[0]');

        $this->form_validation->set_rules('担当者', '5', 'required|callback_check_default');
        $this->form_validation->set_rules('部署', '6', 'required|callback_check_default');
        $this->form_validation->set_rules('設備', '7', 'required|callback_check_default');
        $this->form_validation->set_rules('号機', '8', 'required|callback_check_default');

        $this->form_validation->set_rules('工程名', '9', 'required|max_length[20]');
        $this->form_validation->set_rules('故障モード', '10', 'required|max_length[20]');

        $this->form_validation->set_rules('現象', '11', 'required|max_length[140]');
        $this->form_validation->set_rules('修理内容', '12', 'required|max_length[140]');
        $this->form_validation->set_rules('fail_mech', '13', 'required|max_length[140]');
        $this->form_validation->set_rules('response', '14', 'required|max_length[140]');

        if ($this->form_validation->run() == FALSE) {
            $savedata = array(
                'error'         =>  validation_errors(),
                'isEdit'       =>  true,
                'part_info'     =>  $this->input->post('spareParts', true)

            );
            $this->session->set_flashdata($savedata);
            $data['temp_spare'] = [];
            if (!empty($savedata['part_info'])) {

                $data['temp_spare'] = $this->Troublelist_model
                    ->get_spareparts_list();
            }

            $this->edit_data_tool_view($data['temp_spare']);
        } else {
            $data = $this->do_upload();
            $this->Troublelist_model->update_data_tool($data);
            redirect(base_url(), '/');
        }
    }

    public function edit_data_tool_fmea_view($spare_part)
    {
        $data = $this->data;
        if (isset($spare_part)){
            $data['temp_spare'] = $spare_part;
        }

        $id = $this->uri->segment(2);
        $data['items'] = $this->Troublelist_model->get_tool_fmea_id(intval($id));
        $data['division'] = [
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
        // $this->load->view('js/form_js');
        $this->load->view('js/form_edit_js');
    }

    public function post_edit_data_tool_fmea()
    {
        $this->session->set_flashdata('crumbs', '1');
        $this->form_validation->set_message('required', $this->data['IS_REQUIRED']);
        $this->form_validation->set_message('max_length', $this->data['IS_TOO_LONG']);
        $this->form_validation->set_message('check_default', $this->data['NOT_PICK']);

        $this->form_validation->set_rules('部署', '1', 'required|callback_check_default');
        $this->form_validation->set_rules('設備', '2', 'required|callback_check_default');
        $this->form_validation->set_rules('号機', '3', 'required|callback_check_default');
        $this->form_validation->set_rules('工程名', '4', 'required|max_length[140]');
        $this->form_validation->set_rules('故障モード', '5', 'required|max_length[140]');
        $this->form_validation->set_rules('fail_mech', '6', 'required|max_length[140]');
        $this->form_validation->set_rules('故障の影響', '7', 'required|max_length[140]');
        $this->form_validation->set_rules('ライン停止の可能性', '8', 'required|max_length[10]');
        $this->form_validation->set_rules('特殊特性等', '9', 'required|max_length[10]');
        $this->form_validation->set_rules('担当者日程', '10', 'required|callback_check_default');
        $this->form_validation->set_rules('周期', '11', 'required|max_length[140]');
        $this->form_validation->set_rules('月', '12', 'required|max_length[140]');
        $this->form_validation->set_rules('予防', '13', 'required|max_length[140]');
        $this->form_validation->set_rules('検出', '14', 'required|max_length[140]');
        $this->form_validation->set_rules('対策案', '15', 'required|max_length[140]');
        $this->form_validation->set_rules('対策', '16', 'required|max_length[140]');

        // if ($this->form_validation->run() == FALSE) {
        //     $this->edit_data_tool_fmea_view();
        // } else {
        //     $this->Troublelist_model->update_data_tool_fmea();
        //     redirect(base_url(), '/');
        // }

        if ($this->form_validation->run() == FALSE) {
            $savedata = array(
                'error'         =>  validation_errors(),
                'isEdit'        =>  true,
                'part_info'     =>  $this->input->post('spareParts', true)

            );
            $this->session->set_flashdata($savedata);
            $data['temp_spare'] = [];
            if (!empty($savedata['part_info'])) {

                $data['temp_spare'] = $this->Troublelist_model
                    ->get_spareparts_list();
            }

            
            $this->edit_data_tool_fmea_view($data['temp_spare']);
        } else {
            $this->Troublelist_model->update_data_tool_fmea();
            redirect(base_url(), '/');
        }
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
        // regex_match[/^[0-9]\d*(((,\d{3}){1})?(\.\d{0,2})?)$/]

        $this->form_validation->set_rules("c_t202_id", '1', 'required');
        $this->form_validation->set_rules("c_purchaseDate", '2', 'required');
        $this->form_validation->set_rules("c_partName", '3', 'required');
        $this->form_validation->set_rules("c_model", '4', 'required');
        $this->form_validation->set_rules("c_maker", '5', 'required');
        $this->form_validation->set_rules("c_quantity", '6', 'required|is_natural');
        $this->form_validation->set_rules("c_unit", '7', 'required');
        $this->form_validation->set_rules("c_price", '8', 'required|numeric');
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
        $this->form_validation->set_rules("c_price", '7', 'required|numeric');
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
        $this->load->view('js/dashboard_js');
        $this->load->view('templates/header', $data);
        $this->load->view('Pages/all_fmea');
        $this->load->view('templates/footer');
        
    }


}
