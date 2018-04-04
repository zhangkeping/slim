<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/28 0028
 * Time: 下午 5:25
 */
namespace app\wap\model;

use think\Db;
use think\Model;
class createtable extends Model{
    /*
     * 建表模型
     */
    public static function index($i){
        $weight=Db::connect('databaseweight');
        $sql="
 CREATE TABLE `slim_weight_".$i."` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL COMMENT '用户id',
 `weight` int(255) NOT NULL COMMENT '体重数据(单位kg)',
`fat` int(255) NOT NULL COMMENT '脂肪率(单位%)',
 `bust` int(255) NOT NULL COMMENT '胸围(单位cm)',
 `waist` int(255) NOT NULL COMMENT '腰围(单位cm)',
 `hipline` int(255) NOT NULL COMMENT '臀围(单位cm)',
`visceral` int(255) NOT NULL COMMENT '内脏脂肪(单位%)',
 `water` int(255) NOT NULL COMMENT '水分含量(单位%)',
`a` int(255) NOT NULL COMMENT '预留',
 `b` int(255) NOT NULL COMMENT '预留',
 `c` int(255) NOT NULL COMMENT '预留',
 `d` int(255) NOT NULL COMMENT '预留',
 `e` int(255) NOT NULL COMMENT '预留',
 PRIMARY KEY (`id`) ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='体重数据、减肥数据';
        ";
        return   $weight->query($sql);

    }
    /*
     * 获取数据库所有表个数
     */
    public static function getTables($base){
        $tables=Db::query("select TABLE_NAME from information_schema.tables where TABLE_SCHEMA='".$base."'");
        return count($tables);
    }
    /*
     * 获取所有表记录条数
     */
    public static function getLimits(){
        $weight=Db::connect('databaseweight');
        $sum=0;
        for($i=1;$i<=createtable::getTables('weight');$i++){
            $limits=$weight->name('weight_'.$i)->count();
            $sum+=$limits;
        }
        return $sum;
    }
    /*
     * 添加用户记录
     */
    public static function int($data,$user_id){
        $weight=Db::connect('databaseweight');
        $if=$weight->name('weight')
         ->where('user_id',$user_id)
         ->where("DATE_FORMAT(FROM_UNIXTIME(load_time), '%Y-%m-%d')",date('Y-m-d',time()))
         ->select();
        if(count($if)){
            $json=json_encode($if);//将以前的数据转json字符串存入mongodb
            $mongo=Db::connect('db_mongo')->name('weight')->insert($json);
            if(count($mongo)){
                $d=$weight->name('weight')->where('user_id',$if[0]['id'])->delete();
                if($d){
                    $weight->name('weight')->insert($data);
                    return 0;
                }
            }
        }else{
             $weight->name('weight')->insert($data);
            return 1;
        }
    }
}