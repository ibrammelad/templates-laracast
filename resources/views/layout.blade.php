<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <style>
        .is-complete
        {
            text-decoration: line-through;
        }
    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <title>     @yield('title', 'laracast')</title>
</head>
<body>
<section class="section">
    <div class="is-fullheight-with-navbar">
        <a href="/project" class="button">Home</a>
        <a href="/project/create" class="button">Create</a>

    </div>
</section>
<section>
    <div class="container">
        @yield('content')
    </div>
</section>
</body>
</html>

