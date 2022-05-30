@extends('templates/admin_temp')

@section('container')

<div class="container-fluid">
<div class="main-content">
	<div class="section">
		<div class="section-header">
<body>
	
	<h1>Data Siswa Kelas XII</h1>
                   
                        <div class="container justify-content-center ">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-secondary" ><a href="/siswaX" style="color:white;">X</a></button>
                        <button type="button" class="btn btn-secondary"><a href="/siswaXI" style="color:white;">XI</a></button>
                        <button type="button" class="btn btn-secondary"><a href="/siswaXII" style="color:white;">XII</a></button>
                        </div>
                        </div>
                    
                
    
		</div>
        
		<form enctype="multipart/form-data" method="post" action="{{route('XiiImport')}}"  >
		@csrf
        <div class="section-body">
		<input type="file" name="file" required>
		<button type="submit" class="btn btn-info ml-2" >
		Import Data
		</button>
		</form>
	
		<a href="{{ route('XiiExport')}}" class="btn btn-info ml-2">Export Data</a>
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
		@foreach ($siswaXII as $cls)
		<tr>
                          <td>{{$cls->nis}}</td>
                          <td>{{$cls->nama}}</td>
                          <td>{{$cls->JK}}</td>
						  <td>{{$cls->rombel}}</td>
						  <td>{{$cls->rayon}}</td>
		<td> 
		<a class="btn btn-primary" href="{{ route('siswaXII.edit',$cls->nis) }}">Edit</a>
		<a class="btn btn-danger" href="{{ url('siswaXII/hapus',$cls->nis) }}">Delete</a>
     
		
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
