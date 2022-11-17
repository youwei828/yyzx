<?php
class Captacha
{
    protected $height; 
    protected $width;
    protected $res;
    // 生成验证码的位数
    protected $len;
    // 最终验证码
    protected $code;
    
    // 构造函数是让用户自己输入宽高
    public function __construct(int $width= 100,int $height = 30,int $len = 5)
    {
        $this->width = $width;
        $this->height = $height;
        $this->len = $len;
    }
    public function render()
    {
        $this->res = imagecreatetruecolor($this->width,$this->height);
        $this->color();
        $this->line();
        $this->pix();
        $this->text();
        $this->show();
        return $this->code;
    }
    // 颜色
    protected function color()
    {
        $this->white = imagecolorallocate($this->res,255,255,255);
        $this->gray = imagecolorallocate($this->res,100,100,100);
    }
    // 生成随机颜色
    protected function randColor(){
        return imagecolorallocate($this->res,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
    }
    // 生成随机文字颜色
    protected function randTextColor(){
        return imagecolorallocate($this->res,mt_rand(0,100),mt_rand(0,100),mt_rand(0,100));
    }

    // 绘制验证码，但是验证码要放在点和线的上面
    protected function text(){
        $font = realpath('./siyuanheiti.otf');
        $text = 'abcdefghijklmnopqrstuvwxyz1234567890';
        for ($i=0; $i < $this->len; $i++) { 
            $this->code .= $code = strtoupper($text[mt_rand(0,strlen($text)-1)]);
            $angle = mt_rand(-20,20);
            $box = imagettfbbox(20,$angle,$font,'a');
            $x = $this->width/$this->len;
            imagettftext($this->res,
            20,
            mt_rand(-20,20),
            $x*$i,
            $this->height / 2 - ($box[7] - $box[0]) / 2,
            $this->randTextColor(),
            $font,
            $code);
        }
    }
    // 绘制干扰线
    protected function line()
    {
        for ($i=0; $i < 6; $i++) { 
            // 设置线条的粗细
            imagesetthickness($this->res,$i);
            imageline($this->res,
            mt_rand(0,$this->width),
            mt_rand(0,$this->height),
            mt_rand(0,$this->width),
            mt_rand(0,$this->height),
            $this->randColor()
        );
        }
    }
    // 绘制随机点
    protected function pix()
    {
        for ($i=0; $i < 200; $i++) { 
            imagesetpixel($this->res,mt_rand(0,$this->width),mt_rand(0,$this->height),$this->randColor());
        }
    }
    // 显示渲染
    protected function show()
    {
        header("Content-type:image/png");
        imagefill($this->res,0,0,$this->gray);
        imagepng($this->res);
    }
}