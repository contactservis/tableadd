<?php
include '../class/dbase.php';
use Devtec\test\DBase ;

$db = new DBase();

switch ($_POST['action']) {
    case 'add':
            $data[0] = $_POST['articul'];
            $data[1] = $_POST['nameProduct'];
            $result = $db->addItem( $data );
            if($result){
                echo "<tr><td>{$result['ID']}</td>
                    <td>{$data[0]}</td>
                    <td>{$data[1]}</td>
                    <td><span class='delete' data-id='{$result['ID']}' style='color:red;cursor:pointer;'>Удалить</span></td></tr>
                ";
            }

        break;

    case 'delete':
        $result = $db->deleteItemByID( $_POST['ID'] );
        print_r( $_POST );
    break;
    
    default:
        
        break;
}

// TODO: сделать метод от SQL иньекций