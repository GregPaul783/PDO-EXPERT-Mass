<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwsbrief Inschrijving - Kwetsbaar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }
        h2 {
            color: #555;
            font-size: 1.5rem;
            margin-top: 30px;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .alert {
            margin-top: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            background: #f1f1f1;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Schrijf je in voor onze nieuwsbrief</h1>
        <form method="POST" action="" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="email" class="form-label">E-mailadres:</label>
                <input class="form-control" id="email" name="email" required>
                <div class="invalid-feedback">
                    Vul een geldig e-mailadres in.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Inschrijven</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            
            file_put_contents('emails.txt', $email . "\n", FILE_APPEND);
            echo '<div class="alert alert-success mt-3">E-mail opgeslagen!</div>';
            }
        ?>

        <h2>Opgeslagen E-mails</h2>
        <ul>
            <?php
            if (file_exists('emails.txt')) {
                $emails = file('emails.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                if (count($emails) > 0) {
                    foreach ($emails as $email) {
                        echo "<li>" . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</li>";
                    }
                } else {
                    echo "<li>Geen e-mails opgeslagen.</li>";
                }
            } else {
                echo "<li>Geen e-mails opgeslagen.</li>";
            }
            ?>
        </ul>
    </div>

    <!-- Bootstrap JS voor formulier validatie -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Bootstrap formulier validatie
        (function () {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>