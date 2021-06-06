<html>
    <head>
    <style>
        #customers {
            margin: 0px auto;
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 80%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
    </head>
            <body>
               <table id="customers">
               @foreach($request as $reqs)
                <tr>
                <th>S.No</th>
                <td><li>{{$reqs->id}}</li></td>
                </tr>
                <tr>
                <th>Question</th>
                <td><li>{{$reqs->name}}</li></td>
                </tr> 
                <tr>
                <th rowspan="4">Option</th>
                <td> <input type="checkbox" value="{{$reqs->option1}}">{{$reqs->option1}}</td><br><br></tr>
                <tr><td><input type="checkbox" value="{{$reqs->option1}}">{{$reqs->option2}}</td><br><br></tr>
                <tr><td><input type="checkbox" value="{{$reqs->option1}}">{{$reqs->option3}}</td><br><br></tr>
                <td><input type="checkbox" value="{{$reqs->option1}}">{{$reqs->option4}}</td><br><br>
                </tr>
                        <td><a href="javascript/javascriptQuestion">Go back</a></td>
                    @endforeach
                    </table>
                </form>
            </body>
</html>