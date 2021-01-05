<!-- Footer -->
      <footer class="sticky-footer bg-white" id="foot">
        <div class="container my-auto" id="footerId">
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

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <!-- <script src="js/demo/datatables-demo.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

  <!-- datatable CDN -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.js"></script>

  <script src="js/upload.js"></script>
  <script src="js/print.js"></script>

<!-- ############# CREDİT JS START ############# -->

  <script>
$(document).ready(function(){
  $('#partnorAdi').keyup(function(){
    var txtP=$(this).val();
    if(txtP!="")
    {
      $.ajax({
      url:"fetchPartnor.php",
      method:"POST",
      data:{searchP:txtP},
      dataType:"text",
      success:function(dataP)
      {
        $('#resultP').html(dataP);
      }
    });
    }
    else
    {
      $('#resultY').html('');
      $.ajax({
      url:"fetchPartnor.php",
      method:"POST",
      data:{searchP:txtP},
      dataType:"text",
      success:function(dataP)
      {
        $('#resultY').html(dataP);
      }
    });
    }
  });
});


$(document).ready(function(){
  $('#mma').keyup(function(){
    var txtY=$(this).val();
    var txtPA=$("#partnorAdi").val();
    if(txtY!="" && txtPA!="")
    {
      $.ajax({
      url:"fetchManu.php",
      method:"POST",
      data:{searchY:txtY,searchPa:txtPA},
      dataType:"text",
      success:function(dataY)
      {
        $('#resultY').html(dataY);
      }
    });
    }
    else
    {
      $('#resultY').html('');
      $.ajax({
      url:"fetchManu.php",
      method:"POST",
      data:{searchY:txtY},
      dataType:"text",
      success:function(dataY)
      {
        $('#resultY').html(dataY);
      }
    });
    }
  });
});

$(document).ready(function(){
  $('#modelX').keyup(function(){
    var pName=$("#partnorAdi").val();
    var mName=$("#mma").val();
    var txt=$(this).val();
    if(txt!="")
    {
      $.ajax({
      url:"fetchModel.php",
      method:"POST",
      data:{search:txt,pn:pName,mn:mName},
      dataType:"text",
      success:function(dataX)
      {
        $('#resultX').html(dataX);
      }
    });
    }
    else
    {
      $('#resultX').html('');
      $.ajax({
      url:"fetchModel.php",
      method:"POST",
      data:{search:txt},
      dataType:"text",
      success:function(dataX)
      {
        $('#resultX').html(dataX);
      }
    });
    }
  });
});


$(document).ready(function(){

$(".reset-row").click(function(){
  $("#partnorAdi").val("");
  $("#mma").val("");
  $("#modelX").val("");
  $('#seria').find('option').remove().end().append('<option value="">Birini seçin</option>').val('');
});


//  Add Product
$(".add-row").click(function(){
    var partnoR = $("#partnorAdi").val();
    var mma     = $("#mma").val();
    var model   = $("#modelX").val();
    var seria   = $("#seria").val();
    var mmq     = $("#mmq").val();
    if(seria.length<=4)
    {
      mmq=seria*mmq;
    }
    if(mma!="" && model!="" && mmq!="" && partnoR!="")
    {
      var markup = "<tr id='new'><td><input class='form-control' type='checkbox' name='record'></td><td><input class='form-control' name='partnors[]' type='hidden' value='"+partnoR+"'><input class='form-control' style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;font-size:1vw;' type='hidden' name='productNames[]' value='"+mma+"'><span style='font-size:1vw;' class='form-control'>"+mma+"</span></td><td><input class='form-control' style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;font-size:1vw;' type='hidden' name='models[]' value='"+model+"'><span style='font-size:1vw;' class='form-control'>"+model+"</span></td><td><input class='form-control' style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;font-size:1vw;' type='hidden' name='serias[]' value='"+seria+"'><span style='font-size:1vw;' class='form-control'>"+seria+"</span></td><td><input class='form-control pricess'  style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;font-size:1vw;' type='hidden' name='prices[]' value='"+mmq+"'><span style='font-size:1vw;' class='form-control'>"+mmq+"</span></td></tr><tr id ='total'><td></td><td></td><td></td><td></td><td></td></tr>";
      $("#qwe").after(markup);
      $('table tr#total').remove();
      var sum=0;
      $(".pricess").each(function(){
          quantity = parseFloat($(this).val());
          if (!isNaN(quantity)) {
              sum += quantity;
          }
      });
      var total="<tr id ='total'><td></td><td></td><td></td><td></td><td>Cəm: "+sum+" AZN</td></tr>";
      $("#new").before(total);
    }
});

// Find and remove selected table rows
$(".delete-row").click(function(){
    $("table tbody").find('input[name="record"]').each(function(){
        if($(this).is(":checked")){
            $(this).parents("tr").remove();
            var sum=0;

      $('table tr#total').remove();
      $(".pricess").each(function(){
          quantity = parseFloat($(this).val());
          if (!isNaN(quantity)) {
              sum += quantity;
          }
      });
      var total="<tr id ='total'><td></td><td></td><td></td><td></td><td>Cəm: "+sum+" AZN</td></tr>";
      $("#new").before(total);
        }
    });
});
}); 

  </script>
