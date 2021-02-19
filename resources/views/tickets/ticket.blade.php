@extends('layouts.app')

@section('title','تیکت')

@section('content')
    <div class="justify-content-center text-right">
        <div class="mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{$ticket->title}}

                        @if ($ticket->isClosed())
                            <span class="btn btn-danger float-left btn-sm">بسته شده</span>
                        @else
                            <a href="{{route('ticket.close',$ticket->id)}}" class="btn float-left btn-sm btn-danger">
                                بستن </a>
                        @endif

                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            {{$ticket->text}}
                        </p>

                        @if ($ticket->hasFile())
                            <a href="{{$ticket->file()}}">دانلود پیوست</a>
                        @endif
                    </div>
                    <div class="card-footer text-muted">
                        {{$ticket->created_at}} توسط {{$ticket->user->name}}
                    </div>
                </div>
            </div>

            @foreach ($ticket->replies as $reply)
                <div class="col-md-8 mt-5 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">
                                {{$reply->text}}
                            </p>
                        </div>
                        <div class="card-footer text-muted">
                            {{$reply->created_at}} توسط {{$reply->repliable->name}}
                        </div>
                    </div>
                </div>
            @endforeach
            @if (! $ticket->isClosed())
                <div class="col-md-8">
                    <form action="{{route('reply.create',$ticket->id)}}" method="post" class="mt-5">
                        @csrf
                        <div class="form-group">
                        <textarea name="text" id="text" rows="10" class="form-control"
                                  placeholder="متن پیام خود را وارد کنید"></textarea>
                        </div>
                        <button class="btn  btn-primary" type="submit">ارسال</button>
                    </form>
                </div>
            @endif


        </div>
    </div>
@endsection
