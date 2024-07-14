<!DOCTYPE html>
<html>

<head>
    <title>Barcode Scanner</title>
    <script src="https://cdn.jsdelivr.net/npm/quagga@5.0.2/dist/quagga.min.js"></script>
</head>

<body>
    <h1>Scan Barcode</h1>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <video id="video" width="300" height="200" style="border: 1px solid gray"></video>

    <form id="barcode-form" action="/scan" method="POST" style="display: none;">
        @csrf
        <input type="text" name="barcode" id="barcode">
        <button type="submit">Submit</button>
    </form>

    <script>
        // Initialize QuaggaJS decoder
        const decoder = QuaggaJS.decoder({
            locate: true, // Enable object location
            highlight: true, // Highlight detected codes
            debug: true // Print debugging messages
        });

        // Get references to video and canvas elements
        const videoElement = document.getElementById('scanner-video');
        const canvasElement = document.getElementById('scanner-canvas');

        // Start the camera and attach it to the video element
        navigator.mediaDevices.getUserMedia({
                video: true
            })
            .then(stream => {
                videoElement.srcObject = stream;

                // Attach decoder to the video stream
                decoder.init({
                    inputStream: {
                        target: canvasElement,
                        source: videoElement // Use videoElement as source
                    }
                });

                // Start decoding process
                decoder.start();
            });

        // Handle decoded codes
        decoder.onDetected(result => {
            const code = result.code; // Get the decoded code
            const boundingBox = result.boundingBox; // Get the bounding box coordinates

            // Display the decoded code and bounding box
            document.getElementById('scanner-results').innerHTML = `Code: ${code}<br>
        Bounding Box: ${boundingBox.x}, ${boundingBox.y}, ${boundingBox.width}, ${boundingBox.height}`;
        });
    </script>
</body>

</html>
