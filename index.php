<!DOCTYPE html>
<html>
<head>
    <title>Network Time Clock</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @font-face {
            font-family: 'LED';
            src: url('led.ttf') format('truetype');
            /* Add other font properties here if needed */
        }

        body {
            margin: 0;
            padding: 0;
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'LED', Arial, sans-serif;
        }

        #clock {
            font-size: 25vw;
            font-weight: normal;
            color: #6EFF33;
            text-align: center;
        }
    </style>
    <script>
    function updateClock(serverTime) {
    if (!serverTime || isNaN(Date.parse(serverTime))) {
        console.error("Invalid server time:", serverTime);
        // Handle error (e.g., show a default time or error message)
        return;
    }

    var currentTime = new Date(serverTime);
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds();
    var meridiem = hours >= 12 ? "PM" : "AM";

    hours = hours % 12;
    hours = hours ? hours : 12;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;

    var timeString = hours + ":" + minutes + " " + meridiem;
    document.getElementById("clock").textContent = timeString;
    }

    setInterval(function() {
    var queryParams = new URLSearchParams(window.location.search);
    var offset = queryParams.get('offset') || 0;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                updateClock(xhr.responseText);
            } else {
                console.error("Failed to fetch server time. Status:", xhr.status);
                // Handle HTTP error (e.g., show an error message)
            }
        }
    };
    xhr.open("GET", "getservertime.php?offset=" + offset, true);
    xhr.send();
    }, 1000);

    </script>

</head>
<body>
    <div id="clock"></div>
</body>
</html>
