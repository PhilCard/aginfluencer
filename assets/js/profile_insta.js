//verifica perfil do instagram

function sanitizeUrl(str) {
    if (!str) return null;

    let entrada = str.trim();

    if (entrada.length > 200) return null;

    try {
        let url = new URL(entrada);

        if (url.protocol !== "http:" && url.protocol !== "https:") {
            return null;
        }

        return url.href.replace(/\/+$/, "");
    } 
    catch 
    {
        return null;
    }
}


$(document).ready(function() {
    $('#verifica_user_insta').on('click', function(e) {
        e.preventDefault();

        let user_insta = $('#user_insta').val();

        if (user_insta === '') {
            return;
        }

        let urlValida = sanitizeUrl(user_insta);

        let dados = {};

        if (urlValida) {
            dados = { user: "getprofile", url: urlValida };
        } 
        else 
        {
            dados = { user: "getprofile", username: user_insta };
        }

        $.ajax({
            url: '../action/api_profile_insta.php',
            type: "GET",
            dataType: "json",
            data: dados,
            success: function (data) {
                //console.log(data);
                if (data.user) {
                    $('#form-container').hide();
                        $('#profile-container').show();
                        $("#username").text(data.user.username);
                        $("#profile-picture").attr("src","proxy.php?url="+ encodeURIComponent(data.user.profile_pic_url));
                        $("#followers").text(data.user.follower_count);
                } 
                else if(data.username) 
                {
                    $('#form-container').hide();
                    $('#profile-container').show();
                    $("#username").text(data.username);
                    $("#profile-picture").attr("src","proxy.php?url="+ encodeURIComponent(data.profile_pic_url));
                    $("#followers").text(data.follower_count);
                }
                else
                {
                    $('#notFound').modal('show');
                }

                if (data.user && data.user.is_private) {
                    $('#isPrivate').modal('show');
                }
                else if(data.is_private) {
                    $('#isPrivate').modal('show');
                }
            },
            error: function (err) {
                console.log("Erro na API:", err);
            }
        });
    });
});