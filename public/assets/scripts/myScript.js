
$(document).ready(function(){
	var soTietHoc = document.getElementById('soTietHoc').value;
	var SubjectNumberCredit = document.getElementById('Subject').value;
	//var tbody = document.getElementById('tbody');
	//alert('haha');
	/*$.get("ajaxCreateCalendar/"+SubjectNumberCredit+"/"+soTietHoc,function(data){
		alert('haha');
		tbody.innerHTML = data;
	});
	*/
	$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
	$.ajax({
        url : "ajaxCreateCalendar", // gửi ajax đến file result.php
        type : "get", // chọn phương thức gửi là get
        dateType:"text", // dữ liệu trả về dạng text
        data : { 
        	'SubjectNumberCredit' : SubjectNumberCredit,
        	'soTietHoc' : soTietHoc
        },
        success : function (result){
            // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
            // đó vào thẻ div có id = result
            $('#tbody').html(result);
        }
    });


});

function test(){

	var soTietHoc = document.getElementById('soTietHoc').value;
	var SubjectNumberCredit = document.getElementById('Subject').value;
	//var tbody = document.getElementById('tbody');
	//alert('haha');
	/*$.get("ajaxCreateCalendar/"+SubjectNumberCredit+"/"+soTietHoc,function(data){
		alert('haha');
		tbody.innerHTML = data;
	});
	*/
	$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
	$.ajax({
        url : "ajaxCreateCalendar", // gửi ajax đến file result.php
        type : "get", // chọn phương thức gửi là get
        dateType:"text", // dữ liệu trả về dạng text
        data : { 
        	'SubjectNumberCredit' : SubjectNumberCredit,
        	'soTietHoc' : soTietHoc
        },
        success : function (result){
            // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
            // đó vào thẻ div có id = result
            $('#tbody').html(result);
        }
    });

}

function change(){
    alert('hahaha');
    var textPrivateKey = document.getElementById("textPrivateKey");
    textPrivateKey.innerHTML = 'Demo thay đổi nội dung thẻ div bằn';
}
