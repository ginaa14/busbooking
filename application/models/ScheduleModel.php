<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScheduleModel extends CI_Model {
	public function list_data($key = array())
	{
        if(isset($key['from']) && !empty($key['from'])){
            $this->db->where('a.from_location', $key['from']);
        }

        if(isset($key['to']) && !empty($key['to'])){
            $this->db->where('a.to_location', $key['to']);
        }

        if(isset($key['tanggal']) && !empty($key['tanggal'])){
            $this->db->like('a.departure_time', $key['tanggal']);
        }

		$this->db->select('a.id, a.status, a.bus_id as bus_id, a.from_location as from_id, a.to_location as to_id, a.departure_time,  a.availability, a.price, a.date_updated, a.eta, b.name, b.bus_number, c.terminal_name as from, d.terminal_name as to');
		$this->db->from('schedule_list a');
        $this->db->join('bus b', 'a.bus_id = b.id','left');
        $this->db->join('location c','a.from_location = c.id','left');
        $this->db->join('location d','a.to_location = d.id','left');
		return $this->db->get()->result_array();
	}
    
    public function insert($data){
        $this->db->insert('schedule_list', $data);
        return true;
    }

    public function insertkursi($data){
        $this->db->insert('kursi_booked', $data);
        return true;
    }

    public function update($id, $data){
        $this->db->where('id', $id);
		$this->db->update('schedule_list', $data);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('schedule_list');
        return true;
    }

    public function list_bus(){
        $this->db->where('status', 1);
        $this->db->select('*');
        $this->db->from('bus');
        $this->db->order_by('bus_number', 'ASC');
        return $this->db->get()->result_array();
    }

    public function list_loc(){
        $this->db->where('status', 1);
        $this->db->select('*');
        $this->db->from('location');
        $this->db->order_by('terminal_name', 'ASC');
        return $this->db->get()->result_array();
    }
}