<?php
namespace Database;

use PDO;

class DB
{
    protected $link;
    protected $options = [
        'table'=>'',
        'filed'=>'*',
        'order'=>'',
        'limit'=>'',
        'where'=>''
    ];
    public function __construct(array $config)
    {
        // print_r($config);
        $this->connect($config);
    }
    protected function connect(array $config)
    {
        $dsn = sprintf(
            "mysql:host=%s;dbname=%s;charset=%s",
            $config['host'],
            $config['dbname'],
            $config['charset']
        );
        $this->link = new PDO($dsn,$config['user'],$config['password']);
    }
    // 查询方法
    public function query(string $sql,array $var = [])
    {
        // 使用预准备语句
        $sth = $this->link->prepare($sql);
        $sth->execute($var);
        return $sth->fetchAll();
    }

    // 执行方法,执行方法没有返回值
    public function execute(string $sql,array $var)
    {
        // 使用预准备语句
        $sth = $this->link->prepare($sql);
        $sth->execute($var);
    }

    // 实现链式查询
    public function table(string $table){
        $this->options['table'] = $table;
        return $this;
    }
    public function filed(...$filed){
        // 使用字段连接符将接收的字段合并
        $this->options['filed'] ='`' .  implode('`,`',$filed) . '`';
        return $this;
    }
    public function limit(...$limit){
        $this->options['limit'] =" LIMIT " . implode(',' , $limit);
        
        return $this;
    }
    public function order(string $order)
    {
        $this->options['order'] =" ORDER BY " . $order;
        return $this;
    }
    public function WHERE(string $where)
    {
        $this->options['where'] =" WHERE " . $where;
        return $this;
    }
    // 生成查询语句
    public function get()
    {
        $sql = "SELECT {$this->options['filed']} FROM {$this->options['table']} {$this->options['where']} {$this->options['order']} {$this->options['limit']}";
        return $this->query($sql);
    }
}