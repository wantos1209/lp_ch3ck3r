<!DOCTYPE html>
<html>

<head>
    <title>Barcode Scanner</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
    <style>
        #interactive.viewport {
            width: 100%;
            max-width: 100vw; /* Sesuaikan dengan lebar viewport */
            height: auto;
            border: 1px solid #000;
            overflow: hidden;
        }

        /* Menambahkan pengaturan CSS untuk orientasi lanskap dan potret */
        .portrait #interactive video {
            transform: rotate(90deg);
            transform-origin: center center;
            width: auto;
            height: 100vh; /* Tinggi penuh saat potret */
        }

        .landscape #interactive video {
            transform: none;
            width: 100%;
            height: auto;
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
        function updateOrientation() {
            if (window.innerHeight > window.innerWidth) {
                document.body.classList.add('portrait');
                document.body.classList.remove('landscape');
            } else {
                document.body.classList.add('landscape');
                document.body.classList.remove('portrait');
            }
        }

        $(document).ready(function() {
            if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                alert('Media Devices API or getUserMedia not supported');
                return;
            }

            updateOrientation(); // Atur orientasi saat pertama kali
            window.addEventListener('resize', updateOrientation); // Atur orientasi saat perangkat dirotasi

            console.log('Initializing Quagga...');
            Quagga.init({
                inputStream: {
                    name: "Live",
                    type: "LiveStream",
                    target: document.querySelector('#interactive'),
                    constraints: {
                        facingMode: "environment" // Menggunakan kamera belakang jika ada
                    }
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
                alert('Barcode detected: ' + code);
                $('#barcode').val(code);
            });

            Quagga.onProcessed(function(result) {
                if (result) {
                    console.log('Image processed successfully');
                    var drawingCtx = Quagga.canvas.ctx.overlay,
                        drawingCanvas = Quagga.canvas.dom.overlay;

                    if (result.boxes) {
                        drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")), parseInt(drawingCanvas.getAttribute("height")));
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
                            },
                            drawingCtx, {
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
