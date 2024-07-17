<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Scanner</title>
    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
</head>
<body>
    <h1>Barcode Scanner</h1>
    <div id="reader" style="width: 600px;"></div>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            alert(`Code scanned = ${decodedText}`, decodedResult);

            // Kirim barcode ke server Laravel
            // fetch('{{ route('barcode.scan') }}', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
            //     },
            //     body: JSON.stringify({ barcode: decodedText })
            // })
            // .then(response => response.json())
            // .then(data => {
            //     console.log('Success:', data);
            //     // Tampilkan data produk atau informasi lainnya di sini
            // })
            // .catch((error) => {
            //     console.error('Error:', error);
            // });
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
</body>
</html>