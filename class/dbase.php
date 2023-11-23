<?
namespace Devtec\test ;

class DBase {
    private $servername = "185.84.108.3";
    private $username = "u108930_adm";
    private $password = "123QWE!123qwe";
    private $dbname = "b108930_dev";
    private $db;

    function __construct() { 
        $conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Ошибка подключения: " . $conn->connect_error);
        }
        $conn->set_charset("utf8");
        $this->db = $conn;
    }

    public function getAllItems(){
        $allItems = [];
        $sql = 'SELECT * FROM `dt_test`';
        $result = $this->db->query($sql);
        while ($row = $result->fetch_assoc()){
            $allItems[] = $row;
        }
        return $allItems;
    }

    public function getItemByID( $ID ){

    }

    public function deleteItemByID( $ID ){
        $sql = "DELETE FROM `dt_test` WHERE `dt_test`.`ID` = $ID ";
        echo $sql;
        $result['result'] = $this->db->query($sql);
        $result['ID'] = $this->db->insert_id; 
        return $result;
    }

    public function addItem( $arValue ){
        // TODO: сделать независимое добавление поле брать по ключу массива 
        $sql= "INSERT INTO dt_test (ARTICUL, NAME) VALUES ('$arValue[0]', '$arValue[1]' )";
        $result = $this->db->query($sql);
        return $result;
    }
}