<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerekli</title>
</head>
<style>
    .nav-bar {
        display: flex;
        background-color: rgb(223, 223, 255);
        color: black;
        flex-direction: row;
        justify-content: space-between;
        padding: 10px;
        gap: 10px;
        align-items: center;
    }

    .nav-bar a {
        text-decoration: none;
        border: 3px solid rebeccapurple;
        border-radius: 10px;
        padding: 10px;
    }
</style>
<nav class="nav-bar">
    <h3><a href="/allasics">Asics</a></h3>
    <h3><a href="/allbershka">Bershka</a></h3>
    <h3><a href="/allbiancolucci">Biancolucci</a></h3>
    <h3><a href="/alldefacto">Defacto</a></h3>
    <h3><a href="/allgrimelange">Grimelange</a></h3>
    <h3><a href="/allkoton">Koton</a></h3>
    <h3><a href="/alllcwaikiki">LCWaikiki</a></h3>
    <h3><a href="/allmango">Mango</a></h3>
    <h3><a href="/allmavi">Mavi</a></h3>
    <h3><a href="/allpullbear">PullBear</a></h3>
    <h3><a href="/allstradivarius">Stradivarius</a></h3>
</nav>

<body>
    <main>
        @yield('content')
    </main>
</body>

</html>