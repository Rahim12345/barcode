<table class="table table-dark" style="width: 100%;">
  <thead style="background-color: #1c4b79;">
    <tr>
      <th scope="col">Ünvan</th>
      <th scope="col">Partnyor</th>
      <th scope="col">İstehsalçı</th>
      <th scope="col">Model</th>
      <th scope="col">Kateqoriya</th>
      <th scope="col">Seria</th>
      <th scope="col">Tarix</th>
      <th scope="col">T/S qiyməti ($)</th>
      <th scope="col">N/S qiyməti ($) </th>
      <th scope="col">K/S qiyməti ($)</th>
      <th scope="col">Payla</th>
    </tr>
  </thead>
  <tbody style="background-color: #1c4b79;">
      <tr>
        <td><?php echo $rows4Seria[0]["warehouse"]; ?></td>
        <td><?php echo $rows4Seria[0]["partnor"]; ?></td>
        <td><?php echo $rows4Seria[0]["manufacturer"]; ?></td>
        <td><?php echo $rows4Seria[0]["model"]; ?></td>
        <td><?php echo $rows4Seria[0]["category"]; ?></td>
        <td><?php echo $rows4Seria[0]["seria"]; ?></td>
        <td><?php echo $rows4Seria[0]["productDate"]; ?></td>
        <td><?php echo $rows4Seria[0]["wholesale"]; ?></td>
        <td><?php echo $rows4Seria[0]["selling"]; ?></td>
        <td><?php echo $rows4Seria[0]["credit"]; ?></td>
        <td><a href="index.php?id=33&pid=<?php echo $rows4Seria[0]["id"]; ?>">Payla</a></td>
      </tr>
  </tbody>
</table> 