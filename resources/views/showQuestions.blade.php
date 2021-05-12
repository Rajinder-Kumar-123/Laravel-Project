<!DOCTYPE html>
<html>
<head>
    <title>How To Store Multiple Checkbox Value In Database using Laravel - NiceSnippets.com</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="showimages"></div>
            </div>
            <div class="col-md-8 offset-3 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white">How To Store Multiple Question Value In Database using Laravel</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right mb-3">
                                <a href="allQuestions" class="btn btn-success">Questions Create</a>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Questions</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                            @foreach($request as $req)
                            <tr>
                                <td>{{$req->id}}</td>
                                <td>{{ $req->name }}</td>

                                <td>
                                    @foreach($req->category as $value)
                                        {{$value}},
                                    @endforeach
                                </td>
                                <td>{{ $req->allQuestions }}</td>
                                <td><a href="destroyController/{{$req->id}}">Delete</a></td>
                                <td><a href="#" >Edit</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>