<!DOCTYPE html>
<html>

<head>
    <title>Barcode Scanner</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
    <style>
        #interactive.viewport {
          width: 100%;
          height: 100px;
        }
      </style>
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
    $(document).ready(function() {
        if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
            alert('Media Devices API or getUserMedia not supported');
            return;
        }

        console.log('Initializing Quagga...');
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
                console.error('Error initializing Quagga:', err);
                alert('Error initializing Quagga: ' + err);
                return;
            }
            console.log("Initialization finished. Ready to start");
            Quagga.start();
        });

        Quagga.onDetected(function(result) {
            var code = result.codeResult.code;
            console.log('Barcode detected:', code);
            $('#barcode').val(code);
            $('#barcode-form').submit();
        });

        Quagga.onProcessed(function(result) {
            if (result) {
                console.log('Image processed successfully');
                var drawingCtx = Quagga.canvas.ctx.overlay,
                    drawingCanvas = Quagga.canvas.dom.overlay;

                if (result.boxes) {
                    drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")), parseInt(
                        drawingCanvas.getAttribute("height")));
                    result.boxes.filter(function(box) {
                        return box !== result.box;
                    }).forEach(function(box) {
                        Quagga.ImageDebug.drawPath(box, {
                            x: 0,
                            y: 1
                        }, drawingCtx, {
                            color: "green",
                            lineWidth: 2
                        });
                    });
                }

                if (result.box) {
                    Quagga.ImageDebug.drawPath(result.box, {
                        x: 0,
                        y: 1
                    }, drawingCtx, {
                        color: "#00F",
                        lineWidth: 2
                    });
                }

                if (result.codeResult && result.codeResult.code) {
                    Quagga.ImageDebug.drawPath(result.line, {
                        x: 'x',
                        y: 'y'
                    }, drawingCtx, {
                        color: 'red',
                        lineWidth: 3
                    });
                }
            }
        });
    });
</script>
</body>

</html>
