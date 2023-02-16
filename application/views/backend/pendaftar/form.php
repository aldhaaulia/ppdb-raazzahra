<section role="main" class="content-body">
  <header class="page-header">
    <h2><?=$page;?></h2>

    <div class="right-wrapper pull-right" style="margin-right:45px">
      <ol class="breadcrumbs">
        <li>
          <a href="<?=site_url('dashboard')?>">
            <i class="fa fa-home"></i>
          </a>
        </li>
        <li><span><?=$page;?></span></li>
        <li><span><?=$subpage;?></span></li>
      </ol>
    </div>
  </header>
  <?php $this->view('message')?>
      <section class="panel">
        <header class="panel-heading">
          
          <div class="col-lg-10">
            <h2 class="panel-title"><?=$subpage.' '.$page?></h2>
          </div>
          <div class="text-left">
            <a href="<?=site_url('pendaftar')?>" class="btn btn-sm btn-danger"><i class="fa fa-undo"></i> Back</a>
          </div>
        </header>
        <div class="panel-body">
          <?php echo form_open_multipart('pendaftar/process') ?>
          <h4 class="panel-title" style="margin-left:15px">A. Identitas Calon Siswa</h4>
          <hr>
            <div class="form-group">
              <label class="col-md-2 control-label" for="user_id">User Id</label>
              <div class="col-md-10">
                <input type="number" value="<?=$row->user_id?>" name="user_id" class="form-control" id="user_id" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="nik">NIK</label>
              <div class="col-md-10">
                <input type="hidden" name="pendaftar_id" value="<?=$row->pendaftar_id?>">
                <input type="number" value="<?=$row->nik?>" name="nik" class="form-control" id="nik" maxlength="20" required>
              </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="nama_siswa">Nama Lengkap Siswa</label>
              <div class="col-md-10">
                <input type="text" value="<?=$row->nama_siswa?>" name="nama_siswa" class="form-control" id="nama_siswa" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="panggilan_siswa">Nama Panggilan Siswa</label>
              <div class="col-md-10">
                <input type="text" value="<?=$row->panggilan_siswa?>" name="panggilan_siswa" class="form-control" id="panggilan_siswa" required>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-2 control-label" for="no_kk">No Kartu Keluarga</label>
              <div class="col-md-10">
                <input type="number" value="<?=$row->no_kk?>" name="no_kk" class="form-control" id="no_kk" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="tempat_lahir">Tempat Lahir</label>
              <div class="col-md-10">
                <input type="text" value="<?=$row->tempat_lahir?>" name="tempat_lahir" class="form-control" id="tempat_lahir" required>
              </div>
            </div>

            <div class="form-group">
  							<label class="col-md-2 control-label" for="tgl_lahir">Tanggal Lahir</label>
  							<div class="col-md-10">
  								<div class="input-group">
  									<span class="input-group-addon">
  										<i class="fa fa-calendar"></i>
  									</span>
  									<input type="date" value="<?=$row->tgl_lahir?>" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
  								</div>
  							</div>
  						</div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="anak">Anak Ke</label>
              <div class="col-md-10">
                <input type="text" value="<?=$row->anak?>" name="anak" class="form-control" id="anak" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="jk">Jenis Kelamin </label>
              <div class="col-md-10">
                <select class="form-control" name="jk" class="collapse submenu" required>
                  <?php $jk = $this->input->post('jk') ? $this->input->post('jk') : $row->jk ?>
                  <option value="">- Pilih -</option>
                  <option value="L" <?=$jk == 'L' ? 'selected' : null?>> Laki-Laki </option>
                  <option value="P" <?=$jk == 'P' ? 'selected' : null?>> Perempuan </option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" for="agama">Agama </label>
              <div class="col-md-10">
                <select class="form-control" name="agama" class="collapse submenu" required>
                  <?php $agama = $this->input->post('agama') ? $this->input->post('agama') : $row->agama ?>
                  <option value="">- Pilih -</option>
                  <option value="Islam" <?=$agama == 'Islam' ? 'selected' : null?>> Islam </option>
                  <option value="Kristen" <?=$agama == 'Kristen' ? 'selected' : null?>> Kristen </option>
                  <option value="Katolik" <?=$agama == 'Katolik' ? 'selected' : null?>> Katolik </option>
                  <option value="Hindu" <?=$agama == 'Hindu' ? 'selected' : null?>> Hindu </option>
                  <option value="Buddha" <?=$agama == 'Buddha' ? 'selected' : null?>> Buddha </option>
                </select>
              </div>
            </div>
            <div class="form-group">
							<label class="col-md-2 control-label" for="textareaDefault">Alamat Lengkap </label>
							<div class="col-md-10">
								<textarea class="form-control" name="alamat" rows="2" id="textareaDefault"><?=$row->alamat?></textarea>
							</div>
						</div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="tinggi_bdn">Tinggi Badan</label>
                <div class="col-md-10">
                  <input type="number" value="<?=$row->tinggi_bdn?>" name="tinggi_bdn" class="form-control" id="tinggi_bdn" maxlength="5" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="berat_bdn">Berat Badan</label>
                <div class="col-md-10">
                  <input type="number" value="<?=$row->berat_bdn?>" name="berat_bdn" class="form-control" id="berat_bdn" maxlength="5" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="penyakit">Kelainan/Penyakit</label>
                <div class="col-md-10">
                 <input type="text" value="<?=$row->penyakit?>" class="form-control" name="penyakit" id="penyakit" required>
                </div>
              </div>
              <div class="form-group">
                  <label class="col-md-2 control-label" for="hobi">Hobi</label>
                  <div class="col-md-10">
                  <input type="text" value="<?=$row->hobi?>" class="form-control" name="hobi" id="hobi" required>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-md-2 control-label" for="baju">Ukuran Baju</label>
                  <div class="col-md-10">
                  <input type="text" value="<?=$row->baju?>" class="form-control" name="baju" id="baju" required>
                  </div>
              </div>
                <div class="form-group">
                  <label class="col-md-2 control-label" for="kendaraan">Kendaraan ke sekolah</label>
                  <div class="col-md-10">
                     <input type="text" value="<?=$row->kendaraan?>" name="kendaraan" class="form-control" id="kendaraan" required>
                  </div>
                </div>
                <br>
              <h4 class="panel-title" style="margin-left:15px">B. Data Orang Tua/Wali</h4>
              <hr>
              <div class="form-group">
                  <label class="col-md-2 control-label" for="nama_ayah">Nama Ayah</label>
                  <div class="col-md-10">
                    <input type="text" value="<?=$row->nama_ayah?>" class="form-control" name="nama_ayah" id="nama_ayah" required>
                  </div>
              </div>
                <div class="form-group">
  								<label class="col-md-2 control-label" for="nikayah">No NIK Ayah </label>
                  <div class="col-md-10">
                    <input type="number" value="<?=$row->nikayah?>" class="form-control" name="nikayah" maxlength="20" id="nikayah" maxlength="20" required>
                  </div>
                </div>
                <div class="form-group">
  								<label class="col-md-2 control-label" for="pendidikan_ay">Pendidikan Terakhir</label>
                  <div class="col-md-10">
                    <input type="text" value="<?=$row->pendidikan_ay?>" class="form-control" name="pendidikan_ay" id="pendidikan_ay"  required>
                  </div>
                </div>
                <div class="form-group">
  								<label class="col-md-2 control-label" for="pekerjaan_ay">Pekerjaan</label>
  								<div class="col-md-10">
                    <input type="text" value="<?=$row->pekerjaan_ay?>" class="form-control" name="pekerjaan_ay" id="pekerjaan_ay"  required>
                  </div>	
                </div>
                <div class="form-group">
  								<label class="col-md-2 control-label" for="penghasilan_ay">Penghasilan</label>
  								<div class="col-md-10">
                    <input type="number" value="<?=$row->penghasilan_ay?>" class="form-control" name="penghasilan_ay" id="penghasilan_ay"  required>
                  </div>	
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label" for="agama_ay">Agama </label>
                  <div class="col-md-10">
                  <select class="form-control" name="agama_ay" class="collapse submenu" id="agama_ay" required>
                      <?php $agama = $this->input->post('agama_ay') ? $this->input->post('agama_ay') : $row->agama_ay ?>
                      <option value="">- Pilih -</option>
                      <option value="Islam" <?=$agama == 'Islam' ? 'selected' : null?>> Islam </option>
                      <option value="Kristen" <?=$agama == 'Kristen' ? 'selected' : null?>> Kristen </option>
                      <option value="Katolik" <?=$agama == 'Katolik' ? 'selected' : null?>> Katolik </option>
                      <option value="Hindu" <?=$agama == 'Hindu' ? 'selected' : null?>> Hindu </option>
                      <option value="Buddha" <?=$agama == 'Buddha' ? 'selected' : null?>> Buddha </option>
                    </select>
                  </div>  
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label" for="no_hpay">No Handphone</label>
                  <div class="col-md-10">
                    <input type="number" value="<?=$row->no_hpay?>" name="no_hpay" class="form-control" id="no_hpay" maxlength="13" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label" for="nama_ibu">Nama Ibu</label>
                  <div class="col-md-10">
                    <input type="text" value="<?=$row->nama_ibu?>" class="form-control" name="nama_ibu" id="nama_ibu" required>
                  </div>
                </div>
                <div class="form-group">
  								<label class="col-md-2 control-label" for="nikibu">No NIK Ibu</label>
                  <div class="col-md-10">
                    <input type="number" value="<?=$row->nikibu?>" class="form-control" name="nikibu" maxlength="20" id="nikibu" maxlength="20" required>
                  </div>
                </div>
                <div class="form-group">
  								<label class="col-md-2 control-label" for="pendidikan_ibu">Pendidikan Terakhir</label>
                  <div class="col-md-10">
                    <input type="text" value="<?=$row->pendidikan_ibu?>" class="form-control" name="pendidikan_ibu" id="pendidikan_ibu"  required>
                  </div>
                </div>
                <div class="form-group">
  								<label class="col-md-2 control-label" for="pekerjaan_ibu">Pekerjaan</label>
                  <div class="col-md-10">
                    <input type="text" value="<?=$row->pekerjaan_ibu?>" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu"  required>
                  </div>
                </div>
                <div class="form-group">
  								<label class="col-md-2 control-label" for="penghasilan_ibu">Penghasilan</label>
                  <div class="col-md-10">
                   <input type="number" value="<?=$row->penghasilan_ibu?>" class="form-control" name="penghasilan_ibu" id="penghasilan_ibu"  required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label" for="agama_ibu">Agama</label>
                  <div class="col-md-10">
                  <select class="form-control" name="agama_ibu" class="collapse submenu" id="agama_ibu" required>
                      <?php $agama = $this->input->post('agama_ibu') ? $this->input->post('agama_ibu') : $row->agama_ibu ?>
                      <option value="">- Pilih -</option>
                      <option value="Islam" <?=$agama == 'Islam' ? 'selected' : null?>> Islam </option>
                      <option value="Kristen" <?=$agama == 'Kristen' ? 'selected' : null?>> Kristen </option>
                      <option value="Katolik" <?=$agama == 'Katolik' ? 'selected' : null?>> Katolik </option>
                      <option value="Hindu" <?=$agama == 'Hindu' ? 'selected' : null?>> Hindu </option>
                      <option value="Buddha" <?=$agama == 'Buddha' ? 'selected' : null?>> Buddha </option>
                    </select>
                  </div>  
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label" for="no_hpibu">No Handphone</label>
                  <div class="col-md-10">
                    <input type="number" value="<?=$row->no_hpibu?>" name="no_hpibu" class="form-control" id="no_hpibu" maxlength="13" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label" for="nama_wali">Nama Wali</label>
                  <div class="col-md-10">
                    <input type="text" value="<?=$row->nama_wali?>" class="form-control" name="nama_wali" id="nama_wali" required>
                  </div>
                </div>
              <div class="form-group">
  							<label class="col-md-2 control-label" for="textareaDefault">Alamat Orangtua/Wali</label>
  							<div class="col-md-10">
  								<textarea class="form-control" name="alamat_org" rows="2" id="textareaDefault"><?=$row->alamat_org?></textarea>
  							</div>
  						</div>
              <br>
            <div class="form-group">
              <label class="col-md-2 control-label" for="foto3x4">Foto 3x4 </label>
              <div class="col-md-10">
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
              <label class="col-md-2 control-label" for="scan_akte">Scan Akte Kelahiran</label>
              <div class="col-md-10">
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
              <label class="col-md-2 control-label" for="scan_kk">Scan Kartu Keluarga</label>
              <div class="col-md-10">
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
                  </hr>

            <div class="text-center">
              <button type="submit" name="<?=$subpage?>" class="btn btn-success">Save</button>
            </div>

          <?php echo form_close() ?>
        </div>
      </section>
      </script>
