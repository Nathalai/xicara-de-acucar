<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <title>Pegar item emprestado</title>
    <link rel="shortcut icon" href="img/sugar.png"/>
    <link href="style/geral.css" rel="stylesheet"/>
    <link href="style/disponibilizados.css" rel="stylesheet"/>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <?php
      include_once "header.php";
      include_once "./includes/pegar-emprestado.inc.php";
    ?>

    <h3>Pegar Item Emprestado</h3>

    <?php      
      function exibirDisponiveis($array){
          $html = '<table>';
          $html .= '<tr>';
          foreach($array[0] as $key=>$value){
                $html .= '<th>' . htmlspecialchars($key) . '</th>';
              }
          $html .= '</tr>';
          foreach( $array as $key=>$value){
              $html .= '<tr>';
              foreach($value as $key2=>$value2){
                $html .= '<td>' . htmlspecialchars($value2) . '</td>';                
              }
              $html .= '<td><a href="./pegar-emprestado.php?item-id='.$value["ID"].'">Pegar emprestado</a></td>';
              $html .= '</tr>';
          }
          $html .= '</table>';
          return $html;
      }
      
      $itens = buscarDisponiveis();

      $exibirDisponiveis = exibirDisponiveis($itens);

      echo $exibirDisponiveis;
    ?>    

  </body>
</html>