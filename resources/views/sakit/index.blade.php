@extends('templates/admin_temp')

@section('container')

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h4>Data Laporan Siswa Sakit</h4>
		</div>



		<div class="section-body">
			<a href="{{ route('sakit.create') }}" class="btn btn-info">Tambah Data</a>
			<div class="row">
				<br>
				<div class="col">
					<div class="card">
						<div class="card-body">
								<table id="table-1" class="table table-striped">
									<thead>
										<tr>
											<th>NIS</th>
											<th>Nama</th>
											<th>JK</th>
											<th>Rombel</th>
											<th>Rayon</th>
											<th>Tanggal</th>
											<th>Pukul</th>
											<th>Suhu Tubuh</th>
                                            <th>Tensi</th>
											<th>Diagnosa</th>
											<th>Keterangan</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>	
                                    @foreach ($sakit as $skt)
										<tr>
                                        <td>{{$skt->nis}}</td>
                                        <td>{{$skt->nama}}</td>
                                        <td>{{$skt->JK}}</td>
                                        <td>{{$skt->rombel}}</td>
                                        <td>{{$skt->rayon}}</td>
                                        <td>{{$skt->tanggal}}</td>
                                        <td>{{$skt->pukul}}</td>
                                        <td>{{$skt->suhutubuh}}</td>
                                        <td>{{$skt->tensi}}</td>
                                        <td>{{$skt->diagnosa}}</td>
                                        <td>{{$skt->keterangan}}</td>
											<td>
                                            <a class="btn btn-primary" href="{{ route('sakit.edit',$skt->nis) }}">Edit</a>
		                                    <a class="btn btn-danger" href="{{ url('sakit/hapus',$skt->nis) }}">Delete</a>
     
		
											</td>
										</tr>
                                        @endforeach
									</tbody>
								</table>
								<div class="col-4">
									<div class="text-left">
									<button disable class="btn btn-primary"><i class="fa fa-print">&nbsp;Cetak Laporan Bulanan</i></button>
									</div>
									<br>
									<div class="text-left">
										<form action="\" method="post">
											<div class="form-group">
												<select name="bulan" class="form-control" required="">
													<option disabled="" selected="">Pilih Bulan</option>
													<option value="01">Januari</option>
													<option value="02">Februari</option>
													<option value="03">Maret</option>
													<option value="04">April</option>
													<option value="05">Mei</option>
													<option value="06">Juni</option>
													<option value="07">Juli</option>
													<option value="08">Agustus</option>
													<option value="09">September</option>
													<option value="10">Oktober</option>
													<option value="11">November</option>
													<option value="12">Desember</option>
												</select>
											</div>
											<div class="form-group">
											<a href="/laporan" class="btn btn-success fa fa-print">Cetak Laporan</a>
											</div>
										</form>
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection
