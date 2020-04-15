<!DOCTYPE html>
<html><head>
        <title></title>
    </head><body>
        <table class="table table-bordered">
            <tr>
                <th ><h4>No</h4></th>
                <th ><h4>Nama Gunung</h4></th>
                <th ><h4>Lokasi</h4></th>
                <th ><h4>Keterangan</h4></th>
                <th ><h4>latitude</h4></th>
                <th ><h4>Longitude</h4></th>
                <th ><h4>Status</h4></th>
            </tr>
            <?php
            $no= 1;
            foreach ($gunung as $mount): ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $mount->nm_gunung?></td>
                <td><?php echo $mount->lokasi?></td>
                <td><?php echo $mount->keterangan?></td>
                <td><?php echo $mount->lat?></td>
                <td><?php echo $mount->lng?></td>
                <td><?php echo $mount->status?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        
    </body></html>