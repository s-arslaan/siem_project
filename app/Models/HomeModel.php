<?php

namespace App\Models;
use CodeIgniter\Model;

class HomeModel extends Model
{

    public function getLoginActivity()
    {
        $query = $this->db->query("SELECT u.name, u.email, la.agent, la.platform, la.ip, la.login_time, la.logout_time FROM `login_activity` la LEFT JOIN users u ON la.unique_id = u.unique_id ORDER BY `la`.`login_time` DESC");
        $res = $query->getResultArray();

        // $this->storeSqlLog();

        return $res;
    }
    
    public function getSqlLogs()
    {
        $query = $this->db->query("SELECT * FROM `sql_logs` ORDER BY `sql_logs`.`time` DESC");
        $res = $query->getResultArray();
        
        // $this->storeSqlLog();

        return $res;
    }

    public function getLogActivity()
    {
        $query = $this->db->query("SELECT * FROM `log_activity` ORDER BY `log_activity`.`timestamp` DESC");
        $res = $query->getResultArray();

        return $res;
    }
    
    public function getAssets()
    {
        $query = $this->db->query("SELECT * FROM `assets` ORDER BY `assets`.`last_seen` DESC");
        $res = $query->getResultArray();

        return $res;
    }
    
    public function getNetworkActivity()
    {
        $query = $this->db->query("SELECT * FROM `network_activity` ORDER BY `network_activity`.`first_pkt_time` DESC");
        $res = $query->getResultArray();

        return $res;
    }
    
    public function getOffenses()
    {
        $query = $this->db->query("SELECT * FROM `offenses` ORDER BY `offenses`.`start_date` DESC");
        $res = $query->getResultArray();

        return $res;
    }

    public function storeLogActivity()
    {
        $api = 'https://api.datadog.com/logs';

        $events = ['Successful Network Login  ','Information Message ','User Logon ','User Logoff','Unsuccessful Network Login'];
        $log_sources = ['Perimeter device logs','Windows event logs','Endpoint logs','Application logs','Proxy logs','IoT logs'];
        $low_category = ['Misc login','Information','System Status','Alert'];
        $ip_1 = [192,10,9,186,1,2,4];
        $ip_2 = [80,168,24,1,2,4];
        $src_ports = [80,443];
        $dst_ports = [20,21,22,23,25,53,80,110,119,123,143,161,194,443];

        $total = rand(7,20);

        for ($i=0; $i < $total; $i++) {
            $log = [
                'event_name' => $events[rand(0, count($events)-1)],	
                'log_source' => $log_sources[rand(0, count($log_sources)-1)],
                'event_count' => rand(1,8),
                'low_category' => $low_category[rand(0, count($low_category)-1)],
                'source_ip' => $ip_1[rand(0, count($ip_1)-1)].'.'.$ip_2[rand(0, count($ip_2)-1)].'.'.rand(1,64).'.'.rand(1,254),
                'source_port' => $src_ports[rand(0, count($src_ports)-1)],
                'destination_ip' => $ip_1[rand(0, count($ip_1)-1)].'.'.$ip_2[rand(0, count($ip_2)-1)].'.'.rand(1,64).'.'.rand(1,254),
                'destination_port' => $dst_ports[rand(0, count($dst_ports)-1)],
            ];

            $builder = $this->db->table($this->DBPrefix . 'log_activity');
            $builder->insert($log);
        }
        // return $log;

    }

    public function storeNetworkActivity()
    {
        /*
        Inspect your user agent and headers
        HTTPBin
        Mockyard
        Mock APIs for testing
        Nominatum
        Locations and addresses
        Fake user data generator
        Randuser
        Teleport
        Location and quality of life data
        JSONPlaceholder
            */
        $api = 'http://httpbin.org/get';
        
        $app = ['Web Secure','Misc Domain'];
        // $log_sources = ['Perimeter device logs','Windows event logs','Endpoint logs','Application logs','Proxy logs','IoT logs'];
        $proto = ['tcp_ip','udp_ip'];
        $ip_1 = [192,10,9,186,1,2,4];
        $ip_2 = [80,168,24,1,2,4];
        $src_ports = [80,443];
        $dst_ports = [20,21,22,23,25,53,80,110,119,123,143,161,194,443];

        $total = rand(7,20);

        for ($i=0; $i < $total; $i++) {
            $log = [
                'flow_type' => 'Data Packet',
                'source_bytes' => rand(900,32000),
                'application' => $app[rand(0, count($app)-1)],
                'first_pkt_time' => date('Y-m-d H:i:s',strtotime('-'.rand(4,7).' minutes')),
                'source_ip' => $ip_1[rand(0, count($ip_1)-1)].'.'.$ip_2[rand(0, count($ip_2)-1)].'.'.rand(1,64).'.'.rand(1,254),
                'source_port' => $src_ports[rand(0, count($src_ports)-1)],
                'last_pkt_time' => date('Y-m-d H:i:s',strtotime('-'.rand(1,3).' minutes')),
                'destination_ip' => $ip_1[rand(0, count($ip_1)-1)].'.'.$ip_2[rand(0, count($ip_2)-1)].'.'.rand(1,64).'.'.rand(1,254),
                'destination_port' => $dst_ports[rand(0, count($dst_ports)-1)],
                'protocol' => $proto[rand(0, count($proto)-1)],
                'destination_bytes' => rand(900,32000),
            ];

            $builder = $this->db->table($this->DBPrefix . 'network_activity');
            $builder->insert($log);
        }
        // return $API;

    }

