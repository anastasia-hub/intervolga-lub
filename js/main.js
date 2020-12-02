/*
    Авторизация
 */

$('.login-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let email = $('input[name="email"]').val(),
        password = $('input[name="password"]').val();

    $.ajax({
        url: 'server/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            email: email,
            password: password
        },
        success (data) {

            if (data.status) {
                document.location.href = '/profile.php';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }

                $('.msg').removeClass('none').text(data.message);
            }

        }
    });

});


/*
    Регистрация
 */

$('.register-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let name = $('input[name="name"]').val(),
        lastname = $('input[name="lastname"]').val(),
        email = $('input[name="email"]').val(),
        birthday = $('input[name="birthday"]').val(),
        num_passport = $('input[name="num_passport"]').val(),
        seria_passport = $('input[name="seria_passport"]').val(),

        password = $('input[name="password"]').val(),
        password_confirm = $('input[name="password_confirm"]').val();

    let formData = new FormData();
    formData.append('name', name);
    formData.append('lastname', lastname);
    formData.append('email', email);
    formData.append('birthday', birthday);
    formData.append('num_passport', num_passport);
    formData.append('seria_passport', seria_passport);
    formData.append('password', password);
    formData.append('password_confirm', password_confirm);
        
    $.ajax({
        url: 'server/signup.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {
            if (data.status) {
                document.location.href = '/';
            } else {
                
                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }

                $('.msg').removeClass('none').text(data.message);

            }
        },
        error (data) {
            console.log(data);
        }
    });

});
