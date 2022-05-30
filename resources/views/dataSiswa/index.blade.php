@extends('templates/admin_temp')

@section('container')

<div class="container-fluid">
<div class="main-content">
	<div class="section">
		<div class="section-header">
<body>
	
	<h1>Data Seluruh Siswa </h1>
                   
                     
                    
                
    
		</div>
        
		<form enctype="multipart/form-data" method="post" action="{{route('import')}}"  >
		@csrf
        <div class="section-body">
		<input type="file" name="file" required>
		<button type="submit" class="btn btn-info ml-2" >
		Import Data
		</button>
		</form>
	
		<a href="{{ route('export')}}" class="btn btn-info ml-2">Export Data</a>
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
		@foreach ($dataSiswa as $cls)
		<tr>
                          <td>{{$cls->nis}}</td>
                          <td>{{$cls->nama}}</td>
                          <td>{{$cls->JK}}</td>
						  <td>{{$cls->rombel}}</td>
						  <td>{{$cls->rayon}}</td>
		<td> 
		<a class="btn btn-primary" href="{{ route('dataSiswa.edit',$cls->nis) }}">Edit</a>
		<a class="btn btn-danger" href="{{ url('dataSiswa/hapus',$cls->nis) }}">Delete</a>
     
		
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
