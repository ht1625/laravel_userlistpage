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
    <div style='padding-left: 20%;padding-right:20%;'>
    <div> <br> <br> <br>
        <h2>Üyeler</h2> <span style='float: right;'><h6><a href='{{ url("/new_user") }}'>Yeni eklemek için tıklayınız</a></h6></span>
    </div>
    <div>      
        <table class='table table-striped'>
            <thead>
                <tr>
                    <td style='font-size:x-large;'><a href=''>#</a></td>
                    <td style='font-size:x-large;'><a href=''>First</a></td>
                    <td style='font-size:x-large;'><a href=''>Last</a></td>
                    <td style='font-size:x-large;'><a href=''>Doğum yeri</a></td>
                    <td style='font-size:x-large;'><a href=''>Doğum tarihi</a></td>
                    <td style='font-size:x-large;'>İşlemler</td>
                </tr>
            </thead>
            <tbody>
                <form method='POST' action='' enctype='multipart/form-data'>
                @foreach($data as $roww)
                    <tr>
                        <td>{{$roww->id}}</td>
                        <td>{{$roww->first_name}}</td>
                        <td>{{$roww->last_name}}</td>
                        <td>{{$roww->birth_place}}</td>
                        <td>{{$roww->birth_date}}</td>
                        <td><a href='{{ route("delete_user",[$roww->id]) }}'>Sil</a> &nbsp; &nbsp; &nbsp; <a href='{{ route("edit_user",[$roww->id]) }}'>Düzenle</a></td>
                    </tr>
                @endforeach    
                </form>
            </tbody>
        </table>
        <div style='text-align:center'>
            <?php  $sayfa=1;
            $ilk=1 ; if($num_rows>=4){ $ilk = 4; } else { $ilk=$num_rows; } ?>
            <a href='{{ route("go_to_page",[$ilk]) }}'><<</a>&nbsp;&nbsp;
        
            <?php 
            //bi onceki sayfaya donmek
            $once=1; if($sayfa > 1) $once=$sayfa-1; else $once=$sayfa; ?>
            <a href='{{ route("go_to_page",[$once]) }}'><=</a>&nbsp;&nbsp;

            <?php 
            for($i=$sayfa-3;$i<=$sayfa+3;$i++){
                if($i > 0 && $num_rows >= $i){ ?>
                    <a <?php  if($i==$sayfa) { echo "style='color:black'"; } ?> href='{{ route("go_to_page",[$i]) }}'><?php echo $i; ?></a>&nbsp;&nbsp; <?php
                }     
            }

            //bir sonraki sayfaya donmek
            $sonra=$sayfa; if($num_rows>$sayfa){$sonra++;} ?>
            <a href='{{ route("go_to_page",[$sonra]) }}'>>=</a>&nbsp;&nbsp;

            <?php 
            //son sayfaya donmek
            $son=$sayfa; if($son>=4){ $son = $num_rows - 3; } else $son=$num_rows; ?>
            <a href='{{ route("go_to_page",[$son]) }}'>>></a>&nbsp;&nbsp;
        </div>
    </div>
    </body>
</html>
