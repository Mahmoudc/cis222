
<?php

function displayTable($arrayTable)
{
    echo "
<div class=\"container\"><table class=\"table table-bordered offset-2 col-4\">
    <thead>
      <tr>
        <th>Tables</th>

      </tr>

    </thead>
    <tbody>

      ".displayAllTable($arrayTable)."
    </tbody>
  </table>
  </div>";
}
function displayRow($row) {
    //yes works finally works dynamically changes the link depending on the row clicked
    return
        '<tr>
        <td><a href="?table='.$row.'"> '.$row.'</td></tr></a>
       </tr>';
}
function displayAllTable($arrayTables) {
    $htmlRows="";
    //finally works
//    $count=0;
   foreach($arrayTables as $value) {
        $htmlRows=$htmlRows.displayRow($value);
//        $count++;
    }
   return $htmlRows;
}