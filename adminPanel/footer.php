      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>MÜƏLLİF HÜQUQLARI QORUNUR &copy; BARCODE 
            <?php  
            $year=date("Y");
            if($year==2020)
            {
              echo $year;
            }
            else
            {
              echo "2020 - ".$year;
            }
            ?>
            </span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Çıxmaq istiyirsən?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Əgər çıxış etmək istiyirsənsə,"Çıxış" a vur</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Rədd et</button>
          <a class="btn btn-primary" href="exit.php">Çıxış</a>
        </div>
      </div>
    </div>
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>  
  

  <!-- <script src="js/demo/datatables-demo.js"></script> -->
  <!-- <script src="vendor/datatables/jquery.dataTables.min.js"></script> -->
  <!-- <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  

  <!-- datatable CDN -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.js"></script>
  
<script src="js/hidden.js"></script>
<!-- products table start -->
<script>
$('#products').DataTable({
  pageLength:10,
  lengthMenu: [
      [10,25,50,75,100],
      ['10 ədəd','25 ədəd','50 ədəd','75 ədəd','100 ədəd']
    ],
  order: [
    [ 0, 'asc' ], [ 1, 'asc' ], [ 2, 'asc' ], [ 3, 'asc' ], [ 4, 'asc' ], [ 5, 'asc' ], [ 6, 'asc' ], [ 7, 'asc' ], [ 8, 'asc' ], [ 9, 'asc' ]
  ],
  columnDefs:[
    {
      targets:[0,1,2,3,4,5,6,7,8,9],
      orderable:true
    }
  ],
  language: {
    "sEmptyTable":     "Cədvəldə heç bir məlumat yoxdur",
    "sInfo":           " _TOTAL_ Nəticədən _START_ - _END_ Arası Nəticələr",
    "sInfoEmpty":      "Nəticə Yoxdur",
    "sInfoFiltered":   "( _MAX_ Nəticə İçindən Tapılanlar)",
    "sInfoPostFix":    "",
    "sInfoThousands":  ",",
    "sLengthMenu":     "Səhifədə _MENU_ Nəticə Göstər",
    "sLoadingRecords": "<div class=\"lds-ripple\"><div></div><div></div></div>",
    "sProcessing":     "Gözləyin...",
    "sSearch":         "Axtarış:",
    "sZeroRecords":    "Nəticə Tapılmadı.",
    "oPaginate": {
        "sFirst":    "İlk",
        "sLast":     "Axırıncı",
        "sNext":     "Sonraki",
        "sPrevious": "Öncəki"
    },
    "oAria": {
        "sSortAscending":  ": sütunu artma sırası üzərə aktiv etmək",
        "sSortDescending": ": sütunu azalma sırası üzərə aktiv etmək"
    }
  },
  prosessing:true,
  serverSide:true,
  ajax:{
    url:'api.php',
    type:'POST'
  },
  columns:[
    {data:'say'},
    {data:'warehouse'},
    {data:'partnor'},
    {data:'manufacturer'},
    {data:'model'},
    {data:'category'},
    {data:'seria'},
    {data:'productDate'},
    {data:'wholesale'},
    {data:'selling'},
    {data:'credit'},
    {data:'id'}
  ],
  dom: '<"top"lBf>rt<"bottom"ip><"clear">',
  buttons: {
        buttons: [ 
          'copy', 
          {
            extend:'pdf',
            title:'Məhsullar',
            customize:function(doc){
              Array(doc.content[1].table.body[0].length+1).join('*').split('');
            },
            exportOptions:{
              columns:[0,1,2,3,4,5,6,7,8,9,10]
            }
          },
          'csv', 
          {
            extend:'excel',
            title:'Məhsullar',
            exportOptions:{
              columns:[0,1,2,3,4,5,6,7,8,9,10]
            }
          }
        ]
    } 
});
</script>  

<!-- products table end -->


<!-- news start -->


