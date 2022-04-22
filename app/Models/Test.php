<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
include 'pdo.php';

class Test extends Model {
    protected $table = 'test';
    protected $fillable = ['name'];
    
    public static function createTest($name){
        $sql = "insert into `test`(name) values('$name')";
        pdo_execute($sql);
    }

}