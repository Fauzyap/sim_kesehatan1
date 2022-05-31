@extends('templates/admin_temp')

@section('container')

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h4>Data Hitung IMT</h4>
		</div>

        <div class="section-body">
            {{-- <a href="/tambah_imt" class="btn btn-info ml-2">Tambah Data</a> --}}
            <br>	
            <br>
    
        <table id="table-1" class="table table-striped table-hovered table-bordered">
        <thead>	
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Rombel</th>
                    <th>Rayon</th>
                    <th>Hasil IMT</th>
                    
                </tr>
        </thead>
        <tbody>	
           
            
            @foreach ($dataImt as $item)
            <tr>
            <td>{{ $item->nis }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->rombel }}</td>
            <td>{{ $item->rayon }}</td>
            <td>{{ $item->hasil_imt }}</td>
            
            
        </tr>
            
            @endforeach
         
        </tbody>
        </table>
            </div>
        </div>
    </div>
    </div>
    







@endsection