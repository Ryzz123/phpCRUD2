<?php 
require "../../../function/function.php";

$keyword = $_GET["keyword"];
$query = "SELECT * FROM gabut 
WHERE 
nama LIKE '%$keyword%' OR
asal LIKE '%$keyword%' OR
jurusan LIKE '%$keyword%' OR
universitas LIKE '%$keyword%' ";

$data_gabut = query($query);
?>
<table class="data" cellpadding="10" cellspacing="0">
                    <tr>
                        <th class="data-head">No</th>                       
                        <th class="data-head">Aksi</th>
                        <th class="data-head">Nama</th>
                        <th class="data-head">Asal</th>
                        <th class="data-head">Universitas</th>
                        <th class="data-head">Jurusan</th>
                        <th class="data-head">Gambar</th>
                    </tr>

                <?php $i = 1; ?>
                <?php foreach( $data_gabut as $data ) : ?>
                    <tr>
                        <td class="data-list"><?php echo $i; ?></td>
                        <td class="data-list">
                            <a href="lib/edit/edit.php?id=<?php echo $data["id"]; ?>">Ubah</a> 
                            <a href="lib/delete/delete.php?id=<?php echo $data["id"] ?>" onclick="return confirm('yakin?');">Hapus</a>
                    </td>
                        <td class="data-list"><?php echo $data["nama"]; ?></td>
                        <td class="data-list"><?php echo $data["asal"]; ?></td>
                        <td class="data-list"><?php echo $data["universitas"]; ?></td>
                        <td class="data-list"><?php echo $data["jurusan"]; ?></td>
                        <td class="data-list"><img class="rounded-circle" width="50" height="50" src="upload/<?php echo $data["gambar"]; ?>" alt=""></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </table>   