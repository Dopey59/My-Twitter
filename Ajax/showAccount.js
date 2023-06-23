function showAccount(id, mainId){
    $.ajax(
        {
            type: "POST",
            url: './controller/accountUser.php',
            data: {user_id: id, main_id: mainId},
            success:function(response){
                if(response == 0){
                    window.location.assign("./compte");
                }
                else{
                    window.location.assign("./compte-user");
                }
            }
        }
    )
}