<?php

require_once('MySqlDB.php');

$db = new DB();

$operation = $_GET['operation'];
switch ($operation){
    case 'get_persone':
        echo $db->get_persone();
        break;
    case 'get_impianti':
        echo $db->get_impianti();
        break;
    case 'insert_persone':
        echo $db->insert_persone($_POST);
        break;
    case 'insert_impianti':
        echo $db->insert_impianti($_POST);
        break;
    case 'get_persone_by_impianto':
        $id = $_GET['id'];
        echo $db->get_persone_by_impianto($id);
        break;
    case 'get_persona_by_id':
        $id = $_GET['id'];
        echo $db->get_persona_by_id($id);
        break;
    case 'get_impianto_by_id':
        $id = $_GET['id'];
        echo $db->get_impianto_by_id($id);
        break;
    case 'update_persone':
        echo $db->update_persone($_POST);
        break;
    case 'update_impianti':
        echo $db->update_impianti($_POST);
        break;
    default:
        echo "No_Operation";
        echo $operation;
        break;
}

$db->close_connection();    


