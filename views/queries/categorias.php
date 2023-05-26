<?php
   $select = $conexao->prepare("SELECT * FROM categoria");
   $select->execute();
   $categorias = $select->fetchAll();

   echo "<div class='categorias'>";
   foreach ($categorias as $categoria) {
       echo "
                   <div class='itens-categorias'>
                       <a href='itens.php?id_categoria=" . $categoria['id_categoria'] . "'>
                           <img src='../painel/" . $categoria['img_categoria'] . "'>
                           " . $categoria['nome_categoria'] . "
                       </a>
                   </div>";
   }
   echo "</div>";
?>