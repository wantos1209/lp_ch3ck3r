<!DOCTYPE html>
<html>

<head>
    <title>Barcode Scanner</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quagga"></script>
    
</head>

<body>
<div id="yourScannerDiv"></div>

<script>
    Quagga.init({
        inputStream : {
            name : "Live",
            type : "LiveStream",
            target: document.querySelector('#yourScannerDiv'), // Ganti dengan ID atau class div tempat Anda ingin menampilkan scanner
            constraints: {
                width: 480,
                height: 320,
                facingMode: "environment" // atau "user" untuk kamera depan
            },
        },
        decoder : {
            readers : ["ean_reader"] // atau jenis barcode lain yang ingin Anda dukung
        }
    }, function(err) {
        if (err) {
            console.error(err);
            return;
        }
        console.log("Initialization finished. Ready to start");
        Quagga.start();
    });
    
    Quagga.onDetected(function(result) {
        var code = result.codeResult.code;
        alert("Barcode detected: " + code);
    });
    </script>
</body>

</html>
