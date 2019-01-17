 $(document).ready(function () {
          var regex = {
                    name : /^[a-zA-Z]{2,20}?$/ ,
                    email : /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i ,
                    phone : /^[0-9\-\/]{10,18}?$/
                  };
        $('input[name="name"]').keyup(function(event) {
          var val = $(this).val();
          if(val === ''){
            $(this).removeClass('is-invalid');
          }else if(!val.match(regex['name'])){
            $(this).addClass('is-invalid').removeClass('is-valid');
          }else{
            $(this).addClass('is-valid').removeClass('is-invalid');
          }
        });

        $('input[name="email"]').keyup(function(event) {
          var val = $(this).val();
          if(val === ''){
            $(this).removeClass('is-invalid');
          }else if(!val.match(regex['email'])){
            $(this).addClass('is-invalid').removeClass('is-valid');
          }else{
            $(this).addClass('is-valid').removeClass('is-invalid');
          }
        });

        $('input[name="phone"]').keyup(function(event) {
          var val = $(this).val();
          if(val === ''){
            $(this).removeClass('is-invalid');
          }else if(!val.match(regex['phone'])){
            $(this).addClass('is-invalid').removeClass('is-valid');
          }else{
            $(this).addClass('is-valid').removeClass('is-invalid');
          }
        });
        //inserts users into the database 
        $('form.form').on('submit',function () {
           var that = $(this),
           url = that.attr('action'),
           type = that.attr('method'),
           data = {};
           that.find('[name]').each(function () {
               var that = $(this),
                   name = that.attr('name'),
                   value = that.val();
               data[name] = value;
           });

            $.ajax({
                url: url,
                type: type,
                data: data,
                success: function (response) {
                    var error = $('#error');
                    error.fadeTo('slow',1);
                    error.removeClass('alert-success');
                    error.addClass('alert-danger');
                    error.text(response);
                    error.delay(2000).fadeTo('slow',0);
                    if(response === 'Registration successful'){
                        error.removeClass('alert-danger');
                        error.addClass('alert-success');
                        error.text(response);
                        $('input').val('');
                    }
                }
            });
            return false;
        });
        //gets the users from the database
        var numbers = 0;

        $(window).scroll(function () {
            //alert("test");
            if($(window).scrollTop() + $(window).height() == $(document).height()) {
            numbers = numbers +1;
            $('#users').load('loadUsers.inc.php',{
                number : numbers
            });
          }
        });

        //searches for users from database
        $('#search').keyup(function(event) {
           value = $('input[name="search"').val();
           if(value == ''){
            $('#result').text('');
           }else{
           console.log(value);
            $('#result').load('search.php',{
                search : value
            });
           } 
            
        });

 });