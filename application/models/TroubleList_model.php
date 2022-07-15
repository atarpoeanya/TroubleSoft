<?php

class Troublelist_model extends CI_Model
{
    public function get_title($name)
    {
        return $this->db->list_fields($name);
    }
    public function get_tool_trouble_list()
    {
        return $this->db->get('t800_equipment')->result();
    }

    public function get_tool_trouble_fmea_list()
    {
        return $this->db->get('t203_equipment_fmea')->result();
    }

    public function get_trouble_fmea_array($department)
    {
        $query = $this->db->select(['c_facility', 'c_unit', 'c_processName', 'c_failMode', 'c_failImpact', 'c_lineEffect', 'c_specialChar', 'c_failMech', 'c_prevention', 'c_period', 'c_month', 'c_detection', 'c_counterPlan', 'c_picSchedule', 'c_measure']);

        if ($department !== '全部') {
            return $query->where('c_department', $department)->get('t203_equipment_fmea');
        } else {
            return $query->get('t203_equipment_fmea');
        }
    } //Dont need this remember to delete



    public function get_sparepart_list()
    {
        return $this->db->get('t202_spareparts')->result();
    }

    // Check if sparepart exist as foreign key 
    public function get_used_sparepart_status($id)
    {
        $table_a = $this->db->where('c_t202_id', $id)->get('t200_equipment_used_parts')->row();
        $table_b = $this->db->where('c_t202_id', $id)->get('t201_equipment_fmea_used_parts')->row();

        if (isset($table_a) || isset($table_b)) {
            return true;
        } else {
            return false;
        }
    }


