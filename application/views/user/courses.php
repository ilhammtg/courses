<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursus Online - Materi</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 1.5em;
            font-weight: bold;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .pdf-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }

        .pdf-card h2 {
            margin-top: 0;
            font-size: 1.2em;
            color: #4CAF50;
        }

        iframe {
            width: 100%;
            height: 500px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        footer {
            text-align: center;
            padding: 10px;
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        Kursus Online - Materi Kursus
    </header>

    <div class="container">
    <?php foreach ($materials as $material): ?>
        <div class="pdf-card">
            <h2>Materi: <?= isset($material['title']) ? htmlspecialchars($material['title']) : 'Judul Tidak Tersedia'; ?></h2>
            <p><?= isset($material['description']) ? htmlspecialchars($material['description']) : 'Deskripsi Tidak Tersedia'; ?></p>
            <iframe src="uploads/<?= isset($material['pdf_file']) ? htmlspecialchars($material['pdf_file']) : ''; ?>"></iframe>
        </div>
        <?php endforeach; ?>
    </div>

    <footer>
        © 2024 Kursus Online - Semua Hak Dilindungi
    </footer>
</body>
</html>
