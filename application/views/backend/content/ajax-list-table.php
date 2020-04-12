<?php 
 if ($data_akun['count'] > 0) {
  $no = 0 + $offset;
  foreach ($data_akun['object'] as $akun) {
   $no++;
?>
<tr>
 <td><?=$no?></td>
 <td><?=$akun->nama?></td>
 <td><?=$akun->username?></td>
 <td><?=$akun->password?></td>
 <td><?=$akun->role?></td>
 <td>
  <a href="#" class="edit-data text-primary" data-id="<?=$akun->id?>">
   <i class="material-icons">edit</i>
  </a>
  <a href="#" class="hapus-data text-danger" data-id="<?=$akun->id?>">
   <i class="material-icons">delete</i>
  </a>
 </td>
</tr>
<?php
  }
 }
?>