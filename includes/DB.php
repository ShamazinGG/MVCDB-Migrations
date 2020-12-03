<?php

class DB
{
    const DB_HOST = 'localhost';
    const DB_NAME = 'db';
    const DB_USER = 'homestead';
    const DB_PASSWORD = 'secret';
}
//interface DB
//{
//    public function execute($sql);
//    public function query($sql);
//    public function escape($sql);
//    public function affected();
//    public function insertId();
//}
//
//class MySQL_DB implements DB
//{
//    const DB_HOST = 'localhost';
//    const DB_NAME = 'db';
//    const DB_USER = 'homestead';
//    const DB_PASSWORD = 'secret';
//
//    private $_id;
//    public $prefix;
//
//    public function __construct() {
//        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
//        $db = new PDO($dsn, DB_USER, DB_PASSWORD);
//    }
//
//    public function execute($sql) {
//        $db = this->db
//        ($this->handleSql($sql), $this->_id);
//        $this->checkErrors();
//    }
//
//    public function query($sql) {
//        $result = mysql_query($this->handleSql($sql), $this->_id);
//        $this->checkErrors();
//        return new QueryResult($result);
//    }
//
//    public function escape($value) {
//        return mysql_real_escape_string($value);
//    }
//
//    public function affected() {
//        return mysql_affected_rows($this->_id);
//    }
//
//    public function insertId() {
//        return mysql_insert_id($this->_id);
//    }
//
//    private function handleSql($sql) {
//        return preg_replace_callback('#\{\{(.+?)\}\}#', function($matches) {
//            return $this->prefix . $matches[1];
//        }, $sql);
//    }
//
//    private function checkErrors() {
//        if (mysql_errno($this->_id)) {
//            throw new Exception(mysql_error());
//        }
//    }
//
//    private function connect($host, $username, $password, $database) {
//        if (!$this->_id = @mysql_connect($host, $username, $password))
//            throw new Exception('Unable to connect to DB');
//        if (!@mysql_select_db($database, $this->_id))
//            throw new Exception('Unable to choose database');
//    }
//}