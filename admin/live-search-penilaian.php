<?php include('../functions/index.php') ?>

<?php if (isset($_GET['keyword'])): ?>
    <?php $keyword = $_GET['keyword'] ?>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Peserta</th>
                <th>Total Skor</th>
                <th>Rata - rata</th>
                <th>Jumlah Orang Vote</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach (dataPenilaianPesertaWhere($keyword) as $peserta): ?>
                <tr>
                    <td>
                        <?= $no++ ?>
                    </td>
                    <td>
                        <?= $peserta['nama_peserta'] ?>
                    </td>
                    <td>
                        <?= $peserta['total_skor'] ?>
                    </td>
                    <td>
                        <?= $peserta['rata_rata_skor'] ?>
                    </td>
                    <td>
                        <?= $peserta['jumlah_vote'] ?> Orang
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>