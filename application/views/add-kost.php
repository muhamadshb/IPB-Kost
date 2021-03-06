<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('admin-header', $this->data);
?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Tambah Kost <small>Aplikasi Pencarian Kost</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-edit"></i> Tambah Kost
                    </li>
                </ol>
            </div>
            
        </div>
        <!-- /.row -->
        <br>
        <div class="row">
            <div class="col-lg-12">
            <form class="form-horizontal" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <?php if($this->session->flashdata('message')) : ?>
                        <div class="col-sm-8 col-md-offset-2">
                            <div class="form-group">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $this->session->flashdata('message'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama :</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control" value="<?php echo set_value('name') ?>" placeholder="">
                        <p class="help-block"><?php  echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Kategori :</label>
                    <div class="col-sm-5">
                    <?php foreach($this->db->get('kategori')->result() as $key => $row) : ?>
                        <div class="checkbox checkbox-info checkbox-inline">
                            <input type="checkbox" value="<?php echo $row->kategori_id; ?>" name="kategori[<?php echo $key ?>]">
                            <label> <?php echo $row->name; ?></label>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Harga :</label>
                    <div class="col-sm-5">
                        <input type="text" name="price" class="form-control" value="<?php echo set_value('price') ?>">
                        <p class="help-block"><?php  echo form_error('price', '<small class="text-red">', '</small>'); ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Fasilitas :</label>
                    <div class="col-sm-9">
                        <?php foreach($this->amenities as $value) : ?>
                        <div class="checkbox checkbox-info checkbox-inline">
                            <input type="checkbox" value="<?php echo $value; ?>" name="amenities[]">
                            <label> <?php echo $value; ?></label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Koordinat :</label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input id="input-calendar" type="text" name="latitude" class="form-control" value="<?php echo set_value('latitude') ?>" placeholder="latitude">
                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        </div>
                        <p class="help-block"><?php echo form_error('latitude', '<small class="text-red">', '</small>'); ?></p>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input id="input-calendar" type="text" name="longitude" class="form-control" value="<?php echo set_value('longitude') ?>" placeholder="longitude">
                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        </div>
                        <p class="help-block"><?php echo form_error('longitude', '<small class="text-red">', '</small>'); ?></p>
                    </div>
                    <div class="col-sm-8 col-md-offset-2">
                        <?php echo $map['html'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Foto :</label>
                    <div class="col-sm-5">
                       <input type="file" name="photo" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat :</label>
                    <div class="col-sm-8">
                       <textarea name="alamat" class="form-control" rows="3"><?php echo set_value('alamat') ?></textarea>
                       <p class="help-block"><?php echo form_error('alamat', '<small class="text-red">', '</small>'); ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Deskripsi :</label>
                    <div class="col-sm-8">
                       <textarea name="description" class="form-control" rows="8"><?php echo set_value('description') ?></textarea>
                       <p class="help-block"><?php echo form_error('description', '<small class="text-red">', '</small>'); ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">&nbsp;</label>
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-md btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$this->load->view('admin-footer', $this->data); 
