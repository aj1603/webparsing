<style>
    .container_items {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border: 1px solid gray;
        border-radius: 20px;
        background-color: beige;
    }

    .form-control {
        width: 70%;
        font-size: 20px;
        height: 40px;
        border-radius: 10px;
        padding: 10px
    }

    .form-group {
        margin-bottom: 30px;
    }

    .form-group label {
        font-size: 20px;
        margin-right: 10px;
    }

    .update_btn {
        background-color: rgb(2, 95, 2);
        border-radius: 10px;
        color: white;
        padding: 10px;
        width: 100px;
        text-align: center;
        cursor: pointer;
    }

    .update_btn:hover {
        background-color: green;
    }

    .update_submit {
        display: flex;
        justify-content: center;
    }
</style>

<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="container_items col-10
    col-md-8 col-lg-6">
            <h2>Update Price</h3>
                @foreach ($fprices as $price)
                <form action="{{ route('update.fprice', $price->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="new_fprice">New price</label>
                        <input type="text" class="form-control" id="new_fprice" name="new_fprice"
                            value="{{ $price->fprice }}" required>
                    </div>
                    <div class="update_submit">
                        <button type="submit" class="update_btn mt-3 btn-primary">Update Price</button>
                    </div>
                </form>
                @endforeach
        </div>
    </div>
</div>