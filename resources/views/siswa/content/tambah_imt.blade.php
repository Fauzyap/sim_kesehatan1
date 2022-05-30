@extends('templates/siswa_temp')
@section('container')


<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h4>Form Hitung IMT</h4>
		</div>
		<div class="section-body">
			<div class="row">	
				<div class="col-6">
						<div class="card-deck">
						<div class="card">
                        <div class="card-body">
							<form action="{{ url('siswa_imt') }}" method="post">
                                @csrf
                                @if (Session::get('success'))
    <div>
        {!!Session::get('success') !!}
    </div>
    @endif

                                     <div class="form-group">
                                        <label>NIS</label>
                                        <input type="text" name="nis"  class="form-control text-dark" value="">
                                    </div>
                                     <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama"  class="form-control text-dark" value="">
                                    </div>
                                     <div class="form-group">
                                        <label>Rombel</label>
                                        <input type="text" name="rombel"  class="form-control text-dark" value="">
                                    </div>
                                     <div class="form-group">
                                        <label>Rayon</label>
                                        <input type="text" name="rayon"  class="form-control text-dark" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Tinggi Badang (cm)</label>
                                        <input type="text" name="tb"   class="form-control text-dark" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Berat Badan (kg)</label>
                                        <input type="text" name="bb"   class="form-control text-dark" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Semester</label>
                                        <input type="date" name="tanggal"   class="form-control text-dark" value="">
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
		</div>
	</section>
</div>

@endsection