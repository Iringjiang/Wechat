// **通用 AJAX 处理函数**
function my() {
    $.ajax({
        url: 'my.php'
    })
    .done((data) => {
     
            console.log(data);
            var datas = data.split("|");
            document.getElementById("name").innerHTML = datas[2];
            document.getElementById("sex").innerHTML = datas[3];
        
    })
    .fail(() => {
        $('#res').html('<span class="alert alert-danger">请求失败，请稍后重试。</span>');
    });
}