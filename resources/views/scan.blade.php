<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Scanner</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        #video-container {
            width: 500px;
            height: 300px;
            background-color: #000;
            position: relative;
        }

        #video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
        }

        #scan-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }

        #result-container {
            width: 500px;
            padding: 20px;
            border: 1px solid #ccc;
            margin-top: 20px;
            display: none;
        }

        #result {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div id="video-container">
        <video id="video" autoplay></video>
    </div>

    <button id="scan-button">Scan Barcode</button>

    <div id="result-container">
        <p id="result"></p>
    </div>

    <script src="script.js"></script>
    <script>
        const video = document.getElementById('video');
const scanButton = document.getElementById('scan-button');
const resultContainer = document.getElementById('result-container');
const result = document.getElementById('result');

let barcodeScanner = null; // Placeholder for the barcode scanner instance

// Access the camera and display the video stream
navigator.mediaDevices.getUserMedia({ video: true })
    .then(stream => {
        video.srcObject = stream;
    })
    .catch(error => {
        console.error('Error accessing camera:', error);
    });

// Start scanning when the scan button is clicked
scanButton.addEventListener('click', () => {
    if (!barcodeScanner) {
        // Initialize the barcode scanner library (e.g., QuaggaJS)
        const decoder = {
            // Replace with your chosen decoder library (e.g., QuaggaJS)
        };

        barcodeScanner = new decoder({
            inputStream: {
                target: video,
            },
            onDetected: (result) => {
                displayResult(result.code);
            },
        });

        barcodeScanner.start();
    }
});

function displayResult(barcodeData) {
    result.textContent = barcodeData;
    resultContainer.style.display = 'block';
}
    </script>
</body>
</html>