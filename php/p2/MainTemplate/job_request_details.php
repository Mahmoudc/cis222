<?php



function displayJobRequestDetails($arrayTable)
{
    echo "<body>
<a href='?page=jobRequest&request=home' class='btn btn-primary'>Go back home</a><br>
<div class=\"container\">


    <table class=\"table table-bordered\">
    <thead>
    <tr>
        <th>Index</th>
        <th>Project Name</th>
        <th>Project Description</th>
        <th>Project Deadline</th>
         <th>Minimum Cost</th>
        <th>Maximum Cost</th>
         <th>Status</th>
        <th>Progress</th>
        
    </tr>

    </thead>

    <tbody>

    " . displayAllDetailsRequest($arrayTable) . "
    </tbody>
    </table>

</div>
</body>";
}

function displayRequestDetailsRow($row)
{
    return '<td>' . $row . '</td>';
}

function displayAllDetailsRequest($arrayTables)
{
    $htmlRows = "<tr>";
//finally works
    $count = 0;
   for($i=0;$i<sizeof($arrayTables);$i++) {
       $htmlRows=$htmlRows.displayRequestDetailsRow($arrayTables[$i]);
   }
   $htmlRows=$htmlRows."</tr>";
    return $htmlRows;
}