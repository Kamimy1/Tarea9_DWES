<?php
/**
 * Archivo que muestra una lista de Pokémon de color rojo
 * 
 * Se utiliza la API de PokeAPI a traves de la librería PokePHP para obtener
 * y mostrar una lista de los primeros cinco Pokémon de color rojo
 * 
 * @package PokemonRedList
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Rojos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="fondo-rojo">
    <div class="container">
        <h1>Pokémon de color rojo</h1>
        
        <?php
        /**
         * Se necesita la librería autoload de Composer para utilizar PokePHP
         */
        require 'vendor/autoload.php'; 
        use PokePHP\PokeApi;

        /**
         * Instancia de la API para realizar solicitudes
         * 
         * @var PokeApi $api
         */
        $api = new PokeApi();
        
        /**
         * Obtiene la lista de Pokémon de color rojo desde la API
         * 
         * @var string $response Respuesta en formato JSON de la API
         * @var array $data Datos decodificados de la respuesta JSON
         */
        $response = $api->resourceList('pokemon-color/red');
        $data = json_decode($response, true);

        /**
         * Verifica si hay especies de Pokémon en la respuesta y las muestra en una lista
         */
        if (!empty($data['pokemon_species'])) {
            echo "<ul class='pokemon-list'>";
            
            /**
             * Recoge los primeros cinco Pokémon de color rojo y los muestra en una lista.
             * 
             * @var array $pokemon Datos de cada Pokémon
             */
            foreach (array_slice($data['pokemon_species'], 0, 5) as $pokemon) {
                echo "<li class='pokemon-item'>" . ucfirst($pokemon['name']) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p class='error-message'>No se encontraron Pokémon de color rojo.</p>";
        }
        ?>
    </div>
    
    <form action="index.php" method="get">
        <button type="submit" class="volver">Volver</button>
    </form>
    
    <footer>
        <p>Africa Maria Bermudez Mejias - 17488596V</p>
    </footer>
</body>
</html>
