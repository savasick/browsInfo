<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Anonymity</title>
    <style>
        body {
            background-color: #333;
            color: #fff;
        }
        h1, h2, p {
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>BrowsInfo - Check your browser</h1>

    <h2>NETWORK</h2>
    <p>IP address (server): <?php echo $_SERVER['REMOTE_ADDR']; ?></p>
    <p>Host name (server): <?php echo $_SERVER['REMOTE_HOST']; ?></p>
    <p>Remote Port (server): <?php echo $_SERVER['REMOTE_PORT']; ?></p>

    <h2>SYSTEM</h2>
    <p>Operating System (server): <?php echo $_SERVER['HTTP_USER_AGENT']; ?></p>
    <p>Platform (JS): <script>document.write(navigator.platform);</script></p>
    <p>CPU Class (JS): <script>document.write(navigator.hardwareConcurrency || 'Unknown');</script></p>
    <p>Screen resolution (JS): <script>document.write(screen.width + 'x' + screen.height + ' pixels');</script></p>
    <p>Color depth (JS): <script>document.write(screen.colorDepth + ' bit');</script></p>
    <p>Colors (JS): <script>document.write(Math.pow(2, screen.colorDepth));</script></p>
    <p>System Time (JS): <script>document.write(new Date().toLocaleString());</script></p>

    <h2>BROWSER</h2>
    <p id="browserInfo"></p>
    <!--JavaScript enabled (JS):<script>document.write("Yes")</script> <noscript>no</noscript>-->
    <script>
        const browserInfo = document.getElementById('browserInfo');
        const userAgent = navigator.userAgent;
        const browserDetails = [
            { name: 'Browser Name (JS)', value: navigator.appName },
            { name: 'Browser Codename (JS)', value: navigator.appCodeName },
            { name: 'Browser User Agent (JS)', value: userAgent },
            { name: 'Browser Version (JS)', value: navigator.appVersion },
            { name: 'Maximum window size (JS)', value: screen.availWidth + 'x' + screen.availHeight },
            { name: 'Current window size (JS)', value: window.innerWidth + 'x' + window.innerHeight },
            { name: 'JavaScript enabled (JS)', value: typeof window!== 'undefined' },
            { name: 'Java enabled (JS)', value: navigator.javaEnabled() },
            { name: 'Flash enabled (JS)', value: navigator.plugins['Shockwave Flash'] ? 'Yes' : 'No' },
            { name: 'Silverlight enabled (JS)', value: navigator.plugins['Silverlight Plug-In'] ? 'Yes' : 'No' },
            { name: 'Plug-ins (JS)', value: navigator.plugins.length },
            { name: 'MIME types (JS)', value: navigator.mimeTypes.length },
            { name: 'Browser Language (JS)', value: navigator.language },
            { name: 'Accepted Languages (server)', value: '<?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE']; ?>' },
        ];

        let output = '';
        browserDetails.forEach((detail) => {
            output += `<p>${detail.name}: ${detail.value}</p>`;
        });
        browserInfo.innerHTML = output;
    </script>

    <h2>DOCUMENT</h2>
    <p>Document title (JS): <?php echo $_SERVER['PHP_SELF']; ?></p>
    <p>Document location (JS): <?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?></p>
    <p>Document URI (server): <?php echo $_SERVER['REQUEST_URI']; ?></p>
    <p>Document last modify(JS): <script>document.write(document.lastModified);</script></p>
    <p>Referring Page (JS): <script>document.write(document.referrer);</script></p>
    <p>Referring page (server): <?php echo $_SERVER['HTTP_REFERER']; ?></p>
    <p>Request method (server): <?php echo $_SERVER['REQUEST_METHOD']; ?></p>

    <h2>USER</h2>
    <p>Language (JS): <script>document.write(navigator.language);</script></p>
    <p>Online (JS): <script>document.write(navigator.onLine);</script></p>
    <p>Screen pixel depth (JS): <script>document.write(screen.pixelDepth);</script></p>
    <p>Window inner size (JS): <script>document.write(window.innerWidth + 'x' + window.innerHeight);</script></p>
    <p>Cookies (JS): <script>document.write(document.cookie);</script></p>
    <p>Local storage (JS): <script>document.write(localStorage.length);</script></p>
    <p>Device pixel ratio (JS): <script>document.write(window.devicePixelRatio);</script></p>
    <p id="geolocation"></p>
    <script>
        const geolocation = document.getElementById('geolocation');
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition((position) => {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;
                geolocation.innerHTML = `Latitude: ${lat}, Longitude: ${lon}`;
            });
        } else {
            geolocation.innerHTML = 'Geolocation is not supported by this browser.';
        }
    </script>

</body>
</html>