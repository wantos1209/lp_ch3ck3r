<!DOCTYPE html>
<html>
<head>
    <title>Scan Barcode</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
</head>
<body>
    <div id="interactive" class="viewport"></div>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            Quagga.init({
                inputStream: {
                    name: "Live",
                    type: "LiveStream",
                    target: document.querySelector('#interactive')
                },
                decoder: {
                    readers: ["code_128_reader"]
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
                alert("Barcode detected: " + code);
                // Kirim data ke backend Laravel jika perlu
                // fetch('/scan', {
                //     method: 'POST',
                //     headers: {
                //         'Content-Type': 'application/json',
                //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
                //     },
                //     body: JSON.stringify({ code: code })
                // });
            });
        });
    </script>
</body>
</html>