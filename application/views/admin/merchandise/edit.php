<?php

// Error upload
if(isset($error)){
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}

// Notifikasi Error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open_multipart(base_url('admin/merchandise/edit/' .$merchandise->id_merchandise),' class="form-horizontal"');
?>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama Merchandise</label>
    <div class="col-md-5">
      <input type="text" name="nama_merchandise" class="form-control" placeholder="Nama Merchandise" value="<?php echo $merchandise->nama_merchandise ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Kode Merchandise</label>
    <div class="col-md-5">
      <input type="text" name="kode_merchandise" class="form-control" placeholder="Kode Merchandise" value="<?php echo $merchandise->kode_merchandise ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Kategori Merchandise</label>
    <div class="col-md-5">
      <select name="id_kategori" class="form-control">
        <?php foreach($kategori as $kategori) { ?>
        <option value="<?php echo $kategori->id_kategori ?>" <?php if($merchandise->id_kategori==$kategori->id_kategori) {echo "selected"; } ?>>
            <?php echo $kategori->nama_kategori ?> 
        </option>
        <?php } ?>
      </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Harga Merchandise</label>
    <div class="col-md-5">
      <input type="number" name="harga" class="form-control" placeholder="Harga Merchandise" value="<?php echo $merchandise->harga ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Stok Merchandise</label>
    <div class="col-md-5">
      <input type="number" name="stok_merchandise" class="form-control" placeholder="Stok Merchandise" value="<?php echo $merchandise->stok_merchandise ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Ukuran Merchandise</label>
    <div class="col-md-5">
      <input type="text" name="ukuran" class="form-control" placeholder="Ukuran Merchandise" value="<?php echo $merchandise->ukuran ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Keterangan Merchandise</label>
    <div class="col-md-10">
      <textarea name="keterangan" class="form-control" placeholder="Keterangan" id="editor"><?php echo $merchandise->keterangan ?></textarea>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Keyword (untuk SEO Google)</label>
    <div class="col-md-10">
      <textarea name="keywords" class="form-control" placeholder="Keyword (untuk SEO Google)"><?php echo $merchandise->keywords ?></textarea>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Upload Gambar Merchandise</label>
    <div class="col-md-5">
      <input type="file" name="gambar" class="form-control">
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Status Merchandise</label>
    <div class="col-md-5">
      <select name="status_merchandise" class="form-control">
        <option value="Publish">Publikasikan</option>
        <option value="Draft" <?php if($merchandise->status_merchandise=="Draft") { echo "selected"; } ?>>Simpan Sebagai Draft</option>
      </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label"></label>
    <div class="col-md-5">
      <button class="btn btn-success btn-lg" name="submit" type="submit">
        <i class="fa fa-save"></i> Simpan
      </button>
      <button class="btn btn-info btn-lg" name="reset" type="reset">
        <i class="fa fa-times"></i> Reset
      </button>
    </div>
</div>

<?php echo form_close(); ?>