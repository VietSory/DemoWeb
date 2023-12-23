$(document).ready(function(){
  
  thongke();
  //var dataa= $("#data").val();
  var char = new Morris.Line({
      data:[
        {"date":"2023-12-02 17:25:33","order":13,"sales":415000,"quantity":415000}
      ],
      element: 'fchart',

      xkey: 'date',

      ykeys: ['order','sales','quantity'],
      // Labels for the ykeys -- will be displayed when you hover over the
      labels: ['Doanh thu','Đơn hàng','Số lượng sản phẩm bán ra']
  });
  function thongke(){
      var text='365 ngày qua';
      $('#text-date').text(text);
    /*$.ajax({
        method:"POST",
        url:'view/admin/index?act=thongke',
        dataType:"JSON",
        success:function(data){
          char.setData(data);
          $('#text-date').text(text);
        }
      });*/
    $.ajax({
        type: "POST",
        url: '',
        dataType : "JSON",
        data: { format: 'json' },
    }).done(function(data){
      char.setData(data);
      $('#text-date').text(text);
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
      console.log('AJAX Error:', textStatus, errorThrown);
      $('#text-date').text("dcm");
    });
  }
});
