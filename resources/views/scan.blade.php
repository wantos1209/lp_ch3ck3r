<!DOCTYPE html>
<html>

<head>
    <title>Barcode Scanner</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
</head>

<body>
    <h1>Scan Barcode</h1>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <div id="interactive" class="viewport"></div>

    <form id="barcode-form" action="/scan" method="POST" style="display: none;">
        @csrf
        <input type="text" name="barcode" id="barcode">
        <button type="submit">Submit</button>
    </form>

    <script>
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector('#interactive')
            },
            decoder: {
                readers: ["code_128_reader", "ean_reader", "ean_8_reader", "code_39_reader",
                    "code_39_vin_reader", "codabar_reader", "upc_reader", "upc_e_reader",
                    "i2of5_reader", "2of5_reader", "code_93_reader"
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

        Quagga.onDetected(function(result) {
            var code = result.codeResult.code;
            document.getElementById('barcode').value = code;
            document.getElementById('barcode-form').submit();
        });
    </script>
</body>

</html>
