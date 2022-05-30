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
							<form action="{{ route('siswaX.update',$siswaX->nis) }}" method="post">
                            @csrf

                            @method('PUT')
							<div class="form-group">
									<label>Nis</label>
									<input type="text" name="nis"  class="form-control text-dark" value="{{$siswaX->nis}}">
								</div>
								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="nama"  class="form-control text-dark" value="{{$siswaX->nama}}">
								</div>
                                <div class="form-group">
                                    @if($siswaX->JK == "L")
                                    <label for="jenis_kelamin">Jenis Kelamin :</label> <br>
                                <div class="form-check form-check-inline">
                                    <label for="jenis_kelamin">
                                        <input type="radio" name="JK" value="L" id="jenis_kelamin" checked>Laki-Laki
                                        <input type="radio" name="JK" value="P" id="jenis_kelamin">Perempuan
                                    </label>
                                    </div>
                                    @elseif($siswaX->JK == "P")
                                    <label for="jenis_kelamin">Jenis Kelamin :</label> <br>
                                <div class="form-check form-check-inline">
                                    <label for="jenis_kelamin">
                                        <input type="radio" name="JK" value="L" id="jenis_kelamin">Laki-Laki
                                        <input type="radio" name="JK" value="P" id="jenis_kelamin" checked>Perempuan
                                    </label>
                                    @endif
                            	</div>
								<div class="form-group">
									<label>Rombel</label>
									<input type="text" name="rombel"   class="form-control text-dark" value="{{$siswaX->rombel}}">
								</div>
								<div class="form-group">
									<label>Rayon</label>
									<input type="text" name="rayon"   class="form-control text-dark" value="{{$siswaX->rayon}}">
								</div>
								<div class="row">
									<div class="col-6">	
										<button class="btn btn-info form-control">UPDATE</button>
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
