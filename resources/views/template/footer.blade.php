    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Salam</b> version 0.1.0
        </div>
        <strong>Hak Cipta &copy; {{\Carbon\Carbon::now()->format('Y')}} <a href="#">Tim IT La Tansa Mashiro</a>.</strong>
    </footer>
</div>

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('bower_components/morris.js/morris.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- bootstrap time picker -->
<script src="{{asset('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script>
$(function () {
    var t = $('#example1').DataTable({
        "columnDefs": [
            { "orderable": false, "targets": [-1] }
        ],
        'pageLength'  : 20,
    });

    t.on('order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
    });

    $('#example3').DataTable({
        "columnDefs": [
            { "orderable": false, "targets": [0] }
        ],
        'paging'      : true,
        'pageLength'  : 1,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
    });
});
$('.confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    $(this).find('.messages').html('Anda yakin ingin menghapus <strong>'+$(e.relatedTarget).data('messages')+'</strong> ?');
});
$('.submit-from-modal').on('show.bs.modal', function(e) {
    $(this).find('form').attr('action', $(e.relatedTarget).data('href'));
});
$('.submit-from-modal-2').on('show.bs.modal', function(e) {
    $(this).find('form').attr('action', $(e.relatedTarget).data('href'));
    $(this).find('.value-mt').attr('value', $(e.relatedTarget).data('value'));
});
$('.confirm-from-modal').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    $(this).find('.messages').html($(e.relatedTarget).data('messages')+' ?');
});

//Santri Upload
function preSantri(event) 
{
    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('previewSantri');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
//Ayah Upload
function preAyah(event) 
{
    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('previewAyah');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
//Ibu Upload
function preIbu(event) 
{
    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('previewIbu');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

//Date picker
$('#datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
});

// Timepicker
// $('.timepicker').timepicker({
//     showInputs: false
// });

//REGISTRASI KELAS BULK
$(function() {
	$('.counter').text('0');
	
	var generallen = $("input.register:checked").length;
	if(generallen>0){$(".counter").text(''+generallen+'');}else{$(".counter").text('0');}
});

function updateCounter() {
    var kapasitas = $("input.kapasitas").val();
    var len = $("input.register:checked").length;
	if(len>0){$(".counter").text(''+len+'');}else{$(".counter").text('0');}
    if(len>kapasitas){
        $(".saved").attr('disabled','disabled');
    }else{
        $(".saved").removeAttr('disabled');
    }
}
$(".reset").on("click", function() {
	$('.counter').text('0');
});
$("input.register").on("change", function() {
	updateCounter();
});

//TAHUN AKADEMIK
$('.edit-ta').on('show.bs.modal', function(e) {
    $(this).find('.value-ta').attr('value', $(e.relatedTarget).data('value'));
    $(this).find('.value-id').attr('value', $(e.relatedTarget).data('id'));
});
//PEKERJAAN
$('.edit-job').on('show.bs.modal', function(e) {
    $(this).find('.value-job').attr('value', $(e.relatedTarget).data('value'));
    $(this).find('.value-id').attr('value', $(e.relatedTarget).data('id'));
});
//JADWAL
$('.create-jd').on('show.bs.modal', function(e) {
    $(this).find('.value-jd').attr('value', $(e.relatedTarget).data('jam'));
    $(this).find('.value-hr').attr('value', $(e.relatedTarget).data('hari'));
    //Datemask 
    $('[data-mask]').inputmask(
        "hh:mm", {
        placeholder: "HH:mm", 
        insertMode: false, 
        showMaskOnHover: true,
        hourFormat: 24
      }
    );
});
$('.change-jd').on('show.bs.modal', function(e) {
    $(this).find('.value-mp').attr('value', $(e.relatedTarget).data('mapel'));
    $(this).find('.value-id').attr('value', $(e.relatedTarget).data('id'));
    //Datemask 
    $('[data-mask]').inputmask(
        "hh:mm", {
        placeholder: "HH:mm", 
        insertMode: false, 
        showMaskOnHover: true,
        hourFormat: 24
      }
    );
});

//MORIS CHART
$(function () {
"use strict";
    // AREA CHART
    $.ajax({
        url : "{{route('ajax.santri-by-jk-year')}}",    
    }).done(function(data){
    var area = new Morris.Area({
        element: 'santri-jk-chart',
        resize: true,
        data: JSON.parse(data),
        xkey: 'y',
        ykeys: ['item1', 'item2'],
        labels: ['Laki-laki', 'Perempuan'],
        lineColors: ['#3c8dbc', '#f56954'],
        hideHover: 'auto',
        parseTime:false,
        gridIntegers: true,
        ymin: 0,
        ymax: 500
    });
    }).fail(function(){

    });  
});


$(function() {
    $.ajax({
        url : "{{route('ajax.santri-by-jk')}}",    
    }).done(function(data){
        new Morris.Donut({
        element: 'santri-st-chart',
        data: JSON.parse(data),
        resize: true,
        colors: ['#3c8dbc', '#f56954','#00a65a']
        });

    }).fail(function(){

    });
});
</script>
</body>
</html>