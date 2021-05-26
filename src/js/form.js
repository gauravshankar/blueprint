$("#contacForm").validate(
    {
        // Specify the validation rules
        rules: {
            name: "required",
            company: "required",
            phone:
            {
                required: true,
                digits: true,
            },
            ContryCode:
            {
                required: true
            },
            email:
            {
                required: true,
                email: true
            }
        },
        // Specify the validation error messages
        messages: {
            name: "Please enter your name",
            company: "Please enter company name",
            phone:
            {
                required: "Please enter a phone no.",
            },
            ContryCode:
            {
                required: "Please enter country code"
            },
            email:
            {
                required: "Please enter email address",
                email: "Please enter a valid email address"
            }
        },
        submitHandler: function () {

            if (window.location.href.indexOf("?utm_source") > -1) {
                var loc = window.location.toString(),
                    params = loc.split('=')[1];
                var source = params.split('&')[0];

                $('input[name=source]').attr('value', source);
                
            }
            //this.submit();
            //Hide the form
            $("#contacForm").fadeIn(function () {
                var t = $("#contacForm").height()
                $("#contacForm").css("opacity", "0.2");
                //Display the "loading" message
                $("#loading").fadeIn(function () {
                    $("input[type=submit]").attr("disabled", "disabled");
                    //Post the form to the send script
                    $.ajax({
                        type: 'POST',
                        url: $("#contacForm").attr("action"),
                        data: $("#contacForm").serialize(),
                        //Wait for a successful response
                        success: function (data) {
                            //Hide the "loading" message
                            $("#loading").fadeOut(function () {
                                $('#contacForm').hide();
                                //Display the "success" message
                                $("#success").html(data).fadeIn();
                                $("#success > div").height(t)
								$("#success").append('<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=598434&conversionId=1106164&fmt=gif" />');
                                //window.setTimeout(function(){location.reload()},10000)
                                setTimeout(function () {
                                    window.location.href = "https://www.talentica.com/"; // The URL that will be redirected too.
                                }, 3000); // The bigger the number the longer the delay.;
                            });
                        }
                    });
                });
            });
        }
    }); 




    $("#contacForm2").validate(
        {
            // Specify the validation rules
            rules: {
                name: "required",
                company: "required",
                phone:
                {
                    required: true,
                    digits: true,
                },
                ContryCode:
                {
                    required: true
                },
                email:
                {
                    required: true,
                    email: true
                }
            },
            // Specify the validation error messages
            messages: {
                name: "Please enter your name",
                company: "Please enter company name",
                phone:
                {
                    required: "Please enter a phone no.",
                },
                ContryCode:
                {
                    required: "Please enter country code"
                },
                email:
                {
                    required: "Please enter email address",
                    email: "Please enter a valid email address"
                }
            },
            submitHandler: function () {
    
                if (window.location.href.indexOf("?utm_source") > -1) {
                    var loc = window.location.toString(),
                        params = loc.split('=')[1];
                    var source = params.split('&')[0];
    
                    $('input[name=source]').attr('value', source);
                    
                }
                //this.submit();
                //Hide the form
                $("#contacForm2").fadeIn(function () {
                    var t = $("#contacForm2").height()
                    $("#contacForm2").css("opacity", "0.2");
                    //Display the "loading2" message
                    $("#loading2").fadeIn(function () {
                        $("input[type=submit]").attr("disabled", "disabled");
                        //Post the form to the send script
                        $.ajax({
                            type: 'POST',
                            url: $("#contacForm2").attr("action"),
                            data: $("#contacForm2").serialize(),
                            //Wait for a successful response
                            success: function (data) {
                                //Hide the "loading" message
                                $("#loading2").fadeOut(function () {
                                    $('#contacForm2').hide();
                                    //Display the "success" message
                                    $("#success2").html(data).fadeIn();
                                    $("#success2 > div").height(t)
                                    $("#success2").append('<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=598434&conversionId=1106164&fmt=gif" />');
                                    //window.setTimeout(function(){location.reload()},10000)
                                    setTimeout(function () {
                                        window.location.href = "https://www.talentica.com/"; // The URL that will be redirected too.
                                    }, 3000); // The bigger the number the longer the delay.;
                                });
                            }
                        });
                    });
                });
            }
        }); 