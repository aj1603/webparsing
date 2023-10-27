<style> * { margin: 0; padding: 0; } header { display: flex; flex-wrap: wrap; flex-direction: column; align-items:
    center; background-color: rgb(11, 11, 95); color: white; font-size: 20px; box-shadow: 2px 3px 5px #cacaca;
    padding-top: 10px; padding-bottom: 10px; gap: 10px; } .create { display: flex; /* flex-wrap: wrap; */ width: 100%;
    justify-content: center; flex-direction: column; align-items: center; padding-top: 10px; padding-bottom: 10px; gap:
    10px; background-color: #6c96f0 } .create div { display: flex; flex-wrap: wrap; width: 50%; gap: 15px; /*
    justify-content: space-between; */ flex-direction: row; align-items: center; /* padding-top: 10px; */ /* gap: 10px;
    */ font-size: 20; font-family: 'Times New Roman' , Times, serif; } .fprice_container_btn{ display: flex; gap: '20px'
    } .c-btn { padding: 8px; border-radius: 5px; border: none; cursor: pointer; background-color: rgb(11, 11, 95);
    color: white; font-weight: bold; box-shadow: 2px 2px 5px #ffff; } .c-btn:hover { background-color: rgb(26, 26, 163);
    } .b-btn { padding: 8px; border-radius: 5px; border: none; cursor: pointer; background-color: rgb(11, 11, 95);
    color: white; font-weight: bold; box-shadow: 2px 2px 5px #ffff; } .b-btn:hover { background-color: rgb(26, 26, 163);
    } .fprice_input{ width: 50%; height: 30px; border-radius: 10px; padding: 10px } </style>
    <div> <header> <h2>Prices list</h2> <p></p> </header> <form method="POST" action="/store"
        enctype="multipart/form-data"> @csrf <div class="create"> <div class="fprice_container"> <label for="fprice">
        New price add</label>
        <input placeholder="10" class='fprice_input' type="float" name="fprice" value="{{old('fprice')}}" />
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
                <a href="{{ route('fprice.edit', $fprice->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <button>Delete</button>
            </div>
            @endforeach
            <!-- </ul> -->
        </div>
        </div>