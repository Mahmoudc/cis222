<?php
$pageTitle="Home";
include 'headerBootstrap.php';
retrieveAnimals();
function retrieveAnimals() {
include '../credential.php';
$sql= "select * from midterm_animals";
$stmt=$pdo->query($sql);
$indexes=array();
$animalTypes=array();
$animalBreeds=array();
$checked_in=array();
$checked_out=array();
while($row=$stmt->fetch()) {
array_push($indexes, $row['animal_index']);
array_push($animalTypes, $row['animal_type']);
array_push($animalBreeds, $row['animal_breed']);
array_push($checked_in, $row['checked_in']);
array_push($checked_out, $row['checked_out']);
}
displayAnimalTable($indexes, $animalTypes, $animalBreeds, $checked_in, $checked_out);
}


function displayAnimalTable($arrayTable, $arrayTable2, $arrayTable3, $arrayTable4, $arrayTable5)
{
echo "<body>
<a href='?page=add' class='btn btn-primary'>Add an animal</a><br>
<div class=\"container\">


    <table class=\"table table-bordered\">
    <thead>
    <tr>
        <th>Index</th>
        <th>Type</th>
        <th>Breed</th>
        <th>Checked in</th>
        <th>Checked out</th>
        <th>Update</th>
        <th>Delete</th>
        
    </tr>

    </thead>

    <tbody>

    " . displayAllAnimal($arrayTable, $arrayTable2, $arrayTable3, $arrayTable4, $arrayTable5) . "
    </tbody>
    </table>

</div>
</body>";
}

function displayAnimalRow($row, $row2, $row3, $row4, $row5)
{
return
'<tr>
    <td>' . $row . '</td>
    <td>' . $row2 . '</td>
    <td> ' . $row3 . '</td>
    <td> ' . $row4 . '</td>
    <td>' . $row5 . '</td>
    <td> <a class="btn btn-primary" href="?update=' . $row . '&page=update"> Update</a></td>
    <td> <a class="btn btn-primary" href="?delete=' . $row . '&page=delete"> Delete</a></td>
</tr>
</tr>';
}

function displayAllAnimal($arrayTables, $arrayTable2, $arrayTable3, $arrayTable4, $arrayTable5)
{
$htmlRows = "";
//finally works
$count = 0;
foreach ($arrayTables as $value) {
$htmlRows = $htmlRows . displayAnimalRow($value, $arrayTable2[$count], $arrayTable3[$count], $arrayTable4[$count], $arrayTable5[$count]);
$count++;
}
return $htmlRows;
}