<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
</head>
<body>
    
    <a href="#" id='clickMe'>Click me</a>
    <p >click me</p>

    <select name="room">
        <option value="">Vui long chon</option>
    </select>

    <ul name='batdong'>
        <li class='clickMe' name='HeloChau'>Chau</li>
        <li class='clickMe' value='Helohanh'>Hanh</li>
        <li class='clickMe' value ='HeloThu'>Thu</li>
    </ul>

    

    <div id="content"></div>





    <script src="{{ asset('jquery.js')}}"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })

        $('.clickMe').click(function(e){
            // e.preventDefault();
            var id = $(this).attr('value');
            console.log(id);
            $.ajax({
                type: "POST",
                url: "{{ route('getdata') }}",
                dataType: "html",
                success: function (data) {
                    $('select[name="room"]').html(data)
                }
            });
        })

        $('select[name="room"]').change(function () { 
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{route('getdata1') }}",
                data: {idroom : id},
                dataType: "html",
                    success: function (response) {
                        $('#content').html(response);
                    }
            });
            
        });

        $('ul[name="batdong"]').change(function () { 
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{route('batdong') }}",
                data: {idroom : id},
                dataType: "html",
                    success: function (response) {
                        console.log(response);
                    }
            });
            
        });

    </script>
</body>
</html>