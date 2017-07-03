<?php
namespace App\Logic;
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17-7-4
 * Time: 上午1:26
 */
class JobLogic
{
    public static function beforetestjob()
    {
        \Log::info('before task');
    }
    public static function aftertestjob()
    {
        \Log::info('after task');
    }
}