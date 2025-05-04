<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página en Construcción</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            background-color: #000;
            color: #0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Courier New', Courier, monospace;
            font-size: 24px;
        }

        .console {
            width: 80%;
            max-width: 600px;
            background-color: #111;
            border: 2px solid #333;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
        }

        .line {
            white-space: nowrap;
            overflow: hidden;
            display: inline-block;
            animation: typing 3s steps(30, end) 1 normal forwards, blink 0.5s step-end infinite;
        }

        @keyframes typing {
            from { width: 0; }
            to { width: 100%; }
        }

        @keyframes blink {
            50% { border-right: 2px solid #0f0; }
        }
    </style>
</head>
<body>
    <div class="console">
        <div class="line">página en construcción_</div>
    </div>
</body>
</html>
