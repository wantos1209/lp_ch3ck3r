<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Scanner with Laravel and Bootstrap</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <h1 class="mt-5 mb-3 text-center">Barcode Scanner with Laravel and Bootstrap</h1>

        <div class="d-flex justify-content-center mb-4">
            <div id="yourScannerDiv"></div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/quagga"></script>

        <script>
            Quagga.init({
                inputStream : {
                    name : "Live",
                    type : "LiveStream",
                    target: document.querySelector('#yourScannerDiv'),
                    constraints: {
                        width: 640, // Lebar frame kamera
                        height: 480, // Tinggi frame kamera
                        facingMode: "environment" // Atur mode kamera, "environment" untuk kamera belakang, "user" untuk kamera depan
                    },
                },
                decoder : {
                    readers : ["upc_reader", "ean_reader", "code_39_reader"] // Pembaca untuk UPC-A, EAN-13, dan Code 39
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
            
    </div>

</body>
</html>
