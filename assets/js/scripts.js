// alert ("hello");

$(document).ready(function(){ //document is loaded and ready to run

    var car_id = false;
    var search_model_query = "";
    var search_nickname_query = "";
    var selected_year = 0;

    search_input();

    $("#search-form").on("submit", function(e){
        e.preventDefault(); //prevent button from submitting and refreshing page
        
    });

    //on keyup start searching cars by nickname
    $("#search-form #search-nickname").on("keyup", function(){
        // get the value in search box. (first store value in variable).
        search_nickname_query  = $(this).val(); //this gets value of the input field and stores in variable

        search_input();
        
        
    }); // end of keyup
    //on keyup start searching cars by nickname
    $("#search-form #search-model").on("keyup", function(){
        // get the value in search box. (first store value in variable).
        search_model_query  = $(this).val(); //this gets value of the input field and stores in variable

        search_input();
        
        
    }); // end of keyup

    //on change of select field
    $("#year-select").on("change", function(){ 
        selected_year = $(this).val();
        // console.log(selected_year);
        search_input();

    });


    //on Delete button click
    //square brackets is a css attr for selecting any attribute
    $("#search-results").on("click", "[data-action=delete]", function(){
        // console.log($(this));
        // e.preventDefault();
        car_id = $(this).data("car");
        // console.log(car_id);

        $("#deleteCarAlert").modal("show");

        //on Delete Confirmation click
        $("#deleteCarAlert").on("click","[data-action=confirm-delete]", function(){
            console.log(car_id);

            $.ajax({
                url: "ajax/delete.php",
                type: "POST",
                data: {
                    id: car_id
                },
                success: function(result){
                    console.log(result);
                    alert(result);
                    $("#deleteCarAlert").modal("hide");
                    car_id = false;
                    search_input();
                }
            });
        });

    });

   
    //onclick of plus sign. insert cars into db

$("#newCar").on("click", "[data-action=insert-car]", function(){
    var new_nickname = $('#newNickname').val();
    var new_make = $('#newMake').val();
    var new_model = $('#newModel').val();
    var new_year = $('#newYear').val();

    if( new_nickname == "" || new_model == "" || new_year == "" || new_make == "") return;

    $.ajax({
        url: "ajax/insert.php",
        type: "POST",
        data: {
            make: new_make,
            model: new_model,
            year: new_year,
            nickname: new_nickname
        },
        success: function(insert){
            
            if(insert == "") return;
            
            search_input();
        }
    });


});

    /*******************************
    *
    *
    search_input
    send search query to search.php
    returnjson results
    * 
    *
    **********************************/

    function search_input() { //here we wrapped all of our search script into a function to re-use later.
        // send search query value to php file
        // return rows from php file that match search query value
        // replace table rows with new results
        $.post( // url, then object, then function
            'ajax/search.php', //first parameter is url.
            {
                
                search_model: search_model_query,
                search_nickname: search_nickname_query, // give data a name, then the value (variable we set above).
                year: selected_year
            }, // the data object to be passed to file via post.
            function(car_data){ // on complete function (returned data results)
                // console.log(car_data);

                if(car_data == "") return; // stop running if nothing matches input field
                var cars = JSON.parse(car_data); //parse the data into something usable by javascript. produces cleaner results in console too
                 //console.log(cars); //can  cars var check with a console log
                 
                 var table_rows = '';
                 // function represents a for each ( index, object)
                 $.each(cars, function(i, car){
                    //console.log(car);
                    table_rows +=   "<tr><td>"+car.make+
                                    "</td><td>"+car.model+
                                    "</td><td>"+car.year+
                                    "</td><td>"+car.nickname+
                                    "</td><td class='text-center'>"+
                                    "<button class='btn hovertextshow' data-action='delete' data-car='"+car.id+"'><span class='hovertext'>Delete Car?</span><i class='fas fa-trash'></i></button>"
                                    "</td></tr>";
                 });

                 $("#search-results").html(table_rows);
            }
        );
    } // end of search_input

    

}); //end of document