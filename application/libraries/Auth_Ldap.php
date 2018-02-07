<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * This file is part of Auth_Ldap.
    Auth_Ldap is free software: you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.
    Auth_Ldap is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with Auth_Ldap.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
/**
 * Auth_Ldap Class
 *
 * Simple LDAP Authentication library for Code Igniter.
 *
 * @package         Auth_Ldap
 * @author          Greg Wojtak <gwojtak@techrockdo.com>
 * @version         0.6
 * @link            http://www.techrockdo.com/projects/auth_ldap
 * @license         GNU Lesser General Public License (LGPL)
 * @copyright       Copyright © 2010,2011 by Greg Wojtak <gwojtak@techrockdo.com>
 * @todo            Allow for privileges in groups of groups in AD
 * @todo            Rework roles system a little bit to a "auth level" paradigm
 */
class Auth_ldap {
    public function __construct() {
        $this->ci =& get_instance();
        log_message('debug', 'Auth_Ldap initialization commencing...');
        // Load the session library
        // $this->ci->load->library('session');
        // Load the configuration
        $this->ci->load->config('auth_ldap');
        // Load the language file
        // $this->ci->lang->load('auth_ldap');
        $this->_init();
    }

    private $bind;

    /**
     * @access private
     * @return void
     */
    private function _init() {
        // Verify that the LDAP extension has been loaded/built-in
        // No sense continuing if we can't
        if (! function_exists('ldap_connect')) {
            show_error('LDAP functionality not present.  Either load the module ldap php module or use a php with ldap support compiled in.');
            log_message('error', 'LDAP functionality not present in php.');
        }
        $this->hosts = $this->ci->config->item('hosts');
        $this->ports = $this->ci->config->item('ports');
        $this->basedn = $this->ci->config->item('basedn');
        $this->account_ou = $this->ci->config->item('account_ou');
        $this->login_attribute  = $this->ci->config->item('login_attribute');
        $this->name_attribute  = $this->ci->config->item('name_attribute');
        $this->use_ad = $this->ci->config->item('use_ad');
        $this->ad_domain = $this->ci->config->item('ad_domain');
        $this->proxy_user = $this->ci->config->item('proxy_user');
        $this->proxy_pass = $this->ci->config->item('proxy_pass');
        $this->roles = $this->ci->config->item('roles');
        $this->auditlog = $this->ci->config->item('auditlog');
        $this->member_attribute = $this->ci->config->item('member_attribute');
    }

    /**
     * @access public
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function login($username, $password) {
        /*
         * For now just pass this along to _authenticate.  We could do
         * something else here before hand in the future.
         */

        $user_info = $this->_authenticate($username,$password);
        if(empty($user_info['cn']))
        {
            $this->_audit("Failure login: ".$user_info['cn']."(".$username.") from ".$this->ci->input->ip_address());
            log_message('info', $username." has no registered.");
            show_error($username.' unsuccssfully authenticated.');
        }

        if(empty($user_info['role']))
        {
            log_message('info', $username." has no role to play.");
            show_error($username.' succssfully authenticated, but is not allowed because the username was not found in an allowed access group.');
        }
        // Record the login
        $this->_audit("Successful login: ".$user_info['cn']."(".$username.") from ".$this->ci->input->ip_address());
        // Set the session data
        $customdata = array('username' => $username,
                            'cn' => $user_info['cn'],
                            'role' => $user_info['role'],
                            'displayname' => $user_info['displayname'],
                            'middlename' => $user_info['middlename'],
                            'division' => $user_info['division'],
                            'department' => $user_info['department'],
                            'primarytelexnumber' => $user_info['primarytelexnumber'],
                            'telephonenumber' => $user_info['telephonenumber'],
                            // 'photo' => $user_info['photo'],
                            'mail' => $user_info['mail'],
                            'position' => $user_info['position'],
                            'division_fullname' => $user_info['position'],
                            'distinguishedname' => $user_info['distinguishedname'],
                            'logged_in' => TRUE );

