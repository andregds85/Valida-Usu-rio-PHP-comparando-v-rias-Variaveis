<?php    

/* Recendo via post do formulario de outra página */
$usuario=$_POST["email"];
$senha=$_POST["senha"];
$cnes=$_POST["cnes"];
$senha1=md5($senha); 

include("../conecta.php");   
 // executa a consulta           

 /* Fazendo uma consulta na tabela usuario somente do usuario */   
  $cmd = "select * from usuarios where usuario= '$usuario'";
    
    $produtos = mysqli_query($con,$cmd); 
    echo "<b>";
    echo "Total de Registros : ".$total = mysqli_num_rows($produtos); 
    echo "<br>";

  /* buscando todos os dados relacionado ao usuário selecionado */
    while ($produto = mysqli_fetch_array($produtos)) { 
       
      echo "<tbody>";
      echo"<tr>";
      echo "<th scope='row'>";
      echo "<a href='ListarDetalhadamente.php?cod=$produto[id]'>";
      echo $produto['id']." - ";
      echo "<br>";    
    
      echo "</a>";     
      echo "</th>";  
      echo "<td>";
      echo $produto['nome']." - "; 
      $nomeBD=$produto['nome'];
      echo "<br>";    
        
      echo"</td>";
      echo "<td>";
      echo $produto['sobrenome']." - "; 
      $sobrenomeBD=$produto['sobrenome'];
      echo"</td>";
      echo "<td>";
      echo $produto['usuario'];
      $usuarioBD=$produto['usuario'];
      echo "<br>";    
      echo"</td>"; 

      echo "<td>";
      echo $produto['telefone']." - "; 
      $telefoneBD=$produto['telefone'];
      echo "<br>";    
    
      echo"</td>";
      echo "<td>";
      echo $produto['cnes']." - "; 
      $cnesBD=$produto['cnes']; 
      echo "<br>";    
      echo "<br>";    
    
      echo"</td>";
      echo "<td>";
      echo"</td>"; 
      echo $senhaBD=($produto['senha']); 
      echo "</tr>";        
      echo"</tbody>";  
      echo "<br>";    
      echo "<br>";
      echo "<br>";       

  } 
      
      /* depois de ter buscado os dados do usuário tem como comparar todos os dados do usuário  que quiser */

    if (($usuarioBD==$usuario )&& ($senhaBD==$senha1) && ($cnes==$cnesBD)){
      
    echo "Deu Certo"; 
    $_SESSION["acesso"] = 1;
    session_start();
    $_SESSION["acesso"]="acesso";
    header("location: fsv.php");
          
    }else{
    echo "deu errado";
    header("location: sair.php");   
        
  }


?>






   



