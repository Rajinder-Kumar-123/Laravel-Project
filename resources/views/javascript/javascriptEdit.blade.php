<!DOCTYPE html>
<html>
<head>
    <title>How To Edit Multiple Questions Value In Database using Laravel - NiceSnippets.com</title>
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
            <div class="col-md-6 offset-3 mt-5">
                <div class="card">
                <div class="card-header bg-info">
                        <h6 class="text-white">How To Edit Multiple Question Value In Database using Laravel</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right mb-3">
                               <!--  <a href="teacher" class="btn btn-primary">Back</a> -->
                            </div>
                        </div>
                        <form method="POST" action="javascriptUpdate/{{$request->id}}" enctype="multipart/form-data">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label><strong>Name :</strong></label>
                                <input type="text" name="name" class="form-control" value="{{$request->name}}"/>
                            </div>  
                            <div class="form-group">
                                <label><strong>Category :</strong></label><br>
                                <label><input type="checkbox" name="category[]" value="{{$request->multipleChoice}}"> Multiple Choice</label>
                                <label><input type="checkbox" name="category[]" value="{{$request->longChoice}}"> Long Choice</label>
                                <label><input type="checkbox" name="category[]" value="{{$request->shortChoice}}"> Short Choice</label>
                            </div>  
                            <div class="form-group">
                                <label><strong>Option1 :</strong></label>
                                    <input type="text" name="option1" class="form-control" value="{{$request->option1}}"/>
                                </div>
                                <div class="form-group">
                                <label><strong>Option2 :</strong></label>
                                    <input type="text" name="option2" class="form-control" value="{{$request->option2}}"/>
                                </div>
                                <div class="form-group">
                                <label><strong>Option3 :</strong></label>
                                    <input type="text" name="option3" class="form-control" value="{{$request->option3}}"/>
                                </div>
                                <div class="form-group">
                                <label><strong>Option4 :</strong></label>
                                    <input type="text" name="option4" class="form-control" value="{{$request->option4}}"/>
                                </div>
                            <div class="form-group">
                                <label><strong>Description :</strong></label>
                                <textarea class="form-control" rows="4" cols="40" name="allQuestions">{{$request->allQuestions}}</textarea>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>