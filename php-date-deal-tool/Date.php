<?php
/*
 * description：
 * author：wh
 * email：
 * createTime：{2020/10/27} {11:43} 
 */

namespace wanghua\php_date_deal_tool;

/**
 * 日期时间处理类
 * Class Date
 * @package libraries
 */
class Date
{
    //时间默认返回格式
    public $date_format = 'Y-m-d H:i:s';
    //分、时、天、周、月、年
    protected $data_type = ['m'=>'minute', 'h'=>'hour', 'd'=>'day', 'w'=>'week', 'M'=>'month', 'y'=>'year'];
    //秒、分、时、天
    protected $time_type = ['s'=>1, 'm'=>60, 'h'=>3600, 'd'=>86400];
    /**
     * desc：日期时间加N
     * author：wh
     * @param int $times 相加的时间数量 整型
     * @param string $date_type 要相加的时间类型 可选值：m 分钟；h 小时；d 天；w 周；M 月；y 年
     * @param int $default_time 时间戳，默认当前时间
     * @return false|string 返回$this->date_format格式，可根据需要设定格式
     */
    function addTime(int $times, string $date_type, int $default_time=0){
        return date($this->date_format, strtotime("+{$times} {$this->data_type[$date_type]}", $default_time?$default_time:time()));
    }

    /**
     * desc：日期时间减N
     * author：wh
     * @param int $times 减去的时间数量 整型
     * @param string $date_type 要相加的时间类型 可选值：m 分钟；h 小时；d 天；w 周；M 月；y 年
     * @param int $default_time 时间戳，默认当前时间
     * @return false|string 返回$this->date_format格式，可根据需要设定格式
     */
    function reduceTime(int $times, string $date_type, int $default_time=0){
        return date($this->date_format, strtotime("-{$times} {$this->data_type[$date_type]}", $default_time?$default_time:time()));
    }

    /**
     * desc：日期时间相减，通常结束时间大于开始时间
     * author：wh
     * @param string $end_time 结束时间
     * @param string $start_time 开始时间
     * @param string $return_type 日期时间相减后得到的时间类型，可能是小数。可选值：s 秒；m 分钟；h 小时；d；天
     * @return float|int 返回计算后的天、时、分、秒数
     */
    function timeReduceTime(string $end_time, string $start_time, string $return_type='s'){
        return (strtotime($end_time) - strtotime($start_time)) / $this->time_type[$return_type];
    }
}