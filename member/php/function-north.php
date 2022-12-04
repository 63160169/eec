<?php
  
  function updatedata($con,$tablename,$dataarray){
    // print_r($tablename);
    // print_r($dataarray);
    $pkey = getprimarykey($con,$tablename);
    echo '<br>';
    foreach($dataarray as $key => $value) {
        $where = $tablename.".".$pkey."=".$key;
        $fieldtext = "`";
        foreach($value as $key2 => $value2) {
            $fieldtext .=$key2."`='".$value2."',`";
        }
        $fieldtext = substr($fieldtext, 0, -2);
        $sql = "UPDATE ".$tablename." SET $fieldtext WHERE $where;";
        $query = mysqli_query($con, $sql);
        // print_r($sql);
        print_r("{{$query}};<br>");
        if ($query != '1')return 0;
    }
    return 1;
  }
function getprimarykey($con,$tablename){
    $sql = "
        SELECT K.COLUMN_NAME FROM  
        INFORMATION_SCHEMA.TABLE_CONSTRAINTS T 
        JOIN INFORMATION_SCHEMA.KEY_COLUMN_USAGE K
        ON K.CONSTRAINT_NAME=T.CONSTRAINT_NAME  
        WHERE  K.TABLE_NAME='$tablename'  
        AND T.CONSTRAINT_TYPE='PRIMARY KEY' LIMIT 1;";
    $query = mysqli_query($con, $sql);

    return mysqli_fetch_array($query)[0];        
}

function get_table_general($con, $tablename, $where='1'){
  $sql = 'SELECT * FROM '.$tablename.' WHERE '.$where;
  // print_r($sql);
  $query = mysqli_query($con, $sql); 
  // print_r($query);
  return $query;
}
?>