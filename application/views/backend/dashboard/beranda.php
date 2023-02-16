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
      </ol>
    </div>
  </header>

  <?php $this->view('message'); ?>

 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <!-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->

<section class="panel">
  <header class="panel-heading">
    <div class="col-lg-8">
      <h2 class="panel-title">Data <?=$page .' '.$this->fungsi->user_login()->username?></h2>
    </div>
    <div class="text-center">
      <a href="<?=site_url('pendaftar/form_reg')?>" class="btn btn-primary">Tambah Data</a>
      <a href="<?=site_url('pendaftar/cetak_formulir')?>" class="btn btn-danger" target="_blank">Cetak Formulir</a>
    </div>
  </header>
  <div class="panel-body">
    <div class="table-responsive col-lg-12">
    <table class="table table-hover mb-none table-bordered table-striped mb-none dataTable no-footer" id="datatable-default">
      <thead>
        <tr>
          <th>Nama Siswa</th>
          <th>Dokumen Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
          <?php $no=1;
          foreach($row->result()as $key => $data) {?>
            <?php if ($data->user_id == $this->fungsi->user_login()->id){ ?>
          <tr>
            <th><?=$data->nama_siswa?></th>
            <!--
            <?php  $date = date('Y-m-d', strtotime($data->created_at));?>
            <td><?=date_indo($date);?></td>
            -->
            <td>
              <?php if($data->foto3x4 != null) { ?>Foto 3x4 :
                <a class="lightbox label label-success" class='' href="<?=base_url('upload/pendaftar/'.$data->foto3x4)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                  OK</a><br>
            <?php } else {
                echo "Foto 3x4 : <span class='label label-danger'>NO</span> <br>";}
                 if($data->scan_akte != null) { ?> Akte :
                 <a class="lightbox label label-success" class='' href="<?=base_url('upload/pendaftar/'.$data->scan_akte)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                   OK</a><br>
              <?php } else {
                  echo "Akte : <span class='label label-danger'>NO</span><br>";}
                  if($data->scan_kk != null) { ?> KK :
                  <a class="lightbox label label-success" class='' href="<?=base_url('upload/pendaftar/'.$data->scan_kk)?>" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }">
                    OK</a><br>
               <?php } else {
                     echo "KK : <span class='label label-danger'>NO</span>";}?>
            </td>
            <td class="actions-hover actions-fade">
            <?php if ($this->fungsi->user_login()->status != 1) { ?>
              <a href="<?=site_url('pendaftar/daftar_edit/'.$data->pendaftar_id)?>" title="Edit"><i class="fa fa-pencil"></i></a>
              <?php } ?>
              <!-- <a href="<?=site_url('pendaftar/del/'.$data->pendaftar_id)?>" onclick="return confirm('Apakah anda yakin ingin menghapus <?=$data->nama_siswa?>?')" title="Delete" class="delete-row"><i class="fa fa-trash-o"></i></a> -->
            </td>
          </tr>
          <?php } ?>
          <?php } ?>
      </tbody>
    </table>
    </div>
  </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        $('#myModal').modal('show');
    });
</script>
