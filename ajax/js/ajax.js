 $(document).ready(function () {
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
        $('form.form2').on('submit',function () {
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
                    var result = $('#result');
                    result.text(response);

                }
            });
            return false;
        });
        var numbers = 0;
        $('#usersBtn').click(function () {
            //alert("test");
            numbers = numbers +1;
            $('#users').load('loadUsers.inc.php',{
                number : numbers
            });
        });
       /*$('.delete').live('click',function () {
            alert("test");
            $('#users').load('deleteUsers.inc.php',{
            });
        })*/
        $(document).on('click','.delete["value"]',function () {
            var btnID = $('.delete');
            btnID.find('[value]').each(function() {
                var value = $('this').val();
                console.log(value);

                
            });

           // var buttonID = $('button.delete');
            //buttonID.find('[id]').each(function (event) {
                //var value = this.val();
                //alert(value);
            //});

        })


    })