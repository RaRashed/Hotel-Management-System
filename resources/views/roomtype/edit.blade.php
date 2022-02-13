@extends('partials.layout')
@section('content')

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Room Types
                <a href="{{ route('roomtype.index') }}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{ session('success') }}</p>

            @endif
            <form action="{{ route('roomtype.update',$roomtype->id)}}" method="post">

                @csrf
                @method('put')

               <div   class="from-group">
                <label for="title">Title</label>

                <input type="text" id="title" class="form-control" name="title" value="{{ $roomtype->title }}">

               </div>
               <div   class="from-group">
                <label for="title">Price</label>

                <input type="number" id="title" class="form-control" name="price" value="{{ $roomtype->price }}">

               </div>

               <div   class="from-group">
                <label for="detail">Detail</label>

                <textarea name="detail" id="detail" cols="5" rows="5" class="form-control">{{ $roomtype->detail }}</textarea>

               </div>
               <div   class="from-group">
                <label for="detail">Image Gallary</label>

                <table class="table table-bordered">
                    <tr>
                        @foreach ($roomtype->roomtypeimages as $img )
                        <td class="imgcol{{ $img->id }}">
                            <img src="{{asset('storage/'.$img->image_src)}}" width="100px" height="100px" alt="">
                            <p class="mt-2">
                                <button type="button" onclick=" return confirm('Are you sure to Delete?')" class="btn btn-danger btn-sm delete-image" data-image-id="{{ $img->id }}" ><i class="fa fa-trash"></i></button>
                            </p>
                        </td>

                        @endforeach

                    </tr>

                </table>

               </div>

               <div class="form-group">

                   <button class="btn btn-success mb-2">
                       Add Room
                   </button>
               </div>
            </form>
        </div>
    </div>

</div>

@endsection

@section('script')
<script>
    $(document).ready(function(){
    $(".delete-image").on('click',function(){
        var _img_id =$(this).attr('data-image-id');
        var _vm =$(this);
        $.ajax({
            url:"{{ url('admin/roomtypeimage/delete') }}/"+_img_id,
            dataType:'json',
            beforeSend:function(){
                _vm.addClass('disabled');
            },
            success:function(res){
              if(res.bool==true)
              {
                $(".imgcol"+_img_id).remove();
               }
                _vm.addClass('disabled');
            }

        });
    });

});
</script>


@endsection