<!-- ############# CREDİT JS END ############# -->



<script>
    $(document).ready(function(){

        $(".reset-row2").click(function(){
          $("#partnorAdi").val("");
          $("#mma").val("");
          $("#modelX").val("");
          $('#seria').find('option').remove().end().append('<option value="">Birini seçin</option>').val('');
        });


        //  Add Product
        $(".add-row2").click(function(){
            var partnoR = $("#partnorAdi").val();
            var mma     = $("#mma").val();
            var model   = $("#modelX").val();
            var seria   = $("#seria").val();
            var Nmmq     = $("#Nmmq").val();
            if(seria.length<=4)
            {
              Nmmq=seria*Nmmq;
            }
            if(mma!="" && model!="" && Nmmq!="" && partnoR!="")
            {
              var markup = "<tr id='new'><td><input class='form-control' type='checkbox' name='record'></td><td><input class='form-control' name='partnors[]' type='hidden' value='"+partnoR+"'><input class='form-control' style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;font-size:1vw;' type='hidden' name='productNames[]' value='"+mma+"'><span style='font-size:1vw;' class='form-control'>"+mma+"</span></td><td><input class='form-control' style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;font-size:1vw;' type='hidden' name='models[]' value='"+model+"'><span style='font-size:1vw;' class='form-control'>"+model+"</span></td><td><input class='form-control' style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;font-size:1vw;' type='hidden' name='serias[]' value='"+seria+"'><span style='font-size:1vw;' class='form-control'>"+seria+"</span></td><td><input class='form-control pricess'  style='border:none;border-bottom:1px solid black;border-radius:0px;background-color:white;font-size:1vw;' type='hidden' name='prices[]' value='"+Nmmq+"'><span style='font-size:1vw;' class='form-control'>"+Nmmq+"</span></td></tr><tr id ='total'><td></td><td></td><td></td><td></td><td></td></tr>";
              $("#qwe").after(markup);
              $('table tr#total').remove();
              var sum=0;
              $(".pricess").each(function(){
                  quantity = parseFloat($(this).val());
                  if (!isNaN(quantity)) {
                      sum += quantity;
                  }
              });
              var total="<tr id ='total'><td></td><td></td><td></td><td></td><td>Cəm: "+sum+" AZN</td></tr>";
              $("#new").before(total);
            }
        });
        
        // Find and remove selected table rows
        $(".delete-row2").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                    var sum=0;

              $('table tr#total').remove();
              $(".pricess").each(function(){
                  quantity = parseFloat($(this).val());
                  if (!isNaN(quantity)) {
                      sum += quantity;
                  }
              });
              var total="<tr id ='total'><td></td><td></td><td></td><td></td><td>Cəm: "+sum+" AZN</td></tr>";
              $("#new").before(total);
                }
            });
        });
    });    
</script>

<script>  
 $(document).ready(function(){  
      $('body').on('click','.view_data',function(){  
        var proID = $(this).attr("id");
        // var table= $('#dataTable').dataTable();  
        $('#partnorAdi').val(proID);
        $('.view_data').css('display','none');
        // $('#add_data_Modal').modal("show");  
      });
 });
 </script>

<script>  
 $(document).ready(function(){  
      $('body').on('click','.view_data_2',function(){  
        var proID2 = $(this).attr("id");
        // var table= $('#dataTable').dataTable();  
        $('#mma').val(proID2);
        $('.view_data_2').css('display','none');
        // $('#add_data_Modal').modal("show");  
      });
 });
 </script>

