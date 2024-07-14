<!DOCTYPE html>
<html>

<head>
    <title>Barcode Scanner</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <style>
        #interactive {
            width: 100%;
            max-width: 100vw;
            height: 150px;
            border: 1px solid #000;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        #interactive video {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <h1>Scan Barcode</h1>
    @if (session('success'))
    <p>{{ session('success') }}</p>
    @endif

    <div id="interactive"></div>

    <form id="barcode-form" action="/scan" method="POST" style="display: none;">
        @csrf
        <input type="text" name="barcode" id="barcode">
        <button type="submit">Submit</button>
    </form>

    <script>
        $(document).ready(function () {
            let scanner = new Instascan.Scanner({
                video: document.getElementById('interactive').querySelector('video'),
                mirror: false,
                continuous: true,
                captureImage: false,
                backgroundScan: true,
                refractoryPeriod: 5000,
                scanPeriod: 5
            });

            scanner.addListener('scan', function (content) {
                console.log(content);
                alert('Barcode detected: ' + content);
                $('#barcode').val(content);
            });

            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                    alert('No cameras found.');
                }
            }).catch(function (e) {
                console.error('Failed to access cameras.', e);
                alert('Failed to access cameras.');
            });
        });
    </script>
</body>

</html>
