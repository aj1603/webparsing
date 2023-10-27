<!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width,
    initial-scale=1.0"> <title>Gerekli</title> </head> <style> .nav-bar { display: flex; background-color: rgb(223, 223,
    255); color: black; flex-direction: row; justify-content: space-between; padding: 5px; gap: 5px; align-items:
    center; } .nav-bar a { text-decoration: none; border: 3px solid rebeccapurple; border-radius: 10px; padding: 10px; }
    </style>
<nav class="nav-bar">
    <h3><a href="/products?page=1">P1</a></h3>
    <h3><a href="/products?page=2">P2</a></h3>
    <h3><a href="/products?page=3">P3</a></h3>
    <h3><a href="/products?page=4">P4</a></h3>
    <h3><a href="/products?page=5">P5</a></h3>
    <h3><a href="/products?page=6">P6</a></h3>
    <h3><a href="/products?page=7">P7</a></h3>
    <h3><a href="/products?page=8">P8</a></h3>
    <h3><a href="/products?page=9">P9</a></h3>
    <h3><a href="/haircaredb">AEF1</a></h3>
    <h3><a href="/hairmistdb">AEF2</a></h3>
    <h3><a href="/makeupdb">AEF3</a></h3>
    <h3><a href="/privatedb">AEF4</a></h3>
    <h3><a href="/skincaredb">AEF5</a></h3>
    <h3><a href="/create">Bahasy</a></h3>
    <h3><a href="/export">Export</a></h3>
    <h3><a href="/delete">DELETE</a></h3>
</nav>


<body>
    <main>
        @yield('content')
    </main>
</body>

</html>