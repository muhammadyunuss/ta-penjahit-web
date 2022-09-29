<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Pilih Supplier</h4>
			</div>
			<div class="modal-body" id="msg">
            <table class="table" id="sample_1">
                <thead>
                    <tr>
                    <!-- <th>ID</th> -->
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($supplier as $s) 
                    <tr>
                        <td>{{ $s->nama_supplier}}</td>
                        <td>{{ $s->email}}</td>
                        <td>{{ $s->no_telepon}}</td>
                        <td>
                            <a class="btn btn-default" href="{{ route('pembelian.create', $s->id) }}" >Pilih</a>
                        </td>
                    </tr>
                   @endforeach
                </tbody>
                </table>
			</div>
			<!-- <div class="modal-footer">
				
			</div> -->
		</div>
	</div>
</div>

@section('footer')
<script type="text/javascript" src="{{ asset('assets/plugins/select2/select2.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
<script>
jQuery(document).ready(function() {    
	//plugin datatable
	$('#sample_1').DataTable();
});
</script>

<script>
    function addForm() {
        $('#modal-supplier').modal('show');
    }
</script>
@stop
