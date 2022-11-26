<?php
/**
 *
 *
 * @author mingyue
 * @created 2022/11/26 16:29:15
 */
class Water 
{
    protected $water;
    // 构造函数
    public function __construct(string $image)
    {
        $this ->water = $image;
    }

    public function make(string $image,string $filename = null,int $pos)
    {
        $this->checkImage($image);
        
        $res = $this->resource($image);
        $water = $this->resource($this->water);
        $pos = $this->position($res,$water,$pos);
        imagecopy($res,$water,$pos['x'],$pos['y'],0,0,imagesx($water),imagesy($water));
        $this ->showAction($image)($res,$filename ?? $image);
        // var_dump($res);
        // 页面输出图片
        // header('Content-type:image/jpg');
        // return $this->showAction($image)($res);
    }

    // 检测文件是否是图片
    protected function checkImage(string $image)
    {
        if(!is_file($image) || getimagesize($image) === false){
            throw new Exception('file is not image');
        }
    }

    // 动态生成图片
    protected function showAction(string $image)
    {
        $info = getimagesize($image);
        $functions = [1 => 'imagegif',2 => 'imagejpeg',3 => 'imagepng'];
        return $functions[$info[2]];
    }

    // 根据图片生成资源
    protected function resource(string $image)
    {
        $info = getimagesize($image);
        $functions = [1=>'imagecreatefromgif',2=>'imagecreatefromjpeg',3=>'imagecreatefrompng'];
        $call = $functions[$info[2]];
        return $call($image);
    }

    // 调整水印位置
    protected function position($res,$water,int $pos)
    {
        $info = ['x' => '20','y' => '20'];
        switch ($pos) {
            // 默认左边
            case 1:
                break;
            // 中间
            case 2:
                $info['x'] = (imagesx($res) - imagesy($water))/2 - 500;
                break;
            // 右边
            case 3:
                $info['x'] = (imagesx($res) - imagesx($water));
                break;

        }
        return $info;
    }
}
