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
                    <th style='font-size:x-large;'>@sortablelink('id','ID')</td>
                    <th style='font-size:x-large;'>@sortablelink('first_name')</td>
                    <th style='font-size:x-large;'>@sortablelink('last_name')</td>
                    <th style='font-size:x-large;'>@sortablelink('birth_place')</td>
                    <th style='font-size:x-large;'>@sortablelink('birth_date')</td>
                    <th style='font-size:x-large;'>İşlemler</td>
                </tr>
            </thead>
            <tbody>
                <form method='GET' action=" {{route('search')}}">
                   <!-- @csrf bu toke üretiyor -->
                    <tr>
                        <td><input type='text' class='form-control' name='sid'></td>
                        <td><input type='text' class='form-control' name='fname'></td>
                        <td><input type='text' class='form-control' name='lname'></td>
                        <td><input type='text' class='form-control' name='birthp'></td>
                        <td><input type='text' class='form-control' name='birthd'></td>
                        <td><input type='submit' class='form-control' value="ara"></td>
                    </tr>
                </form>
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
            </tbody>
        </table>

        <!-- <div style="padding-left:40%">
            {{$data->links("pagination::bootstrap-4")}}
        </div> -->
        <div style="padding-left:40%">
            <!-- a Tag for previous page -->
            <a href="{{$data->previousPageUrl()}}"><=</a> 
            @for($i=1;$i<=$data->lastPage();$i++)
            <!-- a Tag for another page -->
            <a href="{{$data->url($i)}}">{{$i}}</a>
            @endfor
            <!-- a Tag for next page -->
            <a href="{{$data->nextPageUrl()}}">>=</a>
        </div>

    </div>
    <br> <br> <br>
    </body>
</html>