        $this->_audit($customdata['username']);
        $this->ci->session->set_userdata($customdata);

        return TRUE;
    }


    public function sudo_login($username) {
       /*
        * For now just pass this along to _authenticate.  We could do
        * something else here before hand in the future.
        */

       $user_info = $this->_sudo_authenticate($username);
       if(empty($user_info['cn']))
       {
           $this->_audit("Failure login: ".$user_info['cn']."(".$username.") from ".$this->ci->input->ip_address());
           log_message('info', $username." has no registered.");
           show_error($username.' unsuccssfully authenticated.');
       }

       if(empty($user_info['role']))
       {
           log_message('info', $username." has no role to play.");
           show_error($username.' succssfully authenticated, but is not allowed because the username was not found in an allowed access group.');
       }
       // Record the login
       $this->_audit("Successful login: ".$user_info['cn']."(".$username.") from ".$this->ci->input->ip_address());
       // Set the session data

       $user_info['role']['intranet-webmaster'] = true;
       $customdata = array('username' => $username,
                           'cn' => $user_info['cn'],
                           'role' => $user_info['role'],
                           'displayname' => $user_info['displayname'],
                           'middlename' => $user_info['middlename'],
                           'division' => $user_info['division'],
                           'department' => $user_info['department'],
                           'primarytelexnumber' => $user_info['primarytelexnumber'],
                           'telephonenumber' => $user_info['telephonenumber'],
                           // 'photo' => $user_info['photo'],
                           'mail' => $user_info['mail'],
                           'position' => $user_info['position'],
                           'division_fullname' => $user_info['position'],
                           'distinguishedname' => $user_info['distinguishedname'],
                           'logged_in' => TRUE
                        );

       $this->_audit($customdata['username']);
       $this->ci->session->set_userdata($customdata);

       return TRUE;
    }



    /**
     * @access public
     * @return bool
     */
    public function is_authenticated()
    {
        if($this->ci->session->userdata('logged_in'))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * @access public
     */
    public function logout() {
        // Just set logged_in to FALSE and then destroy everything for good measure
        $this->ci->session->set_userdata(array('logged_in' => FALSE));
        $this->ci->session->sess_destroy();
    }
    /**
     * @access private
     * @param string $msg
     * @return bool
     */
    private function _audit($msg){
        $date = date('Y/m/d H:i:s');
        if( ! file_put_contents($this->auditlog, $date.": ".$msg."\n",FILE_APPEND)) {
            log_message('info', 'Error opening audit log '.$this->auditlog);
            return FALSE;
        }
        return TRUE;
    }

    // $mode 1 is username   2 is F&L name
    public function get_info($username, $mode=1, $full=false)
    {
        $needed_attrs = array('dn', 'cn', $this->login_attribute);

        foreach($this->hosts as $host) {
          $this->ldapconn = ldap_connect($host);
          if($this->ldapconn)
          {
             break;
          }
          else
          {
              log_message('info', 'Error connecting to '.$uri);
          }
        }
        // At this point, $this->ldapconn should be set.  If not... DOOM!
        if(! $this->ldapconn)
        {
            log_message('error', "Couldn't connect to any LDAP servers.  Bailing...");
            show_error('Error connecting to your LDAP server(s).  Please check the connection and try again.');
        }
        // We've connected, now we can attempt the login...

        // These to ldap_set_options are needed for binding to AD properly
        // They should also work with any modern LDAP service.
        ldap_set_option($this->ldapconn, LDAP_OPT_REFERRALS, 0);
        ldap_set_option($this->ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

        // Find the DN of the user we are binding as
        // If proxy_user and proxy_pass are set, use those, else bind anonymously
        if($this->proxy_user)
        {
          $bind = ldap_bind($this->ldapconn, $this->proxy_user, $this->proxy_pass);
        }
        else
        {
          $bind = ldap_bind($this->ldapconn);
        }
        if(!$bind)
        {
          log_message('error', 'Unable to perform anonymous/proxy bind');
          show_error('Unable to bind for user id lookup');
        }
        log_message('debug', 'Successfully bound to directory.  Performing dn lookup for '.$username);

        if($mode==1)
        {
          $filter = '('.$this->login_attribute.'='.$username.')';
        }
        else
        {
          $filter = '('.$this->name_attribute.'='.$username.')';
        }




        if($full)
        {
          $search = ldap_search($this->ldapconn, $this->basedn, $filter);
          $entries = ldap_get_entries($this->ldapconn, $search);
          if(isset($entries[0]))
          {
            return $entries[0];
          }
          else
          {
            $this->_audit("Failure login : ".$username." from ".$_SERVER['REMOTE_ADDR']);
            return FALSE;
          }
        }

        $attr = array("cn", "initials", "samaccountname", "employeeid", "description", "comment", "physicaldeliveryofficename", "mail", "ipphone", "mobile", "distinguishedname", "memberof", "givenname", "displayname", "middlename", "division", "thumbnailphoto", "department", "telephonenumber", "primarytelexnumber");


        $search = ldap_search($this->ldapconn, $this->basedn, $filter, $attr);

        $entries = ldap_get_entries($this->ldapconn, $search);
        if(isset($entries[0]))
        {
          $binddn = $entries[0]['dn'];
        }
        else
        {
          $this->_audit("Failure login : ".$username." from ".$_SERVER['REMOTE_ADDR']);
          return FALSE;
        }

        $cn = $entries[0]['cn'][0];
        $dn = stripslashes($entries[0]['dn']);
        $id = $entries[0][$this->login_attribute][0];
        $get_role_arg = $id;
        //position??
        if(isset($entries[0]['distinguishedname']))
        {
          $position = $entries[0]['distinguishedname'][0];
          $position = substr($position, strpos($position,',OU=')+4);
          $position = substr($position, 0, strpos($position,',OU='));
        }
        else
        {
          $position = '-';
        }
        return array(
          'cn' => $cn,
          'dn' => $dn,
          'id' => $id,
          'displayname' => $entries[0]['displayname'][0],
          'middlename' => isset($entries[0]['middlename'])?$entries[0]['middlename'][0]:'-',
          'division' => isset($entries[0]['division'])?$entries[0]['division'][0]:'-',
          'department' => isset($entries[0]['department'])?$entries[0]['department'][0]:'-',
          'telephonenumber' => isset($entries[0]['telephonenumber'])?$entries[0]['telephonenumber'][0]:'-',
          'primarytelexnumber' => isset($entries[0]['primarytelexnumber'])?$entries[0]['primarytelexnumber'][0]:'-',
          'mail' => isset($entries[0]['mail'])?$entries[0]['mail'][0]:'-',
          'photo' => isset($entries[0]['thumbnailphoto'])?$entries[0]['thumbnailphoto'][0]:'-',
          'position' => $position,
          'role' => $this->_get_role($get_role_arg)
        );
    }

    /**
     * @access private
     * @param string $username
     * @param string $password
     * @return array
     */
    private function _authenticate($username, $password)
    {
        $needed_attrs = array('dn', 'cn', $this->login_attribute);

        foreach($this->hosts as $host) {
          $this->ldapconn = ldap_connect($host);
          if($this->ldapconn)
          {
             break;
          }
          else
          {
              log_message('info', 'Error connecting to '.$uri);
          }
        }
        // At this point, $this->ldapconn should be set.  If not... DOOM!
        if(! $this->ldapconn)
        {
            log_message('error', "Couldn't connect to any LDAP servers.  Bailing...");
            show_error('Error connecting to your LDAP server(s).  Please check the connection and try again.');
        }
        // We've connected, now we can attempt the login...

        // These to ldap_set_options are needed for binding to AD properly
        // They should also work with any modern LDAP service.
        ldap_set_option($this->ldapconn, LDAP_OPT_REFERRALS, 0);
        ldap_set_option($this->ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

        // Find the DN of the user we are binding as
        // If proxy_user and proxy_pass are set, use those, else bind anonymously
        if($this->proxy_user)
        {
          $bind = ldap_bind($this->ldapconn, $this->proxy_user, $this->proxy_pass);
        }
        else
        {
          $bind = ldap_bind($this->ldapconn);
        }
        if(!$bind)
        {
          log_message('error', 'Unable to perform anonymous/proxy bind');
          show_error('Unable to bind for user id lookup');
        }
        log_message('debug', 'Successfully bound to directory.  Performing dn lookup for '.$username);
        $filter = '('.$this->login_attribute.'='.$username.')';

        $attr = array("cn", "initials", "samaccountname", "employeeid", "description", "comment", "physicaldeliveryofficename", "mail", "ipphone", "mobile", "distinguishedname", "memberof", "givenname", "displayname", "middlename", "division", "thumbnailphoto", "department", "telephonenumber", "primarytelexnumber");


        // $search = ldap_search($this->ldapconn, $this->basedn, $filter,
        //         array('dn', $this->login_attribute, 'cn'));

        if($username==''||$password=='')
        {
          $this->_audit("Failure login : username or password is blank from ".$_SERVER['REMOTE_ADDR']);
          show_error('username or password is blank');
          return FALSE;
        }
        $search = ldap_search($this->ldapconn, $this->basedn, $filter, $attr);

        $entries = ldap_get_entries($this->ldapconn, $search);
        if(isset($entries[0]))
        {
          $binddn = $entries[0]['dn'];
        }
        else
        {
          $this->_audit("Failure login : ".$username." from ".$_SERVER['REMOTE_ADDR']);
          return FALSE;
        }

        // Now actually try to bind as the user
        $bind = @ldap_bind($this->ldapconn, $binddn, $password);

        if(!$bind)
        {
          $this->_audit("Failure login attempt: ".$username." =>wrong password from ".$_SERVER['REMOTE_ADDR']);
          return FALSE;
        }


        $cn = $entries[0]['cn'][0];
        $dn = stripslashes($entries[0]['dn']);
        $id = $entries[0][$this->login_attribute][0];
        $get_role_arg = $id;
        //position??
        $position = $entries[0]['distinguishedname'][0];
        $position = substr($position, strpos($position,',OU=')+4);
        $position = substr($position, 0, strpos($position,',OU='));
        return array(
          'cn' => $cn,
          'dn' => $dn,
          'id' => $id,
          'displayname' => isset($entries[0]['displayname'][0])?$entries[0]['displayname'][0]:'',
          'middlename' => isset($entries[0]['middlename'][0])?$entries[0]['middlename'][0]:'',
          'division' => isset($entries[0]['division'][0])?$entries[0]['division'][0]:'',
          'department' => isset($entries[0]['department'][0])?$entries[0]['department'][0]:'',
          'telephonenumber' => isset($entries[0]['telephonenumber'][0])?$entries[0]['telephonenumber'][0]:'',
          'primarytelexnumber' => isset($entries[0]['primarytelexnumber'][0])?$entries[0]['primarytelexnumber'][0]:'',
          'mail' => isset($entries[0]['mail'][0])?$entries[0]['mail'][0]:'',
          'photo' => isset($entries[0]['thumbnailphoto'][0])?$entries[0]['thumbnailphoto'][0]:'',
          'position' => $position,
          'distinguishedname' => isset($entries[0]['distinguishedname'][0])?$entries[0]['distinguishedname'][0]:'',
          'role' => $this->_get_role($get_role_arg)
        );
    }



    private function _sudo_authenticate($username)
    {
       $needed_attrs = array('dn', 'cn', $this->login_attribute);

       foreach($this->hosts as $host) {
         $this->ldapconn = ldap_connect($host);
         if($this->ldapconn)
         {
            break;
         }
         else
         {
             log_message('info', 'Error connecting to '.$uri);
         }
       }
       // At this point, $this->ldapconn should be set.  If not... DOOM!
       if(! $this->ldapconn)
       {
           log_message('error', "Couldn't connect to any LDAP servers.  Bailing...");
           show_error('Error connecting to your LDAP server(s).  Please check the connection and try again.');
       }
       // We've connected, now we can attempt the login...

       // These to ldap_set_options are needed for binding to AD properly
       // They should also work with any modern LDAP service.
       ldap_set_option($this->ldapconn, LDAP_OPT_REFERRALS, 0);
       ldap_set_option($this->ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

       // Find the DN of the user we are binding as
       // If proxy_user and proxy_pass are set, use those, else bind anonymously
       if($this->proxy_user)
       {
         $bind = ldap_bind($this->ldapconn, $this->proxy_user, $this->proxy_pass);
       }
       else
       {
         $bind = ldap_bind($this->ldapconn);
       }
       if(!$bind)
       {
         log_message('error', 'Unable to perform anonymous/proxy bind');
         show_error('Unable to bind for user id lookup');
       }
       log_message('debug', 'Successfully bound to directory.  Performing dn lookup for '.$username);
       $filter = '('.$this->login_attribute.'='.$username.')';

       $attr = array("cn", "initials", "samaccountname", "employeeid", "description", "comment", "physicaldeliveryofficename", "mail", "ipphone", "mobile", "distinguishedname", "memberof", "givenname", "displayname", "middlename", "division", "thumbnailphoto", "department", "telephonenumber", "primarytelexnumber");


       // $search = ldap_search($this->ldapconn, $this->basedn, $filter,
       //         array('dn', $this->login_attribute, 'cn'));

       if($username=='')
       {
         $this->_audit("Failure login : username or password is blank from ".$_SERVER['REMOTE_ADDR']);
         show_error('username or password is blank');
         return FALSE;
       }
       $search = ldap_search($this->ldapconn, $this->basedn, $filter, $attr);

       $entries = ldap_get_entries($this->ldapconn, $search);
       if(isset($entries[0]))
       {
         $binddn = $entries[0]['dn'];
       }
       else
       {
         $this->_audit("Failure login : ".$username." from ".$_SERVER['REMOTE_ADDR']);
         return FALSE;
       }



       $cn = $entries[0]['cn'][0];
       $dn = stripslashes($entries[0]['dn']);
       $id = $entries[0][$this->login_attribute][0];
       $get_role_arg = $id;
       //position??
       $position = $entries[0]['distinguishedname'][0];
       $position = substr($position, strpos($position,',OU=')+4);
       $position = substr($position, 0, strpos($position,',OU='));
       return array(
         'cn' => $cn,
         'dn' => $dn,
         'id' => $id,
         'displayname' => isset($entries[0]['displayname'][0])?$entries[0]['displayname'][0]:'',
         'middlename' => isset($entries[0]['middlename'][0])?$entries[0]['middlename'][0]:'',
         'division' => isset($entries[0]['division'][0])?$entries[0]['division'][0]:'',
         'department' => isset($entries[0]['department'][0])?$entries[0]['department'][0]:'',
         'telephonenumber' => isset($entries[0]['telephonenumber'][0])?$entries[0]['telephonenumber'][0]:'',
         'primarytelexnumber' => isset($entries[0]['primarytelexnumber'][0])?$entries[0]['primarytelexnumber'][0]:'',
         'mail' => isset($entries[0]['mail'][0])?$entries[0]['mail'][0]:'',
         'photo' => isset($entries[0]['thumbnailphoto'][0])?$entries[0]['thumbnailphoto'][0]:'',
         'position' => $position,
         'distinguishedname' => isset($entries[0]['distinguishedname'][0])?$entries[0]['distinguishedname'][0]:'',
         'role' => $this->_get_role($get_role_arg)
       );
    }



    /**
     * @access private
     * @param string $str
     * @param bool $for_dn
     * @return string
     */
    private function ldap_escape($str, $for_dn = false)
    {
        /**
         * This function courtesy of douglass_davis at earthlink dot net
         * Posted in comments at
         * http://php.net/manual/en/function.ldap-search.php on 2009/04/08
         */
        // see:
        // RFC2254
        // http://msdn.microsoft.com/en-us/library/ms675768(VS.85).aspx
        // http://www-03.ibm.com/systems/i/software/ldap/underdn.html

        if  ($for_dn)
            $metaChars = array(',','=', '+', '<','>',';', '\\', '"', '#');
        else
            $metaChars = array('*', '(', ')', '\\', chr(0));
        $quotedMetaChars = array();
        foreach ($metaChars as $key => $value) $quotedMetaChars[$key] = '\\'.str_pad(dechex(ord($value)), 2, '0');
        $str=str_replace($metaChars,$quotedMetaChars,$str); //replace them
        return ($str);
    }

    /**
     * @access private
     * @param string $username
     * @return int
     */
    private function _get_role($username) {

        $filter = '('.$this->login_attribute.'='.$username.')';
        $search = ldap_search($this->ldapconn, $this->basedn, $filter, array($this->member_attribute));
        if(! $search )
        {
            log_message('error', "Error searching for group:".ldap_error($this->ldapconn));
            show_error('Couldn\'t find groups: '.ldap_error($this->ldapconn));
        }
        $results = ldap_get_entries($this->ldapconn, $search);

        if( isset($results[0][$this->member_attribute])
            && $results[0][$this->member_attribute]['count'] != 0 )
        {

          $results = $results[0][$this->member_attribute];
          for($i = 0; $i < $results['count']; $i++)
          {
            // echo "<h3>{$i} : {$results[$i]}</h3>";
            $arr_row = explode(",", $results[$i]);
            $k_ = '';
            $v_ = array();
            foreach ($arr_row as $value)
            {
              if(substr($value,0,2)=='CN')
              {
                $k_ = strtolower(substr($value,3));
              }
              if(substr($value,0,2)=='OU')
              {
                $v_[] = substr($value,3);
              }
              // if($k_==='all')
              // {
              //   $memberof_[ $k_ ] = $v_[0];
              // }
              if($k_!=='')
              {
                $memberof_[ $k_ ] = true;
              }
            }

          }
          return $memberof_;

        }
        return false;
    }


    public function check_permission($method)
    {
      if(!$this->is_authenticated())
      {
        return false;
      }
      $result = false;
      switch ($method) {
        case 'domain':
          if(strtolower($this->row()->division)==='ie')
          {
            $result = true;
          }
          break;

        default:
          # code...
          break;
      }
      return $result;
    }

    public function row()
    {
      // if(!$this->is_authenticated())
      // {
      //   return false;
      // }
      return (object)$this->ci->session->all_userdata();
    }


    public function get_member($objClass='group', $name='', $filter_ou = '')
    {



        $this->_init_ldap();

        log_message('debug', 'Successfully bound to directory. Performing dn lookup for '.$name);
        // $filter = '(CN='.$name.')';
        if($objClass=='user')
        {
          $filter = '(&(objectclass=user)(objectcategory=person)(cn=*'.$name.'*))';
        }
        else
        {
          $filter = '(&(objectclass=group)(cn='.$name.'))';
        }

        // $justthese = array("dn", "cn", 'employeeid');
        if($filter_ou=='')
        {
            $search = ldap_search($this->ldapconn, 'OU=NTT Users,dc=int,dc=ntt,dc=co,dc=th', $filter);
        }
        else
        {
            $search = ldap_search($this->ldapconn, $filter_ou, $filter);
        }
        $entries = ldap_get_entries($this->ldapconn, $search);

        // return $entries;

        if($objClass=='user')
        {
            $output = array();
            foreach ($entries as $key => $value)
            {
              $obj = new \stdClass();
              $obj->cn = count($value['cn'])>0?$value['cn'][0]:'-';
              // $obj->mail = isset($value['mail'])&&count($value['mail'])>0?$value['mail'][0]:'-';
              $obj->dn = isset($value['dn'])?$value['dn']:'-';
              $obj->mail = isset($value['mail'])&&count($value['mail'])>0?$value['mail'][0]:'-';
              $obj->middlename = isset($value['middlename'])&&count($value['middlename'])>0?$value['middlename'][0]:'';
              $obj->department = isset($value['department'])&&count($value['department'])>0?$value['department'][0]:'';
              $obj->employeeid = isset($value['employeeid'])&&count($value['employeeid'])>0?$value['employeeid'][0]:'-';
              if($obj->employeeid!='-')
              {
                $output[$obj->employeeid] = $obj;
              }
            }
            return $output;
        }
        else
        {
            // return $entries;
            // member
            $output = array();
            foreach ($entries[0]['member'] as $key => $value)
            {
              $name = $this->get_string_between($value, 'CN=', ',OU=');
              if($name!='')
              {
                $output[$name] = $name;
              }
            }
            return $output;
        }

    }

    public function get_member_dept($filter_ou)
    {

        $this->_init_ldap();
        log_message('debug', 'Successfully bound to directory. Performing dn lookup for '.$filter_ou);
        $filter = '(&(objectclass=user)(objectcategory=person))';
        $justthese = array('dn', 'cn', 'mail', 'employeeid');
        $search = ldap_search($this->ldapconn, $filter_ou, $filter, $justthese);
        $entries = ldap_get_entries($this->ldapconn, $search);

        $output = array();
        foreach ($entries as $key => $value)
        {
          $obj = new \stdClass();
          $obj->cn = count($value['cn'])>0?$value['cn'][0]:'-';
          $obj->mail = isset($value['mail'])&&count($value['mail'])>0?$value['mail'][0]:'-';
          $obj->dn = isset($value['dn'])?$value['dn']:'-';
          $obj->employeeid = isset($value['employeeid'])&&count($value['employeeid'])>0?$value['employeeid'][0]:'-';
          if($obj->employeeid!='-')
          {
            $output[$obj->cn] = $obj;
          }
        }
        return $output;

    }


    // $mode 1 is F&L name ,   2 is username
    public function get_detail_member($name='',$mode=1)
    {

        $this->_init_ldap();
        log_message('debug', 'Successfully bound to directory. Performing dn lookup for '.$name);
        if($mode==1)
        {
          $filter = '('.$this->name_attribute.'='.$name.')';
        }
        else
        {
          $filter = '('.$this->login_attribute.'='.$name.')';
        }
        $search = ldap_search($this->ldapconn, $this->basedn, $filter);
        $entries = ldap_get_entries($this->ldapconn, $search);

        // echo '<pre>';print_r($entries);echo '</pre>';
        // echo count($entries);

        if($entries['count']==1)
        {
          return $entries[0];
        }
        if($entries['count']>1)
        {
          return $entries;
        }
        return array();
    }


    private function get_string_between($string, $start, $end)
    {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    private function _init_ldap()
    {

        foreach($this->hosts as $host)
        {
          $this->ldapconn = ldap_connect($host);
          if($this->ldapconn)
          {
             break;
          }
          else
          {
              log_message('info', 'Error connecting to '.$uri);
          }
        }
        if(!$this->ldapconn)
        {
            log_message('error', "Couldn't connect to any LDAP servers.  Bailing...");
            show_error('Error connecting to your LDAP server(s).  Please check the connection and try again.');
        }
        // We've connected, now we can attempt the login...

        // These to ldap_set_options are needed for binding to AD properly
        // They should also work with any modern LDAP service.
        ldap_set_option($this->ldapconn, LDAP_OPT_REFERRALS, 0);
        ldap_set_option($this->ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

        // Find the DN of the user we are binding as
        // If proxy_user and proxy_pass are set, use those, else bind anonymously
        if($this->proxy_user)
        {
          $this->bind = ldap_bind($this->ldapconn, $this->proxy_user, $this->proxy_pass);
        }
        else
        {
          $this->bind = ldap_bind($this->ldapconn);
        }
        if(!$this->bind)
        {
          log_message('error', 'Unable to perform anonymous/proxy bind');
          show_error('Unable to bind for user id lookup');
        }

    }

}
?>
