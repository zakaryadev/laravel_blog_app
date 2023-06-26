<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title }}</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/login.css">
</head>

<body class="snippet-body">
    {{ $slot }}
</body>
<script>
    const input = document.querySelectorAll('#password');
    const hider = document.querySelectorAll('.hider');
    for (let i = 0; i < 2; i++) {
        hider[i].addEventListener('click', (e) => {
            e.preventDefault();
            if (input[i].getAttribute('type') == 'password') {
                input[i].setAttribute('type', 'text')
            } else {
                input[i].setAttribute('type', 'password')
            }
        })
    }
</script>

</html>
