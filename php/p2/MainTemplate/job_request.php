<?php



function displayJobRequest($arrayTable, $arrayTable2)
{
    echo "<body>
<a href='?page=jobRequest&request=add' class='btn btn-primary'>Add a request</a><br>
<div class=\"container\">


    <table class=\"table table-bordered\">
    <thead>
    <tr>
        <th>Index</th>
        <th>Project Name</th>
        <th>Details</th>
        <th>Delete</th>
        
    </tr>

    </thead>

    <tbody>

    " . displayAllRequest($arrayTable, $arrayTable2) . "
    </tbody>
    </table>

</div>
</body>";
}

function displayRequestRow($row, $row2)
{
    return
        '<tr>
    <td>' . $row . '</td>
    <td>' . $row2 . '</td>
 <td> <a class="btn btn-primary" href="?page=jobRequest&request=details&details=' . $row.'"> Details</a></td>
    <td> <a class="btn btn-primary" href="?delete=' . $row . '&page=jobRequest&request=delete"> Delete</a></td>
</tr>
</tr>';
}

function displayAllRequest($arrayTables, $arrayTable2)
{
    $htmlRows = "";
//finally works
    $count = 0;
    foreach ($arrayTables as $value) {
        $htmlRows = $htmlRows . displayRequestRow($value, $arrayTable2[$count]);
        $count++;
    }
    return $htmlRows;
}