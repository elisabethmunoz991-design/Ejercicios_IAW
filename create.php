<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Alta de módulos</h1>
    <form action="store.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text"
               name="nombre"
               id="nombre"
               value=""
               placeholder="Introduce el nombre del módulo. Ej: Implantación de aplicaciones web"
               required
               minlength="2"
               maxlength="100">
        <br>
        <label for="abreviatura">Abreviatura:</label>
        <input type="text"
               name="abreviatura"
               id="abreviatura"
               value=""
               placeholder="Introduce la abreviatura del módulo. Ej: IAW"
               required
               minlength="1"
               maxlength="5">
        <br>
        <label for="creditos">Créditos:</label>
        <input type="number"
               name="creditos"
               id="creditos"
               min="0.00"
               max="99.99"
               step="0.01"
               placeholder="Introduce los créditos del módulo. Ej: 8.00"
               required>
        <br>
        <label for="horassemanales">Horas semanales:</label>
        <input type="number"
               name="horassemanales"
               id="horassemanales"
               min="0"
               max="32767"
               step="1"
               placeholder="Introduce las horas semanales del módulo. Ej: 5">
        <br>
        <button type="submit">Alta módulo</button>

    </form>
</body>
</html>
