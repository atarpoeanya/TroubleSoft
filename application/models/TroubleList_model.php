<?php

class Troublelist_model extends CI_Model
{
    public function getTitle($name)
    {
        return $this->db->list_fields($name);
    }
    public function getTroubleList()
    {
        return $this->db->get('equipment')->result();
    }


    public function getSparepartList()
    {
        return $this->db->get('spareparts')->result();
    }

    public function getEquipmentId($id)
    {
        return $this->db->get_where('equipment', array("setsubiId" => $id))->row();
    }

    public function addData($formID)
    {
        $data = [];

        switch ($formID) {
            case 'equipment':
                $data = [
                    'accidentDate' => $this->input->post('発生日', true),
                    'repairDate' => $this->input->post('修理日', true),
                    'department' => $this->input->post('部署', true),
                    'manager' => $this->input->post('担当者', true),
                    'facility' => $this->input->post('設備', true),
                    'unit' => $this->input->post('号機', true),
                    'processName' => $this->input->post('工程名・工程機能', true),
                    'repairTime' => $this->input->post('修理所要時間', true),
                    'failMode' => $this->input->post('故障モード', true),
                    'classification' => $this->input->post('区分', true),
                    'phenomenon' => $this->input->post('現象・不具合要因詳細', true),
                    'repairDet' => $this->input->post('修理内容', true),
                    'measures' => $this->input->post('対策', true),
                    'countermeasure' => $this->input->post('対策書', true)
                ];
                break;
            case 'equipment_fmea':

                $data_trouble = [
                    'accidentDate' => $this->input->post('発生日', true),
                    'repairDate' => $this->input->post('修理日', true),
                    'department' => $this->input->post('部署', true),
                    'manager' => $this->input->post('担当者', true),
                    'facility' => $this->input->post('設備', true),
                    'unit' => $this->input->post('号機', true),
                    'processName' => $this->input->post('工程名・工程機能', true),
                    'repairTime' => $this->input->post('修理所要時間', true),
                    'failMode' => $this->input->post('故障モード', true),
                    'classification' => $this->input->post('区分', true),
                    'phenomenon' => $this->input->post('現象・不具合要因詳細', true),
                    'repairDet' => $this->input->post('修理内容', true),
                    'measures' => $this->input->post('対策', true),
                    'countermeasure' => $this->input->post('対策書', true)
                ];
                $this->db->insert('equipment', $data_trouble);
                $data = [
                    'failImpact' => $this->input->post('故障の影響'),
                    'lineEffect' => $this->input->post('ライン停止の可能性'),
                    'specialChar' => $this->input->post('特殊特性等'),
                    'prevention' => $this->input->post('予防'),
                    'period' => $this->input->post('周期'),
                    'month' => $this->input->post('月'),
                    'detection' => $this->input->post('検出'),
                    'counterPlan' => $this->input->post('対策案'),
                    'picSchedule' => $this->input->post('担当者日程'),
                    'response' => $this->input->post('対応処置')
                ];

                // $data = $data_trouble + $data_fmea;
                break;

            case 'spareparts':
                $data = [
                    'purchaseDate' => $this->input->post('購入日'),
                    'department' => $this->input->post('部署名'),
                    'buyer' => $this->input->post('購入者'),
                    'placement' => $this->input->post('使用箇所'),
                    'partname' => $this->input->post('部品名'),
                    'model' => $this->input->post('型式'),
                    'maker' => $this->input->post('メーカー名'),
                    'quantity' => $this->input->post('数量'),
                    'unit' => $this->input->post('単位'),
                    'price' => $this->input->post('金額'),
                ];
                break;
            default:

                break;
        }


        $this->db->insert($formID, $data);
        //Update spare part 
    }

    public function deleteData($id, $formID, $head)
    {
        $this->db->where($head, $id);
        $this->db->delete($formID);
    }   
}
