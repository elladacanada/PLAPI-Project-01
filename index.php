<?php
require_once("conn.php");

function __($input){
    return htmlspecialchars($input, ENT_QUOTES);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://kit.fontawesome.com/f5b4375698.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">

    
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h3>Car Search DB</h3>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-12">
                <form id="search-form" class="input-group">
                    <div  class="input-group-prepend">
                        <select id="year-select" class="custom-select" >
                            <option selected value="0">Year</option>
                            <?php
                            //TYPES OF LOOPS
                            // for (i= *; i < *; i++)
                            // foreach (array as single)
                            // While ( while this statement is true)

                            //intval returns integer value of a variable
                            for($i = 1950; $i<= intval(date("Y")); $i++){
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <input type="search" name="search" id="search-nickname" placeholder="Search by Nickname" class="form-control">
                    <input type="search" name="search" id="search-model" placeholder="Search by Make or Model" class="form-control">
                    <div class="input-group-append">
                        <button class="btn btn-primary form-control" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <table class="table">
            <thead>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>Nickname</th>
                <th>Delete</th>
            </thead>
            <tbody id="search-results">

                <?php
                //select from db
                $sql = "SELECT * FROM cars";
                //store results
                $results = $db->query($sql);
                //fetch results
                while($row = $results->fetch_assoc()){
                    
                    echo "<tr>";
                    //this double underscore is a function variable we saved at top pf page
                    echo "<td>" . __($row["make"]) . "</td>";
                    echo "<td>" . __($row["model"]) . "</td>";
                    echo "<td>" . __($row["year"]) . "</td>";
                    echo "<td>" . __($row["nickname"]) . "</td>";
                    echo "<td><a class='delete-button'id='".  $row['id'] ."' href='#'>". "delete" ."</a></td>";
                    
                    echo "</tr>";

                }
                
                ?>

            </tbody>
        </table>
    </div>





<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="assets/js/scripts.js"></script>
</body>
</html>