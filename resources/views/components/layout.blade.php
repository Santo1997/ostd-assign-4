<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Contact Management</title>
</head>
<body>

<nav class="navbar text-center">
    <ul class="menu menu-horizontal bg-base-200 rounded-box mx-auto">
        <li><a href="/contacts">Contacts</a></li>
        <li><a href="/contacts/create">Create New Contact</a></li>
    </ul>
</nav>

<main>
    {{$slot}}
</main>
</body>
</html>
