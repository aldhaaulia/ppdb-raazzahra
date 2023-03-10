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
      </ol>
    </div>
  </header>

<?php $this->view('message')?>

<section class="panel">
  <header class="panel-heading">
      <div class="text-center">
      <form class="form-horizontal form-bordered" action="<?php echo site_url('laporan/cetak_pdf'); ?>" method="post" target="_blank">
        <button type="submit" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Cetak Laporan Pendaftaran</button>
      </div>
    </form>
    <h2 class="panel-title">Data Siswa Lolos Seleksi</h2>
  </header>
   
    <div class="panel-body">
    <div class="table-responsive col-lg-12">
    <table class="table table-hover mb-none table-bordered table-striped mb-none dataTable no-footer" id="datatable-default">
      <thead>
        <tr>
          <th>No</th>
          <th>No. Pendaftar</th>
          <th>Nama</th>
          <th>JK</th>
          <th>Ket</th>
        </tr>
      </thead>
      <tbody>
          <?php $no=1;
          foreach($row->result()as $key => $data) {?>
          <tr>
            <td><?=$no;?></td>
            <td><?=$data->pendaftar_id.''.$data->user_id.'/'.date("dmY", strtotime($data->created_at))?></td>
            <td><?=$data->nama_siswa?></td>
            <td><?=$data->jk?></td>
            <th><span class='label label-primary'>Lolos</span></th>
          </tr>
          <?php
          $no++;
          } ?>
      </tbody>
    </table>
  </div>
  </div>
  </div>
</section>
