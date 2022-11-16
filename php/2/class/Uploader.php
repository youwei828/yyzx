<?php
class Uploader
{
    protected $dir;
    public function make():array
    {
        $this->makeDir();
        $files = $this->format();
        // print_r($files);
        $saveFiles = [];
        foreach($files as $file){
            if(is_uploaded_file($file['tmp_name'])){
                $to =$this->dir.'/'. time().mt_rand(0,999).'.'.pathinfo($file['name'])['extension'];
                if(move_uploaded_file($file['tmp_name'],$to)){
                    $saveFiles[] = [
                        'path'=>$to,
                        'name'=>$file['name'],
                        'size'=>$file['size']
                    ];
                }
            }
        }
        return $saveFiles;
    }
    // 递归创建目录，包括父级目录
    private function makeDir():bool{
        $path = 'upload/'.date('y/m');
        $this->dir=$path;
        return is_dir($path) || mkdir($path,0755,true);
    }

    private function format(): array
    {
        $files  = [];
        foreach ($_FILES as $filed) {
            if(is_array($filed['name'])){
                foreach($filed['name'] as $id=>$f){
                    $files[] = [
                        'name'=>$filed['name'][$id],
                        'type'=>$filed['type'][$id],
                        'tmp_name'=>$filed['tmp_name'][$id],
                        'error'=>$filed['error'][$id],
                        'size'=>$filed['size'][$id],
                    ];
                }
            }else{
                $files[] = $filed;
            }
        }
        return $files;
    }
}