    //get_{name}_id mean it only get a single row, use as single item detail grabber
    public function get_tool_id($id)
    {
        $used_part_id = $this->db->where('c_t800_id', $id)->get('t200_equipment_used_parts')->result();
        $used_part = new stdClass();

        $equipment_row = $this->db->get_where('t800_equipment', array("c_t800_id" => $id))->row();
        $equipment_row->c_repairStart = date("H:i", strtotime($equipment_row->c_repairStart));
        $equipment_row->c_repairEnd = date("H:i", strtotime($equipment_row->c_repairEnd));

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

    public function get_tool_fmea_id($id)
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


    public function get_sparepart_id($id)
    {
        $spare_row = $this->db->get_where('t202_spareparts', array("c_t202_id" => $id))->row();
        return $spare_row;
    }

    // For repopulating spare table in equipment form
    // Not tobe confused with get_sparepart(NO S)_list()
    public function get_spareparts_list()
    {
        $data = array();
        $arr_decoded = json_decode($this->input->post('spareParts'), true);

        foreach ($arr_decoded as $value) {
            array_push($data, $value[0]);
        }

        return $this->db->where_in('c_t202_id', $data)->get('t202_spareparts')->result();
    }

    public function add_data_tool($filename)
    {
        $this->db->trans_start();

        if ($this->input->post('fmea_id', true))
            $fmeaid = $this->input->post('fmea_id', true);
        else
            $fmeaid = null;

        $data = [
            'c_createdDate'     => date("Y-m-d H:i:s"),
            'c_accidentDate'    => $this->input->post('発生日', true),
            'c_repairDate'      => $this->input->post('修理日', true),
            'c_repairStart'     => $this->input->post('time_start', true),
            'c_repairEnd'       => $this->input->post('time_end', true),
            'c_department'      => $this->input->post('部署', true),
            'c_manager'         => $this->input->post('担当者', true),
            'c_facility'        => $this->input->post('設備', true),
            'c_unit'            => $this->input->post('号機', true),
            'c_processName'     => $this->input->post('工程名', true),
            'c_failMode'        => $this->input->post('故障モード', true),
            'c_phenomenon'      => $this->input->post('現象', true),
            'c_repairDet'       => $this->input->post('修理内容', true),
            'c_response'        => $this->input->post('response', true),
            'c_failMech'        => $this->input->post('fail_mech', true),
            'c_t203_id'         => $fmeaid,
            'c_countermeasure' => $filename, //ONLY NAME //
        ];
        $this->db->insert('t800_equipment', $data);

        if ($this->input->post('spareParts', true)) {
            $this->add_spare_used(json_decode($this->input->post('spareParts'), true), 't800_equipment');
        }
        $this->db->trans_complete();
    }

    public function add_data_tool_fmea()
    {

        $this->db->trans_start();
        $data = [
            'c_createdDate'     => date("Y-m-d H:i:s"),
            'c_department'      => $this->input->post('部署', true),
            'c_facility'        => $this->input->post('設備', true),
            'c_unit'            => $this->input->post('号機', true),
            'c_processName'     => $this->input->post('工程名', true),
            'c_failMode'        => $this->input->post('故障モード', true),
            'c_failMech'        => $this->input->post('fail_mech', true),
            'c_failImpact'      => $this->input->post('故障の影響', true),
            'c_lineEffect'      => $this->input->post('ライン停止の可能性', true),
            'c_specialChar'     => $this->input->post('特殊特性等', true),
            'c_prevention'      => $this->input->post('予防', true),
            'c_period'          => $this->input->post('周期', true),
            'c_month'           => $this->input->post('月', true),
            'c_detection'       => $this->input->post('検出', true),
            'c_counterPlan'     => $this->input->post('対策案', true),
            'c_picSchedule'     => $this->input->post('担当者日程', true),
            'c_measure'         => $this->input->post('対策', true),
        ];
        $this->db->insert('t203_equipment_fmea', $data);

        if ($this->input->post('spareParts', true)) {
            $this->add_spare_used(json_decode($this->input->post('spareParts'), true), 't203_equipment_fmea');
        }
        $this->db->trans_complete();
    }

    //Inserting spare part entries to new tool
    public function add_spare_used($arr, $formId)
    {

        $data = [];
        //$arr expected [[2,2], [2,1]]
        $id = $this->db->query("SELECT IDENT_CURRENT('$formId') as last_id")->result();

        // Get the respective spare part table name.
        if ($formId === 't203_equipment_fmea')
            $spareTab = 't201_equipment_fmea_used_parts';

        else if ($formId === 't800_equipment')
            $spareTab = 't200_equipment_used_parts';
        // Insert data based on which form is filled
        foreach ($arr as $value) {

            if ($formId === 't203_equipment_fmea')
                $data[] = [

                    'c_t203_id' => $id[0]->last_id,
                    'c_t202_id' => $value[0],
                    'c_amount'  => $value[1]

                ];
            //On real equipment insert also update the selected sparepart used with decreasing its amount.
            else if ($formId === 't800_equipment') {
                $data[] = [

                    'c_t800_id' => $id[0]->last_id,
                    'c_t202_id' => $value[0],
                    'c_amount'  => $value[1]

                ];
                // This update the real amount
                $amountReal = $this->db->where('c_t202_id', $value[0])->get('t202_spareparts')->row()->c_quantity;

                $this->db->set('c_quantity', intval($amountReal) - intval($value[1]), false);
                $this->db->where('c_t202_id', $value[0]);
                $this->db->update('t202_spareparts');
            }
        }
        $this->db->insert_batch($spareTab, $data);
    }

    // Edit the spare part (amount) on the edited tool
    public function edit_spare_used($arr, $formId)
    {
        $data = [];
        //$arr expected [[2,2], [2,1]]
        $id = $this->input->post('id');
        // Get the respective spare part table name.     
        if ($formId === 't203_equipment_fmea') {
            $spareTab = 't201_equipment_fmea_used_parts';
            $idTab = 'c_t203_id';
        } else if ($formId === 't800_equipment') {
            $spareTab = 't200_equipment_used_parts';
            $idTab = 'c_t800_id';
        }
        $this->db->trans_start();
        if (!empty($arr)) {
            foreach ($arr as $value) {

                if ($formId === 't203_equipment_fmea')
                    $data[] = [
                        'c_t203_id' => $id,
                        'c_t202_id' => $value[0],
                        'c_amount'  => $value[1]
                    ];

                else if ($formId === 't800_equipment') {
                    $old_val = intval($value[2]);
                    $new_val = intval($value[1]);

                    if ($value[3] === 'exist') {
                        if ($old_val != $new_val) {
                            // Grab real amount data from database
                            $amountReal = intval($this->db->where('c_t202_id', $value[0])->get('t202_spareparts')->row()->c_quantity);

                            //Pretty much adding back then substract that value with new value
                            $amountReal += $old_val;
                            $this->db->set('c_quantity', $amountReal - $new_val, false);
                            $this->db->where('c_t202_id', $value[0]);
                            $this->db->update('t202_spareparts');
                            $data[] = [
                                'c_t800_id' => $id,
                                'c_t202_id' => $value[0],
                                'c_amount'  => $value[1],
                            ];
                        } else
                            $data[] = [
                                'c_t800_id' => $id,
                                'c_t202_id' => $value[0],
                                'c_amount'  => $value[1],
                            ];
                    }

                    if ($value[3] === 'deleted') {
                        $amountReal = $this->db->where('c_t202_id', $value[0])->get('t202_spareparts')->row()->c_quantity;

                        //Add back deleted stock
                        $this->db->set('c_quantity', intval($amountReal) + $new_val, false);
                        $this->db->where('c_t202_id', $value[0]);
                        $this->db->update('t202_spareparts');
                    }

                    if ($value[3] === 'new') {

                        //Minus stock
                        $amountReal = $this->db->where('c_t202_id', $value[0])->get('t202_spareparts')->row()->c_quantity;
                        $this->db->set('c_quantity', intval($amountReal) - $new_val, false);
                        $this->db->where('c_t202_id', $value[0]);
                        $this->db->update('t202_spareparts');
                        $data[] = [

                            'c_t800_id' => $id,
                            'c_t202_id' => $value[0],
                            'c_amount' => $value[1],
                            // 'c_amount' => $value[2],

                        ];
                    }
                }
            }
            //Check if all data is deleted or not [data = used sparepart data]
            if (!empty($data)) {
                $this->db->where($idTab, $id);
                $this->db->delete($spareTab);
                $this->db->insert_batch($spareTab, $data);
            } else {
                $this->db->where($idTab, $id);
                $this->db->delete($spareTab);
            }
        } else {
            $this->db->where($idTab, $id);
            $this->db->delete($spareTab);
        }

        $this->db->trans_complete();
    }

    public function update_data_tool($_file)
    {
        //difference here being if it has file or not
        // IF HAS FILE
        if ($_file != 'no_file') {
            unlink('./uploads/' . $this->input->post('oldFile', true));
            $data = [
                'c_accidentDate'    => $this->input->post('発生日', true),
                'c_repairDate'      => $this->input->post('修理日', true),
                'c_repairStart'     => $this->input->post('time_start', true),
                'c_repairEnd'       => $this->input->post('time_end', true),
                'c_department'      => $this->input->post('部署', true),
                'c_manager'         => $this->input->post('担当者', true),
                'c_facility'        => $this->input->post('設備', true),
                'c_unit'            => $this->input->post('号機', true),
                'c_processName'     => $this->input->post('工程名', true),
                'c_failMode'        => $this->input->post('故障モード', true),
                'c_phenomenon'      => $this->input->post('現象', true),
                'c_repairDet'       => $this->input->post('修理内容', true),
                'c_response'        => $this->input->post('response', true),
                'c_failMech'        => $this->input->post('fail_mech', true),
                'c_countermeasure'  => $_file

            ];
            // IF NO FILE
        } else {
            $data = [
                'c_accidentDate'    => $this->input->post('発生日', true),
                'c_repairDate'      => $this->input->post('修理日', true),
                'c_repairStart'     => $this->input->post('time_start', true),
                'c_repairEnd'       => $this->input->post('time_end', true),
                'c_department'      => $this->input->post('部署', true),
                'c_manager'         => $this->input->post('担当者', true),
                'c_facility'        => $this->input->post('設備', true),
                'c_unit'            => $this->input->post('号機', true),
                'c_processName'     => $this->input->post('工程名', true),
                'c_failMode'        => $this->input->post('故障モード', true),
                'c_phenomenon'      => $this->input->post('現象', true),
                'c_repairDet'       => $this->input->post('修理内容', true),
                'c_response'        => $this->input->post('response', true),
                'c_failMech'        => $this->input->post('fail_mech', true),
                'c_countermeasure'  => $this->input->post('oldFile', true)
            ];
        }
        $this->db->trans_start();
        $this->db->where('c_t800_id', $this->input->post('id'));
        $this->db->update('t800_equipment', $data);
        //Update spare part 
        if ($this->input->post('spareParts', true))
            $this->edit_spare_used(json_decode($this->input->post('spareParts'), true), 't800_equipment');

        $this->db->trans_complete();
    }

    public function update_data_tool_fmea()
    {

        $data = [

            'c_department'      => $this->input->post('部署', true),
            'c_facility'        => $this->input->post('設備', true),
            'c_unit'            => $this->input->post('号機', true),
            'c_processName'     => $this->input->post('工程名', true),
            'c_failMode'        => $this->input->post('故障モード', true),
            'c_failMech'        => $this->input->post('fail_mech', true),
            'c_failImpact'      => $this->input->post('故障の影響', true),
            'c_lineEffect'      => $this->input->post('ライン停止の可能性', true),
            'c_specialChar'     => $this->input->post('特殊特性等', true),
            'c_prevention'      => $this->input->post('予防', true),
            'c_period'          => $this->input->post('周期', true),
            'c_month'           => $this->input->post('月', true),
            'c_detection'       => $this->input->post('検出', true),
            'c_counterPlan'     => $this->input->post('対策案', true),
            'c_picSchedule'     => $this->input->post('担当者日程', true),
            'c_measure'         => $this->input->post('対策', true),

        ];


        $this->db->trans_start();
        $this->db->where('c_t203_id', $this->input->post('id'));
        $this->db->update('t203_equipment_fmea', $data);
        //Update spare part 
        if ($this->input->post('spareParts', true))
            $this->edit_spare_used(json_decode($this->input->post('spareParts'), true), 't203_equipment_fmea');

        $this->db->trans_complete();
    }

    public function delete_tool($id)
    {
        $this->db->trans_start();
        $pic = $this->db->where('c_t800_id', $id)
            ->get('t800_equipment')
            ->row()->c_countermeasure;

        if ($pic && $pic !== 'no_file')
            unlink('./uploads/' . $pic);

        $this->db->where('c_t800_id', $id);
        $this->db->delete('t800_equipment');
        $this->db->trans_complete();
    }

    public function delete_tool_fmea($id)
    {
        $this->db->trans_start();
        $this->db->where('c_t203_id', $id);
        $this->db->delete('t203_equipment_fmea');
        $this->db->trans_complete();
    }

    //Doesnt delete but zero the spare part
    public function delete_sparepart($id)
    {
        $this->db->trans_start();
        $ZERO  = ['c_quantity' => 0];
        $this->db->where('c_t202_id', $id);
        $this->db->update('t202_spareparts', $ZERO);
        $this->db->trans_complete();
    }

    public function real_delete_sparepart($id)
    {
        $this->db->trans_start();
        $this->db->where('c_t202_id', $id);
        $this->db->delete('t202_spareparts');
        $this->db->trans_complete();
    }

    public function edit_sparepart()
    {
        $data = [
            'c_purchaseDate'        => $this->input->post('c_purchaseDate'),
            'c_partName'            => $this->input->post('c_partName'),
            'c_model'               => $this->input->post('c_model'),
            'c_maker'               => $this->input->post('c_maker'),
            'c_quantity'            => $this->input->post('c_quantity'),
            'c_unit'                => $this->input->post('c_unit'),
            'c_price'               => $this->input->post('c_price'),
            'c_storage'             => $this->input->post('c_storage'),
            'c_arrangement'         => $this->input->post('c_arrangement'),
        ];
        $this->db->trans_start();
        $this->db->where('c_t202_id', $this->input->post('c_t202_id'));
        $this->db->update('t202_spareParts', $data);
        $this->db->trans_complete();
    }

    public function add_sparepart()
    {
        $data = [
            'c_purchaseDate'        => $this->input->post('c_purchaseDate'),
            'c_partName'            => $this->input->post('c_partName'),
            'c_model'               => $this->input->post('c_model'),
            'c_maker'               => $this->input->post('c_maker'),
            'c_quantity'            => $this->input->post('c_quantity'),
            'c_unit'                => $this->input->post('c_unit'),
            'c_price'               => $this->input->post('c_price'),
            'c_storage'             => $this->input->post('c_storage'),
            'c_arrangement'         => $this->input->post('c_arrangement'),
        ];

        $this->db->trans_start();
        $this->db->insert('t202_spareParts', $data);
        $this->db->trans_complete();
    }
}

// =========================== UNUSED OR UPDATED FUNCTION THAT MIGHT BE BETTER TBH


// All in one delete function (disadvantage : need to send which form send the request which can be done via controller but if you like
//                                            like "readablity i guess use the current one")
/*
 public function delete_data($id, $formID, $head)
    {
        $formName = '';
        $this->db->trans_begin();
        switch ($formID) {
            case 'equipment':
                $formName = 't800_equipment';
                $pic = $this->db->where($head, $id)
                    ->get($formName)
                    ->row()->c_countermeasure;

                if ($pic && $pic !== 'no_file')
                    unlink('./uploads/' . $pic);

                $this->db->where($head, $id);
                $this->db->delete($formName);
                break;

            case 'equipment_fmea':
                $formName = 't203_equipment_fmea';

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
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
    }

        public function getToolsFmeaid($id)
    {
        return $this->db->get_where('t203_equipment_fmea', array("c_t203_id" => $id))->row();
    }
*/