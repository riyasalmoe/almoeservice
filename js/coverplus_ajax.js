function fillEndUser(Value1) {   
    //Assigning value to "inlineFormInputGroup" div in "inlineFormInputGroup.php" file.
    $('#enduser').val(Value1);    
    //Hiding "display" div in "inlineFormInputGroup.php" file.
    $('#endusers').hide();
}

$(document).ready(function() {   
    //On pressing a key on "enduser box" in "Report_Customeritems.php" file. This function will be called.
    $("#enduser").keyup(function() {
        //alert(1);
        //Assigning inlineFormInputGroup box value to javascript variable named as "name".
        var name = $('#enduser').val();       
        //Validating, if "name" is empty.       
        if (name == "") {           
            //Assigning empty value to "display" div in "inlineFormInputGroup.php" file.
            $("#endusers").html("");       
        }       
        //If name is not empty.
        else {           
            //AJAX is called.
            $.ajax({               
                //AJAX type is "Post".
                type: "POST",
                               
                //Data will be sent to "ajax.php".
                url: "enduser_ajax.php",
                               
                //Data, that will be sent to "ajax.php".
                data: {                   
                    //Assigning value of "name" into "inlineFormInputGroup" variable.
                    //search: name
                    enduser: name               
                },
                               
                //If result found, this funtion will be called.
                success: function(html) {                   
                    //Assigning result to "display" div in "inlineFormInputGroup.php" file.
                    $("#endusers").html(html).show();               
                }           
            });       
        }
    });   
});
