<?php

/**
 * [isExistRemoteImage 检测一张网络图片是否存在]
 * @author  ThinkBIM
 * @blog https://hub.thinkbim.cn
 * @version 1.0.0
 * @date    2023/3/31
 * @param string $url
 * @return bool
 */
if (!function_exists('isExistRemoteImage')) {
    function isExistRemoteImage(string $url, $isEmpty = true): bool
    {
        if (!empty($url)) {
            $content = get_headers($url, 1);
            if (isset($content[0]) && !empty($content[0])) {
                 return preg_match('/200/', $content[0]);
            }
        }
        return false;
    }
}

/**
 * [formatTime 格式化时间长]
 * @author  ThinkBIM
 * @blog https://hub.thinkbim.cn
 * @version 1.0.0
 * @date    2023/3/31
 * @param $time
 * @param $type
 * @return false|mixed|string
 */
if (!function_exists('formatTime')) {
    function formatTime($time, $type = null)
    {
        if (empty($time)) {
            return '';
        } else if ($type == 'ymd') {
            return date('Y-m-d', $time);
        } else if ($type == 'ymdh') {
            return date('Y-m-d H', $time);
        } else if ($type == 'ymdhi') {
            return date('Y-m-d H:i', $time);
        } else if ($type == 'ym') {
            return date('Y-m', $time);
        } else if ($type == 'md') {
            return date('m-d', $time);
        } else if ($type == 'mdhis') {
            return date('m-d H:i:s', $time);
        } else if ($type == 'ymdhis') {
            return date('Y-m-d H:i:s', $time);
        } else if ($type == 'his') {
            return date('H:i:s', $time);
        } else if ($type == 'yeshili') {
            $time = time() - $time;
            $year = floor($time / 60 / 60 / 24 / 365);
            $time -= $year * 60 * 60 * 24 * 365;
            $month = floor($time / 60 / 60 / 24 / 30);
            $time -= $month * 60 * 60 * 24 * 30;
            $week = floor($time / 60 / 60 / 24 / 7);
            $time -= $week * 60 * 60 * 24 * 7;
            $day = floor($time / 60 / 60 / 24);
            $time -= $day * 60 * 60 * 24;
            $hour = floor($time / 60 / 60);
            $time -= $hour * 60 * 60;
            $minute = floor($time / 60);
            $time -= $minute * 60;
            $second = $time;

            //这里修改读随机的.
            /*$hour = mt_rand(0,3);
            $minute = mt_rand(0,60);
            $second = mt_rand(0,60);*/
            $elapse = '';
            $unitArr = [
                '年' => 'year',
                '个月' => 'month',
                '周' => 'week',
                '天' => 'day',
                '小时' => 'hour',
                '分钟' => 'minute',
                '秒' => 'second'
            ];
            foreach ($unitArr as $cn => $u) {
                if ($$u > 0) {
                    $elapse = $$u . $cn;
                    break;
                }
            }
            $elapse = empty($elapse) ? '1秒' : $elapse;
            return $elapse . '前';
        } else {
            return $time;
        }
    }
}

