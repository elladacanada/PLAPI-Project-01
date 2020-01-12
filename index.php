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
                <h1>PLAPI Project 01 - Car Search DB - NRomanakis</h1>
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
        <table class="table table-striped table-borderless table-hover table-dark table-sm">
            <thead >
                <th><h3>Make</h3></th>
                <th><h3>Model</h3></th>
                <th><h3>Year</h3></th>
                <th><h3>Nickname</h3></th>
                <th><h3>Delete</h3></th>
            </thead>
            <tbody id="search-results">
            </tbody>
            <tfoot id="newCar">
                <th><input type="text" class="form-control" placeholder="Make" id="newMake"></th>
                <th><input type="text" class="form-control" placeholder="Model" id="newModel"></th>
                <th><input type="text" class="form-control" placeholder="Year" id="newYear"></th>
                <th><input type="text" class="form-control" placeholder="Nickname" id="newNickname"></th>
                <th class="text-center">
                        
                        <button class="btn hovertextshow" data-action="insert-car"><span class="hovertext">Add New Car?</span><i class="fas fa-plus"></i></button>
                    
                </th>
            </tfoot>
        </table>
    </div>

    <!-- Modal -->
<div class="modal fade" id="deleteCarAlert" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body text-center">
        Are you sure you want to delete this car?
        </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" data-action="confirm-delete" >Delete</button>
      </div>
    </div>
  </div>
</div>





<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="assets/js/scripts.js"></script>
</body>
</html>