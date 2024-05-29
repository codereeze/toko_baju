<section class="container mx-auto pl-16 text-gray-600 mb-14">
    <div class="pt-36">
        <?php include_once 'partials/sidebar.php' ?>
        <div class="px-4 sm:ml-64">
            <div class="border shadow-sm rounded-md p-4 mb-5">
                <p class="font-bold mb-2 text-lg">Profile toko</p>
                <div class="flex justify-center mb-10">
                    <img src="https://assets.skilvul.com/users/cltqq5evn03jr01s4f3gdwlfz-1711958320000.jpg" width="150" alt="" class="rounded-full">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <p class="font-semibold mb-1">Nama toko</p>
                        <input type="text" class="p-2 rounded-md border w-full font-medium" value="<?= $params['store']['nama_toko'] ?>" disabled>
                    </div>
                    <div>
                        <p class="font-semibold mb-1">Copywriting</p>
                        <input type="text" class="p-2 rounded-md border w-full font-medium" value="<?= $params['store']['copywriting'] ?>" disabled>
                    </div>
                    <div>
                        <p class="font-semibold mb-1">Jam buka</p>
                        <input type="text" class="p-2 rounded-md border w-full font-medium" value="<?= $params['store']['jam_buka'] ?>" disabled>
                    </div>
                    <div>
                        <p class="font-semibold mb-1">Jam tutup</p>
                        <input type="text" class="p-2 rounded-md border w-full font-medium" value="<?= $params['store']['jam_tutup'] ?>" disabled>
                    </div>
                </div>
                <div class="mt-3">
                    <p class="font-semibold mb-1">Deskripsi toko</p>
                    <textarea class="p-2 rounded-md border w-full font-medium" disabled><?= $params['store']['deskripsi'] ?></textarea>
                </div>
            </div>
            <div class="border shadow-sm rounded-md p-4">
                <p class="font-bold text-lg">Alamat toko</p>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <p class="font-semibold mb-1">Jalan</p>
                        <input type="text" class="p-2 rounded-md border w-full font-medium" value="<?= $params['store']['nama_jalan'] ?>" disabled>
                    </div>
                    <div>
                        <p class="font-semibold mb-1">Kelurahan/Desa</p>
                        <input type="text" class="p-2 rounded-md border w-full font-medium" value="<?= $params['store']['kelurahan'] ?>" disabled>
                    </div>
                    <div>
                        <p class="font-semibold mb-1">Kecamatan</p>
                        <input type="text" class="p-2 rounded-md border w-full font-medium" value="<?= $params['store']['kecamatan'] ?>" disabled>
                    </div>
                    <div>
                        <p class="font-semibold mb-1">Kabupaten</p>
                        <input type="text" class="p-2 rounded-md border w-full font-medium" value="<?= $params['store']['kab_kot'] ?>" disabled>
                    </div>
                    <div>
                        <p class="font-semibold mb-1">Provinsi</p>
                        <input type="text" class="p-2 rounded-md border w-full font-medium" value="<?= $params['store']['provinsi'] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <p class="font-semibold mb-1">Kode Pos</p>
                        <input type="text" class="p-2 rounded-md border w-full font-medium" value="<?= $params['store']['kode_pos'] ?>" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>