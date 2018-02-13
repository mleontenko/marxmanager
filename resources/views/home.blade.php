@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @include('inc.messages')
                    <button 
                        class="btn btn-primary btn-lg" 
                        data-toggle="modal" 
                        data-target="#addModal" 
                        type="button" 
                        name="button">
                        Add Bookmark
                    </button>
                    <hr>
                    <h3>My Bookmarks</h3>
                    <ul class="list-group">
                        @foreach($bookmarks as $bookmark)
                            <li class="list-group-item clearfix">
                                <a href="{{$bookmark->url}}" target="_blank" style="position:absolute;top:30%">{{$bookmark->name}} <span class="label label-default">{{$bookmark->description}}</span></a>
                                <span class="pull-right button-top">
                                    <button data-id="{{$bookmark->id}}" type="button" class="delete-bookmark btn btn-danger" name="button"><span class="glyphicon glyphicon-remove"></span> Delete</button>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
          <h4 class="modal-title">Add bookmark</h4>
        </div>
        <div class="modal-body">
            <form action="{{route('bookmarks.store')}}" method="post">
                {{csrf_field()}}
                <div>
                    <label>Bookmark Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div>
                    <label>Bookmark URL</label>
                    <input type="text" class="form-control" name="url">
                </div>
                <div>
                    <label>Website Description</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>
                <br />
                <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </form>
        </div>        
      </div>
    </div>
  </div>
@endsection
