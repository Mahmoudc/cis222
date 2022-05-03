
<?php

function displayDescribeTable($tableName, $arrayTable)
{
    echo "
<div class=\"container\">
<h class='h1'>".$tableName."</h><table class=\"table table-bordered offset-2 col-4\">
    <thead>
      <tr>
        <th>Datatype</th>

      </tr>

    </thead>
    <tbody>

      ".displayAllTable($arrayTable)."
    </tbody>
  </table>
  </div>";
}
function displayDescribeRow($row) {
    //yes works finally works dynamically changes the link depending on the row clicked
    return
        '<tr>
        <td><a href="?table='.$row.'"> '.$row.'</td></tr></a>
       </tr>';
}
function displayAllDescribe($arrayTables) {
    $htmlRows="";
    //finally works
//    $count=0;
   foreach($arrayTables as $value) {
        $htmlRows=$htmlRows.displayRow($value);
//        $count++;
    }
   return $htmlRows;
}