function add_follow(main_id, user_id){
    $.ajax(
        {
            type: "POST",
            url: './controller/add_follow.php',
            data: {main_id: main_id, user_id: user_id},
            success:function(){
                window.location.assign("./compte-user");
            }
        }
    )
}
function remove_follow(main_id, user_id){
    $.ajax({
        type: "POST",
        url: './controller/remove_follow.php',
        data: {main_id: main_id, user_id: user_id},
        success:function(){
            window.location.assign("./compte-user");
        }
    })
}