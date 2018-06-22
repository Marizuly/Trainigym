<!------ Include the above in your HEAD tag ---------->
<!------ Include the above in your HEAD tag ---------->
<!-- <div class="well" style="background-color:#E7E3E2"> -->
<div class="well">
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <img src="img/logo.png" alt="" class="img-responsive" id="center" width="70%" height="70%">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="active" id="login-form-link">Iniciar sesión</a>
                            <!-- <h4 style="color:green">Iniciar sesión</h4> -->
                        </div>
                        <div class="col-xs-6">
                        <a href="<?= URL ?>registro" class="btn btn-default">Regístrate ahora</a>
                        <!-- <a href="" id="register-form-link" class="btn btn-default">Regístrate ahora</a> -->
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" action="<?php URL ?>Login/inicioAdmin" method="POST" role="form" style="display: block;">
                                <div class="form-group">
                                    <input type="text" name="correo" id="username" tabindex="1" maxlength="60" class="form-control" placeholder="Usuario" value="">
                                </div>

                                <div class="form-group">
                                    <input type="password" name="contrasena" id="password" tabindex="2" class="form-control" placeholder="Contraseña">
                                </div>

                                <div class="form-group text-center">
                                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                    <label for="remember"> Recordarme</label>
                                </div>
                                
                                <div class="form-group">
                                        <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="login" id="login-submit" tabindex="4" class="form-control btn btn-success" value="Iniciar sesión">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <a href="" tabindex="5" class="forgot-password">¿Has olvidado tu contraseña?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php if(isset($_SESSION['mensaje'])){
    echo $_SESSION['mensaje'];
    unset($_SESSION['mensaje']);
}


?>