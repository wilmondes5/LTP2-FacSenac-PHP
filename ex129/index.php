<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST["botao"])) {
            include_once("Sequencia.php");
            
            $sequencia = new Sequencia();
            $sequencia->setInicio($_POST["inicio"]);
            $sequencia->setFim($_POST["fim"]);
            
            if($_POST["mostrar"] == "todos")
                $sequencia->exibirTodos();
            elseif($_POST["mostrar"] == "pares")
                $sequencia->exibirPares();
            elseif($_POST["mostrar"] == "impares")
                $sequencia->exibirImpares();
        }

        else {
        
    ?>
    <form action="index.php" method="post">
        Selecione o valor inicial:
        <select name="inicio">
            <option value="1" selected>1</option>;
            
            <?php
                for($i = 2; $i <= 100; $i++) {
                    echo '<option value ="'.$i.'">'.$i.'</option>';
                }
            ?>
        </select>
        <br> <br>
        Selecione o valor final:        
        <select name="fim">
             <?php
                for($i = 2; $i <= 100; $i++) {
                    echo '<option value ="'.$i.'">'.$i.'</option>';
                }
            ?>
            
        <option value="100" selected>100</option>
        </select>
        
        <br><br>
        Mostrar: <br>
        <input type ="radio" name ="mostrar" value="todos" checked>
        Exibir todos <br>
        <input type ="radio" name ="mostrar" value="pares" checked>
        Apenas pares <br>
        <input type ="radio" name ="mostrar" value="impares" checked>
        Apenas ímpares <br>
        <input type="submit" name="botao" value="Enviar">
    </form>
    
    <?php
        }
    ?>
</body>
</html>