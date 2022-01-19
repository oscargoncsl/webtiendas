<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Productos de la tienda</title>
</head>
<body>
    <p>Hola<!--El nombre-->!Te mandamos aqui la lista de la tienda que has solicitado! </p>

    <!--Lista de productos-->
    <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Descripción</th>
        <th scope="col">Precio</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <th scope="row">{{$producto->nombre}} </th>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->precio }}</td>
            </tr>
        @endforeach


    </tbody>
  </table>
</body>
</html>
