<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Watch - SN Watches</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #faf9f6;
            color: #2b2b2b;
            margin: 0;
            min-height: 100vh;
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
            padding: 50px 20px 80px;
        }

        h2 {
            font-family: 'Georgia', serif;
            font-weight: 400;
            font-size: 30px;
            letter-spacing: 1px;
            margin: 0 0 20px;
            color: #a9762f;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 28px;
            color: #a9762f;
            text-decoration: none;
            font-family: Arial, sans-serif;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        form {
            background: #ffffff;
            border: 1px solid #e7e3da;
            border-radius: 4px;
            padding: 30px;
        }

        .field {
            margin-bottom: 22px;
        }

        .field label {
            display: block;
            margin-bottom: 8px;
            font-family: Arial, sans-serif;
            font-size: 13px;
            font-weight: bold;
            color: #6b6355;
        }

        .field input,
        .field textarea,
        .field select {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #e7e3da;
            border-radius: 4px;
            background: #ffffff;
            color: #2b2b2b;
            font-family: Arial, sans-serif;
            font-size: 13px;
            outline: none;
            transition: border-color 0.2s ease;
        }

        .field input:focus,
        .field textarea:focus,
        .field select:focus {
            border-color: #a9762f;
        }

        .field textarea {
            resize: vertical;
            min-height: 100px;
        }

        .field select {
            cursor: pointer;
        }

        .field input[type="file"] {
            padding: 9px 10px;
            cursor: pointer;
        }

        button {
            width: 100%;
            padding: 11px 15px;
            border: none;
            border-radius: 4px;
            background: #a9762f;
            color: #ffffff;
            font-family: Arial, sans-serif;
            font-size: 13px;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        button:hover {
            background: #8f6327;
        }

        .error-box {
            margin-bottom: 20px;
            padding: 14px 16px;
            background: #faf9f6;
            border: 1px solid #e7e3da;
            border-left: 3px solid #a9762f;
            border-radius: 4px;
            color: #6b6355;
            font-size: 13px;
        }

        .error-box ul {
            margin: 0;
            padding-left: 18px;
        }

        .error-box li {
            margin-bottom: 4px;
        }

        .error-box li:last-child {
            margin-bottom: 0;
        }

        /* ===== Responsive : petits écrans ===== */

        @media (max-width: 600px) {
            .container {
                padding: 30px 15px 50px;
            }

            h2 {
                font-size: 23px;
            }

            form {
                padding: 20px;
            }

            .back-link {
                margin-bottom: 22px;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <a href="{{ route('watches.index') }}" class="back-link">
            ← Back to list
        </a>
        <h2>Add a Watch</h2>



        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('watches.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="field">
                <label>Model</label>
                <input type="text" name="model" value="{{ old('model') }}">
            </div>

            <div class="field">
                <label>Brand</label>
                <input type="text" name="brand" value="{{ old('brand') }}">
            </div>

            <div class="field">
                <label>Description</label>
                <textarea name="description" rows="4">{{ old('description') }}</textarea>
            </div>

            <div class="field">
                <label>Price</label>
                <input type="number" step="0.01" min="0" name="price" value="{{ old('price') }}">
            </div>

            <div class="field">
                <label>Stock</label>
                <input type="number" min="0" name="stock" value="{{ old('stock') }}">
            </div>

            <div class="field">
                <label>Category</label>
                <select name="category_id" id="category_id">
                    <option value="">Please choose your category</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="field">
                <label>Image</label>
                <input type="file" name="image">
            </div>

            <button type="submit">
                Save
            </button>

        </form>

    </div>

</body>

</html>