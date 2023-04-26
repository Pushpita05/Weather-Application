<?php

class WeatherApp{
    private $city;

    public function get_weather(){

        if (isset($_POST['search'])){
            $this->city = $_POST['city'];

            $content = file_get_contents("https://www.weather-forecast.com/locations/$this->city/forecasts/latest");

            $start = explode('<div class="column small-12">',$content);


            $end = explode('<div class="location-summary__item location-summary__item--js is-truncated">',$start[1]);



           if ($end){
               echo '
<div class="animated fadeIn">
            <div class="card">

  <div class="card-body">
   
    <p class="card-text">'.$end[0].'</p>
    <hr>
   
  </div>
</div>
            ';
           }else{
               echo '
               <div class="alert alert-danger" role="alert">
  Invalid Input ! City Name Maybe Wrong .
</div>
</div>
               ';
           }
        }
    }
}
$weather = new WeatherApp();
$weather->get_weather();

?>