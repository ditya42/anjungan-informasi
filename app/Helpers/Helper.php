<?php

namespace App\Helpers;

use App\Model\Tag;
use App\Model\UserLog;
use App\Model\Setting;
use DateTime;
use Harimayco\Menu\Facades\Menu;
use Harimayco\Menu\Models\Menus;
use Harimayco\Menu\Models\MenuItems;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Helper
{
    public static function makeSlug($normal, $model)
    {
        $slug = strtolower(str_replace(' ', '-', str_replace('/', '-', $normal)));
        if ($model) {
            $cek = $model->where('slug', $slug)->orderBy('created_at', 'DESC')->first();
            if ($cek) {
                $slug .= "-" . ($cek->id + 1);
            }
        }
        return $slug;
    }

    public static function getMyIP()
    {
      $ipaddress = '';
      if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
      else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
      else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
      else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
      else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
      else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
      else
        $ipaddress = 'UNKNOWN';
      return $ipaddress;
    }

    public static function getIpDetail($ip)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://ipinfo.io/{$ip}/json");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        return [
            'ip'=>$ip,
            'ip_detail'=>$output
        ];
    }

    public static function addUserLog($description,$ip = null)
    {

        if($ip == null){
            $ip = Helper::getMyIP();
        }


        UserLog::create([
            'description'=>$description,
            'user_id'=>Auth::user()->id,
            'ip'=>$ip,
            'ip_detail'=>Helper::getIpDetail($ip)['ip_detail']
        ]);
    }

    public static function listMenu(){
      $setting = Setting::where('setting_name','main_menu')->first();
      if($setting){
          $menus = Menus::find($setting->id)->items->toArray();
          return $menus;
      }
      return null;
    }
}
