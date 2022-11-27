<?php
abstract class Query{
    abstract protected function record(array $data);
    public function select(){}
}
class Model extends Query{
    protected $file = [];
    protected function record($data){}
}