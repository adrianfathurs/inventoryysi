  @layout('template/main/barang/main')

  @section('scripts-css')
   <style type="text/css">
    .selecting{
        color:#000000;
        }
    .selecting:hover{
        color:#7CFC00;  
        }
    .deleting{
        color: red;
        }
    #exampleModalCenter
      {
        display:none;
        position: fixed;
      }
    #btncheckbox{
      margin-top: 20px;
      margin-left: 40px;
    }
   </style>
  @endsection
  
  @section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
        
         <?= $this->session->tempdata('message');?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
               <div class="card-header">
                 
                    <center> <h1 class="h3 mb-2 text-gray-800"><strong>{{$subtitle}}</strong></h1></center>
               </div>


            <div class="card-body">
                <form id="form_cek" name="form_cek" method="POST"  >  
                  <p>select rows data</p>
                  <pre id="views-row"></pre>
                  <button name="btnsubmit" id="btncheckbox" class="btn btn-primary py-8 px-8"  type="submit">PILIH BARANG</button>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><center>No</center></th>
                      <th><center>Nama Barang</center></th>
                      <th><center>Merk</center></th>
                      <th><center>No. Pabrik</center></th>
                      <th><center>Bahan</center></th>
                      <th><center>Cara Peroleh</center></th>
                      <th><center>Tanggal Perolehan</center></th>
                      <th><center>Warna Barang</center></th>
                      <th><center>Satuan</center></th>
                      <th><center>Keadaan Barang</center></th>
                      <th><center>Harga/Satuan</center></th>
                      <th><center>Tanggal Rusak</center></th>
                      <th><center>Lokasi</center></th>
                      <th><center>Action</center></th>
                    </tr>
                  </thead>
                  <tbody class="tbody"></tbody>
                </table>
              </div>
                </form>
            </div>
          </div>
      </div> 
      </div> 
      <!-- End of Main Content -->
@endsection

@section('scripts-js')
  
  <script>
    $(document).ready(function(){
      
      function fetch_data()
      {
        $.ajax({
          url:'{{base_url('barang/daftarbarang')}}',
          method:"POST",
          dataType:"JSON",
          success:function(daftarku)
          {
            var html='';
            <?php foreach ($daftar as $key): ?>
              html+='<tr>';
              html+='<td><input type="checkbox" id="'+<?=$key['id_barcode']?>+'" data-name="'+<?=$key['nama_barang']?>+'" class="check_box"/></td>';
              html+='<td>'+<?= $key['nama_barang']?>+'</td>';
              html+='<td>'+<?= $key['nama_barang']?>+'</td>';
              html+='<td>'+<?= $key['nama_barang']?>+'</td>';
              html+='<td>'+<?= $key['nama_barang']?>+'</td>';
              html+='<td>'+<?= $key['nama_barang']?>+'</td>';
              html+='<td>'+<?= $key['nama_barang']?>+'</td>';
              html+='<td>'+<?= $key['nama_barang']?>+'</td>';
              html+='<td>'+<?= $key['nama_barang']?>+'</td>';
              html+='<td>'+<?= $key['nama_barang']?>+'</td>';
              html+='<td>'+<?= $key['nama_barang']?>+'</td>';
              html+='<td>'+<?= $key['nama_barang']?>+'</td>';
              html+='<td>'+<?= $key['nama_barang']?>+'</td>';
              html+='<td>'+<?= $key['nama_barang']?>+'</td>';
              html+='</tr>';
            <?php endforeach ?>
            $(".tbody").html(html);
            
          }
        });
      }   
      //fetch_data();    
      }); 
      //check box selection
      /*{
        ajax:'data.json',
         columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]]
      })

      $("#form_cek").on('submit',function(e){
        var form =this
        var rowsel=table.column(0).checkboxes.selected();
        $.each(rowsel,function(index,rowId){
          $(form).append(
            $('<input>').attr('type','hidden').attr('name','id[]').val(rowId)

            )
        })
        $("#views-row").text(rowsel.join(","))
        $('input[name="id\[\]"]',form).remove();
        e.preventDefault()
      }*/
               







               //var act= $('#cek').val();
     
/*          $.ajax({
              type:"POST",              
              data:'id='+ act,
              url:'<?php //echo base_url('barang/selectbarcode')?>',
              dataType:'json',
              success:function(result)
              {
                  
                         console.log(result)
    
              }

            });


      } );*/


     /* $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#bodyTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
      });
*/

      
   
   
   


  </script>


  @endsection