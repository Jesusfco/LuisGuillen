<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LuisGuillen Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    
</head>
<body>

    

    <div class"space">
    
        <div class="loginCard">
            <h1>Login</h1>

            <div class="row">

                <form class="col s12" method="POST" action="">

                {{ csrf_field() }}

                    <div class="row">

                        <div class="input-field col 12">
                            <i class="material-icons prefix">email</i>
                            <input type="email" name="email" required>
                            <label >Correo</label>
                        </div>

                        <div class="input-field col 12">
                            <i class="material-icons prefix">security</i>
                            <input type="password" name="password" required>
                            <label >Contraseña</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-default">Accesar</button>


                </form>
            </div>

        </div>



    </div>


    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    
    
</body>
</html>