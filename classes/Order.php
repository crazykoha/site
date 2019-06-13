<?php


namespace classes;

include 'DBConnection.php';

/**
 * This is the model class for table "site_order".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int $quantity
 *
 */
class Order
{
    public $id;
    public $user_id;
    public $name;
    public $quantity;

    public function __construct($user_id, $name, $quantity, $id=null)
    {
        $this->id = $id;
        $this->user_id=$user_id;
        $this->name=$name;
        $this->quantity=$quantity;
    }

    public static function findById($id){
        if(!$id) return null;
        $DB=DBConnection::getDBConnection();
        $result = $DB->query("SELECT * FROM site_order WHERE `id`=".$id);
        $order = $result->fetch_assoc();
        $DB->close();
        if($order){
            return new Order($order['user_id'], $order['name'], $order['quantity'], $order['id']);
        } else
            return null;
    }

    public function save(){
        $DB=DBConnection::getDBConnection();
        $order = self::findById($this->id);
        if($order){
            $sql="UPDATE site_order SET `name`='".$this->name."', `user_id`=".$this->user_id.", `quantity`=".$this->quantity." WHERE `id`=".$this->id;
        } else {
            $sql="INSERT INTO `site_order`(`user_id`, `name`, `quantity`) VALUES (".$this->user_id.", '".$this->name."', ".$this->quantity.")";
        }
        $DB->query($sql);
    }

}