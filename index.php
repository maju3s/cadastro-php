<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>mini curso full stack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
<body class="bg-light">
    <?php
    
    if(isset($_POST['acao'])){
//meu form foi enviado?

//se sim, vamos validar

$nome= strip_tags($_POST['nome']);

$sobrenome= strip_tags($_POST['sobrenome']);

$endereco= $_POST['endereco'];

if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)==false){
echo 'email inválido';

}else{
    //passamos na validação e agora vamos inserir no banco de dados
$email= $_POST['email'];

$pdo= new PDO('mysql:host=localhost;dbname=tutorial', 'root', '');

$sql = $pdo->prepare("INSERT INTO clientes VALUES(null,?,?,?,?)");
$sql->execute(Array ($nome,$sobrenome,$endereco,$email));

    echo 'inserido com sucesso';
}

}
?>
    
<div class="container">
<main>
    <div class="py-5 text-center">
    <h2>Formulário de cadastro</h2>
    <p class="lead">Neste formulário vamos cadastrar um cliente</p>
    </div>

    <div class="row g-5">
    <div class="col-md-12 ">
        <h4 class="mb-3">Informações para cadastro</h4>
        <form class="needs-validation" method="post">
        <div class="row g-3">
            <div class="col-sm-6">
            <label for="firstName" class="form-label">primeiro nome</label>
            <input name="nome" type="text" class="form-control" id="nome" placeholder="" value="" required>
            <div class="invalid-feedback">
                Valid first name is required.
            </div>
            </div>

            <div class="col-sm-6">
            <label for="lastName" class="form-label">segundo nome</label>
            <input name="sobrenome" type="text" class="form-control" id="sobrenome" placeholder="" value="" required>
            <div class="invalid-feedback">
                Valid last name is required.
            </div>
            </div>

            <!--<div class="col-12">
            <label for="username" class="form-label">Username</label>
            <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="username" placeholder="Username" required>
            <div class="invalid-feedback">
                Your username is required.
                </div>
            </div>
            </div>-->

            <div class="col-12">
            <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
            <input name="email" type="email" class="form-control" id="email" placeholder="">
            <div class="invalid-feedback">
            seu endereço de email
            </div>
            </div>

            <div class="col-12">
            <label for="address" class="form-label">Address</label>
            <input name="endereco" type="text" class="form-control" id="address" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
                Please enter your shipping address.
            </div>
            </div>

            

        

        

        
        </div>

        

        <hr class="my-4">

        <button class="w-100 btn btn-primary btn-lg" name="acao" type="submit">Cadastrar</button>
        </form>
    </div>
    </div>
</main>

<footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2021 Company Name</p>
    <ul class="list-inline">
    <li class="list-inline-item"><a href="#">Privacy</a></li>
    <li class="list-inline-item"><a href="#">Terms</a></li>
    <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
</footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>