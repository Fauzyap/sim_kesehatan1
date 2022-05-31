@extends('templates/admin_temp')

@section('container')

<div class="container-fluid">
<div class="main-content">
	<div class="section">
		<div class="section-header">
<body>
	
	<h1>Data Seluruh Siswa </h1>
                   
                    
                
    
		</div>
        
		<form enctype="multipart/form-data" method="post" action="{{route('Ximport')}}"  >
		@csrf
        <div class="section-body">
		<input type="file" name="file" required>
		<button type="submit" class="btn btn-info ml-2" >
		Import Data
		</button>
		</form>
	
		<a href="{{ route('Xexport')}}" class="btn btn-info ml-2">Export Data</a>
		<br>	
		<br>

	<table id="table-1" class="table table-striped table-hovered table-bordered">
	<thead>	
			<tr>
				<th>NIS</th>
				<th>Nama</th>
                <th>JK</th>
				<th>Rombel</th>
				<th>Rayon</th>
				<th>Aksi</th>
			</tr>
	</thead>
	<tbody>	
		@foreach ($dataSiswa as $siswa)
		<tr>
                          <td>{{$siswa->nis}}</td>
                          <td>{{$siswa->nama}}</td>
                          <td>{{$siswa->JK}}</td>
						  <td>{{$siswa->rombel}}</td>
						  <td>{{$siswa->rayon}}</td>
		<td> 
		<a class="btn btn-primary" href="{{ route('siswa_data.edit',$siswa->nis) }}">Edit</a>
		<a class="btn btn-danger" href="{{ url('siswa_data/hapus',$siswa->nis) }}">Delete</a>
     
		
		</td>
	</tr>
	@endforeach
	</tbody>
	</table>
 



    </div>
  
		
        
	</div>
</div>

</body>


@endsection
