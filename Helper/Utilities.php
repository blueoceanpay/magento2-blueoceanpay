<?php

namespace BlueOcean\BlueOceanPay\Helper;

class Utilities extends \Magento\Framework\App\Helper\AbstractHelper
{

    public function generateIdLog()
    {
        $vars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $stringLength = strlen($vars);
        $result = '';
        for ($i = 0; $i < 20; $i++) {
            $result .= $vars[rand(0, $stringLength - 1)];
        }
        return $result;
    }


    /**
     * 以post方式提交请求
     * @param string $url
     * @param array|string $data
     * @return bool|mixed
     */
    public function httpPost($url, $data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        if (is_array($data)) {
            foreach ($data as &$value) {
                if (is_string($value) && stripos($value, '@') === 0 && class_exists('CURLFile', false)) {
                    $value = new CURLFile(realpath(trim($value, '@')));
                }
            }
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $data = curl_exec($ch);
        curl_close($ch);
        if ($data) {
            return $data;
        }
        return false;
    }

    /**
     * 数组数据签名
     * @param array $data 参数
     * @param string $key 密钥
     * @return string 签名
     */
    public function sign($data, $key) {
        if (isset($data['sign'])) unset($data['sign']);
        ksort($data);
        $uri = http_build_query($data);
        $uri = $uri . '&key=' . $key;
        return strtoupper(md5($uri));
    }

    /**
     * 生成随机字符串
     * @param $length
     * @return null|string
     */
    public function getRandChar($length) {
        $str = null;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol) - 1;

        for ($i = 0; $i < $length; $i++) {
            $str .= $strPol[rand(0, $max)];
        }
        return $str;
    }


}
