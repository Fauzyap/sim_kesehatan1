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
								
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection
