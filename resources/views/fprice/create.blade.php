<style>
    * {
        margin: 0;
        padding: 0;
    }

    header {
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        align-items:
            center;
        background-color: rgb(11, 11, 95);
        color: white;
        font-size: 20px;
        box-shadow: 2px 3px 5px #cacaca;
        padding-top: 10px;
        padding-bottom: 10px;
        gap: 10px;
    }

    .create {
        display: flex;
        /* flex-wrap: wrap; */
        width: 100%;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        padding-top: 10px;
        padding-bottom: 10px;
        gap:
            10px;
        background-color: #6c96f0
    }

    .create div {
        display: flex;
        flex-wrap: wrap;
        width: 50%;
        gap: 15px;
        /*
    justify-content: space-between; */
        flex-direction: row;
        align-items: center;
        /* padding-top: 10px; */
        /* gap: 10px;
    */
        font-size: 20;
        font-family: 'Times New Roman', Times, serif;
    }

    .fprice_container_btn {
        display: flex;
        justify-content: center;
        gap: '20px';

    }

    .create {
        width: 100%;

    }

    /* .fprice_container {
    } */

    .c-btn {
        padding: 8px;
        border-radius: 5px;
        width: 100px;
        border: none;
        cursor: pointer;
        background-color: rgb(11, 11, 95);
        color: white;
        font-weight: bold;
        box-shadow: 2px 2px 5px #ffff;
    }

    .c-btn:hover {
        background-color: rgb(26, 26, 163);
    }

    .b-btn {
        padding: 8px;
        border-radius: 5px;
        width: 100px;
        border: none;
        cursor: pointer;
        background-color: rgb(177, 15, 15);
        color: white;
        font-weight: bold;
        box-shadow: 2px 2px 5px #ffff;
    }

    .b-btn:hover {
        background-color: rgb(26, 26, 163);
    }

    .fprice_input {
        width: 100%;
        height: 40px;
        border-radius: 10px;
        padding: 10px
    }

    .fprices-div {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        text-align: center;
        gap: 20px;
    }

    .fprice-div {
        padding: 50px;
        background-color: beige;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        margin-top: 50px;

    }

    .fprice_name {
        font-size: 60px;
        font-weight: bold;
        color: rgb(66, 65, 65);
        border-bottom: 2px solid rgb(165, 164, 164);
        margin-bottom: 10px;
    }

    .edit_btn {
        background-color: rgb(3, 3, 71);
        color: white;
        padding: 10px;
        border-radius: 10px;
        text-decoration: none;

    }

    .edit_btn:hover {
        background-color: rgb(5, 5, 116);
    }

    .delete_btn {
        background-color: rgb(204, 24, 24);
        color: white;
        padding: 10px;
        border-radius: 10px;
        cursor: pointer;

    }

    .delete_btn:hover {
        background-color: rgb(223, 14, 14);
    }
</style>
<div>
    <header>
        <h2>Prices list</h2>
        <p></p>
    </header>
    <form method="POST" action="/store" enctype="multipart/form-data"> @csrf <div class="create">
            <div class="fprice_container">
                <!-- <label for="fprice">
                    Add new price</label> -->
                <input placeholder="Add new price" class='fprice_input' type="float" name="fprice"
                    value="{{old('fprice')}}" />
                @error('fprice')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class='fprice_container_btn'>
                <button class="b-btn">
                    Cancel</button>
                <button class="c-btn">
                    Add</button>
            </div>
        </div>
    </form>
    <div class="fprices-div">
        @foreach ($fprices as $fprice)
        <div class="fprice-div">
            <div class="fprice_details">
                <p class="fprice_name">{{ $fprice->fprice }}</p>
            </div>
            <div>
                <a href="{{ route('edit.fprice', ['fprice' => $fprice->id]) }}"
                    class="edit_btn btn-primary btn-sm">Edit</a>
                <a href="{{ route('delete.fprice', ['fprice' => $fprice->id]) }}" class="delete_btn">Delete</a>
            </div>

        </div>
        @endforeach
    </div>
</div>