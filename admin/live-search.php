<?php include('../functions/index.php') ?>
<?php if (isset($_GET['keyword-tampilkan'])): ?>
    <?php $keyword = $_GET['keyword-tampilkan']; ?>
    <?php $data = getPesertaBelumDitampilkanWhere($keyword) ?>
    <?php foreach ($data as $peserta): ?>
        <?php
        $id = $peserta['id'];
        $foto = $peserta['foto'];
        $nama = $peserta['nama'];
        $dawis = $peserta['dawis'];
        $penampilan = $peserta['penampilan'];
        ?>
        <div class="box" onclick="tampilkan('<?= $id ?>')">
            <div class="gambar">
                <img src="../gambar-upload/<?= $peserta['foto'] ?>" alt="">
            </div>
            <div class="deskripsi">
                <h3>
                    <?php $nama = $peserta['nama']; ?>
                    <?=
                        $namaDepan = explode(' ', $nama)[0];
                    ?>
                </h3>
                <p>Dawis
                    <?= $peserta['dawis'] ?>
                </p>
            </div>
        </div>
    <?php endforeach ?>
<?php elseif (isset($_GET['keyword'])): ?>
    <?php $keyword = $_GET['keyword']; ?>
    <?php $data = daftarPesertaWhere($keyword); ?>
    <?php foreach ($data as $peserta): ?>
        <?php
        $id = $peserta['id'];
        $foto = $peserta['foto'];
        $nama = $peserta['nama'];
        $dawis = $peserta['dawis'];
        $penampilan = $peserta['penampilan'];
        ?>
        <div class="box" onclick="buka('<?= $id ?>','<?= $foto ?>', `<?= $nama ?>`, '<?= $dawis ?>', '<?= $penampilan ?>')">
            <div class="gambar">
                <img src="../gambar-upload/<?= $peserta['foto'] ?>" alt="">
            </div>
            <div class="deskripsi">
                <h3>
                    <?php $nama = $peserta['nama']; ?>
                    <?=
                        $namaDepan = explode(' ', $nama)[0];
                    ?>
                </h3>
                <p>Dawis
                    <?= $peserta['dawis'] ?>
                </p>
            </div>
        </div>
    <?php endforeach ?>
<?php endif; ?>