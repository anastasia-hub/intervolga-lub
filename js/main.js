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


$(function() {
    //выводит новый код CAPTCHA при открытии модального окна  
    $('#myModal').on('show.bs.modal', function () {
      $('#img-captcha').attr('src', 'captcha.php?id='+Math.random()+'');
    });
    //выводит новый код CAPTCHA при нажатии на кнопку Обновить
    $("#reload-captcha").click(function() {
      $('#img-captcha').attr('src', 'captcha.php?id='+Math.random()+'');
    });  
    //при нажатии на кнопку Регистрация (id="save")
    $('#save').click(function() {
      //переменная formValid
      var formValid = true;
      //перебирает все элементы управления input, кроме CAPTCHA 
      $('input').each(function() {
        //если текущий элемент CAPTCHA, то пропустить его
        if  ($(this).attr('id') == 'text-captcha') { return true; }
        //найти предков, которые имеют класс .form-group, для установления success/error
        var formGroup = $(this).parents('.form-group');
        //найти glyphicon, который предназначен для показа иконки успеха или ошибки
        var glyphicon = formGroup.find('.form-control-feedback');
        //для валидации данных используем HTML5 функцию checkValidity
        if (this.checkValidity()) {
          //добавить к formGroup класс .has-success, удалить has-error
          formGroup.addClass('has-success').removeClass('has-error');
          //добавить к glyphicon класс glyphicon-ok, удалить glyphicon-remove
          glyphicon.addClass('glyphicon-ok').removeClass('glyphicon-remove');
        } else {
          //добавить к formGroup класс .has-error, удалить .has-success
          formGroup.addClass('has-error').removeClass('has-success');
          //добавить к glyphicon класс glyphicon-remove, удалить glyphicon-ok
          glyphicon.addClass('glyphicon-remove').removeClass('glyphicon-ok');
          //отметить форму как не валидную 
          formValid = false;  
        }
      });
      //проверяем элемент input, в который пользователь вводит код CAPTCHA
      //получаем значение элемента input, содержащего код CAPTCHA
      var captcha = $("#text-captcha").val();
      //если код CAPTCHA пустой, то сразу сообщаем, что он не правильный
      if (captcha=='') {
        inputCaptcha = $("#text-captcha");
        formGroupCaptcha = inputCaptcha.parents('.form-group');
        glyphiconCaptcha = formGroupCaptcha.find('.form-control-feedback');
        formGroupCaptcha.addClass('has-error').removeClass('has-success');
        glyphiconCaptcha.addClass('glyphicon-remove').removeClass('glyphicon-ok');
      }
      //иначе запрашиваем результат у сервера через ajax
      else  { 
        var dataString = 'captcha=' + captcha;
        $.ajax({
          type: "POST",
          url: "verify.php",
          data: dataString,
          success: function(result) {
        inputCaptcha = $("#text-captcha");
            formGroupCaptcha = inputCaptcha.parents('.form-group');
            glyphiconCaptcha = formGroupCaptcha.find('.form-control-feedback');
        //если результат, который вернул сервер, равен true, 
        //то отмечаем, что код валидный и изменяет цвет элементов на зелёный
            if (result==="true") {
              formGroupCaptcha.addClass('has-success').removeClass('has-error');
              glyphiconCaptcha.addClass('glyphicon-ok').removeClass('glyphicon-remove');
              if (formValid) {
                //скрыть модальное окно
                $('#myModal').modal('hide');
                //отобразить сообщение об успехе
                $('#success-alert').removeClass('hidden');
                $('#success-alert').removeClass('hidden');
              }         
            } 
        //иначе отмечает, что код не валидный и изменяет цвет элементов на красный
        else {
              formGroupCaptcha.addClass('has-error').removeClass('has-success');
              glyphiconCaptcha.addClass('glyphicon-remove').removeClass('glyphicon-ok');
            }
          }
        });
      }
    });
    });