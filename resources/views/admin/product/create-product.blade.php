<style>
    /* Base styles */
    .wrapper a {
        display: inline-block;
        text-decoration: none;
        padding: 15px 20px;
        background-color: #ffffff;
        border-radius: 4px;
        text-transform: uppercase;
        color: #585858;
        font-family: 'Roboto', sans-serif;
        transition: background-color 0.3s ease;
    }

    .wrapper a:hover {
        background-color: #f0f0f0;
    }

    /* Modal styles */
    .modal {
        visibility: hidden;
        opacity: 0;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        transition: visibility 0s, opacity 0.4s;
    }

    .modal:target {
        visibility: visible;
        opacity: 1;
    }

    .modal__content {
        border-radius: 4px;
        position: relative;
        width: 500px;
        max-width: 90%;
        background: #ffffff;
        padding: 30px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }

    .modal__footer {
        text-align: right;
    }

    .modal__close {
        position: absolute;
        top: 10px;
        right: 10px;
        color: #585858;
        font-size: 24px;
        text-decoration: none;
    }

    /* Input field styles */
    input[type="text"] {
        width: calc(100% - 20px);
        /* Adjusted to account for padding */
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }

    input[type="text"]:focus {
        outline: none;
        border-color: #007bff;
    }

    /* Close button style */
    .modal__close-btn {
        display: block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #ccc;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        text-transform: uppercase;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .modal__close-btn:hover {
        background-color: #999;
    }

    /* Add Product button style */
    .modal__btn-add {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        text-transform: uppercase;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .modal__btn-add:hover {
        background-color: #0056b3;
    }
</style>

<div class="wrapper">
    <a href="#demo-modal" class="btn btn-success m-1">Add Product</a>
</div>

<div id="demo-modal" class="modal">
    <div class="modal__content">
        <a href="#" class="modal__close">&#10006;</a>
        <form action="{{ route('admin.product.create') }}" method="post">
            @csrf
            <h2 class="text-center p-3">Create a new product</h2>
            <label for="name">Name: </label><br />
            <input type="text" name="name" id="" value="{{ old('name') }}"
                placeholder="Please Add Name Product">

            <label for="name">Ar_Name: </label><br />
            <input type="text" name="ar_name" value="{{ old('ar_name') }}" id=""
                placeholder="Please Add Ar_name Product">

            <label for="name">Value: </label><br />
            <input type="text" name="value" value="{{ old('value') }}" id=""
                placeholder="Please add Value Product">

            <label for="name">Price per 1000: </label><br />
            <input type="text" value="{{ old('price_per_1000') }}"name="price_per_1000" id=""
                placeholder="Please add Value Product">
            <button type="submit" class="modal__btn-add">Add Product</button>
        </form>
        {{-- <button class="modal__close-btn">Close</button> --}}
    </div>
</div>
