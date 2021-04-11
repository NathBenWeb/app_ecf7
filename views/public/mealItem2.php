<?php ob_start(); 

?>


<table class="table-striped">
  <thead>
    <tr>
      <th scope="col">Ref.</th>
      <th scope="col">Menu</th>
      <th scope="col">Quantité</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

<?php $contenu = ob_get_clean();
    require_once("./views/public/templatePublic.php");
?>