@extends('templates/admin_temp')

@section('container')

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h4>Data Siswa</h4>
		</div>
		<div class="section-body">
			<div class="row">	
				<div class="col-6">
						<div class="card">
						<div class="card-body">	
							<form action="{{ route('sakit.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
								<div class="form-group">
				
								<strong>NIS:</strong>
								<select class="form-control" name="nis">
									@foreach($dataSiswa as $cls)
									<option value="{{$cls->nis}}">{{$cls->nis}}</option>
									@endforeach
								</select>
      

								</div>
							
                                <div class="form-group">
									<label>Tanggal</label>
									<input type="date" name="tanggal"   class="form-control text-dark" value="">
								</div>
                                <div class="form-group">
									<label>Pukul</label>
									<input type="time" name="pukul"   class="form-control text-dark" value="">
								</div>
								<div class="form-group">
									<label>Suhu Tubuh</label>
									<input type="text" name="suhutubuh"   class="form-control text-dark" value="">
								</div>
								<div class="form-group">
									<label>Tensi</label>
									<input type="text" name="tensi"   class="form-control text-dark" value="">
								</div>
                                <div class="form-group">
									<label>Diagnosa</label>
									<input type="text" name="diagnosa"   class="form-control text-dark" value="">
								</div>
                                <div class="form-group">
									<label>Keterangan</label>
									<input type="text" name="keterangan"   class="form-control text-dark" value="">
								</div>
								<div class="row">
									<div class="col-6">	
										<button type="submit" class="btn btn-info form-control">SIMPAN</button>
									</div>

								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection