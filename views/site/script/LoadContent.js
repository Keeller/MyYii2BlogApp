

function ViewPost(e) {
    e.preventDefault();
    var html=$.ajax({
        url:"http://blogapp.ru/articles/foo/8",
        content:document.body,
        success:function (data) {
            document.getElementById('main').innerHTML(data);
        }
    });

}