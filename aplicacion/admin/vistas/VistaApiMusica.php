<?php
class VistaApiMusica
{
    public static function render()
    {
        include('./cabecera.php');

        require_once('vendor/autoload.php');

  
        $client = new \GuzzleHttp\Client();

        //Vendría del textare

        $response = $client->request('GET', 'http://nodeapi:3000/api/songs', [
            'body' => '{}',
            'headers' => [
                'Authorization' => $_SESSION['token'], 
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

        $respuesta = $response->getBody();

        $songs = json_decode($respuesta);


        echo '<table class="table">
                <h3><a href="enrutador.php?accion=toprated" class="text-decoration-none">Top Rated</a></h3>
                <thead class="table-dark">
                    <th>Titulo</th>
                    <th>Grupo</th>
                    <th>Duracion</th>
                    <th>Anio</th>
                    <th>Genero</th>
                    <th>Puntuacion</th>
                    <th>Valoracion</th>
                    <th>Accion</th>
                </thead>
                <tbody>';
        
        
        foreach ($songs as $value){
            echo '<form class="user" action="enrutador.php" method="POST">';
            echo '<tr>';
            echo "<td>".$value->titulo . "</td>";
            echo "<td>".$value->grupo . "</td>";
            echo "<td>".$value->duracion . "</td>";
            echo "<td>".$value->anio . "</td>";
            echo "<td>".$value->genero . "</td>";           
            echo "<td>".$value->puntuacion . "</td>";
            echo "<td>";
                  echo "<select name='puntuar'>
                          <option value='0'></option>;
                          <option value='1'>1</option>;
                          <option value='2'>2</option>;
                          <option value='3'>3</option>;
                          <option value='4'>4</option>;
                          <option value='5'>5</option>;
                        </select>";
                        
            echo "<input type='hidden' name='accion' value='puntuacionV'></td>";
            echo '<td><button type"submit" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
          </svg></td>';

            echo "<input type='hidden' name='id' value='" . $value->_id ."'>";  
            echo "</tr>";

            
            echo '</form>';

        }
       
        echo '</tbody>
        </table>';

      
    }
}


?>