<script>
$('#news').DataTable({
  pageLength:10,
  lengthMenu: [
      [10,25,50,75,100],
      ['10 ədəd','25 ədəd','50 ədəd','75 ədəd','100 ədəd']
    ],
  order: [
     [ 0, 'asc' ],[ 1, 'asc' ]
  ],
  columnDefs:[
    {
      targets:[0],
      visible:false,
      searchable:false,
      orderable:true
    }
  ],
  language: {
    "sEmptyTable":     "Cədvəldə heç bir məlumat yoxdur",
    "sInfo":           " _TOTAL_ Nəticədən _START_ - _END_ Arası Nəticələr",
    "sInfoEmpty":      "Nəticə Yoxdur",
    "sInfoFiltered":   "( _MAX_ Nəticə İçindən Tapılanlar)",
    "sInfoPostFix":    "",
    "sInfoThousands":  ",",
    "sLengthMenu":     "Səhifədə _MENU_ Nəticə Göstər",
    "sLoadingRecords": "<div class=\"lds-ripple\"><div></div><div></div></div>",
    "sProcessing":     "Gözləyin...",
    "sSearch":         "Axtarış:",
    "sZeroRecords":    "Nəticə Tapılmadı.",
    "oPaginate": {
        "sFirst":    "İlk",
        "sLast":     "Axırıncı",
        "sNext":     "Sonraki",
        "sPrevious": "Öncəki"
    },
    "oAria": {
        "sSortAscending":  ": sütunu artma sırası üzərə aktiv etmək",
        "sSortDescending": ": sütunu azalma sırası üzərə aktiv etmək"
    }
  },
  prosessing:true,
  serverSide:true,
  ajax:{
    url:'apiNews.php',
    type:'POST'
  },
  columns:[
    {data:'id'},
    {data:'description'},
  ],
  dom: '<"top"lBf>rt<"bottom"ip><"clear">',
  buttons: {
      buttons: [ 
        'copy', 
        {
          extend:'pdf',
          title:'Xəbərlər',
          customize:function(doc){
            Array(doc.content[1].table.body[0].length+1).join('*').split('');
          },
          exportOptions:{
            columns:[1]
          }
        }
      ]
    }, 
});
</script>  

<!-- news end -->
  
<script>
    $(document).ready(function(){
        $("#new").click(function(){
            var markup = '<div class="form-group row sh1"><label for="seria" class="col-sm-2 col-form-label">Seria</label><div class="col-sm-10"><input type="text" name="serias[]" class="form-control" id="seria" placeholder="358176107786119" maxlength="100"></div></div>';
            $("#addDiv").after(markup);
        });
        
        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });    
</script>
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <h4 class="modal-title">Məhsul detalları</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Bağla</button>  
                </div>  
           </div>  
      </div>  
 </div>  
<div id="add_data_Modal" class="modal fade">  
    <div class="modal-dialog">  
         <div class="modal-content">  
              <div class="modal-header">  
                   <h4 class="modal-title">Məhsulu yerləşdir</h4> 
                   <p id="demo"></p> 
              </div>  
              <div class="modal-body">  
                   <form method="post" id="insert_form" onsubmit="return false">  
                        <label>Ünvan seçin</label>  
<?php 
$query4Warehouse=$conn->prepare("SELECT * FROM warehouse WHERE id>? ORDER BY name");
$query4Warehouse->execute([0]);
$rows4Warehouse=$query4Warehouse->fetchall(PDO::FETCH_ASSOC);
$count4Warehouse=count($rows4Warehouse);
if($count4Warehouse!=0)
{
  $query4Store=$conn->prepare("SELECT * FROM store WHERE id>? ORDER BY name");
  $query4Store->execute([0]);
  $rows4Store=$query4Store->fetchall(PDO::FETCH_ASSOC);
  $count4Store=count($rows4Store);
  if($count4Store!=0)
  {
    ?>
  <select class="form-control" name="address" id="address">
    <?php
    foreach($rows4Warehouse as $row4Warehouse)
    {
      ?>
        <option value="<?php echo $row4Warehouse['name']; ?>"><?php echo $row4Warehouse['name']; ?></option>
      <?php
    }
    foreach($rows4Store as $row4Store)
    {
      ?>
        <option value="<?php echo $row4Store['name']; ?>"><?php echo $row4Store['name']; ?></option>
      <?php
    }
  }
  ?>
  </select>
  <?php
}
else
{
  echo "İlk öncə anbarları daxil edin";
}
?>
                        <br />  
                        <input type="hidden" name="proID" id="proID" />  
                        <input type="hidden" name="startN" id="startN" />  
                        <input type="hidden" name="pageN" id="pageN" />  
                        <input type="submit" name="insert" class="btn btn-success" id="insert" value="Yerləşdir" class="btn btn-success" />  
                   </form>  
              </div>  
              <div class="modal-footer">  
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Bağla</button>  
              </div>  
         </div>  
    </div>  
</div>
</body>

</html>

<!-- products share start -->

 <script>  
 $(document).ready(function(){  
      $('body').on('click','.view_data',function(){  
        var proID = $(this).attr("id");
        var startID = $("#startID").val();
        var length = $("#length").val();
        $('#proID').val(proID);
        $('#startN').val(startID);
        $('#pageN').val(length);
        $('#add_data_Modal').modal("show");  
      });
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
             
      $.ajax({  
           url:"select.php",  
           method:"POST",  
           data:$('#insert_form').serialize(),  
           beforeSend:function(){  
                $('#insert').val("Yerləşdirilir...");  
           },  
           success:function(data){  
                $('#insert_form')[0].reset();  
                $('#add_data_Modal').modal('hide');
                $('#products').DataTable().ajax.reload( null, false );
           }  
      });
      }); 
 });
 </script>
<!-- products share end