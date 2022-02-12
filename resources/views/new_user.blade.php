<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head> 
    <body class="antialiased">
        <div style='padding-left: 35%;padding-right:35%;padding-top:10%'>
            <form style='border:2px solid #dee2e6;padding:25px;border-radius:10%' method='POST' <?php if($user == null){ ?> action=" {{route('create_user')}}" <?php }  else { ?> action=" {{route('do_edit')}}" <?php } ?> enctype='multipart/form-data'>
                @csrf 
                <?php if($user != null){ echo "<h2>Kişi güncelle</h2>"; } else { echo "<h2>Yeni kişi ekle</h2>"; } ?>  
                <input type='hidden' class='form-control' name='id' value='<?php if($user!=null){ echo $user->id; } ?>'>             
                <div class='form-row'>
                    <div class='form-group col-md-6'>
                    <label for='inputEmail4'>FirstName</label>
                    <input type='text' class='form-control' name='fname' placeholder='firstname giriniz' required value='<?php if($user!=null){ echo $user->first_name; } ?>'>
                    </div>
                    <div class='form-group col-md-6'>
                    <label for='inputPassword4'>LastName</label>
                    <input type='text' class='form-control' name='lname' placeholder='lastname giriniz' required value='<?php if($user!=null){ echo $user->last_name; } ?>'>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='form-group col-md-6'>
                    <label for='inputCity'>BirthPlace</label>
                    <input type='text' name='birthPlace' class='form-control' placeholder='birthplace giriniz' id='inputCity' required value='<?php if($user!=null){ echo $user->birth_place; } ?>'>
                    </div>
                    <div class='form-group col-md-6'>
                    <label for='inputState'>BirthDate</label>
                    <input type='date' name='birthDate' class='form-control' placeholder='birthdate giriniz' id='inputCity' required value='<?php if($user!=null){ echo $user->birth_date; } ?>'>
                    </div>
                </div><br>
                <?php if($user != null){ ?>
                <input type='submit' class='btn btn-primary' value='edit'>
                <?php } else { ?>
                <input type='submit' class='btn btn-primary' value='ekle'>
                <?php } ?>    
            </form>
        </div>
    </body>
</html>
