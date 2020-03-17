<!DOCTYPE html>
<html lang="en" class="h-100">
    <head>
        <meta content="text/html" charset="utf-8">
        <title>Task Manager</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="/css/style.css">

    </head>
    <body class="d-flex flex-column h-100">

    <header>
        <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">

            <a class="navbar-brand" href="/">Task Manager</a>
        </nav>
    </header>

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?php include 'app/views/' . $content_view; ?>
        </div>
    </main>
    <footer class="footer mt-auto py-3">
        <div class="container">
            <p>Test Task made by Astapchik Olga 2020</p>
            <a href="mailto:astapchik.olya@gmail.com">Contact me</a>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>

    <script type="text/javascript" src="/js/scripts.js"></script>
    
    </body>
</html>
