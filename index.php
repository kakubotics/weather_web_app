<?php

  $weather="";
  $error = "";
  $city = "";
  if($_GET){

      $city = str_replace(' ','',$_GET['city']);

      $file_headers = @get_headers("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
      if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
          $exists = false;

          $error = "That city could not be found.";
      }

      else{

      $forecastPage = file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");

      $pageArray = explode('Weather Today </h2>(1&ndash;3 days)</span><p class="b-forecast__table-description-content"><span class="phrase">', $forecastPage);

        if(sizeof($pageArray) > 1){

          $secondpageArray = explode('</span></p></td><td colspan="9"><span class="b-forecast__table-description-title">', $pageArray[1]);

            if(sizeof($secondpageArray) > 1){

            $weather = $secondpageArray[0];
          }
          else{

            $error = "That city could not be found.";
          }
        }
        else{

          $error = "That city could not be found.";
        }

    }
  }




?>









<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    

    <!-- CSS link -->
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Weather4cast</title>
  </head>

  <body>
    <div id="back">
    <div class="jumbotron">
      <div class="container">
        
          <h1>What's the Weather?</h1>

          <form>
            <div class="form-group">
              <label for="city">Enter the name of the city.</label>
              <input type="text" class="form-control" id="city" name="city" placeholder="Eg. Bangalore,Tokyo" value="<?php echo $city;?>">
             
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <div id="weather"><?php

                if($weather){
                echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
              }

              else if($error){

                 
                 echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                 
              }

            ?></div>
          </form>

      </div>



    </div>
      <div id="maker">Handcrafted by:Kakubotics</div>
    <form action="connect.php">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="ask">For any query? Ask here.</button>
    </form>
    </div>



    




    <!-- JAVASCRIPT-->
    <script type="text/javascript" src="script.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>