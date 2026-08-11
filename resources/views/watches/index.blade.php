<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watches List</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 15px;
            color: #2b2b2b;
            background: #faf9f6;
        }

        h2 {
            font-weight: 400;
            color: #a9762f;
            margin-bottom: 10px;
        }

        .add-btn {
            display: inline-block;
            font-family: Arial, sans-serif;
            background: #a9762f;
            color: #fff;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 13px;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .success-msg {
            font-family: Arial, sans-serif;
            background: #eaf3ea;
            color: #3a6b3a;
            padding: 10px 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 600px;
            border-collapse: collapse;
            background: #fff;
            border: 1px solid #e7e3da;
        }

        thead {
            background: #f5efe4;
        }

        th {
            font-family: Arial, sans-serif;
            font-weight: bold;
            font-size: 13px;
            text-transform: uppercase;
            color: #a9762f;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e7e3da;
            font-family: Arial, sans-serif;
        }

        tbody tr:hover {
            background: #faf6ee;
        }

        img {
            border-radius: 6px;
            object-fit: cover;
        }

        .actions a {
            margin-right: 10px;
            text-decoration: none;
            color: #a9762f;
        }

        .actions form {
            display: inline;
        }

        .actions button {
            border: none;
            background: none;
            color: #c15b3f;
            cursor: pointer;
            padding: 0;
            font-size: 14px;
        }

        .empty-row {
            text-align: center;
            color: #9b968a;
            padding: 20px;
        }

        .category-badge {
            background: #a9762f;
            color: #fff;
            padding: 2px 10px;
            border-radius: 4px;
            font-size: 12px;
            display: inline-block;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #a9762f;
            text-decoration: none;
            font-family: Arial, sans-serif;
            font-size: 13px;
            text-transform: uppercase;
        }

        /* Responsive : petits écrans (mobile) */
        @media (max-width: 600px) {
            body {
                margin: 20px auto;
            }

            h2 {
                font-size: 20px;
            }

            .add-btn {
                display: block;
                text-align: center;
            }

            th,
            td {
                padding: 8px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <a href="{{ route('dashboard') }}" class="back-link">← Back to Dashboard</a>
    <br>
    <h2>Watches List</h2>

    <a href="{{ route('watches.create') }}" class="add-btn">+ Add a Watch</a>

    @if (session('success'))
        <div class="success-msg">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Model</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($watches as $watch)
                    <tr>
                        <td>{{ $watch->id }}</td>
                        <td>
                            @if ($watch->image)
                                <img src="{{ asset('storage/' . $watch->image) }}" alt="{{ $watch->model }}" width="60"
                                    height="60">
                            @else
                                —
                            @endif
                        </td>
                        <td>{{ $watch->model }}</td>
                        <td>{{ $watch->brand }}</td>
                        <td style="text-align: center;">
                            @if ($watch->category)
                                <span class="category-badge">{{ $watch->category->name }}</span>
                            @else
                                <span style="color:#9b968a;">-</span>
                            @endif
                        </td>
                        <td>{{ $watch->price }} DH</td>
                        <td>{{ $watch->stock }}</td>
                        <td class="actions">
                            <a href="{{ route('watches.show', $watch->id) }}">View</a>
                            <a href="{{ route('watches.edit', $watch->id) }}">Edit</a>
                            @if(auth()->user()->isAdmin())
                                <form action="{{ route('watches.destroy', $watch->id) }}" method="POST"
                                    onsubmit="return confirm('Delete this watch?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="empty-row">No watches found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>