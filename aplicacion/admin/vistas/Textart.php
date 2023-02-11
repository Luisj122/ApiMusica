<?php
    class Textart{
        public static function texto(){

            include_once("./cabecera.php");
            echo '           
            
            <form action="enrutador.php" method="post">
            <center> 
                <h1>CHATGPT</h1>                         
                    <textarea id="w3review" name="articulo" rows="4" cols="50"></textarea><br>
                    
                    <input type="hidden" name="accion" value="verArticulo">    
                <button type="submit" class="btn btn-primary mt-2">GENERAR</button>
                <a href="enrutador.php?accion=verTodo" class="text-decoration-none btn btn-primary mt-2">VER ARTICULOS</a>  
                
                </center>
                
            </form>';
        }
    }
?>