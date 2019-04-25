//判断手机是否已注册
function findphone(phone){
    var bool;
    //发送ajax
    $.ajax({
        url:'/findphone',
        type:'GET',
        data:'phone='+phone,
        success:function(data){
            bool = data;
        },
        async:false
    })
    return bool;
}

//判断邮箱是否已注册
function findemail(email){
    var bool;
    //发送ajax
    $.ajax({
        url:'/findemail',
        type:'GET',
        data:'email='+email,
        success:function(data){
            bool = data;
        },
        async:false
    })
    return bool;
}