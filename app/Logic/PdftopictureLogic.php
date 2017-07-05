<?php
/**
 * Created by PhpStorm.
 * User: yao
 * Date: 17/7/5
 * Time: 下午3:11
 */

namespace App\Logic;

use function dd;
use const false;
use Orbitale\Component\ImageMagick\Command;
use function print_r;
use function var_dump;

class PdftopictureLogic
{
    public static function pdftopicture1()
    {
        $command=new Command();
        $response=$command->convert('/Users/yao/Downloads/interpy-zh-v1.1.pdf')->file('/Users/yao/Downloads/interpy.jpg',false)->run();

        var_dump($response->getProcess());
        if ($response->hasFailed()) {
            // If it has not failed, then we simply send it to the buffer
           dd('failed');
        }
        print_r('success');
    }

    public static function pdftopicture()
    {
        $PDF='/Users/yao/Downloads/interpy-zh-v1.1.pdf';
        $Path='/Users/yao/Downloads';
        $IM = new imagick();
        $IM->setResolution(120,120);
        $IM->setCompressionQuality(100);
        $IM->readImage();
        foreach ($IM as $Key => $Var){
            $Var->setImageFormat('png');
            $Filename = $Path.'/'.md5($Key.time()).'.png';
            if($Var->writeImage($Filename) == true){
                $Return[] = $Filename;
            }
        }
        dd($Return);
    }
}