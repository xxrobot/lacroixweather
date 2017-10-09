<!doctype html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>
        La Croix Weather
    </title>
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="57x57" href="images/favico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/favico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/favico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/favico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/favico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/favico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/favico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/favico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/favico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="images/favico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favico/favicon-16x16.png">
    <!-- <link rel="manifest" href="images/favico/manifest.json"> -->
    <meta name="msapplication-TileColor" content="#152466">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#152466">
    <meta name="description" content="Weather with La Croix pairing">
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="La Croix Weather" />
    <meta property="og:site_name" content="La Croix Weather">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://tacos.vegas/lacroix" />
    <meta property="og:image" content="http://tacos.vegas/tacos.vegas/lacroix/images/lacroix_weather.png" />
    <meta name="twitter:creator" content="@xxrobot">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@xxrobot">
    <meta name="twitter:title" content="La Croix Weather">
    <meta name="twitter:description" content="Weather with La Croix pairing">
    <meta name="twitter:image" content="http://tacos.vegas/tacos.vegas/lacroix/images/lacroix_weather.png">
</head>

<body>
    <style>
    @font-face {
        font-family: 'Pennellinodeg';
        src: url('fonts/pennellinodeg-webfont.woff2') format('woff2'), url('fonts/pennellinodeg-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;
    }
    
    body {
        padding: 0;
        margin: 0;
        text-align: center;
        font-size: 16px;
        /*overflow-x: hidden;*/
        font-family: 'comfortaa', sans-serif;
        text-transform: uppercase;
        outline: none;
        color: #152466;
    }
    
    .can {
        position: absolute;
        z-index: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        text-align: center;
    }
    
    .can svg {
        display: block;
        margin: 0 auto;
        height: 100%;
        width: 100%;
    }
    
    .content {
        z-index: 1;
        position: relative;
        padding: 10px;
        text-align: center;
        letter-spacing: .25em;
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 90vh;
    }
    
    .display {
        font-family: 'pennellinodeg', sans-serif;
        position: relative;
    }
    
    .city,
    .suggestion,
    .region,
    .country {
        font-family: 'comfortaa', sans-serif;
    }

    .region,
    .country{
        font-size: .75em;
    }
    
    .temperature {
        font-size: 10em;
        padding-left: .25em;
        font-size: 30vh;
        line-height: 1;
    }
    
    input {
        height: 40px;
        border-radius: 4px;
        border: 1px solid #ccc;
        width: 80%;
        max-width: 300px;
        font-size: 1.5em;
        text-align: center;
        padding: 5px 10px;
        margin-top: 1em;
    }
    
    .spinner {
        margin: 15px auto 0;
        width: 100px;
        text-align: center;
    }
    
    .spinner > div {
        width: 18px;
        height: 18px;
        background-color: #348694;
        border-radius: 100%;
        display: inline-block;
        -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
        animation: sk-bouncedelay 1.4s infinite ease-in-out both;
    }
    
    .spinner .bounce1 {
        -webkit-animation-delay: -0.32s;
        animation-delay: -0.32s;
    }
    
    .spinner .bounce2 {
        -webkit-animation-delay: -0.16s;
        animation-delay: -0.16s;
    }
    
    @-webkit-keyframes sk-bouncedelay {
        0%,
        80%,
        100% {
            -webkit-transform: scale(0)
        }
        40% {
            -webkit-transform: scale(1.0)
        }
    }
    
    @keyframes sk-bouncedelay {
        0%,
        80%,
        100% {
            -webkit-transform: scale(0);
            transform: scale(0);
        }
        40% {
            -webkit-transform: scale(1.0);
            transform: scale(1.0);
        }
    }
    </style>
    <div class="can">
        <?php echo file_get_contents("images/Can.svg"); ?>
    </div>
    <div class="content">
        <div class="display">
            <div id="city" class="city">&nbsp;</div>
            <div class="region-country">
                <span id="region" class="region">&nbsp;</span>
                <span id="country" class="country">&nbsp;</span>
            </div>
            <div id="temperature" class="temperature"></div>
            <div id="suggestion" class="suggestion"></div>
        </div>
        <div id="error"> </div>
        <div id="userinput">
            <label for='zip'>
                <br>
                <input type='text' placeholder="Enter Zipcode or City" name='zip' id="zip">
            </label>
        </div>
        <div class="spinner" id="spinner" style="display: none;">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
</body>

</html>
<script>
var apixuKey = 'PUT YOUR KEY HERE';
var flavors = {
    lemon: ['#f0e22a', '#f1d220', '#e7d768', '#61c1cd', '#2765cc'],
    lime: ['#7abd1b', '#358201', '#aec325', '#0b976f', '#0b3288'],
    pamplemousse: ['#e07669', '#ef3020', '#f0c791', '#64cad9', '#2972e7'],
    passionfruit: ['#ff91a6', '#ff0070', '#ddecfe', '#00c4cc', '#0066ce'],
    peachpear: ['#e49c36', '#d92f00', '#dde383', '#2f46a9', '#1549b0'],
    orange: ['#ee9a00', '#f57400', '#e9b251', '#2f46a9', '#1549b0'],
    tangerine: ['#ee9a00', '#f57400', '#e9b251', '#2f46a9', '#1549b0'],
    berry: ['#c679ad', '#b1528f', '#cf9bbf', '#2f46a9', '#1549b0'],
    cranraspberry: ['#e8a5a5', '#d65358', '#c7898a', '#2f46a9', '#1549b0'],
    apricot: ['#ec9400', '#e45000', '#edecf1', '#2f46a9', '#8d90a0'],
    mango: ['#88ce00', '#e45000', '#edecf1', '#2f46a9', '#8d90a0'],
    coconut: ['#ffffff', '#b95a36', '#ffffff', '#21c4c4', '#1aa4d6'],
    keylime: ['#15c72e', '#c8d239', '#d6bc1d', '#d81b00', '#d6c324']
}

var temperature = document.getElementById('temperature');
var error = document.getElementById('error');
var city = document.getElementById('city');
var region = document.getElementById('region');
var country = document.getElementById('country');
var suggestion = document.getElementById('suggestion');
var zip = document.getElementById('zip');
var spinner = document.getElementById('spinner');

function setFlavor(flavor) {
    var css = `
    #five g path {
        fill: ` + flavors[flavor][4] + `;
    }
    #four g path {
        fill: ` + flavors[flavor][3] + `;
    }
    #three g path {
        fill: ` + flavors[flavor][2] + `;
    }
    #two path {
        fill: ` + flavors[flavor][1] + `;
    }
    #background rect {
        fill: ` + flavors[flavor][0] + `;
    }
    body{
        background-color: ` + flavors[flavor][0] + `;
    }
     .city, .suggestion, input{
        color: ` + flavors[flavor][3] + `; 
    }
    *:focus{
        box-shadow: 0 0px 3px 2px ` + flavors[flavor][4] + `;
        outline: 0;
    }
    `;


    var head = document.head || document.getElementsByTagName('head')[0],
        style = document.createElement('style');

    style.type = 'text/css';
    if (style.styleSheet) {
        style.styleSheet.cssText = css;
    } else {
        style.appendChild(document.createTextNode(css));
    }

    head.appendChild(style);
}




function getSuggestedFlavor(temperature) {
    if (temperature > 105) {
        return 'lemon';
    } else if (temperature >= 100 && temperature < 105) {
        return 'lime';
    } else if (temperature >= 95 && temperature < 100) {
        return 'pamplemousse';
    } else if (temperature >= 90 && temperature < 95) {
        return 'passionfruit';
    } else if (temperature >= 85 && temperature < 90) {
        return 'peachpear';
    } else if (temperature >= 80 && temperature < 85) {
        return 'keylime'; 
    } else if (temperature >= 75 && temperature < 80) {
        return 'orange';
    } else if (temperature >= 70 && temperature < 75) {
        return 'tangerine';
    } else if (temperature >= 65 && temperature < 70) {
        return 'berry';
    } else if (temperature >= 60 && temperature < 65) {
        return 'cranraspberry';
    } else if (temperature >= 55 && temperature < 60) {
        return 'apricot';
    } else if (temperature >= 50 && temperature < 50) {
        return 'mango';
    } else {
        return 'coconut';
    }
}

/**
 * Displays the weather
 * @param {Object} response
 * @return {Number} sum
 */
function displayWeather(response) {
    weather = JSON.parse(response);
    temperature.innerHTML = Math.round(weather.current.temp_f) + '&deg;';
    city.innerHTML = '&nbsp;' + weather.location.name;
    region.innerHTML = '&nbsp;' + weather.location.region;
    country.innerHTML = '&nbsp;' + weather.location.country;
    setFlavor(getSuggestedFlavor(weather.current.temp_f));
    suggestion.innerHTML = 'Perfect with ' + getSuggestedFlavor(weather.current.temp_f) + ' La&nbsp;Croix.';
}

function showError(response) {
    error.innerHTML = response;
    console.log(response);

    temperature.innerHTML = '';
    city.innerHTML = '';
    region.innerHTML = '';
    country.innerHTML = '';
    suggestion.innerHTML = '';

}

function lookup(type, data) {
    var isValid = false;

    if (type == 'gps') {
        var url = '//api.apixu.com/v1/current.json?key='+apixuKey+'&q=' + data.latitude + ',' + data.longitude;
        // var url = '//api.openweathermap.org/data/2.5/weather?lat=' + data.latitude + '&lon=' + data.longitude + ',us&units=imperial&appid=6db3bd4576403278205c1883e0e6d6e6';
        isValid = true;
    } else if (hasNumbers(data) && data.length >= 5) {
        //its probably a zipcode
        var url = '//api.apixu.com/v1/current.json?key='+apixuKey+'&q=' + data;
        isValid = true;
    } else if (!hasNumbers(data) && data.length >= 2) {
        //its probably a city name
        var url = '//api.apixu.com/v1/current.json?key='+apixuKey+'&q=' + data;
        isValid = true;
    }

    if (isValid) {
        temperature.innerHTML = '';
        error.innerHTML = '';
        spinner.style.display = 'block';
        get(url).then(function(response) {
            console.log("Success!", displayWeather(response));
            spinner.style.display = 'none';
        }, function(error) {
            console.error("Failed!", showError(error));
            spinner.style.display = 'none';
        })

    }
}

function get(url) {
    // Return a new promise.
    return new Promise(function(resolve, reject) {
        // Do the usual XHR stuff
        var req = new XMLHttpRequest();
        req.open('GET', url);

        req.onload = function() {
            // This is called even on 404 etc
            // so check the status
            if (req.status == 200) {
                // Resolve the promise with the response text
                resolve(req.response);
            } else {
                // Otherwise reject with the status text
                // which will hopefully be a meaningful error
                reject(Error(req.statusText));
            }
        };

        // Handle network errors
        req.onerror = function() {
            reject(Error("Network Error"));
        };

        // Make the request
        req.send();
    });
}

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(hasPosition);
    }
}

function hasPosition(position) {
    lookup('gps', position.coords);
}

function hasNumbers(string) {
    return /\d/.test(string);
}

var delay = (function() {
    var timer = 0;
    return function(callback, ms) {
        clearTimeout(timer);
        timer = setTimeout(callback, ms);
    };
})();


//init
setFlavor('lemon');
getLocation();
zip.addEventListener("keyup", function() {
    delay(function() {
        //waits a few seconds to send request to api
        lookup('zipcode', zip.value);
    }, 2000);
});

zip.addEventListener("change", function() {
    lookup('zipcode', zip.value);
});
</script>
<? // include("../includes/ga.php") ?>
