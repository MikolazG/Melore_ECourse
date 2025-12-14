<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #198754;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 0 0 8px 8px;
        }
        .info-row {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #198754;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>New Contact Form Submission</h2>
    </div>

    <div class="content">
        <div class="info-row">
            <span class="label">From:</span> {{ $data['name'] }}
        </div>

        <div class="info-row">
            <span class="label">Email:</span> {{ $data['email'] }}
        </div>

        <div class="info-row">
            <span class="label">Subject:</span> {{ $data['subject'] }}
        </div>

        <div class="info-row">
            <span class="label">Message:</span><br>
            {{ $data['message'] }}
        </div>
    </div>
</body>
</html>
