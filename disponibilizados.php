<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <title>Itens que você disponibilizou</title>
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
      include_once "./includes/disponibilizados.inc.php";
    ?>

    <?php
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "none") {
          echo "<h4>O item foi excluído!</h4>";
        }
      }
    ?>

    <h3>Disponibilizados</h3>

    <?php      
      function exibirDisponibilizados($array){
          $html = '<table>';
          $html .= '<tr>';
          foreach($array[0] as $key=>$value){
                $html .= '<th>' . htmlspecialchars($key) . '</th>';
              }
              $html .= '<th></th>';
          $html .= '</tr>';
          foreach( $array as $key=>$value){
              $html .= '<tr>';
              foreach($value as $key2=>$value2){
                $html .= '<td>' . htmlspecialchars($value2) . '</td>';                
              }
              $html .= '<td><a href="./excluir-item.php?item-id='.$value["ID"].'">Excluir</a></td>';
              $html .= '</tr>';
          }
          $html .= '</table>';
          return $html;
      }
      
      $itens = loadItems();

      $exibirDisponibilizados = exibirDisponibilizados($itens);

      echo $exibirDisponibilizados;      
    ?>    

  </body>
</html>