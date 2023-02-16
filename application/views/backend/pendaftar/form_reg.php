<section role="main" class="content-body">
  <header class="page-header">
    <h2><?=$page;?></h2>

    <div class="right-wrapper pull-right" style="margin-right:45px">
      <ol class="breadcrumbs">
        <li>
          <a href="<?=site_url('dashboard/pendaftar')?>">
            <i class="fa fa-home"></i>
          </a>
        </li>
        <li><span><?=$page;?></span></li>
        <li><span><?=$subpage;?></span></li>
      </ol>
    </div>
  </header>
  <?php $this->view('message')?>

  <section class="panel form-wizard" id="w1">
		<header class="panel-heading">
			

			<h2 class="panel-title">Formulir Pendaftaran</h2>
		</header>
		<div class="panel-body panel-body">
      <hr>
			<?php echo form_open_multipart('pendaftar/daftar') ?>
				<div class="tab-content">
          <div id="w1-data-diri" class="tab-pane active">
          <div class="col-lg-6" style="margin-bottom:25px">
            <div class="panel-body">
              <h4 class="panel-title" style="margin-bottom:8px">A. Identitas Calon Siswa</h4>
              <p>Lengkapi Data Diri Anda dengan data yang sesungguhnya.</p>
              <hr>
              <div class="container col-lg-12">
                <div class="form-group">
  								<label class="control-label" for="nik">No NIK </label>
                    <input type="hidden" name="pendaftar_id" value="<?=$row->pendaftar_id?>">
                    <input type="hidden" value="<?=$this->fungsi->user_login()->id?>" name="user_id" class="form-control" required>
  									<input type="number" value="<?=$row->nik?>" class="form-control input-sm" name="nik" maxlength="20" id="nik" maxlength="20" required>
                </div>
  							<div class="form-group">
  								<label class="control-label" for="w1-nama_siswa">Nama Lengkap Siswa</label>
  									<input type="text" value="<?=$row->nama_siswa?>" class="form-control input-sm" name="nama_siswa" id="w1-nama_siswa" required>
                </div>
                <div class="form-group">
  								<label class="control-label" for="w1-panggilan_siswa">Nama Panggilan Siswa</label>
  									<input type="text" value="<?=$row->panggilan_siswa?>" class="form-control input-sm" name="panggilan_siswa" id="w1-panggilan_siswa" required>
                </div>
                <div class="form-group">
  								<label class="control-label" for="w1-no_kk">No Kartu Keluarga</label>
  									<input type="number" value="<?=$row->no_kk?>" class="form-control input-sm" name="no_kk" maxlength="20" id="w1-no_kk" maxlength="20" required>
                </div>
                <div class="form-group">
  								<label class="control-label" for="w1-tempat_lahir">Tempat Lahir </label>
  									<input type="text" value="<?=$row->tempat_lahir?>" class="form-control input-sm" name="tempat_lahir" id="w1-tempat_lahir" required>
                </div>
                <div class="form-group">
  								<label class="control-label" for="w1-tgl_lahir">Tanggal Lahir </label>
  									<input type="date" value="<?=$row->tgl_lahir?>" class="form-control input-sm" name="tgl_lahir" id="w1-tgl_lahir" required>
                </div>
                <div class="form-group">
  								<label class="control-label" for="w1-anak">Anak Ke</label>
  									<input type="text" value="<?=$row->anak?>" class="form-control input-sm" name="anak" id="w1-anak" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-jk">Jenis Kelamin </label>
                    <select class="form-control" name="jk" class="collapse submenu" id="w1-jk" required>
                      <?php $jk = $this->input->post('jk') ? $this->input->post('jk') : $row->jk ?>
                      <option value="">- Pilih -</option>
                      <option value="L" <?=$jk == 'L' ? 'selected' : null?>> Laki-Laki </option>
                      <option value="P" <?=$jk == 'P' ? 'selected' : null?>> Perempuan </option>
                    </select>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-agama">Agama </label>
                    <select class="form-control" name="agama" class="collapse submenu" id="w1-agama" required>
                      <?php $agama = $this->input->post('agama') ? $this->input->post('agama') : $row->agama ?>
                      <option value="">- Pilih -</option>
                      <option value="Islam" <?=$agama == 'Islam' ? 'selected' : null?>> Islam </option>
                      <option value="Kristen" <?=$agama == 'Kristen' ? 'selected' : null?>> Kristen </option>
                      <option value="Katolik" <?=$agama == 'Katolik' ? 'selected' : null?>> Katolik </option>
                      <option value="Hindu" <?=$agama == 'Hindu' ? 'selected' : null?>> Hindu </option>
                      <option value="Buddha" <?=$agama == 'Buddha' ? 'selected' : null?>> Buddha </option>
                    </select>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3" id="w1-alamat"><?=$row->alamat?></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-tinggi_bdn">Tinggi Badan</label>
                  <input type="text" value="<?=$row->tinggi_bdn?>" class="form-control input-sm" name="tinggi_bdn" id="w1-tinggi_bdn" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-berat_bdn">Berat Badan</label>
                  <input type="text" value="<?=$row->berat_bdn?>" class="form-control input-sm" name="berat_bdn" id="w1-berat_bdn" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-penyakit">Kelainan/Penyakit</label>
                  <input type="text" value="<?=$row->penyakit?>" class="form-control input-sm" name="penyakit" id="w1-penyakit" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-hobi">Hobi</label>
                  <input type="text" value="<?=$row->hobi?>" class="form-control input-sm" name="hobi" id="w1-hobi" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-baju">Ukuran Baju</label>
                  <input type="text" value="<?=$row->baju?>" class="form-control input-sm" name="baju" id="w1-baju" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-kendaraan">Kendaraan ke sekolah</label>
                    <input type="text" value="<?=$row->kendaraan?>" name="kendaraan" class="form-control input-sm" id="w1-kendaraan" required>
                </div>

              </div>
            </div>
          </div>
          
        </div>
					<div id="w1-data-orangtua/wali" class="tab-pane active">
            <div class="col-lg-12" style="margin-bottom:25px">
              <div class="panel-body">
              <h4 class="panel-title" style="margin-bottom:8px">B. Data Orang Tua/Wali</h4>
            <p>Lengkapi Data Orang Tua/Wali Anda dengan data yang sesungguhnya.</p>
            <hr>
              <div class="container col-lg-12">
  							<div class="form-group">
                  <label class="control-label" for="w1-nama_ayah">Nama Ayah </label>
  									<input type="text" value="<?=$row->nama_ayah?>" class="form-control input-sm" name="nama_ayah" id="w1-nama_ayah" required>
                </div>
                <div class="form-group">
  								<label class="control-label" for="w1-nikayah">No NIK Ayah </label>
  									<input type="number" value="<?=$row->nikayah?>" class="form-control input-sm" name="nikayah" maxlength="20" id="w1-nikayah" maxlength="20" required>
                </div>
                <div class="form-group">
  								<label class="control-label" for="w1-pendidikan_ay">Pendidikan Terakhir</label>
  									<input type="text" value="<?=$row->pendidikan_ay?>" class="form-control input-sm" name="pendidikan_ay" id="w1-pendidikan_ay"  required>
                </div>
                <div class="form-group">
  								<label class="control-label" for="w1-pekerjaan_ay">Pekerjaan</label>
  									<input type="text" value="<?=$row->pekerjaan_ay?>" class="form-control input-sm" name="pekerjaan_ay" id="w1-pekerjaan_ay"  required>
                </div>
                <div class="form-group">
  								<label class="control-label" for="w1-penghasilan_ay">Penghasilan</label>
  									<input type="number" value="<?=$row->penghasilan_ay?>" class="form-control input-sm" name="penghasilan_ay" id="w1-penghasilan_ay"  required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-agama_ay">Agama</label>
                    <select class="form-control" name="agama_ay" class="collapse submenu" id="w1-agama_ay" required>
                      <?php $agama = $this->input->post('agama_ay') ? $this->input->post('agama_ay') : $row->agama ?>
                      <option value="">- Pilih -</option>
                      <option value="Islam" <?=$agama == 'Islam' ? 'selected' : null?>> Islam </option>
                      <option value="Kristen" <?=$agama == 'Kristen' ? 'selected' : null?>> Kristen </option>
                      <option value="Katolik" <?=$agama == 'Katolik' ? 'selected' : null?>> Katolik </option>
                      <option value="Hindu" <?=$agama == 'Hindu' ? 'selected' : null?>> Hindu </option>
                      <option value="Buddha" <?=$agama == 'Buddha' ? 'selected' : null?>> Buddha </option>
                    </select>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-no_hpay">No Handphone</label>
                    <input type="number" value="<?=$row->no_hpay?>" name="no_hpay" class="form-control input-sm" id="w1-no_hpay" maxlength="13" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-nama_ibu">Nama Ibu</label>
  									<input type="text" value="<?=$row->nama_ibu?>" class="form-control input-sm" name="nama_ibu" id="w1-nama_ibu" required>
                </div>
                <div class="form-group">
  								<label class="control-label" for="w1-nikibu">No NIK Ibu</label>
  									<input type="number" value="<?=$row->nikibu?>" class="form-control input-sm" name="nikibu" maxlength="20" id="w1-nikibu" maxlength="20" required>
                </div>
                <div class="form-group">
  								<label class="control-label" for="w1-pendidikan_ibu">Pendidikan Terakhir</label>
  									<input type="text" value="<?=$row->pendidikan_ibu?>" class="form-control input-sm" name="pendidikan_ibu" id="w1-pendidikan_ibu"  required>
                </div>
                <div class="form-group">
  								<label class="control-label" for="w1-pekerjaan_ibu">Pekerjaan</label>
  									<input type="text" value="<?=$row->pekerjaan_ibu?>" class="form-control input-sm" name="pekerjaan_ibu" id="w1-pekerjaan_ibu"  required>
                </div>
                <div class="form-group">
  								<label class="control-label" for="w1-penghasilan_ibu">Penghasilan</label>
  									<input type="number" value="<?=$row->penghasilan_ibu?>" class="form-control input-sm" name="penghasilan_ibu" id="w1-penghasilan_ibu"  required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-agama_ibu">Agama</label>
                    <select class="form-control" name="agama_ibu" class="collapse submenu" id="w1-agama_ibu" required>
                      <?php $agama = $this->input->post('agama_ibu') ? $this->input->post('agama_ibu') : $row->agama_ibu ?>
                      <option value="">- Pilih -</option>
                      <option value="Islam" <?=$agama == 'Islam' ? 'selected' : null?>> Islam </option>
                      <option value="Kristen" <?=$agama == 'Kristen' ? 'selected' : null?>> Kristen </option>
                      <option value="Katolik" <?=$agama == 'Katolik' ? 'selected' : null?>> Katolik </option>
                      <option value="Hindu" <?=$agama == 'Hindu' ? 'selected' : null?>> Hindu </option>
                      <option value="Buddha" <?=$agama == 'Buddha' ? 'selected' : null?>> Buddha </option>
                    </select>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-no_hpibu">No Handphone </label>
                    <input type="number" value="<?=$row->no_hpibu?>" name="no_hpibu" class="form-control" id="w1-no_hpibu" maxlength="13" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-nama_wali">Nama Wali </label>
                    <input type="text" value="<?=$row->nama_wali?>" class="form-control input-sm" name="nama_wali" id="w1-nama_wali" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="w1-alamat_org">Alamat Orang Tua/Wali</label>
                    <textarea class="form-control" name="alamat_org" rows="3" id="w1-alamat_org"><?=$row->alamat_org?></textarea>
                </div>
              </div>
                </div>
              </div>
            </div>
         
					</div>
					<div id="w1-upload" class="tab-pane active">
            <div class="col-lg-12" style="margin-bottom:25px">
            <div class="panel-body">
              <h4 class="panel-title" style="margin-bottom:8px">C. Upload File</h4>
              <p>Lengkapi Upload File dengan mengupload Foto 3x4</p>
              <hr>
            </div>
            <div class="form-group">
            <label class="col-md-3 control-label" for="foto3x4">Foto 3x4 </label>
            <div class="col-md-2">
              <?php if($subpage == 'Edit') {
                if ($row->foto3x4 != null) {?>
                      <a class="img-thumbnail lightbox" href="<?=base_url('upload/pendaftar/'.$row->foto3x4)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                        <img class="img-responsive" width="215" src="<?=base_url('upload/pendaftar/'.$row->foto3x4)?>" style="width:100px">
                        <span class="zoom">
                          <i class="fa fa-search"></i>
                        </span>
                      </a>
                  <?php }
                  } ?>
              </div>
              <div class="col-md-7">
                  <div class="fileupload fileupload-new" data-provides="fileupload"><input type="hidden">
                    <div class="input-append">
                      <div class="uneditable-input">
                        <i class="fa fa-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                      </div>
                      <span class="btn btn-default btn-file">
                        <span class="fileupload-exists">Change</span>
                        <span class="fileupload-new">Select file</span>
                        <input type="file" name="foto3x4" id="foto3x4">
                      </span>
                      <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                    <small>(Biarkan kosong jika tidak <?=$subpage == 'Edit' ? 'diganti' : 'ada'?>)</small>
                  </div>
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-md-3 control-label" for="scan_akte">Scan Akte Kelahiran</label>
            <div class="col-md-2">
              <?php if($subpage == 'Edit') {
                if ($row->scan_akte != null) {?>
                      <a class="img-thumbnail lightbox" href="<?=base_url('upload/pendaftar/'.$row->scan_akte)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                        <img class="img-responsive" width="215" src="<?=base_url('upload/pendaftar/'.$row->scan_akte)?>" style="width:100px">
                        <span class="zoom">
                          <i class="fa fa-search"></i>
                        </span>
                      </a>
                  <?php }
                  } ?>
                </div>
                <div class="col-md-7">
                  <div class="fileupload fileupload-new" data-provides="fileupload">
                    <input name="scan_akte" value="<?=$row->scan_akte?>" type="hidden">
                    <div class="input-append">
                      <div class="uneditable-input">
                        <i class="fa fa-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                      </div>
                      <span class="btn btn-default btn-file">
                        <span class="fileupload-exists">Change</span>
                        <span class="fileupload-new">Select file</span>
                        <input type="file" name="scan_akte" id="scan_akte">
                      </span>
                      <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                    <small>(Biarkan kosong jika tidak <?=$subpage == 'Edit' ? 'diganti' : 'ada'?>)</small>
                  </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label" for="scan_kk">Scan Kartu Keluarga</label>
            <div class="col-md-2">
              <?php if($subpage == 'Edit') {
                if ($row->scan_kk != null) {?>
                      <a class="img-thumbnail lightbox" href="<?=base_url('upload/pendaftar/'.$row->scan_kk)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                        <img class="img-responsive" width="215" src="<?=base_url('upload/pendaftar/'.$row->scan_kk)?>" style="width:100px">
                        <span class="zoom">
                          <i class="fa fa-search"></i>
                        </span>
                      </a>
                  <?php }
                  } ?>
                </div>
                <div class="col-md-7">
                  <div class="fileupload fileupload-new" data-provides="fileupload">
                    <input name="scan_kk" value="<?=$row->scan_kk?>" type="hidden">
                    <div class="input-append">
                      <div class="uneditable-input">
                        <i class="fa fa-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                      </div>
                      <span class="btn btn-default btn-file">
                        <span class="fileupload-exists">Change</span>
                        <span class="fileupload-new">Select file</span>
                        <input type="file" name="scan_kk" id="scan_kk">
                      </span>
                      <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                    <small>(Biarkan kosong jika tidak <?=$subpage == 'Edit' ? 'diganti' : 'ada'?>)</small>
                  </div>
            </div>
          </div>

            <div class="text-center">
              <button type="submit" name="<?=$subpage?>" class="btn btn-success">Save</button>
              <button type="reset" class="btn btn-primary">Reset</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php echo form_close() ?>
	
	</section>
