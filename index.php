<?php
/**
 * Created by PhpStorm.
 * User: Bram
 * Date: 12-7-2016
 * Time: 10:03
 */

?>

<html>
<head>
    <title>Producten bekijken</title>

    <!-- CUSTOM CSS-->
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Latest compiled and minified CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</head>

<body>

<div class="container">
    <div class="page-header">
        <h1 class="page-title">Producten bekijken</h1>

        <!-- product content - will be loaded dynamically with JS -->
        <div id='page-content'></div>

    </div><!-- end page-header -->

    <div class='margin-bottom-1em overflow-hidden'>
        <!-- when clicked, it will show the product's list -->
        <div id='read-products' class='btn btn-primary pull-right display-none'>
            <span class='glyphicon glyphicon-list'></span> Alle producten bekijken
        </div>

        <!-- when clicked, it will load the create product form -->
        <div id='create-product' class='btn btn-primary pull-right'>
            <span class='glyphicon glyphicon-plus'></span> Product toevoegen
        </div>

        <!-- this is the loader image, hidden at first -->
        <div id='loader-image'><img src='images/ajax-loader.gif'/></div>
    </div>

</div><!-- end container -->

</body>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
<!-- JS scripts here below -->
<script>

    $(document).ready(function() {

        // Show create product form when the create-product button is clicked
        $('#create-product').click(function(){

            // Change product title
            changePageTitle('Product toevoegen');

            // Show loader image
            $('#loader-image').show();

            // Hide create product button
            $('#create-product').hide();

            // Show read products button
            $('#read-products').show();

            // Fade out page-content
            $('#page-content').fadeOut('slow', function() {
                // load create_form.php in page-content
                $(this).load('create_form.php', function() {
                    // hide loader image
                    $('#loader-image').hide();
                    // fade in effect
                    $('#page-content').fadeIn('slow');
                });
            });
        }); // end create-product (click)


        $('#createProductForm').on('submit', function(e) {
            e.preventDefault();
            console.log('test');

            $.ajax({
                type        : 'POST',
                url         : 'create_form_handler.php',
                data        : $(this).serialize(),
//                        dataType    : 'json'
            }).done(function(data) {
                console.log(data);
            });
        });

        // Catch data when a product is created when a form was submitted (store that in te database)
//        $('form#create-product-form').on('submit', function(e) {
//
//            e.preventDefault();
//            console.log('form aangeroepen');
//
////            //  stop the form from submitting the normal way and refreshing the page
////            e.preventDefault();
////
////            // show loader image
////            $('#loader-image').show();
////
////            var formData = {
////              'name'           : $('input[name=name]').val(),
////              'description'    : $('input[name=description]').val(),
////              'price'          : $('input[name=price]').val()
////            };
////            console.log(formData);
////
////            $.ajax({
////                type:   'POST',         // define the post HTTP type
////                url:    'create_form.php',    // the url where we want to POST
////                data:   formData,
////                dataType: 'json',
////                success: function(data) {
////                    // When the POST request is done
////                    console.log('POST request meegestuurde data: \n');
////                    console.log(data);
////                },
////                error: function(data) {
////                    console.log('Er ging eits fout');
////                }
////            });
////
////            e.preventDefault();
//
//            // POST data from the form
////            $.post('create.php', $(this).serialize()).done(function(data) {
////
////            });
//        }); // end create-product-form (on)

    }); // end document (ready)

    // functions
    function changePageTitle(pageTitle) {
        // change page title
        $('#page-title').text(pageTitle);
        // change title tag
        document.title = pageTitle;
    }

</script>
</html>
