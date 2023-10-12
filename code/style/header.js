hienThiNgay();
function hienThiNgay() {
    var ngayHienTai = new Date();
    var ngay = ngayHienTai.getDate();
    var thang = ngayHienTai.getMonth() + 1;
    var nam = ngayHienTai.getFullYear();
    var thu = ngayHienTai.getDay(); 
    var mangTenThu = ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy'];
    var ngayHienThi = mangTenThu[thu] + ', ' + ngay + '/' + thang + '/' + nam  ;
    document.getElementById('today').innerHTML = ngayHienThi;
}
