<?php

// Modelo de objetos que se corresponde con la tabla de MySQL
class Serie extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
}

/* Obtención de la lista de series */

$app->get('/series', function ($req, $res, $args) {

    // Creamos un objeto collection + json con la lista de series

    // Obtenemos la lista de series de la base de datos y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $series = json_decode(\Serie::all());

    // Mostramos la vista
    return $this->view->render($res, 'serieslist_template.php', [
        'items' => $series
    ]);
})->setName('series');


/*  Obtención de una series en concreto  */
$app->get('/series/{name}', function ($req, $res, $args) {

    // Creamos un objeto collection + json con la película pasada como parámetro

    // Obtenemos la series de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \Serie::find($args['name']);  
    $serie = json_decode($p);

    // Mostramos la vista
    return $this->view->render($res, 'series_template.php', [
        'item' => $serie
    ]);

});

//Borrar series
$app->delete('/series/{name}', function ($req, $res, $args) {
    //Le pasamos la variable para que la encuentre
    $serie = Serie::find($args['name']);
    //Borramos la pelicula encontrada
    $serie->delete();
});

//Guardar nueva pelicula
$app->post('/series', function ($req, $res, $args)  {
    $template = $req->getParsedBody();

    $datos = $template['template']['data'];
    //longitud del vector
    $longitud = count($datos);
    //bucle que recorre vector
    for ($i = 0; $i < $longitud; $i++)
    {
        switch($datos[$i]['name'])
        {
        case "name":
            $nombre = $datos[$i]['value'];
            break;
        case "descripcion":
            $descripcion = $datos[$i]['value'];
            break;
        case "temporadas":
            $temporadas = $datos[$i]['value'];
            break;
        case "cadena":
            $cadena = $datos[$i]['value'];
            break;
        case "categoria":
            $categoria = $datos[$i]['value'];
            break;
        }
    }
    $nueva_serie = new Movie;
    $nueva_serie['name'] = $nombre;
    $nueva_serie['descripcion'] = $descripcion;
    $nueva_serie['temporadas'] = $temporadas;
    $nueva_serie['cadena'] = $cadena;
    $nueva_serie['categoria'] = $categoria;

    $nueva_serie->save();
});
//Actualizar pelicula
$app->put('/series/{id}', function ($req, $res, $args) {
    $template = $req->getParsedBody();
    $datos = $template['template']['data'];
    //longitud del vector
    $longitud = count($datos);
    //bucle que recorre vector
    for ($i = 0; $i < $longitud; $i++)
    {
        switch($datos[$i]['name'])
        {
        case "name":
            $nombre = $datos[$i]['value'];
            break;
        case "descripcion":
            $descripcion = $datos[$i]['value'];
            break;
        case "temporadas":
            $temporadas = $datos[$i]['value'];
            break;
        case "cadena":
            $cadena = $datos[$i]['value'];
            break;
        case "categoria":
            $categoria = $datos[$i]['value'];
            break;
        }
    }
  
    $nueva_serie = Movie::find($args['id']);
    $nueva_serie['name'] = $nombre;
    $nueva_serie['descripcion'] = $descripcion;
    $nueva_serie['temporadas'] = $temporadas;
    $nueva_serie['cadena'] = $cadena;
    $nueva_serie['categoria'] = $categoria;
  
    $nueva_serie->save();

});

?>
