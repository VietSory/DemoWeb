$(document).ready(function () {
    $('#searchTerm').keyup(function () {
        var searchTerm = $(this).val();
        if (searchTerm != '')
            {
                 // Sử dụng AJAX để gửi yêu cầu tìm kiếm
                $.ajax({
                    type: 'POST',
                    url: 'view/client/index', // Đường dẫn tới file xử lý tìm kiếm PHP
                    data: { searchTerm: searchTerm },
                    success: function (data) 
                    {  
                    // Hiển thị kết quả tìm kiếm
                        $('#autocomplete-results').fadeIn();
                        $('#autocomplete-results').html(data);
                    },
                });
            } 
    });
});