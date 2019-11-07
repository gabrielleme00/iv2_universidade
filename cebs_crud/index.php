<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TreinamentoPHP | CRUD</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Open Iconic -->
    <link rel="stylesheet" href="font/css/open-iconic.css">
    <link rel="stylesheet" href="font/css/open-iconic-bootstrap.css">
    <!-- Custom -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Treinamento<b>PHP</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="#" class="nav-link">CRUD</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-4">
        <div class="row py-2">
            <div class="col-md-12 d-flex justify-content-between">
                <h2 class="text-light">Funcionários</h2>
                <button class="btn btn-success" onclick="window.location.href = 'create.php'">
                    <span class="oi oi-plus"></span>
                    <span>Novo Funcionário</span>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-dark table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Salário</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once "config.php";

                            $sql = "SELECT * FROM employees";

                            if($stmt = mysqli_prepare($link, $sql)){
                                
                                if(mysqli_stmt_execute($stmt)){
                                    $result = mysqli_stmt_get_result($stmt);
                            
                                    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                        
                                        $id = $row["id"];
                                        $name = $row["name"];
                                        $address = $row["address"];
                                        $salary = $row["salary"];

                                        echo '
                                        <tr>
                                            <td>'.$id.'</td>
                                            <td>'.$name.'</td>
                                            <td>'.$address.'</td>
                                            <td>R$'.$salary.'</td>
                                            <td>
                                                <button class="btn btn-warning mx-2">
                                                    <span class="oi oi-pencil"></span>
                                                </button>
                                                <button class="btn btn-danger">
                                                    <span class="oi oi-x"></span>
                                                </button>
                                            </td>
                                        </tr>';
                                    }
                                    
                                }
                            }
                             
                            // Close statement
                            mysqli_stmt_close($stmt);
                            
                            // Close connection
                            mysqli_close($link);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>