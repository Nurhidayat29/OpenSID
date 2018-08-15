<div class="content-wrapper">
	<section class="content-header">
		<?php if ($tampil == 0): ?>
			<h1>Daftar Program Bantuan</h1>
		<?php else: ?>
			<h1>Daftar Program Bantuan dengan Sasaran <?=$sasaran[$tampil];?></h1>
		<?php endif; ?>
		<ol class="breadcrumb">
			<li><a href="<?=site_url('hom_desa')?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Daftar Program Bantuan</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url('program_bantuan/create')?>" class="btn btn-social btn-flat bg-olive btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Tambah Program Bantuan Baru"><i class="fa fa-plus"></i> Tambah Program Bantuan</a>
						<a href="<?=site_url('program_bantuan/panduan')?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Tambah Program Bantuan Baru"><i class="fa fa-question-circle"></i> Panduan</a>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<div class="row">
										<div class="col-sm-12">
											<div class="table-responsive">
												<table class="table table-bordered table-striped dataTable table-hover">
													<thead class="bg-gray disabled color-palette">
														<tr>
															<th>No</th>
															<th>Aksi</th>
															<th nowrap>Nama Program</th>
															<th nowrap>Masa Berlaku</th>
															<th>Sasaran</th>
														</tr>
													</thead>
													<tbody>
														<?php
															$nomer = $paging->offset;
															foreach ($program as $item):
																$nomer++;
														?>
															<tr>
																<td><?= $nomer?></td>
																<td nowrap>
																	<a href="<?= site_url("program_bantuan/detail/1/$item[id]/")?>" class="btn bg-purple btn-flat btn-sm"  title="Rincian"><i class="fa fa-list"></i></a>
																	<a href="<?= site_url("program_bantuan/edit/$item[id]/")?>" class="btn bg-orange btn-flat btn-sm"  title="Ubah"><i class="fa fa-edit"></i></a>
																	<a href="#" data-href="<?= site_url("program_bantuan/hapus/$item[id]/")?>" class="btn bg-maroon btn-flat btn-sm"  title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
																</td>
																<td width="60%"><a href="<?= site_url('program_bantuan/detail/1/'.$item["id"].'/')?>"><?= $item["nama"] ?></a></td>
																<td nowrap><?= fTampilTgl($item["sdate"],$item["edate"]);?></td>
																<td nowrap><a href="<?= site_url('program_bantuan/sasaran/'.$item["sasaran"].'/'.$sasaran[$item["sasaran"]].'')?>"><?= $sasaran[$item["sasaran"]]?></a></td>
															</tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="dataTables_length">
                        <form id="paging" action="<?= site_url("program_bantuan/index/1")?>" method="post" class="form-horizontal">
                          <label>
                            Tampilkan
                            <select name="per_page" class="form-control input-sm" onchange="$('#paging').submit()">
      	                      <option value="20" <?php selected($per_page, 20); ?> >20</option>
                              <option value="50" <?php selected($per_page, 50); ?> >50</option>
                              <option value="100" <?php selected($per_page, 100); ?> >100</option>
                            </select>
        	                  Dari
                            <strong><?= $paging->num_rows?></strong>
                            Total Data
                          </label>
                        </form>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                          <?php if ($paging->start_link): ?>
                            <li><a href="<?=site_url("program_bantuan/index/$paging->start_link/")?>" aria-label="First"><span aria-hidden="true">Awal</span></a></li>
                          <?php endif; ?>
                          <?php if ($paging->prev): ?>
                            <li><a href="<?=site_url("program_bantuan/index/$paging->prev/")?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                          <?php endif; ?>
                          <?php for ($i=$paging->start_link;$i<=$paging->end_link;$i++): ?>
                            <li <?=jecho($p, $i, "class='active'")?>><a href="<?= site_url("program_bantuan/index/$i/")?>"><?= $i?></a></li>
                          <?php endfor; ?>
                          <?php if ($paging->next): ?>
                            <li><a href="<?=site_url("program_bantuan/index/$paging->next/")?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                          <?php endif; ?>
                          <?php if ($paging->end_link): ?>
                            <li><a href="<?=site_url("program_bantuan/index/$paging->end_link/")?>" aria-label="Last"><span aria-hidden="true">Akhir</span></a></li>
                          <?php endif; ?>
                        </ul>
                      </div>
                    </div>
                  </div>
								</div>
							</div>
						</div>
						<div class='modal fade' id='confirm-delete' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
							<div class='modal-dialog'>
								<div class='modal-content'>
									<div class='modal-header'>
										<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
										<h4 class='modal-title' id='myModalLabel'><i class='fa fa-text-width text-yellow'></i> Konfirmasi</h4>
									</div>
									<div class='modal-body btn-info'>
										Apakah Anda yakin ingin menghapus data ini?
									</div>
									<div class='modal-footer'>
										<button type="button" class="btn btn-social btn-flat btn-warning btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
										<a class='btn-ok'>
											<button type="button" class="btn btn-social btn-flat btn-danger btn-sm" id="ok-delete"><i class='fa fa-trash-o'></i> Hapus</button>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

