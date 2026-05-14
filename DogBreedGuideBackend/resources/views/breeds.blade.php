<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kutyafajták - Breeds</title>
</head>
<body>
<h1>Kutyafajták csoportok szerint</h1>

<ul>
    @foreach($groups as $group)
        <li>
            <strong>{{ $group->name }}</strong>

            <ul>
                @foreach($group->types as $type)
                    <li>{{ $type->name }} (Származás: {{ $type->origin }}, Élettartam: {{ $type->lifetime }} év)</li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
</body>
</html>
