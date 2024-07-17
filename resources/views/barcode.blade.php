<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Scanner</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
</head>
<body>
    <h1>Barcode Scanner</h1>
    <div id="interactive" class="viewport"></div>
    <script>
        Quagga.init({
            inputStream: {
                type : "LiveStream",
                constraints: {
                    width: 640,
                    height: 480,
                    facingMode: "environment" // atau "user" jika menggunakan kamera depan
                }
            },
            decoder: {
                readers : [
                    "upc_reader",     // UPC-A
                    "ean_reader",     // EAN-13
                    "code_39_reader", // Code 39
                    "codabar_reader"  // Codabar
                ]
            }
        }, function(err) {
            if (err) {
                console.log(err);
                return;
            }
            console.log("Initialization finished. Ready to start");
            Quagga.start();
        });

        Quagga.onDetected(function(data) {
            var barcode = data.codeResult.code;
            alert(barcode);

            // Kirim barcode ke server Laravel
            // fetch('{{ route('barcode.scan') }}', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
            //     },
            //     body: JSON.stringify({ barcode: barcode })
            // })
            // .then(response => response.json())
            // .then(data => {
            //     console.log('Success:', data);
            //     // Tampilkan data produk atau informasi lainnya di sini
            // })
            // .catch((error) => {
            //     console.error('Error:', error);
            // });
        });
    </script>
</body>
</html>
