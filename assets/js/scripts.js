// alert ("hello");

$(document).ready(function(){ //document is loaded and ready to run

    var del_id = "";
    var search_model_query = "";
    var search_nickname_query = "";
    var selected_year = 0;
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


    //on click of X a tag, delete database row
    $("#search-results").on("click", ".delete-button", function(e){
        e.preventDefault();
        del_id = $(this).attr('id');
        search_input();
        
        
        // var el = $(this);     


        
        // $.post( // url, then object, then function
        //     'ajax/delete.php', //first parameter is url.
        //     {
        //         id: del_id
        
        //     }, // the data object to be passed to file via post.
        //     function(data){
        //         if(data ){
        //             // console.log(data);
        //             //Remove row from HTML Table
        //             $(el).closest('tr').css('background','tomato');
        //             $(el).closest('tr').fadeOut(800,function(){
        //                $(this).remove();
        //             });
        //              }else{
        //             alert('Invalid ID.');
        //              }

        //     }
        // );
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
                id: del_id,
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
                    table_rows += "<tr><td>"+car.make+"</td><td>"+car.model+"</td><td>"+car.year+"</td><td>"+car.nickname+"</td><td><a href='#' class='delete-button' id='"+car.id+"'>delete</a></td></tr>";
                 });

                 $("#search-results").html(table_rows);
            }
        );
    } // end of search_input

    

}); //end of document