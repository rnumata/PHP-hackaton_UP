<html>
<head>

</head>
<body>
    <div>
        <form method="post" action="anagrama.php">
            <div>
                <label for="texto">Texto</label>
                <input type="text" id="texto" name="texto" maxlength="16">
            </div></br>

            <div>
                <button type="submit">Gerar Anagrama</button>
            </div>
        </form>
    </div>

<?php

    /* Função file lê arquivo e retorna um array */
    $f = file("lista.txt");

    /* inicialização da variável */
    $texto = "";
    $lista = array();


    if(empty($_POST)){

    } else {
        $texto = $_POST['texto'];

        /* Funcao preg_match verifica se $texto contém só letras e maiúsculas */
        if(preg_match( '/[A-Z]/' , $texto)) {

            echo "Palavra digitada => ".$texto."</br>";
            $anagrama = array();

            /* Popula um array com o anagrama da variável $texto */
            for ($i = 0; $i < 10000; $i++) {
                array_push($anagrama, str_shuffle($texto));
            }

            /* Função array_unique remove valores duplicados de um array */
            $lista = array_unique($anagrama);

        } else {
            echo "<script>alert('Somente letras Maiúsculas [A-Z]');</script>";
        }
    }


    /* foreach para comparar e imprimir os anagramas que constam no .txt */
    echo "</br>";

    echo "Anagrama que consta na lista: "."</br>";
    foreach ($lista as $listaII){
        foreach ($f as $fII){
            if($listaII == trim($fII)){
                echo $listaII." == ".trim(($fII));
                echo "</br>";
            }
        }
    }


?>
    <br>
    <table>
        <th>Anagrama</th>
    </table>

    <?php
        foreach ($lista as $ana) {
            ?>

        <tr> <?=$ana?></tr>

    <?php
        echo "</br>";
        }
    ?>


</body>
</html>