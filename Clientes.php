<?php
 session_start();
include('conexao.php');
?>



<!DOCTYPE html>
<html>
<head>
  <title>Clientes</title>


<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


</head>


<body>



  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><big><big><i class="fa fa-arrow-left"></i></big></big></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</nav>


<div class="container">


   <br>

       <div class="row">
           <div class="col-sm-12">
            <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalExemplo">Inserir Novo </button>

           </div>
         
        </div>

          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"> Tabela de Clientes</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">

                       <!--CADASTRAR -->
                        <?php 
                          $query = "select * from clientes order by nome asc ";
                          
                          $result = mysqli_query($conexao, $query);
                          //$dado = mysqli_fetch_array($result);
                          $row = mysqli_num_rows($result);           
                         
                        if($row == ''){

                          echo "<h3> Não existem dados cadastrados no banco </h3>";

                        
                        }else{

                          ?>

                      <table class="table">
                        <thead class=" text-primary">
                          
                          <th>
                            Nome
                          </th>
                          <th>
                            Telefone
                          </th>
                          <th>
                            Endereço
                          </th>
                           <th>
                            Email
                          </th>
                            <th>
                            CPF
                          </th>
                          <th>
                            Data
                          </th>                        
                          <th>
                            Ações

                          </th>
                        </thead>
                        <tbody>

                          <?php 

                          while($res_1 = mysqli_fetch_array($result)){
                          $nome = $res_1["nome"];
                          $telefone = $res_1["telefone"];
                          $endereco = $res_1["endereco"];
                          $email = $res_1["email"];
                          $cpf = $res_1["cpf"];
                          $data = $res_1["data"]; 
                          $id = $res_1["id"];

                          $data2 = implode('/', array_reverse(explode('-', $data)));

                          ?>

                          <tr>
                            <td><?php echo $nome; ?></td>
                            <td><?php echo $telefone; ?></td>
                            <td><?php echo $endereco; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $cpf; ?></td>
                            <td><?php echo $data2; ?></td>
                            <td>
                              
                              <a class="btn  btn-info"  href="clientes.php?func=edita&id=<?php echo $id; ?>"><i class="fa fa-pencil-square-o"></i></a>

                              <a class="btn  btn-danger"  href="clientes.php?func=deleta&id=<?php echo $id; ?>"><i class="fa fa-minus-square"></i></a>




                            </td>
                          </tr>

                          <?php  
                            }
                          ?>
                                                                                              

                        </tbody>
                      </table>
                      <?php 
                                }
                       ?>
                    </div>
                  </div>
                </div>
              </div>

</div>
<!-- Modal -->
      <div id="modalExemplo" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Clientes</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action=""> 
              <div class="form-group">
                <label for="id_produto">Nome</label>
                <input type="text" class="form-control mr-2" name="txtnome" placeholder="Nome" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Telefone</label>
                <input type="text" class="form-control mr-2" name="txttelefone"
                id="txttelefone"
                 placeholder="Telefone" required>
              </div>
              <div class="form-group">
                <label for="quantidade">Endereço</label>
                <input type="text" class="form-control mr-2" name="txtendereco" placeholder="Endereço" required>
              </div>
               <div class="form-group">
                <label for="fornecedor">Email</label>
                 <input type="email" class="form-control mr-2" name="txtemail" placeholder="Email" required>
              </div>
              <div class="form-group">
                <label for="fornecedor">CPF</label>
                 <input type="text" class="form-control mr-2" name="txtcpf"
                 id="txtcpf" placeholder="CPF" required>
              </div>
            </div>
                   
            <div class="modal-footer">
               <button type="submit" class="btn btn-success mb-3" name="button" >Salvar </button>


                <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
                  </form>

            </div>
          </div>
        </div>
      </div>    




</body>
</html>

<!--CADASTRAR -->

<?php 
if(isset($_POST['button'])){
 $nome = $_POST['txtnome'];
 $telefone = $_POST['txttelefone'];
 $endereco = $_POST['txtendereco'];
 $email = $_POST['txtemail'];
 $cpf = $_POST['txtcpf'];  

 //Verificar se o cpf já está cadastrado
$query_verificar = "select * from clientes where cpf = '$cpf' ";
 
$result_verificar = mysqli_query($conexao, $query_verificar);
$dado_verificar = mysqli_fetch_array($result_verificar);
$row_verificar = mysqli_num_rows($result_verificar);


if($row_verificar > 0){
  echo "<script language='javascript'> window.alert('CPF já Cadastrado !'); </script>";
  exit();


}





$query = "INSERT into clientes (nome, telefone, endereco, email, cpf, data) VALUES ('$nome', '$telefone', '$endereco', '$email' , '$cpf',curDATE() )";

$result = mysqli_query($conexao, $query);

if($result == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Salvo com Sucesso!'); 
    window.location='clientes.php' </script>";
    
}
}
?>

<!---EXCLUIR---->

<?php 
if(@$_GET['func'] == 'deleta'){
  $id = $_GET['id'];
  $query = "DELETE FROM clientes where id = '$id'";
  mysqli_query($conexao, $query);
  echo "<script language='javascript'> window.location='clientes.php'; </script>";



}

?>

<!---EDITAR---->

<?php 
if(@$_GET['func'] == 'edita'){   ?>

<!-- Modal -->
      <div id="modalEditar" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Clientes</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action=""> 
              <div class="form-group">
                <label for="id_produto">Nome</label>
                <input type="text" class="form-control mr-2" name="txtnome" placeholder="Nome" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Telefone</label>
                <input type="text" class="form-control mr-2" name="txttelefone"
                id="txttelefone"
                 placeholder="Telefone" required>
              </div>
              <div class="form-group">
                <label for="quantidade">Endereço</label>
                <input type="text" class="form-control mr-2" name="txtendereco" placeholder="Endereço" required>
              </div>
               <div class="form-group">
                <label for="fornecedor">Email</label>
                 <input type="email" class="form-control mr-2" name="txtemail" placeholder="Email" required>
              </div>
              <div class="form-group">
                <label for="fornecedor">CPF</label>
                 <input type="text" class="form-control mr-2" name="txtcpf"
                 id="txtcpf" placeholder="CPF" required>
              </div>
            </div>
                   
            <div class="modal-footer">
               <button type="submit" class="btn btn-success mb-3" name="button" >Salvar </button>


                <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
                  </form>

            </div>
          </div>
        </div>
      </div>    




<script> $("#modalEditar").modal("show"); </script>





<?php 
 
  }

  ?>



<!---Mascaras---->

<script type="text/javascript">
  $(document).ready(function(){
  $('#txttelefone').mask('(00) 00000-0000');
  $('#txtcpf').mask('000.000.000-00');
  });
</script>






   
