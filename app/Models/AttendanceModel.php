<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class AttendanceModel extends Model
{
    public function fetchAttendance($type)
    {
        $builder = $this->db->table($this->DBPrefix . 'physiotherapy_attendance');
        // $query = $builder->select('*, ROW_NUMBER() OVER (ORDER BY attendance_id DESC) AS id')->where('entry_type', $type)->getCompiledSelect();
        $query = $builder->select('*, ROW_NUMBER() OVER (ORDER BY attendance_id) AS id')->where('entry_type', $type)->get();
        
        $res = $query->getResultArray();
        $this->storeSqlLog();
        return $res;
    }
    
    public function getUniqueNames()
    {
        $builder = $this->db->table($this->DBPrefix . 'physiotherapy_attendance');
        $query = $builder->select('emp_code, emp_name')->distinct()->get();
        
        $res = $query->getResultArray();
        $this->storeSqlLog();
        return $res;
    }
    
    public function getUniqueMonths()
    {
        $builder = $this->db->table($this->DBPrefix . 'physiotherapy_attendance');
        $query = $builder->select('month')->distinct()->get();
        
        $res = $query->getResultArray();
        $this->storeSqlLog();
        return $res;
    }

    protected function storeSqlLog()
    {
        $builder = $this->db->table($this->DBPrefix . 'sql_logs');
        $data = [
            'query' => $this->db->getLastQuery(),
            'user' => session()->get('logged_user_name'),
            // 'os' => $this->getUserAgentInfo(),
            // 'platform' => $this->getUserAgentInfo(true),
            // 'ip' => $this->request->getIPAddress(),
        ];
        $builder->insert($data);
    }
}
