<?php

namespace App\Models;

use CodeIgniter\Model;

class Login extends Model
{

    public function searchEmail($email)
    {
        $builder = $this->db->table($this->DBPrefix . 'users');
        $builder->select('*')->where('email', $email);
        $res = $builder->get();

        if (count($res->getResultArray()) != 0) {
            // $this->storeSqlLog();
            return $res->getRow();
        } else {
            return false;
        }
    }

    public function saveLoginInfo($data)
    {
        $builder = $this->db->table($this->DBPrefix . 'login_activity');
        $builder->insert($data);

        if ($this->db->affectedRows() == 1) {
            // $this->storeSqlLog();
            return $this->db->insertID();
        } else {
            return false;
        }
    }

    public function updateLogoutTime($la_id, $time)
    {
        $builder = $this->db->table($this->DBPrefix . 'login_activity');
        $builder->where('activity_id', $la_id);
        $builder->update(['logout_time' => $time]);

        if ($this->db->affectedRows() == 1) {
            // $this->storeSqlLog();
            return true;
        }
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
