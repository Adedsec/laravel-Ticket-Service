@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            @include('partials.alerts')
            <form action="{{route('ticket.create')}}" class="text-right" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">عنوان</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="department">بخش</label>
                    <select name="department" id="department" class="form-control">
                        <option value="0">پشتیبانی</option>
                        <option value="1">فنی</option>
                        <option value="2">مالی</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="priority"></label>
                    <select name="priority" id="priority" class="form-control">
                        <option value="0">پایین</option>
                        <option value="1">متوسط</option>
                        <option value="2">بالا</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="text">متن</label>
                    <textarea name="text" id="text" cols="30" rows="6" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="">پیوست</label>
                    <div class="custom-file">
                        <input type="file" name="file" id="customFile" class="custom-file-input">
                        <label for="customFile" class="custom-file-label text-center">فایل را انتخاب کنید</label>
                    </div>
                </div>


                <input type="submit" class="btn btn-success" value="ثبت">


            </form>
        </div>
    </div>
@endsection
