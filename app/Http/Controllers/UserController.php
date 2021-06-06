<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //

    /**
     * 添加用户信息
     * */
    public function add()
    {
        echo 1;
        die;
    }

    public function help()
    {
        return view('user.help');
    }

    public function test()
    {
        $redis = app('redis.connection');

        /*todo 入门操作*/
//        $redis->set('name',1);
//        dd($redis->get('name'));
//        $arr = [
//            'name1' => '1',
//            'name2' => '2',
//            'name3' => '3',
//        ];
//        $redis->mset($arr);
        //dd($redis->mget(array_keys($arr)));


        //不存在才设置 返回1 or 0
        //dd($redis->setnx('name4',123));

        //增长
        //$redis->incrBy('num',2);
        //dd($redis->get('num'));

        //检查是否存在
        //dd($redis->exists('num'));

        //dd($redis->del('num'));

        //追加
        //$redis->append('name1','haha');
        //dd($redis->get('name1'));

        //dd($redis->strlen('name1'));

        //模糊查找,有区别
        //dd($redis->keys('name*'));
        //dd($redis->keys('name?'));

        //设置有效期
        //$redis->expire('name1',30);
        //$redis->ttl('name1');

        /*TODO 队列操作*/
        //$redis->rpush('fooList','1');
        //$redis->rpush('fooList','2');
        //$redis->rpush('fooList','3');

        //dd($redis->llen('fooList'));

        //dd($redis->lindex('fooList',0)); //根据下标返回队列

        //$redis->lset('fooList',0,'1+1');

        //dd($redis->lpop('fooList')); //从左取队列
        //$redis->rpop('fooList') ;  // 右取队列

        //$redis->rpush('list1', 'ab0');
        //$redis->rpush('list1', 'ab1');
        //$redis->rpush('list2', 'ab2');
        //$redis->rpush('list2', 'ab3');

        //$redis->rpoplpush('list1', 'list2');  从list1右边取出放到list2左边

        /*TODO  set */

        //$redis->sadd('name','1');
        //$redis->sadd('name','2');
        //$redis->sadd('name','3');
        //$redis->sadd('name','3');

        //$redis->srem('name','3');

        //dd($redis->smembers('name'));  //返回set列表所有
        // array:2 [▼
        //  0 => "1"
        //  1 => "2"
        //]

        /*TODO 有序 zset*/
        //$redis->zadd('age',1,10);
        //$redis->zadd('age',3,13);
        //$redis->zadd('age',2,12);

        //dd($redis->zrange('age',0,1));  //返回位置 0 和 1 之间(两个)的元素
        //$redis->zrange('zset1', 0, -1); // 返回位置 0 和倒数第一个元素之间的元素(相当于所有元素)
        //dd($redis->zrange('zset1', 0, -1));// 返回位置 0 和倒数第一个元素之间的元素(相当于所有元素)

        /*todo hash 类别*/

        //$redis->hset('hash1','key1','val1');
        //$redis->hset('hash1','key2','val2');
        //$redis->hset('hash1','key3','val3');

        //dd($redis->hget('hash1','key3')); //根据下表获取

        //dd($redis->hexists('hash1','key3'));//查看是否存在

        //dd($redis->hdel('hash1','key2'));

        /*hsetnx 增加一个元素,但不能重复

        $redis->hsetnx('hash1', 'key1', 'v2') ;  // false  nb
        $redis->hsetnx('hash1', 'key2', 'v2') ;  // true*/









    }

    public function sql()
    {
        dd();
    }
}
