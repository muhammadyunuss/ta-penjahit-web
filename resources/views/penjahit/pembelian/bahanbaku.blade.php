<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Pilih Bahan Baku</h4>
			</div>
			<div class="modal-body" id="msg">
            <table class="table" id="sample_1">
                <thead>
                    <tr>
                    <!-- <th>ID</th> -->
                    <th>Nama</th>
                    <th>Harga Beli</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($bahan_baku as $bb)
                    <tr>
                        <td>{{ $bb->nama_bahanbaku}}</td>
                        <td>{{ $bb->harga_beli}}</td>
                        <td>
                            <a class="btn btn-default" onClick="pilihBahanBaku('{{ $bb->id }}', '{{ $bb->nama_bahanbaku}}')">Pilih</a>
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

@section('scripts')
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
    $(function () {
        table = $('.table-pembelian').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('pembelians_detail.data', $pembelian_id) }}',
            },
            coulmns: [
                {data: 'nama_bahanbaku'},
                {data: 'jumlah'},
                {data: 'harga_beli'},
                {data: 'subtotal'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });
    });

    function tampilBahanBaku() {
        $('#modal-bahan-baku').modal('show');
    }

    function tutupBahanBaku() {
        $('#modal-bahan-baku').modal('hide');
    }

    function pilihBahanBaku(id, nama_bahanbaku) {
        $('#id').val(id);
        $('#nama_bahanbaku').val(nama_bahanbaku);
        tutupBahanBaku();
        tambahBahanBaku();
    }

    function tambahBahanBaku() {
        $.post("{{ route('pembelians_detail.store') }}", $('.form-bahanbaku').serialize())
            .done(response => {
                $('#nama_bahanbaku').focus();

            })
            .fail(errors => {
                alert('Tidak dapat menyimpan data');
                return;
            });
    }
</script>
@stop
