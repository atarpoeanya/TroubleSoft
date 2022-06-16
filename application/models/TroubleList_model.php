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

    public function getTrouble_fmea()
    {
        return $this->db->get('t203_equipment_fmea')->result();
    }



    public function getSparepartList()
    {
        return $this->db->get('t202_spareparts')->result();
    }

    // public function getFmea($id)
    // {
    //     return $this->db->where('c_t800_id', $id)->get('t201_equipment_fmea')->row();
    // }

    public function getEquipmentId($id)
    {
        $used_part_id = $this->db->where('c_t800_id', $id)->get('t200_equipment_used_parts')->result();
        $used_part = new stdClass();



        $equipment_row = $this->db->get_where('t800_equipment', array("c_t800_id" => $id))->row();

        if ($used_part_id) {
            $itemNum = 1;
            foreach ($used_part_id as $value) {
                $res = $this->db->where('c_t202_id', $value->c_t202_id)->get('t202_spareparts')->row();
                $used_part->{strval($itemNum)} = $res;
                $used_part->{strval($itemNum)}->c_quantity = $value->c_amount;
                $itemNum++;
            }

            $equipment_row->{'spare'} = $used_part;
        }



        return $equipment_row;
    }

    public function getFmeaId($id)
    {
        $used_part_id = $this->db->where('c_t203_id', $id)->get('t201_equipment_fmea_used_parts')->result();
        $used_part = new stdClass();

        $equipment_row = $this->db->get_where('t203_equipment_fmea', array("c_t203_id" => $id))->row();

        if ($used_part_id) {
            $itemNum = 1;
            foreach ($used_part_id as $value) {
                $res = $this->db->where('c_t202_id', $value->c_t202_id)->get('t202_spareparts')->row();
                $used_part->{strval($itemNum)} = $res;
                $used_part->{strval($itemNum)}->c_quantity = $value->c_amount;
                $itemNum++;
            }

            $equipment_row->{'spare'} = $used_part;
        }



        return $equipment_row;
    }


    public function getSpareId($id)
    {
        $spare_row = $this->db->get_where('t202_spareparts', array("c_t202_id" => $id))->row();
        return $spare_row;
    }

    public function getToolsFmeaid($id)
    {
        return $this->db->get_where('t203_equipment_fmea', array("c_t203_id" => $id))->row();
    }

    public function addData($formID, $filename)
    {
        $data = [];
        $formName = '';
        $fmeaid = '';
        $this->db->trans_begin();
        switch ($formID) {
            case 'equipment':
                $formName = 't800_equipment';
                if ($this->input->post('fmea_id', true))
                    $fmeaid = $this->input->post('fmea_id', true);
                else
                    $fmeaid = null;
                $data = [
                    'c_accidentDate' => $this->input->post('発生日', true),
                    'c_repairDate' => $this->input->post('修理日', true),

                    'c_repairStart' => $this->input->post('time_start', true),
                    'c_repairEnd' => $this->input->post('time_end', true),


                    'c_department' => $this->input->post('部署', true),
                    'c_manager' => $this->input->post('担当者', true),
                    'c_facility' => $this->input->post('設備', true),
                    'c_unit' => $this->input->post('号機', true),
                    'c_processName' => $this->input->post('工程名', true),

                    'c_failMode' => $this->input->post('故障モード', true),
                    'c_classification' => $this->input->post('区分', true),
                    'c_phenomenon' => $this->input->post('現象', true),
                    'c_repairDet' => $this->input->post('修理内容', true),

                    'c_response' => $this->input->post('response', true),
                    'c_failMech' => $this->input->post('fail_mech', true),
                    'c_t203_id' => $fmeaid,


                    'c_countermeasure' => $filename, //ONLY NAME
                ];
                // $spare = json_decode($spareJson, true);


                break;
            case 'equipment_fmea':
                $formName = 't203_equipment_fmea';

                $data = [
                    'c_accidentDate' => $this->input->post('発生日', true),
                    'c_repairDate' => $this->input->post('修理日', true),

                    'c_repairStart' => $this->input->post('time_start', true),
                    'c_repairEnd' => $this->input->post('time_end', true),


                    'c_department' => $this->input->post('部署', true),

                    'c_facility' => $this->input->post('設備', true),
                    'c_unit' => $this->input->post('号機', true),
                    'c_processName' => $this->input->post('工程名', true),

                    'c_failMode' => $this->input->post('故障モード', true),

                    'c_phenomenon' => $this->input->post('現象', true),
                    'c_repairDet' => $this->input->post('修理内容', true),


                    'c_failMech' => $this->input->post('fail_mech', true),

                    'c_failImpact' => $this->input->post('故障の影響', true),
                    'c_lineEffect' => $this->input->post('ライン停止の可能性', true),
                    'c_specialChar' => $this->input->post('特殊特性等', true),

                    'c_prevention' => $this->input->post('予防', true),
                    'c_period' => $this->input->post('周期', true),
                    'c_month' => $this->input->post('月', true),
                    'c_detection' => $this->input->post('検出', true),
                    'c_counterPlan' => $this->input->post('対策案', true),
                    'c_picSchedule' => $this->input->post('担当者日程', true),
                    'c_response' => $this->input->post('対応処置', true),
                    'c_measure' => $this->input->post('対策', true),

                ];

                // $data = $data_trouble + $data_fmea;
                break;

                // WAS FOR SPARE PART, TURN OUT USING MODAL CHANGE THE MECHANISM
                // case 'spareparts':
                //     $formName = 't202_spareparts';
                //     $data = [
                //         'c_purchaseDate' => $this->input->post('購入日'),
                //         'c_department' => $this->input->post('部署名'),
                //         'c_placement' => $this->input->post('使用箇所'),
                //         'c_partName' => $this->input->post('部品名'),
                //         'c_model' => $this->input->post('型式'),
                //         'c_maker' => $this->input->post('メーカー名'),
                //         'c_quantity' => $this->input->post('数量'),
                //         'c_unit' => $this->input->post('単位'),
                //         'c_price' => $this->input->post('金額'),
                //     ];
                //     break;
            default:
                echo 'error';
                break;
        }


        $this->db->insert($formName, $data);
        //IF EQUIPMENT && ARR != empty
        // $_SESSION['message'] = print_r(json_decode($this->input->post('spareParts'),true),true);
        if ($this->input->post('spareParts', true)) {
            $this->addSpare_used(json_decode($this->input->post('spareParts'), true), $formName);
        }
        
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
    }


    public function addSpare_used($arr, $formId)
    {
        
        $data = [];
        //$arr expected [[2,2], [2,1]]
        $id = $this->db->query("SELECT IDENT_CURRENT('$formId') as last_id")->result();
        if ($formId == 't203_equipment_fmea')
            $spareTab = 't201_equipment_fmea_used_parts';
        elseif ($formId == 't800_equipment')
            $spareTab = 't200_equipment_used_parts';
        foreach ($arr as $value) {
            // $spare_data.array_push([$id, $value[0], $value[1]]);
            if ($formId == 't203_equipment_fmea')
                $data[] = [

                    'c_t203_id' => $id[0]->last_id,
                    'c_t202_id' => $value[0],
                    'c_amount' => $value[1]

                ];
            elseif ($formId == 't800_equipment') {
                $data[] = [

                    'c_t800_id' => $id[0]->last_id,
                    'c_t202_id' => $value[0],
                    'c_amount' => $value[1]

                ];
                $amountReal = $this->db->where('c_t202_id', $value[0])->get('t202_spareparts')->row()->c_quantity;
                
                $this->db->set('c_quantity', intval($amountReal) - intval($value[1]), false);
                $this->db->where('c_t202_id', $value[0]);
                $this->db->update('t202_spareparts');
            }
        }
        $this->db->insert_batch($spareTab, $data);
        // $this->db->trans_complete();

    }


    public function editSpare_used($arr)
    {
        $data = [];
        //$arr expected [[2,2], [2,1]]
        $id = $this->input->post('id');
        if (!empty($arr)) {
            foreach ($arr as $value) {
                // $spare_data.array_push([$id, $value[0], $value[1]]);
                $data[] = [

                    'c_t800_id' => $id,
                    'c_t202_id' => $value[0],
                    'c_amount' => $value[1]


                ];
            }

            $this->db->where('c_t800_id', $id);
            $this->db->delete('t200_used_parts');

            $this->db->insert_batch('t200_used_parts', $data);
        } else {
            $this->db->where('c_t800_id', $id);
            $this->db->delete('t200_used_parts');
        }
    }

    public function updateData($_file)
    {
        if ($_file != 'no_file') {
            unlink('./uploads/' . $this->input->post('oldFile', true));
            $data = [
                'c_accidentDate' => $this->input->post('発生日', true),
                'c_repairDate' => $this->input->post('修理日', true),
                'c_department' => $this->input->post('部署', true),
                'c_manager' => $this->input->post('担当者', true),
                'c_facility' => $this->input->post('設備', true),
                'c_unit' => $this->input->post('号機', true),
                'c_processName' => $this->input->post('工程名', true),
                'c_repairTime' => $this->input->post('修理時間', true),
                'c_failMode' => $this->input->post('故障モード', true),
                'c_classification' => $this->input->post('区分', true),
                'c_phenomenon' => $this->input->post('現象', true),
                'c_repairDet' => $this->input->post('修理内容', true),
                'c_measures' => $this->input->post('対策', true),
                'c_countermeasure' => $_file

            ];
        } else {
            $data = [
                'c_accidentDate' => $this->input->post('発生日', true),
                'c_repairDate' => $this->input->post('修理日', true),
                'c_department' => $this->input->post('部署', true),
                'c_manager' => $this->input->post('担当者', true),
                'c_facility' => $this->input->post('設備', true),
                'c_unit' => $this->input->post('号機', true),
                'c_processName' => $this->input->post('工程名', true),
                'c_repairTime' => $this->input->post('修理時間', true),
                'c_failMode' => $this->input->post('故障モード', true),
                'c_classification' => $this->input->post('区分', true),
                'c_phenomenon' => $this->input->post('現象', true),
                'c_repairDet' => $this->input->post('修理内容', true),
                'c_measures' => $this->input->post('対策', true),
                'c_countermeasure' => $this->input->post('oldFile', true)
            ];
        }

        if ($this->input->post('fmea-Id', true)) {
            $data_fmea = [
                'c_failImpact' => $this->input->post('故障の影響', true),
                'c_lineEffect' => $this->input->post('ライン停止の可能性', true),
                'c_specialChar' => $this->input->post('特殊特性等', true),
                'c_prevention' => $this->input->post('予防', true),
                'c_period' => $this->input->post('周期', true),
                'c_month' => $this->input->post('月', true),
                'c_detection' => $this->input->post('検出', true),
                'c_counterPlan' => $this->input->post('対策案', true),
                'c_picSchedule' => $this->input->post('担当者日程', true),
                'c_response' => $this->input->post('対応処置', true)
            ];
            $this->db->where('c_t800_id', $this->input->post('fmea-Id', true));
            $this->db->update('t201_equipment_fmea', $data_fmea);
        }




        $this->db->where('c_t800_id', $this->input->post('id'));
        $this->db->update('t800_equipment', $data);
        //Update spare part 
        if ($this->input->post('spareParts', true))
            $this->editSpare_used(json_decode($this->input->post('spareParts'), true));
    }

    public function deleteData($id, $formID, $head)
    {
        $formName = '';
        switch ($formID) {
            case 'equipment':
                $formName = 't800_equipment';
                $pic = $this->db->where($head, $id)->get($formName)->row()->c_countermeasure;
                if ($pic && $pic !== 'no_file')
                    unlink('./uploads/' . $pic);

                $this->db->where($head, $id);
                $this->db->delete($formName);
                break;
            case 'spareparts':
                $formName = 't202_spareparts';
                $arrf  = ['c_quantity' => 0];

                $this->db->where($head, $id);
                $this->db->update($formName, $arrf);
                break;
            default:
                # code...
                break;
        }
    }

    public function editSpares()
    {
        $data = [
            'c_purchaseDate' => $this->input->post('c_purchaseDate'),

            'c_partName' => $this->input->post('c_partName'),
            'c_model' => $this->input->post('c_model'),
            'c_maker' => $this->input->post('c_maker'),
            'c_quantity' => $this->input->post('c_quantity'),
            'c_unit' => $this->input->post('c_unit'),
            'c_price' => $this->input->post('c_price'),
        ];

        $this->db->where('c_t202_id', $this->input->post('c_t202_id'));
        $this->db->update('t202_spareParts', $data);
    }

    public function addSpares()
    {
        $data = [
            'c_purchaseDate' => $this->input->post('c_purchaseDate'),

            'c_partName' => $this->input->post('c_partName'),
            'c_model' => $this->input->post('c_model'),
            'c_maker' => $this->input->post('c_maker'),
            'c_quantity' => $this->input->post('c_quantity'),
            'c_unit' => $this->input->post('c_unit'),
            'c_price' => $this->input->post('c_price'),

            'c_storage' => $this->input->post('c_storage'),
            'c_arrangement' => $this->input->post('c_arrangement'),
        ];


        $this->db->insert('t202_spareParts', $data);
    }
}
