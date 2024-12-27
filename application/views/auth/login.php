<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #ffffff20;
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h2 {
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-group {
            position: relative;
        }

        input {
            padding: 0.8rem;
            border: none;
            border-radius: 7px;
            font-size: 1.1rem;
            width: 100%;
        }

        small {
            position: absolute;
            bottom: -1.5rem;
            left: 0;
            font-size: 0.85rem;
            color: #ff6666;
        }

        button {
            padding: 0.8rem;
            background: #2575fc;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #1b5fcc;
        }

        .toggle {
            margin-top: 1rem;
            font-size: 0.9rem;
            cursor: pointer;
            color: #eee;
        }

        .toggle a {
            color: #eee;
            text-decoration: none;
        }

        .toggle a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('auth'); ?>" method="POST">
            <div class="form-group">
                <input type="text" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small>', '</small>'); ?>
            </div>

            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password">
                <?= form_error('password', '<small>', '</small>'); ?>
            </div>
            <button type="submit">Login</button>
            <p class="toggle"><a href="<?= base_url('auth/registration'); ?>">Don't have an account? Register</a></p>
        </form>
    </div>
</body>

</html>