    public function storeOffenses()
    {
        $desc = ['User Watchlist Login preceded by Login Success containing Success Audit: Authentication Ticket Granted','Excessive Firewall Denies Across Multiple Hosts From A Local Host containing Firewall Drop','Multiple Login Failures for the Same User containing Logon Failure - Account currently disabled','Excessive Firewall Denies Between Hosts containing Firewall Drop','RemoteAccess.MSTerminalServices','Flow Source/Interface Stopped Sending Flows','Login Failures Followed By Success to the same Destination IP preceded by Multiple Login Failures'];
        $off_type = ['Username','Source IP','Username','Source IP','Source IP','Rule','Destination IP'];

        $users = ['jg000075','cF00231','jy2700001','nina','clay', 'N/A'];
        $mag = ['high','low','medium'];
        $ip_1 = [192,10,9,186,1,2,4];
        $ip_2 = [80,168,24,1,2,4];
        $flows = [0,309,230];
        $dst_ports = [20,21,22,23,25,53,80,110,119,123,143,161,194,443];

        $total = rand(7,20);

        for ($i=0; $i < $total; $i++) {
            $ind = rand(0, count($desc)-1);
            $ind2 = rand(0, count($users)-1);

            $offense_typ = '10.'.$ip_2[rand(0, count($ip_2)-1)].'.'.rand(1,64).'.'.rand(1,254);
            if($off_type[$ind] === 'Username') {
                $offense_typ = $users[$ind2];
            } else if($off_type[$ind] === 'Rule') {
                $offense_typ = 'Flow Source Stopped';
            }
            $log = [
                'description' => $desc[$ind],
                'offense_type' => $off_type[$ind],
                'offense_source' =>  $offense_typ,
                'magnitude' => $mag[rand(0, count($mag)-1)],
                'source_ip' => '10.'.$ip_2[rand(0, count($ip_2)-1)].'.'.rand(1,64).'.'.rand(1,254),
                'dest_ip' => '10.'.$ip_2[rand(0, count($ip_2)-1)].'.'.rand(1,64).'.'.rand(1,254),
                'user' => $users[rand(0, count($users)-1)],
                'log_source' => 'Multiple ('.rand(2,7).')',
                'events' => rand(0,2499),
                'flows' => 0,
                'start_date' => date('Y-m-d H:i:s',strtotime('-'.rand(10,30).' days')),
                'last_event' => rand(1,10).'d '.rand(5,23).'h',
            ];
            // 
            $builder = $this->db->table($this->DBPrefix . 'offenses');
            $builder->insert($log);
            // return $log;
        }

    }

    public function storeAssets()
    {
        $os = ['linux','Windows','MacOS'];
        // $log_sources = ['Perimeter device logs','Windows event logs','Endpoint logs','Application logs','Proxy logs','IoT logs'];
        $users = ['Peregrinity','001Peregrinity01','CollyriumCheeky','001CollyriumCheeky01','Piliform','001Piliform01','Furtive','001Furtive01','Qualificator','001Qualificator01','Salpiglossis','001Salpiglossis01','Decubitus','001Decubitus01','DidonWonky','001DidonWonky01','Sedilia','001Sedilia01','Poltroon','001Poltroon01','LiviaLutose','001LiviaLutose01','Vamoose'];
        $ip_1 = [192,10,9,186,1,2,4];
        $ip_2 = [80,168,24,1,2,4];

        $total = rand(7,20);
        
        for ($i=0; $i < $total; $i++) {
            $log = [
                'ip_address' => '10.'.$ip_2[rand(0, count($ip_2)-1)].'.'.rand(1,64).'.'.rand(1,254),
                'asset_name' => '10.'.$ip_2[rand(0, count($ip_2)-1)].'.'.rand(1,64).'.'.rand(1,254),
                'os' => $os[rand(0, count($os)-1)],
                'cvss' => '0.0',
                'vulnerabilities' => '0',
                'services' => rand(0,2),
                'last_user' => $users[rand(0, count($users)-1)],
                'last_seen' => date('Y-m-d H:i:s',strtotime('-'.rand(3,10).' days')),
            ];

            $builder = $this->db->table($this->DBPrefix . 'assets');
            $builder->insert($log);
            // return $log;
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