<script>  
 $(document).ready(function(){  
      $('body').on('click','.view_data_3',function(){  
        var proID3 = $(this).attr("id");
        // var table= $('#dataTable').dataTable();  
        $('#modelX').val(proID3);
        $('.view_data_3').css('display','none');
        // $('#add_data_Modal').modal("show");  

        var partNor     =$("#partnorAdi").val();
        var proName     =$("#mma").val();
        var modelName   =$("#modelX").val();
        $.ajax({
          url:"fetch.php",
          method:"POST",
          data:{partnor:partNor,proname:proName,modelname:modelName},
          dataType:"text",
          success:function(data)
          {
            $('#seria').html(data);
            // alert(data)
          }
        }); 


        $.ajax({
          url:"fetchPriceDemo.php",
          method:"POST",
          data:{partnor:partNor,proname:proName,modelname:modelName},
          dataType:"text",
          success:function(dataZ)
          {
            $('#priceDemo').html(dataZ);
          }
        });


        $.ajax({
          url:"fetchPrice.php",
          method:"POST",
          data:{partnor:partNor,proname:proName,modelname:modelName},
          dataType:"text",
          success:function(dataZ)
          {
            $('#mmq').val(dataZ);
          }
        });

        $.ajax({
        url:"fetchPrice2.php",
        method:"POST",
        data:{partnor:partNor,proname:proName,modelname:modelName},
        dataType:"text",
        success:function(dataZ)
        {
          $('#Nmmq').val(dataZ);
        }
      });

        $.ajax({
        url:"fetchPriceDemo2.php",
        method:"POST",
        data:{partnor:partNor,proname:proName,modelname:modelName},
        dataType:"text",
        success:function(dataZ)
        {
          $('#priceDemo2').html(dataZ);
        }
      });


      });
 });

 </script>


 <!-- products table start -->
<script>
$('#SellerProducts').DataTable({
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
    url:'Sellerapi.php',
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
    {data:'selling'},
    {data:'credit'}
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
              columns:[0,1,2,3,4,5,6,7,8]
            }
          },
          'csv', 
          {
            extend:'excel',
            title:'Məhsullar',
            exportOptions:{
              columns:[0,1,2,3,4,5,6,7,8]
            }
          }
        ]
    } 
});
</script>  

<!-- products table end -->

<!-- products table start -->
<script>
$('#overdue').DataTable({
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
    url:'gecikmis.php',
    type:'POST'
  },
  columns:[
    {data:'fin'},
    {data:'name'},
    {data:'address'},
    {data:'productDetails'},
    {data:'avaragePay'},
    {data:'remindMoney'},
    {data:'totalDebbeDays'},
    {data:'sellerTime'},
    {data:'debbeDays'},
    {data:'firstPrice'}
  ],
  dom: '<"top"lBf>rt<"bottom"ip><"clear">',
  buttons: {
        buttons: [ 
          'copy', 
          {
            extend:'pdf',
            title:'BORCLULAR',
            customize:function(doc){
              Array(doc.content[1].table.body[0].length+1).join('*').split('');
            },
            exportOptions:{
              columns:[0,1,2,3,4,5,6,7]
            }
          },
          'csv', 
          {
            extend:'excel',
            title:'BORCLULAR',
            exportOptions:{
              columns:[0,1,2,3,4,5,6,7]
            }
          }
        ]
    } 
});
</script>  

<!-- products table end -->

<!-- products selled start -->
<script>
$('#credbmk').DataTable({
  pageLength:10,
  lengthMenu: [
      [10,25,50,75,100],
      ['10 ədəd','25 ədəd','50 ədəd','75 ədəd','100 ədəd']
    ],
  order: [
    [ 0, 'asc' ], [ 1, 'asc' ], [ 2, 'asc' ], [ 3, 'asc' ], [ 4, 'asc' ], [ 5, 'asc' ]
  ],
  columnDefs:[
    {
      targets:[0,1,2,3,4,5],
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
    url:'credbmkApi.php',
    type:'POST'
  },
  columns:[
    {data:'realbmk'},
    {data:'name'},
    {data:'productDetails'},
    {data:'rejectedProducts'},
    {data:'sellerTime'},
    {data:'id'}
  ],
  dom: '<"top"lBf>rt<"bottom"ip><"clear">',
  buttons: {
        buttons: [ 
          'copy', 
          {
            extend:'pdf',
            title:'Müqavilələr',
            customize:function(doc){
              Array(doc.content[1].table.body[0].length+1).join('*').split('');
            },
            exportOptions:{
              columns:[0,1,2,3,4]
            }
          },
          'csv', 
          {
            extend:'excel',
            title:'Müqavilələr',
            exportOptions:{
              columns:[0,1,2,3,4]
            }
          }
        ]
    } 
});
</script>  

<!-- products table end -->
</body>

</html>