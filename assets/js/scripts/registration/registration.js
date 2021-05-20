$(document).ready(function () { 
    loadUsers();

    $(document).on("click", ".list-group>.list-group-item", function () {
        $(".list-group-item").removeClass("selected")
        $(this).addClass("selected");
    });


    // $("#addRoleModal").modal("show");

    //#region SELECT ROLE
    $(document).on("change", "#selectRole", function () {
    let value = $(this).val(); //$("#selectRole").val();
        if (value == "addRole") {
            $("#addRoleModal").modal("show");
            $(this).prop("selectedIndex", 0);
            $(this).selectpicker("refresh");
        }
        console.log(value);

    });
    //#endregion

    //#region SUBMIT ROLE FORM
    $(document).on("submit", "#addRoleForm", function (event) {
        event.preventDefault();
        // alert("fsf");

        $.ajax({
            url: window.site_url.concat("user/add-role"),
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (res) {
                if (res.status) {
                    Swal.fire({
                        title: "Success",
                        icon: "success"
                    });
                    $("#addRoleForm").trigger("reset");
                    $("#addRoleModal").modal("hide");

                    loadRoles();


                } else {
                    Swal.fire({
                        title: "Failed",
                        icon: "failed"
                    });

                }

            }
        });
    });
    //#endregion

    //#region 
    $(document).on("submit", "#userRegistration", function (event) {
        event.preventDefault();
        let formData = new FormData(this);
        let fn = $("#firstName").val();
        let ln = $("#lastName").val();
        console.log(fn);
        let name = (fn.charAt(0) + ln.charAt(0)).toUpperCase();
        let dataURI = generateAvatar(name, "userImageCanvas");
        formData.append("dataURI", dataURI);

        $.ajax({
            url: window.site_url.concat("user/add-user"),
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (res) {
                if (res.status) {
                    Swal.fire({
                        title: "Success",
                        icon: "success"
                    });

                    $("#userRegistration").trigger("reset");
                    $("#userImage").attr("src", "https://www.emmegi.co.uk/wp-content/uploads/2019/01/User-Icon.jpg");
                    loadUsers();
                } else {
                    Swal.fire({
                        title: "Failed",
                        icon: "warning"
                    })
                }

            }

        });
    });
    //#endregion
});

//#region 
function loadRoles() {
    $.ajax({
        url: window.site_url.concat("user/load-roles"),
        method: "POST",
        dataType: "JSON",
        success: function (res) {
            $("#selectRole").empty();
            $("#selectRole").append(
                "<option selected disabled>Select a role...</option>" +
                "<option value='addRole' data-icon='fas fa-plus-circle'>Add Roles</option>"
            );

            res.forEach(role => {
                $("#selectRole").append(
                    "<option value ='" + role.id + "'>" + role.name + "</option>"
                );
                // console.log(role.id, role.name);
            });
            $("#selectRole").selectpicker("refresh");
        }
    });
}
//#endregion

//UPLOAD NG PICTURE
//#region 
function previewImage(event, id) {
    var reader = new FileReader();

    reader.onload = function () {
        var output = document.getElementById(id);
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
//#endregion

//DEFAULT PICTURE
//#region GENERATE AVATAR
function generateAvatar(content, canvas) {
    var canvas = document.querySelector("#" + canvas);
    const ctx = canvas.getContext("2d");
    ctx.fillStyle = getRandomColor();
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.fillStyle = "white"
    ctx.font = "130px bold Arial";
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";
    ctx.fillText(content, canvas.width / 2, canvas.height / 2);

    return canvas.toDataURL("image/jpeg");
}
//#endregion

//FOR CREATING COLOR 
//#region RANDOM COLOR GENERATOR
function getRandomColor() {
    var letters = '012345'.split('');
    var color = '#';
    color += letters[Math.round(Math.random() * 5)];
    letters = '0123456789ABCDEF'.split('');
    for (var i = 0; i < 5; i++) {
        color += letters[Math.round(Math.random() * 15)];
    }
    return color;
}
//#endregion

//#region   LOAD USER
function loadUsers() {
    $.ajax({
        url: window.site_url.concat("users/load-users"),
        method: "POST",
        dataType: "JSON",
        success: function (res) {
            if (res.length != 0) {
                $("#userList").empty();
                res.forEach(user => {
                    let image = (user.image == null) ? "no-img.png" : user.image

                    $("#userList").append(
                        '<li class="list-group-item">' +
                        '<div class="row">' +
                        '<div class="col-lg-2 my-auto">' +
                        ' <div class="circular-image-sm">' +
                        '<img class="img-fluid "src="assets/images/users/' + image + '" alt="user image">' +
                        '</div>' +
                        '</div>' +
                        ' <div class="col-lg-9">' +
                        ' <div class="user-detail">' +
                        '<h6>' + user.first_name + '' + user.last_name + '</h6>' +
                        ' <p class="mb-0">' + user.role_name + ' </p>' +
                        '</div>' +
                        ' </div>' +
                        ' </div>' +
                        '</li>'
                    );
                });
            }
            console.log(res);
        }
    });

}

//#endregion

//#region  SEARCH USER LIVE SEARCH
$(document).on("keyup", "#searchUser", function () {
    let value = $(this).val();
    console.log(value);
    searchList("userList", value, "fa-user", "No user found. ");

});

//#endregion



//#region SEARCH USER
function searchList(ul, value, icon, text){
    let ctr = 0;
    $("#" + ul + ">li").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);

        if ($(this).text().toLowerCase().indexOf(value) > -1) {
            ctr++;
        }
    });

    if (ctr === 0) {
        $("#" + ul).append(
            "<li class='list-group-item no-result'>" +
            "<div class= 'text-center semi-text'> " +
            "<i class='fas " + icon + " fa-2x'></i>" +
            "<p class='my-3'>" + text + "</p>" +
            "</div>" +
            "</li>"

        );
    } else {
        $(".no-result").remove();
    }
}


//#endregion


