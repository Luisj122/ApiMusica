<?php

class VistaLogin{

    public static function mostrarLogin(){
        include_once("./cabecera.php");
      echo'
      <section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign in</h3>

            <form class="user" action="enrutador.php" method="POST">
                <div class="form-group">
                    <input type="email" class="form-control form-control-user"
                        name="email" aria-describedby="emailHelp"
                        placeholder="Enter Email Address...">
                </div><br>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user"
                        name="password" placeholder="Password">
                </div><br>
                
                <input type="hidden" name="accion" value="login">
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                </button>
                                                        
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>   ';
    }

}


?>