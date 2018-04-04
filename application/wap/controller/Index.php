<?php
namespace app\wap\controller;
use app\wap\model\createtable;
use think\Db;
use think\mongo;
use think\Controller;
use MongoDB\Driver\Manager;
use think\Collection;
class Index extends Controller
{
    public function index()
    {
/*
 * 调用createtable::getTables('weight')获取当前数据库中表的数量
 * 参数为你要查询的数据库
 */
//        createtable::getTables('weight');
/*
 * 调用createtable::index($i)建表
 * 参数为表后缀数字
 */
//        for($i=6;$i<=100;$i++){
//            createtable::index(1);
//        }
/*
 * 调用createtable::getLimits()获取所有记录条数
 * floor($limits%10000000)获取当前用户操作的表数字后缀
 */
//       $limits=createtable::getLimits();
//        floor($limits%1000000);
/*
 * 压缩数组数据为字符串
 */
//       echo serialize(array('name'=>'gg','pwd'=>'ssssssss'));
//       var_dump(unserialize(serialize(array('name'=>'gg','pwd'=>'ssssssss'))));
/*
 * 调用createtable::int($data)添加数据或更新数据
 * 返回0为更新数据
 * 返回1为新增数据
 */
//         $data=[
//             'id'=>null,
//             'user_id'=>1,
//             'weight'=>47,
//             'fat'=>20,
//             'waist'=>80,
//             'visceral'=>20,
//             'water'=>20,
//             'load_time'=>time(),
//             'blood_fat'=>20,
//             'blood_sugar'=>20,
//             'blood_pressure'=>20,
//         ];
//       var_dump(createtable::int($data,1));
//        $mongo=Db::connect('db_mongo');
//          $data=Db::name('users')->find();
//        var_dump($data);
       echo  11111111;
    }
    public function int(){

    }
}
