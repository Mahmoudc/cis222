
<?php

function displayDescribeTable($tableName, $arrayTable, $arrayTable2, $arrayTable3, $arrayTable4, $arrayTable5)
{
    echo "<body>
<div class=\"container\">

<h class='h1'>".$tableName."</h>
<table class=\"table table-bordered offset-2 col-4\">
    <thead>
      <tr>
        <th>Datatype</th>
        <th>Type</th>
        <th>Null</th>
        <th>Extra</th>
        <th>Key</th>
      </tr>

    </thead>
    
    <tbody>

     ".displayAllDescribe($arrayTable, $arrayTable2, $arrayTable3, $arrayTable4, $arrayTable5)."
    </tbody>
  </table>
  <table class=\"table table-bordered offset-2 col-4\">
    <thead>
      <tr>
     ".displayHeaders($arrayTable)."
      </tr>

    </thead>
    
    <tbody>

     ".displayTableData($arrayTable)."
    </tbody>
  </table>
  </div>
  </body>
  <a href='index.php' class='btn btn-primary'>Go back to home</button>";
}
function displayDescribeRow($row, $row2, $row3, $row4, $row5) {
    return
        '<tr>
        <td>' . $row . '</td>
        <td>' . $row2 . '</td>
         <td> ' . $row3 . '</td>
          <td> ' . $row4 . '</td>
            <td>' . $row5 . '</td>
        </tr>
       </tr>';
}
function displayAllDescribe($arrayTables, $arrayTable2, $arrayTable3, $arrayTable4, $arrayTable5) {
    $htmlRows = "";
    //finally works
    $count=0;
    foreach ($arrayTables as $value) {
        $htmlRows = $htmlRows . displayDescribeRow($value, $arrayTable2[$count],$arrayTable3[$count], $arrayTable4[$count], $arrayTable5[$count]);
        $count++;
    }
    return $htmlRows;
}
function displayHeaders($arrayTable) {
    $htmlHeaders="";
    foreach($arrayTable as $value) {
        $htmlHeaders=$htmlHeaders."<th>".$value."</th>";
    }
   return $htmlHeaders;
}
function displayTableData($arrayTable) {
    include "../../credential.php";
    include "Database.php";
    $table=$_GET['table'];
    $sql="select COUNT(*) from ".$table;
    $stmt=$pdo->query($sql);
    $amountOfRow=0;
    while($row=$stmt->fetch()) {
        $amountOfRow= $row["COUNT(*)"];
    }

    $sql="select * from ".$table;
    $stmt=$pdo->query($sql);
    $htmlRows="";
    $count=0;
    $values=array();
//very confusing logic
    $numberOfExecutions=0;
   // each $stmt->fetch() represents a row

    $datas=array();

    while($row=$stmt->fetch()) {

        //$data=new Database();
        //each column going through it once
        //for loop
//        $data=new Database();
//        for($i=0;$i<$numberOfColumns;$i++)
//        {
//            array_push($datas, $row[$arrayTable[$count]]);
//        }

//        for($)
//        array_push($datas, $data);
        $rows=array();
        for($i=0;$i<sizeof($arrayTable);$i++)
            array_push($rows, $row[$arrayTable[$i]]);
        array_push($datas, new Database($rows));

        $numberOfExecutions++;

    }
//    var_dump($datas);
    //echo $numberOfExecutions;
    //finally works
    foreach ($datas as $value) {
        $htmlRows=$htmlRows."<tr>";
        foreach ($value->values as $row) {
            $htmlRows=$htmlRows."<td>".$row."</td>";
        }
        $htmlRows=$htmlRows."</tr>";

    }
    return $htmlRows;

}