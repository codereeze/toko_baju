<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Master Data Seller</h3>
            <h6 class="op-7 mb-2">Konten ini menampilkan daftar seller</h6>
        </div>
    </div>
    <div>
        <div class="card">
            <div class="card-body">
                <div>
                    <table class="table" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Nama seller</th>
                                <th scope="col">Nama toko</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($params['sellers'] as $item) : ?>
                                <tr>
                                    <td scope="row"><?= $item['username'] ?></td>
                                    <td><?= $item['nama'] ?></td>
                                    <td><?= $item['nama_toko'] ?></td>
                                    <td><?= $item['email'] ?></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="/admin/detail-seller/<?= $item['seller_id'] ?>">
                                                <button class="btn btn-primary"><i class="fas fa-info"></i></button>
                                            </a>
                                            <!-- <a href="">
                                                <button class="btn btn-danger"><i class="fas fa-ban"></i></button>
                                            </a> -->
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>