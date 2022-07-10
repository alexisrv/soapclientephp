<?php 
try{
$soapclient = new SoapClient('http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?wsdl');
$response =$soapclient->ListOfCountryNamesByName();
$array = json_decode(json_encode($response), true);
}catch(Exception $e){
	echo $e->getMessage();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Cliente PHP</title>
  </head>
  <body>
    <center class="mt-3"><h1>Cliente para consumir una SOAP Api con PHP</h1></center>
    <div class="m-4">
        <div class="row">
        <?php
            foreach($array["ListOfCountryNamesByNameResult"]["tCountryCodeAndName"] as $country){
                echo '<div class="col-2 col-md-4 col-sm-12 mb-3">
                        <div class="property-card">
                            <div class="property-image" style="background-image:url(\'https://countryflagsapi.com/png/'.$country["sName"].'\');">
                            </div>
                            <div class="property-description">
                            <h5> '.$country["sName"].' </h5>
                            </div>
                        </div>
                    </div>';
            }
        ?>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>