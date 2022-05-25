<?php

class Troublelist_model extends CI_Model
{
    public function getTitle($name)
    {
        return $this->db->list_fields($name);
    }
    public function getTroubleList()
    {
        return $this->db->get('t800_equipment')->result();
    }


    public function getSparepartList()
    {
        return $this->db->get('t202_spareparts')->result();
    }

    public function getEquipmentId($id)
    {
        return $this->db->get_where('t800_equipment', array("c_t800_id" => $id))->row();
    }

    public function addData($formID)
    {
        $data = [];
        $formName = '';

        switch ($formID) {
            case 'equipment':
                $formName = 't800_equipment';
                $data = [
                    'c_accidentDate' => $this->input->post('発生日', true),
                    'c_repairDate' => $this->input->post('修理日', true),
                    'c_department' => $this->input->post('部署', true),
                    'c_manager' => $this->input->post('担当者', true),
                    'c_facility' => $this->input->post('設備', true),
                    'c_unit' => $this->input->post('号機', true),
                    'c_processName' => $this->input->post('工程名・工程機能', true),
                    'c_repairTime' => $this->input->post('修理所要時間', true),
                    'c_failMode' => $this->input->post('故障モード', true),
                    'c_classification' => $this->input->post('区分', true),
                    'c_phenomenon' => $this->input->post('現象・不具合要因詳細', true),
                    'c_repairDet' => $this->input->post('修理内容', true),
                    'c_measures' => $this->input->post('対策', true),
                    'c_countermeasure' => $this->input->post('対策書', true)
                ];
                break;
            case 'equipment_fmea':
                $formName = 't201_equipment_fmea';
                $data_trouble = [
                    'c_accidentDate' => $this->input->post('発生日', true),
                    'c_repairDate' => $this->input->post('修理日', true),
                    'c_department' => $this->input->post('部署', true),
                    'c_manager' => $this->input->post('担当者', true),
                    'c_facility' => $this->input->post('設備', true),
                    'c_unit' => $this->input->post('号機', true),
                    'c_processName' => $this->input->post('工程名・工程機能', true),
                    'c_repairTime' => $this->input->post('修理所要時間', true),
                    'c_failMode' => $this->input->post('故障モード', true),
                    'c_classification' => $this->input->post('区分', true),
                    'c_phenomenon' => $this->input->post('現象・不具合要因詳細', true),
                    'c_repairDet' => $this->input->post('修理内容', true),
                    'c_measures' => $this->input->post('対策', true),
                    'c_countermeasure' => $this->input->post('対策書', true)
                ];
                $this->db->insert('t800_equipment', $data_trouble);
                $data = [
                    'c_failImpact' => $this->input->post('故障の影響'),
                    'c_lineEffect' => $this->input->post('ライン停止の可能性'),
                    'c_specialChar' => $this->input->post('特殊特性等'),
                    'c_prevention' => $this->input->post('予防'),
                    'c_period' => $this->input->post('周期'),
                    'c_month' => $this->input->post('月'),
                    'c_detection' => $this->input->post('検出'),
                    'c_counterPlan' => $this->input->post('対策案'),
                    'c_picSchedule' => $this->input->post('担当者日程'),
                    'c_response' => $this->input->post('対応処置')
                ];

                // $data = $data_trouble + $data_fmea;
                break;

            case 'spareparts':
                $formName = 't202_spareparts';
                $data = [
                    'c_purchaseDate' => $this->input->post('購入日'),
                    'c_department' => $this->input->post('部署名'),
                    'c_placement' => $this->input->post('使用箇所'),
                    'c_partName' => $this->input->post('部品名'),
                    'c_model' => $this->input->post('型式'),
                    'c_maker' => $this->input->post('メーカー名'),
                    'c_quantity' => $this->input->post('数量'),
                    'c_unit' => $this->input->post('単位'),
                    'c_price' => $this->input->post('金額'),
                ];
                break;
            default:

                break;
        }


        $this->db->insert($formName, $data);
        //Update spare part 
    }

    public function updateData()
    {
        $data = [
            'c_accidentDate' => $this->input->post('発生日', true),
            'c_repairDate' => $this->input->post('修理日', true),
            'c_department' => $this->input->post('部署', true),
            'c_manager' => $this->input->post('担当者', true),
            'c_facility' => $this->input->post('設備', true),
            'c_unit' => $this->input->post('号機', true),
            'c_processName' => $this->input->post('工程名・工程機能', true),
            'c_repairTime' => $this->input->post('修理所要時間', true),
            'c_failMode' => $this->input->post('故障モード', true),
            'c_classification' => $this->input->post('区分', true),
            'c_phenomenon' => $this->input->post('現象・不具合要因詳細', true),
            'c_repairDet' => $this->input->post('修理内容', true),
            'c_measures' => $this->input->post('対策', true),
            'c_countermeasure' => $this->input->post('対策書', true)
        ];



        $this->db->where('c_t800_id', $this->input->post('id'));
        $this->db->update('t800_equipment', $data);
        //Update spare part 
    }

    public function deleteData($id, $formID, $head)
    {
        $this->db->where($head, $id);
        $this->db->delete($formID);
    }
}
