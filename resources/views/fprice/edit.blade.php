<div class="container h-100 mt-5"> <div class="row h-100 justify-content-center align-items-center"> <div
    class="col-10 col-md-8 col-lg-6">
    @foreach ($fprice as $fprice)
    <h3>Update Post</h3>
    <form action="{{ route('fprice.update', $fprice->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Price</label>
            <input type="text" class="form-control" id="new_fprice" name="title" value="{{$fprice.fprice}}"
            required>
        </div>
        <button type="submit" class="btn mt-3 btn-primary">Update Post</button>
    </form>
    @endforeach
</div>
</div>
</div>