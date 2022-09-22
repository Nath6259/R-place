<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R-place</title>
    <link rel="stylesheet" href="/mvc/style/style.css">
    <script src="/mvc/script/script.js" defer></script>
</head>
<body>
    <div class="conteneur">
        <div id="guide"></div>
        <canvas width="650" height="650" id="canvas"></canvas>
      </div>
      <div>
        <label for="colorInput">Set Color: </label>
        <input type="color" id="colorInput">
      </div>
      <div>
        <label for="toggleGuide">Show Guide: </label>
        <input type="checkbox" id="toggleGuide" checked>
      </div>
      <div>
        <button type="button" id="clearButton">Clear</button>
    </div>
    <footer class="retour">
        <a class="btn-retour" href="/mvc/apercu">Vers Apercu des Fresques</a>
    </footer>
</body>
</html>